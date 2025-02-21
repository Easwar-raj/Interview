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
                'question' => 'What is the sum of 37 and 58?',
                'options' => json_encode(['85', '95', '105', '115']),
                'correct_answer' => 2,
                'session' => 'Aptitude'
            ],
            [
                'question' => 'A train travels at 60 km/h. How much time will it take to cover 90 km?',
                'options' => json_encode(['1 hour', '1.5 hours', '2 hours', '2.5 hours']),
                'correct_answer' => 2,
                'session' => 'Aptitude'
            ],
            [
                'question' => 'Simplify: (15 x 8) ÷ 6 + 9.',
                'options' => json_encode(['27', '30', '29', '36']),
                'correct_answer' => 3,
                'session' => 'Aptitude'
            ],
            [
                'question' => 'If a shopkeeper buys 10 pens for ₹150 and sells them at ₹18 each, what is his profit?',
                'options' => json_encode(['₹15', '₹30', '₹45', '₹60']),
                'correct_answer' => 2,
                'session' => 'Aptitude'
            ],
            [
                'question' => 'What is the value of 144+25-15\sqrt{144} + 25 - 15144-25-15?',
                'options' => json_encode(['32', '34', '36', '38']),
                'correct_answer' => 3,
                'session' => 'Aptitude'
            ],
            [
                'question' => 'If the price of a product is increased by 20% and then decreased by 20%, what is the net change in price?',
                'options' => json_encode(['No change', '2% increase', '4% decrease', '10% decrease']),
                'correct_answer' => 3,
                'session' => 'Aptitude'
            ],
            [
                'question' => 'A man covers a distance of 60 km at a speed of 20 km/h. How much time does he take?',
                'options' => json_encode(['2 hours', '3 hours', '4 hours', '5 hours']),
                'correct_answer' => 2,
                'session' => 'Aptitude'
            ],
            [
                'question' => 'A shopkeeper offers a 10% discount on a product and still makes a profit of 20%. If the marked price of the product is ₹500, what is the cost price?',
                'options' => json_encode(['₹350', '₹375', '₹400', '₹425']),
                'correct_answer' => 2,
                'session' => 'Aptitude'
            ],
            [
                'question' => 'A is B\'s brother, C is B\'s mother, D is C\'s father. How is A related to D?',
                'options' => json_encode(['Grandson', 'Son', 'Granddaughter', 'Uncle']),
                'correct_answer' => 3,
                'session' => 'Aptitude'
            ],
            [
                'question' => 'Arrange the words in alphabetical order: Dog, Duck, Dolphin, Dove.',
                'options' => json_encode(['Dolphin, Dog, Duck ,Dove', 'Dog, Duck, Dove, Dolphin', 'Dolphin, Duck, Dove, Dog', 'Dolphin, Dog, Dove, Duck']),
                'correct_answer' => 4,
                'session' => 'Aptitude'
            ],
            [
                'question' => 'If P is taller than Q but shorter than R, and S is shorter than P but taller than Q, who is the shortest?',
                'options' => json_encode(['Q', 'S', 'P', 'R']),
                'correct_answer' => 1,
                'session' => 'Aptitude'
            ],
            [
                'question' => 'Choose the correct sentence:',
                'options' => json_encode(['She don\'t likes coffee.', 'She doesn\'t likes coffee.', 'She don\'t like coffee.', 'She doesn\'t like coffee.']),
                'correct_answer' => 4,
                'session' => 'Communication'
            ],
            [
                'question' => 'Identify the error in the sentence: "He are going to the market."',
                'options' => json_encode(['He', 'are', 'going', 'market']),
                'correct_answer' => 2,
                'session' => 'Communication'
            ],
            [
                'question' => 'Fill in the blank: "If I _______ you, I would accept the offer."',
                'options' => json_encode(['was', 'were', 'am', 'is']),
                'correct_answer' => 2,
                'session' => 'Communication'
            ],
            [
                'question' => 'Which of the following is a synonym for "enhance"?',
                'options' => json_encode(['Worsen', 'Improve', 'Decrease', 'Eliminate']),
                'correct_answer' => 2,
                'session' => 'Communication'
            ],
            [
                'question' => 'Write a short email (50-100 words) responding to a job offer.',
                'options' => json_encode([]),
                'session' => 'Communication'
            ],
            [
                'question' => 'Choose the correct sentence:',
                'options' => json_encode(['He don\'t have any books.', 'He doesn\'t have any books.', 'He doesn\'t has any books.', 'He don\'t has any books.']),
                'correct_answer' => 2,
                'session' => 'Communication'
            ],
            [
                'question' => 'Identify the antonym of "Expand":',
                'options' => json_encode(['Extend', 'Enlarge', 'Spread', 'Contract']),
                'correct_answer' => 4,
                'session' => 'Communication'
            ],
            [
                'question' => 'Fill in the blank: "He has been working here ________ 2019."',
                'options' => json_encode(['for', 'at', 'since', 'from']),
                'correct_answer' => 3,
                'session' => 'Communication'
            ],
            [
                'question' => 'Select the synonym of "Begin":',
                'options' => json_encode(['End', 'Start', 'Finish', 'Delay']),
                'correct_answer' => 2,
                'session' => 'Communication'
            ],
            [
                'question' => 'Rearrange the sentence: "in / evening / the / study / I"',
                'options' => json_encode(['I study in the evening', 'Evening in study I the', 'Study the I evening in', 'In evening I the study']),
                'correct_answer' => 1,
                'session' => 'Communication'
            ],
            [
                'question' => 'Who is the current Prime Minister of India?',
                'options' => json_encode(['Rahul Gandhi', 'Amit Shah', 'Narendra Modi', 'Arvind Kejriwal']),
                'correct_answer' => 3,
                'session' => 'General'
            ],
            [
                'question' => 'Who is the President of India (as of 2024)?',
                'options' => json_encode(['Ram Nath Kovind', 'Pratibha Patil', 'A. P. J. Abdul Kalam', 'Droupadi Murmu']),
              'correct_answer' => 4,
                'session' => 'General'
            ],
            [
                'question' => 'When is International Women\'s Day celebrated?',
                'options' => json_encode(['March 8', 'April 7', 'May 1', 'June 5']),
                'correct_answer' => 1,
                'session' => 'General'
            ],
            // [
            //     'question' => 'Name a recent technological innovation you find interesting and explain why.',
            //     'options' => json_encode([]),

            //     'session' => 'Skill_IT'
            // ],
            [
                'question' => 'Name any two Union Territories of India.',
                'options' => json_encode(['Delhi, Puducherry ', 'Maharashtra, Kerala', 'Gujarat, Rajasthan ', 'Tamil Nadu, Karnataka']),
                'correct_answer' => 1,
                'session' => 'General'
            ],
            [
                'question' => 'What is the capital of France?',
            'options' => json_encode([ 'Berlin', 'Rome ', 'Madrid','Paris']),
                'correct_answer' => 4,
                'session' => 'General'
            ],
            [
                'question' => 'Name one current trend in technology.',
                'options' => json_encode([ 'Blockchain', 'Artificial Intelligence (AI) ', 'Analog Computing','Landline Communication']),
                'correct_answer' => 2,
                'session' => 'General'
            ],
            [
                'question' => 'When is International Yoga Day celebrated?',
                'options' => json_encode(['June 5', 'June 21', 'July 5', 'July 21']),
                'correct_answer' => 2,
                'session' => 'General'
            ],
            [
                'question' => 'What is the symbol of the Indian Rupee?',
                'options' => json_encode([]),
              'options' => json_encode(['$', '€', '₹', '£']),
                'correct_answer' => 3,
                'session' => 'General'
            ],
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
            [
                'question' => 'Describe a time when you took initiative to solve a problem.',
                'options' => json_encode([]),

                'session' => 'Personality'
            ],
            [
                'question' => 'What are your long-term career goals?',
                'options' => json_encode([]),

                'session' => 'Personality'
            ],
            [
                'question' => 'How would you prioritize tasks when managing multiple deadlines?',
                'options' => json_encode([]),

                'session' => 'Personality'
            ],
            [
                'question' => 'On a scale of 1 to 5, how would you rate your: Leadership skills: _____, Teamwork: _____, Communication: _____, Adaptability: _____',
                'options' => json_encode([]),

                'session' => 'Personality'
            ],
            [
                'question' => 'What is the primary function of an operating system?',
                'options' => json_encode(['To compile programs', 'To manage hardware and software resources', 'To edit text files', 'To browse the internet']),
                'correct_answer' => 2,
                'session' => 'Skill_IT'
            ],
            [
                'question' => 'What is the full form of SQL?',
                'options' => json_encode(['Structured Query Language', 'System Query Language', 'Sequential Query Language', 'Syntax Query Language']),
                'correct_answer' => 1,
                'session' => 'Skill_IT'
            ],
            [
                'question' => 'Which of the following is a programming language?',
                'options' => json_encode(['HTML', 'CSS', 'Python', 'JSON']),
                'correct_answer' => 3,
                'session' => 'Skill_IT'
            ],
            [
                'question' => 'What is the output of 2 + 2 * 2 in programming logic?',
                'options' => json_encode(['6', '8', '4', 'None of the above']),
                'correct_answer' => 1,
                'session' => 'Skill_IT'
            ],
            [
                'question' => 'What is the full form of HTTP?',
                'options' => json_encode(['HyperText Transfer Protocol', 'HyperText Transfer Program', 'Hyper Transfer Text Protocol', 'HyperText Texting Program']),
                'correct_answer' => 1,
                'session' => 'Skill_IT'
            ],
            [
                'question' => 'Define the term "Target Audience.',
                'options' => json_encode([]),

                'session' => 'Skill_Marketing'
            ],
            [
                'question' => 'Name one online marketing tool commonly used.',
                'options' => json_encode([]),

                'session' => 'Skill_Marketing'
            ],
            [
                'question' => 'What is the importance of branding?',
                'options' => json_encode([]),

                'session' => 'Skill_Marketing'
            ],
            [
                'question' => 'How do you measure the success of a marketing campaign?',
                'options' => json_encode([]),

                'session' => 'Skill_Marketing'
            ],
            [
                'question' => 'Write a creative tagline for a mobile phone brand.',
                'options' => json_encode([]),

                'session' => 'Skill_Marketing'
            ],
            [
                'question' => 'Suggest one innovative way to promote a new product on social media.',
                'options' => json_encode([]),

                'session' => 'Skill_Marketing'
            ],
            [
                'question' => 'What is the meaning of the term “Market Segmentation”?',
                'options' => json_encode(['Dividing a market into smaller groups', 'Combining products for better reach', 'Advertising across all platforms', 'Selling to individual customers']),
                'correct_answer' => 1,
                'session' => 'Skill_Marketing'
            ],
            [
                'question' => 'How would you handle a conflict between two team members? Write your approach in 50 words.',
                'options' => json_encode([]),

                'session' => 'Skill_Hr'
            ],
            [
                'question' => 'What are the key steps in the recruitment process?',
                'options' => json_encode([]),

                'session' => 'Skill_Hr'
            ],
        ];

        foreach ($questions as $data) {
            Question::create($data);
        }
    }
}
