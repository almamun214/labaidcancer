
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">New Patient Information</h3>

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
            <label class="col-sm-2 col-form-label">Patient Name <span class="warning">*</span></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pname" name="p_name" value="<?php set_value('p_name'); ?>" placeholder="Patient Name">
                <small  class="warning"><?php echo form_error('p_name'); ?></small> 
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Phone Number <span class="warning">*</span></label>
            <div class="col-sm-10">
                <input type="tel" class="form-control" id="p_phone" name="p_phone" value="<?php set_value('p_phone'); ?>" placeholder="number">
                <small  class="warning"><?php echo form_error('p_phone'); ?></small> 
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="p_email" name="p_email" value="<?php set_value('p_email'); ?>" placeholder="Email">
                <small  class="warning"><?php echo form_error('p_email'); ?></small> 
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Gender <span class="warning">*</span></label>
            <div class="col-sm-10">
                <select name="d_gender" id="d_gender" class="form-control">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
                <small  class="warning"><?php echo form_error('d_gender'); ?></small> 
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Address <span class="warning">*</span></label>
            <div class="col-sm-10">
                <textarea name="p_address" id="p_address" class="form-control" rows="2" placeholder="Address"><?php set_value('p_address'); ?></textarea>
                <small  class="warning"><?php echo form_error('p_address'); ?></small> 
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <input type="submit" class="btn btn-success" name="save" value="Add New">
            </div>
        </div>
        <?php form_close(); ?>

    </div>

</div>
<!-- /.card -->
