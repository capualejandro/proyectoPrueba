// JavaScript Document

		$(document).ready(function() {

			$("#txtFecUtilidad").datepicker({
				showWeek: true,
				dateFormat: 'yy-mm-dd',
				changeMonth: true, 
				changeYear: true
			});

			$("#txtValTotUtilidad").numeric();

			$("#enviar").click(function (){
				$(".error").remove();
				if($("#selCodProyecto").val()==""){
					$("#selCodProyecto").focus().after("<span class='error'>Debe Seleccionar el Número del Proyecto</span>");
					return false;
				}else if( $("#txtNumFactUtilidad").val() == "" ){
					$("#txtNumFactUtilidad").focus().after("<span class='error'>Ingrese el número de la factura</span>");
					return false;
				}else if( $("#txtConcepUtilidad").val() == "" ){
					$("#txtConcepUtilidad").focus().after("<span class='error'>Ingrese el concepto</span>");
					return false;				
				}else if( $("#txtFecUtilidad").val() == "" ){
					$("#txtFecUtilidad").focus().after("<span class='error'>Ingrese la fecha pago utilidad</span>");
					return false;
				}else if( $("#txtValTotUtilidad").val() == "" ){
					$("#txtValTotUtilidad").focus().after("<span class='error'>Ingrese el valor total de la utilidad</span>");
					return false;
				}else{
//				alert(" OK "+$("#txtPorProy").val()+" "+$("#txtValProy").val());
					$('#txtBandera').attr({'value':'1'});
					$('#frmCrearUtilidades').attr('action','./index.php?seccion=UTILIDAD');
					$('#frmCrearUtilidades').submit();
				}
			});	

			$("#limpiar").click(function(){
				$("#selCodProyecto").attr({'value':''});
				$("#txtNumFactUtilidad").attr({'value':''});
				$("#txtConcepUtilidad").attr({'value':''});			
				$("#txtFecUtilidad").attr({'value':''});
				$("#txtValTotUtilidad").attr({'value':''});
//				$(location).attr('href','./index.php?seccion=INICIO');
			});


			$("#selCodProyecto").change(function () {
//				alert(" OK "+$("#selCodProyecto").val()+" "+$("#selCodProyecto").val());
				$("#selCodProyecto option:selected").each(function () {
					codProyecto = $(this).val();
					$.post("../scripts/modulo/ajax/verificar.php",{
						codProyecto:codProyecto,
						opc:"consoc" 
					},
					function(data){
						$("#selCodSocio").html(data);
					});            
				});
			})
				

		});
