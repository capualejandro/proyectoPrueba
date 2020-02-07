<?php
	#Este codigo es para taer los proyectos creados
	#
	$caSql = "";
	$caSql = "SELECT pro_codigo FROM proyectos";
#	echo "<pre>$caSql - $txtBandera</pre>"; 
	$arProy = $db->GetArray($caSql);
	$arProyecto = array(''=>'Seleccione');
	for($i=0; $i<count($arProy); $i++){
		$arProyecto[$arProy[$i][0]] = $arProy[$i][0];
	}

	$caSql = "";
	$caSql = "SELECT cod_pais,nom_pais FROM pais";
#	echo "<pre>$caSql - $txtBandera</pre>"; 
	$arPais = $db->GetArray($caSql);
	$arPaises = array(''=>'Seleccione');
	for($i=0; $i<count($arPais); $i++){
		$arPaises[$arPais[$i][0]] = $arPais[$i][1];
	}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Contratos</title>


	<script type="text/javascript">
		$(document).ready(function() {

			$("#selCodProyecto").change(function(){
				var parametros = {
					"opc" : "conpro",
					"codProyecto" : $("#selCodProyecto").val()
				};
				
			});

			$("#selPaisCont").change(function () {
				$("#selPaisCont option:selected").each(function () {
					codPais = $(this).val();
					$.post("../scripts/modulo/ajax/verificar.php",{
						codPais:codPais,
						opc:"conpais" 
					},
					function(data){
						$("#selCiudadCont").html(data);
					});            
				});

			})
			
			$("#enviar").click(function (){
				$(".error").remove();
                if($("#selCodProyecto").val()==""){
                    $("#selCodProyecto").focus().after("<span class='error'>Debe Seleccionar el Numero del Proyecto</span>");
                    return false;
				}else if( $("#txtContNum").val() == "" ){
                    $("#txtContNum").focus().after("<span class='error'>Debe Ingresar el Numero del Contrato</span>");
                    return false;
                }else if( $("#txtClasCont").val() == "" ){
                    $("#txtClasCont").focus().after("<span class='error'>Ingrese Clase del Contrato</span>");
                    return false;
                }else if( $("#txtObjCont").val() == "" ){
                    $("#txtObjCont").focus().after("<span class='error'>Ingrese el Objeto del Contrato</span>");
                    return false;
				}else if( $("#txtObjCont").val() == "" ){
                    $("#txtObjCont").focus().after("<span class='error'>Ingrese el Objeto del Contrato</span>");
                    return false;				
				}else if( $("#txtNombContrCont").val() == "" ){
                    $("#txtNombContrCont").focus().after("<span class='error'>Ingrese el Nombre del Contratista</span>");
                    return false;
                }else if( $("#txtNitCont").val() == "" ){
                    $("#txtNitCont").focus().after("<span class='error'>Ingrese el Nit del Contratista</span>");
                    return false;
				}else if( $("#txtDirCont").val() == "" ){
                    $("#txtDirCont").focus().after("<span class='error'>Ingrese la dirección del Contratista</span>");
                    return false;
				}else if( $("#selPaisCont").val() == "" ){
                    $("#selPaisCont").focus().after("<span class='error'>Seleccione el Pais del Contratista</span>");
                    return false;
				}else if( $("#selCiudadCont").val() == "" ){
                    $("#selCiudadCont").focus().after("<span class='error'>Seleccione la Ciudad del Contratista</span>");
                    return false;
				}else if( $("#txtTelCont").val() == "" ){
                    $("#txtTelCont").focus().after("<span class='error'>Ingrese el teléfono del Contratista</span>");
                    return false;
                }else{
//					alert(" OK "+$("#txtPorProy").val()+" "+$("#txtValProy").val());
					$('#txtBandera').attr({'value':'1'});
					$('#frmCrearContrato').attr('action','./index.php?seccion=CREACONTRA');
					$('#frmCrearContrato').submit();
                }
			});	

            $("#limpiar").click(function(){
                $("#selCodProyecto").attr({'value':''});
                $("#txtContNum").attr({'value':''});
                $("#txtClasCont").attr({'value':''});
                $("#txtObjCont").attr({'value':''});
                $("#txtNombContrCont").attr({'value':''});
                $("#txtNitCont").attr({'value':''});
                $("#txtDirCont").attr({'value':''});
				$("#selPaisCont").attr({'value':''});
				$("#selCiudadCont").attr({'value':''});
				$("#txtTelCont").attr({'value':''});
//				$(location).attr('href','./index.php?seccion=INICIO');
            });

		});

		   
    </script>

</head>

<body>

 	<div>  
        <form id="frmCrearContrato" name="frmCrearContrato" method="post">
        	<input type="hidden" id="txtBandera" name="txtBandera" value="" class=""/>
            <table cellpading="5" cellspacing="0" align="center" width="43%">
                <tr>
                  <td colspan="3" class="subtexto">
                    <img src="./img/inicio/top.png" alt="" width="546" id="top">
                    <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
                      <tr>
                        <td width="76%" align="center"><h2 class="titulo"><font color="#CC0000">Crear Contratista</font></h2></td>
                        <td width="24%"><img src="./img/inicio/login.jpg" width="94" height="89" /></td>
                      </tr>
                    </table>
                    
                  </td>
                </tr>

                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"><label class="subtexto"><font color="#005199">Número Proyecto <font color="red">*</font></label></td>
                  <td align="left">
                      <select name="selCodProyecto" id="selCodProyecto" class="" style="width: 250px;">
                        <?php 
                            foreach($arProyecto as $indice => $valor){
                                if($selCodProyecto==$indice){ 
                                    echo "<option value='$indice' selected> ".minusculasInicial($valor)."</option>";
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
                    <td width="6%" align="left">&nbsp;</td>
                    <td width="26%" align="left"><label class="subtexto"><font color="#005199">Número Contrato<font color="red">*</font></label></td>
                    <td width="68%" align="left">
                        <input type="text" id="txtContNum" name="txtContNum" class="" style="width: 250px;" value="<?php echo $txtContNum; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"><label class="subtexto"><font color="#005199">Clase Contrato<font color="red">*</font></label></td>
                  <td align="left"><input type="text" id="txtClasCont" name="txtClasCont" class="" style="width: 250px;" value="<?php echo $txtClasCont; ?>"/>
                    <span id="status4"></span></td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="26%" align="left"><label class="subtexto"><font color="#005199">Objeto Contrato<font color="red">*</font></label></td>
                    <td width="68%" align="left">
                        <input type="text" id="txtObjCont" name="txtObjCont" class="" style="width: 250px;" value="<?php echo $txtObjCont; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="26%" align="left"><label class="subtexto"><font color="#005199">Nombre Contratista<font color="red">*</font></label></td>
                    <td width="68%" align="left">
                        <input type="text" id="txtNombContrCont" name="txtNombContrCont" style="width: 250px;" value="<?php echo $txtNombContrCont; ?>" />
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="26%" align="left"><label class="subtexto"><font color="#005199">Nit Contratista<font color="red">*</font></label></td>
                    <td width="68%" align="left">
                        <input type="text" id="txtNitCont" name="txtNitCont" style="width: 250px;" value="<?php echo $txtNitCont; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="26%" align="left"><label class="subtexto"><font color="#005199">Dirección<font color="red">*</font></label></td>
                    <td width="68%" align="left">
                        <input type="text" id="txtDirCont" name="txtDirCont" class="" style="width: 250px;" value="<?php echo $txtDirCont; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                
                </tr>
                                
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"><label class="subtexto"><font color="#005199">Pais<font color="red">*</font></label></td>
                  <td align="left">
                    <select name="selPaisCont" id="selPaisCont" class="" style="width: 250px;">
                    <?php 
                        foreach($arPaises as $indice => $valor){
                            if($selPais==$indice){ 
                                echo "<option value='$indice' selected> ".trim($valor)."</option>";
                            }else{
                                echo "<option value='$indice'> ".trim($valor)." </option>";
                            }
                        } 
                    ?>
                    </select>
                    <span id="status3"></span>
                  </td>
                </tr>
                
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"><label class="subtexto"><font color="#005199">Ciudad<font color="red">*</font></label></td>
                  <td align="left">
                  	<select name="selCiudadCont" id="selCiudadCont" class="" style="width: 250px;" />
                    <!--<input type="text" id="txtCiudCont" name="txtCiudCont" style="width: 250px;" value="<?php echo $txtCiudCont; ?>"/>-->
                    <span id="status2"></span>
                  </td>
                </tr>
                
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="26%" align="left"><label class="subtexto"><font color="#005199">Teléfono<font color="red">*</font></label></td>
                    <td width="68%" align="left">
                        <input type="text" id="txtTelCont" name="txtTelCont" style="width: 250px;" value="<?php echo $txtTelCont; ?>"/>
                        <span id="status"></span>
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
                  <td colspan="3" class="subtexto"><font color="#005199">Los campos con <font color="red">*</font> <font color="#005199">son obligatorios.</font></td>
                </tr>
                <tr>
                  <td colspan="3" class="subtexto"><img id="bottom" src="./img/inicio/bottom.png" alt="" width="546"></td>
                </tr>
            
            </table>
        
        </form>
	</div>
</body>
</html>