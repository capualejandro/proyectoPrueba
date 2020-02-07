<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera=trim($_POST["txtBandera"]);
#	echo "Alexa"; exit();

	if($txtBandera!=""){
		$selCodProyecto=trim($_POST["selCodProyecto"]);
		$selContrTipoIden=mayusculas(trim($_POST["selContrTipoIdent"]));
		$txtContrIdentif=mayusculas(trim($_POST["txtContrIdentif"]));
		$txtContrNomb=mayusculas(trim($_POST["txtContrNomb"]));
		$txtContrDir=mayusculas($_POST["txtContrDir"]);
		$selContrPais=trim($_POST["selContrPais"]);
		$selContrCiudad=mayusculas($_POST["selContrCiudad"]);
		$txtContrTel=mayusculas(trim($_POST["txtContrTel"]));
		$selTieneContrato=mayusculas(trim($_POST["selTieneContrato"]));
		$txtContraNum=mayusculas(trim($_POST["txtContraNum"]));
		$txtContraObj=mayusculas(trim($_POST["txtContraObj"]));
		$txtFecPeriodo1=mayusculas(trim($_POST["txtFecPeriodo1"]));
		$txtFecPeriodo2=mayusculas(trim($_POST["txtFecPeriodo2"]));
		$txtContraVal=trim($_POST["txtContraVal"]);
		$txtContraDes=mayusculas(trim($_POST["txtContraDes"]));														

		$caSql = "SELECT count(*) FROM contratistas WHERE pro_codigo='$selCodProyecto' AND contr_identificacion='$txtContrIdentif'";
#		echo "<pre>$caSql</pre>"; exit();
		$rs=$db->Execute($caSql);
		while (!$rs->EOF) {
			$varCont = $rs->fields[0];
			$rs->MoveNext();		
		}
		if ($varCont != 0){
			alert('Error: El contratista ya existe');
			include_once("../scripts/modulo/usuario/form/frmCrearContratista.php");
		}else{
			echo "$varCont<br>";
			$caSql = "INSERT INTO CONTRATISTAS (pro_codigo,contr_tipo_identificacion,contr_identificacion,contr_nombre,contr_direccion,
								contr_ciudad,contr_pais,contr_telefono,contr_tiene_contrato,contr_num_contrato,contr_obj_contrato,contr_fech_ini_contrato,
								contr_fech_fin_contrato,cont_valor_contrato,contr_desc_contrato) 
					  		VALUES ('$selCodProyecto','$selContrTipoIden','$txtContrIdentif','$txtContrNomb','$txtContrDir','$selContrPais','$selContrCiudad',
								'$txtContrTel','$selTieneContrato','$txtContraNum','$txtContraObj','$txtFecPeriodo1',
								'$txtFecPeriodo2','$txtContraVal','$txtContraDes')";								
#			echo "$txtLogin - $txtClave<br>$caSql";exit();
			$db->Execute($caSql);
			$txtBandera = "";
#			unset($db);
			alert("El contratista se grabo exitosamente!");
		}
		
	}
#	echo "Alexandra - varUsuario=$varUsuario - Bandera=$txtBandera<br>";
	include_once("../scripts/modulo/contratistas/form/frmCrearContratista.php");
#	exit();

?>