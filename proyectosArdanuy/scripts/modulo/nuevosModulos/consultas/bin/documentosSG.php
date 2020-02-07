<?php
#	echo "sofia";exit();
	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera=trim($_POST["txtBandera"]);
	$selTipDocSG=trim($_POST["selTipDocSG"]);

	$cadSql="SELECT DISTINCT tip_documentos_ss FROM documentos_sistgest";
#	$arreglo=$db->GetArray($cadSql);
	
	$arTipDoc = $db->GetArray($cadSql);
	$arTipDocSG = array(''=>'Seleccione');
	for($i=0; $i<count($arTipDoc); $i++){
		$arTipDocSG[$arTipDoc[$i][0]] = $arTipDoc[$i][0];
	}

	if($txtBandera!="" && $selTipDocSG!=""){
		$cadSql="SELECT cod_documentos_ss,ver_documentos_ss,tip_documentos_ss,nom_documentos_ss,fec_documentos_ss,rut_documentos_ss FROM documentos_sistgest
											WHERE tip_documentos_ss='$selTipDocSG'";
		$arDocSG = $db->GetArray($cadSql);
	}


#	echo "$cadSql"; exit();

	include_once("../scripts/modulo/consultas/form/frmDocumentosSG.php");

?>