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

        <div class="row">
            <?php foreach ($cancer as $can): ?>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="team-one__single">
                        <div class="team-one__image">
                            <img src="<?php echo base_url($can->cn_icon); ?>" alt="<?php echo $can->cn_name; ?>" class="img-fluid"/>
                        </div>
                        <div class="team-one__content">
                            <div class="app-btns">
                                <a class="team-one__appointment" href="#">Department</a>
                                <a class="team-one__location" href="#"><?php echo $can->dd_name; ?></a>
                            </div>
                            <h3 class="team-one__title"><a href="<?php echo base_url('cancer-details/' . $can->cn_slug); ?>"><?php echo $can->cn_name; ?></a></h3>
                            <p></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>






        </div>
    </div>
</section>
