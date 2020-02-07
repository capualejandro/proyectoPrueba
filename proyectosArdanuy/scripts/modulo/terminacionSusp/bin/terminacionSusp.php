<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera=trim($_POST["txtBandera"]);
#	echo "Alexa"; exit();

	if($txtBandera!=""){
		$selCodProyecto=mayusculas($_POST["selCodProyecto"]);
		$txtNumDocumFinSusp=mayusculas($_POST["txtNumDocumFinSusp"]);
		$txtNumFinSusp=mayusculas($_POST["txtNumFinSusp"]);
		$txtNomFinSusp=mayusculas($_POST["txtNomFinSusp"]);
		$txtFecFinSusp=trim($_POST["txtFecFinSusp"]);
		$txtDescFinSusp=mayusculas($_POST["txtDescFinSusp"]);

		$caSql = "SELECT count(*) FROM suspension_terminacion WHERE pro_codigo ='$selCodProyecto' AND susp_term_numero='$txtNumFinSusp'";
		$rs=$db->Execute($caSql);
		while (!$rs->EOF) {
			$varCont = $rs->fields[0];
			$rs->MoveNext();
		}
		if ($varCont != 0){
			alert('Error: La finalización de la suspension ya existe');
			include_once("../scripts/modulo/usuario/form/frmTerminacionSusp.php");
		}else{
#			echo "$varCont<br>";
   			$caSql = "INSERT INTO suspension_terminacion (pro_codigo,susp_numero,susp_term_numero, 
			                      susp_term_nombre,susp_term_fech_fin,susp_term_descripcion) 
					  VALUES ('$selCodProyecto','$txtNumDocumFinSusp','$txtNumFinSusp','$txtNomFinSusp','$txtFecFinSusp','$txtDescSusp')";
#			echo "$txtLogin - $txtClave<br>$caSql";exit();
			$db->Execute($caSql);

			$txtBandera = "";
#			unset($db);
			alert("La finalización de la suspension se grabo exitosamente!");
		}
		
	}
	
#	echo "Alexandra - varUsuario=$varUsuario - Bandera=$txtBandera<br>";
	include_once("../scripts/modulo/terminacionSusp/form/frmTerminacionSusp.php");
#	exit();

?>