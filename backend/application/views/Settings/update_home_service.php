
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">New Service Information</h3>

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
            <label class="col-sm-2 col-form-label">Icon <span class="warning">*</span> <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Get Icon</a></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="hs_icon" name="hs_icon" value="<?php echo $single['hs_icon']; ?>" placeholder="fa fa-address-card">
                <small  class="warning"><?php echo form_error('hs_icon'); ?></small> 
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Service Name <span class="warning">*</span> </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="hs_name" name="hs_name" value="<?php echo $single['hs_name']; ?>" placeholder="24/7 Service">
                <small  class="warning"><?php echo form_error('hs_name'); ?></small> 
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
