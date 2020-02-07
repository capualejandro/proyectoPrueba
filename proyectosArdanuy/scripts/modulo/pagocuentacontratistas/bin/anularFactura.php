<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera=trim($_POST["txtBandera"]);

	if($txtBandera!=""){
		$selCodProyecto=mayusculas(trim($_POST["selCodProyecto"]));
		$selNumFact=trim($_POST['selNumFact']);

		$caSql="UPDATE facturacion SET fact_estado='A' 
						WHERE fact_consecutivo=$selNumFact";
		$db->Execute($caSql);

		$txtBandera = "";
		alert("la factura se anulo!");
		include_once("/inicio/inicio.php");
		
	}
	include_once("../scripts/modulo/pagos/form/frmCrearPago.php");
#	exit();

?>