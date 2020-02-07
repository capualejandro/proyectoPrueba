<?php

//	echo "sofia";exit();
	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

#	$txtBandera=trim($_POST["txtBandera"]);
	$codProyecto=$_GET['codProyecto'];
	$tipDoc=$_GET['tipDoc'];
	
	$cadSql="SELECT id_documento,pro_codigo,tip_documento,rut_documento,des_documento 
									FROM documentos WHERE tip_documento='$tipDoc' AND pro_codigo='$codProyecto'";
#	echo $caSql;
	$arreglo=$db->GetArray($cadSql);

	include_once("../scripts/modulo/consultas/form/frmDocumentos.php");

?>