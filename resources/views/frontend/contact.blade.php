@extends('frontend.layouts.app')
@section('title','Contact Us')
@section('meta_description', 'Get in touch with CarryCode Technology – your trusted partner for web and mobile app development, SaaS solutions, and digital marketing services. Let’s build something great together.')
@section('content')
<section id="contact" class="contact section light-background">


    <div class="container section-title mt-5" data-aos="fade-up">
        <h2>Contact</h2>
        <p> Have questions or need more information? Reach out to us — we're here to help you every step of the way.</p>
    </div>


    <div class="container" data-aos="fade-up" data-aos-delay="100">

      <div class="row g-4 g-lg-5">
        <div class="col-lg-5">
          <div class="info-box" data-aos="fade-up" data-aos-delay="200">
            <h3>Contact Info</h3>
         

            <div class="info-item" data-aos="fade-up" data-aos-delay="300">
              <div class="icon-box">
                <i class="bi bi-geo-alt"></i>
              </div>
              <div class="content">
                <h4>Our Location</h4>
                <p>A108 Adam Street</p>
                <p>New York, NY 535022</p>
              </div>
            </div>

            <div class="info-item" data-aos="fade-up" data-aos-delay="400">
              <div class="icon-box">
                <i class="bi bi-telephone"></i>
              </div>
              <div class="content">
                <h4>Phone Number</h4>
                <p>+1 5589 55488 55</p>
                <p>+1 6678 254445 41</p>
              </div>
            </div>

            <div class="info-item" data-aos="fade-up" data-aos-delay="500">
              <div class="icon-box">
                <i class="bi bi-envelope"></i>
              </div>
              <div class="content">
                <h4>Email Address</h4>
                <p>info@example.com</p>
                <p>contact@example.com</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-7">
          <div class="contact-form" data-aos="fade-up" data-aos-delay="300">


            <h3>Get In Touch</h3>
           <p>We’re here to answer any questions you may have. Reach out to us and we’ll respond as soon as we can.
            .</p>

            <form action="{{ route('contact.store') }}" method="post"  data-aos="fade-up" data-aos-delay="200">

              @csrf
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                </div>

                <div class="col-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                </div>

                <div class="col-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-12 text-center">


                  <button type="submit" class="btn">Send Message</button>
                </div>

              </div>
            </form>

          </div>
        </div>

      </div>

    </div>

  </section><!-- /Contact Section -->

</main>
@endsection
@section('style')
<style>
    /* 🌟 Centering the Button */
    .btn-container {
        display: flex;
        justify-content: center;
        margin-top: 10px;
        /* Adjust spacing */
    }

    /*  Stylish Button */




    .custom-btn {
        background: maroon;
        border: none;
        font-weight: bold;
        font-size: 14px;
        color: white;
        padding: 8px 16px;
        border-radius: 30px;
        cursor: pointer;
        letter-spacing: 1px;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.3s ease-in-out;
        box-shadow: 0px 3px 8px rgba(255, 117, 140, 0.4);
        min-width: 140px;
        /* Smaller width */
        justify-content: center;
        /* Center text */
    }

    /*  Hover Effect */
    .custom-btn:hover {
        transform: scale(1.05);
        background: black;
        box-shadow: 0px 5px 12px rgba(255, 117, 140, 0.6);
    }

    /*  Pressed Effect */
    .custom-btn:active {
        transform: scale(0.95);
        box-shadow: 0px 2px 6px rgba(255, 117, 140, 0.5);
    }

    /*  Responsive Size */
    @media (max-width: 768px) {
        .custom-btn {
            padding: 7px 14px;
            font-size: 13px;
            min-width: 120px;
            /* Even smaller on mobile */
        }
    }

    .get-in-touch {
        text-align: center;
        background: linear-gradient(to bottom, #fffdf2 0%, #ffeff5 100%) !important;


        font-size: 32px;
        font-weight: bold;

    }

    /* Responsive */
    @media (max-width: 600px) {
        .get-in-touch {
            font-size: 26px;
            padding: 30px 15px;
        }
    }
</style>
@endsection
@section('script')
@endsection
