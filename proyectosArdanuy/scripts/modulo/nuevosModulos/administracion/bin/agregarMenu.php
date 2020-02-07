<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera=trim($_POST["txtBandera"]);

	if($txtBandera!=""){
		$selPadre = mayusculas(trim($_POST["selPadre"]));
		$txtNombre = mayusculas(trim($_POST["txtNombre"]));
		$txtDescripcion = minusculasInicial(trim($_POST["txtDescripcion"]));
		$txtHTMLMenu = trim($_POST["txtHTMLMenu"]);
		$txtOrdenPadre = trim($_POST["hddOrdenPadre"]);
		$txtOrdenMenu = trim($_POST["hddOrdenMenu"]);
		$selAccesoPublico = trim($_POST["selAccesoPublico"]);
		
		$caSql = "SELECT count(*) FROM modulo WHERE mod_codigo='$txtNombre'";
		$rs=$db->Execute($caSql);
		while (!$rs->EOF) {
			$varCont = $rs->fields[0];
			$rs->MoveNext();
		}
		if ($varCont != 0){
			$caSql = "SELECT mod_codigo, mod_descripcion FROM modulo WHERE mod_padre='0'";
			$rs=$db->Execute($caSql);
	
			$arModulo = array(''=>'Seleccione', '0' => 'Sin Padre');
			while (!$rs->EOF) {
				$arModulo[$rs->fields[0]] = $rs->fields[1];;
				$rs->MoveNext();
			}

			alert('Error: El modulo ya existe');
			include_once("../scripts/modulo/administracion/form/frmAgregarMenu.php");
		}else{

			$caSql = "INSERT INTO modulo (mod_codigo, mod_padre, mod_archivo, mod_descripcion, mod_ordenpadre, mod_orden, mod_visible) 
					VALUES ('$txtNombre', '$selPadre', '$txtHTMLMenu', '$txtDescripcion', '$txtOrdenPadre', '$txtOrdenMenu', '$selAccesoPublico')";
			$db->Execute($caSql);
#			echo $caSql; exit();

			$txtBandera = "";
			unset($db);
			printMsg("El modulo se grabo exitosamente!");
			Atras_menu("INICIO");
		}
	}else{
		$caSql = "SELECT mod_codigo, mod_descripcion FROM modulo WHERE mod_padre='0'";
		$arMod = $db->GetArray($caSql);

		$arModulo = array(''=>'Seleccione', '0' => 'Sin Padre');
		for($i=0; $i<count($arMod); $i++){
			$arModulo[$arMod[$i]["mod_codigo"]] = $arMod[$i]["mod_descripcion"];
		}
#			var_dump($arModulo);
#			echo $caSql; exit();

		$selPadre = "";
		$txtNombre = "";
		$txtDescripcion = "";
		$txtHTMLMenu = "";
		$txtOrdenPadre = "";
		$txtOrdenMenu = "";
		$selAccesoPublico = "";
		include_once("../scripts/modulo/administracion/form/frmAgregarMenu.php");
	}
//	echo "Alexandra - varUsuario=$varUsuario<br>";mod_codigo, mod_descripcion
//	exit();

?>
