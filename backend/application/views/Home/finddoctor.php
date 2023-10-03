
<div class="banner-wrapper">
    <img src="<?php echo base_url(); ?>asset/images/slider/doctors-banner.jpg" alt="Doctor Banner" class="img-fluid img-100" />
</div>


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
                echo "<li class='breadcrumb-item'><a href='#'>" . ucwords($title) . "</a></li>";
            } else {
                echo "<li class='breadcrumb-item'><a href='#'>" . ucwords($uri1) . "</a></li>";
            }
            if (!empty($uri2)) {
                echo "<li class='breadcrumb-item'><a href='#'>" . ucwords($title) . "</a></li>";
            }
            ?>

        </ol>
    </nav>
<?php } ?> 

<section class="team-one team-one__team-page">
    <div class="container">

        <div class="row low-gutters">
            <?php
            if (empty($doctor)) {
                echo "<h2 class='text-center'>NO Data Found</h2>";
            }
            foreach ($doctor as $doc):
                ?>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="team-one__single">
                        <div class="team-one__image">
                            <img src="<?php echo base_url($doc->d_picture); ?>" alt="<?php echo $doc->d_name; ?>" class="img-fluid" style="height:300px;" />
                        </div>
                        <div class="team-one__content">
                            <div class="app-btns">
                                <a class="team-one__appointment" href="<?php echo base_url('home/appointment'); ?>">Book Appointment</a>
                                <!-- <a class="team-one__location" href="javascript:void();">View Location</a> -->
                            </div>
                            <h3 class="team-one__title"><a href="<?php echo base_url('home/doctordetails/' . $doc->d_aid); ?>"><?php echo $doc->d_name; ?></a></h3>
                            <p class="team-one__speciality"><?php echo $doc->dd_name; ?></p>
                        </div>
                    </div>
                </div>
<?php endforeach; ?>

        </div>
    </div>
</section>
