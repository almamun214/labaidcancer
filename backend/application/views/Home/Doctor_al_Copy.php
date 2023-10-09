
<div class="banner-wrapper">
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
                echo "<li class='breadcrumb-item'><a href='".base_url($uri1)."'>" . ucwords($title) . "</a></li>";
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
    <div class="row">
        <div class="col-sm-12">
            <?php echo $headimage['pgb_description']; ?>
        </div>
    </div>
</div>

<section class="team-one team-one__team-page">
    <div class="container">

                              
                        <div class="post-filter-one">
                            <div class="row align-items-center">
                                <div class="col-lg-3">
                                    <select name="department" id="department" class="form-control" onchange="getDoctors()">
                                      <option value="">Select Department</option>
                                      <?php foreach ($department as $dpt): ?>
                                          <option value="<?php echo $dpt->dd_id; ?>"><?php echo $dpt->dd_name; ?></option>
                                      <?php endforeach; ?>
                                  </select>
                                </div>
                                
                                <!--<div class="col-lg-3">-->
                                <!--    <a href="" id="all_doc" style="display:none;"><button class="btn btn-primary">All Doctor</button></a>-->
                                <!--</div>-->
                                
                            </div>
                        </div>
        <div class="row low-gutters" id="fulltable">
            <?php foreach ($doctor as $doc): ?>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="team-one__single">
                        <div class="team-one__image">
                            <img src="<?php echo base_url($doc->d_picture); ?>" alt="<?php echo $doc->d_name; ?>" class="img-fluid" style="height:300px;" />
                        </div>
                        <div class="team-one__content">
                            <div class="app-btns">
                                <a class="team-one__appointment" href="<?php echo base_url('doctor-appointment/'.$doc->d_slug); ?>">Book Appointment</a>
                                <!-- <a class="team-one__location" href="javascript:void();">View Location</a> -->
                            </div>
                            <h3 class="team-one__title"><a href="<?php echo base_url('doctor-details/' . $doc->d_slug); ?>"><?php echo $doc->d_name; ?></a></h3>
                            <p class="team-one__speciality"><?php echo $doc->dd_name; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?> 

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

