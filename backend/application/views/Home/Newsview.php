<!-- Start:: Slider -->
<section
    id="slider"
    style="
        top: -122px;
        position: relative;
        padding-bottom: 0px;
        background-color: rgb(240, 245, 249);
      "
>
    <div
        id="carouselExampleCaptions"
        class="carousel slide"
        data-bs-ride="carousel"
    >
        <div class="carousel-inner">
            <div class="overlay"></div>
            <div class="carousel-item active">
                <img
                    src="<?php echo base_url(); ?>asset/frontend/images/news-article/businessman-reading-daily-news 1.png"
                    class="d-block w-100"
                    alt="..."
                />
                <div class="carousel-caption d-none d-md-block" style="top: 40%">
                    <h1 class="display-6 animate__animated animate__fadeInUp">
                        News &
                    </h1>
                    <h1 class="display-5 animate__animated animate__fadeInUp">
                        <strong style="font-weight: 600"> Article</strong>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</section>
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
