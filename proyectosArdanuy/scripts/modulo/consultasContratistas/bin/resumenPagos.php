<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");
	
	if($txtBandera!=""){
		echo "Bandera=$txtBandera Usuario=".$_SESSION["usu_login"];
	}else{
		$fechaHoraActual=date('Y-m-d H:i:s');
/******************************************************************************** EURO ****/
		$cadSql="TRUNCATE TABLE divisa";
		$db->Execute($cadSql);
		$d=conversor_divisas("EUR","COP",1);
		$d1=str_replace(",","",$d);
		$valEuro=$d1;
		$cadSql="INSERT INTO divisa (nom_divisa,sig_divisa,val_divisa,fec_divida)VALUES('EURO','EUR',$valEuro,'$fechaHoraActual')";
		$db->Execute($cadSql);
/******************************************************************************** DOLLAR *****/
		$d=conversor_divisas("USD","COP",1);
		$d1=str_replace(",","",$d);
		$valDola=$d1;
		$cadSql="INSERT INTO divisa (nom_divisa,sig_divisa,val_divisa,fec_divida)VALUES('DOLLAR','USD',$valDola,'$fechaHoraActual')";
		$db->Execute($cadSql);
/*****************************************************************************************************************************/
#		echo $cadSql;1.026.350.368

		$caSql="SELECT proyectos.pro_codigo,contrato.cont_nomcontratista,
						facturacion.fact_fech_pago,MONTH(facturacion.fact_fech_pago),
						YEAR(facturacion.fact_fech_pago),facturacion.fact_valor_consign
						FROM proyectos 
						INNER JOIN facturacion ON proyectos.pro_codigo=facturacion.pro_codigo
						INNER JOIN contrato ON proyectos.pro_codigo=contrato.pro_codigo
						WHERE facturacion.fact_estado=''";
#		echo "<pre>$caSql</pre>";
		$arPro = $db->GetArray($caSql);
		
		include_once("../scripts/modulo/consultas/form/frmResumenPagos.php");
	}

?>