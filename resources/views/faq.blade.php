@extends("layouts.app")
@section('content')

<div class="container-fluid py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Frequently Asked Questions</h1>
        <div class="accordion bg-none" id="accordionExample">
            
            <!-- FAQ 1 -->
            <div class="accordion-item bg-none">
                <h2 class="accordion-header bg-white" id="headingOne">
                    <button class="accordion-button me text-secondary bg-white collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        1. What is Ethio Remote Jobs?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse bg-white collapse" aria-labelledby="headingOne"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Ethio Remote Jobs is a platform dedicated to connecting Ethiopian professionals with remote job
                        opportunities. We provide a wide range of services to both job seekers and employers in Ethiopia.
                    </div>
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="accordion-item bg-none">
                <h2 class="accordion-header bg-white" id="headingTwo">
                    <button class="accordion-button me text-secondary bg-white collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        2. What types of jobs are posted on Ethio Remote Jobs?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse bg-white collapse" aria-labelledby="headingTwo"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        On Ethio Remote Jobs, only remote job vacancies that can be done remotely are posted. This allows
                        job seekers to find opportunities that offer flexibility and the ability to work from anywhere.
                    </div>
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="accordion-item bg-none">
                <h2 class="accordion-header bg-white" id="headingThree">
                    <button class="accordion-button me text-secondary bg-white collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                        3. How can I find remote job opportunities on Ethio Remote Jobs?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse bg-white collapse" aria-labelledby="headingThree"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        To find remote job opportunities, simply join our Telegram channel by [insert instructions to join
                        the channel]. We regularly post remote job openings from various industries and sectors. Stay tuned
                        and browse through the job listings in the channel to find suitable positions.
                    </div>
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="accordion-item bg-none">
                <h2 class="accordion-header bg-white" id="headingFour">
                    <button class="accordion-button me text-secondary bg-white collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                        4. How do I apply for a remote job listing on Ethio Remote Jobs?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse bg-white collapse" aria-labelledby="headingFour"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        When you find a job listing that interests you, simply click on the "Apply" button provided within
                        the posting. Our dedicated bot will guide you through the application process. You can write an
                        application cover letter within the bot, and it will be submitted for evaluation by the employers.
                    </div>
                </div>
            </div>

            <!-- FAQ 5 -->
            <div class="accordion-item bg-none">
                <h2 class="accordion-header bg-white" id="headingFive">
                    <button class="accordion-button me text-secondary bg-white collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                        5. How can employers post remote job opportunities on Ethio Remote Jobs?
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse bg-white collapse" aria-labelledby="headingFive"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Employers can easily post their remote job vacancies through our dedicated bot. By accessing the
                        bot, employers can submit job descriptions, requirements, and any specific instructions for
                        application. Our team will review the submissions and approve the postings before they appear on
                        our Telegram channel.
                    </div>
                </div>
            </div>

            <!-- FAQ 6 -->
            <div class="accordion-item bg-none">
                <h2 class="accordion-header bg-white" id="headingSix">
                    <button class="accordion-button me text-secondary bg-white collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                        6. Can employers post non-remote job vacancies on Ethio Remote Jobs?
                    </button>
                </h2>
                <div id="collapseSix" class="accordion-collapse bg-white collapse" aria-labelledby="headingSix"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        No, Ethio Remote Jobs specifically focuses on remote job vacancies. However, we have another
                        platform called "Ethio Freelance Jobs" where employers can post non-remote job vacancies. This
                        ensures that both remote and non-remote job seekers can find relevant opportunities.
                    </div>
                </div>
            </div>

            <!-- FAQ 7 -->
            <div class="accordion-item bg-none">
                <h2 class="accordion-header bg-white" id="headingSeven">
                    <button class="accordion-button me text-secondary bg-white collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                        7. How does Ethio Remote Jobs verify the legitimacy of job vacancies?
                    </button>
                </h2>
                <div id="collapseSeven" class="accordion-collapse bg-white collapse" aria-labelledby="headingSeven"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        To ensure the legitimacy of job vacancies, Ethio Remote Jobs employs a thorough verification
                        process. We verify the authenticity of companies cooperated with us by registering them and we
                        verify by requesting their business address and social media presence, including their websites
                        while posting a job vacancy. This helps us maintain a safe and trustworthy environment for job
                        seekers.
                    </div>
                </div>
            </div>

            <!-- FAQ 8 -->
            <div class="accordion-item bg-none">
                <h2 class="accordion-header bg-white" id="headingEight">
                    <button class="accordion-button me text-secondary bg-white collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight">
                        8. What unique features does the bot offer?
                    </button>
                </h2>
                <div id="collapseEight" class="accordion-collapse bg-white collapse" aria-labelledby="headingEight"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        The bot on the Ethio Remote Jobs platform offers several unique features to enhance the user
                        experience. These include a referral program feature, user authentication feature, and CV
                        submission feature. These features aim to streamline the job application process and provide
                        additional benefits to our users.
                    </div>
                </div>
            </div>

            <!-- FAQ 9 -->
            <div class="accordion-item bg-none">
                <h2 class="accordion-header bg-white" id="headingNine">
                              <button class="accordion-button me text-secondary bg-white collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseNine" aria-expanded="true" aria-controls="collapseNine">
                        9. How can I contact Ethio Remote Jobs for support or inquiries?
                    </button>
                </h2>
                <div id="collapseNine" class="accordion-collapse bg-white collapse" aria-labelledby="headingNine"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        For any support or inquiries, you can reach out to us through our contact page on the Ethio Remote
                        Jobs website. Fill out the form with your details and message, and our team will get back to you as
                        soon as possible.
                    </div>
                </div>
            </div>

            <!-- FAQ 10 -->
            <div class="accordion-item bg-none">
                <h2 class="accordion-header bg-white" id="headingTen">
                    <button class="accordion-button me text-secondary bg-white collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
                        10. Is there a fee to use Ethio Remote Jobs services?
                    </button>
                </h2>
                <div id="collapseTen" class="accordion-collapse bg-white collapse" aria-labelledby="headingTen"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        No, Ethio Remote Jobs is completely free for job seekers. We do not charge any fees for accessing
                        job listings or applying for remote job opportunities. Employers, however, may have to pay a
                        nominal fee to post job vacancies on our platform.
                    </div>
                </div>
            </div>

            <!-- FAQ 11 -->
            <div class="accordion-item bg-none">
                <h2 class="accordion-header bg-white" id="headingEleven">
                    <button class="accordion-button me text-secondary bg-white collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseEleven" aria-expanded="true" aria-controls="collapseEleven">
                        11. Can I search for specific job categories on Ethio Remote Jobs?
                    </button>
                </h2>
                <div id="collapseEleven" class="accordion-collapse bg-white collapse" aria-labelledby="headingEleven"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        Yes, you can search for specific job categories on Ethio Remote Jobs. Our Telegram channel allows
                        you to filter job listings by categories such as IT, marketing, finance, design, and more. This
                        makes it easier for you to find job opportunities in your preferred field.
                    </div>
                </div>
            </div>

           
        </div>
    </div>
</div>

        
@endsection