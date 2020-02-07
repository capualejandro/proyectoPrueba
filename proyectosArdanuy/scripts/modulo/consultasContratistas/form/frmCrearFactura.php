<?php
	$caSql = "";
	$caSql = "SELECT pro_codigo FROM proyectos";
#	echo "<pre>$caSql - $txtBandera</pre>"; 
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

			$("#txtFecEmiFact").datepicker({
				showWeek: true,
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

			$("#enviar").click(function (){
				$(".error").remove();
                if($("#selCodProyecto").val()==""){
                    $("#selCodProyecto").focus().after("<span class='error'>Debe Seleccionar el Número del Proyecto</span>");
                    return false;
				}else if( $("#txtNumFact").val() == "" ){
                    $("#txtNumFact").focus().after("<span class='error'>Ingrese el número de la factura</span>");
                    return false;
                }else if( $("#txtFecEmiFact").val() == "" ){
                    $("#txtFecEmiFact").focus().after("<span class='error'>Ingrese la fecha de emision de la factura</span>");
                    return false;
                }else if( $("#txtValFact").val() == "" ){
                    $("#txtValFact").focus().after("<span class='error'>Ingrese el valor a cobrar</span>");
                    return false;
                }else if( $("#txtIvaFact").val() == "" ){
                    $("#txtIvaFact").focus().after("<span class='error'>Ingrese el iva aplicar para la cuenta de cobro</span>");
                    return false;
                }else{
//					alert(" OK "+$("#txtPorProy").val()+" "+$("#txtValProy").val());
					$('#txtBandera').attr({'value':'1'});
					$('#frmCrearFactura').attr('action','./index.php?seccion=FACTURA');
					$('#frmCrearFactura').submit();
                }
			});	

            $("#limpiar").click(function(){
                $("#selCodProyecto").attr({'value':''});
				$("#txtNumFact").attr({'value':''});
                $("#txtFecEmiFact").attr({'value':''});
                $("#txtValFact").attr({'value':''});
                $("#txtIvaFact").attr({'value':''});
//				$(location).attr('href','./index.php?seccion=INICIO');
            });

		});
    
    </script>

</head>

<body>

 	<div>  
        <form id="frmCrearFactura" name="frmCrearFactura" method="post">
        	<input type="hidden" id="txtBandera" name="txtBandera" value="" class=""/>
        	<table cellpading="5" cellspacing="0" align="center" width="43%">
                <tr>
                  <td colspan="3" class="subtexto">
                    <img src="./img/inicio/top.png" alt="" width="546" id="top">
                    <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
                      <tr>
                        <td width="76%" align="center"><h2 class="titulo">Crear Factura</h2></td>
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
                    <td width="6%" align="left">&nbsp;</td>
                    <td width="23%" align="left"><label class="subtexto">Numero Factura<font color="red">*</font></label></td>
                    <td width="71%" align="left">
                        <input type="text" id="txtNumFact" name="txtNumFact" class="" style="width: 250px;" value="<?php echo $txtNumFact; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="23%" align="left"><label class="subtexto">Fecha Emision<font color="red">*</font></label></td>
                    <td width="71%" align="left">
                        <input type="text" id="txtFecEmiFact" name="txtFecEmiFact" style="width: 250px;" value="<?php echo $txtFecEmiFact; ?>" readonly/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="23%" align="left"><label class="subtexto">Valor Factura<font color="red">*</font></label></td>
                    <td width="71%" align="left">
                        <input type="text" id="txtValFact" name="txtValFact" class="" style="width: 250px;" value="<?php echo $txtValFact; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="23%" align="left"><label class="subtexto">Iva Factura<font color="red">*</font></label></td>
                    <td width="71%" align="left">
                        <input type="text" id="txtIvaFact" name="txtIvaFact" class="" style="width: 250px;" value="<?php echo $txtIvaFact; ?>"/>
                        <span id="status"></span>
                    </td>               
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