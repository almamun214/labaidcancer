<style>
    label{
        margin-top: 4px;
        padding-left: 8px;
        color:#000;
    }
    .form-control{
        height: calc(2.25rem + 10px);
    }
    .required{color:red;}
    .chosen-container-single .chosen-single{
        display: block;
        width: 100%;
        height: calc(2.25rem + 2px);
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
</style>


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



<section class="appointment-one appointment-one__appointment-page">
    <div class="container">
        <div class="inner-container">
            <h3 class="appointment-one__title">Get an Appointment</h3><!-- /.appointment-one__title -->
        <?php  echo form_open(''); ?>

            <form method="post" class="appointment-one__form contact-form-vaidated">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <label>Full Name</label><span style="color:red">*</span>
                        <input type="text" class="form-control" placeholder="full name" name="name" required>  
                        <small  class="required"><?php echo form_error('name'); ?></small>   
                    </div><!-- /.col-lg-5 -->

                    <div class="col-xl-6 col-lg-6">
                        <label>Email</label><span style="color:red">*</span>
                        <input type="email" class="form-control" placeholder="email@example.com" name="email" required>
                        <small  class="required"><?php echo form_error('email'); ?></small> 
                    </div>
                    <!-- /.col-lg-5 -->


                    <div class="col-xl-6 col-lg-6">
                        <label>Select Your Gender</label><span style="color:red">*</span>
                        <select class="form-control" name="gender" required>
                            <option value="">  Select Gender  </option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        <small  class="required"><?php echo form_error('gender'); ?></small> 
                    </div><!-- /.col-lg-3 -->
                    <div class="col-xl-6 col-lg-6">
                        <label >District</label><span style="color:red">*</span>
                        <select class="chosen-select form-control"  tabindex="4"  name="district" id="district" required>
                            <option value="">Choose District</option>
                            <?php foreach ($districts as $district): ?>
                                <option value="<?php echo $district->id; ?>"><?php echo $district->dis_name; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <small  class="required"><?php echo form_error('department'); ?></small> 
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <label>Phone Number</label><span style="color:red">*</span>
                        <input type="text" class="form-control" placeholder="01xxxxxxxxxx" name="phone" required autocomplete="off" autofocus oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" maxlength="11">
                        <small  class="required"><?php echo form_error('phone'); ?></small> 
                    </div><!-- /.col-lg-5 -->

                    <div class="col-xl-6 col-lg-6">
                        <label>Date Of Birth</label><span style="color:red">*</span>
                        <input type="date" id="dob" name="dob"  class="form-control" placeholder="Set a date" required>
                        <small  class="required"><?php echo form_error('dob'); ?></small> 
                    </div><!-- /.col-lg-4 -->

                    <div class="col-xl-6 col-lg-6">
                        <label>Appointment Date</label><span style="color:red">*</span>
                        <input type="date" name="booking_date" id="booking_date" class="form-control" placeholder="Set a date" required>
                        <small  class="required"><?php echo form_error('booking_date'); ?></small> 
                    </div><!-- /.col-lg-4 -->

                    <!-- <div class="col-xl-6 col-lg-6">
                        <label >Department</label>
                        <select class="form-control" name="department" id="department" onchange="getDoctors()">
                            <option value="">Choose Department</option>
                            <?php foreach ($department as $dpt): ?>
                                <option value="<?php echo $dpt->dd_id; ?>"><?php echo $dpt->dd_name; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <small  class="required"><?php echo form_error('department'); ?></small> 
                    </div> -->
                    <!-- /.col-lg-5 -->

                    <div class="col-xl-6 col-lg-6">
                        <label>Doctor</label><span style="color:red">*</span>
                        <span id="setDoctor">
                            <select class="chosen-select form-control"  tabindex="4"  name="doctor" id="doctor"  required>
                                <option value="">Choose Doctor</option>
                                <?php foreach ($doctors as $doctor): ?>
                                    <option value="<?php echo $doctor->d_id; ?>" <?php if(!empty($selected_doctor) && $selected_doctor['d_id']== $doctor->d_id){ echo "selected";}?>><?php echo $doctor->d_name; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </span>
                        <small  class="required"><?php echo form_error('doctor'); ?></small> 
                    </div><!-- /.col-lg-4 -->

                    <!-- <div class="col-xl-12 col-lg-12">
                        <label>Remarks</label>
                        <textarea id="address" name="address" class="form-control" rows="3" placeholder="address"></textarea>
                        <small  class="required"><?php echo form_error('address'); ?></small> 
                    </div> -->
                    <!-- /.col-lg-5 -->

                    <div class="col-xl-12 col-lg-12">
                        <label>Remarks</label>
                        <textarea id="remarks" name="remarks" class="form-control" rows="3" placeholder="remarks"></textarea>
                        <small  class="required"><?php echo form_error('remarks'); ?></small> 
                    </div><!-- /.col-lg-5 -->
                    <br>
                    <div class="form-group pt-4">
                        <div class="g-recaptcha" data-sitekey="6LcPaskiAAAAAD8OrU0kfjJEVQWAf-_6INlsDugN"></div>
                    </div>
                    <div class="col-xl-3 col-lg-12">
                        <button type="submit" class="appointment-one__btn thm-btn mt-4">Submit Request</button>
                    </div><!-- /.col-lg-3 -->
                    
                </div><!-- /.row -->
            </form>
            <div class="result"></div><!-- /.result -->
        </div><!-- /.inner-container -->
    </div><!-- /.container -->
</section><!-- /.appointment-one -->
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    
    $(document).ready(function () {
        <?php if($this->session->flashdata('success')){ ?>
        Swal.fire(
        'Congratulations!',
        'Your appointment has placed successfully!',
        'success'
        );
        <?php } ?>
        <?php if($this->session->flashdata('failed')){ ?>
        Swal.fire(
        'Failed!',
        'Validation Fail Try Again!',
        'error'
        );
        <?php } ?>
        dob.max = new Date().toISOString().split("T")[0];
        booking_date.min = new Date().toISOString().split("T")[0];
        });
    function getDoctors() {

        var content = "<select  id='doctor' name='doctor' class='form-control'>";
        var department = $("#department option:selected").val();
        $.ajax({
            type: 'POST',
            data: {department: department},
            url: "<?php echo base_url('doctors/GetDoctorList'); ?>",
            dataType: 'json',
            success: function (response) {
                var count = 1;
                $.each(response, function (index, value) {
                    var sn = count++;
                    content += "<option value='" + value.d_id + "'>" + value.d_name + "</option>";
                });

                content += "</select>";

                document.getElementById("setDoctor").innerHTML = content;

            }
        });
    }


</script>
