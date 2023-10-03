<div class="banner-wrapper text-center">
    <img src="<?php echo base_url($headimage['pgb_image']); ?>" alt="Management Banner" class="img-fluid img-100" />
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
            <?php
            $count = 1;
            foreach ($mtl as $key): ?>
            
               <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="team-one__single">
                            <div class="team-one__image">
                                <img src="<?php echo base_url($key->mmt_image); ?>" alt="Team Member">
                            </div>
                            <div class="team-one__content">
                                <h3 class="team-one__title"><a href="#"><?php echo $key->mmt_name; ?></a></h3>
                                <p class="team-one__speciality"><?php echo $key->mmt_designation; ?></p>
                                <p style="  font-size: 15px;text-align: justify;padding: 5px;"><?php echo $key->mmt_description; ?></p>
                            </div>
                        </div>
                    </div>     

    <?php  endforeach; ?>

        </div>
    </div>
</div>
</div>
</section>