
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
            <div class="col-lg-4">
                <div class="form-group" id="department">
                    <label for="department">Department</label>

                    <select name="department" id="department" class="form-control" onchange="getDoctors()">
                        <option value="">Select Department</option>
                        <?php foreach ($department as $dpt): ?>
                            <option value="<?php echo $dpt->dd_id; ?>"><?php echo $dpt->dd_name; ?></option>
                        <?php endforeach; ?>
                    </select>

                </div>
            </div>
            <div class="col-lg-8"></div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive" id="fulltable">
                    <table class="table table-bordered table-striped" id="dbtable">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Order</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="tablebody">
                            <?php $count = 1;
                            foreach ($doctor as $dr):
                                ?>
                                <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td><?php echo $dr->d_name; ?></td>
                                    <td><?php echo $dr->d_mobile; ?></td>
                                    <td><?php echo $dr->d_email; ?></td>
                                    <td><?php echo $dr->doctor_order; ?></td>
                                    <td> 
                                        <a href="<?php echo base_url('doctors/updatedoctor/' . $dr->d_id); ?>" class='btn btn-success' title='Edit Doctor'>E</a> 
                                        <a href="<?php echo base_url('doctors/delete_doctor/' . $dr->d_id); ?>" class='btn btn-danger' title="Delete" onclick="return confirm('Are you sure?')">D</a> 
                                        <a href="<?php echo base_url('doctors/speciality/' . $dr->d_id); ?>" class='btn btn-success' title='Special on'>SP</a> 
                                        <a href="<?php echo base_url('doctors/working_hour/' . $dr->d_id); ?>" class='btn btn-info' title='Working Hour'>WH</a> 
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

        function getDoctors() {

            var content = '<table class="table table-bordered table-striped" id="dbtable"><thead><tr><th>SL</th><th>Name</th><th>Phone</th><th>Email</th><th>Order</th><th></th></tr></thead><tbody>';
            var department = $("#department option:selected").val();
            $.ajax({
                type: 'POST',
                data: {department: department},
                url: 'GetDoctorList',
                dataType: 'json',
                success: function (response) {
                    var count = 1;
                    
                    $.each(response, function (index, value) {
                        var sn = count++;
                        content += "<tr><td>" + sn + "</td><td>" + value.d_name + "</td><td>" + value.d_mobile + "</td><td>" + value.d_email + "</td><td>" + value.doctor_order + "</td><td> <a href='<?php echo base_url(); ?>doctors/updatedoctor/" + value.d_id + "' class='btn btn-success' title='Edit Doctor'>E</a> <button onclick='ConfirmDelete("+ value.d_id +")' class='btn btn-danger' title='Delete'>D</button> <a href='<?php echo base_url(); ?>doctors/speciality/" + value.d_id + "' class='btn btn-success' title='Special on'>SP</a> <a href='<?php echo base_url(); ?>doctors/working_hour/" + value.d_id + "' class='btn btn-info' title='Working Hour'>WH</a> </td></tr>";
                    });

                    content += '</tbody></table>';
                    document.getElementById("fulltable").innerHTML = content;
                    callDatatable("dbtable");
                }
            });
        }


function ConfirmDelete(id)
    {
      var xx="<?php echo base_url(); ?>doctors/delete_doctor/"+id;
      var x = confirm("Are you sure ?");
      if (x)
          window.location.href=xx;
      else
        return false;
    }

    </script>
<?php } ?>
