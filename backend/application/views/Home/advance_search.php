
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
                    <h2 class="block-title__title">Advanced Search Result</h2>
                    <div class="title-divider"></div>
                </div>

            </div>
            <?php
            if (!empty(@$sr['doctor'])) {
                echo "<h2>Doctors</h2><hr/>";

                foreach (@$sr['doctor'] as $doc):
                    ?>
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="<?php echo base_url('doctor-details/' . @$doc->d_slug); ?>"> <h4><?php echo @$doc->d_name; ?></h4></a>
                                <p><?php echo @$doc->d_career_title; ?></p>
                            </div>
                        </div>

                    </div>
                <?php
            endforeach; }
            
            if (!empty(@$sr['cancer'])) {
                echo "<h2>Cancer</h2><hr/>";

                foreach (@$sr['cancer'] as $can):
                    ?>
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="<?php echo base_url('cancer-details/' . @$can->cn_slug); ?>"> <h4><?php echo @$can->cn_name; ?></h4></a>
                                
                            </div>
                        </div>

                    </div>
                <?php
            endforeach; }
                
                if (!empty(@$sr['blog'])) {
                echo "<h2>Blog Post</h2><hr/>";

                foreach (@$sr['blog'] as $blg):
                    ?>
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="<?php echo base_url('blog-post/' . $blg->bl_slug); ?>"> <h4><?php echo $blg->bl_title; ?></h4></a>
                                <p><?php echo @$doc->d_career_title; ?></p>
                            </div>
                        </div>

                    </div>
                <?php
                endforeach;
                
            }

            if (!empty(@$sr['test'])) {
                echo "<h2>Diagnostic Test</h2><hr/>";
                ?>

                <div class="col-sm-12">
                    <div class="table-responsive">

                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Test Name</th>
                                    <th>Short Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 1;
                                foreach (@$sr['test'] as $keyt):
                                    ?>
                                    <tr>
                                        <td> <?php echo $counter++; ?> </td>
                                        <td> <?php echo $keyt->ch_name; ?> </td>
                                        <td> <?php echo $keyt->ch_short_name; ?> </td>
                                    </tr>
    <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div> 
<?php } ?>

        </div>
    </div>

</section>