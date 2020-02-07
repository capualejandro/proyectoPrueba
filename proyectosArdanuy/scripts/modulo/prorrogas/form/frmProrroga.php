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

<title>Prorrogas</title>

	<script type="text/javascript" src="../scripts/modulo/prorrogas/lib/prorroga.js"></script>

</head>

<body>

 	<div>  
        <form id="frmCrearProrroga" name="frmCrearProrroga" method="post">
        	<input type="hidden" id="txtBandera" name="txtBandera" value="" class=""/>
            <input type="hidden" id="txtProFechFin" name="txtProFechFin" value="" class=""/>
        	<table cellpading="5" cellspacing="0" align="center" width="43%">
                <tr>
                  <td colspan="3" class="subtexto">
                    <img src="./img/inicio/top.png" alt="" width="546" id="top">
                    <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
                      <tr>
                        <td width="76%" align="center"><h2 class="titulo"><font color="#CC0000">Crear Prorrogas</font></h2></td>
                        <td width="24%"><img src="./img/inicio/login.jpg" width="94" height="89" /></td>
                      </tr>
                    </table>
                    
                  </td>
                </tr>

                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="right"><label class="subtexto"><font color="#005199">Número Proyecto <font color="red">*</font></label></td>
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
                    <td width="26%" align="right"><label class="subtexto"><font color="#005199">Número <font color="red">*</font></label></td>
                    <td width="68%" align="left">
                        <input type="text" id="txtNumPror" name="txtNumPror" class="" style="width: 250px;" value="<?php echo $txtNumPror; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="26%" align="right"><label class="subtexto"><font color="#005199">Nombre<font color="red">*</font></label></td>
                    <td width="68%" align="left">
                        <input type="text" id="txtNomPror" name="txtNomPror" class="" style="width: 250px;" value="<?php echo $txtNomPror; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="26%" align="right"><label class="subtexto"><font color="#005199">Fecha Inicio<font color="red">*</font></label></td>
                    <td width="68%" align="left">
                        <input type="text" id="txtFecIniPror" name="txtFecIniPror" style="width: 250px;" value="<?php echo $txtFecIniPror; ?>" readonly/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="26%" align="right"><label class="subtexto"><font color="#005199">Fecha Finalización<font color="red">*</font></label></td>
                    <td width="68%" align="left">
                        <input type="text" id="txtFecFinPror" name="txtFecFinPror" style="width: 250px;" value="<?php echo $txtFecFinPror; ?>" readonly/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="26%" align="right"><label class="subtexto"><font color="#005199">Valor Prorroga<font color="red">*</font></label></td>
                    <td width="68%" align="left">
                        <input type="text" id="txtValPror" name="txtValPror" style="width: 250px;" value="<?php echo $txtValPror; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                               
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="right"><label class="subtexto"><font color="#005199">IVA<font color="red">*</font></span></td>
                  <td align="left"><input type="text" id="txtIvaPror" name="txtIvaPror" style="width: 250px;" value="<?php echo $txtIvaPror; ?>"/></td>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="26%" align="right"><label class="subtexto"><font color="#005199">Descripción</label></td>
                    <td width="68%" align="left">
                        <input type="text" id="txtDescripPror" name="txtDescripPror" style="width: 250px;" value="<?php echo $txtDescripPror; ?>"/>
                        <span id="status"></span>
                    </td>                                  
                <tr>
                  <td align="left">&nbsp;</td>
                  <td height="31" align="left">&nbsp;</td>
                  <td align="left">
                    <input type="button" name="enviar" id="enviar" class="boton" value="Continuar"/>
                    <input type="button" name="limpiar" id="limpiar" class="boton" value="Limpiar"/>
                   </td>
                </tr>
                <tr>
                  <td colspan="3" class="subtexto"><font color="#005199">Los campos con <font color="red">*</font> son obligatorios.<font color="#005199">&nbsp;</font></td>
                </tr>
                <tr>
                  <td colspan="3" class="subtexto"><img id="bottom" src="./img/inicio/bottom.png" alt="" width="546"></td>
                </tr>
            
            </table>
        
        </form>
	</div>
</body>
</html>