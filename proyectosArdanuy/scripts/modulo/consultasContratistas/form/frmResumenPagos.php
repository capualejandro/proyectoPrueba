<?php
	$caSql = "";
	$caSql = "SELECT YEAR(facturacion.fact_fech_pago) FROM facturacion WHERE facturacion.fact_fech_pago!=0";
#	echo "<pre>$caSql - $txtBandera</pre>"; 
	$arFact = $db->GetArray($caSql);
	$arFactura = array(''=>'Seleccione');
	for($i=0; $i<count($arFact); $i++){
		$arFactura[$arFact[$i][0]] = $arFact[$i][0];
	}
?>

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
        	<option value="">Seleccione</option>
          <option value="1">Enero</option>
          <option value="2">Febrero</option>
          <option value="3">Marzo</option>
          <option value="4">Abril</option>
          <option value="5">Mayo</option>
          <option value="6">Junio</option>
          <option value="7">Julio</option>
          <option value="8">Agosto</option>
          <option value="9">Septiembre</option>
          <option value="10">Octubre</option>
          <option value="11">Noviembre</option>
          <option value="12">Diciembre</option>
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
        <input type="button" name="btnFiltrar" id="btnFiltrar" class="boton" value="Filtrar"/>
        <input type="button" name="btnLimpiar" id="btnLimpiar" class="boton" value="Todos"/>
      </form>
    </div>

    <table align="center" cellspacing="0" color="#00008B" border="1" width="40%" class="subtexto" id="datos">
      <thead class="cabecerasTablas" bgcolor="536CC6" >
        <tr>
         <b>
          <th width="1%" align="center" > <font zice="1" color="#FFFFFF">Numero Proyecto</font></th>
          <th width="10%" align="center"> <font zice="1" color="#FFFFFF">Nombre Proyecto</font></th>
          <th width="3%" align="center"> <font zice="1" color="#FFFFFF">Mes Pago</font></th>
          <th width="1%" align="center"> <font zice="1" color="#FFFFFF">Año Pago</font></th>
          <th width="4%" align="center"> <font zice="1" color="#FFFFFF">Valor Pago</font></th>
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
<!--
<?php
	for($i=0; $i<count($arPro); $i++){
#		echo minusculasInicial($arUsu[$i][3]." ".$arUsu[$i][4])."<br>";
#		if($arUsu[$i][7]=="A") $estado="Activo"; "$ ".trim(numero(($arPro[$i][5]),0));
#		else $estado="Inactivo";
		if (($i % 2) == 1) $bgcolor = "#A6BBC9";
		else $bgcolor = "#FFFFFF";
?>
	  <input type="hidden" id="<?php echo "codigo".$i; ?>" name="<?php echo "codigo".$i; ?>" value="<?php echo $arUsu[$i][0]; ?>">
	  <input type="hidden" id="<?php echo "estado".$i; ?>" name="<?php echo "estado".$i; ?>" value="<?php echo $arUsu[$i][7]; ?>">
	  <tr bgcolor="<?php echo $bgcolor; ?>">
       <td><?php echo $i+1; ?></td>
       <td><?php echo trim($arPro[$i][0]); ?></td>
       <td><?php echo trim($arPro[$i][1]); ?></td>
       <td><?php echo trim($arPro[$i][2]); ?></td>
       <td><?php echo fecha_texto2($arPro[$i][3]); ?></td>
       <td><?php echo fecha_texto2($arPro[$i][4]); ?></td>
       <td>&nbsp;</td>
       <td><?php echo trim($arPro[$i][6])." %"; ?></td>
       <td><?php echo "$ ".trim(numero($arPro[$i][5]),0); ?></td>
       <td>&nbsp;</td>
       <td>&nbsp;</td>
       <td>
         <?php 
#			echo $_SESSION["usu_login"]." ".trim($arPro[$i][9])." ".$_SESSION["usu_tipo"];
			if($_SESSION["usu_tipo"]==1){
		 ?>
           <a id="editar" href="javascript:void(0); mostrar('<?php echo mayusculas($arPro[$i][0]); ?>');">
           <img src="./img/crud/note_edit.png" border="0" /></a>
         <?php 
			}elseif(mayusculas($_SESSION["usu_login"])==trim($arPro[$i][9])){

		 ?>
           <a id="editar" href="javascript:void(0); mostrar('<?php echo mayusculas($arPro[$i][0]); ?>');">
           <img src="./img/crud/note_edit.png" border="0" /></a>
         <?php 
			}
		 ?>
       </td>
      </tr>
<?php
	}
?>

-->