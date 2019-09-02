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
	document.getElementById("datepicker1").value = "";
	document.getElementById("rekening").value = "";
	document.getElementById("jenistransaksi").value = "";
	document.getElementById("nominal").value = "";
	document.getElementById("keterangan").value = "";
	document.getElementById("noref").value = "-";
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

/*
function loaddata(){
	var tgl1 = $('#datepicker1').val();
	var tgl2 = $('#datepicker2').val();
	var rekening = $('#rekening').val();
	var jenistransaksi = $('#jenistransaksi').val();
	var nominal = $('#nominal').val();
		nominal = nominal.replace(/,/g, '');
	var keterangan = $('#keterangan').val();
	var noref = $('#noref').val();
    $.ajax({
      type: "POST",
      url: "Laporan_pemasukan_bank/loaddata",
      data : {"tglmasuk" : tglmasuk, "rekening" : rekening, "jenistransaksi" : jenistransaksi, "nominal" : nominal, "keterangan" : keterangan, "noref" : noref},
      success: function(data){
      	
      	//var datasplit = data.split("|");
        //var err_status = datasplit[0];
        //var err_msg = datasplit[1];
        
	      alert(data);
	      loaddatatable();
          resetform();
          setTimeout(function(){loadsaldobankcoh(),1000});	
      },
      complete: function(){}
    });		
}
*/

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
	        url: 'Transaksi_bank/dataTable',
	        data : function(d){
	        	d.Query = Query;
	        },
	        type : 'post'
	    },
	    pageLength:5,
	    "bDestroy": true,
	    columns: [  
	    { data: 'noref' },
	    { data: 'tglmasuk'},
	    { data: 'rekening' },
	    { data: 'jenistrx' },
	    { data: 'nominal'},
	    { data: 'keterangan'}
	    ]
	} );
}