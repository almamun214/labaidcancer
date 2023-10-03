<!--<div class="banner-wrapper text-center">-->
<!--    <img src="--><?php //echo base_url($headimage['pgb_image']); ?><!--" alt="about" class="img-fluid img-100" />-->
<!--</div>-->


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

<div class="container" id="oporajoyi-details">

    <div class="row mt-5 mb-5">
        <div class="col-sm-12">
            <?php echo $gq['op_description']; ?>
        </div>
    </div><!-- /.row -->


</div><!-- /.container -->
