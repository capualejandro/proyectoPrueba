<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera=trim($_POST["txtBandera"]);
#	echo "Alexa"; exit();

	if($txtBandera!=""){
		$selCodProyecto=trim($_POST["selCodProyecto"]);
		$txtNumAdic=mayusculas(trim($_POST["txtNumPror"]));
		$txtNomAdic=mayusculas(trim($_POST["txtNomPror"]));
		$txtFecIniAdic=mayusculas(trim($_POST['txtFecIniAdic']));
		$txtFecFinAdic="0000-00-00";
		$txtValAdic=trim($_POST["txtValAdic"]);
		$txtIvaAdic=trim($_POST["txtIvaAdic"]);
		$txtDescripAdic=mayusculas(trim($_POST["txtDescripPror"]));
		
		$caSql = "SELECT count(*) FROM adiciones WHERE pro_codigo='$selCodProyecto' AND adic_numero='$txtNumPror'";
#		echo "<pre>$caSql</pre>"; exit();
		$rs=$db->Execute($caSql);
		while (!$rs->EOF) {
			$varCont = $rs->fields[0];
			$rs->MoveNext();
		}
		if ($varCont != 0){
			alert('Error: La Adicion ya existe');
			include_once("../scripts/modulo/adiciones/form/frmAdicion.php");
		}else{
#			echo "$varCont<br>";
			$caSql = "INSERT INTO adiciones (pro_codigo,adic_numero,adic_nom_doc,adic_fech_ini,adic_fech_fin,adic_valor,adic_iva,adic_descripcion) 
					  VALUES ('$selCodProyecto','$txtNumAdic','$txtNomAdic','$txtFecIniAdic','$txtFecFinAdic',$txtValAdic,$txtIvaAdic,'$txtDescripAdic')";
#			echo "$txtLogin - $txtClave<br>$caSql";exit();
			$db->Execute($caSql);

			$txtBandera = "";
#			unset($db);
			alert("La Adicion se grabo exitosamente!");
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
	include_once("../scripts/modulo/adiciones/form/frmAdicion.php");
#	exit();

?>