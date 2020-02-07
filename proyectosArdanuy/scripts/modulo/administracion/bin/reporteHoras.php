<?php
#echo "OK"; exit();

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");
/**
	$txtBandera=trim($_POST["txtBandera"]);
	$txtFecha=trim($_POST["txtFecha"]);
	if($txtBandera!=""){
#		echo "Bandera=$txtBandera - Fecha a consultar $txtFecha - Usuario=".$_SESSION["usu_login"];
		$cadSql="";
		$cadSql="SELECT rh_nombre,rh_hora,MIN(TIME(rh_hora)),MAX(TIME(rh_hora)) FROM reporte_horas WHERE rh_hora LIKE '%$txtFecha%' GROUP BY 1 ";
		$arHora = $db->GetArray($cadSql);
		echo "$cadSql";
	}#else{


#	}
/**/
#	include_once("../scripts/modulo/administracion/form/frmReporteHoras.php");

?>