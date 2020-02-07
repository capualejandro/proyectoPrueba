<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title></title>

	<script type="text/javascript" src="../scripts/modulo/consultas/lib/listadoDocumentos.js"></script>

</head>

<body>

	<div id="content">
    <h2 class="titulo" align="center">Listado De Proyectos</h2>
  	<div id="filtros" align="center">
    	<form id="frmListadoDocumentos" name="frmListadoDocumentos" method="POST">
        <input type="hidden" id="hidOpc" name="hidOpc" value="">
        <input type="hidden" id="hidCodigo" name="hidCodigo" value="">
        <input type="hidden" id="hidLogin" name="hidLogin" value="">
        <label class="subtexto">Numero Proyecto:</label><input type="text" name="txtNumProyecto" id="txtNumProyecto" size="5" class="subtexto" />
        <label class="subtexto">Nombre Proyecto:</label><input type="text" name="txtNomProyecto" id="txtNomProyecto" size="25" class="subtexto" />
<!--
        <label class="subtexto">Cliente:</label><input type="text" name="txtCliente" id="txtCliente" size="25" class="subtexto" />
        <label class="subtexto">Moneda:</label>
        <select id="selMoneda">
        	<option value="">Pesos</option>
          <option value="euro">Euros</option>
          <option value="dolar">Dolares</option>
        </select>
        <label class="subtexto">Estado:</label>
        <select id="selEstado">
        	<option value="">Todos</option>
          <option value="activo">Activo</option>
          <option value="termin">Terminado</option>
        </select>
-->
        <input type="button" name="btnFiltrar" id="btnFiltrar" class="boton" value="Filtrar"/>
        <input type="button" name="btnLimpiar" id="btnLimpiar" class="boton" value="Todos"/>

      </form>
    </div>

    <table cellspacing="1" cellpadding="5" border="0" width="70%" class="subtexto" id="datos" align="center">
      <thead class="cabecerasTablas" bgcolor="#93D7E0">
        <tr>
          <th width="3%" height="70" align="left">#</th>
          <th width="15%" align="left">Numero Proyecto</th>
          <th width="55%" align="left">Nombre Proyecto</th>
          <th width="12%" align="left">Fecha Inicial</th>
          <th width="15%" align="left">Reportes</th>
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
