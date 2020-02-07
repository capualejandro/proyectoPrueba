<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title></title>

	<script type="text/javascript" src="../scripts/modulo/administracion/lib/agregarMenu.js"></script>

</head>

<body>
    
    <form id="frmAgregarMenu" name="frmAgregarMenu" method="post">
      <input type="hidden" id="txtBandera" name="txtBandera" value="" class=""/>
      <table cellpading="5" cellspacing="0" align="center" width="38%">
        <tr>
          <td colspan="3" class="subtexto">
            <img src="./img/inicio/top.png" alt="" width="546" id="top">
          	<table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
              <tr>
                <td width="76%" align="center"><h2 class="titulo"><font color="#CC0000">Agregar Menu</font></h2></td>
                <td width="24%"><img src="./img/inicio/menu1.gif" width="94" height="89" /></td>
              </tr>
            </table>

          </td>
        </tr>
        <tr>
          <td width="7%" align="left">&nbsp;</td>
          <td width="24%" align="left"><label class="subtexto"><font color="#005199">Padre <font color="red">*</font></label></td>
          <td width="69%" height="28" align="left">
              <select name="selPadre" id="selPadre" class="" style="width:300px;">
<?php foreach($arModulo as $indice => $valor){ ?>
				<option value="<?php echo $indice; ?>"> <?php echo $valor; ?> </option>
<?php } ?>
              </select>
          </td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td height="27" align="left"><label class="subtexto"><font color="#005199">Nombre de Seccion<font color="red">*</font></label></td>
          <td align="left">
          	<input type="text" id="txtNombre" name="txtNombre" class="" style="width: 300px;" value="<?php echo $txtNombre; ?>"/>
          </td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td height="29" align="left"><label class="subtexto"><font color="#005199">Descripción <font color="red">*</font></label></td>
          <td align="left">
          	<input type="text" id="txtDescripcion" name="txtDescripcion" class="" style="width: 300px;" value="<?php echo $txtDescripcion; ?>"/>
          </td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td height="29" align="left"><label class="subtexto"><font color="#005199">Ruta de los archivos <font color="red">*</font></label></td>
          <td align="left">
          	<input type="text" id="txtHTMLMenu" name="txtHTMLMenu" class="" style="width: 300px;" value="<?php echo $txtHTMLMenu; ?>"/>
          </td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td height="28" align="left"><label class="subtexto"><font color="#005199">Orden Padre <font color="red">*</font></label></td>
          <td align="left">
          	<input type="text" id="txtOrdenPadre" name="txtOrdenPadre" class="" style="width: 300px;" value="<?php echo $txtOrdenPadre; ?>"/>
            <input type="hidden" id="hddOrdenPadre" name="hddOrdenPadre" value="<?php echo $txtOrdenPadre; ?>"/>
          </td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td height="28" align="left"><label class="subtexto"><font color="#005199">Orden Menu <font color="red">*</font></label></td>
          <td align="left">
          	<input type="text" id="txtOrdenMenu" name="txtOrdenMenu" class="" style="width: 300px;" value="<?php echo $txtOrdenMenu; ?>"/>
            <input type="hidden" id="hddOrdenMenu" name="hddOrdenMenu" value="<?php echo $txtOrdenMenu; ?>"/>
          </td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td height="28" align="left"><label class="subtexto"><font color="#005199">Acceso Publico <font color="red">*</font></label></td>
          <td align="left">
              <select name="selAccesoPublico" id="selAccesoPublico" class="" style="width: 300px;">
<?php foreach($arBoolchar as $indice => $valor){ ?>
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
            <input type="button" name="limpiar" id="limpiar" class="boton" value="Cancelar"/>
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
    
</body>
</html>