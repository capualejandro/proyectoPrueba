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
		$caSql="SELECT pro_codigo,pro_nombre,pro_fech_ini,pro_fech_fin,pro_descripcion,pro_cliente,
				pro_director,pro_valor_contrato,pro_porcentaje, usu_login
				FROM proyectos";
		$arPro = $db->GetArray($caSql);
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
		include_once("../scripts/modulo/creaproyectos/form/frmListadoProyectos.php");
	}

?>