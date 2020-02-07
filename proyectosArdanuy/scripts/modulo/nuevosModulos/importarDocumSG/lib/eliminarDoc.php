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

	$idDoc = trim($_POST["id"]);
	$caSql="SELECT rut_documento FROM documentos WHERE id_documento=$idDoc";
	$arDoc=$db->GetArray($caSql);
	for($i=0; $i<count($arDoc); $i++){
		$rutaDoc=trim($arDoc[$i][0]);
	}
	$ruta="../../../../www/documentos/".$rutaDoc;
	if(file_exists("$ruta")) {
		unlink("$ruta");
		$caSql="DELETE FROM documentos WHERE id_documento=$idDoc";
		$db->Execute($caSql);

		$caSql="SELECT count(*) FROM documentos";
		$rs=$db->Execute($caSql);
		while (!$rs->EOF) {
			$varCont=$rs->fields[0];
			$rs->MoveNext();
		}
		if($varCont==0){
			$cadSql="TRUNCATE TABLE documentos";
			$db->Execute($cadSql);
		}

		echo 1;
	}else{
		echo 0;
	}
#	echo json_encode($arrEle);
#	var_dump($arrEle);

?>