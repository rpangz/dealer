<!DOCTYPE html>
<html>
    <head> 
        <script src="assets/js/admin/laporan_pemasukan_bank.js"></script>
        <?php $this->load->view('_partial/header.php'); ?>
    </head>

    <body class="fixed-left" onload="loaddatatable()">

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
                                <h4 class="page-title"><?php echo $judul; ?></h4>
                            </div>
                        </div>

                        <div style="width:1070px; height: 150px; float:left; padding-left: 10px; padding-top: 10px" class="card-box" >

                        <div style="width: 1200px; height: 40px"> 
                            <div style="width: 150px; float: left;">Tanggal Pemasukan</div>
                            <div style="width: 250px; float: left;">
                               <input type="text" id="datepicker1" style="width: 100px; text-align: center;"> S/D <input type="text" id="datepicker2" style="width: 100px; text-align: center;">
                            </div>
                            <div style="width: 100px; float: left;">&nbsp;</div>
                            <div style="width: 150px; float: left;">Pilih Rekening</div>
                            <div style="width: 350px; float: left;">
                               <select class="form-control" style="width: 240px" id="rekening">
                                  <option value=""></option>
                                  <?php foreach ($rekening as $variant) { ?>
                                    <option value="<?php echo $variant->kode; ?>"><?php echo $variant->norek; ?> ( <?php echo $variant->bank; ?> )</option>
                                  <?php } ?>  
                              </select>    
                            </div>
                        </div> 
  
                        <input type="text" value="-" class="form-control" style="width: 330px; display: none;" id="noref" readonly="">

                        <div style="width:80%; float:left; height: 50px; padding-top: 10px" >
                            <button class="btn btn-success waves-effect waves-light" type="button" style="height: 35px; width: 100px; vertical-align: center" id="search" onclick="loaddata()">
                                <label style="font-size: 12px">Load</label>
                            </button>
                                <button class="btn btn-info waves-effect waves-light" type="button" style="height: 35px; width: 100px; vertical-align: center" onclick="resetform()"> 
                                    <label style="font-size: 12px">Reset</label>
                                </button>
                        </div>

     
                        </div>


                        <!-- datatable -->

                     <div class="row">
                     <div class="col-sm-12">
                        <div class="card-box table-responsive" id="divlaporan">
                           
                           TEST LAPORAN DISINI

                            </div>
                            </div>
                            </div>  

                        <!-- end datatable -->


                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    © 2016. All rights reserved.
                </footer>

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