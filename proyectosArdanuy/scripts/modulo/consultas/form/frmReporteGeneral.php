
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 
 <title></title>
 
  <script type="text/javascript" src="../scripts/modulo/consultas/lib/reporteGeneral.js"></script>
  <script type="text/javascript" src="../scripts/modulo/consultas/lib/reporteFacturado.js"></script>
  <script type="text/javascript" src="../scripts/modulo/consultas/lib/listadoDocumentos.js"></script>
 
</head>

<body>

	<br><br>
  <table>
  	<tr>
  	  <td><a href="javascript:reporGeneral()" class="boton"><strong>Reporte General</strong></a></td>
      <td><a href="javascript:reporGastos()" class="boton"><strong>Reporte Gastos</strong></a></td>
      <td><a href="javascript:reporFactur()" class="boton"><strong>Reporte Facturación</strong></a></td>
      <td><a href="javascript:reporUtilid()" class="boton"><strong>Reporte Utilidades</strong></a></td>
      <td><a href="javascript:reporFactServProf()" class="boton"><strong>Reporte Fact.Serv.Prof.</strong></a></td>
      <td><a href="javascript:reporContratistas()" class="boton"><strong>Reporte Contratistas</strong></a></td>
  	</tr>
  </table>


<div id="general" style="display:block">
  <h2 class="titulo" align="center"><font color="#cc0000"><?php echo $cont_nomcontratista; ?></font></h2>
  <h2 class="titulo" align="center"><font color="#cc0000">Reporte General <?php echo "Proyecto ".$codProyecto; ?></font></h2>
  <table cellspacing="0" cellpadding="5" border="0" width="950" class="textopequeno" id="datos" align="center">
		<tr>

    <td align="center" colspan="4">
      <table cellspacing="0" cellpadding="5" border="1" width="950" class="textopequeno">
       
        <tr>
        	<td colspan="6">
          	<table cellspacing="0" cellpadding="5" border="1" width="100%" class="textopequeno">
            	<tr>
                <td class="ardanuy" width="8%">N° Proyecto</td><td><?php echo $codProyecto; ?></td>
                <td class="ardanuy">Director Proyecto</td><td><?php echo mayusculaInicial($dirProyecto); ?></td>
                <td class="ardanuy">Jefe del Proyecto</td><td><?php echo mayusculaInicial($jefProyecto); ?></td>
              </tr>
              <tr><td class="ardanuy">Objeto</td><td colspan="5"><?php echo mayusculaInicial($odjProyecto); ?></td></tr>
              <tr>
              	<td class="ardanuy" colspan="2">Nombre Empresa</td><td colspan="2"><?php echo mayusculaInicial($empProyecto); ?></td>
                <td class="ardanuy">Socios</td><td><?php echo $datSocio; ?></td>
              </tr>
            </table>
          </td>
        </tr>
        
        <tr><td bgcolor="#E9E9E9" colspan="7"><strong><font FACE="arial" zice="5" color="#005199">Empresa Contratante</font></strong></td></tr>
        <tr>
        	<td colspan="6">

          	<table cellspacing="0" cellpadding="5" border="1" width="100%" class="textopequeno">
            	<tr>
              	<td class="ardanuy">NIT</td><td><?php echo $nitCliente; ?></td>
                <td class="ardanuy">Nombre</td><td><?php echo mayusculaInicial($nomCliente); ?></td>
                <td class="ardanuy">Dirección</td><td><?php echo mayusculaInicial($dirCliente); ?></td>
              </tr>
            	<tr>
              	<td class="ardanuy">Teléfono</td><td><?php echo $telCliente; ?></td>
                <td class="ardanuy">Pais</td><td><?php echo mayusculaInicial($paiCliente); ?></td>
                <td class="ardanuy">Ciudad</td><td><?php echo mayusculaInicial($ciuCliente); ?></td>
              </tr>
            </table>

          </td>
        </tr>

        <td width="376" colspan="5">
          <table cellspacing="0" cellpadding="4" border="1" class="texto">
            <tr>
              <td class="ardanuy" width="20%">Fecha Contrato</td>
              <td class="ardanuy" width="30%">Ampliaciones del Proyecto</td>
              <td class="ardanuy" width="30%">Adiciones del Proyecto</td>
              <!--<td class="ardanuy">Fecha Suspensión y terminación</td>-->
              </tr>
            <tr>
              <td valign="top">
                <table cellspacing="0" cellpadding="4" border="1" class="texto">
                  <tr><td class="ardanuy">Fecha Inicio</td><td><?php echo $fecIniPro; ?></td></tr>
                  <tr><td class="ardanuy">Fecha Final</td><td><?php echo $fecFinPro; ?></td></tr>
                  <tr><td class="ardanuy">Fecha Final Prorroga</td><td><?php echo $fecFinPror; ?></td></tr>
                  <tr><td class="ardanuy">Plazo Total</td><td><?php echo $plazototal; ?></td></tr>
                  </table>
                </td>
              <td valign="top">
                <table cellspacing="0" cellpadding="5" border="1" class="textopequeno">
                  <tr class="ardanuy">
                    <td width="25%">Fecha Inicio</td><td width="22%">Fecha Fin</td><td width="27%">Valor con IVA</td><td width="26%">Valor Euros Actual</td>
                    </tr>
                  <?php
              #	  $valEuroActual=numero(1/$valEuro,2);
                  for($i=0; $i<count($arProrrogas); $i++){
                   $prorFechIni=$arProrrogas[$i][1];
                   $prorFechFin=$arProrrogas[$i][2];
                   $prorValor=$arProrrogas[$i][3];
                   echo '<tr>';
                   echo '<td>'.fecha_texto2($prorFechIni).'</td>';
                   echo '<td>'.fecha_texto2($prorFechFin).'</td>';
                   echo '<td>$ '.number_format($prorValor,0).'</td>';
                   echo '<td>'.number_format($prorValor/$valEuro,2).' €</td>';
                   echo '</tr>';
                  }
              ?>        
                  </table>
                  <br>
                  <table cellspacing="0" cellpadding="5" border="1" class="texto">
                  		<tr><td colspan="3" class="ardanuy" align="center">Fecha Suspensión y Terminación</td></tr>
                    <tr class="ardanuy">
                      <td>Fecha Inicio</td>
                      <td>Fecha Fin</td>
                      <td>Nombre Documento</td>
                    </tr>
                    <?php
                   for($i=0; $i<count($arSuspensiones); $i++){
                    if($arSuspensiones[$i][2]=='0000-00-00'){
                     $suspFechIni=$arSuspensiones[$i][1];
                    }else{
                     $suspFechIni=fecha_texto2($arSuspensiones[$i][1]);
                    }
                    if($arSuspensiones[$i][2]=='0000-00-00'){
                     $suspFechFin=$arSuspensiones[$i][2];
                    }else{
                     $suspFechFin=fecha_texto2($arSuspensiones[$i][2]);
                    }
                    $suspNombre=$arSuspensiones[$i][3];
                    echo '<tr>';
                    echo '<td>'.$suspFechIni.'</td>';
                    echo '<td>'.$suspFechFin.'</td>';
                    echo '<td>'.$suspNombre.'</td>';
                    echo '</tr>';
                   }
               ?>
                  </table>
                </td>
              <td valign="top">
                <table cellspacing="0" cellpadding="5" border="1" class="textopequeno">
                  <tr class="ardanuy">
                    <td>Fecha Inicio</td><!--<td>Fecha Fin</td>--><td>Valor con IVA</td><td>Valor Euros Actual</td>
                    </tr>
                  <?php
            #				$valEuroActual=numero(1/$valEuro,2);
                $totalAdic=0;
                for($i=0; $i<count($arAdiciones); $i++){
                 $adicFechIni=$arAdiciones[$i][1];
                 $adicFechFin=$arAdiciones[$i][2];
                 $adicValor=$arAdiciones[$i][3];
                 $totalAdic+=$arAdiciones[$i][3];
                 echo '<tr>';
                 echo '<td>'.fecha_texto2($adicFechIni).'</td>';
            #					echo '<td>'.fecha_texto2($adicFechFin).'</td>';
                 echo '<td>$ '.number_format($adicValor,0).'</td>';
                 echo '<td>'.number_format($adicValor/$valEuro,2).' €</td>';
                 echo '</tr>';
                }
                 echo '<tr>';
                 echo '<td>&nbsp;</td>';
                 echo '<td>$ '.number_format($totalAdic).'</td>';
                 echo '<td>'.number_format($totalAdic/$valEuro,2).' €</td>';
                 echo '</tr>';
            ?>        
                  </table>           
                </td>
              
              <!--<td valign="top">&nbsp;</td>-->
              
              </tr>
            </table>
          </td>
      </table>    


      <br>
      <table cellspacing="0" cellpadding="5" border="0" class="textopequeno" width="900">
        <tr>
          <td>
            <table cellspacing="0" cellpadding="5" border="1" class="textopequeno" width="590">
              <tr>
                <td width="144" rowspan="2" bgcolor="#E9E9E9">&nbsp;</td>
                <td colspan="2" align="center" class="ardanuy">No Aplica IVA</td>
                <td colspan="2" align="center" class="ardanuy">Aplica IVA</td>
              </tr>
              <tr class="ardanuy" align="center">
                <td>Pesos</td>
                <td>Euros</td>
                <td>Pesos</td>
                <td>Euros</td>
              </tr>
              <tr>
                <td class="ardanuy">Valor Contrato</td>
                <td width="90" align="right"><?php echo "$ ".numero($valProSinIva,0); ?></td>
                <td width="90" align="right"><?php echo numero($valProSinIva/$valEuro,2)." €"; ?></td>
                <td width="91" align="right"><?php echo "$ ".numero($valProyecto,0); ?></td>
                <td width="91" align="right"><?php echo numero($valProyecto/$valEuro,2)." €"; ?></td>
              </tr>
              <tr>
                <td class="ardanuy">Valor Adiciones</td>
                <td align="right"><?php echo "$ ".numero($valAdiSinIva+($totalAdic/1.16),0); ?></td>
                <td align="right"><?php echo numero(($valAdiSinIva+($totalAdic/1.16))/$valEuro,2)." €"; ?></td>
                <td align="right"><?php echo "$ ".numero($valAdiones+$totalAdic,0); ?></td>
                <td align="right"><?php echo numero(($valAdiones+$totalAdic)/$valEuro,2)." €"; ?></td>
              </tr>

              <tr>
                <td class="ardanuy"><strong>Total Valor Contrato y/o Adiciones</strong></td>
                <td align="right"><strong><?php echo "$ ".numero($totalValorContrato,0); ?></strong></td>
                <td align="right"><strong><?php echo numero($totalValorContrato/$valEuro,2)." €"; ?></strong></td>
                <td align="right"><strong><?php echo "$ ".numero($totalValorContratoIva,0); ?></strong></td>
                <td align="right"><strong><?php echo numero($totalValorContratoIva/$valEuro,2)." €"; ?></strong></td>
              </tr>

              <tr>
                <td class="ardanuy">Valor Anticipo Facturado</td>
                <td align="right"><?php echo "$ ".numero($valAntSinIva,0); ?></td>
                <td align="right"><?php echo numero($valAntSinIva/$valEuro,2)." €"; ?></td>
                <td align="right"><?php echo "$ ".numero($valAnticipo,0); ?></td>
                <td align="right"><?php echo numero($valAnticipo/$valEuro,2)." €"; ?></td>
              </tr>
              <tr>
                <td class="ardanuy">Facturado</td>
                <td align="right"><?php echo "$ ".numero($valFacSinIva,0); ?></td>
                <td align="right"><?php echo numero($valFacSinIva/$valEuro,2)." €"; ?></td>
                <td align="right"><?php echo "$ ".numero($valFactur,0); ?></td>
                <td align="right"><?php echo numero($valFactur/$valEuro,2)." €"; ?></td>
              </tr>
              <tr>
                <td class="ardanuy">Pendiente A Facturar</td>
                <td align="right"><?php echo "$ ".numero($penPorFactuSinIva,0); ?></td>
                <td align="right"><?php echo numero($penPorFactuSinIva/$valEuro,2)." €"; ?></td>
                <td align="right"><?php echo "$ ".numero($penPorFactu,0); ?></td>
                <td align="right"><?php echo numero($penPorFactu/$valEuro,2)." €"; ?></td>
              </tr>
              <tr>
                <td class="ardanuy">Porcentaje Facturado</td>
                <td colspan="2" align="center"><strong><?php echo numero($porFacSinIva,2).' %'; ?></strong></td>
                <td colspan="2" align="center"><strong><?php echo numero($porFac,2).' %'; ?></strong></td>
              </tr>
            </table>
          </td>

          <td valign="top">
          	<table cellspacing="0" cellpadding="5" border="1" class="textopequeno" width="350">
            	<tr>
              	<td class="ardanuy">Seleccione el Tipo de Documento</td>
                <td>
                  <input type="hidden" name="hidCodProyecto" id="hidCodProyecto" value="<?php echo $codProyecto; ?>">
                  <select name="selTipDoc" id="selTipDoc" style="width: 100px;">
                    <option value=''>Seleccione</option>
                    <option value='CONTRATO'>Contrato</option>
                    <option value='PRORROGA'>Prorroga</option>
                    <option value='ADICION'>Adicion</option>
                    <option value='SUSPENSION'>Suspension</option>
                    <option value='OTROSSI'>OtrosSi</option>
                    <option value='CERTIFICADO'>Certificado</option>
                    <option value='POLIZA'>Poliza Cump</option>
                    <option value='POLIZA_RC'>Poliza RC</option>
                  </select>
                  <span id="status"></span>
                </td>
              </tr>
              <tr>
                <td colspan="2"><input type="button" name="btnConsultar" id="btnConsultar" class="boton" value="Consultar"/></td>
              </tr>
            </table>
<!--          </td>-->
<br></td>

        </tr>
      </table>
<br>
      <table cellspacing="0" cellpadding="1" border="0" class="textopequeno" width="566">
      	<tr>
        	<td colspan="2">
            <table cellspacing="0" cellpadding="5" border="1" class="textopequeno" align="center" width="950">
              <tr><td width="549" height="33" align="center" valign="bottom" bgcolor="#E9E9E9"><h3><font FACE="arial" zice="5" color="#005199">SOCIOS</font></h3></td></tr>
            </table>
          </td>
        </tr>
        
<?php
	$cont=0;
	for($i=0; $i<count($arSocio); $i++){
		$nomSocio=trim($arSocio[$i][0]);
		$porSocio=$arSocio[$i][1]/100;
		if($cont==0){
			echo "<tr>";
		}
?>
     <td>
      <table cellspacing="0" cellpadding="5" border="1" class="textopequeno" width="475">
        <tr>
        	<td colspan="8" align="center" class="ardanuy"><?php echo $nomSocio." ".$arSocio[$i][1]." %"; ?></td>
        </tr>
        <tr>
          <td width="145" rowspan="2" align="center" bgcolor="#E9E9E9"><strong><font FACE="arial" zice="5" color="#005199">Valores</font></strong></td>
          <td colspan="2" align="center" bgcolor="#E9E9E9"><strong><font FACE="arial" zice="5" color="#005199">No Aplica IVA</font></strong></td>
          <td colspan="2" align="center" bgcolor="#E9E9E9"><strong><font FACE="arial" zice="5" color="#005199">Aplica IVA</font></strong></td>
        </tr>
        <tr align="center" bgcolor="#E9E9E9">
          <td width="89"><strong><font FACE="arial" zice="5" color="#005199">Pesos</font></strong></td>
          <td width="89"><strong><font FACE="arial" zice="5" color="#005199">Euros</font></strong></td>
          <td width="90"><strong><font FACE="arial" zice="5" color="#005199">Pesos</font></strong></td>
          <td width="91"><strong><font FACE="arial" zice="5" color="#005199">Euros</font></strong></td>
        </tr>
        <tr>
          <td bgcolor="#E9E9E9"><strong><font FACE="arial" zice="5" color="#005199">Valor Contrato</font></strong></td>
          <td width="89" align="right"><?php echo "$ ".numero(($valProSinIva*$porSocio),0); ?></td>
          <td width="89" align="right"><?php echo "€ ".numero(($valProSinIva*$porSocio)/$valEuro,2);#conversor_divisas("COP","EUR",($valProSinIva*$porSocio)); ?></td>
          <td width="90" align="right"><?php echo "$ ".numero($valProyecto*$porSocio,0); ?></td>
          <td width="91" align="right"><?php echo "€ ".numero(($valProyecto*$porSocio)/$valEuro,2);#conversor_divisas("COP","EUR",($valProyecto*$porSocio)); ?></td>
        </tr>
        <tr>
          <td bgcolor="#E9E9E9"><strong><font FACE="arial" zice="5" color="#005199">Valor Adiciones</font></strong></td>
          <td align="right"><?php echo "$ ".numero(($valAdiSinIva+($totalAdic/1.16))*$porSocio,0); ?></td>
          <td align="right"><?php echo "€ ".numero((($valAdiSinIva+($totalAdic/1.16))*$porSocio)/$valEuro,2); ?></td>
          <td align="right"><?php echo "$ ".numero(($valAdiones+$totalAdic)*$porSocio,0); #numero($valAdiones+$totalAdic,0) ?></td>
          <td align="right"><?php echo "€ ".numero((($valAdiones+$totalAdic)*$porSocio)/$valEuro,2);#conversor_divisas("COP","EUR",($valAdiones*$porSocio)); ?></td>
        </tr>
        <tr>
          <td bgcolor="#E9E9E9"><strong><font FACE="arial" zice="5" color="#005199">Valor Anticipo Facturado</font></strong></td>
          <td align="right"><?php echo "$ ".numero($valAntSinIva*$porSocio,0); ?></td>
          <td align="right"><?php echo "€ ".numero(($valAntSinIva*$porSocio)/$valEuro,2);#conversor_divisas("COP","EUR",($valAntSinIva*$porSocio)); ?></td>
          <td align="right"><?php echo "$ ".numero($valAnticipo*$porSocio,0); ?></td>
          <td align="right"><?php echo "€ ".numero(($valAnticipo*$porSocio)/$valEuro,2);#conversor_divisas("COP","EUR",($valAnticipo*$porSocio)); ?></td>
        </tr>
        <tr>
          <td bgcolor="#E9E9E9"><strong><font face="arial" zice="5" color="#005199">Facturado</font></strong></td>
          <td align="right"><?php echo "$ ".numero($valFacSinIva*$porSocio,0); ?></td>
          <td align="right"><?php echo "€ ".numero(($valFacSinIva*$porSocio)/$valEuro,2);#conversor_divisas("COP","EUR",($valFacSinIva*$porSocio)); ?></td>
          <td align="right"><?php echo "$ ".numero($valFactur*$porSocio,0); ?></td>
          <td align="right"><?php echo "€ ".numero(($valFactur*$porSocio)/$valEuro,2);#conversor_divisas("COP","EUR",($valFactur*$porSocio)); ?></td>
        </tr>
        <tr>
          <td bgcolor="#E9E9E9"><strong><font face="arial" zice="5" color="#005199">Pendiente A Facturar</font></strong></td>
          <td align="right"><?php echo "$ ".numero($penPorFactuSinIva*$porSocio,0); ?></td>
          <td align="right"><?php echo "€ ".numero(($penPorFactuSinIva*$porSocio)/$valEuro,2);#conversor_divisas("COP","EUR",($penPorFactuSinIva*$porSocio)); ?></td>
          <td align="right"><?php echo "$ ".numero($penPorFactu*$porSocio,0); ?></td>
          <td align="right"><?php echo "€ ".numero(($penPorFactu*$porSocio)/$valEuro,2);#conversor_divisas("COP","EUR",($penPorFactu*$porSocio)); ?></td>
        </tr>
      </table>
     </td>
<?php
			if($cont==1) {
				echo "</tr>";
				$cont=0;
			}
			$cont++;

		}

?>

</table>
<br>
    </table>

		</td></tr>

</div>

<div id="gastos" style="display:none">
<h2 class="titulo" align="center"><font color="#cc0000"><?php echo $cont_nomcontratista; ?></font></h2>
<h2 class="titulo" align="center"><font color="#cc0000">Flujo de Caja Proyecto <?php echo $codProyecto; ?></font></h2>
<br>

<?php
	$cadSql="DELETE FROM temporal";
	$db->Execute($cadSql);
	$meses=array();
	$ingre=array();
	$gasto=array();
	for($i=0; $i<count($arGastos); $i++){
		$year=trim($arGastos[$i][0]);
		$mont=trim($arGastos[$i][1]);
		$gpro_valor_total=trim(($arGastos[$i][2])/1000000);
		$gpro_fecha=fecha_texto1($arGastos[$i][3]);#"$mont-$year";
		$valFactu=(valorIngFactu($codProyecto,$year,$mont))/1000000;
		$valAnti=valorIngAnticipo($codProyecto,$year,$mont);
		$valTotIng=$valFactu+$valAnti;
		$netoMes=$valTotIng-$gpro_valor_total;
		$arrMeses[]=$gpro_fecha;
		$arrIngre[]=$valFactu;
		$arrGasto[]=$gpro_valor_total;
		$cadSql = "INSERT INTO temporal (codProyecto,meses,ingresos,gastos) VALUES ('$codProyecto','$gpro_fecha',$valFactu,$gpro_valor_total)";
		#echo "$cadSql<br>";
		$db->Execute($cadSql);
		if($netoMes<0) $fuente= '<font color="red">';
		else $fuente= '<font color="">';
	}
#	echo "Sofia ".$valAnti;
#	var_dump($arrGasto);
	
	for($i=0; $i<count($arGastos); $i++){
		$arrYear[trim($arGastos[$i][0])]=trim($arGastos[$i][0]);
	}

?>

  <table width="391" border="1" align="center" class="textopequeno" cellspacing="0">
    <tbody>
    	<tr align="center" bgcolor="#E6E6FA">
      	<td class="ardanuy">Periodo</td>
<?php
	for($i=0; $i<count($arGastos); $i++){
		$year=trim($arGastos[$i][0]);
		$mont=trim($arGastos[$i][1]);
		$gpro_valor_total=trim($arGastos[$i][2]);
		$gpro_fecha=fecha_texto1($arGastos[$i][3]);#"$mont-$year";
		$valFactu=valorIngFactu($codProyecto,$year,$mont);
		$valAnti=valorIngAnticipo($codProyecto,$year,$mont);
		$valTotIng=$valFactu+$valAnti;
		$netoMes=$valTotIng-$gpro_valor_total;
		if($netoMes<0) $fuente= '<font color="red">';
		else $fuente= '<font color="">';
		echo '<td class="ardanuy">'.$gpro_fecha.'</td>';
	}
?>
			<td class="ardanuy">Acumulado</td>
      </tr>      
    	<tr align="center">
        <td class="ardanuy">Ingresos Por Facturación Neto</td>
<?php
	for($i=0; $i<count($arGastos); $i++){
		$year=trim($arGastos[$i][0]);
		$mont=trim($arGastos[$i][1]);
		$gpro_valor_total=trim($arGastos[$i][2]);
		$gpro_fecha=fecha_texto1($arGastos[$i][3]);#"$mont-$year";
		$valFactu=valorIngFactu($codProyecto,$year,$mont);
		$valAnti=valorIngAnticipo($codProyecto,$year,$mont);
		$valTotIng=$valFactu+$valAnti;
		$netoMes=$valTotIng-$gpro_valor_total;
		$valAcumTotIng+=$valTotIng;
		if($netoMes<0) $fuente= '<font color="red">';
		else $fuente= '<font color="">';
		echo '<td align="center" bgcolor="">$ '.numero($valTotIng,2).'</td>';
	}
	echo '<td align="center" bgcolor="">$ '.numero($valAcumTotIng,2).'</td>';
?>
      </tr>      
    	<tr align="center">
        <td class="ardanuy">Gastos</td>
<?php
	for($i=0; $i<count($arGastos); $i++){
		$year=trim($arGastos[$i][0]);
		$mont=trim($arGastos[$i][1]);
		$gpro_valor_total=trim($arGastos[$i][2]);
		$gpro_fecha=fecha_texto1($arGastos[$i][3]);#"$mont-$year";
		$valFactu=valorIngFactu($codProyecto,$year,$mont);
		$valAnti=valorIngAnticipo($codProyecto,$year,$mont);
		$valTotIng=$valFactu+$valAnti;
		$netoMes=$valTotIng-$gpro_valor_total;
		$valAcumGproValTot+=$gpro_valor_total;
		if($netoMes<0) $fuente= '<font color="red">';
		else $fuente= '<font color="">';
		echo '<td align="center" bgcolor="">$ '.numero($gpro_valor_total,2).'</td>';
	}
	echo '<td align="center" bgcolor="">$ '.numero($valAcumGproValTot,2).'</td>';
?>
			</tr>      
    	<tr align="center">
        <td class="ardanuy">Neto Mes</td>
<?php
	for($i=0; $i<count($arGastos); $i++){
		$year=trim($arGastos[$i][0]);
		$mont=trim($arGastos[$i][1]);
		$gpro_valor_total=trim($arGastos[$i][2]);
		$gpro_fecha=fecha_texto1($arGastos[$i][3]);#"$mont-$year";
		$valFactu=valorIngFactu($codProyecto,$year,$mont);
		$valAnti=valorIngAnticipo($codProyecto,$year,$mont);
		$valTotIng=$valFactu+$valAnti;
		$netoMes=$valTotIng-$gpro_valor_total;
		$valAcumNetMes+=$netoMes;
		if($netoMes<0) $fuente= '<font color="red">';
		else $fuente= '<font color="">';
		echo '<td align="center" bgcolor="">'.$fuente.'$ '.numero($netoMes,2).'</font></td>';
	}
	echo '<td align="center" bgcolor="">'.$fuente.'$ '.numero($valAcumNetMes,2).'</font></td>';

	$valTotConSinIva=$proValSinIva+$valAdiSinIva+$valAdi1SinIva;

	$porCaj1=($netoMes/$valTotConSinIva)*100;
	$porCaj2=($valAcumNetMes/$valTotConSinIva)*100;
?>
      </tr>
    	<tr align="center">
        <td class="ardanuy">Total</td>
        <td colspan="<?php echo count($arGastos)-1; ?>">&nbsp;</td>
        <td bgcolor="#E9E9E9"><strong><?php echo numero($porCaj1,1)." %"; ?></strong></td>
      	<td bgcolor="#E9E9E9"><strong><?php echo numero($porCaj2,1)." %"; ?></strong></td>
      </tr>
    </tbody>
  </table>

<br>
  <table border="1" class="textopequeno" cellpadding="5" cellspacing="0">
    <tr class="ardanuy" align="center">
     <td>Socio</td><td>% Participación</td><td>Neto Mes</td><td>Resultado</td>
    </tr>
<?php
	for($i=0; $i<count($arSocio); $i++){
		$nomSocio=trim($arSocio[$i][0]);
		$porSocio=$arSocio[$i][1]/100;
		$resultado=$netoMes*$porSocio;
		echo '<tr><td>'.$nomSocio.'</td>';
		echo '<td align="center">'.$arSocio[$i][1].' %</td>';
		echo '<td> $ '.numero($netoMes,2).'</td>';
		echo '<td> $ '.numero($resultado,2).'</td></tr>';
	}

?>
	</tr>
 </table>

<?php
#	include_once("../scripts/modulo/consultas/bin/graficaFlujoCaja.php");
$enlace="../scripts/lib/index.php?codProyecto=".$codProyecto."&nom=".$cont_nomcontratista;
?>

 <!--<h1>Gráficas en PHP</h1>-->
 <br/>
 <!--<img src="../scripts/modulo/consultas/bin/graficaFlujoCaja.php" />-->
	<center><a href="<?php echo $enlace; ?>" target="_blank">Ver Grafica</a></center>
 <br/>
 <br/>
<!-- 
 <br/>
 <br/>
 <h1>Gráficas en PHP</h1>
 <br/>
 <img src="../scripts/modulo/consultas/bin/graficaFlujoCaja.php" />
-->
</div>


<div id="facturacion" style="display:none" align="center">
	<h2 class="titulo" align="center"><font color="#cc0000"><?php echo $cont_nomcontratista; ?></font></h2>
	<h2 class="titulo" align="center"><font color="#cc0000">Reporte Facturado <?php echo "Proyecto ".$codProyecto; ?></font></h2>

  <div id="filtros" align="center">
    <form id="frmListadoProyectos" name="frmListadoProyectos" method="POST">
      <input type="hidden" id="hidCodProyecto" name="hidCodProyecto" value="<?php echo $codProyecto; ?>">
      <label class="subtexto">Moneda:</label>
      <select id="selMoneda">
        <option value="">Pesos</option>
        <option value="euro">Euros</option>
      </select>
      <input type="button" name="btnFiltrar" id="btnFiltrar" class="boton" value="Filtrar"/>
    </form>
  </div>


<div id="pesos">
  <table cellspacing="0" cellpadding="5" border="0" class="textopequeno" id="datos" align="center">
  	<tr><td>

      <table cellspacing="0" cellpadding="5" border="1" width="97%" class="textopequeno" id="datos" >
        <tr align="center" class="ardanuy">
          <td width="6%">N° de Factura</td>
          <td width="9%">Periodo Facturado</td>
          <td width="8%">Fecha Facturacion</td>
          <td width="10%">Valor Basico</td>
          <td width="8%">Iva</td>
          <td width="8%">Total</td>
          <td width="10%">Facturación Acumulada</td>
          <td width="9%">Fecha de Pago</td>
          <td width="10%">Valor del Pago</td>
          <td width="12%">Pago Acumulado</td>
          <td width="10%">Dias Factura vs Pago</td>
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
          <td width="6%"><?php echo $arAnticipo[$i][1]; ?></td>
          <td width="9%" align="center"><?php echo "ANTICIPOS"; ?></td>
          <td width="8%" align="center"><?php echo fecha_texto2($arAnticipo[$i][2]); ?></td>
          <td width="10%" align="right"><?php echo "$ ".numero($arAnticipo[$i][3],0); ?></td>
          <td width="8%" align="right"><?php echo "$ ".numero($valIva,0); ?></td>
          <td width="8%" align="right"><?php echo "$ ".numero($arAnticipo[$i][5],0); ?></td>
          <td width="10%" align="right"><?php echo "$ ".numero($antFacAcumulada,0); ?></td>
          <td width="9%"><?php echo fecha_texto2($arAnticipo[$i][7]); ?></td>
          <td width="10%" align="right"><?php echo "$ ".numero($arAnticipo[$i][8],0); ?></td>
          <td width="12%" align="right"><?php echo "$ ".numero($antPagAcumulada,0); ?></td>
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
          <td width="6%"><?php echo $arFacturacion[$i][1]; ?></td>
          <td width="9%" align="center"><?php echo fecha_texto2($arFacturacion[$i][5])." - ".fecha_texto2($arFacturacion[$i][6]); ?></td>
          <td width="8%" align="center"><?php echo fecha_texto2($arFacturacion[$i][4]); ?></td>
          <td width="10%" align="right"><?php echo "$ ".numero($arFacturacion[$i][7],0); ?></td>
          <td width="8%" align="right"><?php echo "$ ".numero($iva,0); ?></td>
          <td width="8%" align="right"><?php echo "$ ".numero($arFacturacion[$i][9],0); ?></td>
          <td width="10%" align="right"><?php echo "$ ".numero($facAcumulada,0); ?></td>
          <td width="9%"><?php echo fecha_texto2($arFacturacion[$i][10]); ?></td>

          <td width="10%" align="right"><?php echo "$ ".numero($arFacturacion[$i][11],0); ?></td>
          <td width="12%" align="right"><?php echo "$ ".numero($pagAcumulada,0); ?></td>
          <td width="10%" align="right"><?php echo diferencia_dias($arFacturacion[$i][10],$arFacturacion[$i][4]) ?></td>
        </tr>
<?php
			$totFacAcum+=$facAcumulada;
			$totPagAcum+=$pagAcumulada;
		}
#			$valBasico+=$valBasicoAnt;
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
    	<table cellspacing="0" cellpadding="5" border="1" class="textopequeno" id="anul">
      	<tr align="center" class="ardanuy">
        	<td width="0%" colspan="3">Facturas Anuladas</td>
        </tr>
        <tr align="center" class="ardanuy">
          <td width="0%">N° de Factura</td>
          <td width="0%">Fecha Facturacion</td>
          <td width="0%">Valor Basico</td>
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
    	<table cellspacing="0" cellpadding="5" border="1" class="textopequeno" id="fact">
      	<tr>
        	<td class="ardanuy">Valor Contrato Inicial Sin IVA</td>
          <td align="right"><strong><?php echo "$ ".numero($proValSinIva,0); ?></strong></td>
        </tr>
      	<tr>
        	<td class="ardanuy">Valor Prorrogas Sin IVA</td>
          <td align="right"><strong><?php echo "$ ".numero($valAdiSinIva,0); ?></strong></td>
        </tr>
      	<tr>
      	  <td class="ardanuy">Valor Adiciones Sin IVA</td>
      	  <td align="right"><strong><?php echo "$ ".numero($valAdi1SinIva,0); ?></strong></td>
    	  </tr>
      	<tr>
        	<td class="ardanuy">% Ejecutado Del Contrato A La Fecha</td>
          <td align="right"><strong><?php echo "% ".numero($porEjeAFec,2); ?></strong></td>
        </tr>
      </table>
    
    </td></tr>
	</table>
</div>
<?php
	$valTotConSinIva=$proValSinIva+$valAdiSinIva+$valAdi1SinIva;
#	echo $valTotConSinIva;
?>

<div id="euro" style="display:none">

<table cellspacing="0" cellpadding="5" border="0" class="textopequeno" id="datos" align="center">
  	<tr><td>

      <table cellspacing="0" cellpadding="5" border="1" width="97%" class="textopequeno" id="datos" >
        <tr align="center" class="ardanuy">
          <td width="6%">N° de Factura</td>
          <td width="9%">Periodo Facturado</td>
          <td width="8%">Fecha Facturacion</td>
          <td width="10%">Valor Basico</td>
          <td width="8%">Iva</td>
          <td width="8%">Total</td>
          <td width="10%">Facturación Acumulada</td>
          <td width="9%">Fecha de Pago</td>
          <td width="10%">Valor del Pago</td>
          <td width="12%">Pago Acumulado</td>
          <td width="10%">Dias Factura vs Pago</td>
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
          <td width="6%"><?php echo $arAnticipo[$i][1]; ?></td>
          <td width="9%" align="center"><?php echo "ANTICIPO"; ?></td>
          <td width="8%" align="center"><?php echo fecha_texto2($arAnticipo[$i][2]); ?></td>
          <td width="10%" align="right"><?php echo numero($arAnticipo[$i][3]/$valEuro,2)." €"; ?></td>
          <td width="8%" align="right"><?php echo numero($valIva/$valEuro,2)." €"; ?></td>
          <td width="8%" align="right"><?php echo numero($arAnticipo[$i][5]/$valEuro,2)." €"; ?></td>
          <td width="10%" align="right"><?php echo numero($antFacAcumulada/$valEuro,2)." €"; ?></td>
          <td width="9%"><?php echo fecha_texto2($arAnticipo[$i][7]); ?></td>
          <td width="10%" align="right"><?php echo numero($arAnticipo[$i][8]/$valEuro,2)." €"; ?></td>
          <td width="12%" align="right"><?php echo numero($antPagAcumulada/$valEuro,2)." €"; ?></td>
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
          <td width="0%"><?php echo $arFacturacion[$i][1]; ?></td>
          <td width="0%" align="center"><?php echo fecha_texto2($arFacturacion[$i][5])." - ".fecha_texto2($arFacturacion[$i][6]); ?></td>
          <td width="0%" align="center"><?php echo fecha_texto2($arFacturacion[$i][4]); ?></td>
          <td width="0%" align="right"><?php echo numero($arFacturacion[$i][7]/$valEuro,2)." €"; ?></td>
          <td width="0%" align="right"><?php echo "€ ".numero($iva/$valEuro/$valEuro,2)." €"; ?></td>
          <td width="0%" align="right"><?php echo numero($arFacturacion[$i][9]/$valEuro,2)." €"; ?></td>
          <td width="0%" align="right"><?php echo numero($facAcumulada/$valEuro,2)." €"; ?></td>
          <td width="0%"><?php echo fecha_texto2($arFacturacion[$i][10]); ?></td>
          <td width="0%" align="right"><?php echo numero($arFacturacion[$i][11]/$valEuro,2)." €"; ?></td>
          <td width="0%" align="right"><?php echo numero($pagAcumulada/$valEuro,2)." €"; ?></td>
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
          <td align="right"><strong><?php echo numero($valBasico/$valEuro,2)." €"; ?></strong></td>
          <td align="right"><strong><?php echo numero($valTotIva/$valEuro,2)." €"; ?></strong></td>
          <td align="right"><strong><?php echo numero($totFactur/$valEuro,2)." €"; ?></strong></td>
          <td align="right"><strong><?php echo numero($totFacAcum/$valEuro,2)." €"; ?></strong></td>
          <td align="right">&nbsp;</td>
          <td align="right"><strong><?php echo numero($pagAcumulada/$valEuro,2)." €"; ?></strong></td>
          <td align="right"><strong><?php echo numero($totPagAcum/$valEuro,2)." €"; ?></strong></td>
          <td align="right">&nbsp;</td>
        </tr>
      </table>
      
<?php
	if(count($arFactAnulada)>0){	
?>
			<br>
    	<table cellspacing="0" cellpadding="5" border="1" class="textopequeno" id="anul">
      	<tr align="center" class="ardanuy">
        	<td width="0%" colspan="3">Facturas Anuladas</td>
        </tr>
        <tr align="center" class="ardanuy">
          <td width="0%">N° de Factura</td>
          <td width="0%">Fecha Facturacion</td>
          <td width="0%">Valor Basico</td>
        </tr>
<?php
		for($i=0; $i<count($arFactAnulada); $i++){
?>
        <tr>
          <td width="0%"><?php echo $arFactAnulada[$i][1]; ?></td>
          <td width="0%"><?php echo fecha_texto2($arFactAnulada[$i][4]); ?></td>
          <td width="0%"><?php echo numero($arFactAnulada[$i][7]/$valEuro,2)." €"; ?></td>
        </tr>
<?php
		}
	}
?>

      </table>

			<br>
    	<table cellspacing="0" cellpadding="5" border="1" class="textopequeno" id="fact">
      	<tr>
        	<td class="ardanuy">Valor Contrato Inicial Sin IVA</td>
          <td align="right"><strong><?php echo numero($proValSinIva/$valEuro,2)." €"; ?></strong></td>
        </tr>
      	<tr>
        	<td class="ardanuy">Valor Prorrogas Sin IVA</td>
          <td align="right"><strong><?php echo numero($valAdiSinIva/$valEuro,2)." €"; ?></strong></td>
        </tr>
      	<tr>
      	  <td class="ardanuy">Valor Adiciones Sin IVA</td>
      	  <td align="right"><strong><?php echo numero($valAdi1SinIva/$valEuro,2)." €"; ?></strong></td>
    	  </tr>
      	<tr>
        	<td class="ardanuy">% Ejecutado Del Contrato A La Fecha</td>
          <td align="right"><strong><?php echo "% ".numero($porEjeAFec,2); ?></strong></td>
        </tr>
      </table>
    
    </td></tr>
	</table>
	<br><br><br>
</div>

</div>
<br>

<div id="utilidades" style="display:none" align="center">

  <h2 class="titulo" align="center"><font color="#cc0000"><?php echo $cont_nomcontratista; ?></font></h2>
  <h2 class="titulo" align="center"><font color="#cc0000">Reporte Utilidades <?php echo "Proyecto ".$codProyecto; ?></font></h2>

<?php

#		$arrUtil=array;
		for($i=0; $i<count($arUtilidades); $i++){
			$proCodig=trim($arUtilidades[$i][0]);
			$socCodig=trim($arUtilidades[$i][1]);
			$socNombe=trim($arUtilidades[$i][2]);
			$concepto=trim($arUtilidades[$i][3]);
			$fechaUti=trim($arUtilidades[$i][4]);
			$valorUti=trim($arUtilidades[$i][5]);
			$totalGen+=$valorUti;
			
			$arrUtil[$socCodig]['cod'][$i]=$socCodig;
			$arrUtil[$socCodig]['fec'][$i]=$fechaUti;
			$arrUtil[$socCodig]['val'][$i]=$valorUti;
			$arrUtil[$socCodig]['con'][$i]=$concepto;
			$arrUtil[$socCodig]['tot']+=$valorUti;
		}

		for($i=0; $i<count($arSocio); $i++){
			$nomSocio=trim($arSocio[$i][0]);
			$porSocio=trim($arSocio[$i][1]);
			$codSocio=trim($arSocio[$i][2]);
			echo '<center class="titulo">'.$nomSocio.' '.$porSocio.' %</center>';
?>
  <table cellspacing="0" cellpadding="5" border="1" class="textopequeno">
    <tr class="ardanuy">
      <td>FECHA</td>
      <td>VALOR TOTAL</td>
      <td>CONCEPTO</td>
		</tr>
<?php
			for($j=0; $j<count($arUtilidades); $j++){
				if($arrUtil[$codSocio]['cod'][$j]!=''){
?>    	
          <tr>
            <td><?php echo fecha_texto2($arrUtil[$codSocio]['fec'][$j]); ?></td>
            <td align="right"><?php echo "$ ".numero($arrUtil[$codSocio]['val'][$j],0); ?></td>
            <td><?php echo $arrUtil[$codSocio]['con'][$j]; ?></td>
          </tr>
<?php
				}
			}
?>    	
    <tr class="ardanuy"><td>TOTAL</td><td colspan="2" align="center"><?php echo "$ ".numero($arrUtil[$codSocio]['tot'],0); ?></td></tr>
  </table>
<?php
		}
?>
<br>
	<table cellspacing="0" cellpadding="5" border="1" class="textopequeno">
  	<tr class="ardanuy"><td>TOTAL GENERAL</td><td><?php echo "$ ".numero($totalGen,0); ?></td></tr>
  </table>
<br>
</div>

<div id="factServProf" style="display:none" align="center">

  <h2 class="titulo" align="center"><font color="#cc0000"><?php echo $cont_nomcontratista; ?></font></h2>
  <h2 class="titulo" align="center"><font color="#cc0000">Reporte Facturación Servicios Profesionales <?php echo "Proyecto ".$codProyecto; ?></font></h2>

  <table cellspacing="0" cellpadding="5" border="1" class="textopequeno" width="50%">
    <tr class="ardanuy" align="center">
      <td width="12%">No FACTURA</td><td width="12%">FECHA PAGO</td><td width="15%">VALOR</td><td>CONCEPTO</td>
		</tr>
<?php
		for($i=0; $i<count($arFactServProf); $i++){
			$numFactu=trim($arFactServProf[$i][1]);
			$fecPago=trim($arFactServProf[$i][2]);
			$valAbono=trim($arFactServProf[$i][3]);
			$valPago=trim($arFactServProf[$i][4]);
			$concepto=trim($arFactServProf[$i][5]);
			$totAbono+=trim($arFactServProf[$i][3]);
			$totPago+=trim($arFactServProf[$i][4]);
			
			echo '<tr><td align="center">'.$numFactu.'</td><td align="center">'.fecha_texto2($fecPago).'</td>';
			echo '<td align="right">$ '.numero($valPago,0).'</td><td>'.$concepto.'</td></tr>';
		}
		echo '<tr class="ardanuy"><td colspan="2" align="center">TOTAL</td>
					<td align="right">$ '.numero($totPago,0).'</td><td>&nbsp;</td></tr>';
?>
  </table>
	<br>
</div>

<div id="contratistas" style="display:none" align="center">

  <h2 class="titulo" align="center"><font color="#cc0000"><?php echo $cont_nomcontratista; ?></font></h2>
  <h2 class="titulo" align="center"><font color="#cc0000">Reporte Contratistas <?php echo "Proyecto ".$codProyecto; ?></font></h2>

  <table cellspacing="0" cellpadding="5" border="1" class="textopequeno" width="80%">
   <tr class="ardanuy" align="center">
    <td width="10%">NOMBRE</td><td width="3%">SE HIZO CONTRATO</td><td width="3%">N° CONTRATO</td><td width="20%">OBJETO CONTRATO</td>
    <td width="5%">FECHA INICIO</td><td width="5%">FECHA FIN</td><td width="2%">DURACIÓN CONTRATO</td><td width="6%">VALOR CONTRATO</td>
    <td width="4%">VALOR RETENCION PAGO</td><td width="6%">VALOR TOTAL PAGO</td><td width="4%">% PAGOS</td>		
  </tr>
<?php
		for($i=0; $i<count($arContratista); $i++){
			$nomContratista=trim($arContratista[$i][4]);
			$hizContrato=trim($arContratista[$i][9]);
			$numContrato=trim($arContratista[$i][10]);
			$objContrato=trim($arContratista[$i][11]);
			$fecIniContrato=fecha_texto2($arContratista[$i][12]);
			$fecFinContrato=fecha_texto2($arContratista[$i][13]);
			$valContrato=numero(trim($arContratista[$i][14]),0);

			$desContrato=trim($arContratista[$i][15]);
			$duracion=diferencia_meses($arContratista[$i][13],$arContratista[$i][12]);
			$AA=valoresContratistas(trim($arContratista[$i][1]),trim($arContratista[$i][3]));
			$BB=valorContratistas(trim($arContratista[$i][1]),trim($arContratista[$i][3]));
			$porPago=(($AA+$BB)/trim($arContratista[$i][14]))*100;

			$totContrato+=trim($arContratista[$i][14]);
			$totAA+=$AA;
			$totBB+=$BB;
			
			echo '<tr>';
			echo '<td align="center">'.$nomContratista.'</td><td align="center">'.$hizContrato.'</td><td align="center">'.$numContrato.'</td>';
			echo '<td align="center">'.$objContrato.'</td><td align="center">'.$fecIniContrato.'</td>';
			echo '<td align="center">'.$fecFinContrato.'</td><td align="center">'.$duracion.'</td><td align="right">$ '.$valContrato.'</td>';
			echo '<td align="right">$ '.numero($AA).'</td><td align="right">$ '.numero($BB).'</td><td align="center">'.$porPago.' %</td>';
			echo '</tr>';
		}
		$porTotPago=(($totAA+$totBB)/$totContrato)*100;
		echo '<tr class="ardanuy">
				<td colspan="7" align="center">TOTAL</td><td align="right">$ '.numero($totContrato,0).'</td>
				<td align="right">$ '.numero($totAA,0).'</td>
				<td align="right">$ '.numero($totBB,0).'</td>
				<td align="center">'.numero($porTotPago,2).' %</td>
			 </tr>';
		
?>
  </table>
	<br>
</div>

</body>
</html>