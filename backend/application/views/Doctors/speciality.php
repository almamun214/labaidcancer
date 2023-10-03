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

        <div class="row">
            <div class="col-lg-4">
                <div class="form-group" id="department">
                    <label for="cancer">Cancer</label>
                    <span id="cancerload">

                        <select name="cancer" id="cancer" class="form-control">
                            <option value="">Select Cancer</option>

                        </select>

                    </span>
                </div>
            </div>
            <div class="col-lg-4"><br/>
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
                                <th>Cancer Name</th> 
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
        window.load = getCancer();
        function getCancer() {

            var content = "<select name='cancer' id='cancer' class='form-control'><option value=''>Select Cancer</option>";
            var doctor = $("#doctorid").val();

            $.ajax({
                type: 'POST',
                data: {doctor: doctor},
                url: "<?php echo base_url('doctors/GetCancer'); ?>",
                dataType: 'json',
                success: function (response) {
                    $.each(response, function (index, value) {

                        content += "<option value='" + value.cn_id + "'>" + value.cn_name + "</option>";
                    });
                    content += "</select>";
                    document.getElementById("cancerload").innerHTML = content;
                }

            });
        }


        function addCancer() {


            var doctor = $("#doctorid").val();
            var Cancer = $("#cancer option:selected").val();
            $.ajax({
                type: 'POST',
                data: {doctor: doctor, Cancer: Cancer},
                url: "<?php echo base_url('doctors/addAjaxCancer'); ?>",
                dataType: 'json',
                success: function (response) {
                    displayData();
                }

            });
        }


        function displayData() {

            var content = "";
            var doctor = $("#doctorid").val();
            var Cancer = $("#cancer option:selected").val();
            $.ajax({
                type: 'POST',
                data: {doctor: doctor, Cancer: Cancer},
                url: "<?php echo base_url('doctors/displayDataCancer'); ?>",
                dataType: 'json',
                success: function (response) {
                    var count = 1;
                    $.each(response, function (index, value) {
                        var sn = count++;
                        content += "<tr><td>" + sn + "</td><td>" + value.cn_name + "</td><td><button class='btn btn-danger' onclick='removeData(" + value.sp_id + ")' title='Remove'>X</button> </td></tr>";
                    });


                    document.getElementById("tablebody").innerHTML = content;
                }
            });
        }


        function removeData(id) {
           
            $.ajax({
                type: 'POST',
                data: {id: id},
                url: "<?php echo base_url('doctors/removeDataCancer'); ?>",
                dataType: 'json',
                success: function (response) {
                    displayData();
                }

            });
        }
    </script>
<?php } ?>