
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Package Information</h3>

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
        <?php } ?>

        <div class="table-responsive">
            <table class="table table-bordered" id="dbtable">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Image</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1;
                    foreach ($gqlist as $key): ?>
                        <tr>
                            <td><?php echo $count++; ?></td>
                            <td><?php echo $key->pqm_name; ?></td>
                            <td><img src="<?php echo base_url($key->pqm_image); ?>" width="50"></td>


                            <td>
                                <a href="<?php echo base_url('packages/update_patient_package/' . $key->pqm_id); ?>" class="btn btn-info" title="Edit">E</a>
                                <a href="<?php echo base_url('packages/patient_addtab/' . $key->pqm_id); ?>" class="btn btn-primary" title="Add Tab">AT</a>
                                <a href="<?php echo base_url('packages/patient_delete_package/' . $key->pqm_id); ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are you sure want to delete');">D</a>
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