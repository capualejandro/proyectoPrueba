// JavaScript Document 
		$(document).ready(function() {

			$("#txtValFact").numeric();
			$("#txtValCuent").numeric();
			$("#txtIvaCuent").numeric();
			$("#txtRetCuent").numeric();
			$("#txtReteicaCuent").numeric();

			$("#selCodProyecto").change(function () {
				$("#selCodProyecto option:selected").each(function () {
					codProyecto = $(this).val();
					$.post("../scripts/modulo/ajax/verificar.php",{
						codProyecto:codProyecto,
						opc:"conproyecto" 
					},
					function(data){
						$("#selContrTipoIdent").html(data);
					});            
				});
			})

			$("#txtFecEmiCuent").datepicker({
				showWeek: true,
				dateFormat: 'yy-mm-dd',
				changeMonth: true, 
				changeYear: true
			});

			$("#txtValCuent").change(function (){
				cacular();
			})

			$("#txtIvaCuent").change(function (){
				cacular();
			})

			$("#txtRetCuent").change(function (){
				cacular();
			})

			$("#txtReteicaCuent").change(function (){
				cacular();
			})
			
			function cacular(){
//				alert('Sofia');
				valCuenta=eval($("#txtValCuent").val());
				valIvaCuent=eval($("#txtIvaCuent").val());
				valRetCuent=eval($("#txtRetCuent").val());
				valReteicaCuent=eval($("#txtReteicaCuent").val());

				val1=(valCuenta * (eval(valIvaCuent)/100) + eval(valCuenta));	
				val2=valCuenta * (eval(valRetCuent)/100);	
				val3=valCuenta * (eval(valReteicaCuent)/100);
				valReteFuente=eval(val2) + eval(val3);
				valorCuenta=eval(val1) - eval(valReteFuente);
				$("#txtTotalValCuent").attr({'value':valorCuenta});
			}

			$("#txtFecPagCuent").datepicker({
				showWeek: true,
				dateFormat: 'yy-mm-dd',
				changeMonth: true, 
				changeYear: true
			});			
			
			$("#selCodProyecto").change(function () {
				$("#selCodProyecto option:selected").each(function () {
					codProyecto = $(this).val();
					$.post("../scripts/modulo/ajax/verificar.php",{
						codProyecto:codProyecto,
						opc:"confac" 
					},
					function(data){
						$("#selNumFact").html(data);
					});            
				});
			})

			$("#enviar").click(function (){
				$(".error").remove();
				if($("#selCodProyecto").val()==""){
					$("#selCodProyecto").focus().after("<span class='error'>Debe Seleccionar el Número del Proyecto</span>");
					return false;
				}else if( $("#txtNumCuent").val() == "" ){
					$("#txtNumCuent").focus().after("<span class='error'>Ingrese el número de la cuenta y/o factura</span>");
					return false;
				}else if( $("#selContrTipoIdent").val() == "" ){
					$("#selContrTipoIdent").focus().after("<span class='error'>Debe seleccionar el Contratista</span>");
					return false;	
//				}else if( $("#txtContrIdentif").val() == "" ){
//					$("#txtContrIdentif").focus().after("<span class='error'>Ingrese el Número de Identificación</span>");
//					return false;								
				}else if( $("#txtFecEmiCuent").val() == "" ){
					$("#txtFecEmiCuent").focus().after("<span class='error'>Ingrese la fecha de emision de la cuenta y/o factura</span>");
					return false;				
				}else if( $("#txtValCuent").val() == "" ){
					$("#txtValCuent").focus().after("<span class='error'>Ingrese el valor de la cuenta</span>");
					return false;
				}else if( $("#txtFecPagCuent").val() == "" ){
					$("#txtFecPagCuent").focus().after("<span class='error'>Ingrese la fecha de pago de la cuenta</span>");
					return false;									
				}else if( $("#txtIvaCuent").val() == "" ){
					$("#txtIvaCuent").focus().after("<span class='error'>Ingrese el iva aplicar para la cuenta</span>");
					return false;
				}else if( $("#txtRetCuent").val() == "" ){
					$("#txtRetCuent").focus().after("<span class='error'>Ingrese la retención aplicar para la cuenta</span>");
					return false;
				}else if( $("#txtReteicaCuent").val() == "" ){
					$("#txtReteicaCuent").focus().after("<span class='error'>Ingrese el reteica aplicar para la cuenta</span>");
					return false;					
				}else{
					$('#txtBandera').attr({'value':'1'});
					$('#frmCrearCuenta').attr('action','./index.php?seccion=CREARCUEN');
					$('#frmCrearCuenta').submit();
				}
			});	

			$("#limpiar").click(function(){
				$("#selCodProyecto").attr({'value':''});
				$("#txtNumCuent").attr({'value':''});
				$("#selContrTipoIdent").attr({'value':''});
//				$("#txtContrIdentif").attr({'value':''});
				$("#txtFecEmiCuent").attr({'value':''});
				$("#txtValCuent").attr({'value':''});
				$("#txtFecPagCuent").attr({'value':''});
				$("#txtIvaCuent").attr({'value':''});
				$("#txtRetCuent").attr({'value':''});
				$("#txtReteicaCuent").attr({'value':''});
				$("#txtTotalValCuent").attr({'value':''});
			});

		});
