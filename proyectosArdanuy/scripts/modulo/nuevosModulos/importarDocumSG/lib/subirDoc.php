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

	if(isset($_FILES['filDocSG'])) {
		$archivo = $_FILES['filDocSG'];
		$extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
		if($extension=='pdf' || $extension=='doc' || $extension=='docx' || $extension=='zip' || $extension=='rar'){
			$time = date("Y-m-d-H-i-s");
			$tipDocumento=$_REQUEST['tipDocumento'];
			$codProyecto=mayusculas($_REQUEST['codDocumento']);
			$desDocumento=mayusculas($_REQUEST['nomDocumento']);
			$verDocumento=trim($_REQUEST['txtVerDocSG']);
			$fecDocumento=trim($_REQUEST['txtFecDocSG']);

			$caSql = "SELECT count(*) FROM documentos_sistgest WHERE cod_documentos_ss='$codProyecto' AND ver_documentos_ss='$verDocumento'";
			$rs=$db->Execute($caSql);
			while (!$rs->EOF) {
				$varCont = $rs->fields[0];
				$rs->MoveNext();
			}
			if ($varCont != 0){
				echo 2;
#				alert('Error: El documento ya existe');
#				include_once("../scripts/modulo/importarDocumSG/form/frmImportarDocSg.php");
				exit();
			}

			$directorio1="../../../../www/documentosSG/$tipDocumento/";
			if(!file_exists($directorio1)){
#				mkdir($directorio1);
#				chmod($directorio1,0777); 
				mkdir($directorio1,0777,true);
			}
#			echo "$directorio1"; exit();
	
			$directorio2="../../../../www/documentosSG/$tipDocumento/$codProyecto/$desDocumento/$verDocumento";
			if(!file_exists($directorio2)){
				mkdir($directorio2,0777,true);
#				mkdir($directorio2);
#				chmod($directorio2,0777); 
			}
#			echo "$directorio2"; exit();
			
			$nombre=$desDocumento."_$time.$extension";
			$ruta="$tipDocumento/$codProyecto/$desDocumento/$verDocumento/$nombre";
			if(move_uploaded_file($archivo['tmp_name'], $directorio2."/$nombre")) {
				$caSql="INSERT INTO documentos_sistgest(cod_documentos_ss,tip_documentos_ss,rut_documentos_ss,nom_documentos_ss,ver_documentos_ss,fec_documentos_ss)
												VALUES('$codProyecto','$tipDocumento','$ruta','$desDocumento','$verDocumento','$fecDocumento')";
				$db->Execute($caSql);
				echo 1;
			}else{
				echo 0;
			}
		}else{
			echo 0;
		}
	}
	
/**
		$nombre=$desDocumento."_$time.$extension";
		$ruta="$codProyecto/$nombre";
		$ruta1="$codProyecto";

		if(!file_exists("../../../../www/documentos/".$ruta)){
			mkdir ("../../../../www/documentos/".$ruta);
		}
		
		if(move_uploaded_file($archivo['tmp_name'], "../../../../www/documentos/$codProyecto/".$ruta)) {
			$caSql="INSERT INTO documentos(pro_codigo,tip_documento,rut_documento,des_documento)VALUES('$codProyecto','$tipDocumento','$ruta','$desDocumento')";
			$db->Execute($caSql);
			echo 1;
		}else{
			echo 0;
		}
	}
/**/	

?>