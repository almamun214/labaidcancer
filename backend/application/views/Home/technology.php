<img src="<?php echo base_url($headimage['pgb_image']); ?>" class="img-fluid img-100" alt="technology">


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

<section class="cancer-details">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-12">

                <div class="row" id="technologies">
                    <div class="col-sm-12 pt-3">
                        <h3>List of Technologies</h3>
                    </div>
                </div>

                <div class="row">
                    <?php foreach ($tech as $key): ?>
                        <div class="col-sm-4 pt-3">
                            <div class="card">
                                <a href="<?php echo base_url('technologys/' . $key->tec_slug); ?>">
                                    <img class="card-img-top" src="<?php echo base_url($key->tec_image); ?>" alt="<?php echo $key->tec_name; ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $key->tec_name; ?></h5>
                                    </div>
                                </a>
                            </div>    
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div><!-- /.container -->
</section>