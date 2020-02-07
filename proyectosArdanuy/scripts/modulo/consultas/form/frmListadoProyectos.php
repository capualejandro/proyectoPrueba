<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title></title>

	<script type="text/javascript" src="../scripts/modulo/consultas/lib/listadoProyectos.js"></script>

</head>

<body>

	<div id="content">
    <h2 class="titulo" align="center"><font color="#cc0000">Listado De Proyectos</font></h2>
  	<div id="filtros">
    	<form id="frmListadoProyectos" name="frmListadoProyectos" method="POST">
        <input type="hidden" id="hidOpc" name="hidOpc" value="">
        <input type="hidden" id="hidCodigo" name="hidCodigo" value="">
        <input type="hidden" id="hidLogin" name="hidLogin" value="">
       <b>
        <label class="subtexto"><font FACE="arial" zice="5" color="#005199">Numero Proyecto:</font></label>
        <input type="text" name="txtNumProyecto" id="txtNumProyecto" size="5" class="subtexto"> 
        <label class="subtexto"><font FACE="arial" zice="5" color="#005199">Nombre Proyecto:</font></label>
        <input type="text" name="txtNomProyecto" id="txtNomProyecto" size="25" class="subtexto">
        <label class="subtexto"><font FACE="arial" zice="5" color="#005199">Cliente:</font></label>
        <input type="text" name="txtCliente" id="txtCliente" size="25" class="subtexto" />
        <label class="subtexto"><font FACE="arial" zice="5" color="#005199">Moneda:</font></label>
        <select id="selMoneda">
			<option value="">Pesos</option>
			<option value="euro">Euros</option>
			<option value="dolar">Dolares</option>
        </select>      
        <label class="subtexto"><font FACE="arial" zice="5" color="#005199">Estado:</font></label>
        <select id="selEstado">
			<option value="">Todos</option>
			<option value="activo">Activo</option>
			<option value="termin">Terminado</option>
        </select>
        <input type="button" name="btnFiltrar" id="btnFiltrar" class="boton" value="Filtrar"/>
        <input type="button" name="btnLimpiar" id="btnLimpiar" class="boton" value="Todos"/>
      </form>
    </div>

    <table cellspacing="0" color="#00008B" border="1" width="100%"  class="subtexto" id="datos">
      <thead class="cabecerasTablas" bgcolor="536CC6" >
        <tr>
         <b>
          <th width="1%" height="70" align="center"><font size="2" color="#FFFFFF">#</font></th> 
          <th width="5%" align="center" > <font zice="1" color="#FFFFFF">Numero Proyecto</font></th>
<!--          
          <th width="14%" align="center"> <font zice="1" color="#FFFFFF">Nombre Proyecto</font></th>
          <th width="11%" align="center"> <font zice="1" color="#FFFFFF">Cliente</font></th>
-->          
          <th width="4%" align="center"> <font zice="1" color="#FFFFFF">Fecha Inicial</font></th>
          <th width="4%" align="center"> <font zice="1" color="#FFFFFF">Fecha Final</font></th>
          <th width="5%" align="center"> <font zice="1" color="#FFFFFF">Fecha Final Prorroga</font></th>
          <th width="4%" align="center"> <font zice="1" color="#FFFFFF">Estado</font></th>
          <th width="6%" align="center"> <font zice="1" color="#FFFFFF">% Facturado</font></th>
          <th width="8%" align="center"> <font zice="1" color="#FFFFFF">Valor Contrato Inicial Con Iva</font></th>
          <th width="7%" align="center"> <font zice="1" color="#FFFFFF">Valor Prorrogas Contrato Con Iva</font></th>
          <th width="7%" align="center"> <font zice="1" color="#FFFFFF">Valor Adiciones Con Iva</font></th>
          <th width="8%" align="center"> <font zice="1" color="#FFFFFF">Valor Factura A La Fecha Con Iva</font></th>
          <th width="7%" align="center"> <font zice="1" color="#FFFFFF">Valor Factura Anticipo Con Iva</font></th>
          <th width="8%" align="center"> <font zice="1" color="#FFFFFF">Diferencia</font></th>
          <!--<th width="8%" align="center"> <font zice="1" color="#FFFFFF">Reportes</font></th>-->
         </b> 
        </tr>
      </thead>

    
      <tbody>

      </tbody>

    </table>
  </div>

<div id="capa" style="display:none">
</div>

<div>
    <input type="hidden" id="hidTotal" name="hidTotal" value="<?php echo count($arUsu); ?>" class=""/>
</div>

<!--Resultado: <span id="resultado"></span>-->
</body>
</html>

