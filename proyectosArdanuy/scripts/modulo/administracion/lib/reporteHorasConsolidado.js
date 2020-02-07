// JavaScript Document 
		$(document).ready(function() {

			$("#txtFecInicio").datepicker({
				showWeek: true,
				dateFormat: 'yy-mm-dd',
				changeMonth: true, 
				changeYear: true
			});

			$("#txtFecFinal").datepicker({
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
				if($("#txtFecInicio").val()==""){
					$("#txtFecInicio").focus().after("<span class='error'>Debe Seleccionar la fecha inicio a consultar</span>");
					return false;
				}else if($("#txtFecFinal").val()==""){
					$("#txtFecFinal").focus().after("<span class='error'>Debe Seleccionar la fecha final a consultar</span>");
					return false;
				}else{
					$("#capa").show("slow");
					if ($("#capa").is(":hidden") == false){
						$("#error").remove();
						var parametros = {
							"opc" : "consulFechaCon",
							"txtFecInicio" : $("#txtFecInicio").val(),
							"txtFecFinal" : $("#txtFecFinal").val()
						};
						$.ajax({
							async: true,
							type: "POST",
							url: "../scripts/modulo/ajax/verificar.php",
							data: parametros,
//							dataType: "json",
							dataType: "html",
							success:function (data) {
								$("#capa").html(data);
							},
							error: function(data){
								alert('Error');
							}
						});
					}
					$('#txtBandera').attr({'value':'1'});
//					$('#frmReporteHoras').attr('action','./index.php?seccion=REPORHORAS');
//					$('#frmReporteHoras').submit();
				}
			});	

			$("#limpiar").click(function(){
				$("#txtFecInicio").attr({'value':''});
				$("#txtFecFinal").attr({'value':''});
//				$("#capa").hide("slow");
				$("#capa").css("display", "none");
			});

		});
