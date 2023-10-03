<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Image Gallery</h3>

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

                        <label>Select Image</label>
                        <input type="file" name="file" id="file" class="form-control">


                        <br/> <button type="submit" class="btn btn-primary btn-lg" onclick="filePost()">Add Image</button> 
                        <button class='btn btn-info btn-lg' onclick='getImages()'>Load Image</button>
                    </div> 
                    <div class="col-sm-6">

                        <table class="table table-bordered">
                            <tbody id="galleryimages"> 

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




<?php

function footer() { ?>
    <script>
        window.load = getImages();


        function filePost() {

            var file_data = $('#file').prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);

            $('#modal').modal('show');

            $.ajax({
                type: 'POST',
                data: form_data,
                url: '<?php echo base_url(); ?>Gallery/do_upload_room',
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    document.getElementById("file").value = '';
                    getImages();
                    $('#modal').modal('hide');
                }
            });
        }

        function getImages() {

            var id = '';
            var content = "";
            $.ajax({
                type: 'POST',
                data: {id: id},
                url: '<?php echo base_url(); ?>Gallery/getImages_room',
                dataType: 'json',
                success: function (response) {
                    $.each(response, function (index, value) {
                        content += "<tr><td><img src='<?php echo base_url(); ?>" + value.rm_image + "' width='100'></td><td><button class='btn btn-danger' onclick='remove(" + value.rm_id + ")'>Remove</button></td></tr>";
                    });
                    document.getElementById('galleryimages').innerHTML = content;
                }
            });
        }

        function remove(id) {
            $.ajax({
                type: 'POST',
                data: {id: id},
                url: '<?php echo base_url(); ?>Gallery/RemoveImg_room',
                dataType: 'json',
                success: function (response) {
                    if (response == true) {
                        getImages();
                    }
                }
            });
        }

    </script>
<?php } ?>
