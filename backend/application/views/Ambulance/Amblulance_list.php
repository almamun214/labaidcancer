
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Ambulance Information</h3>

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
                        <th>Vehicle Number</th>
                        <th>Driver Name</th>
                        <th>Driver Number</th>
                        <th>Contact NO</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count=1; foreach($ambulance_list as $key): ?>
                    <tr>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo $key->ab_vehicle_no; ?></td>
                        <td><?php echo $key->ab_driver_name; ?></td>
                        <td><?php echo $key->ab_driver_nid; ?></td>
                        <td><?php echo $key->ab_contact; ?></td>
                        
                        <td>
                            <a href="<?php echo base_url('ambulance/updateambulance/'.$key->ab_aid); ?>" class="btn btn-info">E</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        

    </div>

</div>
<!-- /.card -->
