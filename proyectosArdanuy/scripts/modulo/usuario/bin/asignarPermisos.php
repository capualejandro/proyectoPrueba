<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera=trim($_POST["txtBandera"]);
	
	if($txtBandera!=""){
		$selUsuario=trim($_POST["selUsuario"]);
		$arMenu=$_POST["chkMenu"];
		$caSql="DELETE FROM usuariomodulo WHERE usu_login='$selUsuario' AND mod_codigo NOT IN ('INICIO', 'SESION', 'FIN')";
		$db->Execute($caSql);
#		echo "$caSql<br>";
		for($i=0; $i<count($arMenu); $i++){
			$caSql="INSERT INTO usuariomodulo (usm_codigo, mod_codigo, usu_login) VALUES (0, '".$arMenu[$i]."', '$selUsuario')";
			$db->Execute($caSql);
#			echo $caSql."<br>";
		}
		$txtBandera = "";
		unset($db);
		printMsg("Los permisos se asignarion exitosamente!");
		Atras_menu("INICIO");
#		var_dump($arMenu);
#		echo count($arMenu);
#		echo "<br>Bandera=$txtBandera Usuario=".$selUsuario;
	}else{
		$caSql="SELECT mod_codigo, mod_descripcion, mod_padre FROM modulo WHERE mod_codigo NOT IN ('INICIO', 'SESION', 'FIN') AND mod_padre='0'";
		$arModPad = $db->GetArray($caSql);

		$caSql="SELECT mod_codigo, mod_descripcion, mod_padre FROM modulo WHERE mod_codigo NOT IN ('INICIO', 'SESION', 'FIN') AND mod_padre!='0'";
		$arModHij = $db->GetArray($caSql);

		$caSql = "SELECT a.usu_login, b.fun_nombre, b.fun_apellido FROM usuario AS a, funcionario AS b WHERE a.fun_identificacion=b.fun_identificacion";
		$arUsu = $db->GetArray($caSql);

		$arUsuario = array(''=>'Seleccione');
		for($i=0; $i<count($arUsu); $i++){
			$arUsuario[$arUsu[$i][0]] = $arUsu[$i][0]." - ".minusculasInicial($arUsu[$i][1]." ".$arUsu[$i][2]);
		}

		$caSql="SELECT mod_codigo, usu_login FROM usuariomodulo";
		$arUsuMod = $db->GetArray($caSql);
		
		include_once("../scripts/modulo/usuario/form/frmAsignarPermisos.php");
	}
#			echo $arUsu[$i][0]." ".$arFun[$i][1]." ".$arFun[$i][2]."<br>";

#		echo "<br>$caSql<br>";

#		echo "<br>$caSql<br>".count($arModPad)."<br>";
#		for($i=0; $i<count($arModPad); $i++){
#			echo $arModPad[$i][0]." ".$arModPad[$i][1]." ".$arModPad[$i][2]."<br>";
#		}

#		echo "<br>$caSql<br>".count($arModHij)."<br>";
#		for($i=0; $i<count($arModHij); $i++){
#			echo $arModHij[$i][0]." ".$arModHij[$i][1]." ".$arModHij[$i][2]."<br>";
#		}

?>