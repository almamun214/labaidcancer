
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
            <label class="col-sm-2 col-form-label">Hotline</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="ss_hotline" name="ss_hotline" value="<?php echo $single['ss_hotline']; ?>" placeholder="1234">
                <small  class="warning"><?php echo form_error('ss_hotline'); ?></small> 
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Emergency  </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="ss_emargency" name="ss_emargency" value="<?php echo $single['ss_emargency']; ?>" placeholder="123456">
                <small  class="warning"><?php echo form_error('ss_emargency'); ?></small> 
            </div>
        </div>
   
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email  </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="ss_email" name="ss_email" value="<?php echo $single['ss_email']; ?>" placeholder="email@example.com">
                <small  class="warning"><?php echo form_error('ss_email'); ?></small> 
            </div>
        </div>
        <?php 
        $social_decoded= json_decode($single['ss_social'],true);
        ?>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Facebook  </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Facebook" name="Facebook" value="<?php echo $social_decoded['Facebook']; ?>" placeholder="Facebook">
                <small  class="warning"><?php echo form_error('Facebook'); ?></small> 
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Twitter  </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Twitter" name="Twitter" value="<?php echo $social_decoded['Twitter']; ?>" placeholder="Twitter">
                <small  class="warning"><?php echo form_error('Twitter'); ?></small> 
            </div>
        </div>
     
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Linkedin  </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Linkedin" name="Linkedin" value="<?php echo $social_decoded['Linkedin']; ?>" placeholder="Linkedin">
                <small  class="warning"><?php echo form_error('Linkedin'); ?></small> 
            </div>
        </div>
        
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Youtube  </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="Youtube" name="Youtube" value="<?php echo $social_decoded['Youtube']; ?>" placeholder="Youtube">
                <small  class="warning"><?php echo form_error('Youtube'); ?></small> 
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
