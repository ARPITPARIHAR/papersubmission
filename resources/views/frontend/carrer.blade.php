@extends('frontend.layouts.app')

@section('title', 'Careers - Join Our Team')
@section('meta_description', 'Explore exciting career opportunities at CarryCode Technology. Join our innovative team
building cutting-edge web, mobile, and digital solutions. Grow your tech career with us.')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/careers.css') }}">
    <div class="caar" style="background: linear-gradient(to bottom, #e5ffee 0%, #e2f6ff 100%);">
        <div class="container">
            <div class="heading">
                <h1>Work Culture at CarryCode Technology</h1>
            </div>
            <div class="container" style="margin-top:80px;">
                <div class="row align-items-center">
                    <div class="col-lg-8" data-aos="fade-right">
                        <p class="text-custom">
                            We specialize in Web and Mobile App Development, Digital Marketing, Graphic Designing, and
                            Software Development, delivering innovative solutions since 2022.
                        </p>
                        <p class="text-custom">
                            CarryCode Technology is a leading tech company driven by a passion for innovation and
                            excellence. Our diverse team thrives on creativity and continuous learning, fostering an
                            environment where ideas turn into reality. From cross-platform app development to iOS and
                            Android solutions, we empower businesses with cutting-edge technology and a commitment to
                            quality.
                        </p>
                    </div>
                    <!-- Image (4 Columns) -->
                    <div class="col-lg-4 " data-aos="fade-left">
                        <img src="assets/img/career-img-2.jpg" alt="Work Culture Image" class="shadow-effect">
                    </div>
                </div>
            </div>
        </div>

        <section class="why-join container text-center" data-aos="fade-up" data-aos-duration="1200">
            <h2 id="typewriter"></h2>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4 mb-3">
                    <div class="benefit-box">
                        <i class="fas fa-globe"></i>
                        <div class="benefit-title">Global Exposure</div>
                        <p class="benefit-text">
                            Gain hands-on experience working with international clients on innovative technologies,
                            broadening your exposure to diverse industries and enhancing your expertise.
                        </p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 mb-3">
                    <div class="benefit-box">
                        <i class="fas fa-rocket"></i>
                        <div class="benefit-title">Career Growth</div>
                        <p class="benefit-text">
                            Accelerate your career with personalized training programs, mentorship from experts,
                            and opportunities to work on high-impact projects that shape the future.
                        </p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 mb-3">
                    <div class="benefit-box">
                        <i class="fas fa-laptop-house"></i>
                        <div class="benefit-title">Remote & Hybrid</div>
                        <p class="benefit-text">
                            Enjoy a flexible work environment with remote and hybrid options, ensuring work-life balance,
                            better productivity, and the freedom to excel in your own space.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <h2 class="perks-heading">Our Perks & Benefits</h2>

        <div class="banner">
            <div class="card ">
                <img src="assets/img/benefit-3.webp" alt="Best Salary Package">
                <p class="title">Best Salary Package</p>
                <p class="salary-text">Best salary package in IT Industry</p>
            </div>
            <div class="card">
                <img src="assets/img/benefit-1.webp" alt="5 Days Working">
                <p class="title">5 Days Working</p>
                <p class="salary-text">5 Days working company</p>
            </div>
            <div class="card">
                <img src="assets/img/benefit-2.webp" alt="Friendly Environment">
                <p class="title">Friendly Environment</p>
                <p class="salary-text">Happy & friendly work environment</p>
            </div>


            <div class="card">
                <img src="assets/img/benefit-6.webp" alt="Referral Bonus">
                <p class="title">Referral Bonus</p>
                <p class="salary-text">Referral bonus program</p>
            </div>
            <div class="card">
                <img src="assets/img/benefit-7.webp" alt="Leave Encashment">
                <p class="title">Leave Encashment</p>
                <p class="salary-text">Leave encashment</p>
            </div>

            <div class="card">
                <img src="assets/img/benefit-9.webp" alt="Festival Celebrations">
                <p class="title">Celebrations</p>
                <p class="salary-text">Festival and birthday celebrations</p>
            </div>

        </div>
        <script src="script.js"></script>

        <section class="openings container"
            style=" background-color: linear-gradient(to bottom, #e5ffee 0%, #e2f6ff 100%);">
            <h2 class="text-center" style="     font-size: 40px;
        color: rgb(195, 25, 82);
        font-weight: bold;"> Our Current Openings</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="job-card">
                        <h3>Frontend Developer</h3>
                        <p>Experience: 2+ years | Location: Remote</p>
                        <a href="#" class="submit-btn" data-bs-toggle="modal" data-bs-target="#applyModal">Apply Now</a>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="job-card">
                        <h3>Backend Developer</h3>
                        <p>Experience: 3+ years | Location: Remote</p>
                        <a href="#" class="submit-btn" data-bs-toggle="modal" data-bs-target="#applyModal">Apply Now</a>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="job-card">
                        <h3>UI/UX Designer</h3>
                        <p>Experience: 1+ years | Location: Hybrid</p>

                        <a href="#" class="submit-btn" data-bs-toggle="modal" data-bs-target="#applyModal">Apply Now</a>

                    </div>
                </div>
            </div>
        </section>
        @if (session('success'))
        <div id="success-alert"
            class="alert alert-success alert-dismissible fade show position-fixed top-50 start-50 translate-middle shadow-lg"
            role="alert" style="z-index: 1050; max-width: 400px;">
            <strong>Success!</strong> {{ session('success') }}
        </div>
        @endif
        <section class="apply text-center" style=" background-color: rgb(232 255 180);   ">
            <h2 style="color: rgb(0, 107, 108);font-size:40px;">Shape Your Career Under Our Supervision</h2>
            <p style="font-size: 18px;">
                Become a part of our team and contribute to our vision. Share your resume at ->
                <a href="mailto:carrycodetechnology@gmail.com">carrycodetechnology@gmail.com</a>
            </p>
        </section>
@endsection
    @section('style')
    <style>
        /* Header */

        body {

            background-color: #e6fffb !important;
            /* Yellowish background */
        }

        .perks-heading {
            font-size: 28px;
            font-weight: bold;
            color: #0456cf;
            /* Deep Blue */
            text-transform: uppercase;
            letter-spacing: 1px;
            text-align: center;
            margin-bottom: 20px;
        }



        .text-custom {
            text-align: justify;
            color: #003366;
            /* Dark Gray */
            font-size: 21px;
            line-height: 1.8;
        }

        .shadow-effect {
            max-width: 100%;
            height: auto;
            display: block;
            margin: auto;
            position: relative;
            top: -20px;
            /* Thoda sa upar uthana */
            box-shadow: 0px 15px 30px rgba(50, 50, 50, 0.7);
            /* Dark gray shadow */
            border-radius: 10px;
            /* Smooth edges */
            transition: all 0.3s ease-in-out;
        }



        .heading {
            text-align: center;
            margin-top: 30px;

        }

        .heading img {
            max-width: 200px;
        }

        .content {
            display: flex;
            align-items: center;
        }

        .content img {
            max-width: 400px;
            margin-left: 20px;
        }

        .content div {
            flex: 1;
        }

        .career-heading {
            background: linear-gradient(to bottom, #e5ffee 0%, #e2f6ff 100%);
            ;
            padding: 60px 20px;
            color: white;
        }

        /* Why Join Section */
        .why-join {
            padding: 50px 0;
            background-color: #e6fffb;
        }

        /* Equal height benefit boxes */
        .benefit-box {
            background: black;
            color: white;
            padding: 20px;
            text-align: center;
            flex-grow: 1;
            min-height: 220px;
            border: 2px solid rgba(255, 255, 255, 0.3);

            /*  Square + Rounded Corners */
            border-radius: 50px 10px 50px 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }



        .benefit-title {
            font-size: 28px;
            font-weight: bold;
            color: #FFD700;
            margin-top: 10px;
        }

        .benefit-box i {
            font-size: 42px;
            color: #800000;
            margin-bottom: 10px;
        }

        .benefit-box:hover {
            transform: translateY(-5px);
        }

        /* Openings Section */
        .openings {
            padding: 50px 0;
            opacity: 0;
            transform: translateY(-50px);
            animation: slideDown 5s ease-out forwards;
        }

        .job-card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.1s ease-in-out;
            border: 2px dashed black;
        }

        .job-card:hover {
            transform: translateY(-5px);
        }

        .job-card h3 {
            color: #800000;
        }

        .submit-btn {
            background-color: #1c4d96;
            /* Dark blue */
            color: white;
            padding: 10px 20px;
            border: 2px solid white;
            /* White border */
            border-top-left-radius: 20px;
            /* Only top-left corner rounded */
            border-top-right-radius: 0;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 15px;
            display: inline-block;
            text-decoration: none;
            font-family: inherit;
            position: relative;
            animation: moveInOut 1.5s infinite alternate ease-in-out;
        }

        @keyframes moveInOut {
            0% {
                transform: translateX(0px);
            }

            100% {
                transform: translateX(10px);
            }
        }


        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        .btn-primary {
            display: inline-block;
            animation: pulse 1.5s infinite ease-in-out;
        }

        /* ✅ Fix for typewriter shifting */
        #typewriter {
            min-height: 40px;
            font-size: 28px;
            font-weight: bold;
            color: #008080;
            display: inline-block;
        }

        @media (max-width: 768px) {
            .job-card {
                margin-bottom: 15px;
                /* Card ke neeche gap */
            }

            .openings .row {
                row-gap: 15px;
                /* Row ke andar bhi gap */
            }
        }

        .modal-header {
            justify-content: center;
            position: relative;
        }

        .modal-title {
            flex: 1;
            /* Takes full width */
            text-align: center;
            /* Centers the text */
            color: white !important;
            /* Ensures white color */
        }

        .btn-close {
            position: absolute;
            right: 15px;
            /* Keeps close button at right */
        }


        @media (max-width: 768px) {
            .your-element {
                animation: none !important;
            }
        }

        @media (max-width: 768px) {
            .openings {
                opacity: 0;
                transform: translateY(-50px);
                animation: slideFromTop 1s ease-in-out forwards;
            }
        }

        @keyframes slideFromTop {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .banner {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            padding: 50px;
            max-width: 1200px;
            margin: 50px auto;
        }

        .card {
            background: linear-gradient(to right, #f37335, #fdc830);
            padding: 40px;
            text-align: center;
            border-radius: 50px;
            box-shadow: 15px 15px 25px rgba(0, 0, 0, 0.2);
            transition: transform 0.5s ease, box-shadow 0.3s ease, opacity 0.5s ease;
            opacity: 0;
        }

        .salary-text {
            color: #fffaf0;
            /* Soft white for readability */
            font-family: "Poppins", sans-serif;
            font-size: 25px;
        }

        .card:hover {
            transform: translateY(-12px);
            box-shadow: 10px 10px 25px rgba(0, 0, 0, 0.2);
        }

        .card img {
            height: 100px !important;
            width: 100px;
            margin-bottom: 20px;
            filter: drop-shadow(4px 4px 6px rgba(0, 0, 0, 0.2));
            display: block;
            /* Make the image a block element */
            margin-left: auto;
            /* Auto left margin */
            margin-right: auto;
            /* Auto right margin */
        }

        .title {
            font-size: 1.2em;

            margin-bottom: 10px;
            background-color: white;
            /* White background */
            color: black;
            /* Black text color */
            padding: 10px 15px;
            /* Adds spacing inside */
            border-radius: 15px;
            /* Rounded corners */
            display: inline-block;
            /* Prevents full-width stretching */
            text-align: center;
            /* Centers the text */
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
            /* Optional: Adds a soft shadow */
        }
    </style>
    @endsection
    @section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let text = "Why Work With Us?";
            let index = 0;
            let isDeleting = false;

            function typeEffect() {
                let typewriterElement = document.getElementById("typewriter");

                if (!isDeleting) {
                    if (index < text.length) {
                        typewriterElement.innerHTML += text.charAt(index);
                        index++;
                        setTimeout(typeEffect, 100);
                    } else {
                        isDeleting = true;
                        setTimeout(typeEffect, 1000);
                    }
                } else {
                    if (index > 0) {
                        typewriterElement.innerHTML = text.substring(0, index - 1);
                        index--;
                        setTimeout(typeEffect, 50);
                    } else {
                        isDeleting = false;
                        setTimeout(typeEffect, 500);
                    }
                }
            }

            typeEffect();
        });
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        setTimeout(function () {
            let alertBox = document.getElementById("success-alert");
            if (alertBox) {
                alertBox.style.transition = "opacity 0.5s ease-out";
                alertBox.style.opacity = "0";
                setTimeout(() => alertBox.remove(), 500);
            }
        }, 5000);
        document.addEventListener('DOMContentLoaded', function () {
            const cards = document.querySelectorAll('.card');
            cards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = 1;
                }, 300 * index); // 300ms delay between each card
            });
        });
        // 5 sec ke baad hide hoga
    </script>
    @endsection
    @section('modal')
    <div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded-4 shadow-lg">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title" id="applyModalLabel">Apply for Job</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form action="{{ route('job.apply') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control shadow-sm" id="name" name="name"
                                    placeholder="Enter your name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="mobile" class="form-label">Mobile Number</label>
                                <input type="tel" class="form-control shadow-sm" id="mobile" name="mobile"
                                    placeholder="Enter your phone number" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control shadow-sm" id="email" name="email"
                                    placeholder="Enter your email" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="experience" class="form-label">Experience (Years)</label>
                                <input type="number" class="form-control shadow-sm" id="experience" name="experience"
                                    placeholder="Enter experience" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="qualification" class="form-label">Qualification</label>
                            <input type="text" class="form-control shadow-sm" id="qualification" name="qualification"
                                placeholder="Your highest qualification" required>
                        </div>

                        <div class="mb-3">
                            <label for="resume" class="form-label">Upload Resume</label>
                            <input type="file" class="form-control shadow-sm" id="resume" name="logo" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary rounded-pill py-2 shadow-sm">Submit
                                Application</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection