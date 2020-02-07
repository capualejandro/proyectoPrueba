// JavaScript Document

        $(document).ready(function() {
            $("#enviar").click(function (){
                $(".error").remove();
                if( $("#selPadre").val() == "" ){
                    $("#selPadre").focus().after("<span class='error'>Debe Seleccionar una opcion</span>");
                    return false;
                }else if( $("#txtNombre").val() == "" ){
                    $("#txtNombre").focus().after("<span class='error'>Ingrese el nombre del menu</span>");
                    return false;
                }else if( $("#txtDescripcion").val() == "" ){
                    $("#txtDescripcion").focus().after("<span class='error'>Ingrese la descripción del menu</span>");
                    return false;
                }else if( $("#txtHTMLMenu").val() == "" ){
                    $("#txtHTMLMenu").focus().after("<span class='error'>Ingrese la ruta del archivo</span>");
                    return false;
                }else if( $("#txtOrdenPadre").val() == "" ){
                    $("#txtOrdenPadre").focus().after("<span class='error'>Ingrese el orden del menu</span>");
                    return false;
                }else if( $("#txtOrdenPadre").val() != "" && isNaN($("#txtOrdenPadre").val()) ){
                    $("#txtOrdenPadre").focus().after("<span class='error'>Ingrese solo numeros</span>");
                    return false;
                }else if( $("#txtOrdenMenu").val() == "" ){
                    $("#txtOrdenMenu").focus().after("<span class='error'>Ingrese el orden del menu</span>");
                    return false;
                }else if( $("#txtOrdenMenu").val() != "" && isNaN($("#txtOrdenMenu").val()) ){
                    $("#txtOrdenMenu").focus().after("<span class='error'>Ingrese solo numeros</span>");
                    return false;
                }else if( $("#selAccesoPublico").val() == "" ){
					$("#selAccesoPublico").focus().after("<span class='error'>Dede Seleccionar una opcion</span>");
					return false;
                }else{
//					alert(" OK "+$("#txtOrdenPadre").val()+" "+$("#txtOrdenMenu").val());
                    $("#txtBandera").attr({'value':'1'});
					$("#hddOrdenPadre").attr({'value':$("#txtOrdenPadre").val()});
					$("#hddOrdenMenu").attr({'value':$("#txtOrdenMenu").val()});
					$("#txtBandera").attr({'value':'1'});
                    $('#frmAgregarMenu').attr('action','./index.php?seccion=MENCREA');
                    $('#frmAgregarMenu').submit();
                }
            });

            $("#selPadre").change(function(){
//				alert("cambio "+$("#selPadre").val());
				if($("#selPadre").val()=='0'){
					$("#txtOrdenPadre").attr("disabled",false);
					$("#txtOrdenPadre").attr({'value':''});
					$("#txtOrdenMenu").attr({'value':'1'});
					$("#txtOrdenMenu").attr("disabled",true);
				}else{
					$("#txtOrdenMenu").attr("disabled",false);
					$("#txtOrdenMenu").attr({'value':''});
					$("#txtOrdenPadre").attr({'value':'0'});
					$("#txtOrdenPadre").attr("disabled",true);
				}
            });

			$("#txtNombre").keyup(function(){
				if($("#txtNombre").val()!= ""){
					$("#error").remove();
					$("#txtNombre").after("<span id='error' class='error'></span>");
					var parametros = {
						"opc":"men",
						"mod_codigo":$("#txtNombre").val()
					};
					$.ajax({
						type: "POST",
						url: "../scripts/modulo/ajax/verificar.php",
						data: parametros,
						beforeSend: function(){
							$("#error").html("<img src='./img/gif/ajax-loader.gif' width='15' height='15' /> Verificando");
						},
						success:function (response) {
							if(response == '1'){
								$("#error").html("El menu ya existe");
								$("#txtNombre").focus();
								$("#enviar").attr("disabled",true);
								return false;
							}else{
								$("#error").remove();
								$("#enviar").removeAttr("disabled");
							}
						}
					});
				}
			});

			$("#limpiar").click(function(){
                $("#selPadre").attr({'value':''});
                $("#txtNombre").attr({'value':''});
                $("#txtHTMLMenu").attr({'value':''});
                $("#selAccesoPublico").attr({'value':''});
				$(location).attr('href','./index.php?seccion=INICIO');
            });

        });
