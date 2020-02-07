<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

#	$txtBandera=trim($_POST["txtBandera"]);
#	$cad="Alejandro ama mucho a 'Sofia' y a Alexandra  ";
#	echo "$cad<br>";
#	echo "IP: ".getenv('REMOTE_ADDR')." Chop: ".chop($cad)." AddSlashes: ".AddSlashes($cad)." Hora: ".date("H:i:s")."<br>";
#	echo '<br><center><img src="./img/enCostruccion.gif" /></center>';
	
	if($txtBandera!=""){
		echo "Bandera=$txtBandera Usuario=".$_SESSION["usu_login"];
	}else{
		$caSql="SELECT a.usu_codigo, a.usu_login, b.fun_identificacion, b.fun_nombre, b.fun_apellido, a.usu_fechacreacion, b.fun_telefono, b.fun_estado 
				FROM usuario AS a, funcionario AS b
				WHERE a.fun_identificacion=b.fun_identificacion";
		$arUsu = $db->GetArray($caSql);
#		echo "$caSql<br>".count($arUsu[0])."<br>";
#		for($i=0; $i<count($arUsu); $i++){
#			echo minusculasInicial($arUsu[$i][3]." ".$arUsu[$i][4])."<br>";
#		}
#		var_dump($arUsu);
#		for($i=0; $i<count($arUsu); $i++){
#			for($j=0; $j<count($arUsu[$i]); $j++){
#				echo $arUsu[$i][$j]."<br>";
#			}
#		}
		include_once("../scripts/modulo/usuario/form/frmListadoUsuarios.php");
	}

?>