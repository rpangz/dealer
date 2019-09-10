<!DOCTYPE html>
<html>
    <head> 
        <?php $this->load->view('_partial/header.php'); ?>
    </head>


    <body class="fixed-left">
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
                <?php $this->load->view('_partial/topbar.php'); ?>
            <!-- Top Bar End -->
            <!-- ========== Left Sidebar Start ========== -->

            <?php $this->load->view('_partial/menu.php'); ?>
            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h1 class="page-title">CHANGE PASSWORD</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <center><?php echo $this->session->flashdata('message'); ?></center> 
                                <div class="card-box">
                                    <form action="change_password/update_password" method="POST" data-parsley-validate novalidate>
                                        <div class="form-group">
                                            <label for="pass1">Old Password *</label>
                                            <input id="oldpass" name="oldpass"  type="password" placeholder="Password Lama" required class="form-control">
                                            <?php echo form_error('oldpass','<small class="text-danger pl-3">','</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="pass1">New Password *</label>
                                            <input id="newpass" name="newpass" type="password" placeholder="Password Baru" required class="form-control">
                                            <?php echo form_error('newpass','<small class="text-danger pl-3">','</small>') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="passWord2">Re-Type New Password *</label>
                                            <input type="password" required placeholder="Konfirmasi Password Baru" class="form-control" id="confpass" name="confpass">
                                            <?php echo form_error('confpass','<small class="text-danger pl-3">','</small>') ?>
                                        </div>

                                        <div class="form-group text-right m-b-0">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
                                                Cancel
                                            </button>
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>                                                        
                        </div>
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

                

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            
            <!-- /Right-bar -->

        </div>

        
        
        <!-- END wrapper -->
        <?php $this->load->view('_partial/footer.php'); ?>
    </body>
</html>