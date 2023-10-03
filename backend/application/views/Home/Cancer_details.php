<style>
    .middle-content{
        position:relative;
    }
</style>

<section class="cancer-banner">
    <div class="container text-center">
        <img src="<?php echo base_url($cancer['cn_icon']); ?>">
        <div class="block-title">
            <h2 class="block-title__title"><?php echo $cancer['cn_name']; ?></h2>
            <div class="title-divider"></div>
        </div>
    </div>
</section>

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
                echo "<li class='breadcrumb-item'><a href='".base_url('centresofexcellence')."'>" . ucwords($title) . "</a></li>";
            } else {
                echo "<li class='breadcrumb-item'><a href='".base_url('centresofexcellence')."'>" . ucwords($uri1) . "</a></li>";
            }
            if (!empty($uri2)) {
                echo "<li class='breadcrumb-item'><a href='".base_url($uri1.'/'.$uri2)."'>" . ucwords($title) . "</a></li>";
            }
            ?>

        </ol>
    </nav>
<?php } ?> 

<div class="container">

    <div class="row">
        <div class="col-sm-12">

            <section class="cancer-details">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-3">
                            <div class="sidebar-fixed-menu">
                                <ul class="sidebar-cancer-list">
                                    <?php foreach ($cancer_details as $smenu): ?>
                                        <li><a class="scroll-link" href="#<?php echo $smenu->cd_slug; ?>" ><?php echo $smenu->cd_section_title; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>                        
                        </div>
                        <div class="col-12 col-md-9">
                            <div class="cancer-content">
                                <div class="details-section">
                                    <h3>Overview</h3>
                                    <?php echo $cancer['cn_details']; ?>
                                </div>

                                <?php foreach ($cancer_details as $cont): ?>
                                <div id="<?php echo $cont->cd_slug; ?>" class="middle-content">
                                        <h3><?php echo $cont->cd_section_title; ?></h3>
                                        <?php echo $cont->cd_details; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container -->
            </section>

        </div>
        <div class="col-sm-3"></div>
        <?php foreach ($doctor as $doct): ?>
            <div class="col-sm-3">
                <div class="team-one__single">
                    <div class="team-one__image">
                        <img src="<?php echo base_url($doct->d_picture); ?>" alt="<?php echo $doct->d_name; ?>" />
                    </div>
                    <div class="team-one__content">
                        <div class="app-btns">
                            <a class="team-one__appointment" href="<?php echo base_url('appointment'); ?>">Book Appointment</a>

                        </div>
                        <h3 class="team-one__title"><a href="<?php echo base_url('doctor-details/' . $doct->d_slug); ?>"><?php echo $doct->d_name; ?></a></h3>
                        <p class="team-one__speciality"><?php echo $doct->d_designation; ?></p>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>
    </div>
    <!-- <div class="row mb-5">
            <div class="col-12 text-center">
                <a href="<?php echo base_url('home/doctor'); ?>" class="btn btn-success btn-lg">See More Doctors</a>
            </div>
        </div> -->
</div> 