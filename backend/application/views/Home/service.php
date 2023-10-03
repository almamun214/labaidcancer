<div class="banner-wrapper text-center">
    <img src="<?php echo base_url($headimage['pgb_image']); ?>" alt="Service Banner" class="img-fluid img-100" />
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

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <?php echo $headimage['pgb_description']; ?>
        </div>
    </div>
</div>

<section class="team-one team-one__team-page">
    <div class="container">

        <div class="row low-gutters">
            
            <?php foreach($service as $svc): ?>
            <div class="col-lg-2 col-md-6 col-sm-12">
                <div class="team-one__single">
                    <div class="team-one__image">
                        <img src="<?php echo base_url($svc->swo_image); ?>" alt="<?php echo $svc->swo_name; ?>">
                    </div>
                    <div class="team-one__content">

                        <h3 class="team-one__title"><a href="#"><?php echo $svc->swo_name; ?></a></h3>
                        <p class="team-one__speciality"></p>
                    </div>
                </div>
            </div>
<?php endforeach; ?>
           
        </div>
    </div>
</div>
</div>
</section>