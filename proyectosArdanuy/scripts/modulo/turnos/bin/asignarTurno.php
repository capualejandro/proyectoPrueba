<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera = $_POST['txtBandera'];
	$selMes = trim($_POST['selMes']);
	$selAnio = trim($_POST['selAnio']);
	if($txtBandera!=""){
		echo getMonthDays($selMes, $selAnio);
		include_once("../scripts/modulo/turnos/form/frmAsignarTurno.php");
	}else{
		include_once("../scripts/modulo/turnos/form/frmAsignarTurno.php");
	}

?>