// JavaScript Document ../scripts/modulo/importar/lib/subirDoc.php

		function subirArchivos() {
//			alert($("#filDocSG").val()+' '+$("#txtCodDocSG").val()); return false;
			$("#filDocSG").upload('../scripts/modulo/importarDocumSG/lib/subirDoc.php',{
				tipDocumento:$("#selTipDocSG").val(),
				codDocumento:$("#txtCodDocSG").val(),
				nomDocumento:$("#txtNomDocSG").val(),
				txtVerDocSG:$("#txtVerDocSG").val(),
				txtFecDocSG:$("#txtFecDocSG").val()
				},function(respuesta) {
						if(respuesta==1){
							alert('El Archivo fue almacenado exitosamente');
							limpiarForm();
						}else {
						 if(respuesta==2){
								alert('Error: El documento ya existe ');
							}else{
								alert('Se presento un error al almacenar el archivo ');
							}
						}
					}
			);
		}

		function limpiarForm(){
			$("#archivos_subidos").html('');
			$('#frmImportarDocSg')[0].reset();
		}

		function mostrarArchivos() {
//			alert($("#selCodProyecto").val());
			$.ajax({
				url: '../scripts/modulo/importar/lib/mostrarDoc.php',
				type: 'POST',
				dataType: 'json',
//				dataType: 'html',
				data: {codProyecto:$("#selCodProyecto").val()},
				success:function(respuesta){
//					alert(respuesta.length);
					if(respuesta){
						var html='<table width="442" border="1" cellspacing="0">';
						html+='<tr><td align="center" colspan="3">Archivos</td></tr>';
						html+='<tr align="center"><td width="102">Tipo</td><td width="236">Descripción</td><td width="82">&nbsp;</td></tr>';
						for (var i = 0; i < respuesta.length; i++) {
							if (respuesta[i] != undefined) {
								var ultimo_valor=respuesta[i]['rut'].substring(respuesta[i]['rut'].lastIndexOf('.')+1,respuesta[i]['rut'].length);
								switch(ultimo_valor){
									case 'doc': case 'docx':
										img='<img src="./icono/word.png" width="20" height="20" />';
									break;
									case 'zip': case 'rar': 
										img='<img src="./icono/zip.jpg" width="20" height="20" />';
									break;
									case 'pdf': 
										img='<img src="./icono/pdf.jpg" width="20" height="20" />';
									break;
								}

								html+='<tr>';
									html+='<td class="subtexto">';
										html+=img;
										html+='<a href="documentos/'+respuesta[i]['rut']+'" target="_blank"> '+respuesta[i]['tip'];
										html+='</a>';
									html+='</td>';
								html+='<td class="subtexto">'+respuesta[i]['des']+'</td>';
								html+='<td align="center">';
								html+='<input type="button" id="btnEliminar" class="boton" value="Eliminar" ';
								html+='onClick="javascript:eliminarArchivos('+respuesta[i]['id']+')"/></td></tr>';
							}
						}
						html+='</table>';
						$("#archivos_subidos").html(html);
					}else{
						var html='';
						$("#archivos_subidos").html('');
					}
				},
				error:function(){
					$("#archivos_subidos").html('');
				}
			});
		}

		function eliminarArchivos(id) {
//			alert(id); return false;
			$.ajax({
				url: '../scripts/modulo/importar/lib/eliminarDoc.php',
				type: 'POST',
//				timeout: 10000,
				data: {id: id},
				error: function() {
					alert('Error al intentar eliminar el archivo.');
				},
				success: function(respuesta) {
					if (respuesta == 1) {
						alert('El archivo ha sido eliminado.');
					} else {
						alert('Error al intentar eliminar el archivo.');                            
					}
					mostrarArchivos();
				}
			});
		}

		function validar(extension){
			switch(extension.toLowerCase()){
				case 'pdf': case 'zip': case 'rar': case 'doc': case 'docx':
					return true;
				break;
				default:
					return false;
				break;
			}
		}

		$(document).ready(function() {

			$("#txtFecDocSG").datepicker({
				showWeek: true,
				dateFormat: 'yy-mm-dd',
				changeMonth: true, 
				changeYear: true
			});
			
			$("#filDocSG").change(function(){
				var file=$("#filDocSG")[0].files[0];
				var fileName=file.name;
				var fileSize=file.size;
				var fileType=file.type;
				fileExtension=fileName.substring(fileName.lastIndexOf('.') + 1);
//				alert(fileName+' '+fileExtension+' '+fileSize);
			});
			
			$("#enviar").click(function (){
//				alert('Sofia & Alexa'); return false;
				$(".error").remove();
				if($("#selTipDocSG").val()==""){
					$("#selTipDocSG").focus().after("<span class='error'>Debe Seleccionar el tipo de documento</span>");
					return false;
				}else if($("#txtCodDocSG").val()==""){
					$("#txtCodDocSG").focus().after("<span class='error'>Debe ingresar el codigo de documento</span>");
					return false;
				}else if($("#filDocSG").val()==""){
					$("#filDocSG").focus().after("<span class='error'>Debe seleccionar el archivo</span>");
					return false;                
				}else if(!validar(fileExtension)){
					$("#filDocSG").focus().after("<span class='error'>El tipo de archivo no es permitido</span>");
					return false;                
				}else if($("#txtNomDocSG").val()==""){
					$("#txtNomDocSG").focus().after("<span class='error'>Debe ingresar el nombre del documento</span>");
					return false;
				}else if($("#txtFecDocSG").val()==""){
					$("#txtFecDocSG").focus().after("<span class='error'>Debe ingresar la fecha</span>");
					return false;
				}else if($("#txtVerDocSG").val()==""){
					$("#txtVerDocSG").focus().after("<span class='error'>Debe ingresar la version del documento</span>");
					return false;
				}else{
					subirArchivos();
				}
			});	

			$("#limpiar").click(function(){
					$("#archivos_subidos").html('');
					$('#frmImportarDocSg')[0].reset();
//				$(location).attr('href','./index.php?seccion=INICIO');
			});
			
			$("#selCodProyecto").change(function () {
				if($("#selCodProyecto").val()!='') mostrarArchivos();
				else $("#archivos_subidos").html('');
			});

		});

