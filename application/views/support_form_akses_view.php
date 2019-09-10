<!DOCTYPE html>
<html>
    <head> 
        <script src="assets/js/admin/<?php echo $formname; ?>.js"></script>
        <style type="text/css">
            
        </style>
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
                            <div class="col-sm-10">
                                <h4 class="page-title"><?php echo $judul; ?> :</h4>  
                            </div>
                            <div class="col-sm-2">                                
                                <span class="label label-success" id="spantypeform">
                                    TYPE FORM : ADD DATA
                                </span>
                                <input type="hidden" id="typeform" value="ADD">  
                            </div>
                            
                        </div>

                        <!-- ======================================================================================================== -->

                        <div class="row" style="font-size: 12px;">
                            <div class="col-sm-12">
                                <div class="card-box">                                    
                                    <div class="row">
                                        <div class="col-md-6 text-left">
                                            <form class="form-horizontal" role="form">                                    
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Nama Menu</label>
                                                    <div class="col-sm-5">
                                                        <select class="selectpicker form-control input-sm" id="namamenu" name="namamenu" data-attr="input_data">
                                                            <?php 
                                                               echo "<option value='' disabled selected>- SELECT MENU -</option>"; 
                                                            foreach ($menu as $variant) { 
                                                                  echo "<option value=".$variant['id_form'].">".$variant['formtitle']."</option>";
                                                               }
                                                            ?>
                                                        </select>                                                        
                                                    </div>
                                                </div>

                                                
                                                
                                            </form>
                                        </div>    

                                        <div class="col-md-6 text-left">
                                            <form class="form-horizontal" role="form">
                                                <div class="form-group">
                                                    <label class="col-sm-2 ">Department</label>
                                                    <div class="col-sm-5">
                                                        <select class="form-control input-sm" id="department" name="department" data-attr="input_data" style="font-size: 11px;">
                                                            <?php 
                                                               echo "<option value='' disabled selected>- SELECT DEPARTMENT -</option>"; 
                                                            foreach ($department as $variant) { 
                                                                  echo "<option value=".$variant['dept_id'].">".$variant['dept_name']."</option>";
                                                               }
                                                            ?>
                                                        </select>                                                        
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 ">Jabatan</label>
                                                    <div class="col-sm-5">
                                                        <select class="form-control input-sm" id="jabatan" name="jabatan" data-attr="input_data" style="font-size: 11px;">
                                                            <?php 
                                                               echo "<option value='' disabled selected>- SELECT JABATAN -</option>"; 
                                                            foreach ($jabatan as $variant) { 
                                                                  echo "<option value=".$variant['jabatan_id'].">".$variant['jabatan_name']."</option>";
                                                               }
                                                            ?>
                                                        </select>                                                        
                                                    </div>
                                                </div> 
                                                <div class="form-group">
                                                    <label class="col-sm-2">Status</label>
                                                    <div class="col-sm-5">
                                                        <select class="form-control input-sm " id="status" name="status" style="font-size: 11px;" data-attr="input_data">
                                                            <?php 
                                                               echo "<option value='' disabled selected>- SELECT STATUS -</option>"; 
                                                               foreach ($list_status as $variant) { 
                                                                  echo "<option value=".$variant['id_status'].">".$variant['statusname']."</option>";
                                                               } 
                                                            ?>
                                                        </select>                                                      
                                                    </div>
                                                </div>   
                                            </form>
                                        </div>

                                        <!-- Untuk Button     -->
                                        <div style="width:80%; float:left; height: 50px; padding-top: 10px" >
                                            <button class="btn btn-success waves-effect waves-light" type="button" style="height: 35px; width: 100px; vertical-align: center" id="search" onclick="simpan()">
                                                <label style="font-size: 12px">Save</label>
                                            </button>
                                            <button class="btn btn-info waves-effect waves-light" type="button" style="height: 35px; width: 100px; vertical-align: center" onclick="resetform()"> 
                                                <label style="font-size: 12px">Reset</label>
                                            </button>

                                            <input type="hidden" name="editkeyvalue" id="editkeyvalue" data-attr="input_data">   
                                            <input type="hidden" name="editkeyvalue2" id="editkeyvalue2" data-attr="input_data"> 
                                            <input type="hidden" name="editkeyvalue3" id="editkeyvalue3" data-attr="input_data">  
                                            
                                                <!--
                                                <button class="btn btn-danger waves-effect waves-light" type="button" style="height: 35px; width: 100px; vertical-align: center" onclick="backtotable()"> 
                                                    <label style="font-size: 12px">Back To Table</label>
                                                </button>
                                                -->

                                        </div>
                                        <!-- Untuk Button     -->


                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- ======================================================================================================== -->

                        <!-- datatable -->

                    <div class="row" id="divdatatable">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatablemaster" class="table table-striped table-bordered" style="font-size: 11px;width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Menu</th>
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