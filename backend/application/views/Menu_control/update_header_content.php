
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Update Page Content</h3>

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

            <div class="col-sm-12">
                <input type="hidden" value="<?php echo $gq['pgb_name']; ?>" name="title">
                
                <textarea class="form-control" rows="15" placeholder="description" id="description" name="descripton"><?php echo $gq['pgb_description']; ?></textarea> 
                <small  class="warning"><?php echo form_error('descripton'); ?></small>  
            </div>
        </div>

        <div class="form-group row">
            <div class="label col-sm-2">
                Current Header
            </div>
            <div class="col-sm-10">
                <img src="<?php echo base_url($gq['pgb_image']); ?>" class="img-fluid">
                <input type="hidden" name="oldimg" value="<?php echo $gq['pgb_image']; ?>">
                <small  class="warning"><?php echo form_error('oldimg'); ?></small>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-2">
                <label for="picture">New Banner (2000x500)</label>
            </div>
            
            <div class="col-sm-10">
            <input type="file" id="picture" name="picture" class="form-control">
            <small  class="warning"><?php echo @$upload_errors; ?></small>
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
        var baseUrl = "<?php echo base_url(); ?>";
        tinymce.init({
            selector: 'textarea#description',
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons paste textcolor code"

            ],
            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
            toolbar2: " link unlink anchor |forecolor backcolor  | print preview code ",

        });
    </script>
<?php } ?>