
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Management Team</h3>

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
        <?php } echo form_open_multipart(); ?>


        <div class="form-group row">

            <div class="col-sm-2">
                <label for="name">Name</label> 
            </div>
            <div class="col-sm-10">
                <input type="text" value="<?php echo $mtl['mmt_name']; ?>" class="form-control" name="name">
                <small  class="warning"><?php echo form_error('name'); ?></small>  
            </div>
        </div>

        <div class="form-group row">

            <div class="col-sm-2">
                <label for="designation">Designation</label>
            </div>
            <div class="col-sm-10">
                <input type="text" value="<?php echo $mtl['mmt_designation']; ?>" class="form-control" name="designation">
                <small  class="warning"><?php echo form_error('designation'); ?></small>  
            </div>
        </div>
        
          <div class="form-group row">

            <div class="col-sm-2">
                <label for="order">Order</label>
            </div>
            <div class="col-sm-10">
                <input type="number" value="<?php echo $mtl['mmt_order']; ?>" class="form-control" name="order">
                <small  class="warning"><?php echo form_error('order'); ?></small>  
            </div>
        </div>

        <div class="form-group row">

            <div class="col-sm-2">
                <label for="content">Description</label>
            </div>
            <div class="col-sm-10">
                <textarea name="content" class="form-control" rows="5" placeholder="desctiption"><?php echo $mtl['mmt_description']; ?></textarea>
                <small  class="warning"><?php echo form_error('content'); ?></small>  
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-2">
                <label for="picture">Picture (300x300)</label>
            </div>

            <div class="col-sm-8">
                <input type="file" id="picture" name="picture" class="form-control">
                <small  class="warning"><?php echo @$upload_errors; ?></small>
            </div>
            <div class="col-sm-2">
                <img src="<?php echo base_url($mtl['mmt_image']); ?>" class="img-fluid" style="height: 100px;">
                <input type="hidden" name="oldimg" value="<?php echo $mtl['mmt_image']; ?>">
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
 