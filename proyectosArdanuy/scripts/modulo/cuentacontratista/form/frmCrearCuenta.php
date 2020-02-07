<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Facturacion</title>

	<script type="text/javascript" src="../scripts/modulo/cuentacontratista/lib/crearCuenta.js"></script>

</head>

<body>

 	<div>  
        <form id="frmCrearCuenta" name="frmCrearCuenta" method="post">
        	<input type="hidden" id="txtBandera" name="txtBandera" value="" class=""/>
        	<table cellpading="5" cellspacing="0" align="center" width="43%">
                <tr>
                  <td colspan="3" class="subtexto">
                    <img src="./img/inicio/top.png" alt="" width="546" id="top">
                    <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
                      <tr>
                        <td width="76%" align="center"><h2 class="titulo"><font color="#CC0000">Crear Cuenta de Cobro y/o Factura</font></h2></td>
                        <td width="24%"><img src="./img/inicio/login.jpg" width="94" height="89" /></td>
                      </tr>
                    </table>
                    
                  </td>
                </tr>

                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="right"><label class="subtexto">Número Proyecto <font color="red">*</font></label></td>
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
                    <td width="6%" align="left">&nbsp;</td>
                    <td width="24%" align="right"><label class="subtexto">Numero de Cuenta de Cobro y/o Factura<font color="red">*</font></label></td>
                    <td width="70%" align="left">
                        <input type="text" id="txtNumCuent" name="txtNumCuent" class="" style="width: 250px;" value="<?php echo $txtNumCuent; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="right"><label class="subtexto">Contratista<font color="red">*</font></label></td>
                  <td align="left"><span id="status2"></span>
                    <select name="selContrTipoIdent" id="selContrTipoIdent" class="" style="width: 250px;" />
                    <span id="status2"></span>
                  </td>
                </tr>
<!--
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"><span class="subtexto">Identificación Contratista<font color="red">*</font></span></td>
                  <td align="left"><input type="text" id="txtContrIdentif" name="txtContrIdentif" style="width: 250px;" value="<?php echo $txtContrIdentif; ?>" /></td>
                </tr>
-->
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="24%" align="right"><label class="subtexto">Fecha Emision<font color="red">*</font></label></td>
                    <td width="70%" align="left">
                        <input type="text" id="txtFecEmiCuent" name="txtFecEmiCuent" style="width: 250px;" value="<?php echo $txtFecEmiCuent; ?>" readonly/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="right"><label class="subtexto">Valor Cuenta<font color="red">*</font></label></td>
                  <td align="left"><input type="text" id="txtValCuent" name="txtValCuent" class="" style="width: 250px;" value="<?php echo $txtValCuent; ?>"/>
                    <span id="status3"></span></td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="right"><span class="subtexto">Descripción de la Cuenta y/o factura<font color="red">*</font></span></td>
                  <td align="left"><input type="text" id="txtDescCuent" name="txtDescCuent" class="" style="width: 250px;" value="<?php echo $txtDescCuent; ?>"/></td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                    <td width="24%" align="right"><label class="subtexto">Fecha Pago<font color="red">*</font></label></td>
                    <td width="70%" align="left">
                        <input type="text" id="txtFecPagCuent" name="txtFecPagCuent" style="width: 250px;" value="<?php echo $txtFecPagCuent; ?>" readonly/>
                  </span></td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="24%" align="right"><label class="subtexto">Iva <font color="red">*</font></label></td>
                    <td width="70%" align="left">
                        <input type="text" id="txtIvaCuent" name="txtIvaCuent" class="" style="width: 250px;" value="<?php echo $txtIvaCuent; ?>"/>
                        <span id="status"></span>
                    </td>               
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="right"><label class="subtexto">Retención de la Fuente<font color="red">*</font></label></td>
                  <td align="left"><input type="text" id="txtRetCuent" name="txtRetCuent" class="" style="width: 250px;" value="<?php echo $txtRetCuent; ?>"/>
                    <span id="status4"></span></td>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="right"><label class="subtexto">Reteica<font color="red">*</font></label></td>
                  <td align="left"><input type="text" id="txtReteicaCuent" name="txtReteicaCuent" class="" style="width: 250px;" value="<?php echo $txtReteicaCuent; ?>"/>
                    <span id="status5"></span></td>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="right"><label class="subtexto">Total Valor<font color="red">*</font></label></td>
                  <td align="left"><span id="status6">
                    <input type="text" id="txtTotalValCuent" name="txtTotalValCuent" class="" style="width: 250px;" value="<?php echo $txtTotalValCuent; ?>" readonly/>
                  </span></td>
                
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