<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera=trim($_POST["txtBandera"]);

	if($txtBandera!=""){
		$selCodProyecto=mayusculas(trim($_POST["selCodProyecto"]));
		$selAntNumCtaCobro=mayusculas(trim($_POST["selAntNumCtaCobro"]));
		$txtAntFecPago=mayusculas(trim($_POST["txtAntFecPago"]));
		$txtAntValorCons=mayusculas(trim($_POST["txtAntValorCons"]));
		$txtAntPagoDescrip=mayusculas(trim($_POST["txtAntPagoDescrip"]));

/*
		$caSql="SELECT ant_iva FROM anticipo WHERE pro_codigo='$selCodProyecto' AND ant_num_cta_cobro='$selAntNumCtaCobro'";
		$arFac=$db->GetArray($caSql);
		for($i=0; $i<count($arFac); $i++){
			$ant_iva=trim($arFac[$i][0]);
		}
		$ant_valor_consignado=($ant_iva)*$txtAntValorCons;
*/		
		$caSql = "UPDATE anticipo SET ant_fecha_pago='$txtAntFecPago',ant_valor_consignado=$txtAntValorCons,
				  ant_pago_descripcion='$txtAntPagoDescrip' 
				  WHERE pro_codigo='$selCodProyecto' AND ant_num_cta_cobro=$selAntNumCtaCobro";
#		echo "<pre>$caSql</pre>";exit();
		$db->Execute($caSql);

		$txtBandera = "";
#		unset($db);
		alert("El pago del anticipo se grabo exitosamente!");
#		}
		
	}	
	
#	echo "Alexandra - varUsuario=$varUsuario - Bandera=$txtBandera<br>";
	include_once("../scripts/modulo/pagoanticipos/form/frmCrearPagoAnticipo.php");
#	exit();



?>