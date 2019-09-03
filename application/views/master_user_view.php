<!DOCTYPE html>
<html>
    <head> 
        <script src="assets/js/admin/<?php echo $formname; ?>.js"></script>
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

                        <div style="width:1070px; height: 200px; float:left; padding-left: 10px; padding-top: 10px; display: none;" class="card-box" id="divinput">

                        <div style="width: 1200px; height: 40px"> 
                            <div style="width: 150px; float: left;">Tanggal Pemasukan</div>
                            <div style="width: 250px; float: left;">
                               <input type="text" class="form-control" id="datepicker1" style="width: 130px">
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

                        <div style="width: 1200px; height: 40px"> 
                            <div style="width: 150px; float: left;">Jenis Transaksi</div>
                            <div style="width: 250px; float: left;">
                                <select class="form-control" style="width: 240px" id="jenistransaksi">
                                  <option value=""></option>
                                  <option value="DEBET">DEBET</option>
                                  <option value="CREDIT">ADJUSTMENT</option>
                              </select>
                            </div>
                            <div style="width: 100px; float: left;">&nbsp;</div>
                            <div style="width: 150px; float: left;">Nominal</div>
                            <div style="width: 350px; float: left;">
                               <input type="text" value="" class="form-control" style="width: 330px;" id="nominal" onblur="this.value=formatangka(this.value)" onfocus="this.value=unformatangka(this.value)">    
                            </div>
                        </div>  

                        <div style="width: 1200px; height: 40px"> 
                            <div style="width: 150px; float: left;">Keterangan</div>
                            <div style="width: 250px; float: left;">
                              <input type="text" value="" class="form-control" style="width: 330px;" id="keterangan" onblur="this.value=this.value.toUpperCase()">   
                            </div>
                            <div style="width: 100px; float: left;">&nbsp;</div>                              
                        </div>
                        
                        <input type="text" value="-" class="form-control" style="width: 330px; display: none;" id="noref" readonly="">

                        <div style="width:80%; float:left; height: 50px; padding-top: 10px" >
                            <button class="btn btn-success waves-effect waves-light" type="button" style="height: 35px; width: 100px; vertical-align: center" id="search" onclick="simpan()">
                                <label style="font-size: 12px">Save</label>
                            </button>
                                <button class="btn btn-info waves-effect waves-light" type="button" style="height: 35px; width: 100px; vertical-align: center" onclick="resetform()"> 
                                    <label style="font-size: 12px">Reset</label>
                                </button>
                        </div>

     
                        </div>


                        <!-- datatable -->

                    <div class="row" id="divdatatable">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatablemaster" class="table table-striped table-bordered" style="font-size: 11px;">
                                    <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Department</th>
                                        <th>Jabatan</th>
                                        <th>Status</th>
                                        <th>Action</th>                                    
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr role="row" class="odd">       
                                        <td class="sorting_1"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>                   
                                    </tbody>
                                </table>
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