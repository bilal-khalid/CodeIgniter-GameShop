<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('includes/head'); ?>
</head>
<body>
    <?php $this->load->view('includes/navigation'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <?php $this->load->view('includes/sidebar'); ?>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header text-white bg-success">
                        GameShop
                    </div>
                    <div class="card-body">
                        <?php $this->load->view('includes/flash'); ?>
                        <?php $this->load->view($main_content); ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container -->

    <div class="footer bg-dark text-white mt-5">
        <div class="container">
            <p class="text-center p-4 m-0">GameShop &copy; 2019, All Rights Reserved</p>
        </div>
    </div>
    <?php $this->load->view('includes/scripts'); ?>
</body>
</html>
