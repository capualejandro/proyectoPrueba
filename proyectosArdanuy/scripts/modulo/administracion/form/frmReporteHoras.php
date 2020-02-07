<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Facturacion</title>

	<script type="text/javascript" src="../scripts/modulo/administracion/lib/reporteHoras.js"></script>

</head>

<body>

 <div>  
   <form id="frmReporteHoras" name="frmReporteHoras" method="post">
    <input type="hidden" id="txtBandera" name="txtBandera" value="" class=""/>
    <table cellpading="5" cellspacing="0" align="center" width="43%">
      <tr>
        <td colspan="3" class="subtexto">
          <img src="./img/inicio/top.png" alt="" width="546" id="top">
          <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
            <tr>
              <td width="76%" align="center"><h2 class="titulo"><font color="#CC0000">Consultar Fecha</font></h2></td>
              <td width="24%"><img src="./img/inicio/login.jpg" width="94" height="89" /></td>
            </tr>
          </table>
        </td>
      </tr>

      <tr>
        <td width="6%" align="left">&nbsp;</td>
        <td width="24%" align="right"><label class="subtexto">Fecha <font color="red">*</font></label></td>
        <td width="70%" align="left">
          <input type="text" id="txtFecha" name="txtFecha" style="width: 140px;" value="<?php echo $txtFecha; ?>" readonly/>
          <span id="status"></span>
        </td>
      </tr>

      <tr>
        <td align="left">&nbsp;</td>
        <td height="31" align="left">&nbsp;</td>
        <td align="left">
          <input type="button" name="enviar" id="enviar" class="boton" value="Consutar"/>
          <input type="button" name="limpiar" id="limpiar" class="boton" value="Limpiar"/>
         </td>
      </tr>

      <tr>
        <td colspan="3" class="subtexto">
        	<font color="#005199">Los campos con </font><font color="red">*</font><font color="#005199">son obligatorios.</font>
        </td>
      </tr>

      <tr>
        <td colspan="3" class="subtexto"><img id="bottom" src="./img/inicio/bottom.png" alt="" width="546"></td>
      </tr>
          
    </table>
      
   </form>
 </div>

 </br>
 <div id="capa" style="display:none" align="center"></div>

</body>
</html>