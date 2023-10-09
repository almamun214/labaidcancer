<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if(current_url() !=base_url()){echo @$title." ||";} ?>  Labaid Cancer Hospital and Super Speciality Center || Winning Cancer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/frontend/styles.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/frontend/style-sagor.css">
    <link href="https://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
    <link href="https://vjs.zencdn.net/8.3.0/video-js.css" rel="stylesheet" />
    <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://kit.fontawesome.com/29012c8d5d.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>asset/images/resources/icon.png">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/gallery/simplelightbox.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.min.css" integrity="sha256-tBxlolRHP9uMsEFKVk+hk//ekOlXOixLKvye5W2WR5c=" crossorigin="anonymous" />

</head>



<body>
<!-- Start:: Navbar -->
<nav id="navbar" class="navbar navbar-expand-lg sticky navbar-dark p-4 rounded-5 shadow p-3 bg-white container">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="<?php echo base_url(); ?>asset/frontend/images/LCH_logo.png" class="img-fluid" alt="LCH" >
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 nav ">
                <li class="nav-item ms-3 active">
                    <a class="nav-link" aria-current="page" href="/">HOME</a>
                </li>
                <li class="nav-item dropdown ms-3">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        ABOUT US
                    </a>
                    <ul class="dropdown-menu animate__animated animate__fadeIn border-0 shadow"  aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item p-3 ps-5 pe-5" href="<?php echo base_url('about'); ?>"><div class="sub-menu-text">Labaid Cancer Hospital</div></a></li>
                        <li><a class="dropdown-item p-3 ps-5 pe-5" href="<?php echo base_url('messageOfchairman'); ?>"><div class="sub-menu-text">Message Of Chairman</div></a></li>
                        <li><a class="dropdown-item p-3 ps-5 pe-5" href="<?php echo base_url('messageofmd'); ?>"><div class="sub-menu-text">Message of Managing Director </div></a></li>
                        <li><a class="dropdown-item p-3 ps-5 pe-5" href="<?php echo base_url('management'); ?>"><div class="sub-menu-text">Management Team</div></a></li>
                        <li><a class="dropdown-item p-3 ps-5 pe-5" href="<?php echo base_url('winningOverCancer'); ?>"><div class="sub-menu-text">Winning Cancer</div></a></li>
                        <li><a class="dropdown-item p-3 ps-5 pe-5" href="<?php echo base_url('centresofexcellence'); ?>"><div class="sub-menu-text">Centers of Excellence</div></a></li>
                        <li><a class="dropdown-item p-3 ps-5 pe-5" href="<?php echo base_url('department'); ?>"><div class="sub-menu-text">Department</div></a></li>
                        <li><a class="dropdown-item p-3 ps-5 pe-5" href="<?php echo base_url('comprehensive_care'); ?>"><div class="sub-menu-text">Our Comprehensive Care Team</div></a></li>
                        <li><a class="dropdown-item p-3 ps-5 pe-5" href="<?php echo base_url('diagnosis_treatment'); ?>"><div class="sub-menu-text">Diagnosis & Treatment</div></a></li>
                        <li><a class="dropdown-item p-3 ps-5 pe-5" href="<?php echo base_url('faq'); ?>"><div class="sub-menu-text">FAQ</div></a></li>
                        <li><a class="dropdown-item p-3 ps-5 pe-5" href="#"><div class="sub-menu-text">Contact With Us</div></a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown ms-3">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        SERVICE
                    </a>
                    <ul class="dropdown-menu animate__animated animate__fadeIn border-0 shadow"  aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item p-3 ps-5 pe-5" href="<?php echo base_url('doctors'); ?>"><div class="sub-menu-text">Doctors</div></a></li>
                        <li><a class="dropdown-item p-3 ps-5 pe-5" href="<?php echo base_url('diagnostictest'); ?>"><div class="sub-menu-text">Diagnostic Test</div></a></li>
<!--                        <li><a class="dropdown-item p-3 ps-5 pe-5" href="#"><div class="sub-menu-text">OPD</div></a></li>-->
<!--                        <li><a class="dropdown-item p-3 ps-5 pe-5" href="#"><div class="sub-menu-text">Chemotherapy &amp; Day Care</div></a></li>-->
<!--                        <li><a class="dropdown-item p-3 ps-5 pe-5" href="#"><div class="sub-menu-text">Diagnostic Services</div></a></li>-->
<!--                        <li><a class="dropdown-item p-3 ps-5 pe-5" href="#"><div class="sub-menu-text">Pharmacy</div></a></li>-->
<!--                        <li><a class="dropdown-item p-3 ps-5 pe-5" href="#"><div class="sub-menu-text">Radiotherapy</div></a></li>-->
<!--                        <li><a class="dropdown-item p-3 ps-5 pe-5" href="#"><div class="sub-menu-text">Nuclear Medicine</div></a></li>                        -->
<!--                        <li><a class="dropdown-item p-3 ps-5 pe-5" href="#"><div class="sub-menu-text">Package</div></a></li>-->
                    </ul>
                </li>
                <li class="nav-item dropdown ms-3">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        PAGES
                    </a>
                    <ul class="dropdown-menu animate__animated animate__fadeIn border-0 shadow"  aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item p-3 ps-5 pe-5" href="<?php echo base_url('blog/success-story'); ?>"><div class="sub-menu-text">News & Article</div></a></li>
                        <li><a class="dropdown-item p-3 ps-5 pe-5" href="<?php echo base_url('awards_recognition'); ?>"><div class="sub-menu-text">Award Recognition</div></a></li>
                        <li><a class="dropdown-item p-3 ps-5 pe-5" href="#"><div class="sub-menu-text">Gallary</div></a></li>
                        <li><a class="dropdown-item p-3 ps-5 pe-5" href="#"><div class="sub-menu-text">Healthtips</div></a></li>
                        <li><a class="dropdown-item p-3 ps-5 pe-5" href="#"><div class="sub-menu-text">Career</div></a></li>
                        <li><a class="dropdown-item p-3 ps-5 pe-5" href="#"><div class="sub-menu-text">Certification</div></a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown ms-3">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        OPORAJOYEE ABASHON
                    </a>
                    <ul class="dropdown-menu animate__animated animate__fadeIn border-0 shadow"  aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item p-3 ps-5 pe-5" href="#"><div class="sub-menu-text">About Oporajoyee Abashon</div></a></li>
                        <li><a class="dropdown-item p-3 ps-5 pe-5" href="#"><div class="sub-menu-text">Service Details</div></a></li>
                        <li><a class="dropdown-item p-3 ps-5 pe-5" href="#"><div class="sub-menu-text">Room Rent</div></a></li>
                        <li><a class="dropdown-item p-3 ps-5 pe-5" href="#"><div class="sub-menu-text">Visitor Policy</div></a></li>
                    </ul>
                </li>
            </ul>
            <!-- <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
            <form class="d-flex" role="search">
                <!-- <a class="kb-btn kb-btn-1 ms-4">Login or Sign Up</a> -->
                <div class="ms-4 d-flex align-items-center">
                    <a href=""><i class="fa fa-search" aria-hidden="true"></i></a>
                </div>

                <button class="btn lp-btn-outline-primary ms-4">Get Appointment</button>
            </form>
            <!-- <button type="button" class="btn btn-link"><span class="bi bi-cart"></span></button> -->
        </div>
    </div>
</nav>


<?php $this->load->view($body); ?>



<!-- Start:: Subscribe -->
<section id="subscribe">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h1 class="display-6">Subscribe To Our</h1>
                <h1 class="fw-700">Newsletter</h1>
            </div>
            <div class="col-md-7">

                <form action="">
                    <div class="form-group">
                        <input class="form-control " type="text" placeholder="Enter Your Mail" style="padding: 1.5rem 3rem;">
                    </div>
                    <div class="form-group pt-4">
                        <button class="btn lp-btn-outline-primary" style="padding:7px 59px;">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

<!-- Start:: Get in touch -->
<section id="get-in-touch">
    <div class="text-center" style="padding-bottom: 170px;">
        <h1 class="title2">Get in Touch</h1>
        <h4 class="title1">With Us</h4>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="row">
                    <div class="col-lg-12 p-4 pt-0">
                        <div class="card service_card  p-4 text-center">
                            <h1><i class="fa-solid fa-map-marker" ></i></h1>
                            <div class="card-body">
                                <h5 class="card-title">Location</h5>
                                <p class="card-text">26 Green Road, Dhaka, 1205</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 p-4">
                        <div class="card service_card  p-4 text-center">
                            <h1><i class="fa-solid fa-phone" ></i></h1>
                            <div class="card-body">
                                <h5 class="card-title">Hotline</h5>
                                <p class="card-text">10664</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 p-4">
                        <div class="card service_card  p-4 text-center">
                            <h1><i class="fa-solid fa-envelope" ></i></h1>
                            <div class="card-body">
                                <h5 class="card-title">Mail Us</h5>
                                <p class="card-text">info@labaidcancer.com</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-9">
                <div class="card p-5">
                    <form class="row g-5 " action="" >
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="first-name" placeholder="Your First Name">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="last-name"  placeholder="Your Last Name">
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" placeholder="Enter Your Mail">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="phone"  placeholder="Enter Your Phone Number">
                        </div>
                        <div class="col-md-12">
                            <textarea type="text" class="form-control" name="message" id="" cols="30" rows="10"  placeholder="Enter Your Message"></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn lp-btn-outline-primary" style="padding:7px 59px;">Send Message</button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</section>

<!-- Start:: Location -->
<section id="location">
    <div class="text-center" style="padding-bottom: 60px;">
        <h1 class="title2">Our Location</h1>
    </div>
    <div class="container">
        <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=660&amp;height=385&amp;hl=en&amp;q=labaid cancer&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://connectionsgame.org/">Connections Unlimited</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:385px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:385px;}.gmap_iframe {height:385px!important;}</style></div>
    </div>
</section>

<!-- Start:: Footer -->
<section id="footer">
    <div class="footer-container">
        <!-- <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-3">
            <ul>
              <li><img src="<?php echo base_url(); ?>asset/frontend/images/logo-footer.png" alt="Lifeplus BD"></li>
            </ul>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-3">
            <h4>Our Services</h4>
            <ul>
              <li><a href="">Doctor Appointments</a></li>
              <li><a href="">Video Call Appointments</a></li>
              <li><a href="">Diagnostic & Hospital</a></li>
              <li><a href="">Medicine</a></li>
              <li><a href="">HealthCare Package</a></li>
              <li><a href="">Home Nursing Care</a></li>
              <li><a href="">Ambulance Service</a></li>
              <li><a href="">Lifestyle</a></li>
              <li><a href="">Healthcare Card</a></li>
            </ul>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-3">
            <h4>Our Blog</h4>
            <ul>
              <li>
                <div class="d-flex align-items-center pb-3">
                  <span class="pe-3">
                    <img src="<?php echo base_url(); ?>asset/frontend/images/blog/blog1.jpg" width="90 " class="rounded-3 img-fluid" style="width: 99px;
                    height: 87.815px;">
                  </span>
                  <span>
                    <div><i class="fa-solid fa-calendar-alt"></i> 30.7.2023</div>
                    <div><a href="">X-Ray Treatment</a></div>
                  </span>
                </div>
              </li>
              <li>
                <div class="d-flex align-items-center pb-3">
                  <span class="pe-3">
                    <img src="<?php echo base_url(); ?>asset/frontend/images/blog/blog2.jpg" class="rounded-3 img-fluid" style="width: 99px;
                    height: 87.815px;">
                  </span>
                  <span>
                    <div><i class="fa-solid fa-calendar-alt"></i> 30.7.2023</div>
                    <div><a href="">Change the Food habbit</a></div>
                  </span>
                </div>
              </li>
            </ul>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-3">
            <h4>Contuct With Us</h4>
            <ul>
              <li><i class="fa-solid fa-location-dot"></i> 24/1 SHNA HOUSE, Green Road, Dhaka -1205</li>
              <li><i class="fa-solid fa-phone"></i> +88017 6666 1030</li>
              <li><i class="fa-solid fa-envelope"></i> info@lifeplusbd.com</li>
            </ul>
          </div>
        </div> -->

        <div class="footer-logo">
            <img src="<?php echo base_url(); ?>asset/frontend/images/logo-footer.png" alt="">
        </div>

        <div class="footer-about-us">
            <h5>About Us</h5>
            <ul>
                <li> <a href="<?php echo base_url('about'); ?>">Labaid Cancer Hospital</a> </li>
                <li> <a href="<?php echo base_url('messageOfchairman'); ?>"> Message Of Chairman </a> </li>
                <li> <a href="<?php echo base_url('messageofmd'); ?>"> Message Of Managing Director</a> </li>
                <li> <a href="<?php echo base_url('management'); ?>">Management Team</a> </li>
                <li> <a href="<?php echo base_url('winningOverCancer'); ?>">Winning Cancer</a> </li>
                <li> <a href="<?php echo base_url('centresofexcellence'); ?>">Centers Of Excellence</a> </li>
                <li> <a href="<?php echo base_url('comprehensive_care'); ?>">Our Comprehensive Care Team</a> </li>

                <li> <a href="<?php echo base_url('diagnosis_treatment'); ?>">Diagnosis & Treatment</a> </li>
                <li> <a href="<?php echo base_url('faq'); ?>">FAQ</a> </li>

            </ul>
        </div>

        <div class="footer-services">
            <h5>Services</h5>
            <ul>
                <li> <a href="">Doctor</a> </li>

                <li> <a href="">Diagnostic Test</a></li>

            </ul>
        </div>

        <div class="footer-oporajoyee-abashon">
            <h5>Oporajoyee Abashon</h5>
            <ul>
                <li>About Oporajoyee Abashon</li>
                <li>Service Details</li>
                <li>Room Rent</li>
                <li>Visitor Policy</li>
            </ul>
        </div>

        <div class="footer-contact-us">
            <h5>Contact With Us</h5>
            <ul>
                <li><span class="fa fa-map-marker-alt"></span> &nbsp; 26 Green Road, Dhaka -1205</li>
                <li><span class="fa fa-envelope"></span> &nbsp; info@labaidcancer.com</li>
                <li>
                    <div class="social-links">
                        <a href="#"><i class="fa fa-facebook-f"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </div>
                </li>
            </ul>
            <div class="hot-line">
                <div class="hot-line-contact">
                    <img src="<?php echo base_url(); ?>asset/frontend/images/white-hot-line.png" class="img-fluid" alt="hot line contact">
                    <div class="hot-line-meta-content">
                        <h3>hotline</h3>
                        <h3>10664</h3>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="hr-line"></div>
    <p class="copyright-text">All Copyrights Reserved By Labaid Cancer Hospital & Super Specilaity Centre</p>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>asset/frontend/main.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
<script src="<?php echo base_url(); ?>asset/frontend/scroll_element_detector.js"></script>
<!-- <script src="video-js.css"></script> -->
<script src="https://vjs.zencdn.net/8.3.0/video.min.js"></script>
<script src="<?php echo base_url(); ?>asset/js/jquery.js"></script>
<script src="<?php echo base_url(); ?>asset/gallery/simple-lightbox.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/js/lightbox.min.js" integrity="sha256-CtKylYan+AJuoH8jrMht1+1PMhMqrKnB8K5g012WN5I=" crossorigin="anonymous"></script>




<script>

    if (document.getElementById("vid1")) {
        videojs("vid1").ready(function() {

            var myPlayer = this;

            //Set initial time to 0
            var currentTime = 0;

            //This example allows users to seek backwards but not forwards.
            //To disable all seeking replace the if statements from the next
            //two functions with myPlayer.currentTime(currentTime);

            myPlayer.on("seeking", function(event) {
                if (currentTime < myPlayer.currentTime()) {
                    myPlayer.currentTime(currentTime);
                }
            });

            myPlayer.on("seeked", function(event) {
                if (currentTime < myPlayer.currentTime()) {
                    myPlayer.currentTime(currentTime);
                }
            });

            setInterval(function() {
                if (!myPlayer.paused()) {
                    currentTime = myPlayer.currentTime();
                }
            }, 1000);

        });
    }


</script>


</body>
</html>
