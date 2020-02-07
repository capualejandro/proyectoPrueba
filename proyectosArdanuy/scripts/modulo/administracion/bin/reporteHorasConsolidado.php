<?php
#echo "OK"; exit(); #REPHORACON

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

/**/
	$cadenaSQL="";
	$cadenaSQL="TRUNCATE horas_laboradas";
	$db->Execute($cadenaSQL);

	$cadSql="";
	$cadSql="SELECT MAX(YEAR(rh_hora)) FROM reporte_horas";
	$arAgno = $db->GetArray($cadSql);
	if(count($arAgno)>0){
		for($j=0; $j<count($arAgno); $j++){
				$agno=$arAgno[$j][0];
		}
	}
#	echo $agno;
	$fecha1 = $agno."-01-01";
	$fecha2 = $agno."-12-31";
	for($i=$fecha1;$i<=$fecha2;$i = date("Y-m-d", strtotime($i ."+ 1 days"))){
		$cadSql="";
		$cadSql="SELECT rh_idusuario,rh_nombre,DATE(rh_hora),MIN(TIME(rh_hora)),MAX(TIME(rh_hora))
											FROM reporte_horas WHERE DATE(rh_hora) = '$i' GROUP BY 1,2";
		$arHora = $db->GetArray($cadSql);
#		echo "$cadSql<br>";
		if(count($arHora)>0){
				$cadSql2="";
				$cadSql2="SELECT count(*) FROM horas_laboradas WHERE hor_fecha ='$i'";
				$rs=$db->Execute($cadSql2);
				while (!$rs->EOF) {
					$varCont = $rs->fields[0];
					$rs->MoveNext();
				}

#				echo "$cadSql2 - $varCont<br />";
				if($varCont == 0){
					for($k=0; $k<count($arHora); $k++){
							$totalHoras=restarHoras($arHora[$k][3],$arHora[$k][4]);
							$caSql="";
							$caSql = "INSERT INTO horas_laboradas (hor_fecha,hor_id,hor_nombre,hor_total) 
																	VALUES ('".trim($arHora[$k][2])."',".trim($arHora[$k][0]).",'".trim($arHora[$k][1])."','".$totalHoras."')";
#							echo $caSql. "<br />";
							$db->Execute($caSql);
					}
				}
		}
/**/
	}

	
	include_once("../scripts/modulo/administracion/form/frmReporteHorasConsolidado.php");

?>