// JavaScript Document

		function ver(i){
			alert(i);
		}

		$(document).ready(function() {

			consultar();
			$("#btnFiltrar").click(function(){
				consultar();
			});
			
			$("#btnLimpiar").click(function(){
				$('#frmListadoProyectos')[0].reset();
				consultar();
			});

		});
		
		function consultar(){
			var valor='';
//			alert($("#selConsolidado").val());
/*
			alert($("#selConsolidado").val());
			var parametros = {
				codProyecto:$("#txtNumProyecto").val(),
				mes:$("#selMes").val(),
				ano:$("#selAno").val(),
				selMoneda:$("#selMoneda").val(),
				opc:"respag2" 
			};
/**/
/**/
			if($("#selConsolidado").val()=='NO') {
			 $('#info1').css("display", "block");
			 $('#info2').css("display", "none");
				var parametros = {
					codProyecto:$("#txtNumProyecto").val(),
					mes:$("#selMes").val(),
					ano:$("#selAno").val(),
					selMoneda:$("#selMoneda").val(),
					opc:"respag" 
				};
				$.ajax({
					async: true,
					data: parametros,
					type: "POST",
					url: "../scripts/modulo/ajax/verificar.php",
					dataType: "json",
//					dataType: "html",
					success:function (datos) {
						if(datos.length != ''){
							$.each(datos, function(index,value){
								if ((value.contador % 2) == 1) bgcolor="#A6BBC9";
								else bgcolor="#FFFFFF";
								valor+='<tr class="textopequeno">';
									valor+='<td align="center">'+value.proCodigo+'</td>';
									valor+='<td>'+value.proNombre+'</td>';
									valor+='<td align="center">'+value.mesPagFac+'</td>';
									valor+='<td align="center">'+value.anoPagFac+'</td>';
									valor+='<td align="right">'+value.valPagFac+'</td>';
	
								valor+='</tr>';
							});
						}else{
							valor='<tr bgcolor="#F2F2F2" align="center"><td colspan="12"><h3>No se encontraron registros...</h3></td></tr>';
						}
						$("#datos tbody").html(valor);
					},
					error: function(datos){
						valor = '<tr><td colspan="4" align="center">No se encontraron registros...</td></tr>';
					}
				});
			}

			if($("#selConsolidado").val()=='SI') {
				$('#info1').css("display", "none");
				$('#info2').css("display", "block");
				var parametros = {
					codProyecto:$("#txtNumProyecto").val(),
					mes:$("#selMes").val(),
					ano:$("#selAno").val(),
					selMoneda:$("#selMoneda").val(),
					opc:"respag2" 
				};
				$.ajax({
					async: true,
					data: parametros,
					type: "POST",
					url: "../scripts/modulo/ajax/verificar.php",
					dataType: "json",
//					dataType: "html",
					success:function (datos) {
						if(datos.length != ''){
							$.each(datos, function(index,value){
								if ((value.contador % 2) == 1) bgcolor="#A6BBC9";
								else bgcolor="#FFFFFF";
								valor+='<tr class="textopequeno">';
									valor+='<td align="center">'+value.proCodigo+'</td>';
									valor+='<td>'+value.proNombre+'</td>';
									valor+='<td align="right">'+value.valPagFac+'</td>';
	
								valor+='</tr>';
							});
						}else{
							valor='<tr bgcolor="#F2F2F2" align="center"><td colspan="12"><h3>No se encontraron registros...</h3></td></tr>';
						}
						$("#datos2 tbody").html(valor);
					},
					error: function(datos){
						valor = '<tr><td colspan="4" align="center">No se encontraron registros...</td></tr>';
					}
				});
			}
/**/
		
		};
