<footer class="footer text-right">
      <?php echo $this->config->item('foo'); ?> 
</footer>

<script>
        var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>

        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/plugins/peity/jquery.peity.min.js"></script>

        <!-- jQuery  -->
        <script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>
        <script src="assets/plugins/morris/morris.min.js"></script>
        <script src="assets/plugins/raphael/raphael-min.js"></script>
        <script src="assets/plugins/jquery-knob/jquery.knob.js"></script>
        <script src="assets/plugins/jquery-datatables-editable/jquery.dataTables.js"></script>
        <script src="assets/plugins/jquery-datatables-editable/dataTables.bootstrap.js"></script>

        <!--
        <script src="assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
        <script src="assets/plugins/bootstrap-sweetalert/sweet-alert.js"></script>
        -->
        <script src="assets/plugins/bootstrap-sweetalert2/sweetalert2.all.min.js"></script>

        <script src="assets/pages/jquery.sweet-alert.init.js"></script>

        <script src="assets/plugins/moment/moment.js"></script>
        <script src="assets/plugins/timepicker/bootstrap-timepicker.js"></script>
        <script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="assets/plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
        <script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="assets/pages/jquery.form-pickers.init.js"></script>

        <script src="assets/pages/datatables.init.js"></script>


        <!-- Penambahan untuk kebutuhan datatable -->
        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/plugins/datatables/jszip.min.js"></script>
        <script src="assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
        <!-- ===================================================================== -->

        <script src="assets/plugins/bootstrap-select/js/bootstrap-select.js"></script>


        <script src="assets/pages/jquery.dashboard.js"></script>

        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>


        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

                $(".knob").knob();

            });

            $('#datepicker1').datepicker({
                format : "dd-mm-yyyy",
                autoclose : true
            });

            $('#datepicker2').datepicker({
                format : "dd-mm-yyyy",
                autoclose : true
            });

            function loadsaldobankcoh(){
                $.ajax({
                  type: "POST",
                  url: "Main/GetSaldoBankCoh",      
                  success: function(data){
                       var datasplit = data.split("|");
                       var saldobank = datasplit[0];
                       var saldocoh = datasplit[1];
                       document.getElementById('divsaldobank').innerHTML = saldobank;
                       document.getElementById('divsaldocoh').innerHTML = saldocoh;                       
                  },
                  complete: function(){}
                }); 
            }

            function backtotable(){                
                document.getElementById("divdatatable").style.display = ""; 
                document.getElementById("divinput").style.display = "none"; 
                //loaddatatable();
            }


        </script>
        
