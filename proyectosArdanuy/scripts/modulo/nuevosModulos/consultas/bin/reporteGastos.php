<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera=trim($_POST["txtBandera"]);
	$codProyecto=$_GET['codProyecto'];
	
	$caSql="SELECT pro_codigo,pro_nombre,pro_fech_ini,pro_fech_fin,pro_cliente,pro_director,pro_valor_contrato,
	 				pro_valor_cont_sin_iva,pro_porcentaje,pro_porcentaje_antic,pro_descripcion,usu_login 
					FROM proyectos 
					WHERE pro_codigo='$codProyecto'";
	$arProyectos=$db->GetArray($caSql);
	for($i=0; $i<count($arProyectos); $i++){
		$jefProyecto=trim($arProyectos[$i][4]);
		$dirProyecto=trim($arProyectos[$i][5]);
	}

	$caSql="SELECT cont_nomcontratista FROM contrato WHERE pro_codigo='$codProyecto'";
	$arContrato=$db->GetArray($caSql);
	for($i=0; $i<count($arContrato); $i++){
		$cont_nomcontratista=trim($arContrato[$i][0]);
	}

	$caSql="SELECT YEAR(gpro_fecha),MONTH(gpro_fecha),gpro_valor_total,gpro_fecha FROM gastos_proyectos WHERE pro_codigo='$codProyecto'";
	$arGastos=$db->GetArray($caSql);
	
#	echo "Alexandra - varUsuario=$varUsuario - Bandera=$txtBandera<br>";
#	printMsg("Los permisos se asignarion exitosamente!");

	include_once("../scripts/modulo/consultas/form/frmReporteGastos.php");

?>