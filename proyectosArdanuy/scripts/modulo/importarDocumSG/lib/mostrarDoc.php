<?php
/**/
	include_once("../../../../scripts/adodb5/adodb.inc.php");
	include_once("../../../../scripts/adodb5/adodb-exceptions.inc.php");
	include_once("../../../../scripts/lib/libFunBasicas.php");
	include_once("../../../../scripts/lib/fechalib.php");
	$motorBD="MySQL"; $sevidorBD="127.0.0.1"; $usuarioBD="root"; $claveBD=""; $basedatos="fichaproyectos";
	$db=&ADONewConnection($motorBD); #Aquí le decimos que motor base de datos queremos trabajar
	$db->Pconnect($sevidorBD, $usuarioBD, $claveBD, $basedatos); #"servidor","usuario","contraseña","basededatos"
/**/

	$codProyecto = trim($_POST["codProyecto"]);
	$caSql="SELECT id_documento,pro_codigo,tip_documento,rut_documento,des_documento FROM documentos WHERE pro_codigo='".$codProyecto."'";
	$arDoc=$db->GetArray($caSql);
	for($i=0; $i<count($arDoc); $i++){
		$arrEle[$i]['id']=trim($arDoc[$i][0]);
		$arrEle[$i]['tip']=trim($arDoc[$i][2]);
		$arrEle[$i]['rut']=trim($arDoc[$i][3]);
		$arrEle[$i]['des']=trim($arDoc[$i][4]);
	}
	echo json_encode($arrEle);
#	var_dump($arrEle);

?>