<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2>Welcome back <?php echo $this->session->userdata('a_name'); ?></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Media Post
                </div>
                <div class="card-body text-center">
                    <?php echo $ddata['media']; ?>
                </div>
                <div class="card-footer text-muted">
                    Total
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    DR Category
                </div>
                <div class="card-body text-center">
                    <?php echo $ddata['drcat']; ?>
                </div>
                <div class="card-footer text-muted">
                    Total
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Doctor
                </div>
                <div class="card-body text-center">
                    <?php echo $ddata['total_doc']; ?>
                </div>
                <div class="card-footer text-muted">
                    Total
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Added Test
                </div>
                <div class="card-body text-center">
                    <?php echo $ddata['total_test']; ?>
                </div>
                <div class="card-footer text-muted">
                    Total
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card text-center">
                <div class="card-header">
                    Technology
                </div>
                <div class="card-body text-center">
                    <?php echo $ddata['total_tech']; ?>
                </div>
                <div class="card-footer text-muted">
                    Total
                </div>
            </div>
        </div>

    </div>
</div>