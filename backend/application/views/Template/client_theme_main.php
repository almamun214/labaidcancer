<?php
$topData=$this->glob_model->updatesitesetting_data();
$social_decoded= json_decode($topData['ss_social'],true);
?>

   


<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-N90S6ZR1HX"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'G-N90S6ZR1HX');
        </script>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="facebook-domain-verification" content="roozlwlfsv5rqt4bzbyvk78xtbpkiz" />
        <title><?php if(current_url() !=base_url()){echo @$title." ||";} ?>  Labaid Cancer Hospital and Super Speciality Center || Winning Cancer</title>
        
        <meta name="description" content="<?php echo @$metadescription; if(empty(@$metadescription)){
        echo 'Labaid Cancer Hospital and Super Speciality Center is the first comprehensive cancer hospital located at 26 green road, Dhaka, Bangladesh';
        }?>">
        <meta name="keywords" content="<?php echo @$keyword; if(empty(@$keyword)){
        echo 'Labaid, Labaid Cancer Hospital';} ?>">
<!--        <link rel="manifest" href="images/favicon/manifest.json">-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/all-styles.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>asset/gallery/simplelightbox.css">
        <link rel="shortcut icon" href="<?php echo base_url(); ?>asset/images/resources/icon.png">
        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.min.css">
        <script src='https://www.google.com/recaptcha/api.js'></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.min.css" integrity="sha256-tBxlolRHP9uMsEFKVk+hk//ekOlXOixLKvye5W2WR5c=" crossorigin="anonymous" />




        <!-- <link rel="stylesheet" href="css/body.css"> -->
        
<style>
@keyframes glowing {
    0% {
        background-color: #31bbf1;
        box-shadow: 0 0 5px #31bbf1;
    }
    50% {
        background-color: #5ddaff;
        box-shadow: 0 0 20px #5ddaff;
    }
    100% {
        background-color: #48c6f1;
        box-shadow: 0 0 5px #48c6f1;
    }
}

.ap-button {
  animation: glowing 1100ms infinite;
}
</style>
   
   
            <!-- Facebook Pixel Code -->
            <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window,document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
             fbq('init', '758079729224214'); 
            fbq('track', 'PageView');
            </script>
            <noscript>
             <img height="1" width="1" 
            src="https://www.facebook.com/tr?id=758079729224214&ev=PageView
            &noscript=1"/>
            </noscript>
            <!-- End Facebook Pixel Code -->
    </head>

    <body>
        <div class="preloader"></div>
        <div class="page-wrapper">
            <section class="topbar-one">
                <div class="container">
                    <ul class="topbar-one__contact">
                        <li><a href="<?php echo $social_decoded['Facebook']; ?>" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
                        <li><a href="<?php echo $social_decoded['Linkedin']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="<?php echo $social_decoded['Twitter']; ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="<?php echo $social_decoded['Youtube']; ?>" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                    </ul>
                    <ul class="contact_info">
                        <li class="topbar-one__contact-item"><a href="mailto:<?php echo $topData['ss_email']; ?>"><i class="fa fa-envelope"></i><?php echo $topData['ss_email']; ?></a></li>
                    </ul>
                    <div class="topbar-one__buttons">
                        <div class="access_tools">
                            <select class="selectpicker topbar-one__language" id="langchange" onchange="langc()">
                                <option value="en">En</option>
                                <option value="bn">Bn</option>

                            </select>
                            <a href="tel:<?php echo $topData['ss_hotline']; ?>" class="topbar-one__btn"><i class="material-icons">local_phone</i><?php echo $topData['ss_hotline']; ?></a>
                            <a href="tel:<?php echo $topData['ss_emargency']; ?>" class="topbar-emg__btn"><?php echo $topData['ss_emargency']; ?></a>
                        </div>
                    </div>
                </div>
            </section>
            <header class="site-header header-three">
                <div class="topbar-two">
                    <div class="container">
                        <div class="logo-box">
                            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>asset/images/resources/logo-1.png" alt="Lab Aid Cancer Hospital"/></a>
                        </div>
                        <!--<div class="logo-box">-->
                        <!--    <a href="<?php echo base_url('appointment'); ?>" class="header-three__btn thm-btn ap-button" >Make Appointment</a>-->
                        <!--</div>-->
                        <div class="topbar-two__info">
                            <div class="header__single header__search" style="">
                                <form action="<?php echo base_url('advancesearch'); ?>" method="post" class="header__search-form" style="">
                                    <input type="text" name="ads" placeholder="Advanced Search..." style="">
                                    <button type="submit" style=""><i class="material-icons" style="">search</i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="navbar navbar-expand-lg navbar-light header-navigation stricky">
                    <div class="container clearfix" >

                        <div class="logo-box clearfix">
                            <button class="menu-toggler" data-target=".main-navigation">
                                <span class="fa fa-bars"></span>
                            </button>
                        </div>

                        <div class="sticky-logo">
                            <a href="<?php echo base_url(); ?>">
                                <img src="<?php echo base_url(); ?>asset/images/resources/logo-1.png">
                            </a>
                        </div>

                        <div class="main-navigation" style=" width: auto">
                            <ul class=" navigation-box">
                                  <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home" aria-hidden="true"></i></a></li>                           
                                <li><a href="#">About</a>
                                    <ul class="submenu">
                                        <li><a href="<?php echo base_url('about'); ?>">LABAID Cancer Hospital</a></li>
                                        <li><a href="<?php echo base_url('messageOfchairman'); ?>">Message of Chairman</a></li>
                                        <li><a href="<?php echo base_url('messageofmd'); ?>">Message of Managing Director</a></li>
                                        <li><a href="<?php echo base_url('management'); ?>">Management Team</a></li>
                                        <li><a href="<?php echo base_url('page/winning-over-cancer'); ?>">Winning Cancer</a></li>
                                    </ul>
                                </li>
                                <li><a href="<?php echo base_url('doctors'); ?>">Doctors</a></li>
                                <li><a href="#">Centres of Excellence</a>
                                    <ul class="submenu">
                                        <li><a href="<?php echo base_url('centresofexcellence'); ?>">Centres of Excellence</a></li>

                                        <li><a href="<?php echo base_url('department'); ?>">Department</a></li>
                                        <li><a href="<?php echo base_url('comprehensive_care'); ?>">Our Comprehensive Care Team</a></li>
                                        <li><a href="<?php echo base_url('diagnosis_treatment'); ?>">Diagnosis & Treatment</a></li>
                                        <li><a href="<?php echo base_url('service_we_offer'); ?>">Service We Offer</a></li>
                                    </ul>                           
                                </li>
                                <li><a href="javascript:void();">Diagnostics</a>
                                    <ul class="submenu">

                                        <li><a href="<?php echo base_url('diagnostictest'); ?>">Diagnostic Test</a></li>
                                        <li><a href="<?php echo base_url('package'); ?>">Package</a></li>

                                    </ul>
                                </li>
                                <li><a href="<?php echo base_url('technology'); ?>">Technology</a></li>
                                <li><a href="javascript:void();">Media</a>
                                    <ul class="submenu">
                                        <li><a href="<?php echo base_url('blog/news-article'); ?>">News & Articles</a></li>
                                        <li><a href="<?php echo base_url('blog/success-story'); ?>">Awards & Recognition</a></li>
                                        <li><a href="<?php echo base_url('imagegallery'); ?>">Gallery</a></li>
                                        <li><a href="<?php echo base_url('blog/health-tips'); ?>">Health Tips</a></li>
                                        <li><a href="<?php echo base_url('blog/career'); ?>">Career</a></li>
                                        <li><a href="<?php echo base_url('certification'); ?>">Certification</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void();">Patient Query</a>
                                    <ul class="submenu">
                                        <!--<li><a href="<?php echo base_url('patientpackage'); ?>">Package</a></li>-->
                                        <li><a href="<?php echo base_url('roomrent'); ?>">Room Rents</a></li>
                                        <li><a href="<?php echo base_url('visitorpolicy'); ?>">Visitor Policy</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void();">Oporajoyi Abashon</a>
                                    <ul class="submenu">
                                        <li><a href="<?php echo base_url('aboutOporajoyi'); ?>">About Oporajoyi</a></li>
                                        <li><a href="<?php echo base_url('serviceDetails'); ?>">Service Details</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="right-side-box">
                            <a href="<?php echo base_url('appointment'); ?>" class="header-three__btn thm-btn ap-button"><div >Make Appointment</div></a>
                        </div>
                        
                    </div>

                </nav>
                
            </header>

            <?php $this->load->view($body); ?>

        </div>



        <footer class="footer-one">
            <div class="footer-one__top">
                <div class="container-fluid">
                    <div class="row">
                        
                        <div class="col-lg-2 col-md-3 col-sm-12">
                            <div class="footer-one__widget footer-one__link-widget">
                                <h3 class="footer-one__widget-title">About</h3>
                                <ul class="footer-one__links-list">
                                    <li><a href="<?php echo base_url('about'); ?>">LABAID Cancer Hospital</a></li>
                                    <li><a href="<?php echo base_url('messageOfchairman'); ?>">Message of Chairman</a></li>
                                    <li><a href="<?php echo base_url('messageofmd'); ?>">Message of Managing Director</a></li>
                                    <li><a href="<?php echo base_url('management'); ?>">Management Team</a></li>
                                    <li><a href="<?php echo base_url('page/winning-over-cancer'); ?>">Winning Over Cancer</a></li>                                    
                                    <li><a href='<?php echo base_url('contact'); ?>'>Contact Us</a></li> 
                                    <li><a href='<?php echo base_url('blog/career'); ?>'>Career</a></li>
                                   
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-3 col-sm-12">
                            <div class="footer-one__widget footer-one__link-widget">
                                <h3 class="footer-one__widget-title">Centres of Excellence</h3>
                                <ul class="footer-one__links-list">
                                    <li><a href="<?php echo base_url('centresofexcellence'); ?>">Centres of Excellence</a></li>

                                    <li><a href="<?php echo base_url('department'); ?>">Deparment</a></li>
                                    <li><a href="<?php echo base_url('diagnosis_treatment'); ?>">Diagnosis & Treatment</a></li>
                                    <li><a href="<?php echo base_url('service_we_offer'); ?>">Service we offer</a></li>
                                </ul>
                            </div>
                        </div>


                        <div class="col-lg-2 col-md-3 col-sm-12">
                            <div class="footer-one__widget footer-one__link-widget">
                                <h3 class="footer-one__widget-title">Diagnostics</h3>
                                <ul class="footer-one__links-list">
                                    <li><a href="<?php echo base_url('diagnostictest'); ?>">Diagnostic Test</a></li>
                                    <li><a href="<?php echo base_url('package'); ?>">Package</a></li>

                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-3 col-sm-12">
                            <div class="footer-one__widget footer-one__link-widget">
                                <h3 class="footer-one__widget-title">Media</h3>
                                <ul class="footer-one__links-list">
                                    <li><a href="<?php echo base_url('blog/news-article'); ?>">News & Articles</a></li>
                                    <li><a href="<?php echo base_url('blog/success-story'); ?>">Awards & Recognition</a></li>
                                    <li><a href="<?php echo base_url('imagegallery'); ?>">Gallery</a></li>
                                    <!--<li><a href="<?php echo base_url('blog/health-library'); ?>">Health Library</a></li>-->
                                    <li><a href="<?php echo base_url('blog/health-tips'); ?>">Health Tips</a></li>
                                    <li><a href="<?php echo base_url('blog/career'); ?>">Career</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                        
                        
                        <div class="col-lg-2 col-md-3 col-sm-12">
                            <div class="footer-one__widget footer-one__link-widget">
                                <h3 class="footer-one__widget-title">Patient Query</h3>
                                <ul class="footer-one__links-list">
                                   <li><a href="<?php echo base_url('patientpackage'); ?>">Package</a></li>
                                        <li><a href="<?php echo base_url('roomrent'); ?>">Room Rents</a></li>
                                        <li><a href="<?php echo base_url('visitorpolicy'); ?>">Visitor Policy</a></li>

                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-12">
                            <div class="footer-one__widget footer-one__link-widget">
                                <h3 class="footer-one__widget-title">Oporajoyi Abashon</h3>
                                <ul class="footer-one__links-list">
                                    <li><a href="<?php echo base_url('aboutOporajoyi'); ?>">About Oporajoyi</a></li>
                                    <li><a href="<?php echo base_url('serviceDetails'); ?>">Service Details</a></li>
                                </ul>
                            </div>
                        </div>
                        
                           <?php
                        $footerDt = $this->glob_model->f_pagelist();
                        $cat_name = "";
                        $menus = "";
                        $checker = 0;
                        foreach ($footerDt as $key):
                            if ($cat_name == $key->pg_category) {
                                $menus .= "<li><a href='" . base_url('fpage/' . $key->pg_slug) . "'>" . $key->pg_name . "</a></li>";
                            } else {
                                if ($checker == 1) {
                                    ?>
                                                                <div class="col-lg-2 col-md-3 col-sm-12">
                                                                    <div class="footer-one__widget footer-one__link-widget">
                                                                        <h3 class="footer-one__widget-title"><?php echo $cat_name; ?></h3>
                                                                        <ul class="footer-one__links-list">                                    
                                    <?php echo $menus; ?>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                    <?php
                                }
                                $menus = "";
                                $cat_name = $key->pg_category;

                                $menus .= "<li><a href='" . base_url('fpage/' . $key->pg_slug) . "'>" . $key->pg_name . "</a></li>";
                                $checker = 1;
                            }

                        endforeach;

                        if ($checker == 1) {
                            ?>
                                        <div class="col-lg-2 col-md-3 col-sm-12">
                                            <div class="footer-one__widget footer-one__link-widget">
                                                <h3 class="footer-one__widget-title"><?php echo $cat_name; ?></h3>
                                                <ul class="footer-one__links-list">                                    
                            <?php echo $menus; ?>
                                                </ul>
                                            </div>
                                        </div>
                        <?php } ?> 

                        <div class="col-lg-1 col-md-1 col-sm-12"></div>
                        
                        
                    </div>
                </div>
            </div>
            <div class="footer-one__middle">
                <div class="container">

                    <div class="inner-container text-center">
                        <div class="row ">
                            <a class="footer-logo" href="#"><img src="<?php echo base_url(); ?>asset/images/resources/logo-2.png"></a>
                        </div>
                        <!--sda-->
                        <div class="row align-items-center">
                            <ul class="footer-one__bottom-links">
                                <li class="footer-one__bottom-links-item">&copy; <a>2020 Labaid Cancer Hospital and Super Speciality Center. All Rights Reserved. <!-- |  Developed by</a> <a href="#" target="_blank" > IT Castle </a>--></li>
                                <li class="footer-one__bottom-links-item"><a href="<?php echo base_url('privacypolicy'); ?>">Privacy and Policy</a></li>
                                <li class="footer-one__bottom-links-item"><a href="<?php echo base_url('disclaimer'); ?>">Disclaimer</a></li>
                                <li class="footer-one__bottom-links-item"><a href="<?php echo base_url('sitemap.xml'); ?>">Sitemap</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-one__bottom">
                <div class="container">
                    <div class="footer-one__widget footer-one__social-widget">
                        <h3 class="footer-one__widget-title">Follow Us on Social Media</h3>
                        <div class="footer-one__social">
                            <a href="<?php echo $social_decoded['Facebook']; ?>" target="_blank"><i class="fa fa-facebook-f"></i></a>
                            <a href="<?php echo $social_decoded['Linkedin']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                            <a href="<?php echo $social_decoded['Twitter']; ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                            <a href="<?php echo $social_decoded['Youtube']; ?>" target="_blank"><i class="fa fa-youtube-play"></i></a> 
                            <a href="https://login.microsoftonline.com/" target="_blank"><i class="fa fa-envelope"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- <a href="#" data-target="html" data-target-offset="0" class="scroll-to-target scroll-to-top"><i class="material-icons">keyboard_arrow_up</i></a> -->
        <div class="side-button doctor">
            <div class="side__search" style="">
                <h5 class="side-form-title">Search Doctor</h5>
                <form action="<?php echo base_url('finddoctor'); ?>" method="post" class="side__search-form" style="">
                    <input type="text" name="finddoc" placeholder="Find Doctor..." style="">
                    <button type="submit" style=""><i class="material-icons" style="">search</i></button>
                </form>
            </div>
            <a class="appointment-button" href="javascript:void(0);">Find<br>A Doctor</a>
        </div>

        <div class="side-button test">
            <div class="side__search" style="">
                <h5 class="side-form-title">Search Test</h5>
                <form action="<?php echo base_url('findtest'); ?>" method="post" class="side__search-form" style="">
                    <input type="text" name="findtest" placeholder="Search Test..." style="">
                    <button type="submit" style=""><i class="material-icons" style="">search</i></button>
                </form>
            </div>
            <a class="appointment-button" href="javascript:void(0);">Find<br>A Test</a>
        </div>

        <div class="side-button  appointment">
            <div class="side__search" style="">
                <h5 class="side-form-title">Get  Appointment</h5>
                <a href="<?php echo base_url('appointment'); ?>" class="side__search-form_l">Click Here</a>
            </div>
            <a class="appointment-button" href="javascript:void(0);">Get<br>Appointment</a>
        </div>
    </body>


    <script src="<?php echo base_url(); ?>asset/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap-select.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/materialize.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/wow.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/parallax.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/theme.js"></script>
    <script src="<?php echo base_url(); ?>asset/gallery/simple-lightbox.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/js/lightbox.min.js" integrity="sha256-CtKylYan+AJuoH8jrMht1+1PMhMqrKnB8K5g012WN5I=" crossorigin="anonymous"></script>

    <!-- JS -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</body>

</html>

<style>
    
    .footer-one__bottom-links-item{
        color:ffffff !important;
    }
    .footer-one__bottom-links-item a:link{
        color:ffffff !important;
    }
</style>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/5ff34827a9a34e36b968fa9f/1er753mt7';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
    
    
    
    
    function langc(){
        var al=$("#langchange :selected").val();
        if(al=='bn'){
            window.location.href = "<?php echo base_url('bn'); ?>";
        }else{
            window.location.href = "<?php echo base_url(); ?>";
        }
        
    }
    
    $(".alert").delay(2000).slideUp(200, function () {
        $(this).alert('close');
    });
    $(".chosen-select").chosen()
</script>
<!--End of Tawk.to Script-->