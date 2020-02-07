// JavaScript Document

$(document).ready(function() {
	$("#btnConsultar").click(function (){
//		$("#div1").css("display", "block");
		$('#txtBandera').attr({'value':'1'});
		$('#frmDocumenSG').attr('action','./index.php?seccion=CONSDOCSG');
		$('#frmDocumenSG').submit();
	});
});
