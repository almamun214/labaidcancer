
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

        <label>Name Of Department</label>
        <input type="text" name="dpname" class="form-control" placeholder="Urology"><br/>
        <input type="submit" class="btn btn-success" value="Add New">

        <?php form_close(); ?>

    </div>

</div>
<!-- /.card -->
