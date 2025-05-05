@extends('frontend.layouts.app')

@section('title', 'Portfolio')

@section('content')
  

<section class="portfolio" style="background:linear-gradient(to bottom, #fff8fb 0, #d0fcf6 100%);">


    <h2 class="section-title">From Concept to Execution: Our Portfolio</h2>




  <div class="main-content">
    <div class="left-section">

    <div class="tabs">
        <div class="tab active" onclick="showContent('all')">All</div>
        <div class="tab" onclick="showContent('web-development')">Web Development</div>
        <div class="tab" onclick="showContent('applications')">Applications</div>
        <div class="tab" onclick="showContent('search-optimization')">Search Optimization</div>
        <div class="tab" onclick="showContent('automation')">Automation</div>
        <div class="tab" onclick="showContent('cybersecurity')">Cybersecurity Solutions</div>
        <div class="tab" onclick="showContent('cloud-computing')">Cloud Computing</div>
        <div class="tab" onclick="showContent('ai-ml')">AI & Machine Learning</div>
    </div>
</div>
</div>
     <div class="content-container" >

 <div class="content web-development" >
   <div class="content-left">
      <h3 ">Front-End Development</h3>
<p>
        We specialize in crafting stunning, responsive front-end interfaces using modern tools like HTML5, CSS3, JavaScript, and React. 
        Our front-end developers ensure pixel-perfect designs that work seamlessly across all devices and screen sizes. 
        Whether it's a corporate website or an interactive web app, we focus on creating user-friendly experiences. 
        With a mobile-first approach, accessibility and speed are never compromised. 
        Animations, transitions, and intuitive layouts enhance user engagement. 
        We also ensure cross-browser compatibility to deliver consistency.
      </p>
    </div>
    <div class="content-right">
      <img src="assets/img/fd.png" alt="Front-End Development">
    </div>
  </div>

 <div class="content web-development">
    <div class="content-left">
      <h3>Back-End Development</h3>
      <p>
        Our back-end development solutions are built using robust technologies like Laravel, Node.js, and Python. 
        We focus on building secure, scalable, and high-performance APIs and server-side applications. 
        Data integrity, authentication systems, and seamless integration with front-end systems are our priorities. 
        We ensure smooth data flow, reliable user management, and effective error handling. 
        We follow clean coding practices, making the system easy to maintain and extend. 
        Our team can also integrate third-party services and deploy systems on cloud platforms like AWS.
      </p>
    </div>
    <div class="content-right">
      <img src="assets/img/backnd.png" alt="Back-End Development">
    </div>
  </div>
    

 
 <!-- First Applications Container -->
 <div class="content applications">
  <div class="content-left">
    <h3>Applications</h3>
    <p>
      Build high-performance Android, iOS, and cross-platform apps with Flutter and React Native.
      Our team ensures user-friendly interfaces, robust functionality, and smooth performance across all devices.
      Whether you're building a social app or an enterprise solution, we've got you covered.
    </p>
  </div>
  <div class="content-right">
    <img src="assets/img/webhero.jpg" alt="Applications">
  </div>
</div>

<!-- Second Applications Container -->
 <div class="content applications">
  <div class="content-left">
    <h3>Applications</h3>
    <p>
      We also offer app maintenance, updates, and scaling solutions post-deployment.
      Integration with third-party APIs, analytics tools, and cloud services is done seamlessly.
      Experience app development that’s not just about coding, but about delivering value to your users.
    </p>
  </div>
  <div class="content-right">
    <img src="assets/img/app2.jpg" alt="Applications Maintenance">
  </div>
</div>
<!-- Search Optimization - 1 -->
<!-- Search Optimization - 1 -->
<div class="content search-optimization">
  <div class="content-left">
    <h3>Search Optimization</h3>
    <p>
      Improve your online visibility with our result-driven SEO strategies. From keyword research to technical audits, we ensure your website ranks high on search engines.
      We conduct competitive analysis, optimize on-page elements like meta tags, and enhance page speed for better user experience.
      Our team also focuses on structured data implementation and mobile optimization to keep your site in line with modern search engine standards.
      With continuous monitoring and reporting, we help you stay ahead in search rankings consistently.
    </p>
  </div>
  <div class="content-right">
    <img src="assets/img/opi2,png.png" alt="SEO">
  </div>
</div>

<!-- Search Optimization - 2 -->
<div class="content search-optimization">
  <div class="content-left">
    <h3>Search Optimization</h3>
    <p>
      We optimize content, build quality backlinks, and monitor analytics to ensure continuous growth. Our local and global SEO solutions boost your brand authority effectively.
      Whether you’re targeting regional customers or a global audience, our tailored approach fits your business needs.
      We also manage Google Business Profiles, local citations, and location-based landing pages for enhanced discoverability.
      Our data-driven strategies help you convert organic traffic into real, measurable results.
    </p>
  </div>
  <div class="content-right">
    <img src="assets/img/optimi.jpg" alt="Advanced SEO">
  </div>
</div>

<!-- Automation Section -->
<div class="content automation">
  <div class="content-left">
    <h3>Automation</h3>
    <p>
      Streamline repetitive tasks with powerful automation tools. Our automation services help reduce errors, improve efficiency, and free up your time for strategic work.
      We implement workflows that eliminate manual processes, ensuring higher accuracy and faster execution. From email marketing automation to customer onboarding and internal task scheduling, our solutions are tailored to fit your unique business needs.
      By leveraging platforms like Zapier and custom scripts, we enable seamless integration between tools. This leads to smoother collaboration, faster decision-making, and minimal manual oversight.
    </p>
  </div>
  <div class="content-right">
    <img src="assets/img/am.jpg" alt="Automation">
  </div>
</div>

<div class="content automation">
  <div class="content-left">
    <h3>Automation</h3>
    <p>
      From marketing workflows to business processes, we build intelligent automation systems using Zapier, Integromat, and custom APIs that transform your operations.
      We create powerful multi-step workflows that trigger actions, notify your teams, and keep your business running 24/7. Even complex tasks like syncing CRMs or lead distribution become hands-free.
      With real-time reporting and automation analytics, you can track performance, spot issues early, and adjust strategies instantly.
    </p>
  </div>
  <div class="content-right">
    <img src="assets/img/auto2.jpeg" alt="Workflow Automation">
  </div>
</div>

<!-- Cybersecurity Section -->
<div class="content cybersecurity">
  <div class="content-left">
    <h3>Cybersecurity</h3>
    <p>
      Protect your digital assets with our cutting-edge cybersecurity services. We implement firewalls, encryption, and threat monitoring to secure your environment.
      Whether you're a startup or enterprise, we offer tailored solutions including antivirus setup, multi-factor authentication, and regular audits to identify vulnerabilities before attackers do.
      Our experts ensure compliance with industry regulations like GDPR, HIPAA, and ISO standards, helping you maintain customer trust.
    </p>
  </div>
  <div class="content-right">
    <img src="assets/img/security.jpeg" alt="Cybersecurity">
  </div>
</div>

<div class="content cybersecurity">
  <div class="content-left">
    <h3>Cybersecurity</h3>
    <p>
      Our team conducts vulnerability assessments, penetration testing, and 24/7 incident response to ensure your systems are safe from evolving threats.
      We simulate real-world attacks to find weak points before hackers do. Our layered defense strategy protects your network, endpoints, and cloud systems.
      With continuous monitoring and actionable reports, you stay ahead of cyber threats and keep your business secure at all times.
    </p>
  </div>
  <div class="content-right">
    <img src="assets/img/cyb1.png" alt="Cybersecurity Threat Detection">
  </div>
</div>

<!-- Cloud Computing Section -->
<div class="content cloud-computing">
  <div class="content-left">
    <h3>Cloud Computing</h3>
    <p>
      Scale your infrastructure with ease using AWS, Azure, and GCP. Our cloud services help you deploy fast, stay flexible, and reduce infrastructure costs.
      From virtual machines and storage to scalable databases and load balancers, we help architect and manage cloud platforms that align with your goals.
      We ensure security, speed, and uptime, giving your users a seamless experience across devices and locations worldwide.
    </p>
  </div>
  <div class="content-right">
    <img src="assets/img/clld.jpg" alt="Cloud Services">
  </div>
</div>

<div class="content cloud-computing">
  <div class="content-left">
    <h3>Cloud Computing</h3>
    <p>
      We assist in cloud migration, serverless architecture setup, and ensuring high availability. Let us handle your backend while you focus on growth.
      Our DevOps experts implement CI/CD pipelines, automate deployments, and optimize resource usage with scalable environments.
      We also monitor performance metrics and ensure disaster recovery plans are in place, keeping your services online even during outages.
    </p>
  </div>
  <div class="content-right">
    <img src="assets/img/computingcloud.png" alt="Cloud Migration">
  </div>
</div>

<!-- AI & Machine Learning Section -->
<div class="content ai-ml">
  <div class="content-left">
    <h3>AI & Machine Learning</h3>
    <p>
      Unlock the power of data with AI solutions that think, learn, and adapt. We build intelligent systems for prediction, classification, and automation.
      Whether it’s customer segmentation, fraud detection, or demand forecasting  our AI models analyze data at scale and evolve with accuracy over time.
      We work closely with your team to train and deploy custom algorithms that solve real business challenges and improve decision-making.
    </p>
  </div>
  <div class="content-right">
    <img src="assets/img/learn2.jpeg" alt="AI & ML">
  </div>
</div>

<div class="content ai-ml">
  <div class="content-left">
    <h3>AI & Machine Learning</h3>
    <p>
      From chatbots to recommendation engines, we deliver practical AI applications. Our models are trained using TensorFlow, PyTorch, and other modern ML frameworks.
      We also offer NLP-based tools, computer vision systems, and intelligent assistants that boost engagement and enhance customer satisfaction.
      Our AI services are scalable, adaptive, and integrated into your ecosystem  enabling smarter workflows and deeper insights.
    </p>
  </div>
  <div class="content-right">
    <img src="assets/img/ai.jpeg" alt="ML Solutions">
  </div>
</div>

<!-- Automation - 1 -->
 
</section>

<script>
  function showContent(category) {
    const allContents = document.querySelectorAll('.content');
    const allTabs = document.querySelectorAll('.tab');

    // Show/hide content
    allContents.forEach(content => {
      if (category === 'all' || content.classList.contains(category)) {
        content.style.display = 'flex';
      } else {
        content.style.display = 'none';
      }
    });

    // Update active tab
    allTabs.forEach(tab => tab.classList.remove('active'));
    const clickedTab = Array.from(allTabs).find(tab => tab.getAttribute('onclick')?.includes(category));
    if (clickedTab) clickedTab.classList.add('active');
  }

  // Call this once on load to show all content initially
  window.onload = () => {
    showContent('all');
  };
</script>

<style>
.content {
  display: flex;
  align-items: flex-start;
  gap: 20px;
  margin-bottom: 40px;
}

.content-left {
  flex: 3;
}

.content-right {
  flex: 2;
  display: flex;
  align-items: flex-start;
  justify-content: center;
}

.content-right img {
  width: auto;
  height: 100%;
  max-height: 300px;
  object-fit: contain;
  border-radius: 8px;
}

.content-left p {
  line-height: 1.6;
  font-size: 16px;
  text-align: justify;
  margin-left: 10px;
}



h3 {
  font-size: 28px;
  font-weight: bold;
  margin-bottom: 20px;
  text-align:center;
}

.web-development {
  display: flex;
  justify-content: space-between; /* Left Content & Right Image */
  align-items: center;
  width: 100%;
}

.content {
  flex: 1; /* Left content ko zyada space dena */
  text-align: left; /* Text left align */
  padding-right: 20px;
   width: 800px; /* Image aur text ke beech gap */
}












.tabs {
  display: flex;
  margin-bottom: 20px;
}

.tab {
  padding: 10px 20px;
  border: 1px solid #ddd;
  margin-right: 10px;
  cursor: pointer;
      border-radius: 40px 40px 40px 20px;
  
  background-color:black; /* ह े बगरउड */
  text-align: center; /* टसट क कर े ख े  */
  white-space: nowrap;
  color:white;/* ट्स   ी ाइ ं खे क  */
}

.tab.active {
  background-color: #e91e63; /* Pink color for active tab */
  color: white;
}
.portfolio-item {
  border: 1px solid #ddd;
  padding: 20px;
  margin-bottom: 20px;
  display: flex;
}

.portfolio-item img {
  width: 200px;
  margin-right: 20px;
}

.portfolio-item-details {
  flex: 1;
}


.section-title {
    text-align: center;  /* Center Align */
    font-size: 2.5rem;  /* Large & Bold Font */
    font-family: 'Poppins', sans-serif; /* Modern Font */

    color: #D72638; /* Attractive Red Shade */
  
  
    background:black; /* Gradient Text Effect */
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    
}
.content {
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: 30px;
  padding: 30px;
  margin: 20px auto;
  margin-bottom: 40px !important; /* Force bottom space between containers */
  border-radius: 16px;
  width: 90%;
  max-width: 700px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
}



.content:not(.active) {
  display: none;
}



.web-development {
  background: linear-gradient(to right, #e0f7fa, #e1f5fe); /* Soft blue */
}

.applications {
  background: linear-gradient(to right, #fff3e0, #ffe0b2); /* Soft orange */
}

.search-optimization {
  background: linear-gradient(to right, #f3e5f5, #e1bee7); /* Soft purple */
}

.automation {
  background: linear-gradient(to right, #f1f8e9, #dcedc8); /* Light green */
}

.cybersecurity {
  background: linear-gradient(to right, #ede7f6, #d1c4e9); /* Lavender */
}

.cloud-computing {
  background: linear-gradient(to right, #e0f2f1, #b2dfdb); /* Teal-ish */
}

.ai-ml {
  background: linear-gradient(to right, #fff8e1, #ffecb3); /* Light yellow */
}


@media (max-width: 600px) {
  .tabs {
    flex-wrap: nowrap;
    overflow-x: auto;
  }

  .tab {
    font-size: 14px;
    min-width: max-content;
  }
}



</style>


@endsection