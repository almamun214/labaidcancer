<div class="banner-wrapper text-center">
    <img src="<?php echo base_url($headimage['pgb_image']); ?>" alt="Doctor Banner" class="img-fluid img-100" />
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
    <div class="row mt-3">
        <div class="col-sm-12">
            <?php echo $headimage['pgb_description']; ?>
        </div>
    </div>
</div>

<section class="faq-accrodion sec-pad">
    <div class="container">

        <div class="accrodion-grp faq-accrodion" data-grp-name="faq-accrodion">
            <?php $count = 1;
            foreach ($general_question as $genques): ?>
                <div class="accrodion <?php if ($count == 1) {
                    $count++;
                    echo 'active';
                } ?>">
                    <div class="accrodion-title">
                        <h4><?php echo $genques->gq_title; ?></h4>
                    </div>
                    <div class="accrodion-content" style="display: block;">
                        <div class="inner">
                <?php echo $genques->gq_description; ?>
                        </div>
                    </div>
                </div>
<?php endforeach; ?>
        </div>

    </div>
</section>