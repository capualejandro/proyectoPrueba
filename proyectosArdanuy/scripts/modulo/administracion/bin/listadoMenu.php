<?php
#echo "OK"; exit();

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
		$caSql="";
		$caSql="SELECT mod_codigo,mod_padre,mod_archivo,mod_descripcion,mod_opcion,mod_ordenpadre,mod_orden,mod_visible FROM modulo WHERE mod_padre!='0' ORDER BY 2,7";
		$arMenu = $db->GetArray($caSql);
#echo "$caSql";

		$caSql="";
		$caSql = "SELECT mod_codigo, mod_descripcion FROM modulo WHERE mod_padre='0'";
		$rs=$db->Execute($caSql);

		$arModulo = array(''=>'Seleccione', '0' => 'Sin Padre');
		while (!$rs->EOF) {
			$arModulo[$rs->fields[0]] = $rs->fields[1];;
			$rs->MoveNext();
		}

		include_once("../scripts/modulo/administracion/form/frmListadoMenu.php");
	}

?>