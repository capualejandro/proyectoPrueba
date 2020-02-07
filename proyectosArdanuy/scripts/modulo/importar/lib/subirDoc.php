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

	if(isset($_FILES['filDoc'])) {
		$archivo = $_FILES['filDoc'];
		$extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
		if($extension=='pdf' || $extension=='doc' || $extension=='docx' || $extension=='zip' || $extension=='rar'){
			$time = date("Y-m-d-H-i-s");
			$codProyecto=$_REQUEST['codProyecto'];
			$desDocumento=mayusculas($_REQUEST['desDocumento']);
			$tipDocumento=$_REQUEST['tipDocumento'];
			
			$directorio1="../../../../www/documentos/$codProyecto/";
			if(!file_exists($directorio1)){
				mkdir($directorio1);
				chmod($directorio1,0777); 
			}
	
			$directorio2="../../../../www/documentos/$codProyecto/$tipDocumento";
			if(!file_exists($directorio2)){
				mkdir($directorio2);
				chmod($directorio2,0777); 
			}
			
			$nombre=$desDocumento."_$time.$extension";
			$ruta="$codProyecto/$tipDocumento/$nombre";
			if(move_uploaded_file($archivo['tmp_name'], $directorio2."/$nombre")) {
				$caSql="INSERT INTO documentos(pro_codigo,tip_documento,rut_documento,des_documento)
								VALUES('$codProyecto','$tipDocumento','$ruta','$desDocumento')";
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