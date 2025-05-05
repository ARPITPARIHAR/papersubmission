@extends('frontend.layouts.app')

@section('title', 'About Us')
@section('meta_description', 'Discover the story behind CarryCode Technology – a forward-thinking IT company delivering innovative web, mobile, SaaS, and digital solutions. Driven by passion, powered by technology.')

@section('content')
<div class="about-section">
    <h2>Who We Are</h2>
    <p>
        CarryCode Technology is a trailblazing force in digital transformation, driving innovation and automation to shape the future of technology.We believe in innovation,automation, and AI-driven solutions that empower businesses to operate smarter, faster, and more efficiently. Our journey began with a simple vision: to create technology that solves real-world problems, and today, we stand as a leader in software automation, enterprise solutions, and AI-based advancements.



        We specialize in custom software development, AI-powered analytics, intelligent web applications, cloud computing, and cybersecurity Every business is unique, and we take pride in crafting tailor-made solutions that cater to specific business needs. Our team of expert developers, AI engineers, cloud architects, and UI/UX designers work tirelessly to ensure our clients stay ahead in this fast-evolving digital landscape.
    </p>

    <p>
        At CarryCode Technology, we believe that automation is the key to efficiency. We develop intelligent systems that eliminate repetitive tasks, enhance productivity, and optimize business operations. Whether it’s AI-powered chatbots, predictive analytics, or automated business processes, we integrate the latest advancements in artificial intelligence to revolutionize industries.
    </p>

    <h2>Our Expertise</h2>
    <div class="expertise-box">
        <div class="expertise-item">AI & Machine Learning</div>
        <div class="expertise-item">Cybersecurity Solutions</div>
        <div class="expertise-item">Cloud Computing</div>
        <div class="expertise-item">Web Development</div>
        <div class="expertise-item">Enterprise Software</div>
        <div class="expertise-item">Data Analytics</div>
    </div>

    <p>
        Security is at the core of everything we build. With increasing cyber threats and data breaches, businesses need robust security solutions. We implement advanced encryption, secure cloud computing, and AI-driven security protocols** to protect sensitive business data and ensure compliance with global security standards.
    </p>

    <p>
        But we are more than just technology builders—we are dreamers, problem solvers, and innovators. We believe in the power of digital transformation and the endless possibilities it brings. Every line of code we write is a step towards a smarter and more connected future. We are committed to pushing the boundaries of technology to create solutions that empower businesses, improve lives, and make the world more efficient.
    </p>

    <p style="text-align: center; font-size: 1.4rem; font-weight: 600; color: #1e3c72;">
        🚀 Join us on this journey! Let’s build the future together with AI-driven automation, innovation, and digital excellence.
    </p>
</div>

@endsection
@section('style')
<!-- Google Fonts for an Elegant Look -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Rajdhani:wght@400;600;700&display=swap" rel="stylesheet">

<style>
    body {
        background: linear-gradient(135deg, #00B4DB, #0083B0);





        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
    }

    .about-section {
        width: 90%;
        max-width: 1100px;
        background: rgba(255, 255, 255, 0.95);
        padding: 40px;
        margin: 50px auto;
        box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.2);
        border-radius: 12px;
        animation: fadeIn 1.2s ease-in-out;
    }

    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700&family=Playfair+Display:wght@700&display=swap');

.about-section h2 {
    font-size: 3rem;
    font-weight: 500;

    letter-spacing: 2px;
    font-family: 'Playfair Display', serif;
    color: #ff5722;
    position: relative;
    display: inline-block;
    padding-bottom: 10px;
    text-shadow: 2px 2px 10px rgba(255, 87, 34, 0.5);
}

.about-section h2::after {
    content: "";
    width: 60%;
    height: 5px;
    background: linear-gradient(90deg, #ff5722, #ff9800);
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    border-radius: 5px;
    transition: width 0.3s ease-in-out;
}

.about-section h2:hover::after {
    width: 80%;
}


    .about-section p {
        font-size: 1.3rem;
        line-height: 1.8;
        color: #333;
        text-align: justify;
    }

    .expertise-box {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        margin-top: 30px;
    }

    .expertise-item {
        width: 30%;
        background: maroon;
        color: white;
        padding: 15px;
        text-align: center;
        border-radius: 10px;
        margin: 10px;
        font-size: 1.2rem;
        font-weight: 600;
        transition: transform 0.3s ease-in-out, background 0.3s;
    }

    .expertise-item:hover {
        transform: scale(1.05);
        background: #2a5298;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 768px) {
        .expertise-item {
            width: 45%;
        }
          .about-section h2 {
        font-size: 2rem;
    }
    }

    @media (max-width: 480px) {
        .expertise-item {
            width: 90%;
        }
         .about-section h2 {
        font-size: 1.8rem;
    }
    }
</style>
@endsection