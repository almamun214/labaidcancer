
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
        <?php
        if (empty($newslist)) {
            echo "<div style='height:200px;text-align:center;'> <h1>No Data Found </h1></div>";
        }


        foreach ($newslist as $nlist):
            ?>
            <div class="row pt-3">
                <div class="col-sm-3">
                    <img src="<?php echo base_url($nlist->bl_featured_image); ?>" class="img-fluid">
                </div>
                <div class="col-sm-9">
                    <a href="<?php echo base_url('blog-post/' . $nlist->bl_slug); ?>"><h2 style="font-size:26px;"><?php echo $nlist->bl_title; ?></h2></a>
                </div>
            </div>
            <br/>
        <?php endforeach; ?>
    </div>
</section>