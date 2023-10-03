
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Update Oporajoyi Content</h3>

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
                <textarea class="form-control" rows="20" placeholder="description" id="description" name="descripton"><?php echo $gq['op_description']; ?></textarea>
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

<?php function footer() { ?>
    <script>
        var baseUrl = "<?php echo base_url(); ?>";
        tinymce.init({
            selector: 'textarea#description',
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
            ],
            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
            toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
            image_advtab: true,

            external_filemanager_path: baseUrl + "asset/plugins/tinymce/plugins/filemanager/",
            filemanager_title: "Responsive Filemanager",
        });
    </script>
<?php } ?>