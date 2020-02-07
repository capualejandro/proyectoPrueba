// JavaScript Document

	$(document).ready(function() {

		$("#btnFiltrar").click(function(){
			if($("#selMoneda").val()=='euro'){
				$('#pesos').hide();
				$('#euro').show();
			}else if($("#selMoneda").val()==''){
				$('#pesos').show();
				$('#euro').hide();
			}
		});
		
	});
	
