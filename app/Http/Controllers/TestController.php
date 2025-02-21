<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Question;
use App\Models\Response;
use App\Models\Student;





class TestController extends Controller
{
     // Method to start the test
     public function scores()
     {
         return view('interview.layouts.scores');
     }

     public function start($student_id)
     {
         // Create a new test record for the student
         $test = Test::create(['student_id' => $student_id]);

         // Get all questions
         $questions = Question::all();

         // Store the test ID and start time in the session for the current test
         session(['test_id' => $test->id, 'start_time' => now()]);

         // Return the test ID and list of questions in the response (API-style)
         return response()->json([
             'test_id' => $test->id,
             'questions' => $questions
         ]);
     }

     // Method to store test responses and calculate score
     public function storeResponse(Request $request, $test_id)
     {
         // Fetch the test
         $test = Test::find($test_id);

         if (!$test) {
             return response()->json(['error' => 'Test not found'], 404);
         }

         // Retrieve responses from the request
         $responses = $request->all();

         // Add default values for missing keys (questions not answered by the user)
         for ($i = 1; $i <= 53; $i++) {
             if (!array_key_exists($i, $responses)) {
                 $responses[$i] = 'N/A';
             } elseif ($responses[$i] === null) {
                 $responses[$i] = 'N/A';
             }
         }

         // Sort responses by question ID
         ksort($responses);

         $correctAnswersCount = 0;

         // Fetch all questions
         $questions = Question::all();
         $totalMCQs = 0;

         foreach ($questions as $question) {
             // Check if the question is an MCQ
             $isMCQ = !empty(json_decode($question->options, true));

             // Count total MCQs for percentage calculation
             if ($isMCQ) {
                 $totalMCQs++;
             }

             // Check if there's a response for the current question
             if (isset($responses[$question->id])) {
                 // Normalize the user-selected answer and the correct answer
                 $selected_answer = trim(strtolower($responses[$question->id]));
                 $correct_answer = trim(strtolower($question->correct_answer));

                 // Determine if the answer is correct (only applicable for MCQs)
                 $is_correct = $isMCQ && ($selected_answer === $correct_answer);

                 // Store the response in the database
                 Response::create([
                     'test_id' => $test->id,
                     'question_id' => $question->id,
                     'selected_answer' => $responses[$question->id],
                     'is_correct' => $is_correct,
                 ]);

                 // Increment the correct answer count if the answer is correct
                 if ($is_correct) {
                     $correctAnswersCount++;
                 }
             }
         }

         // Calculate the percentage score for MCQs
         $percentageScore = $totalMCQs > 0 ? round(($correctAnswersCount / $totalMCQs) * 100, 0) : 0;

         // Update the test details
         $test->update([
             'score' => $correctAnswersCount, // Store only correct MCQ answers as the score
             'is_completed' => true,
         ]);


             return redirect()->route('interview.layouts.result');

        }



     public function show()
     {
        $test_id = session('test_id');
         // Fetch the test with associated responses and their questions
         $test = Test::with('responses.question')->find($test_id);

         if (!$test) {
             return response()->json(['error' => 'Test not found'], 404);
         }

         $questions = Question::all();

         // Initialize counters
         $correctAnswersCount = 0;
         $mcqResults = [];
         $nonMCQResults = [];

         // Iterate over all questions
         foreach ($questions as $question) {
             // Fetch the response for the current question
             $response = $test->responses->firstWhere('question_id', $question->id);

             // Check if the question has options (MCQ)
             $isMCQ = !empty(json_decode($question->options, true));

             if ($isMCQ) {
                 // Handle MCQ questions
                 $isCorrect = $response && $response->selected_answer == $question->correct_answer;

                 if ($isCorrect) {
                     $correctAnswersCount++;
                 }

                 // Save MCQ response details
                 $mcqResults[] = [
                     'question_id' => $question->id,
                     'question' => $question->question,
                     'options' => json_decode($question->options, true),
                     'correct_answer' => $question->correct_answer,
                     'user_answer' => $response ? $response->selected_answer : null,
                     'is_correct' => $isCorrect,
                 ];
             } else {
                 // Handle non-MCQ questions (e.g., subjective answers)
                 $nonMCQResults[] = [
                     'question_id' => $question->id,
                     'question' => $question->question,
                     'user_answer' => $response ? $response->selected_answer : null,  // Text answer of the non-MCQ question
                     'message' => 'Manual review your question and tell about the score.',  // Added for clarity on manual review
                 ];
             }
         }

         // Calculate the percentage score for MCQs
         $totalMCQs = count($mcqResults);
         $scorePercentage = $totalMCQs > 0 ? round(($correctAnswersCount / $totalMCQs) * 100, 0) : 0;

         // Calculate overall question count
         $overallQuestionCount = $totalMCQs + count($nonMCQResults);


         $details = json_encode([
            'test_id' => $test->id,
             'mcq_questions' => $mcqResults,
             'non_mcq_questions' => $nonMCQResults,
             'score' => $scorePercentage . '%',
             'total_mcqs' => $totalMCQs,
             'correct_answers' => $correctAnswersCount,
             'total_non_mcq_questions' => count($nonMCQResults),
             'overall_question_count' => $overallQuestionCount, // Added for overall question count
        ]);

        return view('interview.layouts.result', compact('details'));

            //  return redirect()->route('interview.layouts.result', ['test_id' => $test_id]);
         }

         public function getScoreDistribution()
         {
             $tests = Test::where('is_completed', true)->get();

             $totalMCQs = 34;

             if ($totalMCQs === 0) {
                 return response()->json(['error' => 'No MCQs found'], 400);
             }

             $scoreDistribution = [
                 '1-10%' => 0,
                 '11-20%' => 0,
                 '21-30%' => 0,
                 '31-40%' => 0,
                 '41-50%' => 0,
                 '51-60%' => 0,
                 '61-70%' => 0,
                 '71-80%' => 0,
                 '81-90%' => 0,
                 '91-100%' => 0,
             ];

             foreach ($tests as $test) {
                 $correctAnswers = $test->responses()
                     ->join('questions', 'responses.question_id', '=', 'questions.id')
                     ->whereNotNull('questions.options')
                     ->whereColumn('responses.selected_answer', 'questions.correct_answer')
                     ->count();

                 $percentageScore = ($correctAnswers / $totalMCQs) * 100;

                 if ($percentageScore > 0 && $percentageScore <= 100) {
                     $rangeStart = max(1, ((int) floor(($percentageScore - 1) / 10) * 10) + 1);
                     $rangeEnd = $rangeStart + 9;
                     $rangeKey = "{$rangeStart}-{$rangeEnd}%";

                     if (isset($scoreDistribution[$rangeKey])) {
                         $scoreDistribution[$rangeKey]++;
                     }
                 }
             }

            //  return response()->json([
            //      'scoreDistribution' => $scoreDistribution,
            //      'totalStudents' => $tests->count(),
            //  ]);
            return view('interview.layouts.scores', [
    'scoreDistribution' => $scoreDistribution,
    'totalStudents' => $tests->count(),
]);


            }
            public function getScoreDetails(Request $request)
            {
                $tests = Test::where('is_completed', true)->get();



                // Fetch total number of MCQ questions
                $totalMCQs = Question::whereNotNull('options')
                ->whereRaw("JSON_LENGTH(options) > 0") // Only count non-empty JSON arrays
                ->count();

                if ($totalMCQs === 0) {
                    return response()->json(['error' => 'No MCQs found'], 400);
                }

                // Calculate MCQ percentages and collect student details
                $studentDetails = $tests->map(function ($test) use ($totalMCQs) {
                    // Count correct MCQ answers for this test
                    $correctAnswers = $test->responses()
                    ->join('questions', 'responses.question_id', '=', 'questions.id')
                    ->whereNotNull('questions.options') // Ensure it's an MCQ
                    ->whereRaw("JSON_LENGTH(questions.options) > 0") // Ensure options array is not empty
                    ->whereColumn('responses.selected_answer', 'questions.correct_answer') // Only correct answers
                    ->distinct('responses.question_id') // Ensure each question is counted only once
                    ->count();


                    // Calculate percentage strictly for MCQs
                    $percentageScore = ($totalMCQs > 0) ? round(($correctAnswers / $totalMCQs) * 100, 0) : 0;

                    // Fetch student details
                    $student = Student::find($test->student_id);

                    return [
                        'test_id' => $test->id,
                        'student_id' => $test->student_id,
                        'student_name' => $student ? $student->full_name : 'N/A',
                        'roll_number' => $student ? $student->roll_number : 'N/A',
                        'mcq_score' => $correctAnswers, // Correct MCQ answers count
                        'mcq_percentage' => $percentageScore, // MCQ percentage
                    ];
                });


                return view('interview.layouts.studentsScores', [
                    'range' => $request->input('range'),
                    'total_students' => $studentDetails->count(),
                    'students' => $studentDetails,
                ]);
                // Ensure all tests are mapped

            }



    //   return response()->json([
    //        'range' => $request->input('range'),
    //     'total_students' => $studentsInRange->count(),
    //     'students' => $studentDetails, ]);


//nonmcqquestion
public function viewAnswers($test_id)
{
    $test = Test::with('responses.question')->find($test_id);

    if (!$test) {
        abort(404);
    }
    $student = Student::find($test->student_id);
    // Reuse the logic from show() method to get the details
    $questions = Question::all();
    $correctAnswersCount = 0;
    $mcqResults = [];
    $nonMCQResults = [];

    foreach ($questions as $question) {
        $response = $test->responses->firstWhere('question_id', $question->id);
        $isMCQ = !empty(json_decode($question->options, true));

        if ($isMCQ) {
            $isCorrect = $response && $response->selected_answer == $question->correct_answer;
            if ($isCorrect) {
                $correctAnswersCount++;
            }
            $mcqResults[] = [
                'question_id' => $question->id,
                'question' => $question->question,
                'options' => json_decode($question->options, true),
                'correct_answer' => $question->correct_answer,
                'user_answer' => $response ? $response->selected_answer : null,
                'is_correct' => $isCorrect,
            ];
        } else {
            $nonMCQResults[] = [
                'question_id' => $question->id,
                'question' => $question->question,
                'user_answer' => $response ? $response->selected_answer : null,
                'message' => 'Manual review your question and tell about the score.',
            ];
        }
    }

    $totalMCQs = count($mcqResults);
    $scorePercentage = $totalMCQs > 0 ? round(($correctAnswersCount / $totalMCQs) * 100, 0) : 0;

    return view('interview.layouts.answers', [
        'student_name' => $student ? $student->full_name : 'N/A',
        'roll_number' => $student ? $student->roll_number : 'N/A',
        'mcq_questions' => $mcqResults,
        'non_mcq_questions' => $nonMCQResults,
        'score' => $scorePercentage . '%',
        'total_mcqs' => $totalMCQs,
        'correct_answers' => $correctAnswersCount,
        'total_non_mcq_questions' => count($nonMCQResults),
        'test' => $test
    ]);
}

}
