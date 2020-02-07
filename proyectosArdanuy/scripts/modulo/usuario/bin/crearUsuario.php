<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera=trim($_POST["txtBandera"]);

	if($txtBandera!=""){
		$selFuncionario = trim($_POST["selFuncionario"]);
		$txtLogin = mayusculas(trim($_POST["txtLogin"]));
		$txtClave = trim($_POST["txtClave"]);
		$usuCrea = $_SESSION["usu_login"];
		$selTipoUsuario = $_POST["selTipoUsuario"];
		$fecCrea = date(Y."-".m."-".d);
		
		$caSql = "SELECT count(*) FROM usuario WHERE usu_login ='$txtLogin'";
		$rs=$db->Execute($caSql);
		while (!$rs->EOF) {
			$varCont = $rs->fields[0];
			$rs->MoveNext();
		}
		if ($varCont != 0){
			$caSql = "SELECT fun_identificacion, fun_nombre, fun_apellido FROM funcionario 
					  WHERE fun_identificacion NOT IN(SELECT fun_identificacion FROM usuario)";
			$arFun = $db->GetArray($caSql);
	
			$arFuncionario = array(''=>'Seleccione');
			for($i=0; $i<count($arFun); $i++){
				$arFuncionario[$arFun[$i][0]] = $arFun[$i][1]." ".$arFun[$i][2];
			}

			alert('Error: El usuario ya existe');
			include_once("../scripts/modulo/usuario/form/frmCrearUsuario.php");
		}else{
# Codigo para consecutivo
			$caSql = "SELECT MAX(usu_codigo) FROM usuario";
			$rs=$db->Execute($caSql);
			while (!$rs->EOF) {
				$varConsecutivo = $rs->fields[0]+1;
				$rs->MoveNext();
			}

			$caSql = "INSERT INTO usuario (usu_codigo, fun_identificacion, usu_login, usu_clave, usu_crea, usu_tipo, usu_fechacreacion) 
					  VALUES ($varConsecutivo, '$selFuncionario', '$txtLogin', '".md5($txtClave)."', '$usuCrea', $selTipoUsuario, '$fecCrea')";
#			echo "$txtLogin - $txtClave<br>$caSql";exit();
			$db->Execute($caSql);

			$caSql="INSERT INTO usuariomodulo (usm_codigo, mod_codigo, usu_login) 
					VALUES (0, 'INICIO', '$txtLogin'), (0, 'SESION', '$txtLogin'), (0, 'FIN', '$txtLogin')";
			$db->Execute($caSql);

			$txtBandera = "";
			unset($db);
#			printMsg("El usuario se grabo exitosamente!");
			alert("El funcionario se grabo exitosamente!");
			Atras_menu("INICIO");
		}
	}else{
		$caSql = "SELECT fun_identificacion, fun_nombre, fun_apellido FROM funcionario 
				  WHERE fun_identificacion NOT IN(SELECT fun_identificacion FROM usuario)";
#		echo "<br>$caSql<br>"; exit();
		$arFun = $db->GetArray($caSql);

		$arFuncionario = array(''=>'Seleccione');
		for($i=0; $i<count($arFun); $i++){
#			echo $arFun[$i]["fun_identificacion"]." ".$arFun[$i]["fun_nombre"]." ".$arFun[$i]["fun_apellido"]."<br>";
			$arFuncionario[$arFun[$i][0]] = $arFun[$i][1]." ".$arFun[$i][2];
		}

		$selPadre = "";
		$txtNombre = "";
		$txtDescripcion = "";
		$txtHTMLMenu = "";
		$txtOrdenPadre = "";
		$txtOrdenMenu = "";
		$selAccesoPublico = "";
		include_once("../scripts/modulo/usuario/form/frmCrearUsuario.php");
	}
//	echo "Alexandra - varUsuario=$varUsuario<br>";mod_codigo, mod_descripcion
//	exit();

?>