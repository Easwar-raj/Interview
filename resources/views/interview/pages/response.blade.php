<div class="container my-5 cbg">
    <div class="text-center mb-5">
        <img src="{{ asset('images/thankyou.svg') }}" alt="thankyou" class="thankyouimg">
        <h3 class="fw-bold">Thank You for Completing the Assessment!</h3>

    <div class="text-center mb-5">
        <h5 class="fw-bold">Best Wishes</h5>
    </div>
        <p class="text-muted">We appreciate the time and effort you put into taking the test. Your responses have been successfully submitted, and we’re excited to evaluate your performance.</p>
    </div>
    <div class="mb-4">
        <h6 class="fw-bold">What’s Next?</h6>
        <p class="text-muted">Our team will carefully review your results to assess your skills, knowledge, and potential. Based on your performance, we’ll get in touch with you shortly to share the next steps in the process.</p>
    </div>
    <div class="mb-4">
        <h6 class="fw-bold">Stay Positive!</h6>
        <p class="text-muted">Thank you once again for showcasing your abilities. We look forward to the possibility of collaborating with you in the future!</p>
    </div>
    @php
        $details = json_decode($details, true);
    @endphp
    @if(isset($details))
        <div class="table-responsive">

        </div>
    @else
        <p class="text-center text-muted">No test results found.</p>
    @endif
</div>

<script>

const redirectTime = 2000; // 2 seconds

// URL to redirect to
const redirectUrl = "/";

// Function to perform the redirection
function autoRedirect() {
    console.log(`Redirecting to ${redirectUrl}...`);
    window.location.href = redirectUrl;
}

// Set a timer to execute the autoRedirect function after the specified time
setTimeout(autoRedirect, redirectTime);
</script>







<style>
    @import url('https://fonts.googleapis.com/css2?family=Anton+SC&family=Bebas+Neue&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Volkhov:ital,wght@0,400;0,700;1,400;1,700&display=swap');

    .cbg
    {
        font-family: "Poppins", serif;
        font-style: normal;
    }
    .thankyouimg
    {
        width: 250px;
        height: auto;
    }


</style>
