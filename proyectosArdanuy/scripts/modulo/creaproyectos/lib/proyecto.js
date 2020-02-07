// JavaScript Document
		$(document).ready(function() {

			$("#txtValProy").numeric();
			$("#txtPorProy").numeric(".");
			$("#txtPorAntic").numeric(".");
			$("#txtPorIva").numeric(".");

			$("#txtFecIniProy").datepicker({
//				showWeek: true,
				dateFormat: 'yy-mm-dd',
				changeMonth: true, 
				changeYear: true
			});
			
			$("#txtFecFinProy").datepicker({
//				showWeek: true,
				dateFormat: 'yy-mm-dd',
				changeMonth: true, 
				changeYear: true
			});

			$("#enviar").click(function (){
				$(".error").remove();
				if($("#txtCodProy").val()=="" ){
						$("#txtCodProy").focus().after("<span class='error'>Debe Ingresar el Codigo del Proyecto</span>");
						return false;
				}else if($("#txtNomProy").val()==""){
						$("#txtNomProy").focus().after("<span class='error'>Ingrese el nombre del proyecto</span>");
						return false;
				}else if($("#txtFecIniProy").val()=="" ){
						$("#txtFecIniProy").focus().after("<span class='error'>Ingrese la fecha de inicio del proyecto</span>");
						return false;
				}else if($("#txtFecFinProy").val()==""){
						$("#txtFecFinProy").focus().after("<span class='error'>Ingrese la fecha de finalización del proyecto</span>");
						return false;
				}else if(validate_fechaMayorQue($("#txtFecIniProy").val(),$("#txtFecFinProy").val())==0){
						$("#txtFecFinProy").focus().after("<span class='error'>La fecha de finalización debe ser mayor a la fecha de inicio</span>");
						return false;
				}else if($("#txtCliProy").val()==""){
						$("#txtCliProy").focus().after("<span class='error'>Ingrese el nombre del cliente</span>");
						return false;
				}else if($("#txtDirProy").val()==""){
						$("#txtDirProy").focus().after("<span class='error'>Ingrese el nombre del directro del proyecto</span>");
						return false;
				}else if($("#txtValProy").val()==""){
						$("#txtValProy").focus().after("<span class='error'>Ingrese el valor del proyecto</span>");
						return false;//txtPorAntic
				}else if($("#txtPorProy").val()==""){
						$("#txtPorProy").focus().after("<span class='error'>Ingrese el porcentaje del proyecto</span>");
						return false;
				}else if($("#txtPorProy").val()>100){
						$("#txtPorProy").focus().after("<span class='error'>El porcentaje de participación no debe superar el 100%</span>");
						return false;
				}else if($("#txtPorAntic").val()==""){
						$("#txtPorAntic").focus().after("<span class='error'>Ingrese el porcentaje del anticipo del proyecto</span>");
						return false;
				}else if($("#txtPorAntic").val()>=100){
						$("#txtPorAntic").focus().after("<span class='error'>El porcentaje del anticipo no debe se igual o superior al 100%</span>");
						return false;
				}else if($("#txtPorIva").val()==""){
						$("#txtPorIva").focus().after("<span class='error'>Ingrese el porcentaje del IVA</span>");
						return false;
				}else{
					$('#txtBandera').attr({'value':'1'});
					$('#frmCrearProyecto').attr('action','./index.php?seccion=CREAPROYEC');
					$('#frmCrearProyecto').submit();
				}
			});	

			$("#limpiar").click(function(){
							$("#txtCodProy").attr({'value':''});
							$("#txtNomProy").attr({'value':''});
							$("#txtFecIniProy").attr({'value':''});
							$("#txtFecFinProy").attr({'value':''});
							$("#txtCliProy").attr({'value':''});
							$("#txtDirProy").attr({'value':''});
							$("#txtValProy").attr({'value':''});
							$("#txtPorProy").attr({'value':''});
							$("#txtPorAntic").attr({'value':''});
							$("#txtPorIva").attr({'value':''});
							$("#txtDesProy").attr({'value':''});
//				$(location).attr('href','./index.php?seccion=INICIO');
				});

		});


		function validate_fechaMayorQue(fechaInicial,fechaFinal){
			if((Date.parse(fechaInicial)) >= (Date.parse(fechaFinal))){
				return 0;
			}
			return 1;
		}
    

