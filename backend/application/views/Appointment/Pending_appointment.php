
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Appointment Information</h3>

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
                <table border="0" cellspacing="5" cellpadding="5">
        <tbody><tr>
            <td>Minimum date:</td>
            <td><input type="text" id="min" name="min"></td>
        </tr>
        <tr>
            <td>Maximum date:</td>
            <td><input type="text" id="max" name="max"></td>
        </tr>
    </tbody></table>
                    <table class="table table-bordered table-striped" id="pendingappo">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Patient Name</th>
                                <th>Email</th>
                                <th>Patient Phone</th>
                                <th>Doctor Name</th>
                                <th>District</th>
                                <th>Appointment Date</th>
                                <th>Created At</th>
                                <th>Updated By</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php $count=1; foreach ($apoint as $dpt): ?>
                            <tr>
                                <td><?php echo $dpt->appointment_id; ?></td>
                                <td><?php echo $dpt->p_name; ?></td>
                                <td><?php echo $dpt->p_email; ?></td>
                                <td><?php echo $dpt->phone; ?></td>
                                <td><?php echo $dpt->d_name; ?></td>
                                <td><?php echo $dpt->dis_name; ?></td>
                                <td><?php if($dpt->confirm_appointment_date != '0000-00-00 00:00:00'){ echo date("jS F, Y", strtotime($dpt->confirm_appointment_date)); }?></td>
                                <td><?php echo $dpt->create_date; ?></td>
                                <td><?php echo $dpt->a_name; ?></td>
                                <td><?php 
                                
                                    if($dpt->status==1){
                                        echo "<span class='badge badge-warning'>Pending</span>";
                                    }
                                    if($dpt->status==2){
                                        echo "<span class='badge badge-success'>Confirmed</span>";
                                    }
                                    if($dpt->status==3){
                                        echo "<span class='badge badge-danger'>Canceled</span>";
                                    }

                                    
                                    ?>
                                </td>
                                
                                <td>
                                    <a href="<?php echo base_url('appointment/appointment_details/'.$dpt->appointment_id); ?>" class="btn btn-primary">View</a>
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
 
     
        var minDate, maxDate;
 
// Custom filtering function which will search data in column four between two values
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = minDate.val();
        var max = maxDate.val();
        var date = new Date( data[7] );
 
        if (
            ( min === null && max === null ) ||
            ( min === null && date <= max ) ||
            ( min <= date   && max === null ) ||
            ( min <= date   && date <= max )
        ) {
            return true;
        }
        return false;
    }
);

$(document).ready(function() {
    // Create date inputs
    minDate = new DateTime($('#min'), {
        format: 'MMMM Do YYYY'
    });
    maxDate = new DateTime($('#max'), {
        format: 'MMMM Do YYYY'
    });
 
    // DataTables initialisation
    var table = $('#pendingappo').DataTable({
        order: [[0, 'desc']],
    });

 
    // Refilter the table
    $('#min, #max').on('change', function () {
        table.draw();
    });
});

    </script>
<?php } ?>