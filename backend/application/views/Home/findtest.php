
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

<section class="faq-accrodion sec-pad">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="block-title text-center">
                    <h2 class="block-title__title">Diagnostic Test List</h2>
                    <div class="title-divider"></div>
                </div>


                <div class="table-responsive">

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Test Name</th>
                                <th>Test Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (empty($dtest)) {
                                echo "<h2 class='text-center'>NO Data Found</h2>";
                            }
                            $counter = 1;
                            foreach ($dtest as $key):
                                ?>
                                <tr>
                                    <td> <?php echo $counter++; ?> </td>
                                    <td> <?php echo $key->ch_name; ?> </td>
                                    <td> <?php echo $key->ch_price; ?> </td>
                                </tr>
<?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</section>