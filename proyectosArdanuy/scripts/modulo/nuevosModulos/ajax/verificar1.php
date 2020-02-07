<?php

	include_once("../../../scripts/adodb5/adodb.inc.php");
	include_once("../../../scripts/adodb5/adodb-exceptions.inc.php");
	include_once("../../../scripts/lib/libFunBasicas.php");
	include_once("../../../scripts/lib/fechalib.php");

# Conexion Server
#	$motorBD="mssql"; $sevidorBD="192.168.7.120"; $usuarioBD="sa"; $claveBD="hpml370g%"; $basedatos="HorasExtras";
# Conexion MySQL
	$motorBD="MySQL"; $sevidorBD="127.0.0.1"; $usuarioBD="root"; $claveBD=""; $basedatos="fichaproyectos";

	$db=&ADONewConnection($motorBD); #Aquí le decimos que motor base de datos queremos trabajar
	$db->Pconnect($sevidorBD, $usuarioBD, $claveBD, $basedatos); #"servidor","usuario","contraseña","basededatos"

	if(isset($_POST["opc"])){
#		sleep(1);
		switch($_POST["opc"]){
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
			
			case "edi":
				$fun_codigo = mayusculas($_POST["fun_codigo"]);
				$caSql = "SELECT a.fun_nombre, a.fun_apellido, a.fun_telefono, a.fun_estado, b.usu_login 
						  FROM funcionario AS a, usuario AS b
						  WHERE a.fun_codigo='$fun_codigo' AND a.fun_identificacion=b.fun_identificacion";
				$arr = $db->GetArray($caSql);
				$numReg = count($arr);
				for($i=0; $i<count($arr); $i++){
					$arrEle[$i]['nom'] = minusculasInicial($arr[$i][0]);
					$arrEle[$i]['ape'] = minusculasInicial($arr[$i][1]);
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
				$caSql="SELECT pro_codigo,pro_nombre,pro_fech_ini,pro_fech_fin,pro_descripcion,
						pro_cliente,pro_director,pro_valor_contrato,pro_porcentaje,usu_login
						FROM proyectos
						WHERE pro_codigo='".$pro_codigo."'";
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
				$caSql="SELECT fact_consecutivo,fact_numero FROM facturacion WHERE pro_codigo='$codProyecto' AND fact_valor_consign=0";
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
				$caSql="SELECT ant_fech_gene_cobro,ant_valor,ant_iva,ant_valor_total 
								FROM anticipo WHERE pro_codigo='$codProyecto' AND ant_num_cta_cobro=$numFactura";
				$rs=$db->Execute($caSql);
				$arAnt=$db->GetArray($caSql);
				for($i=0; $i<count($arAnt); $i++){
					$arrEle[$i]['fech']=trim($arAnt[$i][0]);
					$ant_valor_consignado=$arAnt[$i][3];#($arAnt[$i][2]*$arAnt[$i][1])/100;
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
				$caSql="SELECT cod_ciudad,nom_ciudad FROM ciudad WHERE cod_pais='$codPais'";
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
			
			case "valant":
				$codProyecto=trim($_REQUEST["codProyecto"]);
				$caSql="SELECT pro_valor_cont_sin_iva,pro_porcentaje_antic FROM proyectos WHERE pro_codigo='$codProyecto'";
				$rs=$db->Execute($caSql);
				$arAnt=$db->GetArray($caSql);
				for($i=0; $i<count($arAnt); $i++){
					$valor_anticipo=$arAnt[$i][0]*($arAnt[$i][1]/100);#($arAnt[$i][2]*$arAnt[$i][1])/100;
					$arrEle[$i]['valo']=$valor_anticipo;
				}
				echo json_encode($arrEle);
#				echo $fact_fech_emision;
			break;
			
		}
#		echo $numReg;
		unset($db);
	}

?>