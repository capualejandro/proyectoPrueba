// JavaScript Document

		function ver(i){
			alert(i);
		}

		$(document).ready(function() {

//			ver('Sofia');
			$("#btnConsultar").click(function(){
				$(".error").remove();
				if($("#selTipDoc").val()==""){
					$("#selTipDoc").focus().after("<span id='error' class='error normal'>Debe seleccionar el titpo de documento</span>");
					return false;
				}else{
					tipDoc=$("#selTipDoc").val();
					codProyecto=$("#hidCodProyecto").val();
//					alert(tipDoc+' '+codProyecto);
					location.href='./index.php?seccion=DOCUMEN&codProyecto='+codProyecto+'&tipDoc='+tipDoc;
				}
			});
			
			$("#btnLimpiar").click(function(){
				$('#frmListadoDocumentos')[0].reset();
				consultar();
			});

		});
    
/*
		function reporContra(codproyecto){
			location.href='./index.php?seccion=CONTRATO&codProyecto='+codproyecto;
		}
    
		function reporProrro(codproyecto){
			location.href='./index.php?seccion=PRORROGAS&codProyecto='+codproyecto;
		}
    
		function reporAdicio(codproyecto){
			location.href='./index.php?seccion=ADICION&codProyecto='+codproyecto;
		}
    
		function reporCertif(codproyecto){
			location.href='./index.php?seccion=CERTIFICAD&codProyecto='+codproyecto;
		}
    
		function reporPoliza(codproyecto){
			location.href='./index.php?seccion=POLIZA&codProyecto='+codproyecto;
		}
		
		function consultar(){
			var valor='';
			var parametros = {
				codProyecto:$("#txtNumProyecto").val(),
				nomProyecto:$("#txtNomProyecto").val(),
				nomCliente:$("#txtCliente").val(),
				selMoneda:$("#selMoneda").val(),
				selEstado:$("#selEstado").val(),
				opc:"docume" 
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
							if ((value.contador % 2) == 1) bgcolor="#F2F2F2";
							else bgcolor="#D2D5DD";
							btnContr='<input type="button" id="btnGen" class="boton" onClick="javascript:reporContra(\''+value.proCodigo+'\')" value="Contrato"/>';
							btnProrr='<input type="button" id="btnGas" class="boton" onClick="javascript:reporProrro(\''+value.proCodigo+'\')" value="Prorroga"/>';
							btnPoliz='<input type="button" id="btnFac" class="boton" onClick="javascript:reporPoliza(\''+value.proCodigo+'\')" value="Poliza"/>';
							btnAdici='<input type="button" id="btnFac" class="boton" onClick="javascript:reporAdicio(\''+value.proCodigo+'\')" value="Adición"/>';
							btnCerti='<input type="button" id="btnFac" class="boton" onClick="javascript:reporCertif(\''+value.proCodigo+'\')" value="Certificado"/>';
							valor+='<tr class="textopequeno" bgcolor="'+bgcolor+'">';
								valor+='<td>'+value.contador+'</td>';
								valor+='<td>'+value.proCodigo+'</td>';
								valor+='<td>'+value.proNombre+'</td>';
								valor+='<td>'+value.proFecIni+'</td>';
								valor+='<td align="center">';
									valor+='<table border="0">';
										valor+='<tr><td>'+btnContr+'</td></tr>';
										valor+='<tr><td>'+btnProrr+'</td></tr>';
										valor+='<tr><td>'+btnPoliz+'</td></tr>';
										valor+='<tr><td>'+btnAdici+'</td></tr>';
										valor+='<tr><td>'+btnCerti+'</td></tr>';
									valor+='</table>';
								valor+='</td>';
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
*/