<?php 

	include_once("../scripts/conexion/conexion.php");
//	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");
	session_start();

//	include_once("../scripts/adodb5/adodb.inc.php");
//	include_once("../scripts/adodb5/adodb-exceptions.inc.php");
//	$db=&ADONewConnection('MySQL'); #Aquí le decimos que base de datos queremos trabajar
//	$db->Pconnect("127.0.0.1", "root", "root", "horasextras"); #"servidor","usuario","contraseña","basededatos"

/* Codigo para caducar la session
    if(isset($_SESSION["autentificado"])){
		$fechaGuardada = $_SESSION["ultimoAcceso"]; 
		$ahora = date("Y-n-j H:i:s"); 
		if($_SESSION["autentificado"] != "SI"){
			header("Location:index.php?seccion=FIN");
		}else{
			$tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));
		}
		if($tiempo_transcurrido >= 600) {
			header("Location:index.php?seccion=FIN");
		}else {
			$_SESSION["ultimoAcceso"] = $ahora;
		}
	}	
#	echo $_SESSION["ultimoAcceso"]." - $tiempo_transcurrido";
/* Codigo para caducar la session*/

	$varSesion = $_REQUEST["seccion"];
	$varUsuario = $_SESSION["usu_login"];

	if ($varSesion == "" || $varUsuario == ""){
		$varSesion = "INICIO";
	}

	if ($varSesion != "" && $varUsuario != "" && $varSesion != "INICIO"){
		$caSql = "SELECT count(*) FROM usuariomodulo WHERE mod_codigo='$varSesion' AND usu_login='$varUsuario'";
		$rs=$db->Execute($caSql);
		while (!$rs->EOF) {
			$blEsta = $rs->fields[0];
			$rs->MoveNext();
		}
		if ($blEsta == 0) $varSesion = "ERROR";
	}
	$varArchivo = "error.php";

	if ($varSesion != "ERROR"){
		$caSql = "SELECT mod_codigo, mod_archivo, mod_descripcion FROM modulo WHERE mod_codigo='$varSesion'";
		$rs=$db->Execute($caSql);
		while (!$rs->EOF) {
			$varArchivo = $rs->fields[1];
			$_SESSION["mod_descripcion"] = $rs->fields[2];
			$rs->MoveNext();
		}
		unset($rs);
	}
	
#	echo "varSesion=$varSesion - varUsuario=$varUsuario - varArchivo=$varArchivo - SQL=$caSql";
#	exit();

	if (file_exists("../scripts".$varArchivo)) {
		include_once("../scripts".$varArchivo);
	}else{
	  alert('El usuario no tiene privilegios para ejecutar esa opcion.');
	  include_once("../scripts/inicio/inicio.php");
	}	


?>
