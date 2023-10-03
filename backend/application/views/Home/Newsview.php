
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

        <div class="row">
            <div class="col-sm-12">
                <h2><?php echo $news['bl_title']; ?></h2>
            </div>

            <div class="col-sm-12 text-center pt-2 pb-2">
                <img src="<?php echo base_url($news['bl_featured_image']); ?>" class="img-fluid">
            </div>
        </div>

        <div class="row">

            <div class="col-sm-12 pt-2">
                <?php echo $news['bl_content']; ?>
            </div>
        </div>

    </div>
</section>
<?php if($news['bl_category']==6){ ?>

<section class="partners thm-gray-bg">
    <div class="container">
        <div class="block-title text-center">
            <h2 class="block-title__title">Send Your CV</h2>
            <div class="title-divider"></div>
        </div>
        <form action="<?php echo base_url('Settings/careermail'); ?>" method="post" enctype="multipart/form-data">
            <div class="row">
            <div class="col-lg-3">
                <label>Your Name</label>
                <input type="text" name="nsname" id="nsname" class="form-control" placeholder="Full Name" required>
                <input type="hidden" name="Subject" id="Subject" class="form-control" placeholder="Full Name" value="<?php echo $title;?>" required>
            </div>
            <div class="col-lg-3">
                <label>Your Email</label>
                <input type="email" name="nsemail" id="nsemail" class="form-control" placeholder="email@example.com" required>
            </div>
            <div class="col-lg-3">
                <label>Your Number</label>
                <input type="text" name="nsmobile" id="nsmobile" class="form-control" placeholder="01xxxxxxxxxx" required>
            </div>
            <div class="col-lg-3">
                <label>Your CV (PDF Format)</label>
                <input type="file" name="attachfile" id="attachfile" class="form-control" accept="application/pdf" required>
            </div>
            <div class="col-lg-3"><br/>
                <button type="submit" class="btn btn-primary">Send CV</button>
            </div>
        </div>
        </form>
    </div>
</section>

<?php } ?>
