<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Funcionario</title>

	<script type="text/javascript">
        $(document).ready(function() {
            $("#enviar").click(function (){
                $(".error").remove();
                if( $("#selFuncionario").val() == "" ){
                    $("#selFuncionario").focus().after("<span class='error'>Debe Seleccionar un funcionario</span>");
                    return false;
                }else if( $("#txtLogin").val() == "" ){
                    $("#txtLogin").focus().after("<span class='error'>Ingrese el login del usuario</span>");
                    return false;
                }else if( $("#txtClave").val() == "" ){
                    $("#txtClave").focus().after("<span class='error'>Ingrese la contraseña del usuario</span>");
                    return false;
                }else if( $("#txtReClave").val() == "" ){
                    $("#txtReClave").focus().after("<span class='error'>Confirme la contraseña</span>");
                    return false;
                }else if( $("#txtClave").val() != "" && $("#txtReClave").val() != "" && $("#txtClave").val() != $("#txtReClave").val() ){
                    $("#txtClave").focus().after("<span class='error'>La contraseña no coincide con la confirmación</span>");
                    $("#txtReClave").focus().after("<span class='error'>La contraseña no coincide con la confirmación</span>");
                    return false;
                }else if( $("#selTipoUsuario").val() == "" ){
					$("#selTipoUsuario").focus().after("<span class='error'>Dede Seleccionar el tipo de usuario</span>");
					return false;
                }else{
//					alert(" OK "+$("#txtClave").val()+" "+$("#txtReClave").val());
					$("#txtBandera").attr({'value':'1'});
					$('#frmCrearUsuario').attr('action','./index.php?seccion=USUCREAR');
					$('#frmCrearUsuario').submit();
                }
            });

			$("#limpiar").click(function(){
                $("#selFuncionario").attr({'value':''});
                $("#txtLogin").attr({'value':''});
                $("#txtClave").attr({'value':''});
                $("#txtReClave").attr({'value':''});
				$("#selTipoUsuario").attr({'value':''});
//				$(location).attr('href','./index.php?seccion=INICIO');
            });

			$("#txtLogin").blur(function(){
				if($("#txtLogin").val()!= ""){
					$(".error").remove();
					$("#txtLogin").after("<span id='error' class='error'></span>");
					var parametros = {
						"opc" : "usu",
						"usu_login" : $("#txtLogin").val()
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
								$("#error").html("El login de usuario ya existe");
								$("#txtLogin").focus();
								$("#txtLogin").select();
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
  
  <div>  
    <form id="frmCrearUsuario" name="frmCrearUsuario" method="post">
      <input type="hidden" id="txtBandera" name="txtBandera" value="" class=""/>
      <table cellpading="5" cellspacing="0" align="center" width="43%">
        <tr>
          <td colspan="3" class="subtexto">
            <img src="./img/inicio/top.png" alt="" width="546" id="top">
            <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
              <tr>
                <td width="76%" align="center"><h2 class="titulo"><font color="#CC0000">Crear Usuario</font></h2></td>
                <td width="24%"><img src="./img/inicio/usuario.gif" width="94" height="89" /></td>
              </tr>
            </table>
            
          </td>
        </tr>

        <tr>
          <td width="6%" align="left">&nbsp;</td>
          <td width="26%" align="left"><label class="subtexto"><font color="#005199">Funcionario <font color="red">*</font></label></td>
          <td width="68%" height="28" align="left">
              <select name="selFuncionario" id="selFuncionario" class="" style="width: 250px;">
<?php foreach($arFuncionario as $indice => $valor){ ?>
				<option value="<?php echo $indice; ?>"> <?php echo minusculasInicial($valor); ?> </option>
<?php } ?>
              </select>
          </td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td height="27" align="left"><label class="subtexto"><font color="#005199">Login <font color="red">*</font></label></td>
          <td align="left">
          	<input type="text" id="txtLogin" name="txtLogin" class="" style="width: 250px;" value="<?php echo $txtLogin; ?>"/>
            <span id="status"></span>
          </td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td height="29" align="left"><label class="subtexto"><font color="#005199">Contraseña <font color="red">*</font></label></td>
          <td align="left">
          	<input type="password" id="txtClave" name="txtClave" class="" style="width: 250px;" value="<?php echo $txtClave; ?>"/>
          </td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td height="29" align="left"><label class="subtexto"><font color="#005199">Re Contraseña <font color="red">*</font></label></td>
          <td align="left">
          	<input type="password" id="txtReClave" name="txtReClave" class="" style="width: 250px;" value="<?php echo $txtReClave; ?>"/>
          </td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td height="28" align="left"><label class="subtexto"><font color="#005199">Tipo de Usuario <font color="red">*</font></label></td>
          <td align="left">
              <select name="selTipoUsuario" id="selTipoUsuario" class="" style="width: 250px;">
<?php foreach($arTipoUsuario as $indice => $valor){ ?>
				<option value="<?php echo $indice; ?>"> <?php echo $valor; ?> </option>
<?php } ?>
              </select>
          </td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td height="31" align="left">&nbsp;</td>
          <td align="left">
          	<input type="button" name="enviar" id="enviar" class="boton" value="Grabar"/>
            <input type="button" name="limpiar" id="limpiar" class="boton" value="Limpiar"/>
           </td>
        </tr>
        <tr>
          <td colspan="3" class="subtexto"><font color="#005199">Los campos con <font color="red">*</font><font color="#005199"> son obligatorios.</font></td>
        </tr>
        <tr>
          <td colspan="3" class="subtexto"><img id="bottom" src="./img/inicio/bottom.png" alt="" width="546"></td>
        </tr>
      </table>
    </form>
  </div>
  
</body>
</html>