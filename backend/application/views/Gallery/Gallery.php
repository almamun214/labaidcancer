<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Image Gallery List</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered" id="dbtable">
                        <thead>
                            <tr>
                                <th>Gallery Title</th>
                                <th>Published Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($image as $key): ?>
                                <tr>
                                    <td><?php echo $key->imgtitle_fulltitle; ?></td>
                                    <td><?php echo $key->imgtitle_date; ?></td>
                                    <td>
                                        <a href="<?php echo base_url('gallery/index/'.$key->imgtitle_id); ?>" class="btn btn-info">Edit</a>
                                        <a href="<?php echo base_url('gallery/delete/'.$key->imgtitle_id); ?>" class="btn btn-danger">Delete</a>
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

<?php

function footer() { ?>
    <script>
       callDatatable("dbtable");
    </script>
<?php } ?>