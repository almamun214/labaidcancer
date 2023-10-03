<style>.required{color:red;}</style>
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Cancer</h3>

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
                <label for="title">Cancer Name <span class="required">*</span></label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo set_value('title'); ?>" placeholder="Cancer Name">
                <small  class="warning"><?php echo form_error('title'); ?></small>   
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
                <label for="content">Overview </label>
                <textarea name="content" id="content" rows="10" class="form-control" value="<?php echo set_value('content'); ?>" placeholder="content"></textarea>
                <small  class="warning"><?php echo form_error('content'); ?></small>      
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
                <label for="picture">Featured Image <span class="required">*</span></label>
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
            selector: 'textarea#content',
            plugins: 'lists spellchecker',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
        });
    </script>
<?php } ?>