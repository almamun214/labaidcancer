
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
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="accrodion-grp faq-accrodion" data-grp-name="faq-accrodion">
                    <?php
                    $prev_cagetory = "";
                    $cat_name = "";
                    $table = "";
                    $checker = 0;
                    foreach ($dtest as $key):

                        if ($key->cc_name == $cat_name) {

                            $table .= "<tr><td>" . $counter++ . "</td><td>" . $key->ch_name . "</td><td>" . $key->ch_short_name . "</td></tr>";
                        } else {



                            if ($checker == 1) {
                                ?>

                                <div class="accrodion">
                                    <div class="accrodion-title">
                                        <h4><?php echo $cat_name; ?></h4>
                                    </div>
                                    <div class="accrodion-content" style="display: block;">
                                        <div class="inner">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>SL</th>
                                                        <th>Test Name</th>
                                                        <th>Short Name</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php echo $table; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <?php
                            }


                            $table = "";

                            $checker = 1;
                            $cat_name = $key->cc_name;

                            $counter = 1;
                            $table .= "<tr><td>" . $counter++ . "</td><td>" . $key->ch_name . "</td><td>" . $key->ch_short_name . "</td></tr>";
                        }

                    endforeach;
                    ?>

                    <?php if ($checker == 1) { ?>

                        <div class="accrodion">
                            <div class="accrodion-title">
                                <h4><?php echo $cat_name; ?></h4>
                            </div>
                            <div class="accrodion-content" style="display: block;">
                                <div class="inner">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Test Name</th>
                                                <th>Short Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php echo $table; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</section>
