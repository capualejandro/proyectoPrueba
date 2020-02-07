<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera=trim($_POST["txtBandera"]);

	if($txtBandera!=""){
		$selCodProyecto=mayusculas(trim($_POST["selCodProyecto"]));
		$txtNumFact=mayusculas(trim($_POST['txtNumFact']));
		$txtNumActaFact=mayusculas(trim($_POST['txtNumActaFact']));		
		$txtFecEmiFact=mayusculas(trim($_POST["txtFecEmiFact"]));
		$txtFecPeriodo1=mayusculas(trim($_POST["txtFecPeriodo1"]));
		$txtFecPeriodo2=mayusculas(trim($_POST["txtFecPeriodo2"]));
		$txtValFact=trim($_POST["txtValFact"]);
		$txtIvaFact=trim($_POST["txtIvaFact"]);
		$txtMotivoFact=trim($_POST["txtMotivoFact"]);		
		$fact_total=((trim($_POST["txtValFact"])*trim($_POST["txtIvaFact"]))/100)+trim($_POST["txtValFact"]);
		
		$caSql = "SELECT count(*) FROM facturacion WHERE pro_codigo='$selCodProyecto' AND fact_numero='$txtNumFact'";
		$rs=$db->Execute($caSql);
		while (!$rs->EOF) {
			$varCont = $rs->fields[0];
			$rs->MoveNext();
		}
		if ($varCont != 0){
			alert('Error: La factura ya existe');
			include_once("../scripts/modulo/facturacion/form/frmCrearFactura.php");
		}else{
#			echo "$varCont<br>";fact_consecutivo,
			$caSql = "INSERT INTO facturacion 
			                (fact_numero,fact_acta_numero,pro_codigo,fact_fech_emision,fact_periodo_fecha_ini,fact_periodo_fecha_fin,fact_valor,
			                                   fact_iva,fact_motivo,fact_total) 
					  VALUES ('$txtNumFact','$txtNumActaFact','$selCodProyecto','$txtFecEmiFact','$txtFecPeriodo1','$txtFecPeriodo2',
					          '$txtValFact','$txtIvaFact','$txtMotivoFact','$fact_total')";
#			echo "$txtLogin - $txtClave<br>$caSql";exit();
			$db->Execute($caSql);

#			$txtBandera = "";
#			unset($db);
			alert("La factura se grabo exitosamente!");
		}
		
	}/*else if($txtBandera==""){
		$caSql = "";
		$caSql = "SELECT pro_codigo FROM proyectos";
#		echo "<pre>$caSql - $txtBandera</pre>"; 
		$arProy = $db->GetArray($caSql);
		$arProyecto = array(''=>'Seleccione');
		for($i=0; $i<count($arProy); $i++){
			$arProyecto[$arProy[$i][0]] = $arProy[$i][0];
		}
	}*/
	
#	echo "Alexandra - varUsuario=$varUsuario - Bandera=$txtBandera<br>";
	include_once("../scripts/modulo/facturacion/form/frmCrearFactura.php");
#	exit();

?>