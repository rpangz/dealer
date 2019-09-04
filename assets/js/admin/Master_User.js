/*
$(document).ready(function () {
    $('#datatablemaster').dataTable({
		"bFilter": false,
	pageLength:5,
	});   

});
TableManageButtons.init();
*/

function resetform(){
	/*
	document.getElementById("datepicker1").value = "";
	document.getElementById("rekening").value = "";
	document.getElementById("jenistransaksi").value = "";
	document.getElementById("nominal").value = "";
	document.getElementById("keterangan").value = "";
	document.getElementById("noref").value = "-";
	*/
	$('input[data-attr=input_data').val('');
}

function formatangka(bilangan){
	var	number_string = bilangan.toString(),
		sisa 	= number_string.length % 3,
		rupiah 	= number_string.substr(0, sisa),
		ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
			
	if (ribuan) {
		separator = sisa ? ',' : '';
		rupiah += separator + ribuan.join(',');
	}
	return rupiah;
}

function unformatangka(bilangan){
	var nilai = bilangan.replace(/,/g, '');
	return nilai;
}

function simpan(){
	var NIK = $('#NIK').val();
	var nama = $('#nama').val();
	var department = $('#department').val();
	var jabatan = $('#jabatan').val();
	var status = $('#status').val();
		// nominal = nominal.replace(/,/g, ''); Untuk Nominal
    $.ajax({
      type: "POST",
      url: "Master_User/simpan",
      data : {"NIK" : NIK, "nama" : nama, "department" : department, "jabatan" : jabatan, "status" : status},
      success: function(data){
      	
      	/*=======================================================*/
      	var datasplit = data.split("|");
        var err_status = datasplit[0];
        var err_msg = datasplit[1];        
        if(err_status=="OK") {
        	var alertheader = "Success";
        	var alerttype   = "success";
        } else {
        	var alertheader = "Failed";
        	var alerttype   = "warning";
        }
        swal(alertheader, err_msg, alerttype);
	    /*==========================================================*/  
	      loaddatatable();
          resetform();
          
      },
      complete: function(){}
    });		
}

function loaddatatablex(Query){
	$.ajax({
      type: "POST",
      url: "Transaksi_bank/dataTable",      
      success: function(data){
        alert(data);
      },
      complete: function(){}
    });	
}

function loaddatatable(Query){

	$('#datatablemaster').dataTable( {
	    ajax: {
	        url: 'Master_User/dataTable',
	        data : function(d){
	        	d.Query = Query;
	        },
	        type : 'post'
	    },
	    dom: 'Bfrtip',
	    buttons: [
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-files-o" style="color:blue"></i>',
                titleAttr: 'Copy'
            },
            {
                extend:    'excelHtml5',
                text:      '<i class="fa fa-file-excel-o" style="color:green"></i>',
                titleAttr: 'Excel'
            },
            {
                extend:    'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o" style="color:red"></i>',
                titleAttr: 'PDF'
            },
            /* 
            {
	            text: 'Add New Data',
	            action: function ( e, dt, node, config ) {
		                document.getElementById("divdatatable").style.display = "none"; 
		                document.getElementById("divinput").style.display = "";

	            }
        	},
        	*/
        ],
	    pageLength:10,
	    "bDestroy": true,
	    columns: [  
		    { data: 'nik' },
		    { data: 'nama'},
		    { data: 'dept_name' },
		    { data: 'jabatan_name' },
		    { data: 'statusname'},
		    { data: 'statusname',
                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                        $(nTd).html("<a href='#' onclick='deletedata("+oData.nik+")'><i class=\"glyphicon glyphicon-pencil\" style=\"color:red\"></i></a>&nbsp;<a href='#' onclick='deletedata("+oData.nik+")'><i class=\"glyphicon glyphicon-trash \" style=\"color:red\"></i></a>");
                    }
			}
	    ]


	    
	} );

}



function loaddatatablexx(Query){

	$('#datatablemaster').DataTable( {
	    
	    dom: 'Bfrtip',
	    buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
	    
        


	    
	} );
}