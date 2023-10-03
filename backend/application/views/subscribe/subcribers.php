
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Subscribers</h3>

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
                        <th>Name</th>
                        <th>Date</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1;
                    foreach ($result as $key): ?>
                        <tr>
                            <td><?php echo $count++; ?></td>
                            <td><?php echo $key->sb_name; ?></td>
                            <td><?php echo $key->sb_email; ?></td>
                            <td><?php echo date('d-M-Y',strtotime($key->sb_date)); ?></td>
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