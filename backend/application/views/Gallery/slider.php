<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Image Slider</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">


                <div class="row">
                    <div class="col-sm-6">


                        <label>Select Image (1920x390)</label>
                        <input type="file" name="file" id="file" class="form-control">
                        <span id="errorMesage" style="color:red;"></span>

                        <br/> <button type="submit" class="btn btn-primary btn-lg" onclick="filePost()">Add Image</button> 


                    </div> 
                    <div class="col-sm-6">

                        <table class="table table-bordered">
                            <tbody id="galleryimages"> 
                                <?php foreach ($list as $key): ?>
                                    <tr>
                                        <td>
                                            <img src="<?php echo base_url($key->sld_image); ?>" style="width:100px;">
                                        </td>
                                        <td><button class='btn btn-danger' onclick='remove("<?php echo $key->sld_id; ?>")'>Remove</button></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>


                </div>

            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-body">
                Wait Until Finish Upload
            </div>

        </div>
    </div>
</div>

<!-- Modal -->



<script type="text/javascript">

    function filePost() {



        var file_data = $('#file').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);

        //$('#modal').modal('show');

        $.ajax({
            type: 'POST',
            data: form_data,
            url: '<?php echo base_url(); ?>Gallery/sliderdo_upload',
            dataType: 'json',
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                if ((response.error !=""||response.error !=null)&& response.error!='undefined') { 
                    document.getElementById("errorMesage").innerHTML = response.error;
                }else{
                    document.getElementById("errorMesage").innerHTML = "";
                }
                console.log(response);
                document.getElementById("file").value = '';
                getImages();
                //$('#modal').modal('hide');
            }
        });
    }

    function getImages() {

        var id = "";

        var content = "";
        $.ajax({
            type: 'POST',
            data: {id: id},
            url: '<?php echo base_url(); ?>Gallery/get_slider_Images',
            dataType: 'json',
            success: function (response) {
                $.each(response, function (index, value) {
                    content += "<tr><td><img src='<?php echo base_url(); ?>" + value.sld_image + "' width='100'></td><td><button class='btn btn-danger' onclick='remove(" + value.sld_id + ")'>Remove</button></td></tr>";
                });
                document.getElementById('galleryimages').innerHTML = content;
            }
        });
    }

    function remove(id) {
        $.ajax({
            type: 'POST',
            data: {id: id},
            url: '<?php echo base_url(); ?>Gallery/RemoveImgslider',
            dataType: 'json',
            success: function (response) {
                getImages();
            }
        });
    }
</script>

