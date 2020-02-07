<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera=trim($_POST["txtBandera"]);

	if($txtBandera!=""){
#		$cadena = preg_replace("[ó]","Ó",$_POST["txtNomProy"]);
#		echo $cadena; exit();
		$selCodProyecto=mayusculas($_POST["selCodProyecto"]);
		$txtNumContrato=mayusculas($_POST["txtNumContrato"]);
		$txtNomClie=mayusculas($_POST["txtNomClie"]);
		$txtNitClie=mayusculas($_POST["txtNitClie"]);
		$txtNomContacClie=mayusculas($_POST["txtNomContacClie"]);
		$txtDirClie=mayusculas($_POST["txtDirClie"]);
		$selPaisClie=mayusculas($_POST["selPaisClie"]);
		$selCiudadClie=mayusculas($_POST["selCiudadClie"]);
		$txtTelClie=mayusculas(trim($_POST["txtTelClie"]));
		$txtDescClie=mayusculas($_POST["txtDescClie"]);
#		$txtLogin=mayusculas(trim($_SESSION["usu_login"]));
		
		$caSql = "SELECT count(*) FROM cliente WHERE pro_codigo ='$selCodProyecto' AND cont_numero='$txtNumContrato'";
		$rs=$db->Execute($caSql);
		while (!$rs->EOF) {
			$varCont = $rs->fields[0];
			$rs->MoveNext();
		}
		if ($varCont != 0){
			alert('Error: El cliente ya existe');
			include_once("../scripts/modulo/usuario/form/frmCliente.php");
		}else{
#			echo "$varCont<br>";
			$caSql = "INSERT INTO cliente (pro_codigo,cont_numero,cli_nombre,cli_nit,cli_Pers_Contacto,     
			                               cli_direccion,cli_pais,cli_ciudad,cli_telefono,clie_descripcion) 
					  VALUES ('$selCodProyecto','$txtNumContrato','$txtNomClie','$txtNitClie','$txtNomContacClie','$txtDirClie','$selPaisClie',
					          '$selCiudadClie',$txtTelClie,'$txtDescClie')";
#			echo "$txtLogin - $txtClave<br>$caSql";exit();
			$db->Execute($caSql);

			$txtBandera = "";
#			unset($db);
			alert("El Cliente se grabo exitosamente!");
		}
		
	}
	
#	echo "Alexandra - varUsuario=$varUsuario - Bandera=$txtBandera<br>";
	include_once("../scripts/modulo/cliente/form/frmCliente.php");
#	exit();

?>