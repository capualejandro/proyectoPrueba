<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera=trim($_POST["txtBandera"]);

	if($txtBandera!=""){
		$txtFecIva=mayusculas(trim($_POST["txtFecIva"]));
		$txtPorcIva=trim($_POST["txtPorcIva"]);

			$caSql = "INSERT INTO iva (iva_fecha,iva_porcentaje) 
					  VALUES ($txtFecIva,'$txtPorcIva')";
#			echo "$txtLogin - $txtClave<br>$caSql";exit();
			$db->Execute($caSql);

			$txtBandera = "";
#			unset($db);
			alert("El Iva se grabo exitosamente!");
		}
	
#	echo "Alexandra - varUsuario=$varUsuario - Bandera=$txtBandera<br>";
	include_once("../scripts/modulo/iva/form/frmCrearIva.php");
#	exit();

?>