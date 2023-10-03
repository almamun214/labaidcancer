
<style>.required{color:red;}</style>
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Doctor Information</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        <?php if (!empty($ses_data)) { ?>
            <div class="alert alert-success" role="alert">
                <?php echo $ses_data; ?>
            </div>
        <?php } ?>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="fullname">Full Name <span class="required">*</span></label>
                <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $doctor['d_name']; ?>" placeholder="Mr Jone Doe">
                <small  class="warning"><?php echo form_error('fullname'); ?></small>   
            </div>
            <div class="form-group">
                <label for="fullname">Order </label>
                <input type="text" class="form-control" id="doctor_order" name="doctor_order" value="<?php echo $doctor['doctor_order']; ?>" placeholder="0">
                <small  class="warning"><?php echo form_error('doctor_order'); ?></small>
            </div>
            <div class="form-group">
                <label for="emailaddress">Email Address </label>
                <input type="email" class="form-control" id="emailaddress" name="emailaddress" value="<?php echo $doctor['d_email']; ?>" placeholder="example@email.com">
                <small  class="warning"><?php echo form_error('emailaddress'); ?></small>   
            </div>


            <div class="form-group" id="department">
                <label for="department">Department <span class="required">*</span></label>

                <select name="department" id="department" class="form-control">
                    <option value="">Select Department</option>
                    <?php
                    foreach ($department as $dpt):
                        if ($dpt->dd_id == $doctor['d_department']) {
                            ?>
                            <option value="<?php echo $dpt->dd_id; ?>" selected="1"><?php echo $dpt->dd_name; ?></option>
                        <?php } else {
                            ?>
                            <option value="<?php echo $dpt->dd_id; ?>"><?php echo $dpt->dd_name; ?></option>
    <?php } endforeach; ?>
                </select>

                <small  class="warning"><?php echo form_error('department'); ?></small>     
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control">
                    <option value="">Select Gender</option>
                    <option value="male" <?php if ($doctor['d_gender'] == 'Male') {
    echo "selected";
} ?>>Male</option>
                    <option value="female" <?php if ($doctor['d_gender'] == 'Female') {
    echo "selected";
} ?>>Female</option>
                </select>
                <small  class="warning"><?php echo form_error('gender'); ?></small>  
            </div>

            <div class="form-group">
                <label for="designation">Designation </label>
                <input type="text" class="form-control" id="designation" name="designation" value="<?php echo $doctor['d_designation']; ?>" placeholder="designation">
                <small  class="warning"><?php echo form_error('designation'); ?></small>      
            </div>

            <div class="form-group">
                <label for="address">Address </label>
                <textarea name="address" id="address" rows="3" class="form-control" placeholder="Address"><?php echo $doctor['d_address']; ?></textarea>
                <small  class="warning"><?php echo form_error('address'); ?></small>      
            </div>

            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $doctor['d_mobile']; ?>" placeholder="01xxxxxxxxx">
                <small  class="warning"><?php echo form_error('mobile'); ?></small>      
            </div>

            <div class="form-group">
                <label for="career_title ">Career Title </label>
                <input type="text" class="form-control" id="career_title" name="career_title" value="<?php echo $doctor['d_career_title']; ?>" placeholder="Career Title">
                <small  class="warning"><?php echo form_error('career_title'); ?></small>      
            </div>

            <div class="form-group">
                <label for="short_biography">Short Biography </label>
                <textarea name="short_biography" id="short_biography" rows="3" class="form-control" placeholder="Short Biography"><?php echo $doctor['d_biography']; ?></textarea>
                <small  class="warning"><?php echo form_error('short_biography'); ?></small>      
            </div>

            <div class="form-group">
                <label for="education">Education/Degree</label>
                <textarea name="education" id="education" rows="3" class="form-control"  placeholder="Education/Degree"><?php echo $doctor['d_education']; ?></textarea>
                <small  class="warning"><?php echo form_error('education'); ?></small>      
            </div>
            <div class="form-group">
                <label for="keyword">SEO Keyword </label>
                <input type="text" class="form-control" id="keyword" name="keyword" value="<?php echo $doctor['d_keyword']; ?>" placeholder="keyword1,keyword">
                <small  class="warning"><?php echo form_error('keyword'); ?></small>   
            </div>
            
            <div class="form-group">
                <label for="metadata">SEO Meta Description </label>
                <input type="text" class="form-control" id="metadata" name="metadata" value="<?php echo $doctor['d_meta']; ?>" placeholder="description" max_length="160">
                <small  class="warning"><?php echo form_error('metadata'); ?></small>   
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="picture">Picture <span class="required">*</span> (1024x768)px</label>
                        <input type="file" id="picture" name="picture" class="form-control">
                        <small  class="warning"><?php echo @$upload_errors; ?></small>      
                    </div>
                </div>
                <div class="col-md-4">
                    <img src="<?php echo base_url($doctor['d_picture']);?>" style="height:100px;">
                    <input type="hidden" name="oldimg" value="<?php echo $doctor['d_picture']; ?>">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</div>
<!-- /.card -->


<?php

function footer() { ?>
    <script>
        tinymce.init({
            selector: 'textarea#short_biography',
            plugins: 'lists spellchecker',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
        });
        tinymce.init({
            selector: 'textarea#education',
            plugins: 'lists spellchecker',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
        });

        $(document).ready(function () {
            $('#multiple-checkboxes').multiselect({
                includeSelectAllOption: true,
            });
        });

    </script>
<?php } ?>