// JavaScript Document


		function mostrar(i){
			$("#hidCodigo").attr({'value':i});
			$("#capa").show("slow");
			if ($("#capa").is(":hidden") == false){
				$("#error").remove();
				var parametros = {
					"opc" : "edimenu",
					"menu_codigo" : i
				};
				$.ajax({
					async: true,
					type: "POST",
					url: "../scripts/modulo/ajax/verificar.php",
					data: parametros,
					dataType: "json",
//					dataType: "html",
//					beforeSend: function(){
//					$("#loading").show();
//					},
					success:function (data) {
						$.each(data,function(index,value) {
							$("#txtNombre").attr({'value':data[index].nom});
							$("#selPadre").attr({'value':data[index].pad});
							$("#txtRuta").attr({'value':data[index].rut});
							$("#txtDescripcion").attr({'value':data[index].des});
							$("#txtOrden").attr({'value':data[index].ord});
							$("#selAcceso").attr({'value':data[index].vis});
						});
						$("#loading").hide();
					},
					error: function(data){
						alert('Error');
					}
				});

			}
		}

		function inactivar(i){
			var parametros = {
				"opc" : "upd",
				"fun_codigo" : $("#codigo"+i).val(),
				"fun_estado" : $("#estado"+i).val()
			};
			$.ajax({
				type: "POST",
				url: "../scripts/modulo/ajax/verificar.php",
				data: parametros,
				beforeSend: function(){
					$("#loading").show();
				},
				success:function (response) {
					$("#loading").hide("slow");
					$("#capa").hide("slow");
					location.href="./index.php?seccion=USULISTAR";
				}
			});

			$("#capa").hide("slow");
		}

		function limpia(){
			$("#capa").hide("slow");
		}

    $(document).ready(function() {

			$("#enviar").click(function (){
                $("#error").remove();
				$(".error").remove();
				$("#hidOpc").attr({"value":"uptmenu"});
//				$("#hidOpc").attr({"value":"uptusu"});
				if( $("#txtNombre").val() == "" ){
                    $("#txtNombre").focus().after("<span id='error' class='error'>Ingrese el nombre del menu</span>");
                    return false;
                }else if( $("#txtDescripcion").val() == "" ){
                    $("#txtDescripcion").focus().after("<span id='error' class='error'>Ingrese La descripccion del menu</span>");
                    return false;
                }else if( $("#txtRuta").val() == "" ){
					$("#txtRuta").focus().after("<span id='error' class='error'>Ingrese Ruta de los archivosdel menu</span>");
					return false;
                }else if( $("#selPadre").val() == "" ){
                    $("#selPadre").focus().after("<span id='error' class='error'>Seleccion el menu padre</span>");
                    return false;
                }else if( $("#txtOrden").val() == "" ){
                    $("#txtOrden").focus().after("<span class='error'>Ingrese el orden del menu</span>");
                    return false;
                }else if( $("#txtOrden").val() != "" && isNaN($("#txtOrden").val()) ){
                    $("#txtOrden").focus().after("<span class='error'>Ingrese solo numeros</span>");
                    return false;
                }else if( $("#selAcceso").val() == "" ){
                    $("#selAcceso").focus().after("<span id='error' class='error'>Seleccion accesos al menu</span>");
                    return false;
				}else{
					$("#frmListadoMenu").submit(function(){
						$.ajax({
							type:"POST",
							url:"../scripts/modulo/ajax/crud.php",
							dataType:"html",
							data:$(this).serialize(),
							beforeSend:function(){
								$("#loading").show();
							},
							success:function(response){
								$("#loading").hide("slow");
								$("#capa").hide("slow");
								location.href="./index.php?seccion=MENULISTAR";
							},
							error: function(response){
								alert('Error');
							}
						});
						return false;
					});

				}
			});

    });
