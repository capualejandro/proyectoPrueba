<?php

	error_reporting(E_ERROR);
	include_once("../scripts/adodb5/adodb.inc.php");
	include_once("../scripts/adodb5/adodb-exceptions.inc.php");

#Conexion MySQL
#	$motorBD="MySQL"; $sevidorBD="127.0.0.1"; $usuarioBD="root"; $claveBD=""; $basedatos="fichaproyectos";
	$motorBD="mysqli"; $sevidorBD="127.0.0.1"; $usuarioBD="root"; $claveBD=""; $basedatos="fichaproyectos";

#Conexion SQL Server
#	$motorBD="mssql"; $sevidorBD="192.168.7.120"; $usuarioBD="sa"; $claveBD="hpml370g%"; $basedatos="HorasExtras";

	$db=&ADONewConnection($motorBD); #Aquí le decimos que motor base de datos queremos trabajar
	$db->Pconnect($sevidorBD, $usuarioBD, $claveBD, $basedatos); #"servidor","usuario","contraseña","basededatos"

	$dbMenu = &ADONewConnection($motorBD); #Aquí le decimos motor que base de datos queremos trabajar
	$dbMenu->Pconnect($sevidorBD, $usuarioBD, $claveBD, $basedatos); #"servidor","usuario","contraseña","basededatos"

	$dbSubMenu = &ADONewConnection($motorBD); #Aquí le decimos motor que base de datos queremos trabajar
	$dbSubMenu->Pconnect($sevidorBD, $usuarioBD, $claveBD, $basedatos); #"servidor","usuario","contraseña","basededatos"

#	mysql_set_charset('utf8');
	mysqli_set_charset('utf8');
	session_start();
//	echo "Conexiones";

?>