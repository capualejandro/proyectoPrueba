<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera=trim($_POST["txtBandera"]);
	echo $_GET['valor'];

	if($txtBandera!=""){
		$txtContador=trim($_POST["txtContador"]);
		
		for($i=0; $i<$txtContador; $i++){
			if(trim($_POST["selCodProyecto".$i])!=''){
				$selCodProyecto=trim($_POST["selCodProyecto".$i]);
				$txtIden=trim($_POST["txtIden".$i]);
				$txtNomSocio=mayusculas($_POST["txtNomSocio".$i]);
				$txtPorcentaje=trim($_POST["txtPorcentaje".$i]);
				$caSql = "SELECT COUNT(*) FROM socio WHERE pro_codigo='$selCodProyecto' AND soc_codigo='$txtIden'";
				$rs=$db->Execute($caSql);
				while (!$rs->EOF) {
					$varCont = $rs->fields[0];
					$rs->MoveNext();
				}
				if ($varCont != 0){
					alert('Error: El socio con Identificación '.$txtIden.' ya existe ');
				}else{
					$caSql="INSERT INTO socio (pro_codigo,soc_codigo,soc_nombre,soc_porcentaje)
										VALUES('$selCodProyecto','$txtIden','$txtNomSocio',$txtPorcentaje)";
					$db->Execute($caSql);
				}
			}
		}

		alert("Los socios se grabo exitosamente!");
#		Atras_menu("INICIO");
#		exit();
	}
	
#	echo "Alexandra - varUsuario=$varUsuario - Bandera=$txtBandera<br>";
#	printMsg("Los permisos se asignarion exitosamente!");

	include_once("../scripts/modulo/crearsocio/form/frmCrearSocio.php");

?>