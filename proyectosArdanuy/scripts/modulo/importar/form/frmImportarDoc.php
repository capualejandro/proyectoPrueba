<?php
		$caSql = "";
		$caSql = "SELECT pro_codigo FROM proyectos";
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
  
    <script type="text/javascript" src="../scripts/modulo/importar/lib/importarDoc.js"></script>
  
  </head>

<body>

 	<div>  
    <!-- <form id="frmImportarDoc" name="frmImportarDoc" method="post"> -->
		<form id="frmImportarDoc" name="frmImportarDoc" action="javascript:void(0);">
      <input type="hidden" id="txtBandera" name="txtBandera" value="" class=""/>
      <input type="hidden" id="txtProFechFin" name="txtProFechFin" value="" class=""/>
      <table cellpading="5" cellspacing="0" align="center" width="43%">
        <tr>
          <td colspan="3" class="subtexto">
            <img src="./img/inicio/top.png" alt="" width="546" id="top">

            <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
              <tr>
                <td width="76%" align="center"><h2 class="titulo"><font color="#CC0000">Importar Documentos</font></h2></td>
                <td width="24%"><img src="./img/inicio/login.jpg" width="94" height="89" /></td>
              </tr>
            </table>
            
          </td>
        </tr>

        <tr>
          <td align="left">&nbsp;</td>
          <td align="left"><label class="subtexto"><font color="#005199">Número Proyecto <font color="red">*</font></label></td>
          <td align="left">
            <select name="selCodProyecto" id="selCodProyecto" class="" style="width: 250px;">
              <?php 
								foreach($arProyecto as $indice => $valor){
									if($selCodProyecto==$indice){ 
										echo "<option value='$indice' selected> ".minusculasInicial($valor)."</option>";
									}else{
										echo "<option value='$indice'> ".minusculasInicial($valor)." </option>";
									}
								} 
              ?>
            </select>
            <span id="status"></span>
          </td>
        </tr>

        <tr>
          <td width="6%" align="left">&nbsp;</td>
          <td width="26%" align="left"><label class="subtexto"><font color="#005199">Tipo Documento<font color="red">*</font></label></td>
          <td width="68%" align="left">
            <select name="selTipDoc" class="" id="selTipDoc" style="width: 250px;">
            	<option value=''>Seleccione</option>
              <option value='CONTRATO'>Contrato</option>
              <option value='PRORROGA'>Prorroga</option>
              <option value='ADICION'>Adicion</option>
              <option value='SUSPENSION'>Suspension</option>
              <option value='OTROSSI'>OtrosSi</option>
              <option value='CERTIFICADO'>Certificado</option>
              <option value='POLIZA'>Poliza Cump</option>
              <option value='POLIZA_RC'>Poliza RC</option>
            </select>
            <span id="status"></span>
          </td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td width="26%" align="left"><label class="subtexto"><font color="#005199"><strong></strong>Documento<font color="red">*</font></label></td>
          <td width="68%" align="left">
            <input type="file" id="filDoc" name="filDoc" class="" />
            <!--<input type="text" id="txtNomDoc" name="txtNomDoc" class="" style="width: 250px;" value="<?php echo $txtNomPror; ?>"/>-->
            <span id="status"></span>
          </td>
        </tr>
        </tr>

        <tr>
          <td align="left">&nbsp;</td>
          <td width="26%" align="left"><label class="subtexto"><font color="#005199">Descripción<font color="red">*</font></label></td>
          <td width="68%" align="left">
            <input type="text" id="txtDescripDoc" name="txtDescripDoc" style="width: 250px;" value=""/>
            <span id="status"></span>
          </td>                                  
        <tr>
          <td align="left">&nbsp;</td>
          <td height="31" align="left">&nbsp;</td>
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