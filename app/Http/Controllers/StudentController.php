<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Http\Controllers\TestController;

class StudentController extends Controller
{
    // Display the home page
    public function index()
    {
        return view('interview.layouts.home');
    }

    // Display the assessment page with test details
    public function assessment()
    {
        $formData = session('formData'); // Retrieve form data from session
        $testId = session('test_id'); // Get test ID from session
        $questions = Question::all();

        // Decode options for each question
        foreach ($questions as $question) {
            $question->options = json_decode($question->options);
        }

        // Pass data to the test view
        return view('interview.layouts.test', compact('testId', 'questions', 'formData'));
    }

    // Method for registering a student
    public function store(Request $request)
    {
        
        // Validate the request
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:10',
            'email' => 'required|string|email|max:255|unique:students',
            'college_name' => 'required|string|max:255',
            'degree_specialization' => 'required|string|max:255',
            'graduation_date' => 'required|date',
            'area_of_intrest' => 'required|string|max:255',
            'roll_number' => 'required|string|unique:students',
        ]);
        // dd($validated);
        // Check if a student with the same email already exists
        $existingStudent = Student::where('email', $request->email)->first();

        if ($existingStudent) {
            return response()->json([
                'message' => 'This email address is already registered.',
                'status' => 'error',
            ], 400);
        }

        // Create the student record in the database
        $student = Student::create($validated);
        // Start test for the registered student
        $testController = new TestController();
        $testResponse = $testController->start($student->id);

        // Save form data to session
        session(['formData' => $request->all()]);

        // // Redirect to the test page with the generated test ID
        return redirect()->route('interview.layouts.test');
        // return response()->json([
        //     'students' => $validated,
        // ], 200);
    
    }

    // Fetch all students data
    public function getall()
    {
        $students = Student::all();

        return response()->json([
            'students' => $students,
        ], 200); // Return all students with 200 OK
    }

    // Fetch a specific student by ID
    public function show($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'message' => 'Student not found',
                'status' => 'error',
            ], 404); // Return 404 if student not found
        }

        return response()->json([
            'student' => $student,
        ], 200);
    }
}
