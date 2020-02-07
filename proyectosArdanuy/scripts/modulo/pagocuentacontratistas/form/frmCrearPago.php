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

<title>Facturacion</title>

	<script type="text/javascript">
		$(document).ready(function() {

			$("#txtValFact").numeric();
			$("#txtFecPagFact").datepicker({
//				showWeek: true,
				dateFormat: 'yy-mm-dd',
				changeMonth: true, 
				changeYear: true
			});
			
			$("#selCodProyecto").change(function () {
				$("#selCodProyecto option:selected").each(function () {
					codProyecto = $(this).val();
					$.post("../scripts/modulo/ajax/verificar.php",{
						codProyecto:codProyecto,
						opc:"confac" 
					},
					function(data){
						$("#selNumFact").html(data);
					});            
				});
			})
/**
			$("#selNumFact").change(function () {
				$("#selNumFact option:selected").each(function () {
					numFactura=$(this).val();
					codProyecto=$("#selCodProyecto").val();
					$.post("../scripts/modulo/ajax/verificar.php",{
						codProyecto:codProyecto,
						numFactura:numFactura,
						opc:"conpag" 
					},
					function(data){
						$("#txtFecEmision").attr({'value':data});
					});            
				});
			})
/**/
			$("#selNumFact").change(function () {
				$("#selNumFact option:selected").each(function () {
					numFactura=$(this).val();
					codProyecto=$("#selCodProyecto").val();
					var parametros = {
						"codProyecto":codProyecto,
						"numFactura":numFactura,
						opc:"conpag" 
					};
					$.ajax({
						async: true,
						type: "POST",
						url: "../scripts/modulo/ajax/verificar.php",
						data: parametros,
						dataType: "json",
						success:function (data) {
							$.each(data,function(index,value) {
								$("#hidValFact").attr({'value':data[index].valo});
								$("#txtValFact").attr({'value':data[index].valo});
								$("#txtFecEmision").attr({'value':data[index].fech});
							});
							$("#loading").hide();
						},
						error: function(data){
//							alert('Error Sofia');
							$("#txtValFact").attr({'value':''});
						}
					});

				});

			})

			$("#enviar").click(function (){
				$(".error").remove();
                if($("#selCodProyecto").val()==""){
                    $("#selCodProyecto").focus().after("<span class='error'>Debe Seleccionar el Número del Proyecto</span>");
                    return false;
				}else if($("#selIdentifCont").val()==""){
                    $("#selIdentifCont").focus().after("<span class='error'>Seleccione la identificación del contratista</span>");
                    return false;
				}else if($("#selNumFact").val()==""){
                    $("#selNumFact").focus().after("<span class='error'>Seleccione el número de la cuenta y/o factura</span>");
                    return false;
                }else if($("#txtFecPagFact").val()==""){
                    $("#txtFecPagFact").focus().after("<span class='error'>Ingrese la fecha de pago de la factura</span>");
                    return false;
				}else if(validate_fechaMayorQue($("#txtFecEmision").val(),$("#txtFecPagFact").val())==0){
					$("#txtFecPagFact").focus().after("<span class='error'>La fecha de pago debe ser mayor a la fecha de emision</span>");
					return false;
                }else if($("#txtValFact").val()==""){
                    $("#txtValFact").focus().after("<span class='error'>Ingrese el valor pagado</span>");
                    return false;
                }else if($("#txtValFact").val() > $("#hidValFact").val()){
                    $("#txtValFact").focus().after("<span class='error'>El valor del pago no debe ser mayor al de la cuenta y/o Factura</span>");
					
					else if ("selCodProyecto").focus().after ("<span class='error'>Ingrese el numero del proyecto");
					return false;
					
				}else{
//					alert(" OK "+$("#txtPorProy").val()+" "+$("#txtValProy").val());
					$('#txtBandera').attr({'value':'1'});
					$('#frmCrearPago').attr('action','./index.php?seccion=PAGOCONTRA');
					$('#frmCrearPago').submit();
                }
			});	

			$("#anular").click(function (){
				$(".error").remove();
				if($("#selCodProyecto").val()==""){
					$("#selCodProyecto").focus().after("<span class='error'>Debe Seleccionar el Número del Proyecto</span>");
					return false;
				}else if($("#selNumFact").val()==""){
					$("#selNumFact").focus().after("<span class='error'>Seleccione el número de la cuenta y/o factura</span>");
					return false;
				}else{
					$('#txtBandera').attr({'value':'1'});
					$('#frmCrearPago').attr('action','./index.php?seccion=ANULFACT');
					$('#frmCrearPago').submit();
				}else if($("#selNumFact").val()==""){
					$("#selNumFact").focus().after("<span class='error'>Seleccione el número de la cuenta y/o factura</span>");
					return false;
			    }else if($("#selNumFact").val()==""){
					$("#selNumFact").focus().after("<span class='error'>Seleccione el número de la cuenta y/o factura</span>");
					return false;
				}else if($("#selNumFact").val()==""){
					$("#selNumFact").focus().after("<span class='error'>Seleccione el número de la cuenta y/o factura</span>");
					return false;
				}else if($("#selNumFact").val()==""){
					$("#selNumFact").focus().after("<span class='error'>Seleccione el número de la cuenta y/o factura</span>");
					return false;
				}else if($("#selNumFact").val()==""){
					$("#selNumFact").focus().after("<span class='error'>Seleccione el número de la cuenta y/o factura</span>");
					return false;
				}else if($("#selNumFact").val()==""){
					$("#selNumFact").focus().after("<span class='error'>Seleccione el número de la cuenta y/o factura</span>");
					return false;
				}else if($("#selNumFact").val()==""){
					$("#selNumFact").focus().after("<span class='error'>Seleccione el número de la cuenta y/o factura</span>");
					return false;
				}else if($("#selNumFact").val()==""){
					$("#selNumFact").focus().after("<span class='error'>Seleccione el número de la cuenta y/o factura</span>");
					return false;
							
					
		       
				}
			});
	
	
			$("#limpiar").click(function(){
				$("#selCodProyecto").attr({'value':''});
				$("#selIdentifCont").attr({'value':''});				
				$("#selNumFact").attr({'value':''});
				$("#txtFecPagFact").attr({'value':''});
				$("#txtValFact").attr({'value':''});
				$("#selCodProyecto").attr({'value':});
				$("#txtFecEmision").attr({'value':''});
				$("#selCodProyecto2").attr({'value':''});
				$("#selNumFact").attr({'value':''});
				$("#txtFecPagFact").attr('value':});
				$("#txtFecEmision").attr({'value':''});
//				$(location).attr('href','./index.php?seccion=INICIO');
      });

		});

		function validate_fechaMayorQue(fechaInicial,fechaFinal){
//			alert(fechaInicial+' > '+fechaFinal);
			if((Date.parse(fechaInicial)) > (Date.parse(fechaFinal))){
				return 0;
			}
			return 1;
		}

    </script>

</head>

<body>

 	<div>
        <form id="frmCrearPago" name="frmCrearPago" method="post">
        	<input type="hidden" id="txtBandera" name="txtBandera" value="" class=""/>
            <input type="hidden" id="txtFecEmision" name="txtFecEmision" value="" class=""/>
            <input type="hidden" id="hidValFact" name="hidValFact" value="" class=""/>
        	<table cellpading="5" cellspacing="0" align="center" width="43%">
                <tr>
                  <td colspan="3" class="subtexto">
                    <img src="./img/inicio/top.png" alt="" width="546" id="top">
                    <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
                      <tr>
                        <td width="76%" align="center"><h2 class="titulo"><font color="#CC0000">Crear Pagos Cuenta y/o Factura</font></h2></td>
                        <td width="24%"><img src="./img/inicio/login.jpg" width="94" height="89" /></td>
                      </tr>
                    </table>
                    
                  </td>
                </tr>

                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"><label class="subtexto">Número Proyecto <font color="red">*</font></label></td>
                  <td align="left">
                      <select name="selCodProyecto" id="selCodProyecto" class="" style="width: 250px;">
						<?php 
							foreach($arProyecto as $indice => $valor){ 
						?>
                               <option value="<?php echo $indice; ?>"> <?php echo minusculasInicial($valor); ?> </option>
                        <?php 
							} 
						?>
                      </select>
                      <span id="status"></span>
                  </td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"><span class="subtexto">Identificación Contratista<font color="red">*</font></span></td>
                  <td align="left"><select name="selCodProyecto2" id="selCodProyecto2" class="" style="width: 250px;">
                    <?php 
							foreach($arProyecto as $indice => $valor){ 
						?>
                    <option value="<?php echo $indice; ?>"> <?php echo minusculasInicial($valor); ?></option>
                    <?php 
							} 
						?>
                  </select></td>
                </tr>
                <tr>
                    <td width="6%" align="left">&nbsp;</td>
                    <td width="26%" align="left"><label class="subtexto">Numero Cuenta y/o Factura<font color="red">*</font></label></td>
                    <td width="68%" align="left">
                        <select name="selNumFact" id="selNumFact" class="" style="width: 250px;" />
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="26%" align="left"><label class="subtexto">Fecha Pago<font color="red">*</font></label></td>
                    <td width="68%" align="left">
                        <input type="text" id="txtFecPagFact" name="txtFecPagFact" style="width: 250px;" value="<?php echo $txtFecPagFact; ?>" readonly/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="26%" align="left"><label class="subtexto">Valor Pago<font color="red">*</font></label></td>
                    <td width="68%" align="left">
                        <input type="text" id="txtValFact" name="txtValFact" class="" style="width: 250px;" value="<?php echo $txtValFact; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td height="31" align="left">Valor Sin Iva<font color="red">*</font></td>
                  <td align="left"><input type="text" id="txtValFact2" name="txtValFact2" class="" style="width: 250px;" value="<?php echo $txtValFact; ?>"/></td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td height="31" align="left">Codigo Proyecto<font color="red">*</font></td>
                  <td align="left"><input type="text" id="txtValFact4" name="txtValFact4" class="" style="width: 250px;" value="<?php echo $txtValFact; ?>"/></td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td height="31" align="left">Valor Contrato + Adiciones<font color="red">*</font></td>
                  <td align="left"><input type="text" id="txtValFact5" name="txtValFact5" class="" style="width: 250px;" value="<?php echo $txtValFact; ?>"/></td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td height="31" align="left">Valor Facturado<font color="red">*</font></td>
                  <td align="left"><input type="text" id="txtValFact6" name="txtValFact6" class="" style="width: 250px;" value="<?php echo $txtValFact; ?>"/></td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td height="31" align="left">Valor Pendiente en Facturar<font color="red">*</font></td>
                  <td align="left"><input type="text" id="txtValFact7" name="txtValFact7" class="" style="width: 250px;" value="<?php echo $txtValFact; ?>"/></td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td height="31" align="left">%Descuentos<font color="red">*</font></td>
                  <td align="left"><input type="text" id="txtValFact3" name="txtValFact3" class="" style="width: 250px;" value="<?php echo $txtValFact; ?>"/></td>
                </tr>
                <tr>
              
             $("#anular").click(function (){
				$(".error").remove();
				if($("#selCodProyecto").val()==""){
					$("#selCodProyecto").focus().after("<span class='error'>Debe Seleccionar el Número del Proyecto</span>");
					return false;
				}else if($("#selNumFact").val()==""){
					$("#selNumFact").focus().after("<span class='error'>Seleccione el número de la cuenta y/o factura</span>");
					return false;
				}else{
					$('#txtBandera').attr({'value':'1'});
					$('#frmCrearPago').attr('action','./index.php?seccion=ANULFACT');
					$('#frmCrearPago').submit();
				}
			});
	
	
			$("#limpiar").click(function(){
				$("#selCodProyecto").attr({'value':''});
				$("#selIdentifCont").attr({'value':''});				
				$("#selNumFact").attr({'value':''});
				$("#txtFecPagFact").attr({'value':''});
				$("#txtValFact").attr({'value':''});
				$("#txtFecEmision").attr({'value':''});
                
                
                
                  <td align="left">&nbsp;</td>
                  <td height="31" align="left">&nbsp;</td>
                  <td align="left">
                    <input type="button" name="enviar" id="enviar" class="boton" value="Grabar"/>
                    <input type="button" name="anular" id="anular" class="boton" value="Anular"/>
                    <input type="button" name="limpiar" id="limpiar" class="boton" value="Limpiar"/>
                   </td>
                </tr>
                <tr>
                  <td colspan="3" class="subtexto"><font color="#005199">Los campos con <font color="red">*</font><font color="#005199"> son obligatorios.</font></td>
                </tr>
                <tr>
                  <td colspan="3" class="subtexto"><img id="bottom" src="./img/inicio/bottom.png" alt="" width="546"></td>
                </tr>
            
            </table>
        
        </form>
	</div>
</body>
</html>