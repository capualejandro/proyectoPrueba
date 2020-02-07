<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera=trim($_POST["txtBandera"]);
#	echo "Alexa"; exit();

	if($txtBandera!=""){
		$selCodProyecto=trim($_POST["selCodProyecto"]);
		$txtContNum=mayusculas(trim($_POST["txtContNum"]));
		$txtClasCont=mayusculas(trim($_POST["txtClasCont"]));
		$txtObjCont=mayusculas(trim($_POST["txtObjCont"]));
		$txtNombContrCont=mayusculas($_POST["txtNombContrCont"]);
		$txtNitCont=trim($_POST["txtNitCont"]);
		$txtDirCont=mayusculas($_POST["txtDirCont"]);
		$txtTelCont=trim($_POST["txtTelCont"]);
		$selPais=mayusculas(trim($_POST["selPais"]));
		$selCiudad=mayusculas(trim($_POST["selCiudad"]));
#		$txtDescripCont=mayusculas(trim($_POST["txtDescripCont"]));
		
		$caSql = "SELECT count(*) FROM contrato WHERE pro_codigo='$selCodProyecto'";
#		echo "<pre>$caSql</pre>"; exit();
		$rs=$db->Execute($caSql);
		while (!$rs->EOF) {
			$varCont = $rs->fields[0];
			$rs->MoveNext();
		}
		if ($varCont != 0){
			alert('Error: El contratista ya existe');
			include_once("../scripts/modulo/usuario/form/frmContrato.php");
		}else{
#			echo "$varCont<br>";
			$caSql = "INSERT INTO CONTRATO (cont_numero,cont_clase,cont_objeto,pro_codigo,cont_nomcontratista,
											cont_nit,cont_direccion,cont_ciudad,cont_pais,cont_telefono) 
					  				VALUES ('$txtContNum','$txtClasCont','$txtObjCont','$selCodProyecto',
									'$txtNombContrCont','$txtNitCont','$txtDirCont','$selCiudad','$selPais','$txtTelCont')";
#			echo "$txtLogin - $txtClave<br>$caSql";exit();
			$db->Execute($caSql);

			$txtBandera = "";
#			unset($db);
			alert("El contratista se grabo exitosamente!");
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
	include_once("../scripts/modulo/contratos/form/frmCrearContrato.php");
#	exit();

?>