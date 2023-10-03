
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">All Cancer Information</h3>

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
        <?php }  ?>

        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="dbtable">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Image</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count=1; foreach($page as $key): ?>
                    <tr>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo $key->pg_name; ?></td>
                        <td><?php echo $key->pg_slug; ?></td>
                        <td>
                            <img src="<?php echo base_url($key->pg_image); ?>" class="img-thumbnail" style="max-height: 50px;">
                        </td>
                        <td>
                            <a href="<?php echo base_url('footerpage/updatepage/'.$key->pg_id); ?>" class="btn btn-info" >E</a>
                            <a href="<?php echo base_url('footerpage/delete_footerpage/' . $key->pg_id); ?>" class='btn btn-danger' title="Delete" onclick="return confirm('Are you sure?')">D</a> 
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