<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera=trim($_POST["txtBandera"]);

	if($txtBandera!=""){
		$txtIdentificacion = mayusculas(trim($_POST["txtIdentificacion"]));
		$txtNombre = mayusculas(trim($_POST["txtNombre"]));
		$txtApellido = mayusculas(trim($_POST["txtApellido"]));
		$txtTelefono = trim($_POST["txtTelefono"]);
		
		$caSql = "SELECT count(*) FROM funcionario WHERE fun_identificacion='$txtIdentificacion'";
		$rs=$db->Execute($caSql);
		while (!$rs->EOF) {
			$varCont = $rs->fields[0];
			$rs->MoveNext();
		}
		if ($varCont != 0){
			alert('Error: Enumero de identificacion ya existe');
			include_once("../scripts/modulo/administracion/form/frmFuncionario.php");
		}else{
			$caSql = "SELECT MAX(fun_codigo) FROM funcionario";
			$rs=$db->Execute($caSql);
			while (!$rs->EOF) {
				$varConsecutivo = $rs->fields[0]+1;
				$rs->MoveNext();
			}

			$caSql = "INSERT INTO funcionario (fun_codigo, fun_identificacion, fun_nombre, fun_apellido, fun_telefono, fun_estado) 
					  VALUES ($varConsecutivo, '$txtIdentificacion', '$txtNombre', '$txtApellido', '$txtTelefono', 'A')";
			$db->Execute($caSql);
/*
			if($db->Execute($caSql) == false){
				$error = true;
			}
			if($error){
				$db->RollbackTrans();
				echo "Error: ".ErrorNo().' -> '.$db->ErrorMsg();
			}else{
				$db->CommitTrans();
			}
*/
			$txtBandera = "";
#			unset($db);
#			printMsg("El funcionario se grabo exitosamente!");
#			Atras_menu("INICIO");
			alert("El funcionario se grabo exitosamente!");
//		echo "$caSql - $varCont";
//		exit();
		}
	}#else{
#		$txtBandera = "";
#		$txtIdentificacion = "";
#		$txtNombre = "";
#		$txtApellido = "";
#		$txtTelefono = "";
		include_once("../scripts/modulo/administracion/form/frmFuncionario.php");
#	}
//	echo "Alexandra - varUsuario=$varUsuario<br>";
//	exit();

?>
