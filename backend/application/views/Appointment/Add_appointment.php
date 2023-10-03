
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">New Appointment</h3>

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
        <?php } echo form_open(''); ?>


        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Department Name <span class="warning">*</span></label>
            <div class="col-sm-10">
                <select name="department" id="department" class="form-control" onchange="getDoctors()"> 
                    <option value="">Select Department</option>
                    <?php foreach ($department as $dpt): ?>
                        <option value="<?php echo $dpt->dd_id; ?>"><?php echo $dpt->dd_name; ?></option>
                    <?php endforeach; ?>
                </select>
                <small  class="warning"><?php echo form_error('roomname'); ?></small> 
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Doctors</label>
            <div class="col-sm-10">
                <span id="loadDoctor">
                    <select name="doctor" id="doctor" class="form-control"> 
                        <option value="">Select Doctor</option>
                    </select>
                </span>
                <small  class="warning"><?php echo form_error('doctor'); ?></small> 
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Patient <span class="warning">*</span></label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="bedlimit" name="bedlimit" value="<?php set_value('bedlimit'); ?>" placeholder="1">
                <small  class="warning"><?php echo form_error('bedlimit'); ?></small> 
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Cost Per Bed <span class="warning">*</span></label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="costbed" name="costbed" value="<?php set_value('costbed'); ?>" placeholder="1000">
                <small  class="warning"><?php echo form_error('costbed'); ?></small> 
            </div>
        </div>

        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <input type="submit" class="btn btn-success" name="save" value="Add New">
            </div>
        </div>
        <?php form_close(); ?>

    </div>

</div>
<!-- /.card -->



<?php

function footer() { ?>
    <script>

        function getDoctors() {

            var department = $("#department option:selected").val();
            var content = "<select name='doctor' id='doctor' class='form-control'> <option value=''>Select Doctor </option>";
            $.ajax({
                type: 'POST',
                data: {department: department},
                url: "<?php echo base_url('doctors/GetDoctorList'); ?>",
                dataType: 'json',
                success: function (response) {
                    var count = 1;
                    $.each(response, function (index, value) {
                        content += "<option value='" + value.d_id + "'>" + value.d_name + "</option>";
                    });
                    content += "</select>";

                    document.getElementById("loadDoctor").innerHTML=content;
                }
            });
        }


    </script>
<?php } ?>