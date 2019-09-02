var path = window.location.pathname;
var page = path.split("/").pop();
page = page.toLowerCase();
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
	document.getElementById("jenismakanan").value = "";
	document.getElementById("supplier").value = "";
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
	var tglmasuk = $('#datepicker1').val();
	var rekening = $('#rekening').val();
	var jenistransaksi = $('#jenistransaksi').val();
	var nominal = $('#nominal').val();
		nominal = nominal.replace(/,/g, '');
	var keterangan = $('#keterangan').val();
	var noref = $('#noref').val();
	var jenismakanan = $('#jenismakanan').val();
	var supplier = $('#supplier').val();
    $.ajax({
      type: "POST",
      url: page + "/simpan",
      data : {"tglmasuk" : tglmasuk, "rekening" : rekening, "jenistransaksi" : jenistransaksi, "nominal" : nominal, "keterangan" : keterangan, "noref" : noref, "jenismakanan" : jenismakanan, "supplier" : supplier},
      success: function(data){
        alert(data);
        loaddatatable();
        setTimeout(function(){loadsaldobankcoh(),1000});
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
	        url: 'Petty_Cash/dataTable',
	        data : function(d){
	        	d.Query = Query;
	        },
	        type : 'post'
	    },
	    pageLength:5,
	    "bDestroy": true,
	    columns: [  
	    { data: 'noref' },
	    { data: 'tgltrx'},
	    { data: 'rekening' },
	    { data: 'jenistrx' },
	    { data: 'nominal'},
	    { data: 'keterangan'}
	    ]
	} );
}