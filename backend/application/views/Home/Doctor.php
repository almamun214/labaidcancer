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
       <div class="" style="padding: 0 10%; position: relative; top: -150px; max-width: 600px;">
           <select name="department" id="department" onchange="getDoctors()" class="form-select doctor-select" aria-label="Default select example">
               <option value="">Select Department</option>
                <?php foreach ($department as $dpt): ?>
                    <option value="<?php echo $dpt->dd_id; ?>"><?php echo $dpt->dd_name; ?></option>
                <?php endforeach; ?>
           </select>
       </div>
    <div class="doctors-service_background container-fluid">
        <div class="container" style="height: 16px; position: relative; top: -92px">
            <div class="row justify-content-center" id="fulltable">
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


<script src="<?php echo base_url(); ?>asset/js/jquery.js"></script>

<script>
    // $( document ).ready(function() {
    //     callDatatable("dbtable");
    // });


    function getDoctors() {
        $("#fulltable").empty();
        $("#all_doc").show();
        var content = '';
        var department = $("#department option:selected").val();
        var departmentName = $("#department option:selected").text();
        $.ajax({
            type: 'POST',
            data: {department: department},
            url: 'doctors/GetDoctorList',
            dataType: 'json',
            success: function (response) {
                var count = 1;
                if(response.length >0){
                    $.each(response, function (index, value) {
                        // var sn = count++;
                        content += "<div class='col-lg-3 col-md-6 col-sm-12'><div class='team-one__single'> <div class='team-one__image'><img src='"+value.d_picture+"' alt='"+value.d_name+"' class='img-fluid' style='height:300px;' /></div><div class='team-one__content'> <div class='app-btns'><a class='team-one__appointment' href='doctor-appointment/"+value.d_slug+"'>Book Appointment</a></div><h3 class='team-one__title'><a href='doctor-details/"+value.d_slug+"'>"+value.d_name+"</a></h3><p class='team-one__speciality'>"+departmentName+"</p></div></div></div>";
                    });
                }
                else{
                    content += "<div class='alert alert-warning' role='alert'>No Doctor found at "+departmentName+" department.</div>"
                }

                document.getElementById("fulltable").innerHTML = content;
                // callDatatable("dbtable");
            }
        });


    }

</script>

