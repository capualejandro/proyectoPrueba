<?php

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title></title>
	<script type="text/javascript" src="../scripts/modulo/consultas/lib/reporteFacturado.js"></script>
</head>

<body>

	<h2 class="titulo" align="center">Reporte Facturado <?php echo "Proyecto ".$codProyecto; ?></h2>

  <div id="filtros">
    <form id="frmListadoProyectos" name="frmListadoProyectos" method="POST">
      <input type="hidden" id="hidCodProyecto" name="hidCodProyecto" value="<?php echo $codProyecto; ?>">
      <label class="subtexto"><font FACE="arial" zice="5" color="#005199">Moneda:</font></label>
      <select id="selMoneda">
        <option value="" selected="selected">Pesos</option>
        <option value="euro">Euros</option>
      </select>
      <input type="button" name="btnFiltrar" id="btnFiltrar" class="boton" value="Filtrar"/>
    </form>
  </div>


<div id="pesos">
  <table cellspacing="0" cellpadding="5" border="0" width="100%" class="subtexto" id="datos">
  	<tr><td>

      <table cellspacing="0" cellpadding="5" border="1" width="100%" class="subtexto" id="datos" align="center">
        <tr align="center" bgcolor="#E9E9E9">
          <td width="9%"><strong><font FACE="arial" zice="5" color="#005199">N° de Factura</font></strong></td>
          <td width="10%"><strong><font FACE="arial" zice="5" color="#005199">Periodo Facturado</font></strong></td>
          <td width="10%"><strong><font FACE="arial" zice="5" color="#005199">Fecha Facturacion</font></strong></td>
          <td width="9%"><strong><font FACE="arial" zice="5" color="#005199">Valor Basico</font></strong></td>
          <td width="7%"><strong><font FACE="arial" zice="5" color="#005199">Iva</font></strong></td>
          <td width="9%"><strong><font FACE="arial" zice="5" color="#005199">Total</font></strong></td>
          <td width="8%"><strong><font FACE="arial" zice="5" color="#005199">Facturación Acumulada</font></strong></td>
          <td width="9%"><strong><font FACE="arial" zice="5" color="#005199">Fecha de Pago</font></strong></td>
          <td width="9%"><strong><font FACE="arial" zice="5" color="#005199">Valor del Pago</font></strong></td>
          <td width="10%"><strong><font FACE="arial" zice="5" color="#005199">Pago Acumulado</font></strong></td>
          <td width="10%"><strong><font FACE="arial" zice="5" color="#005199">Dias Factura vs Pago</font></strong></td>
        </tr>

<?php
			for($i=0; $i<count($arAnticipo); $i++){
				$valIva=$arAnticipo[$i][3]*($arAnticipo[$i][4]/100);
				$antFacAcumulada+=$arAnticipo[$i][5];
				$antPagAcumulada+=$arAnticipo[$i][8];
				
				$valBasicoAnt+=$arAnticipo[$i][3];
				$valAnticipo+=$arAnticipo[$i][5];
?>
        <tr>
          <td width="9%"><?php echo $arAnticipo[$i][1]; ?></td>
          <td width="10%" align="center"><?php echo "ANTICIPO"; ?></td>
          <td width="10%" align="center"><?php echo fecha_texto2($arAnticipo[$i][2]); ?></td>
          <td width="9%" align="right"><?php echo "$ ".numero($arAnticipo[$i][3],0); ?></td>
          <td width="7%" align="right"><?php echo "$ ".numero($valIva,0); ?></td>
          <td width="9%" align="right"><?php echo "$ ".numero($arAnticipo[$i][5],0); ?></td>
          <td width="8%" align="right"><?php echo "$ ".numero($antFacAcumulada,0); ?></td>
          <td width="9%"><?php echo fecha_texto2($arAnticipo[$i][7]); ?></td>
          <td width="9%" align="right"><?php echo "$ ".numero($arAnticipo[$i][8],0); ?></td>
          <td width="10%" align="right"><?php echo "$ ".numero($antPagAcumulada,0); ?></td>
          <td width="10%" align="right"><?php echo diferencia_dias($arAnticipo[$i][7],$arAnticipo[$i][2]) ?></td>
        </tr>
<?php

			}
?>

        
<?php
			$facAcumulada=$antFacAcumulada;
			$pagAcumulada=$antPagAcumulada;
			for($i=0; $i<count($arFacturacion); $i++){
				$iva=$arFacturacion[$i][7]*($arFacturacion[$i][8]/100);
				$facAcumulada+=$arFacturacion[$i][9];
				$pagAcumulada+=$arFacturacion[$i][11];
				
				$valBasico+=$arFacturacion[$i][7];
				$valTotIva+=$iva;
				$totFactur+=$arFacturacion[$i][9];
				$totFacAcu+=$arFacturacion[$i][9];
?>
        <tr>
          <td width="9%"><?php echo $arFacturacion[$i][1]; ?></td>
          <td width="10%" align="center"><?php echo fecha_texto2($arFacturacion[$i][5])." - ".fecha_texto2($arFacturacion[$i][6]); ?></td>
          <td width="10%" align="center"><?php echo fecha_texto2($arFacturacion[$i][4]); ?></td>
          <td width="9%" align="right"><?php echo "$ ".numero($arFacturacion[$i][7],0); ?></td>
          <td width="7%" align="right"><?php echo "$ ".numero($iva,0); ?></td>
          <td width="9%" align="right"><?php echo "$ ".numero($arFacturacion[$i][9],0); ?></td>
          <td width="8%" align="right"><?php echo "$ ".numero($facAcumulada,0); ?></td>
          <td width="9%"><?php echo fecha_texto2($arFacturacion[$i][10]); ?></td>
          <td width="9%" align="right"><?php echo "$ ".numero($arFacturacion[$i][11],0); ?></td>
          <td width="10%" align="right"><?php echo "$ ".numero($pagAcumulada,0); ?></td>
          <td width="10%" align="right"><?php echo diferencia_dias($arFacturacion[$i][10],$arFacturacion[$i][4]) ?></td>
        </tr>
<?php
				$totFacAcum+=$facAcumulada;
				$totPagAcum+=$pagAcumulada;
			}
			$valBasico+=$valBasicoAnt;
			$valTotIva+=$valIva;
			$totFactur+=$valAnticipo;
			$totFacAcum+=$antFacAcumulada;
?>
        <tr>
        	<td colspan="3" align="center"><strong>TOTALES</strong></td>
          <td align="right"><strong><?php echo "$ ".numero($valBasico,0); ?></strong></td>
          <td align="right"><strong><?php echo "$ ".numero($valTotIva,0); ?></strong></td>
          <td align="right"><strong><?php echo "$ ".numero($totFactur,0); ?></strong></td>
          <td align="right"><strong><?php echo "$ ".numero($totFacAcum,0); ?></strong></td>
          <td align="right">&nbsp;</td>
          <td align="right"><strong><?php echo "$ ".numero($pagAcumulada,0); ?></strong></td>
          <td align="right"><strong><?php echo "$ ".numero($totPagAcum,0); ?></strong></td>
          <td align="right">&nbsp;</td>
        </tr>
      </table>
      
<?php
	if(count($arFactAnulada)>0){	
?>
			<br>
    	<table cellspacing="0" cellpadding="5" border="1" class="subtexto" id="anul">
      	<tr align="center" bgcolor="#E9E9E9">
        	<td width="0%" colspan="3"><strong><font FACE="arial" zice="5" color="#005199">Facturas Anuladas/font</strong><></td>
        </tr>
        <tr align="center" bgcolor="#E9E9E9">
          <td width="0%"><strong><font FACE="arial" zice="5" color="#005199">N° de Factura</font></strong></td>
          <td width="0%"><strong><font FACE="arial" zice="5" color="#005199">Fecha Facturacion</font></strong></td>
          <td width="0%"><strong><font FACE="arial" zice="5" color="#005199">Valor Basico</font></strong></td>
        </tr>
<?php
		for($i=0; $i<count($arFactAnulada); $i++){
?>
        <tr>
          <td width="0%"><?php echo $arFactAnulada[$i][1]; ?></td>
          <td width="0%"><?php echo fecha_texto2($arFactAnulada[$i][4]); ?></td>
          <td width="0%"><?php echo "$ ".numero($arFactAnulada[$i][7],0); ?></td>
        </tr>
<?php
		}
	}
?>
      </table>

			<br>
    	<table cellspacing="0" cellpadding="5" border="1" class="subtexto" id="fact">
      	<tr>
        	<td width="9%"><strong><font FACE="arial" zice="5" color="#005199">Valor Contrato Inicial Sin IVA</font></strong></td>
          <td align="right"><strong><?php echo "$ ".numero($proValSinIva,0); ?></strong></td>
        </tr>
      	<tr>
        	<td tdwidth="9%"><strong><font FACE="arial" zice="5" color="#005199">Valor Prorrogas Sin IVA</font></strong></td>
          <td align="right"><strong><?php echo "$ ".numero($valAdiSinIva,0); ?></strong></td>
        </tr>
      	<tr>
      	  <td width="9%"><strong><font FACE="arial" zice="5" color="#005199">Valor Adiciones Sin IVA</font></strong></td>
      	  <td align="right"><strong><?php echo "$ ".numero($valAdi1SinIva,0); ?></strong></td>
    	  </tr>
      	<tr>
        	<td width="9%"><strong><font FACE="arial" zice="5" color="#005199">% Ejecutado Del Contrato A La Fecha</font></strong></td>
          <td align="right"><strong><?php echo "% ".numero($porEjeAFec,2); ?></strong></td>
        </tr>
      </table>
    
    </td></tr>
	</table>
</div>

<div id="euro" style="display:none">
  <table cellspacing="0" cellpadding="5" border="0" width="100%" class="subtexto" id="datos">
  	<tr><td>

      <table cellspacing="0" cellpadding="5" border="1" width="100%" class="subtexto" id="datos">
        <tr align="center" bgcolor="#E9E9E9">
          <td width="0%"><strong><font FACE="arial" zice="5" color="#005199">N° de Factura</strong></font></td>
          <td width="0%"><strong><font FACE="arial" zice="5" color="#005199">Periodo Facturado</strong></font></td>
          <td width="0%"><strong><font FACE="arial" zice="5" color="#005199">Fecha Facturacion</strong></font></td>
          <td width="0%"><strong><font FACE="arial" zice="5" color="#005199">Valor Basico</strong></font></td>
          <td width="0%"><strong><font FACE="arial" zice="5" color="#005199">Iva</strong></font></td>
          <td width="0%"><strong><font FACE="arial" zice="5" color="#005199">Total</strong></font></td>
          <td width="0%"><strong><font FACE="arial" zice="5" color="#005199">Facturación Acumulada</strong></font></td>
          <td width="0%"><strong><font FACE="arial" zice="5" color="#005199">Fecha de Pago</strong></font></td>
          <td width="0%"><strong><font FACE="arial" zice="5" color="#005199">Valor del Pago</strong></font></td>
          <td width="0%"><strong><font FACE="arial" zice="5" color="#005199">Pago Acumulado</strong></font></td>
          <td width="0%"><strong><font FACE="arial" zice="5" color="#005199">Dias Factura vs Pago</strong></font></td>
        </tr>

<?php
			$valEuro=divisas('EUR');
			for($i=0; $i<count($arAnticipo); $i++){
				$valIva=$arAnticipo[$i][3]*($arAnticipo[$i][4]/100);
				$antFacAcumulada+=$arAnticipo[$i][5];
				$antPagAcumulada+=$arAnticipo[$i][8];
				
				$valBasicoAnt+=$arAnticipo[$i][3];
				$valAnticipo+=$arAnticipo[$i][5];
?>
        <tr>
          <td width="0%"><?php echo $arAnticipo[$i][1]; ?></td>
          <td width="0%" align="center"><?php echo "ANTICIPO"; ?></td>
          <td width="0%" align="center"><?php echo fecha_texto2($arAnticipo[$i][2]); ?></td>
          <td width="0%" align="right"><?php echo "€ ".numero($arAnticipo[$i][3]/$valEuro,2); ?></td>
          <td width="0%" align="right"><?php echo "€ ".numero($valIva/$valEuro,2); ?></td>
          <td width="0%" align="right"><?php echo "€ ".numero($arAnticipo[$i][5]/$valEuro,2); ?></td>
          <td width="0%" align="right"><?php echo "€ ".numero($antFacAcumulada/$valEuro,2); ?></td>
          <td width="0%"><?php echo fecha_texto2($arAnticipo[$i][7]); ?></td>
          <td width="0%" align="right"><?php echo "€ ".numero($arAnticipo[$i][8]/$valEuro,2); ?></td>
          <td width="0%" align="right"><?php echo "€ ".numero($antPagAcumulada/$valEuro,2); ?></td>
          <td width="0%" align="right"><?php echo diferencia_dias($arAnticipo[$i][7],$arAnticipo[$i][2]) ?></td>
        </tr>
<?php

			}
?>

        
<?php
			$facAcumulada=$antFacAcumulada;
			$pagAcumulada=$antPagAcumulada;
			for($i=0; $i<count($arFacturacion); $i++){
				$iva=$arFacturacion[$i][7]*($arFacturacion[$i][8]/100);
				$facAcumulada+=$arFacturacion[$i][9];
				$pagAcumulada+=$arFacturacion[$i][11];
				
				$valBasico+=$arFacturacion[$i][7];
				$valTotIva+=$iva;
				$totFactur+=$arFacturacion[$i][9];
				$totFacAcu+=$arFacturacion[$i][9];
?>
        <tr>
          <td width="0%"><?php echo $arFacturacion[$i][1]; ?></td>
          <td width="0%" align="center"><?php echo fecha_texto2($arFacturacion[$i][5])." - ".fecha_texto2($arFacturacion[$i][6]); ?></td>
          <td width="0%" align="center"><?php echo fecha_texto2($arFacturacion[$i][4]); ?></td>
          <td width="0%" align="right"><?php echo "€ ".numero($arFacturacion[$i][7]/$valEuro,2); ?></td>
          <td width="0%" align="right"><?php echo "€ ".numero($iva/$valEuro,2); ?></td>
          <td width="0%" align="right"><?php echo "€ ".numero($arFacturacion[$i][9]/$valEuro,2); ?></td>
          <td width="0%" align="right"><?php echo "€ ".numero($facAcumulada,0); ?></td>
          <td width="0%"><?php echo fecha_texto2($arFacturacion[$i][10]); ?></td>
          <td width="0%" align="right"><?php echo "€ ".numero($arFacturacion[$i][11]/$valEuro,2); ?></td>
          <td width="0%" align="right"><?php echo "€ ".numero($pagAcumulada/$valEuro,2); ?></td>
          <td width="0%" align="right"><?php echo diferencia_dias($arFacturacion[$i][10],$arFacturacion[$i][4]) ?></td>
        </tr>
<?php
				$totFacAcum+=$facAcumulada;
				$totPagAcum+=$pagAcumulada;
			}
			$valBasico+=$valBasicoAnt;
			$valTotIva+=$valIva;
			$totFactur+=$valAnticipo;
			$totFacAcum+=$antFacAcumulada;
?>
        <tr>
        	<td colspan="3" align="center"><strong>TOTALES</strong></td>
          <td align="right"><strong><?php echo "€ ".numero($valBasico/$valEuro,2); ?></strong></td>
          <td align="right"><strong><?php echo "€ ".numero($valTotIva/$valEuro,2); ?></strong></td>
          <td align="right"><strong><?php echo "€ ".numero($totFactur/$valEuro,2); ?></strong></td>
          <td align="right"><strong><?php echo "€ ".numero($totFacAcum/$valEuro,2); ?></strong></td>
          <td align="right">&nbsp;</td>
          <td align="right"><strong><?php echo "€ ".numero($pagAcumulada/$valEuro,2); ?></strong></td>
          <td align="right"><strong><?php echo "€ ".numero($totPagAcum/$valEuro,2); ?></strong></td>
          <td align="right">&nbsp;</td>
        </tr>
      </table>
      
<?php
	if(count($arFactAnulada)>0){	
?>
			<br>
    	<table cellspacing="0" cellpadding="5" border="1" class="subtexto" id="anul">
      	<tr align="center" bgcolor="#E9E9E9">
        	<td width="0%" colspan="3"><strong><font FACE="arial" zice="5" color="#005199">Facturas Anuladas</strong></font></td>
        </tr>
        <tr align="center" bgcolor="#E9E9E9">
          <td width="0%"><strong><font FACE="arial" zice="5" color="#005199">N° de Factura</strong></font></td>
          <td width="0%"><strong><font FACE="arial" zice="5" color="#005199">Fecha Facturacion</strong></font></td>
          <td width="0%"><strong><font FACE="arial" zice="5" color="#005199">Valor Basico</strong></font></td>
        </tr>
<?php
		for($i=0; $i<count($arFactAnulada); $i++){
?>
        <tr>
          <td width="0%"><?php echo $arFactAnulada[$i][1]; ?></td>
          <td width="0%"><?php echo fecha_texto2($arFactAnulada[$i][4]); ?></td>
          <td width="0%"><?php echo "€ ".numero($arFactAnulada[$i][7]/$valEuro,2); ?></td>
        </tr>
<?php
		}
	}
?>
      </table>

			<br>
    	<table cellspacing="0" cellpadding="5" border="1" class="subtexto" id="fact">
      	<tr>
        	<td width="9%"><strong><font FACE="arial" zice="5" color="#005199">Valor Contrato Inicial Sin IVA</strong></font></td>
          <td align="right"><strong><?php echo "€ ".numero($proValSinIva/$valEuro,2); ?></strong></td>
        </tr>
      	<tr>
        	<td width="9%"><strong><font FACE="arial" zice="5" color="#005199">Valor Prorrogas Sin IVA</font></td>
          <td align="right"><strong><?php echo "€ ".numero($valAdiSinIva/$valEuro,2); ?></strong></td>
        </tr>
      	<tr>
      	  <td width="9%"><strong><font FACE="arial" zice="5" color="#005199">Valor Adiciones Sin IVA</strong></font></td>
      	  <td align="right"><strong><?php echo "€ ".numero($valAdi1SinIva/$valEuro,2); ?></strong></td>
    	  </tr>
      	<tr>
        	<td width="9%"><strong><font FACE="arial" zice="5" color="#005199">% Ejecutado Del Contrato A La Fecha</strong></font></td>
          <td align="right"><strong><?php echo "% ".numero($porEjeAFec,2); ?></strong></td>
        </tr>
      </table>
    
    </td></tr>
	</table>
</div>

</body>
</html>