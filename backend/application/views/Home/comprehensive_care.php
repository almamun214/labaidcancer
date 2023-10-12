<div class="banner-wrapper text-center" style="position: relative;
    top: -110px;">
    <img src="<?php echo base_url($headimage['pgb_image']); ?>" class="img-fluid img-100" alt="Package">
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

            <!-- <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>"><i class="fa fa-home" aria-hidden="true"></i></a></li> -->
            <?php
        //    if (!empty($uri1) & empty($uri2)) {
       //         echo "<li class='breadcrumb-item'><a href='#'>" . ucwords($title) . "</a></li>";
      //      } else {
     //           echo "<li class='breadcrumb-item'><a href='#'>" . ucwords($uri1) . "</a></li>";
       //     }
         //   if (!empty($uri2)) {
        //        echo "<li class='breadcrumb-item'><a href='#'>" . ucwords($title) . "</a></li>";
         //   }
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

<section class="cancer-details pb-5">
    <div class="container">
        <div class="row">
            <?php $counter = 1;
            foreach ($gqlist as $tablink):
                ?>
                <div class="col-sm-3 pt-4">
                    <div class="card text-center">
                        <a data-lightbox='category' href="<?php echo base_url($tablink->image); ?>" data-caption="<?php echo base_url($tablink->image); ?>" data-title="<?php echo $tablink->cc_name; ?>">
                            <img class="card-img-top" src="<?php echo base_url($tablink->image); ?>" alt="Photo" style="max-width: 300px;">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $tablink->cc_name; ?></h5>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
