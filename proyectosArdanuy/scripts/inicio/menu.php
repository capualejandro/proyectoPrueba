<?php

	include_once("../scripts/conexion/conexion.php");

	$caSql = "SELECT a.mod_codigo, a.mod_archivo, a.mod_descripcion 
			  FROM modulo AS a, usuariomodulo AS b 
			  WHERE a.mod_codigo = b.mod_codigo
			  AND b.usu_login = '".$_SESSION["usu_login"]."' 
			  AND a.mod_padre = '0' 
			  AND a.mod_codigo != 'INICIO'
			  ORDER BY a.mod_ordenpadre";

	$rsMenu = $dbMenu->Execute($caSql);
	$numReg=count($rsMenu);
#	echo "<pre>$caSql</pre>$numReg";
	$nuIdi = 0;
	$nuIdj = 0;
	while (!$rsMenu->EOF) {
		$mod_Padre = trim($rsMenu->fields[0]);
		$arDatos[$nuIdi][$nuIdj]["mod_codigo"] = trim($rsMenu->fields[0]);
		$arDatos[$nuIdi][$nuIdj]["mod_archivo"] = trim($rsMenu->fields[1]);
		$arDatos[$nuIdi][$nuIdj]["mod_descripcion"] = trim($rsMenu->fields[2]);

		$caSql = "SELECT a.mod_codigo, a.mod_archivo, a.mod_descripcion  
				  FROM modulo AS a, usuariomodulo AS b 
				  WHERE a.mod_codigo = b.mod_codigo
				  AND b.usu_login = '".$_SESSION["usu_login"]."' 
				  AND a.mod_padre != '0' 
				  AND a.mod_codigo != 'INICIO'
				  AND a.mod_visible = '1'
				  AND a.mod_padre = '$mod_Padre'
				  ORDER BY a.mod_orden";

#		echo "<pre>$caSql</pre>";
		$rsSubMenu = $dbSubMenu->Execute($caSql);
		while (!$rsSubMenu->EOF) {
			$nuIdj++;
			$arDatos[$nuIdi][$nuIdj]["mod_codigo"] = trim($rsSubMenu->fields[0]);
			$arDatos[$nuIdi][$nuIdj]["mod_archivo"] = trim($rsSubMenu->fields[1]);
			$arDatos[$nuIdi][$nuIdj]["mod_descripcion"] = trim($rsSubMenu->fields[2]);
			$rsSubMenu->MoveNext();
		}
	
		$nuIdj = 0;
		$nuIdi++;	
		$rsMenu->MoveNext();
	}

	include_once("frm/frmMenu.php");

	unset($dbMenu);
	unset($dbSubMenu);

?>