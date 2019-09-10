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
	$('select[data-attr=input_data').val('');


	$('#spantypeform').removeClass('label-warning').addClass('label-success');
    $('#spantypeform').html('TYPE FORM : ADD DATA');
    $('#typeform').val('ADD');
    $('#headername').attr('disabled', false);
 
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
	var headername = $('#headername').val();
	var glyphicon = $('#glyphicon').val();
	var ordinal = $('#ordinal').val();
	var status = $('#status').val();
	var typeform = $('#typeform').val();
	var editkeyvalue = $('#editkeyvalue').val();
		// nominal = nominal.replace(/,/g, ''); Untuk Nominal
    $.ajax({
      type: "POST",
      url: "Master_Header_Form/simpan",
      data : {"headername" : headername, 
      		  "glyphicon" : glyphicon, 
      		  "ordinal" : ordinal, 
      		  "status" : status, 
      		  "typeform" : typeform,
      		  "editkeyvalue" : editkeyvalue
      		},
      success: function(data){
      	
      	/*=======================================================*/
      	var datasplit = data.split("|");
        var err_status = datasplit[0];
        var err_msg = datasplit[1];        
        if(err_status=="OK") {
        	var alertheader = "Success";
        	var alerttype   = "success"
        	loaddatatable();
        	resetform();
        	//swal(alertheader, err_msg, alerttype);
        } else {
        	var alertheader = "Failed";
        	var alerttype   = "warning";
        	//swal(alertheader, err_msg, alerttype);
        }
        
        Swal.fire({
		  title: alertheader,
		  text: err_msg,
		  type: alerttype,
		})

	    /*==========================================================*/  
	      
          
          
      },      
    });		
}


function editloaddata(key_data){

	$('#spantypeform').removeClass('label-success').addClass('label-warning');
    $('#spantypeform').html('TYPE FORM : EDIT DATA');
    $('#typeform').val('EDIT');
    $('#headername').attr('disabled', true);

    $.ajax({
      type: "POST",
      url: "Master_Header_Form/editloaddata",
      data : {"key_data" : key_data},
      success: function(data){
      		data = JSON.parse(data);
      		for(var i = 0; i < data.length; i++) {

      			$('#editkeyvalue').val(data[i].id_form);
      			$('#headername').val(data[i].headername);
      			$('#glyphicon').val(data[i].glyph);
      			$('#ordinal').val(data[i].ordinal);
      			$('#status').val(data[i].formstatus);
			    
			}
          
      },      
    });		
}


function loaddatatable(Query){

	var edittooltip = "Edit Form Header";
	var deletetooltip = "Delete Form Header";

	$('#datatablemaster').dataTable( {
	    ajax: {
	        url: 'Master_Header_Form/dataTable',
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
		    { data: 'headername' },
		    { data: 'glyph'},
		    { data: 'ordinal' },
		    { data: 'statusname'},
		    { data: 'statusname',
                    "fnCreatedCell": function (nTd, sData, oData, iRow, iCol) {
                        $(nTd).html("<a href='#' onclick='editloaddata("+oData.id_form+")'><i class=\"glyphicon glyphicon-pencil\" style=\"color:red\" title=\""+edittooltip+"\"></i></a>&nbsp;&nbsp;<a href='#' onclick='deletedata("+oData.id_form+")'><i class=\"glyphicon glyphicon-trash \" style=\"color:red\" title=\""+edittooltip+"\"></i></a>");
                    }
			}
	    ]


	    
	} );

}



function deletedata(key_data){
	Swal.fire({
	  title: 'Apakah Anda Yakin?',
	  text: "Data yang terhapus tidak dapat di kembalikan!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Hapus'
	}).then((result) => {
	  if (result.value) {	
		    $.ajax({
		      type: "POST",
		      url: "Master_Header_Form/hapus",
		      data : {"key_data" : key_data},
		      success: function(data){
		 		if(data=="OK") {
		        	var alertheader = "Success";
		        	var alerttype   = "success";
		        	var err_msg = "Data berhasil di hapus!";
		        	//swal(alertheader, err_msg, alerttype);
		        } else {
		        	var alertheader = "Failed";
		        	var alerttype   = "warning";
		        	var err_msg = "Data gagal di hapus!";
		        	//swal(alertheader, err_msg, alerttype);
		        }
		        Swal.fire(alertheader,err_msg,alerttype);
			    loaddatatable();		          
		      }, 
		     error: function(status) {
		         Swal.fire("Error!","Terdapat eror pada aplikasi","error");
		     }     
		    });		
	  }
	})
}

