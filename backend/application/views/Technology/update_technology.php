<style>.required{color:red;}</style>
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Technology</h3>

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
                <label for="title">Title <span class="required">*</span></label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $singletech['tec_name']; ?>" placeholder="New">
                <small  class="warning"><?php echo form_error('title'); ?></small>   
            </div>
        
            
            <div class="form-group">
                <label for="content">Content <span class="required">*</span></label>
                <textarea name="content" id="content" rows="10" class="form-control" placeholder="content"><?php echo $singletech['tec_content']; ?></textarea>
                <small  class="warning"><?php echo form_error('content'); ?></small> 
                <input type="hidden" name="oldimg" value="<?php echo $singletech['tec_content']; ?>">
            </div>
            <div class="form-group">
                <label for="picture">Featured Image </label>
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