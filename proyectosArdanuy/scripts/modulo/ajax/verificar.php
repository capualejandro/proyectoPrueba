<?php

	error_reporting(E_ERROR);
	include_once("../../../scripts/adodb5/adodb.inc.php");
	include_once("../../../scripts/adodb5/adodb-exceptions.inc.php");
	include_once("../../../scripts/lib/libFunBasicas.php");
	include_once("../../../scripts/lib/fechalib.php");

# Conexion Server
#	$motorBD="mssql"; $sevidorBD="192.168.7.120"; $usuarioBD="sa"; $claveBD="hpml370g%"; $basedatos="HorasExtras";
# Conexion MySQL
#	$motorBD="MySQL"; $sevidorBD="127.0.0.1"; $usuarioBD="root"; $claveBD=""; $basedatos="fichaproyectos";

# Conexion mysqli
	$motorBD="mysqli"; $sevidorBD="127.0.0.1"; $usuarioBD="root"; $claveBD=""; $basedatos="fichaproyectos";

	$db=&ADONewConnection($motorBD); #Aquí le decimos que motor base de datos queremos trabajar
	$db->Pconnect($sevidorBD, $usuarioBD, $claveBD, $basedatos); #"servidor","usuario","contraseña","basededatos"

	mysqli_set_charset('utf8');


	if(isset($_REQUEST["opc"])){
#		sleep(1);
		switch($_REQUEST["opc"]){
			case "ser":
				$ser_nombre = mayusculas($_POST["ser_nombre"]);
				$caSql = "SELECT * FROM servicio WHERE ser_nombre='$ser_nombre'";
				$rs=$db->Execute($caSql);
				$arr = $db->GetArray($caSql);
				$numReg = count($arr);
				echo $numReg;
			break;
			
			case "men":
				$mod_codigo = mayusculas($_POST["mod_codigo"]);
				$caSql = "SELECT * FROM modulo WHERE mod_codigo='$mod_codigo'";
				$rs=$db->Execute($caSql);
				$arr = $db->GetArray($caSql);
				$numReg = count($arr);
				echo $numReg;
			break;
			
			case "usu":
				$usu_login = mayusculas($_POST["usu_login"]);
				$caSql = "SELECT * FROM usuario WHERE usu_login='$usu_login'";
				$rs=$db->Execute($caSql);
				$arr = $db->GetArray($caSql);
				$numReg = count($arr);
				echo $numReg;
			break;
			
			case "fun":
				$fun_identificacion = mayusculas($_POST["fun_identificacion"]);
				$caSql = "SELECT * FROM funcionario WHERE fun_identificacion='$fun_identificacion'";
				$arr = $db->GetArray($caSql);
				$numReg = count($arr);
				echo $numReg;
			break;
			
			case "car":
				$fun_identificacion = mayusculas($_POST["fun_identificacion"]);
				$caSql = "SELECT fun_nombre, fun_apellido, fun_telefono FROM funcionario WHERE fun_identificacion='$fun_identificacion'";
				$arr = $db->GetArray($caSql);
				$numReg = count($arr);
				for($i=0; $i<count($arr); $i++){
					$arrEle[$i]['nom'] = $arr[$i][0];
					$arrEle[$i]['ape'] = $arr[$i][1];
					$arrEle[$i]['tel'] = $arr[$i][2];
				}
				echo json_encode($arrEle);
				#echo $numReg;
			break;
			
			case "edimenu":
				$menu_codigo = mayusculas($_POST["menu_codigo"]);
				$caSql = "SELECT mod_codigo,mod_padre,mod_archivo,mod_descripcion,mod_opcion,mod_ordenpadre,mod_orden,mod_visible FROM modulo WHERE mod_codigo='$menu_codigo'";
				$arr = $db->GetArray($caSql);
				$numReg = count($arr);
				for($i=0; $i<count($arr); $i++){
					$arrEle[$i]['nom'] = $arr[$i][0];
					$arrEle[$i]['pad'] = $arr[$i][1];
					$arrEle[$i]['rut'] = $arr[$i][2];
#					$arrEle[$i]['des'] = minusculasInicial($arr[$i][3]);
					$arrEle[$i]['des'] = $arr[$i][3];
					$arrEle[$i]['ord'] = $arr[$i][6];
#					if($arr[$i][7]==1) $arrEle[$i]['vis'] = 'SI';
#					else $arrEle[$i]['vis'] = 'NO';
					$arrEle[$i]['vis'] = $arr[$i][7];
				}
				echo json_encode($arrEle);
#				echo $caSql;
			break;
			
			case "edi":
				$fun_codigo = mayusculas($_POST["fun_codigo"]);
				$caSql = "SELECT a.fun_nombre, a.fun_apellido, a.fun_telefono, a.fun_estado, b.usu_login FROM funcionario AS a, usuario AS b WHERE b.usu_codigo=$fun_codigo AND a.fun_identificacion=b.fun_identificacion";

#				$caSql="SELECT usuario.usu_codigo, usuario.usu_login, usuario.usu_fechacreacion, funcionario.fun_identificacion, funcionario.fun_nombre, funcionario.fun_apellido, funcionario.fun_telefono, funcionario.fun_estado INNER JOIN funcionario ON usuario.fun_identificacion=funcionario.fun_identificacion	AND funcionario.fun_codigo=$fun_codigo";

				$arr = $db->GetArray($caSql);
				$numReg = count($arr);
				for($i=0; $i<count($arr); $i++){
#					$arrEle[$i]['nom'] = minusculasInicial($arr[$i][0]);
#					$arrEle[$i]['ape'] = minusculasInicial($arr[$i][1]);
					$arrEle[$i]['nom'] = $arr[$i][0];
					$arrEle[$i]['ape'] = $arr[$i][1];
					$arrEle[$i]['tel'] = $arr[$i][2];
					$arrEle[$i]['est'] = $arr[$i][3];
					$arrEle[$i]['login'] = $arr[$i][4];
				}
				echo json_encode($arrEle);
#				echo $caSql;
			break;
			
			case "upd":
				$fun_codigo = trim($_POST["fun_codigo"]);
				$fun_estado = trim($_POST["fun_estado"]);
				if($fun_estado == 'A') $estado = "I";
				else $estado = "A";
				$caSql = "UPDATE funcionario SET fun_estado='$estado' WHERE fun_codigo='$fun_codigo'";
				$db->Execute($caSql);
#				echo $numReg;
			break;
			
			case "edipro":
				$pro_codigo = trim($_POST["pro_codigo"]);
#				$pro_codigo = 'P1122';
				$caSql="SELECT pro_codigo,pro_nombre,pro_fech_ini,pro_fech_fin,pro_descripcion,pro_cliente,pro_director,pro_valor_contrato,pro_porcentaje,usu_login FROM proyectos WHERE pro_codigo='".$pro_codigo."'";
				$arPro=$db->GetArray($caSql);
#				$numReg=count($arPro);
				for($i=0; $i<count($arPro); $i++){
					$arrEle[$i]['cod'] = trim($arPro[$i][0]);
					$arrEle[$i]['nom'] = trim($arPro[$i][1]);
					$arrEle[$i]['ini'] = trim($arPro[$i][2]);
					$arrEle[$i]['fin'] = trim($arPro[$i][3]);
					$arrEle[$i]['des'] = trim($arPro[$i][4]);
					$arrEle[$i]['cli'] = trim($arPro[$i][5]);
					$arrEle[$i]['dir'] = trim($arPro[$i][6]);
					$arrEle[$i]['val'] = trim($arPro[$i][7]);
					$arrEle[$i]['por'] = trim($arPro[$i][8]);
				}
				echo json_encode($arrEle);
#				echo "$caSql";
			break;
			
			case "conpro":
				$codProyecto=trim($_POST["codProyecto"]);
				$caSql="SELECT pro_fech_fin FROM proyectos WHERE pro_codigo='$codProyecto'";
				$rs=$db->Execute($caSql);
				while(!$rs->EOF){
					$pro_fech_fin = $rs->fields[0];
					$rs->MoveNext();
				}
				echo $pro_fech_fin;
			break;
			
			case "confac":
				$codProyecto=trim($_REQUEST["codProyecto"]);
				$caSql="SELECT fact_consecutivo,fact_numero FROM facturacion WHERE pro_codigo='$codProyecto' AND fact_valor_consign=0 AND fact_estado=''";
				$arProy = $db->GetArray($caSql);
				$arProyecto = array(''=>'Seleccione');
				for($i=0; $i<count($arProy); $i++){
					$arProyecto[$arProy[$i][0]] = $arProy[$i][1];
				}
				foreach($arProyecto as $indice => $valor){
					$html.="<option value='$indice'> ".minusculasInicial($valor)." </option>";	
				}

				echo $html;
			break;
			
			case "consoc":
				$codProyecto=trim($_REQUEST["codProyecto"]);
#				$caSql="SELECT soc_codigo,soc_nombre FROM socio WHERE pro_codigo='$codProyecto' AND fact_valor_consign=0 AND fact_estado=''";
				$cadSql="SELECT soc_codigo,soc_nombre FROM socio WHERE pro_codigo='$codProyecto'";
				$arSoc = $db->GetArray($cadSql);
				$arSocio = array(''=>'Seleccione');
				for($i=0; $i<count($arSoc); $i++){
					$arSocio[$arSoc[$i][0]] = $arSoc[$i][1];
				}
				foreach($arSocio as $indice => $valor){
					$html.="<option value='$indice'>".$valor."</option>";	
				}

				echo $html;
			break;
			
			case "conpag":
				$codProyecto=trim($_REQUEST["codProyecto"]);
				$numFactura=trim($_REQUEST["numFactura"]);
				$caSql="SELECT fact_fech_emision,fact_total FROM facturacion WHERE fact_consecutivo=$numFactura";
				$rs=$db->Execute($caSql);
				$arFac=$db->GetArray($caSql);
				for($i=0; $i<count($arFac); $i++){
					$arrEle[$i]['fech']=trim($arFac[$i][0]);
					$arrEle[$i]['valo']=trim($arFac[$i][1]);
				}
				echo json_encode($arrEle);
#				echo $fact_fech_emision;
			break;
			
			case "conanti":
				$codProyecto=trim($_REQUEST["codProyecto"]);
				$caSql="SELECT ant_num_cta_cobro FROM anticipo WHERE pro_codigo='$codProyecto' AND ant_valor_consignado=0";
				$arAnti = $db->GetArray($caSql);
				$arAnticipo = array(''=>'Seleccione');
				for($i=0; $i<count($arAnti); $i++){
					$arAnticipo[$arAnti[$i][0]] = $arAnti[$i][0];
				}
				foreach($arAnticipo as $indice => $valor){
					$html.="<option value='$indice'> ".minusculasInicial($valor)." </option>";	
				}
				echo $html;
			break;
			
			case "conant":
				$codProyecto=trim($_REQUEST["codProyecto"]);
				$numFactura=trim($_REQUEST["antNumCtaCobro"]);
				$caSql="SELECT ant_fech_gene_cobro,ant_valor,ant_iva FROM anticipo WHERE pro_codigo='$codProyecto' AND ant_num_cta_cobro=$numFactura";
				$rs=$db->Execute($caSql);
				$arAnt=$db->GetArray($caSql);
				for($i=0; $i<count($arAnt); $i++){
					$arrEle[$i]['fech']=trim($arAnt[$i][0]);
					$ant_valor_consignado=($arAnt[$i][2]/100)*$arAnt[$i][1];
					$arrEle[$i]['valo']=$ant_valor_consignado;
				}
				echo json_encode($arrEle);
#				echo $fact_fech_emision;
			break;
			
			case "concli":
				$codProyecto=trim($_REQUEST["codProyecto"]);
				$caSql="SELECT cont_numero FROM contrato WHERE pro_codigo='$codProyecto'";
				$rs=$db->Execute($caSql);
				$arCon=$db->GetArray($caSql);
				for($i=0; $i<count($arCon); $i++){
					$arrEle[$i]['nit']=trim($arCon[$i][0]);
				}
				echo json_encode($arrEle);
#				echo $fact_fech_emision;
			break;
			
			case "consus":
				$codProyecto=trim($_REQUEST["codProyecto"]);
				$caSql="SELECT susp_numero,susp_fech_ini FROM suspension_contrato WHERE pro_codigo='$codProyecto' AND susp_fin_nombre=''";
				$rs=$db->Execute($caSql);
				$arSusp=$db->GetArray($caSql);
				for($i=0; $i<count($arSusp); $i++){
					$arrEle[$i]['num']=trim($arSusp[$i][0]);
					$arrEle[$i]['fech']=trim($arSusp[$i][1]);
				}
				echo json_encode($arrEle);
#				echo $html;
			break;

			case "conpais":
				$codPais=trim($_REQUEST["codPais"]);
				$caSql="SELECT cod_ciudad,nom_ciudad FROM ciudad WHERE cod_pais='$codPais' ORDER BY nom_ciudad";
				$arCiud = $db->GetArray($caSql);
				$arCiudad = array(''=>'Seleccione');
				for($i=0; $i<count($arCiud); $i++){
					$arCiudad[$arCiud[$i][0]] = $arCiud[$i][1];
				}
				foreach($arCiudad as $indice => $valor){
					$html.="<option value='$indice'> ".trim($valor)." </option>";	
				}
				echo $html;
			break;

			case "conproyecto":
				$codProyecto=trim($_REQUEST["codProyecto"]);
				$caSql="SELECT contr_identificacion,contr_nombre FROM contratistas WHERE pro_codigo='$codProyecto' ORDER BY contr_nombre";
				$arContrat = $db->GetArray($caSql);
				$arContratista = array(''=>'Seleccione');
				for($i=0; $i<count($arContrat); $i++){
					$arContratista[$arContrat[$i][0]] = $arContrat[$i][1];
				}
				foreach($arContratista as $indice => $valor){
					$html.="<option value='$indice'> ".trim($valor)." </option>";	
				}
#				echo $caSql;
				echo $html;
			break;

			case "respag";
				$caSql="";
				$codProyecto=trim($_POST["codProyecto"]);
				$mes=trim($_POST["mes"]);
				$ano=trim($_POST["ano"]);
				$selMoneda=trim($_POST["selMoneda"]);

				$caSql="SELECT proyectos.pro_codigo,contrato.cont_nomcontratista,MONTH(facturacion.fact_fech_pago),YEAR(facturacion.fact_fech_pago),SUM(facturacion.fact_valor_consign) FROM proyectos INNER JOIN facturacion ON proyectos.pro_codigo=facturacion.pro_codigo INNER JOIN contrato ON proyectos.pro_codigo=contrato.pro_codigo AND facturacion.fact_estado='' AND facturacion.fact_valor_consign!='' ";

				$caSql.=($codProyecto != '') ? " AND proyectos.pro_codigo LIKE '%$codProyecto%'" : "";
				$caSql.=($mes != '') ? " AND MONTH(facturacion.fact_fech_pago) = '$mes'" : "";
#				$caSql.=($ano != '') ? " AND YEAR(facturacion.fact_fech_pago) = '$ano'" : "";
				$caSql.=($ano != '') ? " AND YEAR(facturacion.fact_fech_pago) = '$ano'" : "";
#				$caSql.="ORDER BY proyectos.pro_codigo ";
				$caSql.="GROUP BY 1,2,3,4 ORDER BY 1,4,3";
				
#				$rs=$db->Execute($caSql);
				$arProyectos=$db->GetArray($caSql);
				$arrEle = array();
				for($i=0; $i<count($arProyectos); $i++){
					$arrEle[$i]['contador']=$i+1;
					$arrEle[$i]['proCodigo']=trim($arProyectos[$i][0]);
					$arrEle[$i]['proNombre']=trim($arProyectos[$i][1]);
					$arrEle[$i]['mesPagFac']=mes_texto($arProyectos[$i][2]);
					$arrEle[$i]['anoPagFac']=trim($arProyectos[$i][3]);

					if($selMoneda=='euro'){
						$valEuro=divisas('EUR');
						$arrEle[$i]['valPagFac']=numero($arProyectos[$i][4]/$valEuro,2)." €"; 
					}else{
						$arrEle[$i]['valPagFac']="$ ".numero($arProyectos[$i][4],2);
					}
				}
				echo json_encode($arrEle);
#				echo var_dump($arrEle);
			break;

			case "respag2";
				$caSql="";
				$codProyecto=trim($_POST["codProyecto"]);
				$mes=trim($_POST["mes"]);
				$ano=trim($_POST["ano"]);
				$selMoneda=trim($_POST["selMoneda"]);

				$caSql="SELECT proyectos.pro_codigo,contrato.cont_nomcontratista,MONTH(facturacion.fact_fech_pago),YEAR(facturacion.fact_fech_pago),SUM(facturacion.fact_valor_consign) FROM proyectos INNER JOIN facturacion ON proyectos.pro_codigo=facturacion.pro_codigo INNER JOIN contrato ON proyectos.pro_codigo=contrato.pro_codigo AND facturacion.fact_estado='' AND facturacion.fact_valor_consign!='' ";

				$caSql.=($codProyecto != '') ? " AND proyectos.pro_codigo LIKE '%$codProyecto%'" : "";
				$caSql.=($mes != '') ? " AND MONTH(facturacion.fact_fech_pago) = '$mes'" : "";
				$caSql.=($ano != '') ? " AND YEAR(facturacion.fact_fech_pago) = '$ano'" : "";
#				$caSql.=($ano != '') ? " AND YEAR(facturacion.fact_fech_pago) = '$ano'" : "";
#				$caSql.="ORDER BY proyectos.pro_codigo ";
#				$caSql.="GROUP BY 1,2,3,4 ORDER BY 1,4,3";
				$caSql.="GROUP BY 1 ORDER BY 1";
				
#				$rs=$db->Execute($caSql);
				$arProyectos=$db->GetArray($caSql);
				$arrEle = array();
				for($i=0; $i<count($arProyectos); $i++){
					$arrEle[$i]['contador']=$i+1;
					$arrEle[$i]['proCodigo']=trim($arProyectos[$i][0]);
					$arrEle[$i]['proNombre']=trim($arProyectos[$i][1]);
					$arrEle[$i]['anoPagFac']=trim($arProyectos[$i][2]);

					if($selMoneda=='euro'){
						$valEuro=divisas('EUR');
						$arrEle[$i]['valPagFac']=numero($arProyectos[$i][4]/$valEuro,2)." €"; 
					}else{
						$arrEle[$i]['valPagFac']="$ ".numero($arProyectos[$i][4],2);
					}
				}
				echo json_encode($arrEle);
#				echo var_dump($arrEle);
			break;

			case "lista1";
				$caSql="";
				$codProyecto=trim($_POST["codProyecto"]);
				$nomProyecto=trim($_POST["nomProyecto"]);
				$nomCliente=trim($_POST["nomCliente"]);
				$selMoneda=trim($_POST["selMoneda"]);
				$selEstado=trim($_POST["selEstado"]);

				$caSql="SELECT proyectos.pro_codigo,proyectos.pro_nombre,cliente.cli_nombre,proyectos.pro_fech_ini,proyectos.pro_fech_fin,proyectos.pro_porcentaje,proyectos.pro_valor_contrato FROM proyectos INNER JOIN cliente ON proyectos.pro_codigo=cliente.pro_codigo ";

				$caSql.=($codProyecto != '') ? " AND proyectos.pro_codigo LIKE '%$codProyecto%'" : "";
				$caSql.=($nomProyecto != '') ? " AND proyectos.pro_nombre LIKE '%$nomProyecto%'" : "";
				$caSql.=($nomCliente != '') ? " AND cliente.cli_nombre LIKE '%$nomCliente%'" : "";
				$caSql.=($selEstado == 'activo') ? " AND proyectos.pro_fech_fin > CURDATE()" : "";
				$caSql.=($selEstado == 'termin') ? " AND proyectos.pro_fech_fin < CURDATE()" : "";
#				$caSql.="GROUP BY 1,2,3,4,5,6,7,8";
				
#				$rs=$db->Execute($caSql);
				$arProyectos=$db->GetArray($caSql);
				$arrEle = array();
				for($i=0; $i<count($arProyectos); $i++){
					$arrEle[$i]['contador']=$i+1;
					$arrEle[$i]['proCodigo']=trim($arProyectos[$i][0]);
					$arrEle[$i]['proNombre']=trim($arProyectos[$i][1]);
					$arrEle[$i]['cliNombre']=trim($arProyectos[$i][2]);
					$arrEle[$i]['proFecIni']=fecha_texto2($arProyectos[$i][3]);
					$fecFinProy=$arProyectos[$i][4];
					$fecFinPror=fecFinProrroga($arProyectos[$i][0]);

					$hoy=date("Y-m-d");
					if($fecFinPror!=""){
						$fecFinProrr=fecha_texto2($fecFinPror);
						if($fecFinProy > $fecFinPror) $fecFinal=$fecFinProy;
						else $fecFinal=$fecFinPror;
					}else{
						$fecFinProrr=$fecFinPror;
						$fecFinal=$fecFinProy;
					}
					
					if($fecFinal <= $hoy){
						$estado="Terminado";
					}else{
						$estado="Ejecución";
					}
					
					$arrEle[$i]['proFecFin']=fecha_texto2($fecFinProy);
					$arrEle[$i]['proFecFinPror']=$fecFinProrr;#$fecFinal." >= ".$hoy;#
					$arrEle[$i]['estado']=$estado;
#					$arrEle[$i]['estado']=$estado." ".$selEstado;

/**/
					$proValCon=$arProyectos[$i][6];
					$valAdione=round(valorAdiciones($arProyectos[$i][0]));
					$valAdione1=round(valorAdiciones1($arProyectos[$i][0]));
					$valFactur=round(valorFacturado($arProyectos[$i][0]));
					$valAntici=round(valorAnticipo($arProyectos[$i][0]));
					$valDifere=($proValCon+$valAdione)-($valFactur+$valAntici);
					$porcentaj=(($valFactur+$valAntici)*100)/($proValCon+$valAdione+$valAdione1);

					if($selMoneda=='euro'){
						$valEuro=divisas('EUR');
						$arrEle[$i]['proValCon']="€ ".numero($proValCon/$valEuro,2); 
						$arrEle[$i]['valAdione']="€ ".numero($valAdione/$valEuro,2);
						$arrEle[$i]['valAdione1']="€ ".numero($valAdione1/$valEuro,2);
						$arrEle[$i]['valFactur']="€ ".numero($valFactur/$valEuro,2);
						$arrEle[$i]['valAntici']="€ ".numero($valAntici/$valEuro,2);
						$arrEle[$i]['valDifere']="€ ".numero($valDifere/$valEuro,2);
					}else if($selMoneda=='dolar'){
						$valDolar=divisas('EUR');
						$arrEle[$i]['proValCon']="US$ ".numero($proValCon/$valDolar,2);
						$arrEle[$i]['valAdione']="US$ ".numero($valAdione/$valDolar,2);
						$arrEle[$i]['valAdione1']="US$ ".numero($valAdione1/$valDolar,2);
						$arrEle[$i]['valFactur']="US$ ".numero($valFactur/$valDolar,2);
						$arrEle[$i]['valAntici']="US$ ".numero($valAntici/$valDolar,2);
						$arrEle[$i]['valDifere']="US$ ".numero($valDifere/$valDolar,2);
					}else{
						$arrEle[$i]['proValCon']="$ ".numero($proValCon,2);
						$arrEle[$i]['valAdione']="$ ".numero($valAdione,2);
						$arrEle[$i]['valAdione1']="$ ".numero($valAdione1,2);
						$arrEle[$i]['valFactur']="$ ".numero($valFactur,2);
						$arrEle[$i]['valAntici']="$ ".numero($valAntici,2);
						$arrEle[$i]['valDifere']="$ ".numero($valDifere,2);
					}
					$arrEle[$i]['porcentaj']=numero($porcentaj,2);
/**/					
				}
				echo json_encode($arrEle);
#				echo var_dump($caSql);
				
			break;

			case "lista2";
				$codProyecto=trim($_POST["codProyecto"]);
				$selMoneda=trim($_POST["selMoneda"]);

				$caSql="";
				$caSql="SELECT * FROM anticipo WHERE anticipo.pro_codigo='$codProyecto'";
				$arAnticipo=$db->GetArray($caSql);
				for($i=0; $i<count($arAnticipo); $i++){
					$arrEle[$i]['numFactura']=$arAnticipo[$i][1];
					$arrEle[$i]['perFactura']='ANTICIPO';
					$arrEle[$i]['fecFactura']=fecha_texto2($arAnticipo[$i][2]);
					$arrEle[$i]['valBasFact']=numero($arAnticipo[$i][3],0);
					$arrEle[$i]['valIva']=numero($arAnticipo[$i][3]*($arAnticipo[$i][4]/100),0);
				}

				$caSql="";
				$caSql="SELECT * FROM facturacion  
								WHERE facturacion.pro_codigo='$codProyecto'
								AND facturacion.fact_estado!='A' 
								ORDER BY facturacion.fact_numero";
				$arFacturacion=$db->GetArray($caSql);
				for($i=0; $i<count($arFacturacion); $i++){
#					$valFacTot+=$arFacturacion[$i][7];
#					array_push($arrEle, $valFacTot);
				}
				
				echo json_encode($arrEle);
			break;

			case "ediproy":
				$codProyecto=mayusculas($_POST["codProyecto"]);
				$caSql="SELECT * FROM proyectos WHERE pro_codigo='$codProyecto'";
				$arr=$db->GetArray($caSql);
				$numReg=count($arr);
				for($i=0; $i<count($arr); $i++){
					$arrEle[$i]['cod']=trim($arr[$i][0]);
					$arrEle[$i]['nom']=trim($arr[$i][1]);
					$arrEle[$i]['fecini']=trim($arr[$i][2]);
					$arrEle[$i]['fecfin']=trim($arr[$i][3]);
					$arrEle[$i]['cli']=trim($arr[$i][4]);
					$arrEle[$i]['dir']=trim($arr[$i][5]);
					$arrEle[$i]['valconiva']=trim($arr[$i][6]);
					$arrEle[$i]['valsiniva']=trim($arr[$i][7]);
					$arrEle[$i]['por']=trim($arr[$i][8]);
					$arrEle[$i]['porant']=trim($arr[$i][9]);
					$arrEle[$i]['des']=trim($arr[$i][10]);
				}
				echo json_encode($arrEle);
#				echo $caSql;
			break;

			case "docume";
				$codProyecto=trim($_POST["codProyecto"]);
				$nomProyecto=trim($_POST["nomProyecto"]);

				$caSql="";
				$caSql="SELECT proyectos.pro_codigo,proyectos.pro_nombre,cliente.cli_nombre,proyectos.pro_fech_ini,proyectos.pro_fech_fin,proyectos.pro_porcentaje,proyectos.pro_valor_contrato FROM proyectos INNER JOIN cliente ON proyectos.pro_codigo=cliente.pro_codigo ";

				$caSql.=($codProyecto != '') ? " AND proyectos.pro_codigo LIKE '%$codProyecto%'" : "";
				$caSql.=($nomProyecto != '') ? " AND proyectos.pro_nombre LIKE '%$nomProyecto%'" : "";

				$arProyecto=$db->GetArray($caSql);
				for($i=0; $i<count($arProyecto); $i++){
					$arrEle[$i]['contador']=$i+1;
					$arrEle[$i]['proCodigo']=$arProyecto[$i][0];
					$arrEle[$i]['proNombre']=$arProyecto[$i][1];;
					$arrEle[$i]['proFecIni']=fecha_texto2($arProyecto[$i][3]);
				}
				
				echo json_encode($arrEle);
			break;

			case "consulFecha":
				$txtFecha=trim($_REQUEST["txtFecha"]);

			  $cadSql2="";
			  $cadSql2="SELECT count(*) FROM horas_laboradas WHERE hor_fecha ='$txtFecha'";
			  $rs=$db->Execute($cadSql2);
			  while (!$rs->EOF) {
				  $varCont = $rs->fields[0];
				  $rs->MoveNext();
			  }

				$cadSql="";
				$cadSql="SELECT rh_idusuario,rh_cedula,rh_nombre,DATE(rh_hora),MIN(TIME(rh_hora)),MAX(TIME(rh_hora)) FROM reporte_horas WHERE rh_hora LIKE '%$txtFecha%' GROUP BY 1,2 ORDER BY 3";
				$arHora = $db->GetArray($cadSql);
				if(count($arHora)>0){
					$html='<table width="590" cellspacing="0" border="1">
									<thead class="cabecerasTablas" bgcolor="536CC6" >
										<tr>
											<th width="170">Nombre</th>
											<th width="100">Fecha</th>
											<th width="90">Hora Inicio</th>
											<th width="90">Hora Final</th>
											<th width="70">Total</th>
										</tr>
									</thead>';
					for($i=0; $i<count($arHora); $i++){
					 $totalHoras=restarHoras($arHora[$i][4],$arHora[$i][5]);
					 $html.='<tr>
										<td class="textopequeno">'.trim($arHora[$i][2]).'</td>
										<td class="textopequeno" align="center">'.fecha_texto(trim($arHora[$i][3])).'</td>
										<td class="textopequeno" align="center">'.trim($arHora[$i][4]).'</td>
										<td class="textopequeno" align="center">'.trim($arHora[$i][5]).'</td>
										<td class="textopequeno" align="center">'.$totalHoras.'</td>
									</tr>';
					 if($varCont == 0){
						 $caSql = "";
						 $caSql = "INSERT INTO horas_laboradas (hor_fecha,hor_id,hor_cedula,hor_total) VALUES ('".trim($arHora[$i][3])."',".trim($arHora[$i][0]).",'".trim($arHora[$i][1])."','".$totalHoras."')";
#						 $db->Execute($caSql);
					 }
					}
					$html.='</table></br>';
				}else{
					$html='<h2 class="titulo"><font color="#CC0000">NO SE ENCONTRARON DATOS PARA ESA FECHA</font></h2>';
				}
#				echo $cadSql; SEC_TO_TIME(SUM(TIME_TO_SEC(hor_total)))
				echo $html;
			break;

			case "consulFechaCon":
				$txtFecInicio=trim($_REQUEST["txtFecInicio"]);
				$txtFecFinal=trim($_REQUEST["txtFecFinal"]);

				$cadSql="";
				$cadSql="SELECT hor_id,hor_nombre,SEC_TO_TIME(SUM(ROUND(TIME_TO_SEC(hor_total)))) FROM horas_laboradas WHERE hor_fecha BETWEEN '$txtFecInicio' AND '$txtFecFinal' AND hor_id NOT IN (15) AND hor_id NOT IN (1) GROUP BY 1,2 ORDER BY 2";
				$arHora = $db->GetArray($cadSql);
				if(count($arHora)>0){
					$html='<table width="590" cellspacing="0" border="1">
									<thead>
										<tr>
											<th width="170">Nombre</th>
											<th width="100">Fecha Inicio</th>
											<th width="100">Fecha Final</th>
											<th width="70">Total Horas</th>
										</tr>
									</thead>';
					for($i=0; $i<count($arHora); $i++){
							$html.='<tr>
											<td class="textopequeno">'.trim($arHora[$i][1]).'</td>
											<td class="textopequeno" align="center">'.fecha_texto($txtFecInicio).'</td>
											<td class="textopequeno" align="center">'.fecha_texto($txtFecFinal).'</td>
											<td class="textopequeno" align="center">'.trim($arHora[$i][2]).'</td>
										</tr>';
					}
					$html.='</table></br>';
				}else{
					$html='<h2 class="titulo"><font color="#CC0000">NO SE ENCONTRARON DATOS PARA ESA FECHA</font></h2>';
				}
#				echo $cadSql;
				echo $html;
			break;

		}

#		echo $numReg;
		unset($db);
	}

?>