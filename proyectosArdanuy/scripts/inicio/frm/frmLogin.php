<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Login</title>

	<link rel="stylesheet" href="./css/estilos.css" type="text/css" />
	<script type="text/javascript" src="./jquery1.8/jquery-1.8.0.js"></script>
	<script type="text/javascript" src="./jquery1.8/jqueryslidemenu.js"></script>
	<script type="text/javascript" src="./jquery1.8/jquery-ui.min.js"></script>
  <script type="text/javascript" src="./jquery1.8/jquery.min.js"></script>
    
	<script type="text/javascript">
		$(document).ready(function() {
			$("#enviar").click(function (){
				$(".error").remove();
				if( $("#txtUsuario").val() == "" ){
					$("#txtUsuario").focus().after("<span class='error'>Ingrese su usuario</span>");
					return false;
				}else if( $("#txtClave").val() == "" ){
					$("#txtClave").focus().after("<span class='error'>Ingrese su contraseña</span>");
					return false;
				}else{
					//alert(" OK ");
					$('#frmIngreso').attr('action','./index.php?seccion=INICIO');
					$("#txtBandera").attr({'value':'1'});
					$('#frmIngreso').submit();
				}
			});

			$("#limpiar").click(function(){
				$("#txtUsuario").attr({'value':''});
				$("#txtClave").attr({'value':''});
			});

		});
	
	</script>

</head>

<body>

    <form id="frmIngreso" name="frmIngreso" method="post">
        <input type="hidden" id="txtBandera" name="txtBandera" value="" class=""/>
        <br>
        <table BORDER="0" CELLSPACING="0" CELLPADDING="0" WIDTH="100%" bgcolor="#FFFFFF">
          <tr>
            <td>
              <table width="100%" border="0" cellspacing="0">
                <tr>
                  <td width="30%">&nbsp;</td>
                  <td width="17%">
                  <img width="178" height="55" src="./img/ardanuy/logoardanuygrande.gif">
                  </td>
                  <td align="right"  width="53%"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
                </tr>
                <tr><td height="17" colspan="3">&nbsp;</td></tr>
              </table>
            </td>
          <tr>
            <td>&nbsp;</td>
        </table>
        <table cellpading="5" cellspacing="0" align="center" width="38%">     
              <tr>
              <td colspan="3" class="subtexto">
                <img src="./img/inicio/top.png" alt="" width="546" id="top">
                <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">           
                    <tr>
                    <td width="76%" align="center"><h2 class="titulo"><font color="#cc0000">Iniciar Sesi&oacute;n</h2></font></td>
                    <td width="24%"><img src="./img/inicio/clave.png" width="94" height="89" /></td>
                  </tr>                               
                </table>
              </td>
            </tr>
            <tr>
              <td height="36" colspan="3" class="subtexto">
                <font color="#005199">
                <b>Ingrese la siguiente información</b></font>
              </td>
            </tr>
            <tr>
              <td width="6%" align="left">&nbsp;</td>
              <td width="24%" align="left">
                <label class="subtexto" for="element_1"><font color="#005199">Usuario <font color="red">*</font></label>
              </td>
              <td width="70%" align="left">
              	<input type="text" id="txtUsuario" name="txtUsuario" class="" style="width: 250px;" value="<?php $txtUsuario; ?>"/>
              </td>
            </tr>
            <tr>
              <td align="left">&nbsp;</td>
              <td align="left"><label class="subtexto" for="element_2"><font color="#005199">Contrase&ntilde;a <font color="red">*</font></label></td>
              <td align="left"><input type="password" id="txtClave" name="txtClave" class="" style="width: 250px;" value=""/></td>
            </tr>
            <tr>
              <td align="left">&nbsp;</td>
              <td height="44" align="left">&nbsp;</td>
              <td align="left"><input type="button" name="enviar" id="enviar" class="boton" value="Continuar"/>
              <input type="button" name="limpiar" id="limpiar" class="boton" value="Cancelar"/></td>
            </tr>
            <tr>
              <td colspan="3" class="subtexto"><font color="#005199">Los campos con <font color="red">*</font> son obligatorios.</td>
            </tr>
            <tr>
              <td colspan="3" class="subtexto"><img id="bottom" src="./img/inicio/bottom.png" alt="" width="546"></td>
            </tr>
        </table>

    </form>

</body>
</html>