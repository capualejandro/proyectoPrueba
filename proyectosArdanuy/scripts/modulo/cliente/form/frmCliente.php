<?php
	$caSql = "";
	$caSql = "SELECT pro_codigo FROM proyectos";
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

<title>Proyecto</title>

	<script type="text/javascript">
		$(document).ready(function() {
/*						
			$("#selCodProyecto").change(function () {
				$("#selCodProyecto option:selected").each(function () {
					codProyecto = $(this).val();
					$.post("../scripts/modulo/ajax/verificar.php",{
						codProyecto:codProyecto,
						opc:"conanti" 
					},
					function(data){
						$("#selNumContrato").html(data);
					});            
				});
			})
*/			
			$("#selCodProyecto").change(function () {
				$("#selCodProyecto option:selected").each(function () {
					codProyecto=$(this).val();
					var parametros = {
						"codProyecto":codProyecto,
						opc:"concli" 
					};
					$.ajax({
						async: true,
						type: "POST",
						url: "../scripts/modulo/ajax/verificar.php",
						data: parametros,
						dataType: "json",
						success:function (data) {
							$.each(data,function(index,value) {
								$("#txtNumContrato").attr({'value':data[index].nit});
							});
//							$("#loading").hide();
						},
						error: function(data){
//							alert('Error Sofia');
							$("#txtNumContrato").attr({'value':''});
						}
					});

				});

			})


			$("#selPaisClie").change(function () {
				$("#selPaisClie option:selected").each(function () {
					codPais = $(this).val();
					$.post("../scripts/modulo/ajax/verificar.php",{
						codPais:codPais,
						opc:"conpais" 
					},
					function(data){
						$("#selCiudadClie").html(data);
					});            
				});

			})

			$("#enviar").click(function (){
				$(".error").remove();
                if($("#selCodProyecto").val()=="" ){
                    $("#selCodProyecto").focus().after("<span class='error'>Debe Seleccionar el Codigo del Proyecto</span>");
                    return false;
                }else if($("#txtNumContrato").val()==""){
                    $("#txtNumContrato").focus().after("<span class='error'>Debe Seleccionar el Número del Contrato</span>");
                    return false;
                }else if($("#txtNomClie").val()=="" ){
                    $("#txtNomClie").focus().after("<span class='error'>Ingrese el Nombre del Cliente</span>");
                    return false;
                }else if($("#txtNitClie").val()==""){
                    $("#txtNitClie").focus().after("<span class='error'>Ingrese el Nit</span>");
                    return false;
                }else if($("#txtNomContacClie").val()==""){
                    $("#txtNomContacClie").focus().after("<span class='error'>Ingrese el Nombre del Contacto</span>");
                    return false;		
				}else if($("#txtDirClie").val()==""){
                    $("#txtDirClie").focus().after("<span class='error'>Ingrese la Dirección</span>");
                    return false;
                }else if($("#selPaisClie").val()==""){
                    $("#selPaisClie").focus().after("<span class='error'>Seleccione el pais</span>");
                    return false;
                }else if($("#selCiudadClie").val()==""){
                    $("#selCiudadClie").focus().after("<span class='error'>Seleccione la Ciudad</span>");
                    return false;
                }else if($("#txtTelClie").val()==""){
                    $("#txtTelClie").focus().after("<span class='error'>Ingrese el teléfono</span>");
                    return false;
                }else{
//					alert(" OK "+$("#txtPorProy").val()+" "+$("#txtValProy").val());
					$('#txtBandera').attr({'value':'1'});
					$('#frmCliente').attr('action','./index.php?seccion=CREACLIENT');
					$('#frmCliente').submit();
                }
			});	

            $("#limpiar").click(function(){
			    $("#selCodProyecto").attr({'value':''});
			    $("#txtNumContrato").attr({'value':''});	
                $("#txtNomClie").attr({'value':''});
                $("#txtNitClie").attr({'value':''}); 
				$("#txtNomContacClie").attr({'value':''});
                $("#txtDirClie").attr({'value':''});
                $("#selPaisClie").attr({'value':''});
                $("#selCiudadClie").attr({'value':''});
                $("#txtTelClie").attr({'value':''});
				$("#txtDescClie").attr({'value':''});
//				$(location).attr('href','./index.php?seccion=INICIO');
            });

		});

		   
    </script>

</head>

<body>

 	<div>  
        <form id="frmCliente" name="frmCliente" method="post">
        	<input type="hidden" id="txtBandera" name="txtBandera" value="" class=""/>
        	<table cellpading="5" cellspacing="0" align="center" width="43%">
                <tr>
                  <td colspan="3" class="subtexto">
                    <img src="./img/inicio/top.png" alt="" width="546" id="top">
                    <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
                      <tr>
                        <td width="76%" align="center"><h2 class="titulo"><font color="#CC0000">Crear Cliente</font></h2></td>
                        <td width="24%"><img src="./img/inicio/login.jpg" width="94" height="89" /></td>
                      </tr>
                    </table>
                    
                  </td>
                </tr>

                <tr>
                  <td width="6%" align="left">&nbsp;</td>
                  <td width="28%" align="left"><label class="subtexto"><font color="#005199">Número Proyecto <font color="red">*</font></label></td>
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
                  <td width="28%" align="left"><label class="subtexto"><font color="#005199">Número del Contrato<font color="red">*</font></label></td>
                  <td width="66%" align="left"><span id="status"></span>
                    <input type="text" id="txtNumContrato" name="txtNumContrato" style="width: 250px;" value="<?php echo $txtNumContrato; ?>" readonly/>
                    <span id="status"></span>
                  </td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td width="28%" align="left"><label class="subtexto"><font color="#005199">Nombre<font color="red">*</font></label></td>
                  <td width="66%" align="left">
                    <input type="text" id="txtNomClie" name="txtNomClie" class="" style="width: 250px;" value="<?php echo $txtNomClie; ?>"/>
                    <span id="status"></span>
                  </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="28%" align="left"><label class="subtexto"><font color="#005199">Nit<font color="red">*</font></label></td>
                    <td width="66%" align="left">
                        <input type="text" id="txtNitClie" name="txtNitClie" class="" style="width: 250px;" value="<?php echo $txtNitClie; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"><span class="subtexto"><font color="#005199">Nombre Contacto<font color="red">*</font></span></td>
                  <td align="left">
                  	<input type="text" id="txtNomContacClie" name="txtNomContacClie" style="width: 250px;" value="<?php echo $txtNomContacClie; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="28%" align="left"><label class="subtexto"><font color="#005199">Dirección<font color="red">*</font></label></td>
                    <td width="66%" align="left">
                        <input type="text" id="txtDirClie" name="txtDirClie" class="" style="width: 250px;" value="<?php echo $txtDirClie; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"><label class="subtexto"><font color="#005199">Pais<font color="red">*</font></label></td>
                  <td align="left">
                    <select name="selPaisClie" id="selPaisClie" class="" style="width: 250px;">
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
                    <span id="status"></span></td>
                </tr>
                
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"><label class="subtexto"><font color="#005199">Ciudad<font color="red">*</font></label></td>
                  <td align="left">
                  	<select name="selCiudadClie" id="selCiudadClie" class="" style="width: 250px;" />
                  	<!--<input type="text" id="txtCiudClie" name="txtCiudClie" class="" style="width: 250px;" value="<?php echo $txtCiudClie; ?>"/>-->
                    <span id="status"></span></td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td height="24" align="left"><span class="subtexto"><font color="#005199">Teléfono<font color="red">*</font></span></td>
                  <td align="left">
                  	<input type="text" id="txtTelClie" name="txtTelClie" class="" style="width: 250px;" value="<?php echo $txtTelClie; ?>"/>
                  </td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td height="24" align="left"><span class="subtexto"><font color="#005199">Observaciones</font></span></td>
                  <td align="left">
                  	<input type="text" id="txtDescClie" name="txtDescClie" class="" style="width: 250px;" value="<?php echo $txtDescClie; ?>"/>
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
                  <td colspan="3" class="subtexto"><font color="#005199">Los campos con <font color="red">*</font> son obligatorios.<font color="#005199"></font></td>
                </tr>
                <tr>
                  <td colspan="3" class="subtexto"><img id="bottom" src="./img/inicio/bottom.png" alt="" width="546"></td>
                </tr>
            
            </table>
        
        </form>
	</div>
</body>
</html>