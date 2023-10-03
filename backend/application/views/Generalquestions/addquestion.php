
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Question Information</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        <?php if (!empty($ses_data)) { ?>
            <div class="alert alert-primary" role="alert">
                <?php echo $ses_data; ?>
            </div>
        <?php } echo form_open(''); ?>


        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Question <span class="warning">*</span></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="driver_name" name="qname" value="<?php set_value('qname'); ?>" placeholder="Question">
                <small  class="warning"><?php echo form_error('qname'); ?></small> 
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Description <span class="warning">*</span></label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="4" placeholder="description" id="description" name="descripton"><?php set_value('description'); ?></textarea>
                <small  class="warning"><?php echo form_error('descripton'); ?></small> 
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <input type="submit" class="btn btn-success" name="save" value="Submit">
            </div>
        </div>
        <?php form_close(); ?>

    </div>

</div>
<!-- /.card -->

<?php

function footer() { ?>
    <script>
        tinymce.init({
            selector: 'textarea#description',
            plugins: 'lists spellchecker',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
        });


    </script>
<?php } ?>