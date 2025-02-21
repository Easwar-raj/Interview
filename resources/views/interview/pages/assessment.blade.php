<div class="basicBlockHeaderass">
    <div class="row">
        <div class="col-md-4"><img src="{{ asset('images/thikse-logo.png') }}" alt="Logo" class="basicBlockHeaderLogo"></div>
        <div class="col-md-4">
            <h4 class="basicBlockHeaderTitle">Thikse Software Solutions Campus Interview</h4>
        </div>
    </div>
</div>
<div class="assessmentBlock">
    <div class="assessment_person">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6">
                    <div class="person Detail">
                        <div class="nameBlock">
                            <label for="" class="">
                                <span class="label-eq">
                                    Name :
                                </span>
                                <span class="label-val">
                                    {{ $formData['full_name'] }}
                                </span>
                            </label>
                        </div>
                        <div class="rollNoBlock">
                            <label for="" class="">
                                <span class="label-eq">
                                    Roll No :
                                </span>
                                <span class="label-val">
                                    {{ $formData['roll_number'] }}
                                </span>
                            </label>
                        </div>
                        <div class="departBlock">
                            <label for="" class="">
                                <span class="label-eq">
                                    Degree :
                                </span>
                                <span class="label-val">
                                    {{ $formData['degree_specialization'] }}
                                </span>
                            </label>
                        </div>
                        <div class="departBlock">
                            <label for="" class="">
                                <span class="label-eq">
                                    Preferred Role :
                                </span>
                                <span class="label-val">
                                    {{ $formData['area_of_intrest'] }}
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="d-flex justify-content-end time">
                    <div>
                        <p id="countdown-timer" class="time-count">
                                <span id="minutes">60</span>:<span id="seconds">00</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="interviewBlock ">
       <div class="container">
            <div class="interviewHeading">
                <h1>Assessment</h1>
            </div>
       </div>
       <div class="container">
       <div class="question-container">
        <form action="{{ route('tests.storeResponse', ['test_id' => $testId]) }}" method="POST" class="questionBlock" id="questionBlock">
            @csrf
            @php
                $groupedQuestions = $questions->groupBy('session');
            @endphp
            @foreach($groupedQuestions as $session => $sessionQuestions)
                <div class="header">
                    <h3 class="headlevel2">
                        <span>Section {{ $loop->iteration }} :</span> {{ $session }}
                    </h3>
                </div>
 
                @php $serialNumber = 1; @endphp
 
                @foreach($sessionQuestions as $index => $question)
                    <div class="question">
                        <p class="fw-bold">{{ $serialNumber++ }}) {{ $question->question }}</p>
 
                        @php
                            $options = is_string($question->options) ? json_decode($question->options, true) : $question->options;
                        @endphp
 
                        @if(!empty($options))
                            <!-- Render options as radio buttons -->
                            @foreach($options as $optionIndex => $option)
                                <label>
                                    <input type="radio" name="{{ $question->id }}" value="{{ $optionIndex + 1 }}">
                                    {{ $option }}
                                </label>
                            @endforeach
                        @else
                            <!-- If no options, show an input field -->
                            <div>
                                <textarea name="{{ $question->id }}" placeholder="Enter your answer..." rows="4" cols="50" maxlength="255"></textarea>
                            </div>
                        @endif
                    </div>
                @endforeach
            @endforeach
 
            <div class="submitBlock d-flex justify-content-end mb-5 sm-sb">
                <input type="submit" value="Submit" class="submitBtn sm-Btn">
            </div>
        </form>
 
    </div>
</div>
    </div>
</div>

<script>
    // Set countdown duration (in seconds)
    let timeLeft = 60 * 60;  // 1 hour (3600 seconds)
 
    function updateTimer() {
        let minutes = Math.floor(timeLeft / 60);
        let seconds = timeLeft % 60;
 
        document.getElementById('minutes').innerText = minutes.toString().padStart(2, '0');
        document.getElementById('seconds').innerText = seconds.toString().padStart(2, '0');
 
        if (timeLeft <= 0) {
            clearInterval(timerInterval);
            alert('Time is up! Submitting your test.');
            submitTest();
        }
 
        timeLeft--;
    }
 
    // Function to submit the test
    function submitTest() {
        document.querySelector('.questionBlock').submit();
    }
 
    // Start countdown timer
    let timerInterval = setInterval(updateTimer, 1000);
 
    // Initial call to display the correct time at page load
    updateTimer();
 
    // Detect tab switching or minimizing the window
    document.addEventListener('visibilitychange', function() {
        if (document.hidden) {
            submitTest();
        }
    });
 
    // Detect when the browser window loses focus (user switches to another app)
    window.addEventListener('blur', function() {
        submitTest();
    });
 
    // Prevent right-click to discourage cheating
    document.addEventListener('contextmenu', function(event) {
        event.preventDefault();
    });
 
    // Prevent F12, Ctrl+Shift+I, Ctrl+U, and other developer tools
    document.addEventListener('keydown', function(event) {
        if (
            event.key === 'F12' ||
            (event.ctrlKey && event.shiftKey && (event.key === 'I' || event.key === 'J' || event.key === 'C')) ||
            (event.ctrlKey && (event.key === 'U' || event.key === 'S' || event.key === 'H' || event.key === 'A' || event.key === 'C')) ||
            event.key === 'PrintScreen' ||
            (event.ctrlKey && event.key === 'P')
        ) {
            event.preventDefault();
        }
    });

    if (performance.navigation.type === performance.navigation.TYPE_RELOAD || performance.getEntriesByType("navigation")[0].type === "reload") {
        alert("Important: If the page is reloaded, your previously submitted answers will not be saved, and you will not be able to retake the test.");
        submitTest();

   }
 
    // Submit form when screen size changes (resize event)
    // window.addEventListener('resize', function() {
    //     submitTest();
    // });

    
 
</script>





<style>

@import url('https://fonts.googleapis.com/css2?family=Anton+SC&family=Bebas+Neue&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Volkhov:ital,wght@0,400;0,700;1,400;1,700&display=swap');

  .assessmentBlock
  {
    font-family: "Poppins", serif;
    font-style: normal;
  }

    .nameBlock, .rollNoBlock, .departBlock{
            font-weight: 700;
    }

    .time-count
    {
        font-size: 40px;
        color: red;
    }

    textarea {
    width: 50%; /* Full width */
    height: 150px; /* Set height */
    padding: 10px; /* Add padding inside the textarea */
    font-size: 16px; /* Font size of the text */
    font-family: Arial, sans-serif; /* Font family */
    color: #333; /* Text color */
    background-color: #f9f9f9; /* Background color */
    border: 1px solid #ccc; /* Border style */
    border-radius: 5px; /* Rounded corners */
    resize: vertical; /* Allow resizing vertically only */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
    outline: none; /* Remove the outline when focused */
    transition: border-color 0.3s ease; /* Smooth transition for border color */
}

/* Add styles when the textarea is focused */
textarea:focus {
    border-color: #007bff; 
    background-color: #fff; /* Slightly brighter background */
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Glow effect */
}


.submitBtn
        {
            appearance: button;
            backface-visibility: hidden;
            background-color: #405cf5;
            border-radius: 6px;
            border-width: 0;
            box-shadow: rgba(50, 50, 93, .1) 0 0 0 1px inset,rgba(50, 50, 93, .1) 0 2px 5px 0,rgba(0, 0, 0, .07) 0 1px 1px 0;
            box-sizing: border-box;
            color: #fff;
            cursor: pointer;
            font-family: -apple-system,system-ui,"Segoe UI",Roboto,"Helvetica Neue",Ubuntu,sans-serif;
            font-size: 100%;
            height: 44px;
            line-height: 1.15;
            margin: 12px 0 0;
            outline: none;
            overflow: hidden;
            padding: 0 25px;
            position: relative;
            text-align: center;
            text-transform: none;
            transform: translateZ(0);
            transition: all .2s,box-shadow .08s ease-in;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            width: 10%;
        }


        .submitBtn:hover
        {
            background-color: #4f60be
        }

        .header
        {
            background: rgba(8, 57, 183, 0.2);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            color: black;
            border-radius: 5px;
            
        }
        .headlevel2
        {
            margin-top: 10px;
            padding:5px;
        }


@media (max-width: 320px) {

    textarea
    {
        width: 100%;
    }

    .submitBtn
    {
        width: 100%;
    }
    
    

}

@media (min-width: 321px) and (max-width: 480px) {
    textarea {
        width: 100%;
    }
    .submitBtn {
        width: 100%;
    }
}



/* Small Devices (Phones, 321px to 480px) */
@media (min-width: 321px) and (max-width: 480px) {
    textarea {
        width: 100%;
    }
    .submitBtn {
        width: 100%;
    }
}

/* Medium Devices (Tablets, 481px to 768px) */
@media (min-width: 481px) and (max-width: 768px) {
    textarea {
        width: 100%;
    }
    .submitBtn {
        width: 100%;
    }
}

/* Large Devices (Small Laptops, 769px to 1024px) */
@media (min-width: 769px) and (max-width: 1024px) {
    textarea {
        width: 80%;
    }
    .submitBtn {
        width: 80%;
    }
}




</style>