<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera=trim($_POST["txtBandera"]);
#	echo "Alexa"; exit();

	if($txtBandera!=""){
		$selTipDocSG=trim($_POST["selTipDocSG"]);
		$txtCodDocSG=mayusculas(trim($_POST["txtCodDocSG"]));
		$txtNomDocSG=mayusculas(trim($_POST["txtNomDocSG"]));
		$txtVerDocSG=trim($_POST["txtVerDocSG"]);
		$txtFecDocSG=trim($_POST["txtFecDocSG"]);
		
		$caSql = "SELECT count(*) FROM documentos_sistgest WHERE cod_documentos_ss='$txtCodDocSG' AND ver_documentos_ss='$txtVerDocSG'";
#		echo "<pre>$caSql</pre>"; exit();
		$rs=$db->Execute($caSql);
		while (!$rs->EOF) {
			$varCont = $rs->fields[0];
			$rs->MoveNext();
		}
		if ($varCont != 0){
			alert('Error: El documento ya existe');
			include_once("../scripts/modulo/importarDocumSG/form/frmImportarDocSg.php");
		}else{
#			echo "$varCont<br>";
#			$caSql = "INSERT INTO documentos_sistgest (doc_codigo,pro_codigo,doc_nombre,doc_descrip) 
			$caSql="INSERT INTO documentos_sistgest(cod_documentos_ss,tip_documentos_ss,nom_documentos_ss,ver_documentos_ss,fec_documentos_ss)
					  				VALUES ('$txtCodDocSG','$selTipDocSG','$txtNomDocSG','$txtVerDocSG','$txtFecDocSG')";
#			echo "$txtLogin - $txtClave<br>$caSql";exit();
			$db->Execute($caSql);

			$txtBandera = "";
#			unset($db);
			alert("El documento se importo satisfactoriamente!");
		}
		
	}
	
#	echo "Alexandra - varUsuario=$varUsuario - Bandera=$txtBandera<br>";
	include_once("../scripts/modulo/importarDocumSG/form/frmImportarDocSg.php");
#	exit();

?>