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
    
		function reporGeneral(codproyecto){
			location.href='./index.php?seccion=REPOGENRA&codProyecto='+codproyecto;
		}
    
		function reporGastos(codproyecto){
			location.href='./index.php?seccion=REPOGASTO&codProyecto='+codproyecto;
		}
    
		function reporFactur(codproyecto){
			location.href='./index.php?seccion=REPOFACTU&codProyecto='+codproyecto;
		}
		
		function consultar(){
			var valor='';
			var parametros = {
				codProyecto:$("#txtNumProyecto").val(),
				nomProyecto:$("#txtNomProyecto").val(),
				nomCliente:$("#txtCliente").val(),
				selMoneda:$("#selMoneda").val(),
				selEstado:$("#selEstado").val(),
				opc:"contra" 
			};
			$.ajax({
				async: true,
				data: parametros,
				type: "POST",
				url: "../scripts/modulo/ajax/verificar.php",
				dataType: "json",
				success:function (datos) {
					if(datos.length != ''){
						$.each(datos, function(index,value){
							if ((value.contador % 2) == 1) bgcolor="#A6BBC9";
							else bgcolor="#FFFFFF";
							btnGenral='<input type="button" id="btnGen" class="boton" onClick="javascript:reporGeneral(\''+value.proCodigo+'\')" value="General"/>';
							btnGasto='<input type="button" id="btnGas" class="boton" onClick="javascript:reporGastos(\''+value.proCodigo+'\')" value="Gastos"/>';
							btnFactu='<input type="button" id="btnFac" class="boton" onClick="javascript:reporFactur(\''+value.proCodigo+'\')" value="Facturación"/>';
							valor+='<tr class="textopequeno" bgcolor="'+bgcolor+'">';
								valor+='<td>'+value.contador+'</td>';
								valor+='<td><a href="javascript:reporGeneral(\''+value.proCodigo+'\')" class="enlacePasos">'+value.proCodigo+'</a></td>';
/*
								valor+='<td>'+value.proNombre+'</td>';
								valor+='<td>'+value.cliNombre+'</td>';
*/
								valor+='<td>'+value.proFecIni+'</td>';
								valor+='<td>'+value.proFecFin+'</td>';
								valor+='<td>'+value.proFecFinPror+'</td>';
								valor+='<td>'+value.estado+'</td>';
								valor+='<td align="right">'+value.porcentaj+' %</td>';
								valor+='<td align="right">'+value.proValCon+'</td>';
								valor+='<td align="right">'+value.valAdione+'</td>';
								valor+='<td align="right">'+value.valAdione1+'</td>';
								valor+='<td align="right">'+value.valFactur+'</td>';
								valor+='<td align="right">'+value.valAntici+'</td>';
								valor+='<td align="right">'+value.valDifere+'</td>';
/*
								valor+='<td align="center">';
									valor+='<table border="0">';
										valor+='<tr><td>'+btnGenral+'</td></tr>';
										valor+='<tr><td>'+btnGasto+'</td></tr>';
										valor+='<tr><td>'+btnFactu+'</td></tr>';
									valor+='</table>';
								valor+='</td>';
*/
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
		
		};
