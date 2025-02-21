<head>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    
</head>
<div class="basicBlockMain">
    <div class="basicBlockHeader">
        <div class="row">
            <div class="col-md-6"><img src="{{ asset('images/thikse-logo.png') }}" alt="Logo" class="basicBlockHeaderLogo"></div>
            <div class="col-md-6"><h4 class="basicBlockHeaderTitle">Thikse Software Solutions Campus Interview Portal</h4></div>
</div>
</div>
</div>


<div class="container mt-4">
    <div class="text-left mb-4 mt-4">
        <a href="{{ url()->previous() }}" class="view-btn"> <i class="bi bi-arrow-left-circle me-2"></i>Back to Scores</a>
    </div>
    <h3>Test Results | {{ $student_name }} - {{ $roll_number }}</h3>
    <div class="card mb-4">
        <div class="card-body">
        <h4 class="text-center mb-3">Score Summary</h4>
            <div class="row text-center">
                <div class="col-md-4 "><h5 class="score-table">Total Score: <span class="text-success fw-bold">{{ $score }}</span></h5></div>
                <div class="col-md-4 "><h5 class="score-table">Correct MCQ Answers: <span class="text-success fw-bold">{{ $correct_answers }}</span> out of {{ $total_mcqs }}</h5></div>
                <div class="col-md-4 "><h5 class="score-table">Total Non-MCQ Questions: <span class="text-success fw-bold">{{ $total_non_mcq_questions }}</span></h5></div>
            </div>
        </div>
    </div>

    <!-- Accordion -->
    <div class="accordion" id="resultsAccordion">
        <!-- MCQ Questions -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingMCQ">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseMCQ" aria-expanded="false" aria-controls="collapseMCQ">
                    <span class="fw-bold">Multiple Choice Questions</span>
                </button>
            </h2>
            <div id="collapseMCQ" class="accordion-collapse collapse show" aria-labelledby="headingMCQ" data-bs-parent="#resultsAccordion">
                <div class="accordion-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="text-center">
                                <tr class="">
                                    <th class="">Sr.No</th>
                                    <th>Question</th>
                                    <th>Options</th>
                                    <th>Correct Answer</th>
                                    <th>User's Answer</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $var = 1 @endphp
                                @foreach($mcq_questions as $question)
                                <tr>
                                    <td>{{$var}}</td>
                                    <td>{{ $question['question'] }}</td>
                                    <td>
                                        <ul class="list-unstyled">
                                            @foreach($question['options'] as $index => $option)
                                                <li style="{{ $index + 1 == $question['correct_answer'] ? 'color: green; font-weight: 800;' : '' }}; ">
                                                    {{ $option }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{ $question['correct_answer'] }}</td>
                                    <td>{{ $question['user_answer'] ?? 'Not answered' }}</td>
                                    <td>
                                        @if($question['is_correct'])
                                            <span class="badge bg-success">Correct</span>
                                        @else
                                            <span class="badge bg-danger">Incorrect</span>
                                        @endif
                                    </td>
                                </tr>
                                @php $var++ @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Non-MCQ Questions -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingNonMCQ">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNonMCQ" aria-expanded="false" aria-controls="collapseNonMCQ">
                <span class="fw-bold">Subjective Questions</span>
                </button>
            </h2>
            <div id="collapseNonMCQ" class="accordion-collapse collapse" aria-labelledby="headingNonMCQ" data-bs-parent="#resultsAccordion">
                <div class="accordion-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr >
                                    <th>Sr.No</th>
                                    <th>Question</th>
                                    <th>User's Answer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $var2 = 1 @endphp
                                @foreach($non_mcq_questions as $question)
                                <tr>
                                    <td>{{$var2}}</td>
                                    <td>{{ $question['question'] }}</td>
                                    <td>{{ $question['user_answer'] ?? 'Not answered' }}</td> 
                                </tr>
                                @php $var2++ @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</div>

<style>
    .badge {
        font-size: 0.9em;
        padding: 0.5em 1em;
    }
    .table th, .table td {
        vertical-align: middle;
    }

    .view-btn {
    background-color: #8196de;
    color: white;
    padding: 8px 16px;
    border-radius: 4px;
    text-decoration: none;
    display: inline-block;
    border: none;
    transition: background-color 0.3s;
}

.card
{
    border: none;
}


.score-table
{
    background: rgba(255, 255, 255, 0.2);
    border-radius: 5px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    padding: 10px;
}


</style>
