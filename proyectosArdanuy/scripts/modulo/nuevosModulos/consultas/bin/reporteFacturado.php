<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

#	$txtBandera=trim($_POST["txtBandera"]);
	$codProyecto=$_GET['codProyecto'];
	
	$caSql="SELECT * FROM facturacion  
					WHERE facturacion.pro_codigo='$codProyecto'
					AND facturacion.fact_estado!='A' 
					ORDER BY facturacion.fact_numero";
	$arFacturacion=$db->GetArray($caSql);
	for($i=0; $i<count($arFacturacion); $i++){
		$valFacTot+=$arFacturacion[$i][7];
	}
	
	$caSql="SELECT * FROM facturacion  
					WHERE facturacion.pro_codigo='$codProyecto'
					AND facturacion.fact_estado='A' 
					ORDER BY facturacion.fact_numero";
	$arFactAnulada=$db->GetArray($caSql);
	for($i=0; $i<count($arFactAnulada); $i++){

	}

	$caSql="SELECT SUM(pror_valor) FROM prorrogas WHERE pro_codigo='$codProyecto'";
	$arProrroga=$db->GetArray($caSql);
	for($i=0; $i<count($arProrroga); $i++){
		$valAdiones=$arProrroga[$i][0];
		$valAdiSinIva=round($valAdiones/1.16);
	}

	$caSql="SELECT SUM(adic_valor) FROM adiciones WHERE pro_codigo='$codProyecto'";
	$arAdicion=$db->GetArray($caSql);
	for($i=0; $i<count($arAdicion); $i++){
		$valAdiones1=$arAdicion[$i][0];
		$valAdi1SinIva=round($valAdiones1/1.16);
	}

	$caSql="SELECT pro_valor_cont_sin_iva FROM proyectos WHERE pro_codigo='$codProyecto'";
	$arProyecto=$db->GetArray($caSql);
	for($i=0; $i<count($arProyecto); $i++){
		$proValSinIva=$arProyecto[$i][0];
	}
	
	$caSql="SELECT * FROM anticipo WHERE anticipo.pro_codigo='$codProyecto'";
	$arAnticipo=$db->GetArray($caSql);
	for($i=0; $i<count($arAnticipo); $i++){
#		$antFac+=$arAnticipo[$i][5];
#		$antPag+=$arAnticipo[$i][8];
		$valAticipo+=$arAnticipo[$i][3];
	}
	
#	$porEjeAFec=($valFacTot/($valAdiSinIva+$proValSinIva))*100;
	$porEjeAFec=(($valFacTot+$valAticipo)/($proValSinIva+$valAdiSinIva+$valAdi1SinIva))*100;
	include_once("../scripts/modulo/consultas/form/frmReporteFacturado.php");

?>