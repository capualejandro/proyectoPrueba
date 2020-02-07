<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera=trim($_POST["txtBandera"]);
#	echo "Alexa"; exit();

	if($txtBandera!=""){
		$selCodProyecto=trim($_POST["selCodProyecto"]);
		$txtNumSusp=trim($_POST["txtNumSusp"]);
		$txtNomSusp=mayusculas(trim($_POST["txtNomSusp"]));
		$txtFecIniSusp=trim($_POST["txtFecIniSusp"]);
		$txtFecFinSusp=trim($_POST["txtFecFinSusp"]);
		$txtDescSusp=mayusculas(trim($_POST["txtDescSusp"]));
		
		$caSql = "SELECT count(*) FROM suspension_contrato WHERE pro_codigo ='$selCodProyecto' AND susp_numero='$txtNumSusp'";
		$rs=$db->Execute($caSql);
		while (!$rs->EOF) {
			$varCont = $rs->fields[0];
			$rs->MoveNext();
		}
		if ($varCont != 0){
			alert('Error: La suspension ya existe');
			include_once("../scripts/modulo/usuario/form/frmSuspension.php");
		}else{
#			echo "$varCont<br>";
			$caSql = "INSERT INTO suspension_contrato (pro_codigo,susp_numero,susp_nombre,susp_fech_ini,susp_fech_fin,susp_descripcion) 
					  VALUES ('$selCodProyecto','$txtNumSusp','$txtNomSusp','$txtFecIniSusp','$txtFecFinSusp','$txtDescSusp')";
#			echo "$txtLogin - $txtClave<br>$caSql";exit();
			$db->Execute($caSql);

			$txtBandera = "";
#			unset($db);
			alert("La suspension se grabo exitosamente!");
		}
		
	}
	
	
#	echo "Alexandra - varUsuario=$varUsuario - Bandera=$txtBandera<br>";
	include_once("../scripts/modulo/suspension/form/frmSuspension.php");
#	exit();

?>