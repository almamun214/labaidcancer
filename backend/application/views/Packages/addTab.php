<style>.required{color:red;}</style>
<?php $ses_data = $this->session->flashdata('msg'); ?>
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tab</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
        </div>
    </div> 
    <div class="card-body">
        <input type="hidden" name="cnid" id="cnid" value="<?php echo $this->uri->segment(3); ?>">
        <form method="" id="myform">
            <div class="form-group">
                <label for="title">Tab Name<span class="required">*</span></label>
                <input type="text" class="form-control" id="title" name="title"  placeholder="Name">
                <small  class="warning"></small>   
            </div>

            <div class="form-group">
                <label for="content">Tab Description </label>
                <textarea name="content" id="content" rows="10" class="form-control" " placeholder="content"></textarea>
                <small  class="warning"></small>      
            </div>
        </form>

        <button type="button" class="btn btn-primary" onclick="addSection()">Submit</button>
        <br/><br/>

        <span id="loadtable"></span>
    </div>

</div>
<!-- /.card -->


<?php

function footer() { ?>
    <script>
        tinymce.init({
            selector: 'textarea#content',
            plugins: 'lists spellchecker',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment',
        });


        displayData();
        function addSection() {

            var Altext = "";
            var sectionname = $("#title").val();
            var Cancerdetails = tinyMCE.get('content').getContent();
            var cnid = $("#cnid").val();
            if (sectionname == null || sectionname == "") {
                Altext += "Tab Name Required \n";
            }
            if (Cancerdetails == null || Cancerdetails == "") {
                Altext += "Tab Description Required";
            }

            if (Altext == "") {
                $.ajax({
                    type: 'POST',
                    data: {sectionname: sectionname, Cancerdetails: Cancerdetails, cnid: cnid},
                    url: "<?php echo base_url('packages/addTabdata'); ?>",
                    dataType: 'json',
                    success: function (response) {
                        displayData();
                        document.getElementById("myform").reset();
                    }

                });
            } else {
                window.alert(Altext);
            }
        }


        function displayData() {

            var content = "<table class='table table-striped'><thead><tr><th>Tab Name</th><th>Action</th></tr></thead><tbody>";
            var cnid = $("#cnid").val();
            $.ajax({
                type: 'POST',
                data: {cnid: cnid},
                url: "<?php echo base_url('packages/displayJsonData'); ?>",
                dataType: 'json',
                success: function (response) {
                    var count = 1;
                    $.each(response, function (index, value) {

                        content += "<tr><td>" + value.dp_name + "</td><td><button class='btn btn-danger' onclick='removeData(" + value.dp_id + ")' title='Remove'>X</button> </td></tr>";
                    });

                    content += "</tbody></table>";
                    document.getElementById("loadtable").innerHTML = content;
                }
            });
        }


        function removeData(id) {

            $.ajax({
                type: 'POST',
                data: {id: id},
                url: "<?php echo base_url('packages/removePackageTab'); ?>",
                dataType: 'json',
                success: function (response) {
                    displayData();
                }

            });
        }
    </script>
<?php } ?>