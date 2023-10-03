<style>.required{color:red;}</style>
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Send Email</h3>

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
        <form method="post" enctype="multipart/form-data" action="<?php echo base_url('subscriber/runcampaign'); ?>">
            <div class="form-group">
                <label for="title">Subject <span class="required">*</span></label>
                <input type="text" class="form-control" id="Subject" name="Subject" value="<?php echo set_value('Subject'); ?>" placeholder="Subject" required>
                <small  class="warning"><?php echo form_error('title'); ?></small>   
            </div>
        
            
            <div class="form-group">
                <label for="content">Message <span class="required">*</span></label>
                <textarea name="Message" id="Message" rows="10" class="form-control" value="<?php echo set_value('Message'); ?>" placeholder="Message" required></textarea>
                <small  class="warning"><?php echo form_error('Message'); ?></small>      
            </div>
            
        

            
            <div class="form-group">
                <label for="attachfile">Attach File </label>
                <input type="file" id="attachfile" name="attachfile" class="form-control">
                <small  class="warning"><?php echo @$upload_errors; ?></small>      
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>

</div>
<!-- /.card -->


<?php

function footer() { ?>
    <script>
        var baseUrl = "<?php echo base_url(); ?>";
        tinymce.init({
            selector: 'textarea#Message',
        
                                toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
                                toolbar2: " | link unlink anchor | forecolor backcolor  | print preview code ",
                                image_advtab: true,

                                external_filemanager_path: baseUrl + "asset/plugins/tinymce/plugins/filemanager/",
                                filemanager_title: "Responsive Filemanager",
                                external_plugins: {"filemanager": baseUrl + "asset/plugins/tinymce/plugins/filemanager/plugin.min.js"}
        });
    </script>
<?php } ?>