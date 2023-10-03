
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">New Testimonial Information</h3>

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
                <input type="text" class="form-control" id="p_name" name="p_name" value="<?php set_value('p_name'); ?>" placeholder="Patient Name">
                <small  class="warning"><?php echo form_error('p_name'); ?></small> 
            </div>
        </div>

        <div class="form-group row" id="department">
            <label class="col-sm-2 col-form-label">Department <span  class="warning">*</span></label>
            <div class="col-sm-10">
                <select name="department" id="department" class="form-control">
                    <option value="">Select Department</option>
                    <?php foreach ($department as $dpt): ?>
                        <option value="<?php echo $dpt->dd_id; ?>"><?php echo $dpt->dd_name; ?></option>
                    <?php endforeach; ?>
                </select>

                <small  class="warning"><?php echo form_error('department'); ?></small>     
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Message <span class="warning">*</span></label>
            <div class="col-sm-10">
                <textarea name="p_message" id="p_message" class="form-control" rows="2" maxlength="115" placeholder="Message"><?php set_value('p_message'); ?></textarea>
                <small  class="warning"><?php echo form_error('p_message'); ?></small> 
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Picture </label>
            <div class="col-sm-8">
                <div class="form-group">
                    <label for="picture">Size (100x100)</label>
                    <input type="file" id="picture" name="picture" class="form-control">
                    <small  class="warning"><?php echo @$upload_errors; ?></small>      
                </div>
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
