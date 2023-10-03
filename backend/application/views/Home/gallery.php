
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

        <?php foreach ($image as $key): ?>

            <div class="col-xl-4 col-md-4 mb-4">
                <div class="card border-0 shadow">
                    <img src="<?php echo base_url($key->img_name); ?>" class="card-img-top" alt="...">
                    <div class="card-body text-center">
                        <a href="<?php echo base_url('viewgallery/' . $key->imgtitle_id); ?>">  <h5 class="card-title mb-0"><?php echo $key->imgtitle_fulltitle; ?></h5></a>

                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    </div>



</div>