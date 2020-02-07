// JavaScript Document

		$(document).ready(function() {

			$("#txtValAdic").numeric();
			$("#txtIvaAdic").numeric(".");

			$("#txtFecIniAdic").datepicker({
//				showWeek: true,
				dateFormat: 'yy-mm-dd',
				changeMonth: true, 
				changeYear: true
			});

			$("#selCodProyecto").change(function(){
				var parametros = {
					"opc" : "conpro",
					"codProyecto" : $("#selCodProyecto").val()
				};
				$.ajax({
//					async: true,
					type: "POST",
					dataType: "text",
					url: "../scripts/modulo/ajax/verificar.php",
					data: parametros,
					dataType: "html",
					success: function(response) {
//						alert(response);
						$("#txtProFechFin").attr({'value':response});
     },
					error: function(response){
						alert('Error Sofia');
					}
				});
			});
			
			$("#enviar").click(function (){
				$(".error").remove();
				if($("#selCodProyecto").val()==""){
					$("#selCodProyecto").focus().after("<span class='error'>Debe Seleccionar el Numero del Proyecto</span>");
					return false;
				}else if( $("#txtNumPror").val() == "" ){
					$("#txtNumPror").focus().after("<span class='error'>Debe Ingresar el Numero de la adición</span>");
					return false;
				}else if( $("#txtNomPror").val() == "" ){
					$("#txtNomPror").focus().after("<span class='error'>Ingrese el nombre de la adición</span>");
					return false;
				}else if( $("#txtFecIniAdic").val() == "" ){
					$("#txtFecIniAdic").focus().after("<span class='error'>Ingrese la fecha de la adicion</span>");
					return false;
				}else if( $("#txtValAdic").val() == "" ){
					$("#txtValAdic").focus().after("<span class='error'>Ingrese el valor de la adición</span>");
					return false;
				}else if( $("#txtIvaAdic").val() == "" ){
					$("#txtIvaAdic").focus().after("<span class='error'>Ingrese el porcentaje del IVA</span>");
					return false;
				}else{
//					alert(" OK "+$("#txtPorProy").val()+" "+$("#txtValProy").val());
					$('#txtBandera').attr({'value':'1'});
					$('#frmCrearAdicion').attr('action','./index.php?seccion=ADICREA');
					$('#frmCrearAdicion').submit();
				}
			});	

			$("#limpiar").click(function(){
					$('#frmCrearAdicion')[0].reset();
			});

		});

		function validate_fechaMayorQue(fechaInicial,fechaFinal){
			if((Date.parse(fechaInicial)) >= (Date.parse(fechaFinal))){
				return 0;
			}
			return 1;
		}
