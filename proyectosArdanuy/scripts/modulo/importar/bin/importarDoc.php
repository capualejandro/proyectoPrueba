<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera=trim($_POST["txtBandera"]);
#	echo "Alexa"; exit();

	if($txtBandera!=""){
		$selCodProyecto=trim($_POST["selCodProyecto"]);
		$txtNumDoc=mayusculas(trim($_POST["txtNumDoc"]));
		$txtNomDoc=mayusculas(trim($_POST["txtNomDoc"]));
		$txtDescripDoc=mayusculas(trim($_POST["txtDescripDoc"]));
		
		$caSql = "SELECT count(*) FROM documentos WHERE pro_codigo='$selCodProyecto'";
#		echo "<pre>$caSql</pre>"; exit();
		$rs=$db->Execute($caSql);
		while (!$rs->EOF) {
			$varCont = $rs->fields[0];
			$rs->MoveNext();
		}
		if ($varCont != 0){
			alert('Error: El documento ya existe');
			include_once("../scripts/modulo/usuario/form/frmImportarDoc.php");
		}else{
#			echo "$varCont<br>";
			$caSql = "INSERT INTO documentos (doc_codigo,pro_codigo,doc_nombre,doc_descrip) 
					  VALUES ('$txtNumDoc','$selCodProyecto','$txtNomDoc','$txtDescripDoc')";
#			echo "$txtLogin - $txtClave<br>$caSql";exit();
			$db->Execute($caSql);

			$txtBandera = "";
#			unset($db);
			alert("El documento se importo satisfactoriamente!");
		}
		
	}
	
#	echo "Alexandra - varUsuario=$varUsuario - Bandera=$txtBandera<br>";
	include_once("../scripts/modulo/importar/form/frmImportarDoc.php");
#	exit();

?>