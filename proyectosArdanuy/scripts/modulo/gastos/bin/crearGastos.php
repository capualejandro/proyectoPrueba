<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera=trim($_POST["txtBandera"]);

	if($txtBandera!=""){
		$selCodProyecto=mayusculas(trim($_POST["selCodProyecto"]));
		$txtFecGasto=mayusculas(trim($_POST['txtFecGasto']));
		$txtValTotGasto=trim($_POST["txtValTotGasto"]);
		$txtObse=mayusculas(trim($_POST["txtObse"]));
#		$txtIvaFact=trim($_POST["txtIvaFact"]);

#		$caSql = "SELECT count(*) FROM gastos_proyectos WHERE pro_codigo='$selCodProyecto'";
#		echo "<pre>$caSql</pre>"; exit();
#		$rs=$db->Execute($caSql);
#		while (!$rs->EOF) {
#			$varCont = $rs->fields[0];
#			$rs->MoveNext();
#		}
		if ($varCont != 0){
			alert('Error: El gasto ya existe');
			include_once("../scripts/modulo/usuario/form/frmCrearGastos.php");
		}else{
#			echo "$varCont<br>";
			$caSql = "INSERT INTO gastos_proyectos (pro_codigo,gpro_fecha,gpro_valor_total,gpro_descrip) 
					  VALUES ('$selCodProyecto','$txtFecGasto','$txtValTotGasto','$txtObse')";
#			echo "$txtLogin - $txtClave<br>$caSql";exit();
			$db->Execute($caSql);

			$txtBandera = "";
#			unset($db);
			alert("El gasto se grabo exitosamente!");
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
	include_once("../scripts/modulo/gastos/form/frmCrearGastos.php");
#	exit();



?>