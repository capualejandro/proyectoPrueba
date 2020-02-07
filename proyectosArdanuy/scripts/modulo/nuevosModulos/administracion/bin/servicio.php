<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera=trim($_POST["txtBandera"]);

	if($txtBandera!=""){
		$txtNombre = mayusculas(trim($_POST["txtNombre"]));
		
		$caSql = "SELECT count(*) FROM servicio WHERE ser_nombre='$txtNombre'";
		$rs=$db->Execute($caSql);
		while (!$rs->EOF) {
			$varCont = $rs->fields[0];
			$rs->MoveNext();
		}
		if ($varCont != 0){
			alert('Error: Ya existe un servicio con ese nombre!');
			include_once("../scripts/modulo/administracion/form/frmServicio.php");
		}else{
			$caSql = "SELECT MAX(ser_codigo) FROM servicio";
			$rs=$db->Execute($caSql);
			while (!$rs->EOF) {
				if($rs->fields[0]==NULL || $rs->fields[0]==0){
					$varConsecutivo = 1;
				}else{
					$varConsecutivo = $rs->fields[0]+1;
				}
				$rs->MoveNext();
			}

			$caSql = "INSERT INTO servicio (ser_codigo, ser_nombre, ser_estado) 
					  VALUES ($varConsecutivo, '$txtNombre', 'A')";
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
			unset($db);
			printMsg("El servicio se grabo exitosamente!");
			Atras_menu("INICIO");
		}
	}else{
		$txtNombre = "";
		include_once("../scripts/modulo/administracion/form/frmServicio.php");
	}



?>