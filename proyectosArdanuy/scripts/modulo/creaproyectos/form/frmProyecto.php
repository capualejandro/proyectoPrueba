<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Proyecto</title>

	<script type="text/javascript" src="../scripts/modulo/creaproyectos/lib/proyecto.js"></script>

</head>

<body>

 	<div>  
        <form id="frmCrearProyecto" name="frmCrearProyecto" method="post">
        	<input type="hidden" id="txtBandera" name="txtBandera" value="" class=""/>
        	<table cellpading="5" cellspacing="0" align="center" width="43%">
                <tr>
                  <td colspan="3" class="subtexto">
                    <img src="./img/inicio/top.png" alt="" width="546" id="top">
                    <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
                      <tr>
                        <td width="76%" align="center"><h2 class="titulo"><font color="#CC0000">Crear Proyecto</font></h2></td>
                        <td width="24%"><img src="./img/inicio/login.jpg" width="94" height="89" /></td>
                      </tr>
                    </table>
                    
                  </td>
                </tr>


                <tr>
                    <td width="6%" align="left">&nbsp;</td>
                    <td width="31%" align="right"><label class="subtexto"><font color="#005199">Codigo</font><font color="red">*</font></label></td>
                    <td width="63%" align="left">
                        <input type="text" id="txtCodProy" name="txtCodProy" class="" style="width: 250px;" value="<?php echo $txtCodProy; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="31%" align="right"><label class="subtexto"><font color="#005199">Nombre</font><font color="red">*</font></label></td>
                    <td width="63%" align="left">
                        <input type="text" id="txtNomProy" name="txtNomProy" class="" style="width: 250px;" value="<?php echo $txtNomProy; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="31%" align="right"><label class="subtexto"><font color="#005199">Fecha Inicio</font><font color="red">*</font></label></td>
                    <td width="63%" align="left">
                        <input type="text" id="txtFecIniProy" name="txtFecIniProy" style="width: 250px;" value="<?php echo $txtFecIniProy; ?>" readonly/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="31%" align="right"><label class="subtexto"><font color="#005199">Fecha Finalización</font><font color="red">*</font></label></td>
                    <td width="63%" align="left">
                        <input type="text" id="txtFecFinProy" name="txtFecFinProy" class="" style="width: 250px;" value="<?php echo $txtFecFinProy; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="31%" align="right"><label class="subtexto"><font color="#005199">Jefe Proyecto</font><font color="red">*</font></label></td>
                    <td width="63%" align="left">
                        <input type="text" id="txtCliProy" name="txtCliProy" class="" style="width: 250px;" value="<?php echo $txtCliProy; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="31%" align="right"><label class="subtexto"><font color="#005199">Director Proyecto</font><font color="red">*</font></label></td>
                    <td width="63%" align="left">
                        <input type="text" id="txtDirProy" name="txtDirProy" class="" style="width: 250px;" value="<?php echo $txtDirProy; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="31%" align="right"><label class="subtexto"><font color="#005199">Valor Contrato</font><font color="red">*</font></label></td>
                    <td width="63%" align="left">
                        <input type="text" id="txtValProy" name="txtValProy" class="" style="width: 250px;" value="<?php echo $txtValProy; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="31%" align="right"><label class="subtexto"><font color="#005199">Porcentaje Participación</font><font color="red">*</font></label></td>
                    <td width="63%" align="left">
                        <input type="text" id="txtPorProy" name="txtPorProy" class="" style="width: 250px;" value="<?php echo $txtPorProy; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>

                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="right"><label class="subtexto"><font color="#005199">Porcentaje Anticipo</font><font color="red">*</font></label></td>
                  <td align="left">
                    <input type="text" id="txtPorAntic" name="txtPorAntic" class="" style="width: 250px;" value="<?php echo $txtPorAntic; ?>"/>
                    <span id="status"></span>
                  </td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="right"><span class="subtexto"><font color="#005199">IVA</font><font color="red">*</font></span></td>
                  <td align="left"><input type="text" id="txtPorIva" name="txtPorIva" class="" style="width: 250px;" value="<?php echo $txtPorIva; ?>"/></td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="right"><label class="subtexto"><font color="#005199">Descripción</font></label></td>
                  <td align="left"><input type="text" id="txtDesProy" name="txtDesProy" class="" style="width: 250px;" value="<?php echo $txtDesProy; ?>"/>
                    <span id="status"></span></td>
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
                  <td colspan="3" class="subtexto"><font color="#005199">Los campos con </font> <font color="red">*</font> <font color="#005199">son obligatorios.</font></td>
                </tr>
                <tr>
                  <td colspan="3" class="subtexto"><img id="bottom" src="./img/inicio/bottom.png" alt="" width="546"></td>
                </tr>
            
            </table>
        
        </form>
	</div>
</body>
</html>