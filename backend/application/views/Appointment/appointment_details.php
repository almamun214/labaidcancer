
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
        <?php }
 
        ?>


        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <tbody>
                        <form role="form" method="post" action="<?php echo base_url('appointment/complete_appointment/'.$apoint['appointment_id']); ?>">
                            <tr>
                               
                                <td>Patient Name</td>
                                <td><?php echo $apoint['p_name']; ?></td>
                                <input type="hidden" name="p_name" value="<?php echo $apoint['p_name']; ?>">

                                 
                            </tr>
                            <tr>
                               
                                <td>Patient Email</td>
                                <td><?php echo $apoint['p_email']; ?></td>
                                <input type="hidden" name="email" value="<?php echo $apoint['p_email']; ?>">
                                 
                            </tr>
                            <tr>
                                <td>Patient Phone</td>
                                <td><?php echo $apoint['phone']; ?></td>
                                <input type="hidden" name="phone" value="<?php echo $apoint['phone']; ?>">
                            </tr>
                            <tr>
                                <td>Patient Sex</td>
                                <td><?php echo $apoint['p_gender']; ?></td>
                            </tr>
                            <tr>
                                <?php 
                                $dateOfBirth = date("d-m-Y", strtotime($apoint['dob']));
                                // Create a datetime object using date of birth
                                
                                $dob = new DateTime($dateOfBirth);
                                 
                                // Get current date
                                $now = new DateTime();
                                 
                                // Calculate the time difference between the two dates
                                $diff = $now->diff($dob);
                                 
                               
                                ?>
                           
                                <td>Patient Age</td>
                                <td><?php echo $diff->format("%Y Year, %M Months, %D Days "); ?></td>
                            </tr>
                            <tr>
                                <td>Patient District</td>
                                <td><?php echo $apoint['dis_name']; ?></td>
                            </tr>
                            <tr>
                           
                             <tr>
                                <td>Doctor</td>
                                <td><?php echo $apoint['d_name']."<br/>".$apoint['d_career_title']; ?></td>
                                <input type="hidden" name="d_name" value="<?php echo $apoint['d_name']; ?>">

                            </tr>
                            <tr>
                                <td>Patient Appointment Date</td>
                                <input type="hidden" name="appointment_date" value=<?php echo $apoint['appointment_date'] ?>>
                                <td><?php echo date("jS F, Y", strtotime($apoint['appointment_date'])); ?></td>

                            </tr>
                            
                            <tr>
                                <td>Patient Remarks</td>
                                <td><?php echo $apoint['remarks']; ?></td>
                            </tr>
                            <tr>
                                <td>Confirm Appointment Date</td>
                                <td>
                                    <?php 
                                        $date = $apoint['confirm_appointment_date'];
                                        $dt = new DateTime($date);
                                    ?>
                                <?php if($apoint['confirm_appointment_date'] !=null){ ?>
                                    <input type="date" id="appointment_date" class="form-control col-md-4" name="confirm_appointment_date" value="<?php echo $dt->format('Y-m-d'); ?>">
                                <?php } ?>
                                <?php if($apoint['confirm_appointment_date']==null){ ?>
                                    <input type="date" id="appointment_date" class="form-control col-md-4" name="confirm_appointment_date" >
                                <?php } ?>

                                </td>
                            </tr>
                            <tr>

                                <td>Time</td>
                                <td>
                                    <input type="time" id="confirm_appointment_time" name="confirm_appointment_time" value="<?php echo $apoint['appointment_time']; ?>">

                                </td>
                            </tr>

                            <tr>
                                <td>Serial</td>

                                <td><input type="number" id="serial_no" name="serial_no" min="1" value="<?php echo $apoint['serial_no']; ?>" class="form-control col-md-4"></td>
                            </tr>
                            <tr>
                                <td>Note</td>
                                <td>
                                    <textarea name="note" id="note" class="form-control col-md-6" rows="4" cols="35" maxlength="255" placeholder="Use Less then 255 Character...!" spellcheck="false"><?php echo $apoint['note']; ?></textarea>
                                </td>
                            </tr>
                             <tr>
                                <td>Status</td>
                                <td>
                                    <?php 
                                        if($apoint['status']==3){
                                    ?>
                                    <span class='badge badge-danger'>Canceled</span>
                                    <?php 
                                        }
                                    ?>
                                    <?php 
                                        if($apoint['status']==2){
                                    ?>
                                    <span class='badge badge-success'>Confirmed</span>
                                    <?php 
                                        }
                                    ?>
                                    <input type="hidden" id="set_status" value="<?php echo $apoint['status']; ?>">

                                    <?php 
                                        if($apoint['status']==1){
                                    ?>
                                    <select name="status" id="status" class="form-control col-md-4">
                                        <option value="1">Pending</option>
                                        <option value="2">Confirm</option>
                                        <option value="3">Cancel</option>
                                    </select>
                                    <?php 
                                        }
                                    ?>
                                </td>
                            </tr>

                            <?php 
                                        if($apoint['status']==1){
                                    ?>
                                    <tr>
                                        <td>Action</td>
                                        <td>
                                            <input type="submit" class="btn btn-success" value="Submit">
                                        </td>
                                    </tr>
                                    <?php 
                                        }
                                    ?>
                           
                        </form>
                        </tbody>
                       
                    </table>
                </div>
            </div>
        </div>


    </div>

</div>
<!-- /.card -->
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#status").val($('#set_status').val()).change();
        // new Date().toJSON().slice(0,19)
        appointment_date.min = new Date().toISOString().split("T")[0];

        });

        $('#status').on('change', function() {
        status = this.value ;
        if(status == 2){

            $("#confirm_appointment_time").attr("required", "true");
            $("#appointment_date").attr("required", "true");
            $("#serial_no").attr("required", "true");
            $('#note').removeAttr('required');

        }
        if(status == 1){

            $('#confirm_appointment_time').removeAttr('required');
            $('#appointment_date').removeAttr('required');
            $('#serial_no').removeAttr('required');
            $('#note').removeAttr('required');
        }
        if(status == 3){
            $('#confirm_appointment_time').removeAttr('required');
            $('#appointment_date').removeAttr('required');
            $('#serial_no').removeAttr('required');
            $("#note").attr("required", "true");
        }
});
</script>
