
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Testimonial</h3>

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
                        <th>Patient Name</th>
                        <th>Picture</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1;
                    foreach ($testimonial as $key): ?>
                        <tr>
                            <td><?php echo $count++; ?></td>
                            <td><?php echo $key->pt_name; ?></td>
                            <td>
                            <?php if (!empty($key->pt_image)) { ?>
                                    <img src="<?php echo base_url($key->pt_image); ?>" width="100"></td>
    <?php } ?>
                            <td>
                                <a href="<?php echo base_url('patient/updateamtestimonial/' . $key->pt_id); ?>" class="btn btn-info">E</a>
                                <a href="<?php echo base_url('patient/deleteamtestimonial/' . $key->pt_id); ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to Delete?');">D</a>
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