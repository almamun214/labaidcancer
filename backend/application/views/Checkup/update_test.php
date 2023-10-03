
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">New Test Information</h3>

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
            <label class="col-sm-2 col-form-label">Test Name <span class="warning">*</span></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="testname" name="testname" value="<?php echo $test['ch_name']; ?>" placeholder="Test Name">
                <small  class="warning"><?php echo form_error('testname'); ?></small> 
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Short Name</label>
            <div class="col-sm-10"> 
                <input type="text" class="form-control" id="description" name="description" value="<?php echo $test['ch_short_name']; ?>" placeholder="Short Name">
                <small  class="warning"><?php echo form_error('description'); ?></small> 
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Category <span class="warning">*</span></label>
            <div class="col-sm-10">
                <select name="category" id="category" class="form-control">
                    <option value="">Select Category</option>
                    <?php
                    foreach ($chcat as $cat):
                        if ($test['ch_category'] == $cat->cc_id) {
                            ?>
                    <option value="<?php echo $cat->cc_id; ?>" selected="1"><?php echo $cat->cc_name; ?></option>
                        <?php } else { ?>
                            <option value="<?php echo $cat->cc_id; ?>"><?php echo $cat->cc_name; ?></option>
    <?php } endforeach; ?>
                </select>
                <small  class="warning"><?php echo form_error('category'); ?></small> 
            </div>
        </div>

        <div class="form-group row">
<!--            <label class="col-sm-2 col-form-label">Test Price</label>-->
            <div class="col-sm-10">
                <input type="hidden" class="form-control" id="testprice" name="testprice" value="<?php echo $test['ch_price']; ?>" step="0.5" placeholder="500.0">
                <small  class="warning"><?php echo form_error('testprice'); ?></small> 
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
