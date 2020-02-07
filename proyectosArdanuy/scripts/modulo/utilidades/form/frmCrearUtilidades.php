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

	<script type="text/javascript" src="../scripts/modulo/utilidades/lib/utilidades.js"></script>

</head>

<body>

 	<div>  
        <form id="frmCrearUtilidades" name="frmCrearUtilidades" method="post">
        	<input type="hidden" id="txtBandera" name="txtBandera" value="" class=""/>
        	<table cellpading="5" cellspacing="0" align="center" width="43%">
                <tr>
                  <td colspan="3" class="subtexto">
                    <img src="./img/inicio/top.png" alt="" width="546" id="top">
                    <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
                      <tr>
                        <td width="76%" align="center"><h2 class="titulo"><font color="#CC0000">Pagos a Socios</font></h2></td>
                        <td width="24%"><img src="./img/inicio/login.jpg" width="94" height="89" /></td>
                      </tr>
                    </table>
                    
                  </td>
                </tr>

                <tr>
                  <td width="6%" align="left">&nbsp;</td>
                  <td align="left">
                  	<label class="subtexto"><font FACE="arial" zice="5" color="#005199">Número Proyecto</font><font color="red">*</font></label>
                  </td>
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
                      <span id="status"></span>
                  </td>
                </tr>

                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left">
                  	<span class="subtexto"><font FACE="arial" zice="5" color="#005199">Socio</font></span><span class="subtexto"><font color="red">*</font></span>
                  </td>
                  <td align="left">
                    <select name="selCodSocio" id="selCodSocio" class="" style="width: 250px;" />
                    <span id="status"></span>
                  </td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left">
                  	<span class="subtexto"><font FACE="arial" zice="5" color="#005199">Concepto</font></span><span class="subtexto"><font color="red">*</font></span>
                  </td>
                  <td align="left">
                  	<input type="text" id="txtConcepUtilidad" name="txtConcepUtilidad" style="width: 250px;" value="<?php echo $txtConcepUtilidad;?>">
                  </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="29%" align="left"><label class="subtexto"><font FACE="arial" zice="5" color="#005199">Fecha Pago Utilidad</font><font color                     ="red">*</font></label></td>
                    <td width="65%" align="left">
                        <input type="text" id="txtFecUtilidad" name="txtFecUtilidad" style="width: 250px;" value="<?php echo $txtFecUtilidad; ?>" readonly/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="29%" align="left"><label class="subtexto"><font FACE="arial" zice="5" color="#005199">Valor Total Utilidad</font><font                     color="red">*</font></label></td>
                    <td width="65%" align="left">
                        <input type="text" id="txtValTotUtilidad" name="txtValTotUtilidad" style="width: 250px;" value="<?php echo $txtValTotUtilidad; ?>"/>
                        <span id="status"></span>
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