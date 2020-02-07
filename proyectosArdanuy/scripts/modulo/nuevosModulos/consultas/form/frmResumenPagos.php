<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title></title>

	<script type="text/javascript" src="../scripts/modulo/consultas/lib/resumenPagos.js"></script>

</head>

<body>

	<div id="content">
    <h2 class="titulo" align="center"><font color="#cc0000">Resumen Pagos De Los Proyectos</font></h2>
  	<div id="filtros" align="center">
    	<form id="frmListadoProyectos" name="frmListadoProyectos" method="POST">
        <input type="hidden" id="hidOpc" name="hidOpc" value="">
        <input type="hidden" id="hidCodigo" name="hidCodigo" value="">
        <input type="hidden" id="hidLogin" name="hidLogin" value="">
       <b>
        <label class="subtexto"><font FACE="arial" zice="5" color="#005199">Numero Proyecto:</font></label>
        <input type="text" name="txtNumProyecto" id="txtNumProyecto" size="5" class="subtexto">
        <label class="subtexto"><font FACE="arial" zice="5" color="#005199">Mes:</font></label>
        <select name="selMes" id="selMes">
					<?php foreach($arMeses as $indice => $valor){ ?>
            <option value="<?php echo $indice; ?>"> <?php echo $valor; ?> </option>
          <?php } ?>
        </select>

        <label class="subtexto"><font FACE="arial" zice="5" color="#005199">Año:</font></label>
        <select name="selAno" id="selAno">
				<?php 
          foreach($arFactura as $indice => $valor){ 
						if($selAno==$indice){
              echo "<option value='$indice' selected> ".minusculasInicial($valor)." </option>";
            }else{
              echo "<option value='$indice'> ".minusculasInicial($valor)." </option>";
            }
          } 
        ?>
        </select>
        <label class="subtexto"><font FACE="arial" zice="5" color="#005199">Moneda:</font></label>
        <select name="selMoneda" id="selMoneda">
        	<option value="">Pesos</option>
          <option value="euro">Euros</option>
        </select>
        <label class="subtexto"><font FACE="arial" zice="5" color="#005199">Consolidado:</font></label>
        <select name="selConsolidado" id="selConsolidado">
        	<option value="NO">No</option>
            <option value="SI">Si</option>
        </select>
        <input type="button" name="btnFiltrar" id="btnFiltrar" class="boton" value="Filtrar"/>
        <input type="button" name="btnLimpiar" id="btnLimpiar" class="boton" value="Todos"/>
      </form>
    </div>

   <div id="info1" style="display:block">
    <table align="center" cellspacing="0" color="#00008B" border="1" width="50%" class="subtexto" id="datos">
      <thead class="cabecerasTablas" bgcolor="536CC6" >
        <tr>
         <b>
          <th width="1%" align="center" > <font zice="1" color="#FFFFFF">Numero Proyecto</font></th>
          <th width="10%" align="center"> <font zice="1" color="#FFFFFF">Nombre Proyecto</font></th>
          <th width="1%" align="center"> <font zice="1" color="#FFFFFF">Mes Pago</font></th>
          <th width="1%" align="center"> <font zice="1" color="#FFFFFF">Año Pago</font></th>
          <th width="3%" align="center"> <font zice="1" color="#FFFFFF">Valor Pago</font></th>
         </b> 
        </tr>
      </thead>
    
      <tbody>

      </tbody>
    </table>
   </div>

   <div id="info2" style="display:none">
    <table align="center" cellspacing="0" color="#00008B" border="1" width="50%" class="subtexto" id="datos2">
      <thead class="cabecerasTablas" bgcolor="536CC6" >
        <tr>
         <b>
          <th width="1%" align="center" > <font zice="1" color="#FFFFFF">Numero Proyecto</font></th>
          <th width="10%" align="center"> <font zice="1" color="#FFFFFF">Nombre Proyecto</font></th>
          <th width="3%" align="center"> <font zice="1" color="#FFFFFF">Valor Pago</font></th>
         </b> 
        </tr>
      </thead>
    
      <tbody>

      </tbody>
    </table>
   </div>
   
  </div>

<div id="capa" style="display:none">
</div>

<div>
    <input type="hidden" id="hidTotal" name="hidTotal" value="<?php echo count($arUsu); ?>" class=""/>
</div>

<!--Resultado: <span id="resultado"></span>-->
</body>
</html>
