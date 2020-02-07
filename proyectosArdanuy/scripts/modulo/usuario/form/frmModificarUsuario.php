<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>

	<script type="text/javascript" src="../scripts/modulo/usuario/lib/modificarUsuario.js"></script>

</head>

<body>
    <form id="frmModificarUsuario" name="frmModificarUsuario" method="POST">
     <input type="hidden" id="hidUsuCod" name="hidUsuCod" value="<?php echo $hidUsuCod ?>">
     <input type="hidden" id="hidFunCod" name="hidFunCod" value="<?php echo $hidFunCod ?>">
     <input type="hidden" id="txtBandera" name="txtBandera" value="">
     <table cellpading="5" cellspacing="0" border="0" align="center" width="38%">
        <tr>
          <td colspan="3" class="subtexto">

            <img src="./img/inicio/top.png" alt="" width="546" id="top">
            <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
              <tr>
                <td width="76%" align="center"><h2 class="titulo"><font color="#CC0000">Modificar Usuario</font></h2></td>
                <td width="24%"><img src="./img/inicio/funcionario.gif" width="94" height="89" /></td>
              </tr>
            </table>

          </td>
        </tr>

      <tr>
        <td align="left">&nbsp;</td>
        <td align="left" class="normal azultexto">Numero Identificación <span class="rojo">*</span></td>
        <td><input type="text" id="txtNumIden" name="txtNumIden" style="width: 250px;" value="<?php echo $txtNumIden ?>"/><span id="status"></span></td>
      </tr>
      <tr>
       <td width="6%" align="left">&nbsp;</td>
       <td width="24%" align="left" class="normal azultexto">Nombre <span class="rojo">*</span></td>
       <td width="70%"><input type="text" id="txtNombre" name="txtNombre" style="width: 250px;" value="<?php echo $txtNombre ?>"/><span id="status"></span></td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td align="left" class="normal azultexto">Apellido <span class="rojo">*</span></td>
        <td><input type="text" id="txtApellido" name="txtApellido" style="width: 250px;" value="<?php echo $txtApellido ?>"/><span id="status"></span></td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td align="left" class="normal azultexto">Telefono <span class="rojo">*</span></td>
        <td><input type="text" id="txtTelefono" name="txtTelefono" style="width: 250px;" value="<?php echo $txtTelefono ?>"/><span id="status"></span></td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td align="left" class="normal azultexto">Contraseña Nueva</td>
        <td><input type="password" id="txtClave" name="txtClave" style="width: 250px;" value=""/></td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td align="left" class="normal azultexto">Re Contraseña Nueva</td>
        <td><input type="password" id="txtReClave" name="txtReClave" style="width: 250px;" value=""/></td>
      </tr>
<!--
      <tr>
        <td align="left">&nbsp;</td>
        <td height="28" align="left"><label class="subtexto"><font color="#005199">Estado <font color="red">*</font></label></td>
        <td align="left">
          <select name="selEstado" id="selEstado" class="" style="width: 250px;">
<?php foreach($arEstado as $indice => $valor){ ?>
			  <option value="<?php echo $indice; ?>"> <?php echo $valor; ?> </option>
<?php } ?>
          </select>
        </td>
      </tr>
-->      
      <tr>
        <td align="left">&nbsp;</td>
        <td height="33" align="left">&nbsp;</td>
        <td align="left"><input type="button" name="btnModificar" id="btnModificar" class="boton" value="Modificar"/>
        <!--<input type="button" name="limpiar" id="limpiar" class="boton" value="Cancelar" onClick="javascript:void(0); limpia();" /></td>-->
      </tr>
      <tr>
        <td colspan="3" class="subtexto"><font color="#005199">Los campos con <font color="red">*</font><font color="#005199"> son obligatorios.</font></td>
      </tr>
      <tr>
        <td colspan="3" class="subtexto"><img id="bottom" src="./img/inicio/bottom.png" alt="" width="546"></td>
      </tr>
     </table>
    </form>

</body>
</html>