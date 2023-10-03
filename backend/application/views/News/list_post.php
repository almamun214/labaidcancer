
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Post Information</h3>

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
            <div class="col-lg-4">
                <div class="form-group" id="department">
                    <label for="department">Post Category</label>

                    <select name="department" id="department" class="form-control" onchange="getMypost()">
                        <option value="">Select Category</option>
                        <?php foreach ($department as $dpt): ?>
                            <option value="<?php echo $dpt->bc_id; ?>"><?php echo $dpt->bc_title; ?></option>
                        <?php endforeach; ?>
                    </select>

                </div>
            </div>
            <div class="col-lg-8"></div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dbtable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="tablebody">

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
    function confirm_delete() {
  return confirm('are you sure?');
}

        function getMypost() {

            var content = "";
            var department = $("#department option:selected").val();
            $.ajax({
                type: 'POST',
                data: {department: department},
                url: "<?php echo base_url('news/getpost'); ?>",
                dataType: 'json',
                success: function (response) {
                    var count = 1;
                    $.each(response, function (index, value) {
                        var sn = count++;
                        content += "<tr><td>" + sn + "</td><td>" + value.bl_title + "</td><td> <a class='btn btn-danger'  href='<?php echo base_url(); ?>news/deletepost/" + value.bl_id + "' title='Delete Post'>D</a> <a href='<?php echo base_url(); ?>news/updatepost/" + value.bl_id + "' class='btn btn-success' title='Edit Post'>E</a> </td></tr>";
                    });


                    document.getElementById("tablebody").innerHTML = content;
                    callDatatable("dbtable");
                }
            });
        }


    </script>
<?php } ?>
