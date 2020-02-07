<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera=trim($_POST["txtBandera"]);

	if($txtBandera!=""){
		$selCodProyecto=mayusculas(trim($_POST["selCodProyecto"]));
		$txtNumFactServ=mayusculas(trim($_POST['txtNumFactServ']));
		$txtFecPagFactServ=mayusculas(trim($_POST["txtFecPagFactServ"]));
		$selTipPago=trim($_POST["selTipPago"]);
		$txtValPagFactServ=trim($_POST["txtValPagFactServ"]);
		$txtConcepFactServ=trim($_POST["txtConcepFactServ"]);
		if($selTipPago=='total'){
			$caSql = "SELECT count(*) FROM fact_serv_profesionales WHERE pro_codigo='$selCodProyecto' AND fact_serv_prof_numero='$txtNumFactServ'";
			$rs=$db->Execute($caSql);
			while (!$rs->EOF) {
				$varCont = $rs->fields[0];
				$rs->MoveNext();
			}
			if ($varCont != 0){
				alert('Error: La factura ya existe');
				include_once("../scripts/modulo/factServProf/form/frmCrearPagoFactServ.php");
				exit();
			}else{
				$caSql="INSERT INTO fact_serv_profesionales 
									(pro_codigo,fact_serv_prof_numero,fact_serv_prof_fech_pago,fact_serv_prof_abono,fact_serv_prof_valor,fact_serv_prof_concepto) 
									VALUES ('$selCodProyecto','$txtNumFactServ','$txtFecPagFactServ',0,'$txtValPagFactServ','$txtConcepFactServ')";
				$db->Execute($caSql);
			}
		}else{
			$caSql = "SELECT count(*) FROM fact_serv_profesionales WHERE pro_codigo='$selCodProyecto' AND fact_serv_prof_numero='$txtNumFactServ' AND fact_serv_prof_valor!=0";
			$rs=$db->Execute($caSql);
			while (!$rs->EOF) {
				$varCont = $rs->fields[0];
				$rs->MoveNext();
			}
			if ($varCont != 0){
				alert('Error: La factura ya existe');
				include_once("../scripts/modulo/factServProf/form/frmCrearPagoFactServ.php");
				exit();
			}
			$caSql="INSERT INTO fact_serv_profesionales 
								(pro_codigo,fact_serv_prof_numero,fact_serv_prof_fech_pago,fact_serv_prof_abono,fact_serv_prof_valor,fact_serv_prof_concepto) 
								VALUES ('$selCodProyecto','$txtNumFactServ','$txtFecPagFactServ','$txtValPagFactServ',0,'$txtConcepFactServ')";
			$db->Execute($caSql);
		}
		
		alert("La factura de pago se grabo exitosamente!");
	}
	
	include_once("../scripts/modulo/factServProf/form/frmCrearPagoFactServ.php");

?>