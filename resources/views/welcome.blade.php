<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>COLLAB</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="assets/img/fav2.jpg" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/css/style1.css" rel="stylesheet">
  <style>
    h2{
  text-align:center;
  padding: 20px;
},
/* Slider */

.slick-slide {
    margin: 0px 20px;
}

.slick-slide img {
    width: 100%;
}

.slick-slider
{
    position: relative;
    display: block;
    box-sizing: border-box;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
            user-select: none;
    -webkit-touch-callout: none;
    -khtml-user-select: none;
    -ms-touch-action: pan-y;
        touch-action: pan-y;
    -webkit-tap-highlight-color: transparent;
}

.slick-list
{
    position: relative;
    display: block;
    overflow: hidden;
    margin: 0;
    padding: 0;
}
.slick-list:focus
{
    outline: none;
}
.slick-list.dragging
{
    cursor: pointer;
    cursor: hand;
}

.slick-slider .slick-track,
.slick-slider .slick-list
{
    -webkit-transform: translate3d(0, 0, 0);
       -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
         -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
}

.slick-track
{
    position: relative;
    top: 0;
    left: 0;
    display: block;
}
.slick-track:before,
.slick-track:after
{
    display: table;
    content: '';
}
.slick-track:after
{
    clear: both;
}
.slick-loading .slick-track
{
    visibility: hidden;
}

.slick-slide
{
    display: none;
    float: left;
    height: 100%;
    min-height: 1px;
}
[dir='rtl'] .slick-slide
{
    float: right;
}
.slick-slide img
{
    display: block;
}
.slick-slide.slick-loading img
{
    display: none;
}
.slick-slide.dragging img
{
    pointer-events: none;
}
.slick-initialized .slick-slide
{
    display: block;
}
.slick-loading .slick-slide
{
    visibility: hidden;
}
.slick-vertical .slick-slide
{
    display: block;
    height: auto;
    border: 1px solid transparent;
}
.slick-arrow.slick-hidden {
    display: none;
}
    .rcorners {
        border-radius: 25px;
        background: white;
        padding: 20px;

        height: 150px;
    }
    .map {
        -webkit-filter: grayscale(100%);
        -moz-filter: grayscale(100%);
        -ms-filter: grayscale(100%);
        -o-filter: grayscale(100%);
        filter: grayscale(100%);
    }
    </style>
</head>

<body>


  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top" style="background: #d4e6f3;color: black">
    <!--<div class="container d-flex">
      <div class="contact-info mr-auto" style="color: black">
        <i class="icofont-envelope"></i> <a href="mailto:contact@example.com">info@bewithcollab.com</a>
        <i class="icofont-phone"></i> +971 45 46 5938
      </div>
      <div class="social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>

      </div>
    </div>   -->
  </div>


  <header id="header" class="fixed-top" style="background: #d4e6f3">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto">
	  <!--<a href="index.html">Collab<span>.</span></a>-->
	  <a href="<?php echo URL::to('/');?>"><img src="newlogo.png" height="80"></a>
	  </h1>


      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#about">Objectives</a></li>

          <!--<li class="drop-down"><a href="">Drop Down</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Deep Drop Down</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>-->
          <li><a href="#contact">Contact</a></li>

          <li><a href="https://bewithcollab.com/support">Support</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
      <div class="row" style="padding-top: 50px">
          <div class="col-lg-2">

          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" style="text-align: justify" data-aos="fade-up" data-aos-delay="100">
              <div class="container" data-aos="zoom-out" data-aos-delay="100" >
                  <h1 style="color: #6c9ecf">Welcome to Collab</h1>
                  <h2 style="color: #6c9ecf;text-align: justify">A clever business-to-business (B2B) partner marketing tool that connects home-grown brands across the GCC to create smart collaborations & partnerships.</h2>
                  <div class="d-flex">
                      <a href="#about" class="btn-get-started scrollto">Get Started</a>
                      &nbsp;&nbsp;<!--<a  href="https://apps.apple.com/us/app/collab/id1565314643" target="_blank">
                          <img width="150px" height="40px" src="https://bewithcollab.com/apple.png" /></a>
                      &nbsp;&nbsp;<a  href="https://play.google.com/store/apps/details?id=com.collabmncis.collab" target="_blank">
                          <img width="150px" height="40px" src="https://bewithcollab.com/google.png" /></a> -->
                  </div>
              </div>
          </div>
          <div class="col-lg-4" data-aos="zoom-out" data-aos-delay="100" style="padding-top: 50px">
              <img src="hero.png" width="400px" height="500px" class="img-fluid" alt="">
          </div>

    </div>
  </section><!-- End Hero -->

  <main id="main">



   <section class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">

          <h3><span>LIST YOUR BRAND</span></h3>

        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-4">
            <div class="mb-4">

            <div class="section-title"><h5><span>JOIN COLLAB</span></h5> </div>
              <p style="text-align: justify;">A powerful tool that connects home-grown businesses across the GCC
                to create smart collaborations & partnerships.</p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="mb-4">

            <div class="section-title"><h5><span>COLLABORATE</span></h5> </div>
              <p style="text-align: justify;">Create your business profile to identify, connect and activate your relationships with the most relevant businesses</p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="mb-4">

            <div class="section-title"><h5><span>GROW</span></h5> </div>
              <p style="text-align: justify;">Become a COLLAB conversation starter with the support of COLLAB’s resources and tools!</p>
            </div>
          </div>

        </div>
        </div>

</section>
    <section id="about" class="about section-bg" style="background: white">
      <div class="container" data-aos="fade-up">



        <div class="row">
          <div class="col-lg-6" data-aos="zoom-out" data-aos-delay="100">
            <img src="aboutus.png" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" style="text-align: justify" data-aos="fade-up" data-aos-delay="100">

              <h3>ABOUT <span>COLLAB</span></h3>


              <p style="text-align: justify;">The region’s emerging and established businesses recognise the benefits of collaboration marketing to promote their business, reduce costs and increase sales. Collaborative partnerships with like-minded businesses is an excellent way to boost exposure and has become
              a popular and effective method to reach & engage new audiences.</p>
<p style="text-align: justify;">Collab is a start-up specialising in strategic B2B collaborations for businesses, connecting over # businesses for smart marketing opportunities across the GCC. Launched in 2021, Collab is a comprehensive online platform helping businesses from any industry source,
secure and leverage B2B collaborations of all sizes.</p>
<p style="text-align: justify;">Join Collab and discover how you can leverage unique opportunities to create smart partnerships that will help you grow your business.  </p>
<p style="text-align: justify;">Want to see Collab in action? Check out our case studies:</p>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->

<!-- End About Section -->

      <section id="about" class="about section-bg" style="background: #6c9ecf">
          <div class="container" data-aos="fade-up">



              <div class="row">
                  <div class="col-lg-4" data-aos="zoom-out" data-aos-delay="100">
                      <img src="hero2.png" height="300px" width="300px" class="img-fluid" alt="">
                  </div>
                  <div class="col-lg-8 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" style="text-align: justify" data-aos="fade-up" data-aos-delay="100">

                      <h3><span style="color: white">Don’t Compete, Collaborate</span></h3>


                      <p style="text-align: justify;color: white">In today’s evolving global business environment, companies are always looking for ways to reinvent themselves. Collab promotes dynamic business scenarios, embracing the mantra that collaboration is better than competition</p>

                  </div>
              </div>

          </div>
      </section>
<section id="featured-services" class="contact" style="background: #d4e6f3">
      <div class="container" data-aos="fade-up">
	  <div class="section-title">

          <h3>Mission and Vision</h3>
          <p style="text-align: center;">COLLAB PORTAL DMCC</p>
        </div>
		<div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-6">
            <div class="info-box mb-5 rcorners" style="height:190px;color:black" >

              <h3><span>Our Vission</span></h3>
              <p style="text-align: justify;padding: 15px;">To create growth opportunities for businesses in any industry through product partnerships and collaborations</p>
            </div>
          </div>
		  <div class="col-lg-6">
            <div class="info-box mb-5 rcorners" style="height:190px;">

              <h3><span>Our Mission</span></h3>
              <p style="text-align: justify;padding: 15px;">Collab creates business collaboration opportunities for forward-thinking businesses to gain exposure in new locations and
                reach audiences in an authentic way</p></br>
            </div>
          </div>


        </div>
</section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <!--<section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="icofont-simple-smile"></i>
              <span data-toggle="counter-up">232</span>
              <p style="text-align: justify;">Happy Clients</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="icofont-document-folder"></i>
              <span data-toggle="counter-up">521</span>
              <p style="text-align: justify;">Projects</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="icofont-live-support"></i>
              <span data-toggle="counter-up">1,463</span>
              <p style="text-align: justify;">Hours Of Support</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="icofont-users-alt-5"></i>
              <span data-toggle="counter-up">15</span>
              <p style="text-align: justify;">Hard Workers</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Clients Section ======= -->
    <!--<section id="clients" class="clients section-bg">
      <div class="container" data-aos="zoom-in">

        <div class="row" id="buisness">

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
          </div>

          <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
          </div>



        </div>

      </div>
    </section>-->

    <!-- ======= Services Section ======= -->
    <!--<section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <h3>Check our <span>Services</span></h3>
          <p style="text-align: justify;">Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4><a href="">Lorem Ipsum</a></h4>
              <p style="text-align: justify;">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="">Sed ut perspiciatis</a></h4>
              <p style="text-align: justify;">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="">Magni Dolores</a></h4>
              <p style="text-align: justify;">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4><a href="">Nemo Enim</a></h4>
              <p style="text-align: justify;">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-slideshow"></i></div>
              <h4><a href="">Dele cardo</a></h4>
              <p style="text-align: justify;">Quis consequatur saepe eligendi voluptatem consequatur dolor consequuntur</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-arch"></i></div>
              <h4><a href="">Divera don</a></h4>
              <p style="text-align: justify;">Modi nostrum vel laborum. Porro fugit error sit minus sapiente sit aspernatur</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->





    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <h3><span>Contact Us</span></h3>
          <p style="text-align: justify;">Question or query, help is at hand. Contact COLLAB customer services or find the answer below.</p>
        </div>

        <!--<div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p style="text-align: justify;">Warehouse 9, Red Crescent
                  Al Quoz Industrial 1st, Sheikh Zayed Road,
                  Dubai, United Arab Emirates</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p style="text-align: justify;">info@bewithcollab.com</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p style="text-align: justify;">+971 4546 59 38</p>
            </div>
          </div>

        </div>   -->

        <div class="row" data-aos="fade-up" data-aos-delay="100">

          <div class="col-lg-3 ">
           </div>

          <div class="col-lg-6">
            <form action="#" method="post" role="form" class="php-email-form">
            @csrf
              <div class="form-row">
                <div class="col form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit" id="save-data">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
      <section id="contact" class="contact" style="background: #f2f2f2">
          <div class="row" data-aos="fade-up" data-aos-delay="100" style="padding-left: 10px;padding-right: 10px;height: 400px">
      <iframe class="mb-4 mb-lg-0 map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3611.4358402123935!2d55.23262991500863!3d25.154757333915907!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f69857ec4e1b9%3A0xb4c0b01f4349172f!2sRED%20CRESCENT%20WAREHOUSE!5e0!3m2!1sen!2sae!4v1646052224853!5m2!1sen!2sae" style="border:0; width: 100%; height: 100%;" allowfullscreen></iframe>
          </div>
      </section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" style="background: #f2f2f2">



    <div class="footer-top" style="background: #f2f2f2">
      <div class="container" style="background: #f2f2f2">
        <div class="row">
            <div class="col-lg-6 col-md-6 footer-links" style="text-align: justify">
                <img src="bottomlogo.png" height="80">
                <p style="text-align: justify;">A clever business-to-business (B2B) partner marketing tool that connects home-grown brands across the GCC to create smart collaborations & partnerships</p>
                <div class="social-links mt-3">
                    <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                    <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>

                </div>
                <div style="padding-top: 10px">
                    <a  href="https://apps.apple.com/us/app/collab/id1565314643" target="_blank">
                        <img width="150px" height="40px" src="https://bewithcollab.com/apple.png" /></a>
                    &nbsp;&nbsp;<a  href="https://play.google.com/store/apps/details?id=com.collabmncis.collab" target="_blank">
                        <img width="150px" height="40px" src="https://bewithcollab.com/google.png" /></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 footer-contact">

            </div>
          <div class="col-lg-3 col-md-6 footer-contact">


            <h3></h3>
            <p style="text-align: justify;">
                Warehouse 9, Red Crescent  <br>
                Al Quoz Industrial 1st, Sheikh Zayed Road,   <br>
                Dubai, United Arab Emirates <br><br>

              <strong>Phone:</strong> +971 4546 5938<br>
              <strong>Email:</strong>  info@bewithcollab.com<br>
            </p>

          </div>







        </div>
      </div>
    </div>
       <hr/>
    <div class="container py-4" >
      <div class="copyright" style="text-align: center">
        &copy; Copyright <strong><span>Collab</span></strong>. All Rights Reserved
      </div>

    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>


  <script src="assets/js/main.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script>
$.ajaxSetup({
        headers: {
            'noBody': 'INTAR2QYV9J5TXmVr15uQ7VvXNTIBJKU8CXJbwXgPCvOenGyJ5RfUoEAAMENQ0rGJ0cFw4aITvFVOXY8whho3qZCoK5LKRjhSrpbvmZrpulTzCpYRuMhrIWNUmk7tnGuJxVOC'
        }
    });
$(document).ready(function() {

    //alert( "ready!" );

  $("#save-data").click(function(event){
      event.preventDefault();
//alert( "Do You Want to Send" );
return;

      let name = $("input[name=name]").val();
      let email = $("input[name=email]").val();
      let subject = $("input[name=subject]").val();
      let message = $("input[name=message]").val();
      let _token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        url: "contactSubmt",
        type:"POST",
        data:{
          name:name,
          email:email,

          subject:subject,
          message:message,

        },

        success:function(response)
		{
          alert(response.message);
		 /*$.each(response.data, function(key, val) {
			  alert(val);
		  });*/

        },
		error: function(response){
              alert(JSON.stringify(response));
           }
       });
  });
  });



  $(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
});
</script>
</body>

</html>
