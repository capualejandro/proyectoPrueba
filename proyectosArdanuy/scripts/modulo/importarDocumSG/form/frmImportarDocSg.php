<?php
	$caSql = "";
	$caSql = "SELECT pro_codigo FROM proyectos";
#	echo "<pre>$caSql - $txtBandera</pre>"; 
	$arProy = $db->GetArray($caSql);
	$arProyecto = array(''=>'Seleccione');
	for($i=0; $i<count($arProy); $i++){
		$arProyecto[$arProy[$i][0]] = $arProy[$i][0];
	}
?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  
    <title></title>
    
   	 
    <script type="text/javascript" src="../scripts/modulo/importarDocumSG/lib/importarDoc.js"> </script>
  
</head>
<body>

 	<div>  
    <!-- <form id="frmImportarDoc" name="frmImportarDoc" method="post"> -->
		<form id="frmImportarDocSg" name="frmImportarDocSg" action="javascript:void(0);">
   <input type="hidden" id="txtBandera" name="txtBandera" value="" class=""/>
   <input type="hidden" id="txtProFechFin" name="txtProFechFin" value="" class=""/>
   <table cellpading="5" cellspacing="0" align="center" width="43%">
    <tr>
     <td colspan="3" class="subtexto">
      <img src="./img/inicio/top.png" alt="" width="546" id="top">

      <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
       <tr>
        <td width="76%" align="center"><h2 class="titulo"><font color="#CC0000">Importar Documentos SG-SST</font></h2></td>
        <td width="24%"><img src="./img/inicio/login.jpg" width="94" height="89" /></td>
       </tr>
      </table>
       
     </td>
    </tr>

    <tr>
     <td width="6%" align="left">&nbsp;</td>
     <td width="26%" align="left"><label class="subtexto"><font color="#005199">Tipo<font color="red">*</font></label></td>
     <td width="68%" align="left">
      <select name="selTipDocSG" id="selTipDocSG" class="" style="width: 250px;">
       <option value=''>Seleccione</option>
       <option value='POLITICAS'>Politicas</option>
       <option value='MANUALES'>Manuales</option>
       <option value='PROCEDIMIENTOS'>Procedimientos</option>
       <option value='REGLAMENTO_H_y_SI'>Reglamento H y SI</option>
       <option value='COMPASST'>Compasst</option>
       <option value='PLAN DE EMERGENCIAS'>Plan de Emergencias</option>
       <option value='COMITE DE CONVIVENCIA'>Comite Convivencia</option>
       <option value='INVESTIGACION ACCIDENTES'>Investigacion Accidentes Incidentes</option>
       <option value='NORMATIVAS'>Normativas</option>
	<option value='CALIDAD'>Calidad</option>
      </select>
     <span id="status"></span>
     </td>
    </tr>

    <tr>
     <td align="left">&nbsp;</td>
     <td align="left"><span class="subtexto"><font color="#005199">Codigo<font color="red">*</font></span></td>
     <td align="left"><input type="text" id="txtCodDocSG" name="txtCodDocSG" style="width: 250px;" value=""/></td>
    </tr>

    <tr>
     <td align="left">&nbsp;</td>
     <td width="26%" align="left"><label class="subtexto"><font color="#005199"><strong></strong>Documento<font color="red">*</font></label></td>
     <td width="68%" align="left"><span id="status"></span>
       <input type="file" id="filDocSG" name="filDocSG" class="" /></td>
    </tr>

    <tr>
     <td align="left">&nbsp;</td>
     <td width="26%" align="left"><label class="subtexto"><font color="#005199">Nombre<font color="red">*</font></label></td>
     <td width="68%" align="left">
      <input type="text" id="txtNomDocSG" name="txtNomDocSG" style="width: 250px;" value=""/>
      <span id="status"></span>
     </td>                                  
				</tr>

    <tr>
     <td align="left">&nbsp;</td>
     <td height="21" align="left"><span class="subtexto"><font color="#005199">Fecha<font color="red">*</font></span></td>
     <td align="left"><span class="subtexto">
      <input type="text" id="txtFecDocSG" name="txtFecDocSG" style="width: 250px;" value="" readonly/>
     	</span>
     </td>
    </tr>

    <tr>
     <td align="left">&nbsp;</td>
     <td height="21" align="left"><span class="subtexto"><font color="#005199">Versión<font color="red">*</font></span></td>
     <td align="left"><input type="text" id="txtVerDocSG" name="txtVerDocSG" style="width: 250px;" value=""/></td>
    </tr>
     
    <tr>
     <td align="left">&nbsp;</td>
     <td height="26" align="left">&nbsp;</td>
     <td align="left">
      <input type="button" name="enviar" id="enviar" class="boton" value="Grabar"/>
      <input type="button" name="limpiar" id="limpiar" class="boton" value="Limpiar"/>
     </td>
    </tr>

    <tr>
     <td colspan="3" class="subtexto"><font color="#005199">Los campos con <font color="red">*</font> <font color="#005199">son obligatorios.</font></td>
    </tr>

    <tr>
     <td colspan="3" class="subtexto"><img id="bottom" src="./img/inicio/bottom.png" alt="" width="546"></td>
    </tr>
     
   </table>
    
  </form>
	</div>
	<div id="archivos_subidos" align="center">
<!--
    <table width="442" border="0" cellspacing="0">
      <tr><td width="102">Tipo</td><td width="236">Descripción</td><td width="82">&nbsp;</td></tr>
      <tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
    </table>
-->
	</div>
	
</body>
</html>
