

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



<section class="cancer-details">
    <div class="container">
        <div class="row">

            <div class="col-sm-12">

                <nav >
                    <div class="nav nav-tabs mb-3 justify-content-center" id="nav-tab" role="tablist">

                        <?php
                               
                        $counter = 1;
                        foreach ($pkg_details as $tablink):
                            ?>
                            <a class="nav-item nav-link <?php
                               if ($counter == 1) {
                                   echo "active";
                               }
                               ?>" id="nav-<?php echo preg_replace("/[^A-Za-z0-9]/", "", $tablink->pqp_name); ?>-tab" data-toggle="tab" href="#nav-<?php echo preg_replace("/[^A-Za-z0-9]/", "", $tablink->pqp_name); ?>" role="tab" aria-controls="nav-<?php echo preg_replace("/[^A-Za-z0-9]/", "", $tablink->pqp_name); ?>" aria-selected="true"><?php echo $tablink->pqp_name; ?></a>
    <?php $counter++;
endforeach;
?>



                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">

                    <?php
                         $counter = 1;
                         foreach ($pkg_details as $bodylink):
                             ?>
                        <div class="tab-pane fade show <?php
                        if ($counter == 1) {
                            echo "active";
                        }
                        ?> p-3" id="nav-<?php echo preg_replace("/[^A-Za-z0-9]/", "", $bodylink->pqp_name); ?>" role="tabpanel" aria-labelledby="nav-<?php echo preg_replace("/[^A-Za-z0-9]/", "", $bodylink->pqp_name); ?>-tab">
    <?php echo $bodylink->pqp_description; ?>
                        </div>
    <?php
    $counter++;
endforeach;
?>



                </div>

            </div>

        </div>
    </div><!-- /.container -->
</section>