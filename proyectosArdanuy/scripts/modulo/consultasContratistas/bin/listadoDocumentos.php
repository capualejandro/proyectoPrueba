<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	if($txtBandera!=""){
		echo "Bandera=$txtBandera Usuario=".$_SESSION["usu_login"];
	}else{
		$fechaHoraActual=date('Y-m-d H:i:s');
/***************************************** EURO ****
		$cadSql="TRUNCATE TABLE divisa";
		$db->Execute($cadSql);
		$d=conversor_divisas("EUR","COP",1);
		$d1=str_replace(",","",$d);
		$valEuro=$d1;
		$cadSql="INSERT INTO divisa (nom_divisa,sig_divisa,val_divisa,fec_divida)VALUES('EURO','EUR',$valEuro,'$fechaHoraActual')";
		$db->Execute($cadSql);
/**************************************** DOLLAR *****
		$d=conversor_divisas("USD","COP",1);
		$d1=str_replace(",","",$d);
		$valDola=$d1;
		$cadSql="INSERT INTO divisa (nom_divisa,sig_divisa,val_divisa,fec_divida)VALUES('DOLLAR','USD',$valDola,'$fechaHoraActual')";
		$db->Execute($cadSql);
/*********************************************/
#		echo $cadSql;1.026.350.368

#SELECT DISTINCT(tip_documento) FROM documentos
		$caSql="SELECT proyectos.pro_codigo,proyectos.pro_nombre,cliente.cli_nombre,proyectos.pro_fech_ini,
						proyectos.pro_fech_fin,proyectos.pro_valor_contrato,proyectos.pro_porcentaje
						FROM proyectos
						INNER JOIN cliente ON proyectos.pro_codigo=cliente.pro_codigo";
#		echo $caSql;
		$arPro = $db->GetArray($caSql);
		
		include_once("../scripts/modulo/consultas/form/frmListadoDocumentos.php");
	}

?>