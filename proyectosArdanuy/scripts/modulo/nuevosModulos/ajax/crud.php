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

	if(isset($_POST["hidOpc"])){
		sleep(1);
		switch($_POST["hidOpc"]){
			case "uptusu":
				echo $_POST["hidOpc"]." ".$_POST["txtNombre"]." ".$_POST["txtClave"]." ".$_POST["txtApellido"];
				$fun_nombre = mayusculas(trim($_POST["txtNombre"]));
				$fun_apellido = mayusculas(trim($_POST["txtApellido"]));
				$fun_telefono = trim($_POST["txtTelefono"]);
				$fun_estado = trim($_POST["selEstado"]);
				$caSql = "UPDATE funcionario SET fun_nombre='$fun_nombre', fun_apellido='$fun_apellido', 
						  fun_telefono='$fun_telefono', fun_estado='$fun_estado' 
						  WHERE fun_codigo='".$_POST["hidCodigo"]."'";
				$db->Execute($caSql);

				if($_POST["txtClave"] != ''){
					$usu_login = mayusculas(trim($_POST["hidLogin"]));
					$usu_clave = md5($_POST["txtClave"]);
					$caSql = "UPDATE usuario SET usu_clave='$usu_clave' WHERE usu_login='$usu_login'";
					$db->Execute($caSql);
				}
#				$rs=$db->Execute($caSql);
#				$arr = $db->GetArray($caSql);
#				$numReg = count($arr);
#				echo $_POST["hidOpc"]." ".$_POST["txtNombre"]." ".$_POST["txtClave"]." ".$_POST["txtApellido"];
			break;

			case "uptmenu":
				echo $_POST["hidOpc"]." ".$_POST["txtNombre"]." ".$_POST["txtRuta"]." ".$_POST["selPadre"]." ".$_POST["selAcceso"];
				$menu_nomb = mayusculas(trim($_POST["txtNombre"]));
				$menu_ruta = trim($_POST["txtRuta"]);
				$menu_desc = minusculasInicial(trim($_POST["txtDescripcion"]));
				$menu_padr = trim($_POST["selPadre"]);
				$menu_orde = trim($_POST["txtOrden"]);
				$menu_acce = trim($_POST["selAcceso"]);
				$caSql = "";
				$caSql = "UPDATE modulo SET mod_descripcion='$menu_desc', mod_archivo='$menu_ruta', mod_ordenpadre='$menu_padr', 
						  mod_orden=$menu_orde, mod_visible=$menu_acce WHERE mod_codigo='$menu_nomb'";
				$db->Execute($caSql);
			break;
			
			case "uptproy":
				echo $_POST["txtCodProy"]." ".utf8_decode(mayusculas($_POST["txtNomProy"]))." ".$_POST["txtFecIniProy"]." ".$_POST["txtFecFinProy"];
				$pro_nombre = mayusculas($_POST["txtNomProy"]); $txtFecIniProy=mayusculas(trim($_POST["txtFecIniProy"]));
				$txtFecFinProy = mayusculas(trim($_POST["txtFecFinProy"])); $txtDesProy=mayusculas(trim($_POST["txtDesProy"]));
				$txtCliProy = mayusculas(trim($_POST["txtCliProy"])); $txtDirProy=mayusculas(trim($_POST["txtDirProy"]));
				$txtValProy = mayusculas(trim($_POST["txtValProy"])); $txtPorProy=mayusculas(trim($_POST["txtPorProy"]));
				$caSql = "UPDATE proyectos SET pro_nombre='$pro_nombre',pro_fech_ini='$txtFecIniProy',
						  pro_fech_fin='$txtFecFinProy',pro_descripcion='$txtDesProy',
						  pro_cliente='$txtCliProy',pro_director='$txtDirProy',
						  pro_valor_contrato='$txtValProy',pro_porcentaje='$txtPorProy'
						  WHERE pro_codigo='".$_POST["txtCodProy"]."'";
				$db->Execute($caSql);
			break;
			
		}
#		echo $numReg;
		unset($db);
	}

?>