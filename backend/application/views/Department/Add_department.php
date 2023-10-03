<style>.required{color:red;}</style>
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Department</h3>

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
                <label for="title">Name <span class="required">*</span></label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo set_value('title'); ?>" placeholder="Name">
                <small  class="warning"><?php echo form_error('title'); ?></small>   
            </div>
           
            <div class="form-group">
                <label for="content">Content <span class="required">*</span></label>
                <textarea name="content" id="content" rows="10" class="form-control" value="<?php echo set_value('content'); ?>" placeholder="content"></textarea>
                <small  class="warning"><?php echo form_error('content'); ?></small>      
            </div>
            
            
            <div class="form-group">
                <label for="picture">Featured Image <span class="required">*</span> (300x300)</label>
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
        var baseUrl = "<?php echo base_url(); ?>";
        tinymce.init({
            selector: 'textarea#content',
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
                                external_plugins: {"filemanager": baseUrl + "asset/plugins/tinymce/plugins/filemanager/plugin.min.js"}
        });
    </script>
<?php } ?>