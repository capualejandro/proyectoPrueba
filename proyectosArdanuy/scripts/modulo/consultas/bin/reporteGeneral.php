<?php

	include_once("../scripts/conexion/conexion.php");
	include_once("../scripts/inicio/top.php");
	include_once("../scripts/lib/libFunBasicas.php");
	include_once("../scripts/lib/fechalib.php");

	$txtBandera=trim($_POST["txtBandera"]);
	$codProyecto=$_GET['codProyecto'];

#-------------------------------------------------------------------------------------- General ------------------------------------------------------	
	$caSql="SELECT proyectos.pro_codigo,proyectos.pro_nombre,proyectos.pro_fech_ini,proyectos.pro_fech_fin,proyectos.pro_cliente,proyectos.pro_director,proyectos.pro_valor_contrato,proyectos.pro_valor_cont_sin_iva,proyectos.pro_porcentaje,proyectos.pro_porcentaje_antic,proyectos.pro_descripcion,proyectos.usu_login,contrato.cont_objeto,contrato.cont_nomcontratista,proyectos.pro_valor_contrato,proyectos.pro_valor_cont_sin_iva,proyectos.pro_iva FROM proyectos INNER JOIN contrato ON contrato.pro_codigo=proyectos.pro_codigo WHERE proyectos.pro_codigo='$codProyecto'";
	$arProyectos=$db->GetArray($caSql);
	for($i=0; $i<count($arProyectos); $i++){
		$fecIniPro=fecha_texto2($arProyectos[$i][2]);
		$fecFinPro=fecha_texto2($arProyectos[$i][3]);
		$fecFinPror=fecha_texto2(fecFinProrroga($arProyectos[$i][0]));

		$fecIniProR=$arProyectos[$i][2];
		$fecFinProR=$arProyectos[$i][3];
		$fecFinProrR=fecFinProrroga($arProyectos[$i][0]);

		if(fecFinProrroga($arProyectos[$i][0])!=''){
			$plazototal=diferencia_meses($fecFinProrR,$fecIniProR);
		}elseif(fecFinProrroga($arProyectos[$i][0])==''){
			$plazototal=diferencia_meses($fecFinProR,$fecIniProR);
		}
		$jefProyecto=trim($arProyectos[$i][4]);
		$dirProyecto=trim($arProyectos[$i][5]);
		$odjProyecto=trim($arProyectos[$i][12]);
		$empProyecto=trim($arProyectos[$i][13]);
		$valProyecto=trim($arProyectos[$i][14]);
		$valProSinIva=trim($arProyectos[$i][15]);
		$valProIva=trim($arProyectos[$i][16]);
	}
	
	$caSql="SELECT soc_nombre,soc_porcentaje,soc_codigo FROM socio WHERE pro_codigo='$codProyecto'";
	$arSocio=$db->GetArray($caSql);	

	$datSocio='<table border="0" class="textopequeno">';
	for($i=0; $i<count($arSocio); $i++){
		$nomSocio=trim($arSocio[$i][0]);
		$porSocio=trim($arSocio[$i][1]);
		$codSocio=trim($arSocio[$i][2]);
		$datSocio.='<tr><td>'.$nomSocio.'</td><td>'.$porSocio.' %</td></tr>';
	}
	$datSocio.='</table>';
	
	$caSql="SELECT cliente.cli_nombre,cliente.cli_nit,cliente.cli_direccion,pais.nom_pais,ciudad.nom_ciudad,cliente.cli_telefono FROM cliente INNER JOIN pais ON cliente.cli_pais=pais.cod_pais INNER JOIN ciudad ON cliente.cli_ciudad=ciudad.cod_ciudad AND cliente.cli_pais=ciudad.cod_pais AND cliente.pro_codigo='$codProyecto'";
	$arCliente=$db->GetArray($caSql);	
	for($i=0; $i<count($arCliente); $i++){
		$nomCliente=trim($arCliente[$i][0]);
		$nitCliente=trim($arCliente[$i][1]);
		$dirCliente=trim($arCliente[$i][2]);
		$paiCliente=trim($arCliente[$i][3]);
		$ciuCliente=trim($arCliente[$i][4]);
		$telCliente=trim($arCliente[$i][5]);
	}

	$caSql="SELECT anticipo.ant_valor_total FROM anticipo WHERE anticipo.pro_codigo='$codProyecto' AND anticipo.ant_amortizado='N'";
#	echo "Sofia2 ".$caSql;
	$arAnticipo=$db->GetArray($caSql);
	for($i=0; $i<count($arAnticipo); $i++){
		$valAnticipo=round($arAnticipo[$i][0]);
#		$valAntSinIva=round($valAnticipo/1.16);
		$valAntSinIva=round($valAnticipo/(1+($valProIva/100)));
	}
	
	$caSql="SELECT SUM(pror_valor) FROM prorrogas WHERE pro_codigo='$codProyecto'";
#	echo $caSql;
	$arProrroga=$db->GetArray($caSql);
	for($i=0; $i<count($arProrroga); $i++){
		$valAdiones=$arProrroga[$i][0];
#		$valAdiSinIva=round($valAdiones/1.16);
		$valAdiSinIva=round($valAdiones/(1+($valProIva/100)));
	}
	$valFactur=round(valorFacturado($codProyecto));
#	$valFacSinIva=round($valFactur/1.16);
	$valFacSinIva=round($valFactur/(1+($valProIva/100)));

	$penPorFactu=($valProyecto+$valAdiones)-($valFactur+$valAnticipo);
#	$penPorFactuSinIva=round($penPorFactu/1.16);
	$penPorFactuSinIva=round($penPorFactu/(1+($valProIva/100)));
	
	$totValProSinIva=$valProSinIva+$valAdiSinIva;
	$totValFacSinIva=$valAntSinIva+$valFacSinIva;
	$porFacSinIva=($totValFacSinIva*100)/$totValProSinIva;
	
	$totValPro=$valProyecto+$valAdiones;
	$totValFac=$valAnticipo+$valFactur;
	$porFac=($totValFac*100)/$totValPro;

#	echo "Alexandra - varUsuario=$varUsuario - Bandera=$txtBandera<br>";
#	printMsg("Los permisos se asignarion exitosamente!");

	$valEuro=divisas('EUR');
	$valorAlejo=884784800/$valEuro;
#	echo "$valEuro 884784800 Equivale a $valorAlejo";

	$caSql="SELECT pro_codigo,pror_fech_ini,pror_fech_fin,pror_valor,pror_valor_sin_iva FROM prorrogas WHERE pro_codigo='$codProyecto' ORDER BY pror_fech_ini";
	$arProrrogas=$db->GetArray($caSql);

	$caSql="SELECT pro_codigo,susp_fech_ini,susp_fech_fin,susp_nombre FROM suspension_contrato WHERE pro_codigo='$codProyecto' ORDER BY susp_fech_ini";
	$arSuspensiones=$db->GetArray($caSql);
	
	$caSql="SELECT pro_codigo,adic_fech_ini,adic_fech_fin,adic_valor,adic_valor_sin_iva FROM adiciones WHERE pro_codigo='$codProyecto' ORDER BY adic_fech_ini";
	$arAdiciones=$db->GetArray($caSql);
	for($i=0; $i<count($arAdiciones); $i++){
		$adicFechIni=$arAdiciones[$i][1];
		$adicFechFin=$arAdiciones[$i][2];
		$adicValor=$arAdiciones[$i][3];
		$totalAdic+=$arAdiciones[$i][3];
	}
#-------------------------------------------------------------------- General ------------------------------------------------------------------


#------------------------------------------------------- Gastos ---------------------------------------------------------------------------------	
	$caSql="SELECT pro_codigo,pro_nombre,pro_fech_ini,pro_fech_fin,pro_cliente,pro_director,pro_valor_contrato,pro_valor_cont_sin_iva,pro_porcentaje,pro_porcentaje_antic,pro_descripcion,usu_login FROM proyectos WHERE pro_codigo='$codProyecto'";
	$arProyectos=$db->GetArray($caSql);
	for($i=0; $i<count($arProyectos); $i++){
		$jefProyecto=trim($arProyectos[$i][4]);
		$dirProyecto=trim($arProyectos[$i][5]);
	}

	$caSql="SELECT cont_nomcontratista FROM contrato WHERE pro_codigo='$codProyecto'";
	$arContrato=$db->GetArray($caSql);
	for($i=0; $i<count($arContrato); $i++){
		$cont_nomcontratista=trim($arContrato[$i][0]);
	}

	$caSql="SELECT YEAR(gpro_fecha),MONTH(gpro_fecha),gpro_valor_total,gpro_fecha FROM gastos_proyectos WHERE pro_codigo='$codProyecto'";
	$arGastos=$db->GetArray($caSql);
#-------------------------------------------------------- Gastos ---------------------------------------------------------------------------------	


#-------------------------------------------------------- Facturacion ----------------------------------------------------------------------------	
	$caSql="SELECT * FROM facturacion WHERE facturacion.pro_codigo='$codProyecto' AND facturacion.fact_estado!='A' ORDER BY facturacion.fact_numero";
#	echo "Sofia 3 ".$caSql;
	$arFacturacion=$db->GetArray($caSql);
	for($i=0; $i<count($arFacturacion); $i++){
		$valFacTot+=$arFacturacion[$i][7];
	}
	
	$caSql="SELECT * FROM facturacion WHERE facturacion.pro_codigo='$codProyecto' AND facturacion.fact_estado='A' ORDER BY facturacion.fact_numero";
	$arFactAnulada=$db->GetArray($caSql);
	for($i=0; $i<count($arFactAnulada); $i++){

	}

	$caSql="SELECT SUM(pror_valor) FROM prorrogas WHERE pro_codigo='$codProyecto'";
	$arProrroga=$db->GetArray($caSql);
	for($i=0; $i<count($arProrroga); $i++){
		$valAdiones=$arProrroga[$i][0];
#		$valAdiSinIva=round($valAdiones/1.16);
		$valAdiSinIva=round($valAdiones/(1+($valProIva/100)));
	}

	$caSql="SELECT SUM(adic_valor) FROM adiciones WHERE pro_codigo='$codProyecto'";
	$arAdicion=$db->GetArray($caSql);
	for($i=0; $i<count($arAdicion); $i++){
		$valAdiones1=$arAdicion[$i][0];
#		$valAdi1SinIva=round($valAdiones1/1.16);
		$valAdi1SinIva=round($valAdiones1/(1+($valProIva/100)));
	}

	$caSql="SELECT pro_valor_cont_sin_iva FROM proyectos WHERE pro_codigo='$codProyecto'";
	$arProyecto=$db->GetArray($caSql);
	for($i=0; $i<count($arProyecto); $i++){
		$proValSinIva=$arProyecto[$i][0];
	}
	
	$caSql="SELECT * FROM anticipo WHERE anticipo.pro_codigo='$codProyecto' AND anticipo.ant_amortizado='N'";
#	echo "Sofia ".$caSql;
	$arAnticipo=$db->GetArray($caSql);
	for($i=0; $i<count($arAnticipo); $i++){
#		$antFac+=$arAnticipo[$i][5];
#		$antPag+=$arAnticipo[$i][8];
		$valAticipo+=$arAnticipo[$i][3];
	}
	
#	$porEjeAFec=($valFacTot/($valAdiSinIva+$proValSinIva))*100;
	$porEjeAFec=(($valFacTot+$valAticipo)/($proValSinIva+$valAdiSinIva+$valAdi1SinIva))*100;
#---------------------------------------------------------- Facturacion ----------------------------------------------------------------------------	


#----------------------------------------------------------- Utilidades ----------------------------------------------------------------------------	
	$caSql="";
	$caSql="SELECT utilidades.pro_codigo, utilidades.soc_codigo, socio.soc_nombre,utilidades.uti_concepto,utilidades.uti_fecha,utilidades.uti_valor FROM utilidades INNER JOIN socio ON utilidades.soc_codigo=socio.soc_codigo AND socio.pro_codigo=utilidades.pro_codigo AND utilidades.pro_codigo='$codProyecto' ORDER BY 2";
#	echo $caSql;
	$arUtilidades=$db->GetArray($caSql);
#----------------------------------------------------------- Utilidades ----------------------------------------------------------------------------	


#------------------------------------------------- Facturacion Servicios Profesionales -------------------------------------------------------------	
	$caSql="";
	$caSql="SELECT pro_codigo,fact_serv_prof_numero,fact_serv_prof_fech_pago,fact_serv_prof_abono,fact_serv_prof_valor,fact_serv_prof_concepto FROM fact_serv_profesionales WHERE pro_codigo='$codProyecto'";
#	echo $caSql;
	$arFactServProf=$db->GetArray($caSql);
#------------------------------------------------- Facturacion Servicios Profesionales -------------------------------------------------------------	


#------------------------------------------------------------------------ Contratistas -------------------------------------------------------------	
	$caSql="";
	$caSql="SELECT * FROM contratistas WHERE contratistas.pro_codigo='$codProyecto' ORDER BY contratistas.contr_nombre,contratistas.contr_fech_ini_contrato";
#	echo $caSql;
/*
INNER JOIN cuenta_contratista NO contratistas.contr_identificacion = cuenta_contratista.contr_identificacion

	$caSql="SELECT * FROM contratistas INNER JOIN cuenta_contratista ON contratistas.contr_identificacion = cuenta_contratista.contr_identificacion AND contratistas.pro_codigo='$codProyecto' ORDER BY contratistas.contr_nombre,contratistas.contr_fech_ini_contrato";

*/
	$arContratista=$db->GetArray($caSql);
#------------------------------------------------------------------------ Contratistas -------------------------------------------------------------	

	$totalValorContrato=$valProSinIva+$valAdiSinIva+$valAdi1SinIva;
#	echo "$valProSinIva+$valAdiSinIva+$valAdi1SinIva";
	$totalValorContratoIva=$valProyecto+$valAdiones+$valAdiones1;

	include_once("../scripts/modulo/consultas/form/frmReporteGeneral.php");

?>