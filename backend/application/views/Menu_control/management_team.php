
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Management Team Information</h3>

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
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Order</th>
                        
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count=1; foreach($mtl as $key): ?>
                    <tr>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo $key->mmt_name; ?></td>
                        <td><?php echo $key->mmt_designation; ?></td>
                        <td><?php echo $key->mmt_order; ?></td>
                        
                        <td>
                            <a href="<?php echo base_url('menucontrol/update_team/'.$key->mmt_id); ?>" class="btn btn-info" title="Edit">E</a>
                            <a href="<?php echo base_url('menucontrol/delete_team/'.$key->mmt_id); ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure you want to Delete?');">D</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>   

    </div>

</div>
<!-- /.card -->
