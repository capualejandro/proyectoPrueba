<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera=trim($_POST["txtBandera"]);

	if($txtBandera!=""){
		$selCodProyecto=mayusculas($_POST["selCodProyecto"]);
		$txtNitEmpPro=mayusculas($_POST["txtNitEmpPro"]);
		$txtNomEmpPro=mayusculas($_POST["txtNomEmpPro"]);
		$txtDirEmpPro=mayusculas($_POST["txtDirEmpPro"]);
		$txtPaisEmpPro=mayusculas($_POST["txtPaisEmpPro"]);
		$txtCiudEmpPro=mayusculas($_POST["txtCiudEmpPro"]);
		$txtTelEmpPro=mayusculas($_POST["txtTelEmpPro"]);
		$txtDescEmpPro=mayusculas($_POST["txtDescEmpPro"]);
		
		$caSql = "SELECT COUNT(*) FROM empresa_proyecto WHERE pro_codigo='$selCodProyecto'";
		$rs=$db->Execute($caSql);
		while (!$rs->EOF) {
			$varCont = $rs->fields[0];
			$rs->MoveNext();
		}
		if ($varCont != 0){
			alert('Error: La empresa ya existe');
			include_once("../scripts/modulo/usuario/form/frmEmpresa.php");
		}else{
#			echo "$varCont<br>";
			$caSql = "INSERT INTO empresa_proyecto (pro_codigo,empresapr_nit,empresapr_nomb,empresapr_dir,empresapr_ciud,empresapr_pais,
													empresapr_telef,empresapr_descrip) 
					  VALUES ('$selCodProyecto','$txtNitEmpPro','$txtNomEmpPro','$txtDirEmpPro','$txtCiudEmpPro','$txtPaisEmpPro',
					  		  '$txtTelEmpPro','$txtDescEmpPro')";
#			echo "$txtLogin - $txtClave<br>$caSql";exit();
			$db->Execute($caSql);
#			$txtBandera = "";
#			unset($db);
			alert("La empresa se grabo exitosamente!");
		}
	}
	
#	echo "Alexandra - varUsuario=$varUsuario - Bandera=$txtBandera<br>";
	include_once("../scripts/modulo/empresa/form/frmEmpresa.php");
#	exit();

?>