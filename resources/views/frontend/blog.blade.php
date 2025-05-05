@extends('frontend.layouts.app')

@section('title', 'Blogs')

@section('content')




<section class="blog" style="background:linear-gradient(to bottom, #fffdf2 0, #ffeff5 100%);">



  <h1 class="headline">ByteWave: Redefining the Tech Landscape</h1>
 <div class="blog-container">
    <div class="blog-card">
        <img src="assets/img/automation.jpg" alt="AI & Automation">
        <h3>AI & Automation</h3>
        <p>Artificial Intelligence is transforming the way we interact with technology.  
        Businesses are now adopting AI-driven solutions for better efficiency.  
        From chatbots to automation tools, AI is making work smarter.  
        Machine learning is helping analyze large datasets with ease.  
        The healthcare sector is also leveraging AI for diagnosis.  
      .</p>
        <a href="#">Read More</a>
    </div>

    <div class="blog-card">
        <img src="assets/img/cloud.png" alt="Cloud Computing">
        <h3>Cloud Computing</h3>
        <p>Cloud computing enables remote access to data and applications.  
        Businesses are switching to cloud storage for better security.  
        SaaS (Software as a Service) is a growing trend in IT.  
        Cloud providers like AWS, Azure, and GCP dominate the industry.  
        Hybrid cloud solutions are gaining popularity for flexibility.  
   .</p>
        <a href="#">Read More</a>
    </div>

    <div class="blog-card">
        <img src="assets/img/cyberjpeg.jpeg" alt="Cybersecurity">
        <h3>Cybersecurity Trends</h3>
        <p>Cyber threats are increasing with digital transformation.  
        Companies are investing more in data protection.  
        Ethical hacking is being used to strengthen security systems.  
        Multi-factor authentication improves online security.  
        Ransomware attacks are becoming more sophisticated.  
        Cybersecurity awareness training is essential for employees.  
        </p>
        <a href="#">Read More</a>
    </div>

    <div class="blog-card">
        <img src="assets/img/5gjpeg.jpeg" alt="5G Technology">
        <h3>5G & Connectivity</h3>
        <p>5G is revolutionizing the telecom industry with ultra-fast speeds.  
        Smart cities are leveraging 5G for IoT devices.  
        Autonomous vehicles rely on 5G for real-time navigation.  
        Industries like healthcare benefit from faster data transmission.  
        5G is enhancing gaming experiences with lower latency.  
       .</p>
        <a href="#">Read More</a>
    </div>

    <div class="blog-card">
        <img src="assets/img/block.jpg" alt="Blockchain Technology">
        <h3>Blockchain Innovations</h3>
        <p>Blockchain technology ensures secure and transparent transactions.  
        Cryptocurrencies like Bitcoin rely on blockchain networks.  
        Smart contracts are automating agreements and payments.  
        Decentralized finance (DeFi) is changing traditional banking.  
        Governments are exploring blockchain for voting systems.  
       .</p>
        <a href="#">Read More</a>
    </div>

    <div class="blog-card">
        <img src="assets/img/quantum.jpeg" alt="Quantum Computing">
        <h3>Quantum Computing</h3>
        <p>Quantum computing offers exponential processing power.  
        Scientists are exploring quantum supremacy applications.  
        Cryptography will evolve with quantum advancements.  
        Pharmaceutical companies use quantum for drug discovery.  
        Financial institutions are testing quantum risk modeling.  
      </p>
        <a href="#">Read More</a>
    </div>

</div>
</section>



@endsection
<style>
/* General Blog Styling */
.blog-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); /* Ensures 3-columns */
    gap: 20px;
    padding: 20px;
    max-width: 1200px;
    margin: auto;
}

.blog-card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    text-align: center;
    transition: transform 0.3s ease-in-out;
    padding-bottom: 10px;
}

.blog-card:hover {
    transform: scale(1.05);
}

.blog-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.blog-card h3 {
    font-size: 1.4rem;
    margin: 15px 0;
    color: #333;
}

.blog-card p {
    font-size: 0.95rem;
    color: #666;
    padding: 0 15px;
    text-align: left;
}

.blog-card a {
    display: inline-block;
    margin: 15px;
    padding: 8px 15px;
    background: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
}

.blog-card a:hover {
    background: #0056b3;
}

        .headline {
            font-size: 2rem;
            
           text-align:center;
              font-family: Poppins, sans-serif;
    color: #050748;
            animation: zoomIn 1.5s ease-in-out, flash 1.5s infinite alternate;
           
        }

        @keyframes zoomIn {
            0% {
                transform: scale(0.8);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes flash {
            0% {
                opacity: 1;
            }
            100% {
                opacity: 0.5;
            }
        }


 
</style>