
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

<section class="location">
    <div class="block-title text-center">
        <?php echo '<span color="yellow">' . $this->session->flashdata('email_sent') . '</span>'; ?>
        <h2 class="block-title__title">Our Location</h2>
        <div class="title-divider"></div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14607.606744203096!2d90.36859188036229!3d23.75088505342445!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8ba185de429%3A0x1590d1e02bb4bee9!2z4Kay4KeN4Kav4Ka-4Kas4KaP4KaH4KahIOCmleCnjeCmr-CmvuCmqOCmuOCmvuCmsCDgprngpr7gprjgpqrgpr7gpqTgpr7gprI!5e0!3m2!1sbn!2sbd!4v1611935283871!5m2!1sbn!2sbd"
                width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
</section>

<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-md-4">
            <h3>Office Address</h3>
            <hr/>
        </div>
        <div class="col-md-8">
            <h3>Send Your Message</h3>
            <hr/>

            <form method='post' action='<?php echo base_url('home/contact'); ?>'>

                <label>Name</label><span class="required">*</span>
                <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" required>
                <span style="color:red;"><?php echo form_error('name'); ?></span>

                <label>Phone</label><span class="required">*</span>
                <input type="tel" name="phone" id="phone" class="form-control" placeholder="01xxxxxxxxx" required>
                <span style="color:red;"><?php echo form_error('phone'); ?></span>

                <label>Message</label><span class="required">*</span>
                <textarea name="message" id="message" class="form-control" rows="9"></textarea>
                <span style="color:red;"><?php echo form_error('message'); ?></span>

                <br/>
                <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
                <button type="reset" class="btn btn-danger btn-lg">Reset</button>

            </form> 


        </div>
    </div>
</div>