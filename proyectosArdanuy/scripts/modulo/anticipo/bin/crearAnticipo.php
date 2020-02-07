<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera=trim($_POST["txtBandera"]);

	if($txtBandera!=""){
		$selCodProyecto=mayusculas(trim($_POST["selCodProyecto"]));
		$txtAntNumCtaCobro=mayusculas(trim($_POST['txtAntNumCtaCobro']));
		$txtAntFecGenCobro=mayusculas(trim($_POST["txtAntFecGenCobro"]));
		$txtAntValor=mayusculas(trim($_POST["txtAntValor"]));
		$txtAntIva=mayusculas(trim($_POST["txtAntIva"]));
		$txtAntDescrip=mayusculas(trim($_POST["txtAntDescrip"]));
		$ant_total=((trim($_POST["txtAntValor"])*trim($_POST["txtAntIva"]))/100)+trim($_POST["txtAntValor"]);
#		$txtIvaFact=trim($_POST["txtIvaFact"]);

$caSql = "SELECT count(*) FROM anticipo WHERE pro_codigo='$selCodProyecto' AND ant_num_cta_cobro='$txtAntNumCtaCobro'";
#		echo "<pre>$caSql</pre>"; exit();
		$rs=$db->Execute($caSql);
		while (!$rs->EOF) {
			$varCont = $rs->fields[0];
			$rs->MoveNext();
		}
		if ($varCont != 0){
			alert('Error: El anticipo ya existe');
			include_once("../scripts/modulo/usuario/form/frmCrearAnticipo.php");
		}else{
#			echo "$varCont<br>";
			$caSql = "INSERT INTO anticipo (pro_codigo,ant_num_cta_cobro,ant_fech_gene_cobro,ant_valor,ant_iva,ant_valor_total) 
					  VALUES ('$selCodProyecto','$txtAntNumCtaCobro','$txtAntFecGenCobro','$txtAntValor','$txtAntIva','$ant_total')";
#			echo "$txtLogin - $txtClave<br>$caSql";exit();
			$db->Execute($caSql);

			$txtBandera = "";
#			unset($db);
			alert("El anticipo se grabo exitosamente!");
		}
		
	}/*else{
		$caSql = "";
		$caSql = "SELECT pro_codigo FROM proyectos";
		$arProy = $db->GetArray($caSql);
		$arProyecto = array(''=>'Seleccione');
		for($i=0; $i<count($arProy); $i++){
			$arProyecto[$arProy[$i][0]] = $arProy[$i][0];
		}
	}*/
	
	
#	echo "Alexandra - varUsuario=$varUsuario - Bandera=$txtBandera<br>";
	include_once("../scripts/modulo/anticipo/form/frmCrearAnticipo.php");
#	exit();



?>