
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Doctor Information</h3>

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


        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dbtable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Added</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php $count=1; foreach ($department as $dpt): ?>
                            <tr>
                                <td><?php echo $count++; ?></td>
                                <td><?php echo $dpt->dd_name; ?></td>
                                <td><?php echo $dpt->dd_date; ?></td>
                                <td>
                                    <a href="<?php echo base_url('doctors/updatedepartment/'.$dpt->dd_aid); ?>" class="btn btn-success" title="Edit">E</a>
                                    <a href="<?php echo base_url('doctors/delete_department/' .$dpt->dd_id); ?>" class='btn btn-danger' title="Delete" onclick="return confirm('Are you sure?')">D</a> 
                                </td>
                                
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
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