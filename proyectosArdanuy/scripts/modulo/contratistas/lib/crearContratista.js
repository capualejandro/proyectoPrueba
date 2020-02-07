// JavaScript Document

		$(document).ready(function() {
			

			$("#txtFecPeriodo1").datepicker({
				showWeek: true,
				dateFormat: 'yy-mm-dd',
				changeMonth: true, 
				changeYear: true
			});

			$("#txtFecPeriodo2").datepicker({
				showWeek: true,
				dateFormat: 'yy-mm-dd',
				changeMonth: true, 
				changeYear: true
			});
			

			$("#selCodProyecto").change(function(){
				var parametros = {
					"opc" : "conpro",
					"codProyecto" : $("#selCodProyecto").val()
				};
				
			});

			$("#selContrPais").change(function () {
				$("#selContrPais option:selected").each(function () {
					codPais = $(this).val();
					$.post("../scripts/modulo/ajax/verificar.php",{
						codPais:codPais,
						opc:"conpais" 
					},
					function(data){
						$("#selContrCiudad").html(data);
					});            
				});
			});


			$("#selContrTipoIdent").change(function () {
				$("#selContrTipoIdent option:selected").each(function () {
					tipIdentif = $(this).val();
					$.post("../scripts/modulo/ajax/verificar.php",{
						tipIdentif:tipIdentif,
						opc:"conidentif" 
					});
				});
			})
			
			$("#enviar").click(function (){
				$(".error").remove();
				if($("#selCodProyecto").val()==""){
						$("#selCodProyecto").focus().after("<span class='error'>Debe Seleccionar el Numero del Proyecto</span>");
						return false;
				}else if( $("#selContrTipoIdent").val() == "" ){
						$("#selContrTipoIdent").focus().after("<span class='error'>Debe Selccionar el tipo de identificacion del contratista</span>");
						return false;
				}else if( $("#txtContrIdentif").val() == "" ){
						$("#txtContrIdentif").focus().after("<span class='error'>Ingrese el número de identificación</span>");
						return false;
				}else if( $("#txtContrNomb").val() == "" ){
						$("#txtContrNomb").focus().after("<span class='error'>Ingrese el Ingrese el nombre del contratista</span>");
						return false;
				}else if( $("#txtContrDir").val() == "" ){
						$("#txtContrDir").focus().after("<span class='error'>Ingrese la dirección del contratista</span>");
						return false;				
				}else if( $("#selContrPais").val() == "" ){
						$("#selContrPais").focus().after("<span class='error'>Seleccione el Pais del Contratista</span>");
						return false;
				}else if( $("#selContrCiudad").val() == "" ){
						$("#selContrCiudad").focus().after("<span class='error'>Seleccione la Ciudad del Contratista</span>");
						return false;
				}else if( $("#txtContrTel").val() == "" ){
						$("#txtContrTel").focus().after("<span class='error'>Ingrese el teléfono del Contratista</span>");
						return false;
				}else if( $("#selTieneContrato").val() == "" ){
						$("#selTieneContrato").focus().after("<span class='error'>Seleccione si tiene contrato si/no</span>");
						return false;							
				}else if( $("#txtContraNum").val() == "" ){
						$("#txtContraNum").focus().after("<span class='error'>Ingrese el número del contrato</span>");
						return false;			
				}else if( $("#txtContraObj").val() == "" ){
						$("#txtContraObj").focus().after("<span class='error'>Ingrese el objeto del contrato</span>");
						return false;
				}else if( $("#txtFecPeriodo1").val() == "" ){
						$("#txtFecPeriodo1").focus().after("<span class='error'>Ingrese la fecha inicial del contrato</span>");
						return false;
				}else if( $("#txtFecPeriodo2").val() == "" ){
						$("#txtFecPeriodo2").focus().after("<span class='error'>Ingrese la fecha final del contrato</span>");
						return false;
				}else if( $("#txtContraVal").val() == "" ){
						$("#txtContraVal").focus().after("<span class='error'>Ingrese el valor del contrato</span>");
						return false;
				}else{
					$('#txtBandera').attr({'value':'1'});
					$('#frmCrearContratista').attr('action','./index.php?seccion=CREARSUBC');
					$('#frmCrearContratista').submit();
				}
			});	

			$("#limpiar").click(function(){
				$("#selCodProyecto").attr({'value':''});
				$("#selContrTipoIdent").attr({'value':''});
				$("#txtContrIdentif").attr({'value':''});
				$("#txtContrNomb").attr({'value':''});
				$("#txtContrDir").attr({'value':''});
				$("#selContrPais").attr({'value':''});
				$("#selContrCiudad").attr({'value':''});
				$("#txtContrTel").attr({'value':''});
				$("#selTieneContrato").attr({'value':''});
				$("#txtContraNum").attr({'value':''});
				$("#txtContraObj").attr({'value':''});
				$("#txtFecPeriodo1").attr({'value':''});
				$("#txtFecPeriodo2").attr({'value':''});
				$("#txtContraVal").attr({'value':''});
				$("#txtContraDes").attr({'value':''});																																							
//			$(location).attr('href','./index.php?seccion=INICIO');
			});

		});

		   
