
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Diagnosis & Treatment Information</h3>

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
                        <th>Question</th>
                        <th>Description</th>
                        
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count=1; foreach($gqlist as $key): ?>
                    <tr>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo $key->gq_title; ?></td>
                        <td><?php echo substr(strip_tags($key->gq_description), 0, 100); ?></td>
                        
                        <td>
                            <a href="<?php echo base_url('generalquestions/updatediagnosistreatment/'.$key->gq_id); ?>" class="btn btn-info" title="Edit">E</a>
                            <a href="<?php echo base_url('generalquestions/delete_diagnosistreatment/'.$key->gq_id); ?>" onclick="return confirm('are you sure?')" class="btn btn-danger" title="Delete">D</a>
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