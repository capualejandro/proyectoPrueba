<html>
<head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
<!--<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />-->

<title></title>

	<script type="text/javascript" src="../scripts/modulo/administracion/lib/listadoMenu.js"></script>

</head>

<body>


<div id="capa" style="display:none">
     <center><div id="loading" style="display:none;"><img src="./img/gif/loading.gif"></div></center>
    <form id="frmListadoMenu" name="frmListadoMenu" method="POST">
     <input type="hidden" id="hidOpc" name="hidOpc" value="">
     <input type="hidden" id="hidCodigo" name="hidCodigo" value="">
     <input type="hidden" id="hidLogin" name="hidLogin" value="">
     <table cellpading="5" cellspacing="0" border="0" align="center" width="38%">
        <tr>
          <td colspan="3" class="subtexto">
            <img src="./img/inicio/top.png" alt="" width="546" id="top">
            <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
              <tr>
                <td width="76%" align="center"><h2 class="titulo"><font color="#CC0000">Editar Menu</font></h2></td>
                <td width="24%"><img src="./img/inicio/menu1.gif" width="94" height="89" /></td>
              </tr>
            </table>
            
          </td>
        </tr>

      <tr>
       <td width="6%" align="left">&nbsp;</td>
       <td width="19%" align="left" class="subtexto"><font color="#005199">Nombre </font><font color="red">*</font></td>
       <td width="75%"><input type="text" id="txtNombre" name="txtNombre" class="" style="width: 300px;" value=""/></td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td align="left" class="subtexto"><font color="#005199">Descripci&oacute;n <font color="red">*</font></td>
        <td><input type="text" id="txtDescripcion" name="txtDescripcion" class="" style="width: 300px;" value=""/></td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td align="left" class="subtexto"><font color="#005199">Ruta <font color="red">*</font></td>
        <td><input type="text" id="txtRuta" name="txtRuta" class="" style="width: 300px;" value=""/></td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td align="left" class="subtexto"><font color="#005199">Padre </font><font color="red">*</font></td>
		<td>
          <select name="selPadre" id="selPadre" class="" style="width: 300px;">
			<?php foreach($arModulo as $indice => $valor){ ?>
				<option value="<?php echo $indice; ?>"> <?php echo $valor; ?> </option>
			<?php } ?>
          </select>
		</td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td align="left" class="subtexto"><font color="#005199">Orden Menu <font color="red">*</font></font></td>
        <td><input type="text" id="txtOrden" name="txtOrden" class="" style="width: 300px;" value=""/></td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td height="28" align="left" class="subtexto"><font color="#005199">Acceso Publico <font color="red">*</font></label></td>
        <td align="left">
          <select name="selAcceso" id="selAcceso" class="" style="width: 300px;">
			<?php foreach($arBoolchar as $indice => $valor){ ?>
				<option value="<?php echo $indice; ?>"> <?php echo $valor; ?> </option>
			<?php } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td height="33" align="left">&nbsp;</td>
        <td align="left"><input type="submit" name="enviar" id="enviar" class="boton" value="Modificar"/>
        <input type="button" name="limpiar" id="limpiar" class="boton" value="Cancelar" onClick="javascript:void(0); limpia();" /></td>
      </tr>
      <tr>
        <td colspan="3" class="subtexto">
        	<font color="#005199">Los campos con <font color="red">*</font><font color="#005199"> son obligatorios.</font>
        </td>
      </tr>
      <tr>
      	<td colspan="3" class="subtexto"><img id="bottom" src="./img/inicio/bottom.png" alt="" width="546"></td>
      </tr>
     </table>
    </form>
</div>

<div>
    <input type="hidden" id="hidTotal" name="hidTotal" value="<?php echo count($arMenu); ?>" class=""/>
    <h2 class="titulo" align="center"><font color="#CC0000">Listado De Menu</font></h2>
    <table cellspacing="0" cellpadding="5" width="51%" class="subtexto" align="center">
     <thead class="cabecerasTablas" bgcolor="#93D7E0">
      <tr>
       <th width="50%" height="30" align="left">Descripci&oacute;n</th>
       <th width="11%" align="left">Nombre</th>
       <th width="40%" align="left">Ruta</th>
       <th width="9%" align="left">Orden</th>
       <th width="9%" align="left">Editar</th>
<!--
       <th width="16%" align="left">Fecha Registro</th>
       <th width="9%" align="left">Estado</th>
       <th width="12%" align="left">Inactivar</th>
-->
	   </tr>
     </thead>
     <tbody>
<?php
	for($i=0; $i<count($arMenu); $i++){
#		echo minusculasInicial($arMenu[$i][3]." ".$arMenu[$i][4])."<br>";
		if($arMenu[$i][7]=="A") $estado="Activo";
		else $estado="Inactivo";
		if (($i % 2) == 1) $bgcolor = "#D2D5DD";
		else $bgcolor = "#F2F2F2";
?>
	  <input type="hidden" id="<?php echo "codigo".$i; ?>" name="<?php echo "codigo".$i; ?>" value="<?php echo $arMenu[$i][0]; ?>">
	  <input type="hidden" id="<?php echo "estado".$i; ?>" name="<?php echo "estado".$i; ?>" value="<?php echo $arUsu[$i][7]; ?>">
	  <tr bgcolor="<?php echo $bgcolor; ?>">
       <!--<td><?php echo minusculasInicial($arMenu[$i][3]); ?></td>-->
       <td><?php echo $arMenu[$i][3]; ?></td>
       <td><?php echo $arMenu[$i][0]; ?></td>
       <td><?php echo $arMenu[$i][2]; ?></td>
       <td><?php echo $arMenu[$i][6]; ?></td>
       <td><a id="editar" href="javascript:void(0); mostrar(<?php echo "'".$arMenu[$i][0]."'"; ?>);"><img src="./img/crud/note_edit.png" border="0" /></a></td>
<!--
       <td><?php echo fecha_texto2($arUsu[$i][5]); ?></td>
       <td><?php echo $estado; ?></td>
       <td><a id="borrar" href="javascript:void(0); inactivar(<?php echo $arUsu[$i][0]; ?>);"><img src="./img/crud/delete.png" border="0" /></a></td>
-->
	   </tr>
<?php
	}
?>
     </tbody>

    </table>
</div>

</body>
</html>