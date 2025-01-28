@extends('layouts.front.theme')


@section("content")
<div class="space"></div>


<!-- Projects Start -->
<div class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
       
      <!--Section: Contact v.2-->
      <section class="mb-4">

        <!--Section heading-->
        <div class="wow fadeInUp text-center" data-wow-delay="0.1s">
          <p class="section-title text-secondary justify-content-center mt-5"><span></span>Explorer<span></span></p>
          <h1 class="mb-5">Contact Us</h1>
        </div>
        <!--Section description-->
        <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
          a matter of hours to help you.</p>
      
        <div class="row">
      
          <!--Grid column-->
          <div class="col-md-9 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" action="mail.php" method="POST">
      
              <!--Grid row-->
              <div class="row">
      
                <!--Grid column-->
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="name" class="form-label">Your name</label>
                    <input type="text" id="name" name="name" class="form-control">
                  </div>
                </div>
                <!--Grid column-->
      
                <!--Grid column-->
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="email" class="form-label">Your email</label>
                    <input type="text" id="email" name="email" class="form-control">
                  </div>
                </div>
                <!--Grid column-->
      
              </div>
              <!--Grid row-->
      
              <!--Grid row-->
              <div class="row">
                <div class="col-md-12">
                  <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" id="subject" name="subject" class="form-control">
                  </div>
                </div>
              </div>
              <!--Grid row-->
      
              <!--Grid row-->
              <div class="row">
      
                <!--Grid column-->
                <div class="col-md-12">
      
                  <div class="mb-3">
                    <label for="message" class="form-label">Your message</label>
                    <textarea type="text" id="message" name="message" rows="2" class="form-control"></textarea>
                  </div>
      
                </div>
              </div>
              <!--Grid row-->
      
              <div class="text-center text-md-left">
                <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
            </div>
              <div class="status"></div>
            </form>
          </div>
          <!--Grid column-->
      
          <!--Grid column-->
          <div class="col-md-3 text-center">
            <ul class="list-unstyled mb-0">
              <li><i class="fas fa-map-marker-alt fa-2x"></i>
                <p>123 Street, City, Country</p>
              </li>
      
              <li><i class="fas fa-phone mt-4 fa-2x"></i>
                <p>+63 123 456 7890</p>
              </li>
      
              <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                <p>admin.guru@gmail.com</p>
              </li>
            </ul>
          </div>
          <!--Grid column-->
      
        </div>
      
      </section>
      
<!--Section: Contact v.2-->
        
        <div class="row g-3 portfolio-container">
           


            <!-- about End -->
        </div>
    </div>
</div>
<!-- Projects End -->

@endsection