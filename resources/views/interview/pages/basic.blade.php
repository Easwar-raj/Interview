<div class="basicBlockMain">
    <div class="basicBlockHeader">
        <div class="row">
            <div class="col-md-6"><img src="{{ asset('images/thikse-logo.png') }}" alt="Logo" class="basicBlockHeaderLogo"></div>
            <div class="col-md-6">
                <h4 class="basicBlockHeaderTitle">Thikse Software Solutions Campus Interview</h4>
            </div>
            <!-- <div class="col-md-4  contactInfo">
                <p>Phone No</p>
                <p>Email</p>
            </div> -->
        </div>
    </div>
    <div class="basicBlock">
        <div class="basicDetails">
            <div class="basicFormGroup">
                <div class="reg">
                    <h3 class="text-center">Register Form</h3>
                </div>
                <form action="/students/store" method="POST" class="formGroup" id="registrationForm">
                    @csrf
                    <div class="formGroupItem d-flex flex-column">
                        <label for="full_name">Full Name</label>
                        <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}" required>
                        @error('full_name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="formGroupItem d-flex flex-column">
                        <label for="contact_number">Contact Number</label>
                        <input type="tel" name="contact_number" id="contact_number" value="{{ old('contact_number') }}"  pattern="[0-9]{10}" maxlength="10" required>
                        @error('contact_number') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="formGroupItem d-flex flex-column">
                        <label for="email">Email Address</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="formGroupItem d-flex flex-column">
                        <label for="college_name">College Name</label>
                        <input type="text" name="college_name" id="college_name" value="{{ old('college_name') }}" required>
                        @error('college_name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="formGroupItem d-flex flex-column">
                        <label for="roll_number">Roll Number</label>
                        <input type="text" name="roll_number" id="roll_number" value="{{ old('roll_number') }}" required>
                        @error('roll_number') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="formGroupItem d-flex flex-column">
                        <label for="degree_specialization">Degree and Specialization</label>
                        <input type="text" name="degree_specialization" id="degree_specialization" value="{{ old('degree_specialization') }}" required>
                        @error('degree_specialization') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="formGroupItem d-flex flex-column">
                        <label for="graduation_date">Expected Graduation Date</label>
                        <input type="date" name="graduation_date" id="graduation_date" value="{{ old('graduation_date') }}" required>
                        @error('graduation_date') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="formGroupItem d-flex flex-column">
                        <label for="area_of_intrest">Preferred Job Role</label>
                        <select name="area_of_intrest" id="area_of_intrest" required>
                            <option value="" disabled selected>Select your preferred job role</option>
                            {{-- <option value="Operations">Operations</option>
                            <option value="Sales">Sales</option>
                            <option value="CC & Banking">CC & Banking</option>
                            <option value="HR Recruitment">HR Recruitment</option>
                            <option value="Lead Generation">Lead Generation</option>
                            <option value="Business Development">Business Development</option>
                            <option value="Admin & Accounts">Admin & Accounts</option>
                            <option value="IT">IT</option> --}}
                            <option value="Fullstack Developer">Fullstack Developer</option>
                            <option value="Frontend Developer">Frontend Developer</option>
                            <option value="Backend Developer">Backend Developer</option>
                            <option value="Cloud Engineering">Cloud Engineering</option>
                            <option value="Mobile Application Developer">Mobile Application Developer</option>
                        </select>
                        @error('area_of_intrest') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="submitBlock">
                        <button type="button" class="submitBtn" data-bs-toggle="modal" data-bs-target="#submitModal" disabled>
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="submitModal" tabindex="-1" aria-labelledby="submitModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="submitModalLabel">Assessment Test Instructions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

<h><b>Welcome to the Assessment Test!</b></h> <p>Please carefully read the following instructions before you begin:</p>

<ul>
    <li><strong>Duration</strong>: The test will last for 60 minutes.</li>
    <li><strong>Test Structure</strong>:
        <ul>
            <li><strong>Section 1: Aptitude Test</strong> – 11 Questions</li>
            <li><strong>Section 2: English Language and Communication Skills</strong> – 10 Questions</li>
            <li><strong>Section 3: General Awareness</strong> – 8 Questions</li>
            <li><strong>Section 4: Personality and Behavioral Assessment</strong> – 9 Questions</li>
            <li><strong>Section 5: Skill Test</strong> – 14 Questions</li>
        </ul>
    </li>
    <li><strong>Guidelines</strong>:
        <ul>
            <li><b>Enter Your Details:</b>Before starting the test, please enter your registered email ID and roll number in the designated fields.</li>
            <li>Ensure you are in a quiet environment with no distractions.</li>
            <li>Read each question carefully before answering.</li>
            <li>Manage your time effectively to attempt all sections.</li>
            <li>Avoid switching tabs, refreshing, or reloading the page, as it will result in your test being automatically submitted.</li>
        </ul>
        <p class="text-danger"> " If you switch to another tab, your test will be automatically submitted. "</p>
        <li>If the page is reloaded, your previously submitted answers will not be saved, and you will not be able to retake the test.</li>
        <li><b>Mouse Inactivity:</b>If there is no mouse activity detected on the test page, the test will be automatically submitted based on your screen time.</li>
    </li>
    <li><strong>Submission</strong>:
        <ul>
            <li>Once you complete all the questions, click the <strong>Submit</strong> button.</li>
            <li>Ensure you submit your test within the allotted time.</li>
        </ul>
    </li>
    <li><strong>Technical Support</strong>:
        <ul>
            <li>If you face any technical issues during the test, contact the support team immediately.</li>
        </ul>
    </li>
</ul>


<p><b>Best of Luck!</b></p>
<p>We wish you all the best as you take this step towards achieving your goals. Stay calm, focused, and give your best effort!</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"  onclick="submitForm()">submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script>
    const form = document.getElementById('registrationForm');
    const submitButton = document.querySelector('.submitBtn');

    form.addEventListener('input', () => {
        const allFilled = Array.from(form.elements).every(input => {
            if (input.type !== 'submit' && input.type !== 'button') {
                return input.value.trim() !== '';
            }
            return true;
        });

        submitButton.disabled = !allFilled;
    });

    function submitForm() {
        if (!submitButton.disabled) {
            form.submit();
        }
    }
</script>



<style>
    .basicBlockHeader {
        background: linear-gradient(to right, #ffffff, #0930ae);
        color: #fff;
    }


    @media (max-width: 320px) {


        .basicBlock
        {
            margin-top: 10%;

        }

        .contactInfo {
        text-align: center;
        }

        .basicBlockHeader .basicBlockHeaderTitle
        {
            font-size: 10px;
        }
    }

    @media (max-width: 375px) {


.basicBlock
{
    margin-top: 10%;

}

.contactInfo {
text-align: center;
}

.basicBlockHeader .basicBlockHeaderTitle
{
    font-size: 10px;
}
}
</style>
