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
        <input type="hidden" value="<?php echo $doctor['d_id']; ?>" id="doctorid">
        <div class="row">
            <div class="col-sm-6">
                <p><b>Name:</b> <?php echo $doctor['d_name']; ?></p>
                <p><b>Email:</b> <?php echo $doctor['d_email']; ?></p>
                <p><b>Department:</b> <?php echo $doctor['dd_name']; ?></p>
            </div>
            <div class="col-sm-6">
                <img src="<?php echo base_url($doctor['d_picture']); ?>" class="img-thumbnail" style="width: 150px;">
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-3">
                <div class="form-group" id="department">
                    <label for="day">Days</label>


                    <select name="day" id="day" class="form-control">
                        <option value="">Select Day</option>
                        <?php foreach ($working_days as $wd): ?>
                            <option value="<?php echo $wd->day_name; ?>"><?php echo $wd->day_name; ?></option>
                        <?php endforeach; ?>
                    </select>


                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group" id="department">
                    <label for="day">Time From</label>
                    <span id="cancerload">

                        <select name="timefrom" id="timefrom" class="form-control">
                            <option value="">Select Time</option>
                            <?php foreach ($time_chart as $tcf): ?>
                                <option value="<?php echo $tcf->tc_time; ?>"><?php echo $tcf->tc_time; ?></option>
                            <?php endforeach; ?>
                        </select>

                    </span>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="form-group" id="department">
                    <label for="day">Time To</label>
                    <span id="cancerload">

                        <select name="timeto" id="timeto" class="form-control">
                            <option value="">Select Time</option>
                            <?php foreach ($time_chart as $tct): ?>
                                <option value="<?php echo $tct->tc_time; ?>"><?php echo $tct->tc_time; ?></option>
                            <?php endforeach; ?>
                        </select>

                    </span>
                </div>
            </div>
            <div class="col-lg-3"><br/>
                <button class="btn btn-primary" onclick="addCancer()">Add New</button>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Day</th> 
                                <th>Time From</th> 
                                <th>Time To</th> 
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

displayData();

        function addCancer() {


            var doctor = $("#doctorid").val();
            var day = $("#day option:selected").val();
            var timefrom = $("#timefrom option:selected").val();
            var timeto = $("#timeto option:selected").val();
            var aleText = "";
            if (timefrom == "" || timefrom == 'undefined') {
                aleText += "Time From Is Required \n";
            }
            if (timeto == "" || timeto == 'undefined') {
                aleText += "Time To Is Required \n";
            }
            if (day == "" || day == 'undefined') {
                aleText += "Day Is Required \n";
            }

            if (aleText == "") {

                $.ajax({
                    type: 'POST',
                    data: {doctor: doctor, day: day,timefrom:timefrom,timeto:timeto},
                    url: "<?php echo base_url('doctors/addAjaxWorkingHour'); ?>",
                    dataType: 'json',
                    success: function (response) {
                        displayData();
                    }

                });
            } else {
                alert(aleText);
            }
        }


        function displayData() {

            var content = "";
            var doctor = $("#doctorid").val();
            $.ajax({
                type: 'POST',
                data: {doctor: doctor},
                url: "<?php echo base_url('doctors/displayDataWorkingHour'); ?>",
                dataType: 'json',
                success: function (response) {
                    var count = 1;
                    $.each(response, function (index, value) {
                        var sn = count++;
                        content += "<tr><td>" + sn + "</td><td>" + value.working_days + "</td><td>"+value.working_from+"</td><td>"+value.working_to+"</td><td><button class='btn btn-danger' onclick='removeData(" + value.dwh_aid + ")' title='Remove'>X</button> </td></tr>";
                    });


                    document.getElementById("tablebody").innerHTML = content;
                }
            });
        }


        function removeData(id) {

            $.ajax({
                type: 'POST',
                data: {id: id},
                url: "<?php echo base_url('doctors/removeDataWorkingHour'); ?>",
                dataType: 'json',
                success: function (response) {
                    displayData();
                }

            });
        }
    </script>
<?php } ?>