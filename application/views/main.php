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
                                <h1 class="page-title">MAIN MENU</h4>
                            </div>
                        </div>

                        <div class="row" style="width: 2200px;">
                            <div class="col-lg-6">
                                
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