<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera=trim($_POST["txtBandera"]);

	if($txtBandera!=""){
		$selCodProyecto=mayusculas(trim($_POST["selCodProyecto"]));
		$selCodSocio=trim($_POST['selCodSocio']);
		$txtConcepUtilidad=mayusculas(trim($_POST['txtConcepUtilidad']));				
		$txtFecUtilidad=mayusculas(trim($_POST['txtFecUtilidad']));
		$txtValTotUtilidad=trim($_POST["txtValTotUtilidad"]);

#		$caSql="SELECT count(*) FROM utilidades WHERE pro_codigo ='$selCodProyecto'";
#		$rs=$db->Execute($caSql);
#		while (!$rs->EOF) {
#			$varCont = $rs->fields[0];
#			$rs->MoveNext();
#		}
#		if ($varCont != 0){
#			alert('Error: La utilidad ya existe');   
#			include_once("../scripts/modulo/usuario/form/frmCrearUtilidades.php");
#		}else{
			$cadSql="INSERT INTO utilidades (pro_codigo,soc_codigo,uti_concepto,uti_fecha,uti_valor) 
					  	 VALUES ('$selCodProyecto','$selCodSocio','$txtConcepUtilidad','$txtFecUtilidad','$txtValTotUtilidad')";
			$db->Execute($cadSql);

			$txtBandera = "";
			alert("La utilidad se grabo exitosamente!");
#			alert("El pago se grabo exitosamente!");
			include_once("/inicio/inicio.php");
#		}
		
	}
	include_once("../scripts/modulo/utilidades/form/frmCrearUtilidades.php");
#	exit();



?>