<?php

	$caSql = "";
	$caSql = "SELECT pro_codigo FROM proyectos";
	$arProy = $db->GetArray($caSql);
	$arProyecto = array(''=>'Seleccione');
	for($i=0; $i<count($arProy); $i++){
		$arProyecto[$arProy[$i][0]] = $arProy[$i][0];
	}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Proyecto</title>

	<script type="text/javascript">
		$(document).ready(function() {
/*						
			$("#selCodProyecto").change(function () {
				$("#selCodProyecto option:selected").each(function () {
					codProyecto = $(this).val();
				});
			})           
*/					

			$("#enviar").click(function (){
				$(".error").remove();
                if($("#selCodProyecto").val()=="" ){
                    $("#selCodProyecto").focus().after("<span class='error'>Debe Ingresar el Codigo del Proyecto</span>");
                    return false;
                }else if($("#txtNitEmpPro").val()==""){
                    $("#txtNitEmpPro").focus().after("<span class='error'>Ingrese el nit de la empresa</span>");
                    return false;
                }else if($("#txtNomEmpPro").val()=="" ){
                    $("#txtNomEmpPro").focus().after("<span class='error'>Ingrese el nombre de la empresa</span>");
                    return false;
                }else if($("#txtDirEmpPro").val()==""){
                    $("#txtDirEmpPro").focus().after("<span class='error'>Ingrese la dirección de la empresa</span>");
                    return false;
				}else if($("#txtPaisEmpPro").val()==""){
                    $("#txtPaisEmpPro").focus().after("<span class='error'>seleccione el pais de la empresa</span>");
                    return false;
                }else if($("#txtCiudEmpPro").val()==""){
                    $("#txtCiudEmpPro").focus().after("<span class='error'>seleccione la ciudad de la empresa</span>");
                    return false;
                }else if($("#txtTelEmpPro").val()==""){
                    $("#txtTelEmpPro").focus().after("<span class='error'>Ingrese el el telefono de la empresa</span>");
                    return false;
                }else{
//					alert(" OK "+$("#txtPorProy").val()+" "+$("#txtValProy").val());
					$('#txtBandera').attr({'value':'1'});
					$('#frmEmpresa').attr('action','./index.php?seccion=CREAEMP');
					$('#frmEmpresa').submit();
                }
			});	

            $("#limpiar").click(function(){
			    $("#selCodProyecto").attr({'value':''});
                $("#txtNitEmpPro").attr({'value':''});
                $("#txtNomEmpPro").attr({'value':''});
                $("#txtDirEmpPro").attr({'value':''});
                $("#txtPaisEmpPro").attr({'value':''});
                $("#txtCiudEmpPro").attr({'value':''});
                $("#txtTelEmpPro").attr({'value':''});
//                $("#EmpConfPro").attr({'value':''});
				$("#txtNomSocioEmpPro").attr({'value':''});
                $("#txtDescEmpPro").attr({'value':''});
//				$(location).attr('href','./index.php?seccion=INICIO');
            });

		});

		   
    </script>

</head>

<body>

 	<div>  
        <form id="frmEmpresa" name="frmEmpresa" method="post">
        	<input type="hidden" id="txtBandera" name="txtBandera" value="" class=""/>
        	<table cellpading="5" cellspacing="0" align="center" width="43%">
                <tr>
                  <td colspan="3" class="subtexto">
                    <img src="./img/inicio/top.png" alt="" width="546" id="top">
                    <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
                      <tr>
                        <td width="76%" align="center"><h2 class="titulo">Crear Empresa</h2></td>
                        <td width="24%"><img src="./img/inicio/login.jpg" width="94" height="89" /></td>
                      </tr>
                    </table>
                    
                  </td>
                </tr>


                <tr>
                  <td width="6%" align="left">&nbsp;</td>
                  <td width="28%" align="left"><label class="subtexto">Codigo <font color="red">*</font></label></td>
                  <td width="66%" align="left">
                    <select name="selCodProyecto" id="selCodProyecto" class="" style="width: 250px;">
                      <?php
						foreach($arProyecto as $indice => $valor){ 
							if($selCodProyecto==$indice){
								echo "<option value='$indice' selected> ".minusculasInicial($valor)." </option>";
							}else{
								echo "<option value='$indice'> ".minusculasInicial($valor)." </option>";
							}
						} 
					  ?>
                    </select>
                    <span id="status"></span>
                  </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="28%" align="left"><label class="subtexto">Nit<font color="red">*</font></label></td>
                    <td width="66%" align="left">
                        <input type="text" id="txtNitEmpPro" name="txtNitEmpPro" class="" style="width: 250px;" value="<?php echo $txtNitEmpPro; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="28%" align="left"><label class="subtexto">Nombre<font color="red">*</font></label></td>
                    <td width="66%" align="left">
                        <input type="text" id="txtNomEmpPro" name="txtNomEmpPro" class="" style="width: 250px;" value="<?php echo $txtNomEmpPro; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="28%" align="left"><label class="subtexto">Dirección<font color="red">*</font></label></td>
                    <td width="66%" align="left">
                        <input type="text" id="txtDirEmpPro" name="txtDirEmpPro" class="" style="width: 250px;" value="<?php echo $txtDirEmpPro; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td width="28%" align="left"><label class="subtexto">Pais<font color="red">*</font></label></td>
                  <td width="66%" align="left">
                    <input type="text" id="txtPaisEmpPro" name="txtPaisEmpPro" class="" style="width: 250px;" value="<?php echo $txtPaisEmpPro; ?>"/>
                    <span id="status"></span>
                  </td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"><label class="subtexto">Ciudad<font color="red">*</font></label></td>
                  <td align="left">
                  	<input type="text" id="txtCiudEmpPro" name="txtCiudEmpPro" style="width: 250px;" value="<?php echo $txtCiudEmpPro; ?>"/>
                    <span id="status"></span>
                  </td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"><label class="subtexto">Teléfono<font color="red">*</font></label></td>
                  <td align="left">
                  	<input type="text" id="txtTelEmpPro" name="txtTelEmpPro" class="" style="width: 250px;" value="<?php echo $txtTelEmpPro; ?>"/>
                    <span id="status"></span>
                  </td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td height="31" align="left"><span class="subtexto">Observaciones</span></td>
                  <td align="left">
                  	<input type="text" id="txtDescEmpPro" name="txtDescEmpPro" style="width: 250px;" value="<?php echo $txtDescEmpPro; ?>"/>
                  </td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td height="31" align="left">&nbsp;</td>
                  <td align="left">
                    <input type="button" name="enviar" id="enviar" class="boton" value="Continuar"/>
                    <input type="button" name="limpiar" id="limpiar" class="boton" value="Limpiar"/>
                  </td>
                </tr>
                <tr>
                  <td colspan="3" class="subtexto">Los campos con <font color="red">*</font> son obligatorios.</td>
                </tr>
                <tr>
                  <td colspan="3" class="subtexto"><img id="bottom" src="./img/inicio/bottom.png" alt="" width="546"></td>
                </tr>
            
            </table>
        
        </form>
	</div>
</body>
</html>