<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");
	#$_SESSION["usu_login"] - $_SESSION["usu_nombr"]

#	$cad="Alejandro ama mucho a 'Sofia' ";/inicio/inicio.php /inicio/frmFin.php
	
	$txtBandera=trim($_POST["txtBandera"]);
	if($txtBandera!=""){
		$hidUsuCod=trim($_POST["hidUsuCod"]);
		$hidFunCod=trim($_POST["hidFunCod"]);
		$txtNumIden=trim($_POST["txtNumIden"]);
		$txtNombre=mayusculas(trim($_POST["txtNombre"]));
		$txtApellido=mayusculas(trim($_POST["txtApellido"]));
		$txtTelefono=trim($_POST["txtTelefono"]);
		$txtClave=trim($_POST["txtClave"]);
		$cadSql="UPDATE funcionario SET fun_nombre='".$txtNombre."', fun_apellido='".$txtApellido."', fun_telefono='".$txtTelefono."', fun_identificacion='".$txtNumIden."' 
						 WHERE funcionario.fun_codigo=".$hidFunCod;
#		echo $cadSql
		$db->Execute($cadSql);
		
		if($txtClave==''){
			$cadSql="UPDATE usuario SET fun_identificacion='".$txtNumIden."' WHERE usuario.usu_codigo=".$hidUsuCod;
			$db->Execute($cadSql);
			alert("El usuario se actualizo exitosamente!");
			include_once("../scripts/modulo/usuario/form/frmModificarUsuario.php");
		}else{
			$cadSql="UPDATE usuario SET fun_identificacion='".$txtNumIden."', usu_clave='".md5($txtClave)."' WHERE usuario.usu_codigo=".$hidUsuCod;
			$db->Execute($cadSql);
			alert("El usuario se actualizo exitosamente! Por favor vuelva a loguearse con la nueva contraseña");
/*			echo '<script type="text/javascript"> window.location="./index.php?seccion=FIN"; </script>'; */
			echo '<script type="text/javascript"> $(location).attr("href","./index.php?seccion=FIN"); </script>';
#			include_once("../scripts/inicio/frmFin.php");
		}
		
#		echo "<pre>$cadSql</pre>$hidUsuCod,$hidFunCod Bandera=$txtBandera Usuario=".$_SESSION["usu_login"]; exit();
	}else{
		$caSql="SELECT usuario.fun_identificacion,funcionario.fun_nombre,funcionario.fun_apellido,
						funcionario.fun_telefono,funcionario.fun_estado,usuario.usu_codigo,funcionario.fun_codigo
						FROM usuario 
						INNER JOIN funcionario ON usuario.fun_identificacion=funcionario.fun_identificacion
						WHERE usuario.usu_login='".$_SESSION['usu_login']."'";
#		echo $caSql;
		$arUsu = $db->GetArray($caSql);
#		echo "$caSql<br>".count($arUsu)."<br>";
		for($i=0; $i<count($arUsu); $i++){
			$txtNumIden=trim($arUsu[$i][0]);
			$txtNombre=trim($arUsu[$i][1]);
			$txtApellido=trim($arUsu[$i][2]);
			$txtTelefono=trim($arUsu[$i][3]);
			$hidUsuCod=trim($arUsu[$i][5]);
			$hidFunCod=trim($arUsu[$i][6]);
		}
	}
		
		include_once("../scripts/modulo/usuario/form/frmModificarUsuario.php");
#	}

?>