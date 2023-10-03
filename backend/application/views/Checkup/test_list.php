

<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Test Information</h3>

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
            <table class="table table-bordered" id="testtable"> 
                <thead>
                    <tr> 
                        <th>SL</th>
                        <th>Test Name</th>
                        <th>Short Name</th>
                        <th>Category</th>
                        
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count=1; foreach($test as $key): ?>
                    <tr>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo $key->ch_name; ?></td>
                        <td><?php echo $key->ch_short_name; ?></td>
                        <td><?php echo $key->cc_name; ?></td>
                        
                        <td>
                            <a href="<?php echo base_url('checkup/updatetest/'.$key->ch_aid); ?>" class="btn btn-info">E</a>
                            <a href="<?php echo base_url('checkup/delete_checkup/' . $key->ch_aid); ?>" class='btn btn-danger' title="Delete" onclick="return confirm('Are you sure?')">D</a> 
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
        callDatatable('testtable');
    </script>
<?php } ?>
