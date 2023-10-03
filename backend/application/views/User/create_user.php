
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
            <label class="col-sm-2 col-form-label">Name <span class="warning">*</span></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="fname" name="fname" value="<?php set_value('fname'); ?>" placeholder="Name">
                <small  class="warning"><?php echo form_error('fname'); ?></small> 
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" id="email" name="email" class="form-control" placeholder="user@example.com">
                <small  class="warning"><?php echo form_error('email'); ?></small> 
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="password" id="pass" name="pass" class="form-control" placeholder="1234">
                <small  class="warning"><?php echo form_error('pass'); ?></small> 
            </div>
        </div>
        
        
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <input type="submit" class="btn btn-success" name="save" value="Create Now">
            </div>
        </div>
        <?php form_close(); ?>

    </div>

</div>
<!-- /.card -->
