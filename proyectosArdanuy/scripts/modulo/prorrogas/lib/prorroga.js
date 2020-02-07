// JavaScript Document

		$(document).ready(function() {

			$("#txtValPror").numeric();
			$("#txtIvaPror").numeric(".");

			$("#txtFecIniPror").datepicker({
//				showWeek: true,
				dateFormat: 'yy-mm-dd',
				changeMonth: true, 
				changeYear: true
			});
			
			$("#txtFecFinPror").datepicker({
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
						$("#txtNumPror").focus().after("<span class='error'>Debe Ingresar el Numero de la Prorroga</span>");
						return false;
				}else if( $("#txtNomPror").val() == "" ){
						$("#txtNomPror").focus().after("<span class='error'>Ingrese el nombre de la prorroga</span>");
						return false;
				}else if( $("#txtFecIniPror").val() == "" ){
						$("#txtFecIniPror").focus().after("<span class='error'>Ingrese la fecha de inicio de la prorroga</span>");
						return false;
				}else if(validate_fechaMayorQue($("#txtProFechFin").val(),$("#txtFecIniPror").val())==0){
						$("#txtFecIniPror").focus().after("<span class='error'>La fecha de inicio de la prorroga debe ser mayor a la fecha de fin de contrato</span>");
						return false;
				}else if( $("#txtFecFinPror").val() == "" ){
						$("#txtFecFinPror").focus().after("<span class='error'>Ingrese la fecha de finalización de la prorroga</span>");
						return false;
				}else if(validate_fechaMayorQue($("#txtFecIniPror").val(),$("#txtFecFinPror").val())==0){
						$("#txtFecFinPror").focus().after("<span class='error'>La fecha de fin de la prorroga debe ser mayor a la fecha de inicio de la prorroga</span>");
						return false;
				}else if( $("#txtValPror").val() == "" ){
						$("#txtValPror").focus().after("<span class='error'>Ingrese el valor de la prorroga</span>");
						return false;
				}else if( $("#txtIvaPror").val() == "" ){
						$("#txtIvaPror").focus().after("<span class='error'>Ingrese el porcentaje del IVA</span>");
						return false;
				}else{
//					alert(" OK "+$("#txtPorProy").val()+" "+$("#txtValProy").val());
					$('#txtBandera').attr({'value':'1'});
					$('#frmCrearProrroga').attr('action','./index.php?seccion=PRORROGA');
					$('#frmCrearProrroga').submit();
				}
			});	

			$("#limpiar").click(function(){
				$("#txtNumPror").attr({'value':''});
				$("#txtNomPror").attr({'value':''});
				$("#txtFecIniPror").attr({'value':''});
				$("#txtFecFinPror").attr({'value':''});
				$("#txtValPror").attr({'value':''});
				$("#selCodProyecto").attr({'value':''});
				$("#txtDescripPror").attr({'value':''});
//				$(location).attr('href','./index.php?seccion=INICIO');
			});

		});

		function validate_fechaMayorQue(fechaInicial,fechaFinal){
			if((Date.parse(fechaInicial)) >= (Date.parse(fechaFinal))){
				return 0;
			}
			return 1;
		}
    
