<?php
set_time_limit(300);
/*
Libreria de funciones 
*/

# Retorna a session que se le indique
	function Atras_menu($opcion){
	  ?>
	  <html>
	  <body>
	  <div align="center">
		 <strong> 
			<a href="./index.php?seccion=<?php echo $opcion;?>"><img src="./img/inicio/inicio.png" width="24" height="24" border="0"></a>
			<br>  		
			<font style="font-size: 110%; font-weight: bold;">Volver</font>
			
		</strong> 	
	  </div>
	  </body>
	  </html>
	 <?php
	}

//funcion para imprimir Mensage en el td
	function printMsg($caMsg){
		echo "<div align='center'><font color='#000000' style='font-size: 114%;'>$caMsg</font><div><br>";
	}

//funcion que llama cualquir funcion de javascript
//recibe como parametro el nombre del script
	function callScript($caScript){
		echo "<script type=\"text/javascript\"> $caScript </script>";
	}

	function alert($str){
		echo "<script language=\"JavaScript\" type=\"text/javascript\">
			alert('$str');
		  </script>";
	}

	function redireccion($cad){
		echo "
			<script language=\"JavaScript\ type=\"text/javascript\">
				location=$cad;
			</script>
			";
	}

	function mayusculaInicial($cadena){
		$cadena=ucwords(strtolower($cadena));
		return $cadena;
	}
	
	function minusculasInicial($cadena){
		$cadena = trim($cadena);
		$cadena = ucwords(strtolower($cadena));
		$cadena = preg_replace("[á]","á",$cadena);
		$cadena = preg_replace("[Á]","á",$cadena);
		$cadena = preg_replace("[Í]","í",$cadena);
		$cadena = preg_replace("[í]","í",$cadena);
		$cadena = preg_replace("[é]","é",$cadena);
		$cadena = preg_replace("[É]","É",$cadena);
		$cadena = preg_replace("[ó]","ó",$cadena);
		$cadena = preg_replace("[Ó]","ó",$cadena);
		$cadena = preg_replace("[ú]","ú",$cadena);
		$cadena = preg_replace("[Ú]","ú",$cadena);
		$cadena = preg_replace("[ñ]","ñ",$cadena);
		$cadena = preg_replace("[Ñ]","ñ",$cadena);
		$cadena = str_replace("ç","c",$cadena);
		$cadena = str_replace("Ç","C",$cadena);
		$cadena = str_replace("\"","&quot;",$cadena);
#		$cadena = ucwords(strtolower(trim($cadena)));
#		$cadena = trim(ucwords(strtolower($cadena)));
		return $cadena;
	}

/**
	function minusIni($cadena){
		$cadena = strtoupper(trim($cadena));
		$cadena = ereg_replace("[áàâãª]","&aacute;",$cadena);
		$cadena = ereg_replace("[ÁÀÂÃ]","&Aacute;",$cadena);
		$cadena = ereg_replace("[ÍÌÎ]","&Iacute;",$cadena);
		$cadena = ereg_replace("[íìî]","&iacute;",$cadena);
		$cadena = ereg_replace("[éèê]","&eacute;",$cadena);
		$cadena = ereg_replace("[ÉÈÊ]","&Eacute;",$cadena);
		$cadena = ereg_replace("[óòôõº]","&oacute;",$cadena);
		$cadena = ereg_replace("[ÓÒÔÕ]","&Oacute;",$cadena);
		$cadena = ereg_replace("[úùû]","&uacute;",$cadena);
		$cadena = ereg_replace("[ÚÙÛ]","&Uacute;",$cadena);
		$cadena = ereg_replace("[ñ¥¤]","&ntilde;",$cadena);
		$cadena = ereg_replace("[Ñ]","&Ntilde;",$cadena);
		$cadena = str_replace("ç","c",$cadena);
		$cadena = str_replace("Ç","C",$cadena);
		$cadena = str_replace("\"","&quot;",$cadena);
		return $cadena;
	}
/**/

	function minusculas($cadena){
		$cadena = trim($cadena);
		$cadena = strtolower($cadena);
		$cadena = preg_replace("[á]","á",$cadena);
		$cadena = preg_replace("[Á]","á",$cadena);
		$cadena = preg_replace("[Í]","í",$cadena);
		$cadena = preg_replace("[í]","í",$cadena);
		$cadena = preg_replace("[é]","é",$cadena);
		$cadena = preg_replace("[É]","É",$cadena);
		$cadena = preg_replace("[ó]","ó",$cadena);
		$cadena = preg_replace("[Ó]","ó",$cadena);
		$cadena = preg_replace("[ú]","ú",$cadena);
		$cadena = preg_replace("[Ú]","ú",$cadena);
		$cadena = preg_replace("[ñ]","ñ",$cadena);
		$cadena = preg_replace("[Ñ]","ñ",$cadena);
		$cadena = str_replace("ç","c",$cadena);
		$cadena = str_replace("Ç","C",$cadena);
		$cadena = str_replace("\"","&quot;",$cadena);
		return $cadena;
	}
	function mayusculas($cadena){
		$cadena = trim($cadena);
		$cadena = preg_replace("[á]","Á",$cadena);
		$cadena = preg_replace("[Á]","Á",$cadena);
		$cadena = preg_replace("[Í]","Í",$cadena);
		$cadena = preg_replace("[í]","Í",$cadena);
		$cadena = preg_replace("[é]","É",$cadena);
		$cadena = preg_replace("[É]","É",$cadena);
		$cadena = preg_replace("[ó]","Ó",$cadena);
		$cadena = preg_replace("[Ó]","Ó",$cadena);
		$cadena = preg_replace("[ú]","Ú",$cadena);
		$cadena = preg_replace("[Ú]","Ú",$cadena);
		$cadena = preg_replace("[ñ]","Ñ",$cadena);
		$cadena = preg_replace("[Ñ]","Ñ",$cadena);
		$cadena = str_replace("ç","c",$cadena);
		$cadena = str_replace("Ç","C",$cadena);
		$cadena = str_replace("\"","&quot;",$cadena);
		$cadena = strtoupper($cadena);
		return $cadena;
	}

/**
	function mayusculas($cadena){
		$cadena = strtoupper(trim($cadena));
		$cadena = ereg_replace("[áàâãª]","&aacute;",$cadena);
		$cadena = ereg_replace("[ÁÀÂÃ]","&Aacute;",$cadena);
		$cadena = ereg_replace("[ÍÌÎ]","&Iacute;",$cadena);
		$cadena = ereg_replace("[íìî]","&iacute;",$cadena);
		$cadena = ereg_replace("[éèê]","&eacute;",$cadena);
		$cadena = ereg_replace("[ÉÈÊ]","&Eacute;",$cadena);
		$cadena = ereg_replace("[óòôõº]","&oacute;",$cadena);
		$cadena = ereg_replace("[ÓÒÔÕ]","&Oacute;",$cadena);
		$cadena = ereg_replace("[úùû]","&uacute;",$cadena);
		$cadena = ereg_replace("[ÚÙÛ]","&Uacute;",$cadena);
		$cadena = ereg_replace("[ñ¥¤]","&ntilde;",$cadena);
		$cadena = ereg_replace("[Ñ]","&Ntilde;",$cadena);
		$cadena = str_replace("ç","c",$cadena);
		$cadena = str_replace("Ç","C",$cadena);
		$cadena = str_replace("\"","&quot;",$cadena);
		return $cadena;
	}
/**/
#Arreglos generales
#
	$arBoolchar =  array("" => "Seleccione",
						 "1" => "SI",
						 "0" => "NO");

	$arSiNo =  array("" => "Seleccione",
						 "SI" => "Si",
						 "NO" => "No");

	$arTipoUsuario = array("" => "Seleccione",
						   "1" => "Administrador",
						   "2" => "Normal");

	$arEstado = array("" => "Seleccione",
					  "A" => "Activo",
					  "I" => "Inactivo");

	$arMeses = array("" => "Seleccione",
						"1" => "Enero",
						"2" => "Febrero",
						"3" => "Marzo",
						"4" => "Abril",
						"5" => "Mayo",
						"6" => "Junio",
						"7" => "Julio",
						"8" => "Agosto",
						"9" => "Septiembre",
						"10" => "Octubre",
						"11" => "Noviembre",
						"12" => "Diciembre");

	$arTipDocm = array("Seleccione" => "Seleccione",
       "POLITICAS" => "Politicas",
       "MANUALES" => "Manuales",
       "PROCEDIMIENTOS" => "Procedimientos",
       "REGLAMENTO_H_y_SI" => "Reglamento H y SI",
       "COMPASST" => "Compasst",
       "PLAN DE EMERGENCIAS" => "Plan de Emergencias",
       "COMITE DE CONVIVENCIA" => "Comite Convivencia",
       "INVESTIGACION ACCIDENTES" => "Investigacion Accidentes Incidentes",
       "NORMATIVAS" => "Normativas");

	function arrayAgno($agno){
		echo "<option value=''>Seleccione</option>";
		for($anio=$agno; date("Y")>=$anio; $anio++) {
			echo "<option value=".$anio.">".$anio."</option>";
		}
	}

	function numero($numero,$decimales){
#		return number_format($numero,$decimales,',','.');
		return number_format($numero,$decimales);
	}

	function porcentaje($numero,$decimales){
		return number_format($numero,$decimales,',','.');
	}

#API para cambio de moneda
#
	function conversor_divisas($divisa_origen, $divisa_destino, $cantidad){
		$cantidad = urlencode($cantidad);
		$divisa_origen = urlencode($divisa_origen);
		$divisa_destino = urlencode($divisa_destino);
		$url = "http://www.x-rates.com/calculator/?from=$divisa_origen&to=$divisa_destino&amount=$cantidad";
		$rawdata = file_get_contents($url);
		$cadena = htmlspecialchars($rawdata, ENT_QUOTES);
		$dv1 = explode('ccOutputRslt', $cadena);
		$dv2 = explode('ccOutputTrail', $dv1[1]);
		
		$inf = array('span','class=','"', ">", "<");
		$valor = str_replace($inf , '', $dv2[0]);
		
		$d = html_entity_decode($valor);
		$d1 = str_replace('>', '', $d);
		$d2 = str_replace('"', '', $d1);
		return str_replace('<', '', $d2);
#		return $d;
	}
	
	function divisas($moneda){
		include_once("../../../scripts/adodb5/adodb.inc.php");
		include_once("../../../scripts/adodb5/adodb-exceptions.inc.php");
#		$motorBD="MySQL"; $sevidorBD="127.0.0.1"; $usuarioBD="root"; $claveBD=""; $basedatos="fichaproyectos";
		$motorBD="mysqli"; $sevidorBD="127.0.0.1"; $usuarioBD="root"; $claveBD=""; $basedatos="fichaproyectos";
		$db=&ADONewConnection($motorBD); #Aquí le decimos que motor base de datos queremos trabajar
		$db->Pconnect($sevidorBD, $usuarioBD, $claveBD, $basedatos); #"servidor","usuario","contraseña","basededatos"

		$caSql="";
		$caSql="SELECT val_divisa FROM divisa WHERE sig_divisa='$moneda'";
		$arDiv=$db->GetArray($caSql);
		for($i=0; $i<count($arDiv); $i++){
			$valDivisa=trim($arDiv[$i][0]);
		}
		return $valDivisa;
	}
###########################################################################


/* Subconsulta para obtener de la facturacion por proyecto */
	function valorFacturado($codProyecto){
		include_once("../../../scripts/adodb5/adodb.inc.php");
		include_once("../../../scripts/adodb5/adodb-exceptions.inc.php");
#		$motorBD="MySQL"; $sevidorBD="127.0.0.1"; $usuarioBD="root"; $claveBD=""; $basedatos="fichaproyectos";
		$motorBD="mysqli"; $sevidorBD="127.0.0.1"; $usuarioBD="root"; $claveBD=""; $basedatos="fichaproyectos";
		$db=&ADONewConnection($motorBD); #Aquí le decimos que motor base de datos queremos trabajar
		$db->Pconnect($sevidorBD, $usuarioBD, $claveBD, $basedatos); #"servidor","usuario","contraseña","basededatos"

		$caSql="";
		$caSql="SELECT SUM(facturacion.fact_total) AS valFacturacion
						FROM proyectos 
						INNER JOIN facturacion ON proyectos.pro_codigo=facturacion.pro_codigo
						AND facturacion.fact_estado!='A'
						AND facturacion.fact_valor_consign!=0
						AND proyectos.pro_codigo='".$codProyecto."'";
		$arFacturacion=$db->GetArray($caSql);
		for($i=0; $i<count($arFacturacion); $i++){
			$valFacturado=trim($arFacturacion[$i][0]);
		}
		return $valFacturado;#$valFacturado;

	}
/*--------------------------------------------------------------------------------------------*/

/* Subconsulta para obtener de la facturacion por proyecto con anauladas*/
	function valorFacturadoTotal($codProyecto){
		include_once("../../../scripts/adodb5/adodb.inc.php");
		include_once("../../../scripts/adodb5/adodb-exceptions.inc.php");
#		$motorBD="MySQL"; $sevidorBD="127.0.0.1"; $usuarioBD="root"; $claveBD=""; $basedatos="fichaproyectos";
		$motorBD="mysqli"; $sevidorBD="127.0.0.1"; $usuarioBD="root"; $claveBD=""; $basedatos="fichaproyectos";
		$db=&ADONewConnection($motorBD); #Aquí le decimos que motor base de datos queremos trabajar
		$db->Pconnect($sevidorBD, $usuarioBD, $claveBD, $basedatos); #"servidor","usuario","contraseña","basededatos"

		$caSql="";
		$caSql="SELECT SUM(facturacion.fact_total) AS valFacturacion
						FROM proyectos 
						INNER JOIN facturacion ON proyectos.pro_codigo=facturacion.pro_codigo
						AND facturacion.fact_valor_consign!=0
						AND proyectos.pro_codigo='".$codProyecto."'";
		$arFacturacion=$db->GetArray($caSql);
		for($i=0; $i<count($arFacturacion); $i++){
			$valFacturado=trim($arFacturacion[$i][0]);
		}
		return $valFacturado;#$valFacturado;

	}
/*--------------------------------------------------------------------------------------------*/

/* Subconsulta para obtener de la facturacion por proyecto */
	function fecFinProrroga($codProyecto){
		include_once("../../../scripts/adodb5/adodb.inc.php");
		include_once("../../../scripts/adodb5/adodb-exceptions.inc.php");
#		$motorBD="MySQL"; $sevidorBD="127.0.0.1"; $usuarioBD="root"; $claveBD=""; $basedatos="fichaproyectos";
		$motorBD="mysqli"; $sevidorBD="127.0.0.1"; $usuarioBD="root"; $claveBD=""; $basedatos="fichaproyectos";
		$db=&ADONewConnection($motorBD); #Aquí le decimos que motor base de datos queremos trabajar
		$db->Pconnect($sevidorBD, $usuarioBD, $claveBD, $basedatos); #"servidor","usuario","contraseña","basededatos"

#		$codProyecto="P";
		$caSql="";
		$caSql="SELECT MAX(prorrogas.pror_fech_fin) FROM prorrogas 
						WHERE prorrogas.pro_codigo='".$codProyecto."'";#".$codProyecto."
		$arFecFinProrr=$db->GetArray($caSql);
		$numReg=count($arFecFinProrr);
		for($i=0; $i<count($arFecFinProrr); $i++){
			$arFecFinProrr=trim($arFecFinProrr[$i][0]);
		}
#		if($numReg==0) return 0;
#		else return $arFecFinProrr;
		return $arFecFinProrr;
	}
/*--------------------------------------------------------------------------------------------*/

/* Subconsulta para obtener nombre reporte_horas */
	function nomHoras($id){
		include_once("../../../scripts/adodb5/adodb.inc.php");
		include_once("../../../scripts/adodb5/adodb-exceptions.inc.php");
#		$motorBD="MySQL"; $sevidorBD="127.0.0.1"; $usuarioBD="root"; $claveBD=""; $basedatos="fichaproyectos";
		$motorBD="mysqli"; $sevidorBD="127.0.0.1"; $usuarioBD="root"; $claveBD=""; $basedatos="fichaproyectos";
		$db=&ADONewConnection($motorBD); #Aquí le decimos que motor base de datos queremos trabajar
		$db->Pconnect($sevidorBD, $usuarioBD, $claveBD, $basedatos); #"servidor","usuario","contraseña","basededatos"

#		$nombre="Alexandra";
		$caSql="";
		$caSql="SELECT DISTINCT rh_nombre FROM reporte_horas WHERE rh_idusuario=$id";#".$codProyecto."
		$arHorasLabor=$db->GetArray($caSql);
		for($i=0; $i<count($arHorasLabor); $i++){
			$nombre=trim($arHorasLabor[$i][0]);
		}
#		if($numReg==0) return 0;
#		else return $arFecFinProrr;
		return $nombre;
	}
/*--------------------------------------------------------------------------------------------*/

/* Subconsulta para obtener el total de Adiciones */
	function valorAdiciones($codProyecto){
		include_once("../../../scripts/adodb5/adodb.inc.php");
		include_once("../../../scripts/adodb5/adodb-exceptions.inc.php");
#		$motorBD="MySQL"; $sevidorBD="127.0.0.1"; $usuarioBD="root"; $claveBD=""; $basedatos="fichaproyectos";
		$motorBD="mysqli"; $sevidorBD="127.0.0.1"; $usuarioBD="root"; $claveBD=""; $basedatos="fichaproyectos";
		$db=&ADONewConnection($motorBD); #Aquí le decimos que motor base de datos queremos trabajar
		$db->Pconnect($sevidorBD, $usuarioBD, $claveBD, $basedatos); #"servidor","usuario","contraseña","basededatos"

		$caSql="";
		$caSql="SELECT SUM(prorrogas.pror_valor)
						FROM prorrogas 
						INNER JOIN proyectos ON proyectos.pro_codigo=prorrogas.pro_codigo
						AND proyectos.pro_codigo='".$codProyecto."'";
		$arProrroga=$db->GetArray($caSql);
		for($i=0; $i<count($arProrroga); $i++){
			$valProrroga=trim($arProrroga[$i][0]);
		}
		return $valProrroga;#$valFacturado;

	}
/*--------------------------------------------------------------------------------------------*/

/* Subconsulta para obtener el total de Anticipo */
	function valorAnticipo($codProyecto){
		include_once("../../../scripts/adodb5/adodb.inc.php");
		include_once("../../../scripts/adodb5/adodb-exceptions.inc.php");
#		$motorBD="MySQL"; $sevidorBD="127.0.0.1"; $usuarioBD="root"; $claveBD=""; $basedatos="fichaproyectos";
		$motorBD="mysqli"; $sevidorBD="127.0.0.1"; $usuarioBD="root"; $claveBD=""; $basedatos="fichaproyectos";
		$db=&ADONewConnection($motorBD); #Aquí le decimos que motor base de datos queremos trabajar
		$db->Pconnect($sevidorBD, $usuarioBD, $claveBD, $basedatos); #"servidor","usuario","contraseña","basededatos"

		$caSql="";
		$caSql="SELECT SUM(anticipo.ant_valor_total)
						FROM anticipo 
						INNER JOIN proyectos ON proyectos.pro_codigo=anticipo.pro_codigo
						AND anticipo.ant_amortizado='N'
						AND proyectos.pro_codigo='".$codProyecto."'";
		$arAnticipo=$db->GetArray($caSql);
		for($i=0; $i<count($arAnticipo); $i++){
			$valAnticipo=trim($arAnticipo[$i][0]);
		}
		return $valAnticipo;#$valFacturado;

	}
/*--------------------------------------------------------------------------------------------*/

/*--------------------------------------------------------------------------------------------*/

/* Subconsulta para obtener el total de Adiciones */
	function valorAdiciones1($codProyecto){
		include_once("../../../scripts/adodb5/adodb.inc.php");
		include_once("../../../scripts/adodb5/adodb-exceptions.inc.php");
#		$motorBD="MySQL"; $sevidorBD="127.0.0.1"; $usuarioBD="root"; $claveBD=""; $basedatos="fichaproyectos";
		$motorBD="mysqli"; $sevidorBD="127.0.0.1"; $usuarioBD="root"; $claveBD=""; $basedatos="fichaproyectos";
		$db=&ADONewConnection($motorBD); #Aquí le decimos que motor base de datos queremos trabajar
		$db->Pconnect($sevidorBD, $usuarioBD, $claveBD, $basedatos); #"servidor","usuario","contraseña","basededatos"

		$caSql="";
		$caSql="SELECT SUM(adiciones.adic_valor)
						FROM adiciones 
						INNER JOIN proyectos ON proyectos.pro_codigo=adiciones.pro_codigo
						AND proyectos.pro_codigo='".$codProyecto."'";
		$arAdicion=$db->GetArray($caSql);
		for($i=0; $i<count($arAdicion); $i++){
			$valAdicion=trim($arAdicion[$i][0]);
		}
		return $valAdicion;#$valFacturado;

	}
/*--------------------------------------------------------------------------------------------*/


/*--------------------------------------------------------------------------------------------*/

/* Subconsulta para obtener */
	function valorIngFactu($codProyecto,$year,$mont){
		include_once("../../../scripts/adodb5/adodb.inc.php");
		include_once("../../../scripts/adodb5/adodb-exceptions.inc.php");
#		$motorBD="MySQL"; $sevidorBD="127.0.0.1"; $usuarioBD="root"; $claveBD=""; $basedatos="fichaproyectos";
		$motorBD="mysqli"; $sevidorBD="127.0.0.1"; $usuarioBD="root"; $claveBD=""; $basedatos="fichaproyectos";
		$db=&ADONewConnection($motorBD); #Aquí le decimos que motor base de datos queremos trabajar
		$db->Pconnect($sevidorBD, $usuarioBD, $claveBD, $basedatos); #"servidor","usuario","contraseña","basededatos"

		$caSql="";
		$caSql="SELECT YEAR(fact_fech_pago),MONTH(fact_fech_pago),SUM(fact_valor_consign) FROM facturacion 
							WHERE pro_codigo='$codProyecto' AND YEAR(fact_fech_pago)=$year AND MONTH(fact_fech_pago)=$mont
							GROUP BY 1,2";

		$arFactur=$db->GetArray($caSql);
		for($i=0; $i<count($arFactur); $i++){
			$fact_valor_consign=trim($arFactur[$i][2]);
		}
		
		if($fact_valor_consign!=0) $valFactu=$fact_valor_consign;
		else $valFactu=0;
		
		return $valFactu;

	}

/*--------------------------------------------------------------------------------------------*/

/* Subconsulta para obtener */
	function valorIngAnticipo($codProyecto,$year,$mont){
		include_once("../../../scripts/adodb5/adodb.inc.php");
		include_once("../../../scripts/adodb5/adodb-exceptions.inc.php");
#		$motorBD="MySQL"; $sevidorBD="127.0.0.1"; $usuarioBD="root"; $claveBD=""; $basedatos="fichaproyectos";
		$motorBD="mysqli"; $sevidorBD="127.0.0.1"; $usuarioBD="root"; $claveBD=""; $basedatos="fichaproyectos";
		$db=&ADONewConnection($motorBD); #Aquí le decimos que motor base de datos queremos trabajar
		$db->Pconnect($sevidorBD, $usuarioBD, $claveBD, $basedatos); #"servidor","usuario","contraseña","basededatos"

		$caSql="";
		$caSql="SELECT YEAR(ant_fecha_pago),MONTH(ant_fecha_pago),SUM(ant_valor_consignado) FROM anticipo  
						WHERE pro_codigo='$codProyecto' AND YEAR(ant_fecha_pago)=$year AND MONTH(ant_fecha_pago)=$mont AND pro_codigo!='P1122'
						GROUP BY 1,2";

		$arAntici=$db->GetArray($caSql);
		for($i=0; $i<count($arAntici); $i++){
			$ant_valor_consignado=trim($arAntici[$i][2]);
		}

		if($ant_valor_consignado!=0) $valAnti=$ant_valor_consignado;
		else $valAnti=0;

		return $valAnti;

	}

/*--------------------------------------------------------------------------------------------*/
/* Subconsulta para obtener */
	function valoresContratistas($codProyecto,$idContra){
		include_once("../../../scripts/adodb5/adodb.inc.php");
		include_once("../../../scripts/adodb5/adodb-exceptions.inc.php");
#		$motorBD="MySQL"; $sevidorBD="127.0.0.1"; $usuarioBD="root"; $claveBD=""; $basedatos="fichaproyectos";
		$motorBD="mysqli"; $sevidorBD="127.0.0.1"; $usuarioBD="root"; $claveBD=""; $basedatos="fichaproyectos";
		$db=&ADONewConnection($motorBD); #Aquí le decimos que motor base de datos queremos trabajar
		$db->Pconnect($sevidorBD, $usuarioBD, $claveBD, $basedatos); #"servidor","usuario","contraseña","basededatos"

		$caSql="";
		$caSql="SELECT * FROM cuenta_contratista WHERE pro_codigo='$codProyecto' AND contr_identificacion = '$idContra'";

		$arCuentContr=$db->GetArray($caSql);
		for($i=0; $i<count($arCuentContr); $i++){
			$cuenta_valor=trim($arCuentContr[$i][6]);
			$cuenta_iva=trim($arCuentContr[$i][9]);
			$cuenta_retencion=trim($arCuentContr[$i][10]);
			$cuenta_reteica=trim($arCuentContr[$i][11]);
			$cuentValor=($cuenta_valor*($cuenta_iva/100))+($cuenta_valor*($cuenta_retencion/100))+($cuenta_valor*($cuenta_reteica/100));
		}

		if($cuentValor!=0) $cuentaValor=$cuentValor;
		else $cuentaValor=0;

		return $cuentaValor;
	}

/*--------------------------------------------------------------------------------------------*/
/* Subconsulta para obtener */
	function valorContratistas($codProyecto,$idContra){
		include_once("../../../scripts/adodb5/adodb.inc.php");
		include_once("../../../scripts/adodb5/adodb-exceptions.inc.php");
#		$motorBD="MySQL"; $sevidorBD="127.0.0.1"; $usuarioBD="root"; $claveBD=""; $basedatos="fichaproyectos";
		$motorBD="mysqli"; $sevidorBD="127.0.0.1"; $usuarioBD="root"; $claveBD=""; $basedatos="fichaproyectos";
		$db=&ADONewConnection($motorBD); #Aquí le decimos que motor base de datos queremos trabajar
		$db->Pconnect($sevidorBD, $usuarioBD, $claveBD, $basedatos); #"servidor","usuario","contraseña","basededatos"

		$caSql="";
		$caSql="SELECT * FROM cuenta_contratista WHERE pro_codigo='$codProyecto' AND contr_identificacion = '$idContra'";

		$arCuentContr=$db->GetArray($caSql);
		for($i=0; $i<count($arCuentContr); $i++){
			$cuenta_total=trim($arCuentContr[$i][12]);
		}

		if($cuenta_total!=0) $returValor=$cuenta_total;
		else $returValor=0;

		return $returValor;
	}

/*--------------------------------------------------------------------------------------------*/

?>