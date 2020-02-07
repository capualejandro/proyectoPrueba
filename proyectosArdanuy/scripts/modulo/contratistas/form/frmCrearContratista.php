<?php
	#Este codigo es para taer los proyectos creados
	#
	$caSql = "";
	$caSql = "SELECT pro_codigo FROM proyectos";
#	echo "<pre>$caSql - $txtBandera</pre>"; 
	$arProy = $db->GetArray($caSql);
	$arProyecto = array(''=>'Seleccione');
	for($i=0; $i<count($arProy); $i++){
		$arProyecto[$arProy[$i][0]] = $arProy[$i][0];
	}

	$caSql = "";
	$caSql = "SELECT cod_pais,nom_pais FROM pais";
#	echo "<pre>$caSql - $txtBandera</pre>"; 
	$arPais = $db->GetArray($caSql);
	$arPaises = array(''=>'Seleccione');
	for($i=0; $i<count($arPais); $i++){
		$arPaises[$arPais[$i][0]] = $arPais[$i][1];
		
	}
	
	$caSql = "";
	$caSql = "SELECT CodIdentif,NombreIdentif FROM tipo_identificacion";
#	echo "<pre>$caSql - $txtBandera</pre>"; 
	$arIden = $db->GetArray($caSql);
	$arIdentif = array(''=>'Seleccione');
	for($i=0; $i<count($arIden); $i++){
		$arIdentif[$arIden[$i][0]] = $arIden[$i][1];
	}
		
	$caSql = "";
	$caSql = "SELECT cod_opc_contrato FROM opcion_contrato";
#	echo "<pre>$caSql - $txtBandera</pre>"; 
	$arContra = $db->GetArray($caSql);
	$arTienContra = array(''=>'Seleccione');
	for($i=0; $i<count($arContra); $i++){
		$arTienContra[$arContra[$i][0]] = $arContra[$i][1];
	}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Contratos</title>

	<script type="text/javascript" src="../scripts/modulo/contratistas/lib/crearContratista.js"></script>

</head>

<body>

 	<div>  
        <form id="frmCrearContratista" name="frmCrearContratista" method="post">
        	<input type="hidden" id="txtBandera" name="txtBandera" value="" class=""/>
            <table cellpading="5" cellspacing="0" align="center" width="43%">
                <tr>
                  <td colspan="3" class="subtexto">
                    <img src="./img/inicio/top.png" alt="" width="546" id="top">
                    <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
                      <tr>
                        <td width="76%" align="center"><h2 class="titulo"><font color="#CC0000">Crear SubContratista</font></h2></td>
                        <td width="24%"><img src="./img/inicio/login.jpg" width="94" height="89" /></td>
                      </tr>
                    </table>
                    
                  </td>
                </tr>

                <tr>
                    <td width="6%" align="left">&nbsp;</td>
                    <td align="left"><label class="subtexto"><font color="#005199">Número Proyecto <font color="red">*</font></label></td>
                    <td align="left">
                    <select name="selCodProyecto" id="selCodProyecto" class="" style="width: 250px;">
                      <?php 
												foreach($arProyecto as $indice => $valor){ 
													if($selCodProyecto==$indice){
														echo "<option value='$indice' selected> ".minusculasInicial($valor)." </option>";
													}else{
														echo "<option value='$indice'> ".minusculasInicial($valor)." </option>";
													}
												} 
											?>
                    </select>
                      <span id="status"></span></td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="26%" align="left"><label class="subtexto"><font color="#005199">Tipo de Identificación Contratista<font color="red">*</font></label></td>
                    <td width="70%" align="left"><span id="status"></span>
                      <select name="selContrTipoIdent" id="selContrTipoIdent" class="" style="width: 250px;">
                        <?php 
                        foreach($arIdentif as $indice => $valor){
                            if($selContrTipoIdent==$indice){ 
                                echo "<option value='$indice' selected> ".trim($valor)."</option>";
                            }else{
                                echo "<option value='$indice'> ".trim($valor)." </option>";
                            }
                        } 
                    ?>
                    </select></td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"><span class="subtexto"><font color="#005199">Identificación Contratista<font color="red">*</font></span></td>
                  <td align="left"><input type="text" id="txtContrIdentif" name="txtContrIdentif" style="width: 250px;" value="<?php echo $txtContrIdentif; ?>" /></td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"><label class="subtexto"><font color="#005199">Nombre Contratista<font color="red">*</font></label></td>
                  <td align="left"><input type="text" id="txtContrNomb" name="txtContrNomb" style="width: 250px;" value="<?php echo $txtContrNomb; ?>" />
                    <span id="status"></span></td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="26%" align="left"><label class="subtexto"><font color="#005199">Dirección<font color="red">*</font></label></td>
                    <td width="70%" align="left">
                        <input type="text" id="txtContrDir" name="txtContrDir" class="" style="width: 250px;" value="<?php echo $txtContrDir; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                
                </tr>
                                
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"><label class="subtexto"><font color="#005199">Pais<font color="red">*</font></label></td>
                  <td align="left">
                    <select name="selContrPais" id="selContrPais" class="" style="width: 250px;">
                    <?php 
                        foreach($arPaises as $indice => $valor){
                            if($selPais==$indice){ 
                                echo "<option value='$indice' selected> ".trim($valor)."</option>";
                            }else{
                                echo "<option value='$indice'> ".trim($valor)." </option>";
                            }
                        } 
                    ?>
                    </select>
                    <span id="status3"></span>
                  </td>
                </tr>
                
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"><label class="subtexto"><font color="#005199">Ciudad<font color="red">*</font></label></td>
                  <td align="left">
                  	<select name="selContrCiudad" id="selContrCiudad" class="" style="width: 250px;" />
                    <!--<input type="text" id="txtCiudCont" name="txtCiudCont" style="width: 250px;" value="<?php echo $txtContrCiud; ?>"/>-->
                    <span id="status2"></span>
                  </td>
                </tr>
                
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="26%" align="left"><label class="subtexto"><font color="#005199">Teléfono<font color="red">*</font></label></td>
                    <td width="70%" align="left">
                        <input type="text" id="txtContrTel" name="txtContrTel" style="width: 250px;" value="<?php echo $txtContrTel; ?>"/>
                        <span id="status"></span>
                    </td>
                 </tr>

                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"><span class="subtexto"><font color="#005199">Tiene Contrato<font color="red">*</font></span></td>
                  <td align="left"><select name="selTieneContrato" id="selTieneContrato" class="" style="width: 250px;">
                    <option value="">Seleccione</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                  </select></td>
                </tr>
              <!-- Ingresar Campo del contrato-->
<div id="contrato" style="display:none">
								<tr>
                	<td align="left">&nbsp;</td>
                  <td width="26%" align="left"><label class="subtexto"><font color="#005199">Numero de Contrato<font color="red">*</font></label></td>
                  <td width="70%" align="left">
                    <input type="text" id="txtContraNum" name="txtContraNum" style="width: 250px;" value="<?php echo $txtContraNum; ?>"/>
                    <span id="status"></span>
                  </td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"><span class="subtexto"><font color="#005199">Objeto del Contrato<font color="red">*</font></span></td>
                  <td align="left"><input type="text" id="txtContraObj" name="txtContraObj" class="" style="width: 250px;" value="<?php echo $txtContraObj; ?>"/></td>
                </tr>
</div>
<!-- Ingresar Campo del contrato-->

                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"><span class="subtexto"><font color="#005199">Contrato Periodo</span><font color="red">*</font></td>
                  <td align="left"><span class="subtexto">
                    Desde <input type="text" id="txtFecPeriodo1" name="txtFecPeriodo1" style="width: 85px;" value="<?php echo $txtFecPeriodo1; ?>" readonly/>
                    Hasta <input type="text" id="txtFecPeriodo2" name="txtFecPeriodo2" style="width: 85px;" value="<?php echo $txtFecPeriodo2; ?>" readonly/>
                  </span></td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td width="26%" align="left"><label class="subtexto"><font color="#005199">Valor Contrato<font color="red">*</font></label></td>
                  <td width="70%" align="left"><input type="text" id="txtContraVal" name="txtContraVal" class="" style="width: 250px;" value="<?php echo $txtContraVal; ?>"/>
                    <span id="status"></span></td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td height="31" align="left"><span class="subtexto"><font color="#005199">Descripción Contrato</span></td>
                  <td align="left"><input type="text" id="txtContraDes" name="txtContraDes" class="" style="width: 250px;" value="<?php echo $txtContraDes; ?>"/></td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td height="31" align="left">&nbsp;</td>
                  <td align="left">
                    <input type="button" name="enviar" id="enviar" class="boton" value="Continuar"/>
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
</body>
</html>