
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
                <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo set_value('fullname'); ?>" placeholder="Mr Jone Doe">
                <small  class="warning"><?php echo form_error('fullname'); ?></small>   
            </div>
            <div class="form-group">
                <label for="fullname">Order </label>
                <input type="text" class="form-control" id="doctor_order" name="doctor_order" value="<?php echo set_value('Order'); ?>" placeholder="0">
                <small  class="warning"><?php echo form_error('doctor_order'); ?></small>
            </div>
            <div class="form-group">
                <label for="emailaddress">Email Address </label>
                <input type="email" class="form-control" id="emailaddress" name="emailaddress" value="<?php echo set_value('emailaddress'); ?>" placeholder="example@email.com">
                <small  class="warning"><?php echo form_error('emailaddress'); ?></small>   
            </div>

            <div class="form-group">
                <label for="education">Education</label>
                <textarea name="education" id="education" rows="3" class="form-control" value="<?php echo set_value('education'); ?>" placeholder="Education/Degree"></textarea>
                <small  class="warning"><?php echo form_error('education'); ?></small>      
            </div>

            <div class="form-group">
                <label for="designation">Degree</label>
                <input type="text" class="form-control" id="designation" name="designation" value="<?php echo set_value('designation'); ?>" placeholder="designation">
                <small  class="warning"><?php echo form_error('designation'); ?></small>      
            </div>

            <div class="form-group" id="department">
                <label for="department">Department <span class="required">*</span></label>

                <select name="department" id="department" class="form-control">
                    <option value="">Select Department</option>
                    <?php foreach ($department as $dpt): ?>
                        <option value="<?php echo $dpt->dd_id; ?>"><?php echo $dpt->dd_name; ?></option>
                    <?php endforeach; ?>
                </select>

                <small  class="warning"><?php echo form_error('department'); ?></small>     
            </div>

            <div class="form-group">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control">
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <small  class="warning"><?php echo form_error('gender'); ?></small>  
            </div>


            <div class="form-group">
                <label for="address">Address </label>
                <textarea name="address" id="address" rows="3" class="form-control" value="<?php echo set_value('address'); ?>" placeholder="Address"></textarea>
                <small  class="warning"><?php echo form_error('address'); ?></small>      
            </div>

            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo set_value('mobile'); ?>" placeholder="01xxxxxxxxx">
                <small  class="warning"><?php echo form_error('mobile'); ?></small>      
            </div>

            <div class="form-group">
                <label for="career_title ">Career Title </label>
                <input type="text" class="form-control" id="career_title" name="career_title" value="<?php echo set_value('career_title'); ?>" placeholder="Career Title">
                <small  class="warning"><?php echo form_error('career_title'); ?></small>      
            </div>

            <div class="form-group">
                <label for="short_biography">Short Biography </label>
                <textarea name="short_biography" id="short_biography" rows="3" class="form-control" value="<?php echo set_value('short_biography'); ?>" placeholder="Short Biography"></textarea>
                <small  class="warning"><?php echo form_error('short_biography'); ?></small>      
            </div>

            <div class="form-group">
                <label for="keyword">SEO Keyword </label>
                <input type="text" class="form-control" id="keyword" name="keyword" value="<?php echo set_value('keyword'); ?>" placeholder="keyword1,keyword">
                <small  class="warning"><?php echo form_error('keyword'); ?></small>   
            </div>

            <div class="form-group">
                <label for="metadata">SEO Meta Description </label>
                <input type="text" class="form-control" id="metadata" name="metadata" value="<?php echo set_value('metadata'); ?>" placeholder="description" max_length="160">
                <small  class="warning"><?php echo form_error('metadata'); ?></small>   
            </div>

            <div class="form-group">
                <label for="picture">Picture <span class="required">*</span> (1024x768)</label>
                <input type="file" id="picture" name="picture" class="form-control">
                <small  class="warning"><?php echo @$upload_errors; ?></small>      
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