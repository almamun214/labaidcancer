<!-- Start:: Slider -->
<section id="slider" style="top: -110px; position: relative">
    <div
            id="carouselExampleCaptions"
            class="carousel slide"
            data-bs-ride="carousel"
    >
        <div class="carousel-indicators">
            <!-- <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img
                        src="<?php echo base_url(); ?>asset/frontend/images/doctor_background.png"
                        class="d-block w-100"
                        alt="..."
                />
                <div class="carousel-caption">
                    <h1 class="display-3 animate__animated animate__fadeInUp">
                        <strong style="font-weight: 600; margin-top: 30px"
                        >Doctors</strong
                        >
                    </h1>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Start:: Doctors -->
<section id="doctor">
    <!--    <div class="" style="padding: 0 10%; position: relative; top: -150px; max-width: 600px;">-->
    <!--        <select class="form-select doctor-select" aria-label="Default select example">-->
    <!--            <option>Select Department</option>-->
    <!--            <option value="1">Al Mamun</option>-->
    <!--            <option value="2">Sujon Ahmed</option>-->
    <!--            <option value="3">Raduan Islam</option>-->
    <!--        </select>-->
    <!--    </div>-->
    <div class="doctors-service_background container-fluid">
        <div class="container" style="height: 16px; position: relative; top: -92px">
            <div class="row justify-content-center">
                <?php foreach ($doctor as $doc): ?>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                    <div class="card text-center align-items-center mb-5" style="min-width: 12rem">
                        <img src="<?php echo base_url($doc->d_picture); ?>" class="card-img-top rounded-3" alt="<?php echo $doc->d_name; ?>"
                             style="width: 224px; height: 306px; object-fit: cover"/>
                        <div class="card-body rounded-3 shadow">
                            <h6 class="card-title"><?php echo $doc->dd_name; ?></h6>
                            <p class="card-text"><?php echo $doc->d_name; ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
            <!-- <div class="d-flex justify-content-center">
              <a class="kb-btn kb-btn-1">View All Product</a>
            </div> -->
        </div>
    </div>
</section>