
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">All User Information</h3>

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
        <?php }?>

        <div class="table-responsive">
            <table class="table table-bordered" id="dbtable">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count=1; foreach($list as $key): ?>
                    <tr>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo $key->a_name; ?></td>
                        <td><?php echo $key->a_user; ?></td>
                        <td><?php if($key->a_id==1){ ?>
                            <a href="" class="btn btn-danger" title="Delete">D</a>
                        <?php }else { ?>
                            <a href="<?php echo base_url('user/delete_user/'.$key->a_id); ?>" disabled="1" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?')" title="Delete">D</a>
                            <a href="<?php echo base_url('user/changepass_admin/'.$key->a_id); ?>" disabled="1" class="btn btn-info" onClick="return confirm('Password will set 123456')" title="Change Password">C</a>
                       <?php } ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        

    </div>

</div>
<!-- /.card -->

    <?php

function footer() { ?>
    <script>
       callDatatable("dbtable");
    </script>
<?php } ?>