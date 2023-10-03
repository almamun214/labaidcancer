
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Update Ambulance Information</h3>

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
            <label class="col-sm-2 col-form-label">Vehicle Number <span class="warning">*</span></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="vehicle_no" name="vehicle_no" value="<?php echo $ambulance['ab_vehicle_no']; ?>" placeholder="Vehicle Number">
                <small  class="warning"><?php echo form_error('vehicle_no'); ?></small> 
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Driver Name <span class="warning">*</span></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="driver_name" name="driver_name" value="<?php echo $ambulance['ab_driver_name']; ?>" placeholder="Driver Name">
                <small  class="warning"><?php echo form_error('driver_name'); ?></small> 
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Driver NID <span class="warning">*</span></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="driver_nid" name="driver_nid" value="<?php echo $ambulance['ab_driver_nid']; ?>" placeholder="Driver NID">
                <small  class="warning"><?php echo form_error('driver_nid'); ?></small> 
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Contact Number <span class="warning">*</span></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="contact_no" name="contact_no" value="<?php echo $ambulance['ab_contact']; ?>" placeholder="Contact Number">
                <small  class="warning"><?php echo form_error('contact_no'); ?></small> 
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <input type="submit" class="btn btn-success" name="save" value="Update">
            </div>
        </div>
        <?php form_close(); ?>

    </div>

</div>
<!-- /.card -->
