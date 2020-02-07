<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera=trim($_POST["txtBandera"]);

	if($txtBandera!=""){
		$selCodProyecto=mayusculas(trim($_POST["selCodProyecto"]));
		$txtNumCuent=mayusculas(trim($_POST['txtNumCuent']));
#		$selContrTipoIdent=mayusculas(trim($_POST['selContrTipoIdent']));		
		$txtContrIdentif=mayusculas(trim($_POST["selContrTipoIdent"]));
		$txtFecEmiCuent=mayusculas(trim($_POST["txtFecEmiCuent"]));
		$txtValCuent=mayusculas(trim($_POST["txtValCuent"]));
		$txtDescCuent=mayusculas(trim($_POST["txtDescCuent"]));
		$txtFecPagCuent=trim($_POST["txtFecPagCuent"]);
		$txtIvaCuent=trim($_POST["txtIvaCuent"]);
		$txtRetCuent=trim($_POST["txtRetCuent"]);	
		$txtReteicaCuent=trim($_POST["txtReteicaCuent"]);				
		$txtTotalValCuent=trim($_POST["txtTotalValCuent"]);

		$caSql = "";
		$caSql = "SELECT count(*) FROM cuenta_contratista WHERE pro_codigo='$selCodProyecto' AND cuenta_numero='$txtNumCuent'";
#		echo "$caSql";
		$rs=$db->Execute($caSql);
		while (!$rs->EOF) {
			$varCont = $rs->fields[0];
			$rs->MoveNext();
		}

		if ($varCont != 0){
			alert('Error: La cuenta ya existe');
			include_once("../scripts/modulo/cuentacontratista/form/frmCrearCuenta.php");
		}else{
			$caSql ="";
			$caSql ="SELECT contr_tipo_identificacion,contr_identificacion,contr_nombre FROM contratistas WHERE contr_identificacion='$txtContrIdentif'";
			$arContratita = $db->GetArray($caSql);
			for($i=0; $i<count($arContratita); $i++){
				$selContrTipoIdent=mayusculas(trim($arContratita[$i][0]));
#				$arIdentif[$arIden[$i][0]] = $arIden[$i][1];
			}	

#			echo "$varCont<br>";fact_consecutivo,
			$caSql = "";
			$caSql = "INSERT INTO cuenta_contratista (pro_codigo,cuenta_numero,contr_tipo_identificacion,contr_identificacion,cuenta_fech_emision,
			          cuenta_valor,cuenta_descripcion,cuenta_fech_pago,cuenta_iva,cuenta_retencion,cuenta_reteica,cuenta_total) 
					  		VALUES ('$selCodProyecto','$txtNumCuent','$selContrTipoIdent','$txtContrIdentif',
					      '$txtFecEmiCuent','$txtValCuent','$txtDescCuent','$txtFecPagCuent',$txtIvaCuent,$txtRetCuent,$txtReteicaCuent,$txtTotalValCuent)";
#			echo "$caSql";exit();
			$db->Execute($caSql);
			alert("La cuenta se grabo exitosamente!");
		}
		
	}	
#	echo "Alexandra - varUsuario=$varUsuario - Bandera=$txtBandera<br>";
	$caSql = "";
	$caSql = "SELECT pro_codigo FROM proyectos";
#	echo "<pre>$caSql - $txtBandera</pre>"; 
	$arProy = $db->GetArray($caSql);
	$arProyecto = array(''=>'Seleccione');
	for($i=0; $i<count($arProy); $i++){
		$arProyecto[$arProy[$i][0]] = $arProy[$i][0];
	}
	
	$caSql = "";
	$caSql = "SELECT CodIdentif,NombreIdentif FROM tipo_identificacion";
#	echo "<pre>$caSql - $txtBandera</pre>"; 
	$arIden = $db->GetArray($caSql);
	$arIdentif = array(''=>'Seleccione');
	for($i=0; $i<count($arIden); $i++){
		$arIdentif[$arIden[$i][0]] = $arIden[$i][1];
	}	
	include_once("../scripts/modulo/cuentacontratista/form/frmCrearCuenta.php");
#	exit();

?>