<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'question' => 'A train 250 meters long is running at a speed of 72 km/hr. How long will it take to cross a platform of 150 meters?',
                'options' => json_encode(['10 sec', '20 sec', '25 sec', '30 sec']),
                'correct_answer' => 2,
                'session' => 'Aptitude'
            ],
            [
                'question' => 'The sum of the squares of three numbers is 206. If the sum of the numbers is 20 and their product is 360, find the numbers.',
                'options' => json_encode(['6, 10, 4', '8, 9, 3', '5, 7, 8', '6, 9, 5']),
                'correct_answer' => 4,
                'session' => 'Aptitude'
            ],
            [
                'question' => 'If a + b = 7, ab = 10, find the value of a³ + b³.',
                'options' => json_encode(['127', '30', '29', '36']),
                'correct_answer' => 2,
                'session' => 'Aptitude'
            ],
            [
                'question' => 'A can complete a task in 12 days, B in 15 days, and C in 20 days. If all three work together, in how many days will they complete the task?',
                'options' => json_encode(['4 days', '5 days', '6 days', '7 days']),
                'correct_answer' => 3,
                'session' => 'Aptitude'
            ],
            [
                'question' => 'What is the next term in the sequence 2, 6, 12, 20, 30, ?',
                'options' => json_encode(['38', '40', '42', '44']),
                'correct_answer' => 4,
                'session' => 'Aptitude'
            ],
            // [
            //     'question' => 'If the price of a product is increased by 20% and then decreased by 20%, what is the net change in price?',
            //     'options' => json_encode(['No change', '2% increase', '4% decrease', '10% decrease']),
            //     'correct_answer' => 3,
            //     'session' => 'Aptitude'
            // ],
            // [
            //     'question' => 'A man covers a distance of 60 km at a speed of 20 km/h. How much time does he take?',
            //     'options' => json_encode(['2 hours', '3 hours', '4 hours', '5 hours']),
            //     'correct_answer' => 2,
            //     'session' => 'Aptitude'
            // ],
            // [
            //     'question' => 'A shopkeeper offers a 10% discount on a product and still makes a profit of 20%. If the marked price of the product is ₹500, what is the cost price?',
            //     'options' => json_encode(['₹350', '₹375', '₹400', '₹425']),
            //     'correct_answer' => 2,
            //     'session' => 'Aptitude'
            // ],
            // [
            //     'question' => 'A is B\'s brother, C is B\'s mother, D is C\'s father. How is A related to D?',
            //     'options' => json_encode(['Grandson', 'Son', 'Granddaughter', 'Uncle']),
            //     'correct_answer' => 3,
            //     'session' => 'Aptitude'
            // ],
            // [
            //     'question' => 'Arrange the words in alphabetical order: Dog, Duck, Dolphin, Dove.',
            //     'options' => json_encode(['Dolphin, Dog, Duck ,Dove', 'Dog, Duck, Dove, Dolphin', 'Dolphin, Duck, Dove, Dog', 'Dolphin, Dog, Dove, Duck']),
            //     'correct_answer' => 4,
            //     'session' => 'Aptitude'
            // ],
            // [
            //     'question' => 'If P is taller than Q but shorter than R, and S is shorter than P but taller than Q, who is the shortest?',
            //     'options' => json_encode(['Q', 'S', 'P', 'R']),
            //     'correct_answer' => 1,
            //     'session' => 'Aptitude'
            // ],
            [
                'question' => 'Choose the correct sentence:',
                'options' => json_encode(['He are going to the market.', 'He is going to the market.', 'He am going to the market.', 'He be going to the market.']),
                'correct_answer' => 2,
                'session' => 'Communication'
            ],
            [
                'question' => 'Identify the adverb in the sentence: "She speaks very softly."',
                'options' => json_encode(['speaks', 'very', 'softly', 'She']),
                'correct_answer' => 3,
                'session' => 'Communication'
            ],
            [
                'question' => 'Choose the correct synonym of "Abundant".',
                'options' => json_encode(['Rare', 'Scarce', 'Plentiful', 'Insufficient']),
                'correct_answer' => 3,
                'session' => 'Communication'
            ],
            [
                'question' => 'What is the past tense of "go"?',
                'options' => json_encode(['Goes', 'Gone', 'Went', 'Going']),
                'correct_answer' => 3,
                'session' => 'Communication'
            ],
            [
                'question' => 'Choose the correct preposition: "She is afraid ___ the dark.',
                'options' => json_encode(['of','in','at','on']),
                'correct_answer' => 1,
                'session' => 'Communication'
            ],
            // [
            //     'question' => 'Choose the correct sentence:',
            //     'options' => json_encode(['He don\'t have any books.', 'He doesn\'t have any books.', 'He doesn\'t has any books.', 'He don\'t has any books.']),
            //     'correct_answer' => 2,
            //     'session' => 'Communication'
            // ],
            // [
            //     'question' => 'Identify the antonym of "Expand":',
            //     'options' => json_encode(['Extend', 'Enlarge', 'Spread', 'Contract']),
            //     'correct_answer' => 4,
            //     'session' => 'Communication'
            // ],
            // [
            //     'question' => 'Fill in the blank: "He has been working here ________ 2019."',
            //     'options' => json_encode(['for', 'at', 'since', 'from']),
            //     'correct_answer' => 3,
            //     'session' => 'Communication'
            // ],
            // [
            //     'question' => 'Select the synonym of "Begin":',
            //     'options' => json_encode(['End', 'Start', 'Finish', 'Delay']),
            //     'correct_answer' => 2,
            //     'session' => 'Communication'
            // ],
            // [
            //     'question' => 'Rearrange the sentence: "in / evening / the / study / I"',
            //     'options' => json_encode(['I study in the evening', 'Evening in study I the', 'Study the I evening in', 'In evening I the study']),
            //     'correct_answer' => 1,
            //     'session' => 'Communication'
            // ],
            [
                'question' => 'Who invented the World Wide Web?',
                'options' => json_encode(['Bill Gates','Tim Berners-Lee','Steve Jobs','Alan Turing']),
                'correct_answer' => 2,
                'session' => 'General'
            ],
            [
                'question' => 'Which planet is known as the Red Planet?',
                'options' => json_encode(['Jupiter','Venus','Mars','Saturn']),
                'correct_answer' => 3,
                'session' => 'General'
            ],
            [
                'question' => 'What is the currency of Japan?',
                'options' => json_encode(['Yen','Yuan','Won','Rupee']),
                'correct_answer' => 1,
                'session' => 'General'
            ],
            [
                'question' => 'Who wrote "Hamlet"?',
                'options' => json_encode(['Charles Dickens','William Shakespeare','Jane Austen','Mark Twain']),
                'correct_answer' => 2,
                'session' => 'General'
            ],
            [
                'question' => 'What is the capital of Australia?',
                'options' => json_encode(['Sydney','Melbourne','Canberra','Perth']),
                'correct_answer' => 3,
                'session' => 'General'
            ],
            // [
            //     'question' => 'Name one current trend in technology.',
            //     'options' => json_encode([ 'Blockchain', 'Artificial Intelligence (AI) ', 'Analog Computing','Landline Communication']),
            //     'correct_answer' => 2,
            //     'session' => 'General'
            // ],
            // [
            //     'question' => 'When is International Yoga Day celebrated?',
            //     'options' => json_encode(['June 5', 'June 21', 'July 5', 'July 21']),
            //     'correct_answer' => 2,
            //     'session' => 'General'
            // ],
            // [
            //     'question' => 'What is the symbol of the Indian Rupee?',
            //     'options' => json_encode([]),
            //   'options' => json_encode(['$', '€', '₹', '£']),
            //     'correct_answer' => 3,
            //     'session' => 'General'
            // ],
            [
                'question' => 'If you face a challenging situation in a project, what steps will you take to overcome it?',
                'options' => json_encode([]),

                'session' => 'Personality'
            ],
            [
                'question' => 'Describe a time when you worked as part of a team. What role did you play, and how did you contribute to the team\'s success?',
                'options' => json_encode([]),

                'session' => 'Personality'
            ],
            [
                'question' => 'Rate yourself on the following skills (1 = Beginner, 5 = Expert): Communication Skills: _____, Teamwork: _____, Leadership: _____, Problem-Solving: _____',
                'options' => json_encode([]),

                'session' => 'Personality'
            ],
            [
                'question' => 'Why should we hire you over other candidates?',
                'options' => json_encode([]),

                'session' => 'Personality'
            ],
            [
                'question' => 'How do you handle constructive criticism?',
                'options' => json_encode([]),

                'session' => 'Personality'
            ],
            // [
            //     'question' => 'Describe a time when you took initiative to solve a problem.',
            //     'options' => json_encode([]),

            //     'session' => 'Personality'
            // ],
            // [
            //     'question' => 'What are your long-term career goals?',
            //     'options' => json_encode([]),

            //     'session' => 'Personality'
            // ],
            // [
            //     'question' => 'How would you prioritize tasks when managing multiple deadlines?',
            //     'options' => json_encode([]),

            //     'session' => 'Personality'
            // ],
            // [
            //     'question' => 'On a scale of 1 to 5, how would you rate your: Leadership skills: _____, Teamwork: _____, Communication: _____, Adaptability: _____',
            //     'options' => json_encode([]),

            //     'session' => 'Personality'
            // ],
            [
                'question' => 'What does HTTP stand for?',
                'options' => json_encode(['Hyper Transfer Text Protocol','High Text Transfer Protocol','HyperText Transfer Protocol','Hyperlink Transfer Process']),
                'correct_answer' => 3,
                'session' => 'Skill_IT'
            ],
            [
                'question' => 'What is the full form of RAM?',
                'options' => json_encode(['Random Access Memory','Readable Access Memory','Running Application Memory','Read-Only Memory']),
                'correct_answer' => 1,
                'session' => 'Skill_IT'
            ],
            [
                'question' => 'What does API stand for?',
                'options' => json_encode(['Automated Processing Interface',' Application Programming Interface','Advanced Protocol Integration','Application Processing Input']),
                'correct_answer' => 2,
                'session' => 'Skill_IT'
            ],
            [
                'question' => 'What is the full form of JSON?',
                'options' => json_encode(['Java Standard Object Notation','JavaScript Object Network','JavaScript Object Notation','Java Serialized Object Name']),
                'correct_answer' => 3,
                'session' => 'Skill_IT'
            ],
            [
                'question' => 'Expand the term SQL.',
                'options' => json_encode(['Standard Query Language','Structured Query Logic','System Query Language','Structured Query Language']),
                'correct_answer' => 4,
                'session' => 'Skill_IT'
            ],
            [
                'question' => 'Write a C program to find the factorial of a number using recursion.',
                'options' => json_encode([]),

                'session' => 'Skill_IT'
            ],
            [
                'question' => 'Write a C++ program to check if a number is a palindrome..',
                'options' => json_encode([]),

                'session' => 'Skill_IT'
            ],
            [
                'question' => 'Write a Java program to find the largest element in an array.',
                'options' => json_encode([]),

                'session' => 'Skill_IT'
            ],
            [
                'question' => 'Write a Java program to reverse a string.',
                'options' => json_encode([]),

                'session' => 'Skill_IT'
            ],
            [
                'question' => 'Write a C program to check if a number is prime.',
                'options' => json_encode([]),

                'session' => 'Skill_IT'
            ],
            // [
            //     'question' => 'Define the term "Target Audience.',
            //     'options' => json_encode([]),

            //     'session' => 'Skill_Marketing'
            // ],
            // [
            //     'question' => 'Name one online marketing tool commonly used.',
            //     'options' => json_encode([]),

            //     'session' => 'Skill_Marketing'
            // ],
            // [
            //     'question' => 'What is the importance of branding?',
            //     'options' => json_encode([]),

            //     'session' => 'Skill_Marketing'
            // ],
            // [
            //     'question' => 'How do you measure the success of a marketing campaign?',
            //     'options' => json_encode([]),

            //     'session' => 'Skill_Marketing'
            // ],
            // [
            //     'question' => 'Write a creative tagline for a mobile phone brand.',
            //     'options' => json_encode([]),

            //     'session' => 'Skill_Marketing'
            // ],
            // [
            //     'question' => 'Suggest one innovative way to promote a new product on social media.',
            //     'options' => json_encode([]),

            //     'session' => 'Skill_Marketing'
            // ],
            // [
            //     'question' => 'What is the meaning of the term “Market Segmentation”?',
            //     'options' => json_encode(['Dividing a market into smaller groups', 'Combining products for better reach', 'Advertising across all platforms', 'Selling to individual customers']),
            //     'correct_answer' => 1,
            //     'session' => 'Skill_Marketing'
            // ],
            // [
            //     'question' => 'How would you handle a conflict between two team members? Write your approach in 50 words.',
            //     'options' => json_encode([]),

            //     'session' => 'Skill_Hr'
            // ],
            // [
            //     'question' => 'What are the key steps in the recruitment process?',
            //     'options' => json_encode([]),

            //     'session' => 'Skill_Hr'
            // ],
        ];

        foreach ($questions as $data) {
            Question::create($data);
        }
    }
}
