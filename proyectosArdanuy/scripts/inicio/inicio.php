<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/lib/libFunBasicas.php");

	$txtBandera=trim($_POST["txtBandera"]);
	
	if($varUsuario!=""){
		include_once("../scripts/inicio/top.php");
		include_once("frm/frmInicio.php");
	}else if($txtBandera!=""){
		$numReg="";
		$txtUsuario = trim($_POST["txtUsuario"]);
		$txtClave = trim($_POST["txtClave"]);
		$caSql = "SELECT a.usu_login, b.fun_nombre, b.fun_apellido, b.fun_estado FROM usuario AS a, funcionario AS b 
				  WHERE a.usu_login='$txtUsuario' AND a.usu_clave='".md5($txtClave)."' 
				  AND a.fun_identificacion=b.fun_identificacion AND b.fun_estado='A'";
		$arr = $db->GetArray($caSql);
		$numReg = count($arr);
		if($numReg!='' || $numReg!='NULL'){
			for($i=0; $i<count($arr); $i++){
#			while (!$rs->EOF) {
				$_SESSION["usu_login"] = minusculas(trim($arr[$i][0]));
				$_SESSION["usu_nombr"] = minusculasInicial($arr[$i][1]." ".$arr[$i][2]);
				$_SESSION["autentificado"]= "SI";
				$_SESSION["ultimoAcceso"]= date("Y-n-j H:i:s");
				$estado=trim($arr[$i][3]); 
			}
	 	include_once("../scripts/modulo/consultas/bin/listadoProyectos.php");
			$txtBandera = "";
			unset($db);
		}else{
			if($estado=="I") alert("Usuario Inactivo");
			else alert("Usuario o contraseña no valida por favor verifique estos datos.");
			$caSql=$numReg=$txtBandera="";
			unset($db);unset($rs);unset($arr);
			include_once("frm/frmLogin.php");
		}
	}else{
		include_once("frm/frmLogin.php");
	}

?>