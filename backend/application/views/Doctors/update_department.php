
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Department Information</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        <?php if(!empty($ses_data)){ ?>
        <div class="alert alert-primary" role="alert">
            <?php echo $ses_data; ?>
        </div>
        <?php } echo form_open(''); ?>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Name Of Department <span class="warning">*</span></label>
            <div class="col-sm-10">
                <input type="text" name="dpname" class="form-control" value="<?php echo $department['dd_name'] ?>" placeholder="Urology">
                <small  class="warning"><?php echo form_error('dpname'); ?></small> 
            </div>
        </div>
       
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <input type="submit" class="btn btn-success" value="Update">
            </div>
        </div>

        <?php form_close(); ?>

    </div>

</div>
<!-- /.card -->
