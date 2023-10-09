
<?php
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$uri1 = $this->uri->segment(1);
$uri2 = $this->uri->segment(2);
$uri3 = $this->uri->segment(3);
if (base_url() != current_url()) {
    ?>
    <nav aria-label="breadcrumb" class="container">
        <ol class="breadcrumb "><!-- justify-content-center-->

            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fa fa-home" aria-hidden="true"></i></a></li>
            <?php
            if (!empty($uri1) & empty($uri2)) {
                echo "<li class='breadcrumb-item'><a href='".base_url($uri1)."'>" . ucwords($title) . "</a></li>";
            } else {
                echo "<li class='breadcrumb-item'><a href='".base_url($uri1)."'>" . ucwords($uri1) . "</a></li>";
            }
            if (!empty($uri2)) {
                echo "<li class='breadcrumb-item'><a href='".base_url('doctor-details/'.$uri2)."'>" . ucwords($title) . "</a></li>";
            }
            ?>

        </ol>
    </nav>
<?php } ?> 

<section class="doctor-detail mt-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="doctor-personal-info">
                    <div class="doctor-identity">
                        <h2 class="doctor-name"><?php echo $doctor['d_name']; ?></h2>
                        <h3 class="department"><?php echo $doctor['d_designation']; ?></h3>
                        <h4 class="degree"><?php echo $doctor['dd_name']; ?></h4>
                        <!-- <div class="doctor-appointment"> -->
<!--                        <div class="get-appointment white">
                            <a href="javascript:void();" class="app-btn">Book Appointment</a>
                        </div>-->

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="doctor-image">
                    <img class="img-responsive rounded" src="<?php echo base_url() . $doctor['d_picture']; ?>" alt="<?php echo $doctor['d_name']; ?>" style="aspect-ratio: 1;height:100%;">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="main-info">
    <div class="doctor-main-info">
        <div class="container">
            <div class="row row-flex row-flex-wrap">
                <div class="col-12 col-md-6">
                    <div class="doctor-content">
                        <h3>Education</h3>
                        <?php echo $doctor['d_education']; ?>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="doctor-content">
                        <h3>Working Schedule</h3>
                        <div class="get-appointment text-left"> 
                            <ul class="feature-three__time">
                                <?php foreach ($doctor_wh as $val): ?>
                                    <li class="feature-three__time-line"><span><?php echo $val->working_days; ?></span> <span><?php echo $val->working_from."-".$val->working_to; ?></span></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="doctor-content">
                        <h3>Biography</h3>
                        <?php echo $doctor['d_biography']; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>


</section>