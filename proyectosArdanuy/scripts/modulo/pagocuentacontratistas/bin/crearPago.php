<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera=trim($_POST["txtBandera"]);

	if($txtBandera!=""){
		$selCodProyecto=mayusculas(trim($_POST["selCodProyecto"]));
		$selIdentifCont=mayusculas(trim($_POST["selCodProyecto"]));		
		$selNumFact=trim($_POST['selNumFact']);
		$txtFecPagFact=mayusculas(trim($_POST["txtFecPagFact"]));
		$txtValFact=trim($_POST["txtValFact"]);
#		$txtIvaFact=trim($_POST["txtIvaFact"]);
/*		
		$caSql = "SELECT count(*) FROM facturacion WHERE pro_codigo ='$selCodProyecto' AND fact_numero='$txtNumFact'";
		$rs=$db->Execute($caSql);
		while (!$rs->EOF) {
			$varCont = $rs->fields[0];
			$rs->MoveNext();
		}
		if ($varCont != 0){
			alert('Error: La factura ya existe');
			include_once("../scripts/modulo/pagos/form/frmCrearPago.php");
		}else{
*/
#			echo "$varCont<br>";fact_consecutivo,
			$caSql = "UPDATE facturacion SET fact_fech_pago='$txtFecPagFact',fact_valor_consign=$txtValFact 
					  WHERE fact_consecutivo=$selNumFact";
#			echo "$txtLogin - $txtClave<br>$caSql";exit();
			$db->Execute($caSql);

			$txtBandera = "";
#			unset($db);
			alert("El pago se grabo exitosamente!");
			include_once("/inicio/inicio.php");
#		}
		
	}/*else{
		$caSql = "";
		$caSql = "SELECT pro_codigo FROM proyectos";
		$arProy = $db->GetArray($caSql);
		$arProyecto = array(''=>'Seleccione');
		for($i=0; $i<count($arProy); $i++){
			$arProyecto[$arProy[$i][0]] = $arProy[$i][0];
		}
	}*/
	
#	echo "Alexandra - varUsuario=$varUsuario - Bandera=$txtBandera<br>";
	include_once("../scripts/modulo/pagocuentacontratistas/form/frmCrearPago.php");
#	exit();

?>