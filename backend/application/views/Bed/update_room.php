
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">New Room Information</h3>
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
            <label class="col-sm-2 col-form-label">Room Name <span class="warning">*</span></label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="roomname" name="roomname" value="<?php echo $room['room_name']; ?>" placeholder="Room Name">
                <small  class="warning"><?php echo form_error('roomname'); ?></small> 
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="description" name="description" row="3" placeholder="Description" ><?php echo $room['description']; ?></textarea>
                <small  class="warning"><?php echo form_error('description'); ?></small> 
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Bed Limit <span class="warning">*</span></label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="bedlimit" name="bedlimit" value="<?php echo $room['limit']; ?>" placeholder="1">
                <small  class="warning"><?php echo form_error('bedlimit'); ?></small> 
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Cost Per Bed <span class="warning">*</span></label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="costbed" name="costbed" value="<?php echo $room['charge']; ?>" placeholder="1000">
                <small  class="warning"><?php echo form_error('costbed'); ?></small> 
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
