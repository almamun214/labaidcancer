
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Comprehensive Care Team Information</h3>

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
        <?php } echo form_open_multipart(); ?>


        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Title <span class="warning">*</span></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="driver_name" name="cc_name" value="<?php echo $gq['cc_name']; ?>" placeholder="Name">
                <small  class="warning"><?php echo form_error('cc_name'); ?></small> 
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-2 col-form-label">
                <label for="picture">Picture (Dimension:1000x1000, Size: max 2 MB)</label>
            </div>
            <div class="col-sm-8">
                <input type="file" id="picture" name="picture" class="form-control">
                <small  class="warning"><?php echo @$upload_errors; ?></small>      
            </div>
            <div class="col-sm-2">
                <img src="<?php echo base_url().$gq['image']; ?>" width="50">
                <input type="hidden" name="oldimg" value="<?php echo $gq['image']; ?>">
                   
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
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars insertdatetime  nonbreaking",
                "table contextmenu directionality emoticons paste textcolor  code"
            ],
            toolbar: 'undo redo |table| bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
        });


    </script>
<?php } ?>