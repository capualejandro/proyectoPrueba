<?php

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title></title>
</head>

<body>

<h2 class="titulo" align="center"><?php echo $cont_nomcontratista; ?></h2>
<h2 class="titulo" align="center"><font FACE="arial" zice="5" color="#CC0000">Flujo de Caja <?php echo "Proyecto ".$codProyecto; ?></font></h2>
<!--    
  <table width="511" border="1" align="center" class="subtexto">
    <tbody>
      <tr align="center" bgcolor="#E6E6FA">
        <td width="51"><strong>Periodo</strong></td>
        <td width="122"><strong>Ingresos Por Facturación Neto</strong></td>
        <td width="115"><strong>Gastos</strong></td>
        <td width="75"><strong>Neto Mes</strong></td>
      </tr>
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

?>
			<tr>
       	<td align="center"><?php echo $gpro_fecha; ?></td>
        <td align="right"><?php echo "$ ".numero($valTotIng,2); ?></td>
        <td align="right"><?php echo "$ ".numero($gpro_valor_total,2); ?></td>
        <td align="right"><?php echo "$fuente $ ".numero($netoMes,2); ?></font></td>
      </tr>
<?php
	}
?>
    </tbody>
  </table>
-->
<br>
  <table width="391" border="1" align="center" class="subtexto">
    <tbody>
    	<tr align="center" bgcolor="#E9E9E9">
      	<td width="42"><strong><font FACE="arial" zice="5" color="#005199">Periodo</font></strong></td>
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
		echo '<td align="center"><strong>'.$gpro_fecha.'</strong></td>';
	}
?>
			</tr>      
    	<tr align="center">
        <td width="125" bgcolor="#E9E9E9"><strong><font FACE="arial" zice="5" color="#005199">Ingresos Por Facturación Neto</font></strong></td>
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
		echo '<td align="center" bgcolor="">$ '.numero($valTotIng,2).'</td>';
	}
?>
			</tr>      
    	<tr align="center">
        <td width="97" bgcolor="#E9E9E9"><strong><font FACE="arial" zice="5" color="#005199">Gastos</font></strong></td>
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
		echo '<td align="center" bgcolor="">$ '.numero($gpro_valor_total,2).'</td>';
	}
?>
			</tr>      
    	<tr align="center">
        <td width="99" bgcolor="#E9E9E9"><strong><font FACE="arial" zice="5" color="#005199">Neto Mes</font></strong></td>
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
		echo '<td align="center" bgcolor="">'.$fuente.'$ '.numero($netoMes,2).'</font></td>';
	}
?>
			</tr>      
    </tbody>
  </table>

	</body>
</html>