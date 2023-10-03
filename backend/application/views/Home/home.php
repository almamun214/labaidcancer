<div class="banner-wrapper">
    <section class="banner-one banner-carousel__one no-dots owl-theme owl-carousel">
        <?php foreach ($slider as $sld) : ?>
            <div class="banner-one__slide">
                <img src="<?php echo base_url($sld->sld_image); ?>" class="img-fluid" style="max-height: 390px; width: 100%;">
            </div>
        <?php endforeach; ?>

    </section>
    <div class="carousel-btn-block banner-carousel-btn">
        <span class="carousel-btn left-btn"><i class="fa fa-angle-left"></i></span>
        <span class="carousel-btn right-btn"><i class="fa fa-angle-right"></i></span>
    </div>
</div>
<section class="feature-three feature-three__home-three">
    <div class="container">
        <div class="inner-container wow fadeInUp" data-wow-duration="2s" style="visibility: visible; animation-duration: 2s; animation-name: fadeInUp;">
            <div class="row">
                <div class="col-lg-4">
                    <div class="feature-three__single ">
                        <i class="feature-three__icon clainc-icon-calendar"></i>
                        <h3 class="feature-three__title"><a href="#">Find Doctor</a></h3>
                        <p class="feature-three__text">The complete integrated cancer hospital with forefront of medical technologies and expertise in Bangladesh.</p>
                        <a href="<?php echo base_url('appointment'); ?>" class="feature-three__btn">Appointment <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-three__single ">
                        <i class="feature-three__icon clainc-icon-calendar-1"></i>
                        <h3 class="feature-three__title"><a href="#">Send Query</a></h3>
                        <ul class="feature-three__feature">
                            <li class="feature-three__feature-line">
                                <i class="material-icons">done</i>
                                Experienced Doctors
                            </li>
                            <li class="feature-three__feature-line">
                                <i class="material-icons">done</i>
                                Dedicated Professional Staffs
                            </li>
                            <li class="feature-three__feature-line">
                                <i class="material-icons">done</i>
                                24 Hours Emergency Service
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-three__single ">
                        <i class="feature-three__icon clainc-icon-calendar-1"></i>
                        <h3 class="feature-three__title"><a href="#">Get Appointment</a></h3>
                        <ul class="feature-three__time">
                            <li class="feature-three__time-line"><span>Mon - Friday</span> <span>8:00 -
                                    10:30</span></li>
                            <li class="feature-three__time-line"><span>Mon - Friday</span> <span>8:00 -
                                    10:30</span></li>
                            <li class="feature-three__time-line"><span>Mon - Friday</span> <span>8:00 -
                                    10:30</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="block-title text-center">
        <h2 class="block-title__title">Why patient choose Labaid Cancer Hospital and Super Speciality Center?</h2>
        <div class="title-divider"></div>
    </div>

    <div class="about-image" data-parallax="scroll" data-image-src="../asset/images/resources/labaid_bg.jpg" data-speed="1.5">


    </div>
    <div class="container-fluid">
        <div class="row">
            <?php foreach ($homeservice as $homeserv) : ?>
                <div class="box-5">
                    <div class="about-two__box-single wow fadeInUp" data-wow-duration="2s">
                        <i class="<?php echo $homeserv->hs_icon; ?> fa-3x about-two__box-icon" aria-hidden="true"></i>
                        <h3 class="about-two__box-title"><?php echo $homeserv->hs_name; ?></h3>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <p class="about-two__text text-center">Labaid Cancer Hospital and Super Speciality Center, a concern of Labaid Group is the only
                multi-disciplinary super-specialty tertiary care hospital in Bangladesh, confidently providing
                comprehensive health care with the latest medical, surgical and diagnostic facilities. These
                services are provided by expert medical professionals, skilled nurses and technologists using
                state-of-the-art technology. surgical and diagnostic facilities. These services are provided by
                expert medical professionals, skilled nurses and technologists using state-of-the-art
                technology.</p>
        </div>
    </div>

</section>

<section class="human-body">
    <div class="container">
        <div class="block-title text-center">
            <h2 class="block-title__title">Centre of Excellence</h2>
            <div class="title-divider"></div>
        </div>
        <div class="row">
            <ul class="nav nav-tabs">
                <li class='nav-item'>
                    <a class='nav-link active' data-toggle='tab' href='#male'>Male</a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link ' data-toggle='tab' href='#female'>Female</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class='tab-pane fade in show active' id='male'>
                    <!-- <div class="col-md-12"> -->
                    <div class="human-body-image-wrapper">
                        <div class="human-body-image">
                            <img class="body-part" src="<?php echo base_url(); ?>/asset/images/body/male/male-fig.png" alt="" class="img-responsive" style="opacity: 1">
                        </div>
                        <div class="human-body-image">
                            <a href="<?php echo base_url('cancer-details/Brain-Cancer'); ?>" class="icons icons-1">
                                <img class="part-img" src="<?php echo base_url(); ?>/asset/images/body/male/Brain Cancer.png">
                                <div class="department-text left" id="more-details">
                                    <img class="img-responsive organ-img" src="<?php echo base_url(); ?>/asset/images/body/male/Brain Cancer.png">
                                    <div class="organ">Brain Cancer</div>
                                    <div class="dept">Neuro Oncology</div>
                                </div>
                            </a>
                            <img class="body-part" src="<?php echo base_url(); ?>/asset/images/body/male/1.png" alt="" class="img-responsive">
                        </div>

                        <div class="human-body-image">
                            <a href="<?php echo base_url('cancer-details/Blood-Cancer'); ?>" class="icons icons-2">
                                <img class="part-img" src="<?php echo base_url(); ?>/asset/images/body/male/Blood Cancer.png">
                                <div class="department-text right" id="more-details">
                                    <img class="img-responsive organ-img" src="<?php echo base_url(); ?>/asset/images/body/male/Blood Cancer.png">
                                    <div class="organ">Blood Cancer</div>
                                    <div class="dept">Haemato oncology</div>
                                </div>
                            </a>
                            <img class="body-part" src="<?php echo base_url(); ?>/asset/images/body/male/2.png" alt="" class="img-responsive">
                        </div>
                        <div class="human-body-image">
                            <a href="<?php echo base_url('cancer-details/Lung-Cancer'); ?>" class="icons icons-3">
                                <img class="part-img" src="<?php echo base_url(); ?>/asset/images/body/male/Lung Cancer.png">
                                <div class="department-text left" id="more-details">
                                    <img class="img-responsive organ-img" src="<?php echo base_url(); ?>/asset/images/body/male/Lung Cancer.png">
                                    <div class="organ">Lung Cancer</div>
                                    <div class="dept">Broncogenic Oncology</div>
                                </div>
                            </a>
                            <img class="body-part" src="<?php echo base_url(); ?>/asset/images/body/male/3.png" alt="" class="img-responsive">
                        </div>
                        <div class="human-body-image">
                            <a href="<?php echo base_url('cancer-details/Skin-Cancer'); ?>" class="icons icons-4">
                                <img class="part-img" src="<?php echo base_url(); ?>/asset/images/body/male/Skin Cancer.png">
                                <div class="department-text right" id="more-details">
                                    <img class="img-responsive organ-img" src="<?php echo base_url(); ?>/asset/images/body/male/Skin Cancer.png">
                                    <div class="organ">Skin Cancer</div>
                                    <div class="dept">Dermato oncology</div>
                                </div>
                            </a>
                            <img class="body-part" src="<?php echo base_url(); ?>/asset/images/body/male/10.png" alt="" class="img-responsive">
                        </div>
                        <!-- <div class="human-body-image">
                             <a href="cacner-details.php" class="icons icons-5">
                                 <img class="part-img" src="images/body/male/Urinary Bladder Cancer.png">
                                 <div class="department-text left" id="more-details">
                                     <img class="img-responsive organ-img" src="images/body/male/Urinary Bladder Cancer.png">
                                     <div class="organ">Urinary Bladder Cancer</div>
                                     <div class="dept">Department Name Here</div>
                                 </div>
                             </a>
                             <img class="body-part" src="images/body/male/5.png" alt="" class="img-responsive">
                         </div> -->
                        <div class="human-body-image">
                            <a href="<?php echo base_url('cancer-details/Penile-Cancer'); ?>" class="icons icons-6">
                                <img class="part-img" src="<?php echo base_url(); ?>/asset/images/body/male/Penile Cancer.png">
                                <div class="department-text right" id="more-details" object.style.zIndex="50">
                                    <img class="img-responsive organ-img" src="<?php echo base_url(); ?>/asset/images/body/male/Penile Cancer.png">
                                    <div class="organ">Penile Cancer</div>
                                    <div class="dept">Genital Organ cancer</div>
                                </div>
                            </a>
                            <img class="body-part" src="<?php echo base_url(); ?>/asset/images/body/male/6.png" alt="" class="img-responsive">
                        </div>
                        <div class="human-body-image">
                            <a href="<?php echo base_url('cancer-details/Bone-Cancer'); ?>" class="icons icons-7">
                                <img class="part-img" src="<?php echo base_url(); ?>/asset/images/body/male/Bones Cancer.png">
                                <div class="department-text left" id="more-details">
                                    <img class="img-responsive organ-img" src="<?php echo base_url(); ?>/asset/images/body/male/Bones Cancer.png">
                                    <div class="organ">Bones Cancer</div>
                                    <div class="dept">Orthopaedic oncology</div>
                                </div>
                            </a>
                            <img class="body-part" src="<?php echo base_url(); ?>/asset/images/body/male/7.png" alt="" class="img-responsive">
                        </div>
                        <div class="human-body-image">
                            <a href="<?php echo base_url('cancer-details/Thyroid-Cancer'); ?>" class="icons icons-8">
                                <img class="part-img" src="<?php echo base_url(); ?>/asset/images/body/male/Thyroid Cancer.png">
                                <div class="department-text right" id="more-details">
                                    <img class="img-responsive organ-img" src="<?php echo base_url(); ?>/asset/images/body/male/Thyroid Cancer.png">
                                    <div class="organ">Thyroid cancer</div>
                                    <div class="dept">Endocrine Oncology</div>
                                </div>
                            </a>
                            <img class="body-part" src="<?php echo base_url(); ?>/asset/images/body/male/thyroid_cancer_1.png" alt="" class="img-responsive">
                        </div>
                        <div class="human-body-image">
                            <a href="<?php echo base_url('cancer-details/Eye-Cancer'); ?>" class="icons icons-9">
                                <img class="part-img" src="<?php echo base_url(); ?>/asset/images/body/male/ocular cancer.png">
                                <div class="department-text right" id="more-details">
                                    <img class="img-responsive organ-img" src="<?php echo base_url(); ?>/asset/images/body/male/ocular cancer.png">
                                    <div class="organ">Ocular Cancer</div>
                                    <div class="dept">Ocular Oncology</div>
                                </div>
                            </a>
                            <img class="body-part" src="<?php echo base_url(); ?>/asset/images/body/male/2-6.png" alt="" class="img-responsive">
                        </div>
                        <div class="human-body-image">
                            <a href="<?php echo base_url('home/cancer_details/7'); ?>" class="icons icons-10">
                                <img class="part-img" src="<?php echo base_url(); ?>/asset/images/body/male/Kidney Cancer.png">
                                <div class="department-text left" id="more-details">
                                    <img class="img-responsive organ-img" src="<?php echo base_url(); ?>/asset/images/body/male/Kidney Cancer.png">
                                    <div class="organ">Kidney Cancer</div>
                                    <div class="dept">Nephro oncology</div>
                                </div>
                            </a>
                            <img class="body-part" src="<?php echo base_url(); ?>/asset/images/body/male/5.png" alt="" class="img-responsive">
                        </div>
                    </div>
                    <!-- </div> -->
                </div>
                <div class='tab-pane container fade' id='female'>
                    <!-- <div class="col-md-12"> -->
                    <div class="human-body-image-wrapper">
                        <div class="human-body-image">
                            <img class="body-part" src="<?php echo base_url(); ?>/asset/images/body/female/female-fig.png" alt="" class="img-responsive" style="opacity: 1">
                        </div>
                        <div class="human-body-image">
                            <a href="<?php echo base_url('cancer-details/Brain-Cancer'); ?>" class="icons icons-1-1">
                                <img class="part-img" src="<?php echo base_url(); ?>/asset/images/body/female/Brain Cancer.png">
                                <div class="department-text left" id="more-details">
                                    <img class="img-responsive organ-img" src="<?php echo base_url(); ?>/asset/images/body/female/Brain Cancer.png">
                                    <div class="organ">Brain Cancer</div>
                                    <div class="dept">Neuro Oncology</div>
                                </div>
                            </a>
                            <img class="body-part" src="<?php echo base_url(); ?>/asset/images/body/female/1.png" alt="" class="img-responsive">
                        </div>

                        <div class="human-body-image">
                            <a href="<?php echo base_url('cancer-details/Blood-Cancer'); ?>" class="icons icons-2-1">
                                <img class="part-img" src="<?php echo base_url(); ?>/asset/images/body/female/Blood Cancer.png">
                                <div class="department-text right" id="more-details">
                                    <img class="img-responsive organ-img" src="<?php echo base_url(); ?>/asset/images/body/female/Blood Cancer.png">
                                    <div class="organ">Blood Cancer</div>
                                    <div class="dept">Haemato oncology</div>
                                </div>
                            </a>
                            <img class="body-part" src="<?php echo base_url(); ?>/asset/images/body/female/2.png" alt="" class="img-responsive">
                        </div>
                        <div class="human-body-image">
                            <a href="<?php echo base_url('cancer-details/Lung-Cancer'); ?>" class="icons icons-3-1">
                                <img class="part-img" src="<?php echo base_url(); ?>/asset/images/body/female/Lung Cancer.png">
                                <div class="department-text left" id="more-details">
                                    <img class="img-responsive organ-img" src="<?php echo base_url(); ?>/asset/images/body/female/Lung Cancer.png">
                                    <div class="organ">Lung Cancer</div>
                                    <div class="dept">Broncogenic Oncology</div>
                                </div>
                            </a>
                            <img class="body-part" src="<?php echo base_url(); ?>/asset/images/body/female/3.png" alt="" class="img-responsive">
                        </div>
                        <div class="human-body-image">
                            <a href="<?php echo base_url('cancer-details/Skin-Cancer'); ?>" class="icons icons-4-1">
                                <img class="part-img" src="<?php echo base_url(); ?>/asset/images/body/female/Skin Cancer.png">
                                <div class="department-text right" id="more-details">
                                    <img class="img-responsive organ-img" src="<?php echo base_url(); ?>/asset/images/body/female/Skin Cancer.png">
                                    <div class="organ">Skin Cancer</div>
                                    <div class="dept">Dermato Oncology</div>
                                </div>
                            </a>
                            <img class="body-part" src="<?php echo base_url(); ?>/asset/images/body/female/10.png" alt="" class="img-responsive">
                        </div>
                        <div class="human-body-image">
                            <a href="<?php echo base_url('cancer-details/Urinary-Bladder-Cancer'); ?>" class="icons icons-5-1">
                                <img class="part-img" src="<?php echo base_url(); ?>/asset/images/body/female/Urinary Bladder Cancer.png">
                                <div class="department-text left" id="more-details">
                                    <img class="img-responsive organ-img" src="<?php echo base_url(); ?>/asset/images/body/female/Urinary Bladder Cancer.png">
                                    <div class="organ">Urinary Bladder Cancer</div>
                                    <div class="dept">Uro-genital cancer</div>
                                </div>
                            </a>
                            <img class="body-part" src="<?php echo base_url(); ?>/asset/images/body/female/5.png" alt="" class="img-responsive">
                        </div>
                        <!--                        <div class="human-body-image">
                                                    <a href="cacner-details.html" class="icons icons-6-1">
                                                        <img class="part-img" src="<?php echo base_url(); ?>/asset/images/body/female/Penile Cancer.png">
                                                        <div class="department-text right" id="more-details" object.style.zIndex="50">
                                                            <img class="img-responsive organ-img" src="<?php echo base_url(); ?>/asset/images/body/female/Penile Cancer.png">
                                                            <div class="organ">Penile Cancer</div>
                                                            <div class="dept">Department Name Here</div>
                                                        </div>
                                                    </a>
                                                    <img class="body-part" src="<?php echo base_url(); ?>/asset/images/body/female/6.png" alt="" class="img-responsive">
                                                </div>-->
                        <div class="human-body-image">
                            <a href="<?php echo base_url('cancer-details/Bone-Cancer'); ?>" class="icons icons-7-1">
                                <img class="part-img" src="<?php echo base_url(); ?>/asset/images/body/female/Bones Cancer.png">
                                <div class="department-text left" id="more-details">
                                    <img class="img-responsive organ-img" src="<?php echo base_url(); ?>/asset/images/body/female/Bones Cancer.png">
                                    <div class="organ">Bones Cancer</div>
                                    <div class="dept">Orthopaedic oncology</div>
                                </div>
                            </a>
                            <img class="body-part" src="<?php echo base_url(); ?>/asset/images/body/female/7.png" alt="" class="img-responsive">
                        </div>
                        <div class="human-body-image">
                            <a href="<?php echo base_url('cancer-details/Thyroid-Cancer'); ?>" class="icons icons-8-1">
                                <img class="part-img" src="<?php echo base_url(); ?>/asset/images/body/female/Thyroid Cancer.png">
                                <div class="department-text right" id="more-details">
                                    <img class="img-responsive organ-img" src="<?php echo base_url(); ?>/asset/images/body/female/Thyroid Cancer.png">
                                    <div class="organ">Thyroid cancer</div>
                                    <div class="dept">Endocrine Oncology</div>
                                </div>
                            </a>
                            <img class="body-part" src="<?php echo base_url(); ?>/asset/images/body/female/thyroid_cancer_1.png" alt="" class="img-responsive">
                        </div>
                        <div class="human-body-image">
                            <a href="<?php echo base_url('cancer-details/Eye-Cancer'); ?>" class="icons icons-9-1">
                                <img class="part-img" src="<?php echo base_url(); ?>/asset/images/body/female/ocular cancer.png">
                                <div class="department-text right" id="more-details">
                                    <img class="img-responsive organ-img" src="<?php echo base_url(); ?>/asset/images/body/female/ocular cancer.png">
                                    <div class="organ">Ocular Cancer</div>
                                    <div class="dept">Ocular Oncology</div>
                                </div>
                            </a>
                            <img class="body-part" src="<?php echo base_url(); ?>/asset/images/body/female/2-6.png" alt="" class="img-responsive">
                        </div>

                        <div class="human-body-image">
                            <a href="<?php echo base_url('cancer-details/Breast-Cancer'); ?>" class="icons icons-11-1">
                                <img class="part-img" src="<?php echo base_url(); ?>/asset/images/body/female/Breast Cancer.png">
                                <div class="department-text left" id="more-details">
                                    <img class="img-responsive organ-img" src="<?php echo base_url(); ?>/asset/images/body/female/Breast Cancer.png">
                                    <div class="organ">Breast Cancer</div>
                                    <div class="dept">Breast cancer</div>
                                </div>
                            </a>
                            <img class="body-part" src="<?php echo base_url(); ?>/asset/images/body/female/4-2-2.png" alt="">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="team-one__carousel thm-gray-bg">
    <div class="container">
        <div class="block-title text-center">
            <h2 class="block-title__title">Our Experienced Doctors</h2>
            <div class="title-divider"></div>
        </div>
        <div class="row">
            <div class="specialists__carousel owl-theme owl-carousel">
                <?php
                $count = 1;
                foreach ($doctor as $doc) :
                ?>
                    <div class="item">
                        <div class="team-one__single">
                            <div class="team-one__image">
                                <img src="<?php echo base_url($doc->d_picture); ?>" alt="<?php echo $doc->d_name; ?>" style="height: 300px;" />
                            </div>
                            <div class="team-one__content">
                                <h3 class="team-one__title"><a href="<?php echo base_url('doctor-details/' . $doc->d_slug); ?>"><?php echo $doc->d_name; ?></a></h3>
                                <div class="app-btns">
                                    <a class="team-one__appointment" href="<?php echo base_url('appointment'); ?>">Book Appointment</a>
                                </div>
                                <p class="team-one__designation"><?php echo $doc->dd_name; ?></p>
                                <!-- <p class="team-one__degree">Degree</p> -->
                            </div>
                        </div>
                    </div>
                <?php
                    if ($count <= 9) {
                        $count++;
                    } else {
                        break;
                    }
                endforeach;
                ?>
            </div>
        </div>
    </div>
</section>
<section class="technology">
    <div class="container">
        <div class="block-title text-center">
            <h2 class="block-title__title">Technology</h2>
            <div class="title-divider"></div>
        </div>
    </div>
    <div class="row">
        <div class="technology-carousel">

            <?php foreach ($techno as $tcno) : ?>
                <div class="carousel-item">
                    <img class="technology-carousel-image" src="<?php echo base_url($tcno->tec_image); ?>">
                    <div class="technology-info">
                        <a href="#" class="technology-name"><?php echo $tcno->tec_name; ?></a>
                        <a class="thm-btn technology-more" href="<?php echo base_url('home/techview/' . $tcno->tec_slug); ?>">Learn More</a>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
    <div class="row text-center">
        <a href="<?php echo base_url('home/technology'); ?>" class="thm-btn about-two__btn">View Our Latest Tech</a>
    </div>
</section>

        <section class="awards">
            <div class="container">
                <div class="block-title text-center">
                    <h2 class="block-title__title">Award & Recognition</h2>
                    <div class="title-divider"></div>

                </div>
                <div class="row">
                    <div class="awards__carousel owl-carousel owl-theme">
                    <?php foreach ($awards as $award) : ?>
                        <div class="item">
                            <div class="awards__single">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="awards__icon">
                                            <div class="inner-block">
                                                <img src="<?php echo base_url($award->bl_featured_image); ?>" alt="Awesome Image" width="50%" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12"  >
                                        <div class="awards__content" style=" overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp: 6;line-clamp: 6;-webkit-box-orient: vertical;">
                                            <h4><?php echo $award->bl_title; ?></h4>
                                            <br>
                                            <p class="awards__text"><?php echo $award->bl_content; ?></p>
                                        </div>
                                        <a href="<?php echo base_url('blog-post/' . $award->bl_slug); ?>">See Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>

<section class="testimonials-three">
    <div class="testimonials-three__background-image" style="background-image: url(../asset/images/background/testi-bg-1-3.jpg);"></div>
    <div class="container">
        <div class="block-title text-center">
            <h2 class="block-title__title block-title__light-color">Patients Testimonial</h2>
            <div class="title-divider"></div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="testimonials-three__carousel owl-carousel owl-theme">
                    <?php foreach ($testimonial as $tmonial) : ?>

                        <div class="item">
                            <div class="testimonials-three__single">
                                <i class="clainc-icon-operating-room testimonials-three__box-icon"></i>
                                <div class="testimonials-three__icon">
                                    <div class="testimonials-three__qoute"><img src="<?php echo base_url(); ?>/asset/images/resources/testi-qoute-1-1.png" alt="Qoute" /></div>
                                    <div class="inner-block">
                                        <img src="<?php echo base_url($tmonial->pt_image); ?>" alt="<?php echo $tmonial->pt_name; ?>" />
                                    </div>
                                </div>
                                <div class="testimonials-three__content">
                                    <h3 class="testimonials-three__title"><?php echo $tmonial->pt_name; ?></h3>
                                    <span class="testimonials-three__designation"><?php echo $tmonial->dd_name; ?></span>
                                    <p class="testimonials-three__text"><?php echo $tmonial->pt_message; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- <section class="partners thm-gray-bg">
    <div class="container">
        <div class="block-title text-center">
            <h2 class="block-title__title">Our Affiliated Partners</h2>
            <div class="title-divider"></div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="partners__carousel owl-carousel owl-theme">
                    <div class="item"><img class="img-responsive" src="images/resources/partner.png"></div>
                    <div class="item"><img class="img-responsive" src="images/resources/partner.png"></div>
                    <div class="item"><img class="img-responsive" src="images/resources/partner.png"></div>
                    <div class="item"><img class="img-responsive" src="images/resources/partner.png"></div>
                    <div class="item"><img class="img-responsive" src="images/resources/partner.png"></div>
                    <div class="item"><img class="img-responsive" src="images/resources/partner.png"></div>
                    <div class="item"><img class="img-responsive" src="images/resources/partner.png"></div>
                    <div class="item"><img class="img-responsive" src="images/resources/partner.png"></div>
                    <div class="item"><img class="img-responsive" src="images/resources/partner.png"></div>
                </div>
            </div>
        </div>
    </div>
</section>  -->

<section class="location">
    <div class="block-title text-center">
        <h2 class="block-title__title">Our Location</h2>
        <div class="title-divider"></div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14607.606744203096!2d90.36859188036229!3d23.75088505342445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8ba185de429%3A0x1590d1e02bb4bee9!2z4Kay4KeN4Kav4Ka-4Kas4KaP4KaH4KahIOCmleCnjeCmr-CmvuCmqOCmuOCmvuCmsCDgprngpr7gprjgpqrgpr7gpqTgpr7gprI!5e0!3m2!1sbn!2sbd!4v1611935283871!5m2!1sbn!2sbd" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
</section>
<section class="faq-accrodion sec-pad">
    <div class="container">
        <div class="row justify-content-between align-content-center">
            <div class="col-lg-6">
                <div class="block-title text-left">
                    <h2 class="block-title__title">General Questions</h2>

                </div>
            </div>
            <div class="col-lg-4">
                <!--                <div class="sidebar__single sidebar__search">
                                    <form action="#" class="sidebar__search-form">
                                        <input type="text" name="search" placeholder="Search...">
                                        <button type="submit"><i class="material-icons">search</i></button>
                                    </form>
                                </div>-->
            </div>
        </div>
        <div class="accrodion-grp faq-accrodion" data-grp-name="faq-accrodion">
            <?php $count = 1;
            foreach ($general_question as $genques) : ?>
                <div class="accrodion <?php if ($count == 1) {
                                            $count++;
                                            echo 'active';
                                        } ?>">
                    <div class="accrodion-title">
                        <h4><?php echo $genques->gq_title; ?></h4>
                    </div>
                    <div class="accrodion-content" style="display: block;">
                        <div class="inner">
                            <?php echo $genques->gq_description; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!--        <div class="text-center">
                    <a href="#" class="faq-accrodion__link">View All</a>
                </div>-->
    </div>
</section>

<section class="partners thm-gray-bg">
    <div class="container">
        <div class="block-title text-center">
            <h2 class="block-title__title">Subscribe to get newsletter</h2>
            <div class="title-divider"></div>
        </div>
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-4">
                <input type="text" name="nsname" id="nsname" class="form-control" placeholder="Full Name">
            </div>
            <div class="col-lg-4">
                <input type="email" name="nsemail" id="nsemail" class="form-control" placeholder="email@example.com">
            </div>
            <div class="col-lg-1">
                <button type="button" class="btn btn-primary" onclick="subscribe()">Subscribe</button>
            </div>
        </div>
    </div>
</section>

<script>
    function subscribe() {
        var name = $("#nsname").val();
        var email = $("#nsemail").val();

        if (name == "" || email == "") {
            alert("Name and Email is required");
        } else {

            var form_data = new FormData();
            form_data.append('name', $("#nsname").val());
            form_data.append('email', $("#nsemail").val());
            

            $.ajax({
                type: 'POST',
                data: form_data,
                url: '<?php echo base_url(); ?>subscriber/addsubscriber',
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    if(response==true){
                        alert("Successfully Subscribed");
                        location.reload();
                    }else{
                        alert("Need Valid Email and Name");
                        
                    }
                }
            });
        }


    }
</script>