<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title></title>

	<script type="text/javascript">
        $(document).ready(function() {
            $("#enviar").click(function (){
                $("#error").remove();
                if( $("#txtNombre").val() == "" ){
                    $("#txtNombre").focus().after("<span class='error'>Ingrese el nombre del area</span>");
                    return false;
                }else{
                    $("#txtBandera").attr({'value':'1'});
                    $('#frmCrearServicio').attr('action','./index.php?seccion=SERCREA');
                    $('#frmCrearServicio').submit();
                }
            });

			$("#limpiar").click(function(){
                $("#txtNombre").attr({'value':''});
				$(location).attr('href','./index.php?seccion=INICIO'); 
            });

			$("#txtNombre").blur(function(){
				if($("#txtNombre").val()!= ""){
					$("#error").remove();
					$("#txtNombre").after("<span id='error' class='error'></span>");
					var parametros = {
						"opc" : "ser",
						"ser_nombre" : $("#txtNombre").val()
					};
					$.ajax({
						type: "POST",
						url: "../scripts/modulo/ajax/verificar.php",
						data: parametros,
						beforeSend: function(){
							$("#error").html("<img src='./img/gif/ajax-loader.gif' width='15' height='15' /> Verificando");
						},
						success:function (response) {
//							$("#error").html(response);
/**/
							if(response == '1'){
								$("#error").html("El servicio ya existe");
								$("#txtNombre").focus();
								$("#txtNombre").select();
								$("#enviar").attr("disabled",true);
								return false;
							}else{
								$("#error").remove();
								$("#enviar").removeAttr("disabled");
							}
/**/
						}
					});
				}
			});

        });
    
    </script>

</head>

<body>
    
    <form id="frmCrearServicio" name="frmCrearServicio" method="post">
      <input type="hidden" id="txtBandera" name="txtBandera" value="" class=""/>
      <table cellpading="5" cellspacing="0" align="center" width="38%">
        <tr>
          <td colspan="3" class="subtexto">
            <img src="./img/inicio/top.png" alt="" width="546" id="top">
          	<table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
              <tr>
                <td width="76%" align="center"><h2 class="titulo"><?php echo $_SESSION["mod_descripcion"]; ?></h2></td>
                <td width="24%"><img src="./img/inicio/servicio.gif" width="94" height="89" /></td>
              </tr>
            </table>

          </td>
        </tr>
        <tr>
          <td width="8%" align="left">&nbsp;</td>
          <td width="28%" align="left"><span class="subtexto">Nombre Del Servicio<font color="red">*</font></span></td>
          <td width="64%" align="left">
          	<input type="text" id="txtNombre" name="txtNombre" class="" style="width: 250px;" value="<?php echo $txtNombre; ?>"/>
          </td>
        </tr>
        <tr>
          <td height="37" align="left">&nbsp;</td>
          <td align="left">&nbsp;</td>
          <td align="left"><input type="button" name="enviar" id="enviar" class="boton" value="Continuar"/>
            <input type="button" name="limpiar" id="limpiar" class="boton" value="Cancelar"/></td>
        </tr>
        <tr>
          <td colspan="3" class="subtexto">Los campos con <font color="red">*</font> son obligatorios.</td>
        </tr>
        <tr>
          <td colspan="3" class="subtexto"><img id="bottom" src="./img/inicio/bottom.png" alt="" width="546"></td>
        </tr>
      </table>
    </form>
    
</body>
</html>