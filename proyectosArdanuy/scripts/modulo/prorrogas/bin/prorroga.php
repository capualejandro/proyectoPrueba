<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera=trim($_POST["txtBandera"]);
#	echo "Alexa"; exit();

	if($txtBandera!=""){
		$selCodProyecto=trim($_POST["selCodProyecto"]);
		$txtNumPror=mayusculas(trim($_POST["txtNumPror"]));
		$txtNomPror=mayusculas(trim($_POST["txtNomPror"]));
		$txtFecIniPror=trim($_POST["txtFecIniPror"]);
		$txtFecFinPror=trim($_POST["txtFecFinPror"]);
		$txtValPror=trim($_POST["txtValPror"]);
		$txtIvaPror=trim($_POST["txtIvaPror"]);
		$txtDescripPror=mayusculas(trim($_POST["txtDescripPror"]));
		
		$caSql = "SELECT count(*) FROM prorrogas WHERE pro_codigo='$selCodProyecto' AND pror_numero='$txtNumPror'";
#		echo "<pre>$caSql</pre>"; exit();
		$rs=$db->Execute($caSql);
		while (!$rs->EOF) {
			$varCont = $rs->fields[0];
			$rs->MoveNext();
		}
		if ($varCont != 0){
			alert('Error: La prorroga ya existe');
			include_once("../scripts/modulo/usuario/form/frmProrrogas.php");
		}else{
#			echo "$varCont<br>";
			$caSql = "INSERT INTO prorrogas (pro_codigo,pror_numero,pror_nom_doc,pror_fech_ini,pror_fech_fin,pror_valor,pror_iva,pror_descripcion) 
					  VALUES ('$selCodProyecto','$txtNumPror','$txtNomPror','$txtFecIniPror','$txtFecFinPror',$txtValPror,$txtIvaPror,'$txtDescripPror')";
#			echo "$txtLogin - $txtClave<br>$caSql";exit();
			$db->Execute($caSql);

			$txtBandera = "";
#			unset($db);
			alert("La prorroga se grabo exitosamente!");
		}
		
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
	include_once("../scripts/modulo/prorrogas/form/frmProrroga.php");
#	exit();

?>