// JavaScript Document 
		$(document).ready(function() {

			$("#txtFecha").datepicker({
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
				if($("#txtFecha").val()==""){
					$("#txtFecha").focus().after("<span class='error'>Debe Seleccionar la fecha a consultar</span>");
					return false;
				}else{
					$("#capa").show("slow");
					if ($("#capa").is(":hidden") == false){
						$("#error").remove();
						var parametros = {
							"opc" : "consulFecha",
							"txtFecha" : $("#txtFecha").val()
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
				$("#txtFecha").attr({'value':''});
//				$("#capa").hide("slow");
				$("#capa").css("display", "none");
			});

		});
