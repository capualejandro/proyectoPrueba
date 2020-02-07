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

<title>Adiciones</title>

  <script type="text/javascript" src="../scripts/modulo/adiciones/lib/adicion.js"></script>

</head>

<body>

 	<div>  
        <form id="frmCrearAdicion" name="frmCrearAdicion" method="post">
        	<input type="hidden" id="txtBandera" name="txtBandera" value="" class=""/>
            <input type="hidden" id="txtProFechFin" name="txtProFechFin" value="" class=""/>
        	<table cellpading="5" cellspacing="0" align="center" width="43%">
                <tr>
                  <td colspan="3" class="subtexto"> 
                    <img src="./img/inicio/top.png" alt="" width="546" id="top">
                    <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
                      <tr>
                        <td width="76%" align="center"><h2 class="titulo"><font color="#CC0000">Crear Adiciones</font></h2></td>
                        <td width="24%"><img src="./img/inicio/login.jpg" width="94" height="89" /></td>
                      </tr>
                    </table>
                    
                  </td>
                </tr>

                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="right"><label class="subtexto"><font color="005199">Número Proyecto</font><font color="red">*</font></label></td>
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
                    <td width="23%" align="right"><label class="subtexto"><font color="005199">Número</font> <font color="red">*</font></label></td>
                    <td width="71%" align="left">
                        <input type="text" id="txtNumPror" name="txtNumPror" class="" style="width: 250px;" value="<?php echo $txtNumAdic; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="23%" align="right"><label class="subtexto"><font color="005199">Nombre</font><font color="red">*</font></label></td>
                    <td width="71%" align="left">
                        <input type="text" id="txtNomPror" name="txtNomPror" class="" style="width: 250px;" value="<?php echo $txtNomAdic; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>

                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="23%" align="right"><label class="subtexto"><font color="005199">Fecha</font><font color="red">*</font></label></td>
                    <td width="71%" align="left">
                        <input type="text" id="txtFecIniAdic" name="txtFecIniAdic" style="width: 250px;" value="<?php echo $txtFecIniAdic; ?>" readonly/>
                        <span id="status"></span>
                    </td>
                </tr>

                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="23%" align="right"><label class="subtexto"><font color="005199">Valor Adición</font><font color="red">*</font></label></td>
                    <td width="71%" align="left">
                        <input type="text" id="txtValAdic" name="txtValAdic" class="" style="width: 250px;" value="<?php echo $txtValAdic; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                
                </tr>
                                
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="right"><span class="subtexto"><font color="005199">IVA</font><font color="red">*</font></span></td>
                  <td align="left"><input type="text" id="txtIvaAdic" name="txtIvaAdic" class="" style="width: 250px;" value="<?php echo $txtIvaAdic; ?>"/></td>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="23%" align="right"><label class="subtexto"><font color="005199">Descripción</font></label></td>
                    <td width="71%" align="left">
                        <input type="text" id="txtDescripPror" name="txtDescripPror" style="width: 250px;" value="<?php echo $txtDescripAdic; ?>"/>
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
</body>
</html>