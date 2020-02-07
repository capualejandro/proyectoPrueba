<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera=trim($_POST["txtBandera"]);

	if($txtBandera!=""){
#		$cadena = preg_replace("[ó]","Ó",$_POST["txtNomProy"]);
#		echo $cadena; exit();
		$txtCodProy=mayusculas($_POST["txtCodProy"]);
		$txtNomProy=mayusculas($_POST["txtNomProy"]);
		$txtFecIniProy=trim($_POST["txtFecIniProy"]);
		$txtFecFinProy=trim($_POST["txtFecFinProy"]);
		$txtCliProy=mayusculas(trim($_POST["txtCliProy"]));
		$txtDirProy=mayusculas(trim($_POST["txtDirProy"]));
		$txtValProy=trim($_POST["txtValProy"]);
		$txtPorProy=trim($_POST["txtPorProy"]);
		$txtPorAntic=trim($_POST["txtPorAntic"]);
		$txtPorIva=trim($_POST["txtPorIva"]);
		$txtDesProy=mayusculas(trim($_POST["txtDesProy"]));
		$txtLogin=mayusculas(trim($_SESSION["usu_login"]));
		
		$caSql = "SELECT count(*) FROM proyectos WHERE pro_codigo ='$txtCodProy'";
		$rs=$db->Execute($caSql);
		while (!$rs->EOF) {
			$varCont = $rs->fields[0];
			$rs->MoveNext();
		}
		if ($varCont != 0){
			alert('Error: El proyecto ya existe');
			include_once("../scripts/modulo/usuario/form/frmProyecto.php");
		}else{
#			echo "$varCont<br>";
			$valProSinIva=$txtValProy/(1+($txtPorIva/100));
			$caSql = "INSERT INTO proyectos (pro_codigo,pro_nombre,pro_fech_ini,pro_fech_fin,pro_cliente,pro_director,
								pro_valor_contrato,pro_valor_cont_sin_iva,pro_porcentaje,pro_porcentaje_antic,pro_iva,pro_descripcion,usu_login) 
								VALUES ('$txtCodProy','$txtNomProy','$txtFecIniProy','$txtFecFinProy','$txtCliProy','$txtDirProy',
								$txtValProy,$valProSinIva,$txtPorProy,$txtPorAntic,$txtPorIva,'$txtDesProy','$txtLogin')";
#			echo "$txtLogin - $txtClave<br>$caSql";exit();
			$db->Execute($caSql);

			$txtBandera = "";
			unset($db);
			alert("El proyecto se grabo exitosamente!");
		}
		
	}
	
#	echo "Alexandra - varUsuario=$varUsuario - Bandera=$txtBandera<br>";
	include_once("../scripts/modulo/creaproyectos/form/frmProyecto.php");
#	exit();

?>