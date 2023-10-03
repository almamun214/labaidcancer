
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">New User Information</h3>

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
            <label class="col-sm-2 col-form-label">Current Password <span class="warning">*</span></label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="oldpass" name="oldpass" value="" placeholder="oldpass">
                <small  class="warning"><?php echo form_error('oldpass'); ?></small> 
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">New Password <span class="warning">*</span></label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="newpass" name="newpass" value="" placeholder="newpass">
                <small  class="warning"><?php echo form_error('newpass'); ?></small> 
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <input type="submit" class="btn btn-success" name="save" value="Change Now">
            </div>
        </div>
        <?php form_close(); ?>

    </div>

</div>
<!-- /.card -->
