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


 			$("#txtValPagFactServ").numeric();
			
			
			$("#txtFecPagFactServ").datepicker({
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
				}else if( $("#txtNumFactServ").val() == "" ){
						$("#txtNumFactServ").focus().after("<span class='error'>Ingrese el número de la factura</span>");
						return false;
				}else if( $("#txtFecPagFactServ").val() == "" ){
						$("#txtFecPagFactServ").focus().after("<span class='error'>Ingrese la fecha de pago de la factura</span>");
						return false;
				}else if($("#selTipPago").val() == ""){
						$("#selTipPago").focus().after("<span class='error'>Seleccione tipo de pago</span>");
						return false;	
				}else if( $("#txtValPagFactServ").val() == "" ){
						$("#txtValPagFactServ").focus().after("<span class='error'>Ingrese el valor del pago</span>");
						return false;					
				}else if( $("#txtConcepFactServ").val() == "" ){
						$("#txtConcepFactServ").focus().after("<span class='error'>Ingrese el concepto del pago de la factura pago</span>");
						return false;					
				}

				$('#txtBandera').attr({'value':'1'});
				$('#frmCrearPagoFactServ').attr('action','./index.php?seccion=FACTSERVPR');
				$('#frmCrearPagoFactServ').submit();
			});	

            $("#limpiar").click(function(){
                $("#selCodProyecto").attr({'value':''});
				$("#txtNumFactServ").attr({'value':''});
                $("#txtFecPagFactServ").attr({'value':''});
                $("#txtAbonoFactServ").attr({'value':''});
                $("#txtValPagFactServ").attr({'value':''});
                $("#txtConcepFactServ").attr({'value':''});				
//				$(location).attr('href','./index.php?seccion=INICIO');
            });

		});
    
    </script>

</head>

<body>

 	<div>  
        <form id="frmCrearPagoFactServ" name="frmCrearPagoFactServ" method="post">
        	<input type="hidden" id="txtBandera" name="txtBandera" value="" class=""/>
        	<table cellpading="5" cellspacing="0" align="center" width="43%">
                <tr>
                  <td colspan="3" class="subtexto">
                    <img src="./img/inicio/top.png" alt="" width="546" id="top">
                    <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
                      <tr>
                        <td width="76%" align="center"><h2 class="titulo"><font color="#CC0000">Crear Pago Factura</font><font color="#CC0000"> Servicios Profesionales</font></h2></td>
                        <td width="24%"><img src="./img/inicio/login.jpg" width="94" height="89" /></td>
                      </tr>
                    </table>
                    
                  </td>
                </tr>

                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left" class="colortexto"><label>Número Proyecto <font color="red">*</font></label></td>
                  <td align="left">
                      <select name="selCodProyecto" id="selCodProyecto" style="width: 250px;">
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
                    <td width="25%" align="left" class="colortexto"><label>Numero Factura<font color="red">*</font></label></td>
                    <td width="69%" align="left">
                        <input type="text" id="txtNumFactServ" name="txtNumFactServ" class="" style="width: 250px;" value="<?php echo $txtNumFactServ; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="25%" align="left" class="colortexto"><label>Fecha Pago<font color="red">*</font></label></td>
                    <td width="69%" align="left">
                        <input type="text" id="txtFecPagFactServ" name="txtFecPagFactServ" style="width: 250px;" value="<?php echo $txtFecPagFactServ; ?>" readonly/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left" class="colortexto"><span>Tipo Pago<font color="red">*</font></span></td>
                  <td align="left">
                  <select id="selTipPago" name="selTipPago" style="width: 250px;">
                  	<option value="">Selecciones</option>
                  	<option value="abono">Abono</option>
                  	<option value="total">Pago Total</option>
                  </select>
                  <!--<input type="text" id="txtAbonoFactServ" name="txtAbonoFactServ" class="" style="width: 250px;" value="<?php echo $txtAbonoFactServ; ?>"/>-->
                  </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="25%" align="left" class="colortexto"><label>Valor Pago<font color="red">*</font></label></td>
                    <td width="69%" align="left">
                        <input type="text" id="txtValPagFactServ" name="txtValPagFactServ" class="" style="width: 250px;" value="<?php echo $txtValPagFactServ; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td height="31" align="left" class="colortexto"><span>Concepto<font color="red">*</font></span></td>
                  <td align="left">
<!--
                  <textarea id="txtConcepFactServ" name="txtConcepFactServ" cols="29">
                  	<?php echo $txtConcepFactServ; ?>
                  </textarea>
-->                  
                  <input type="text" id="txtConcepFactServ" name="txtConcepFactServ" style="width: 250px;" value="<?php echo $txtConcepFactServ; ?>"/>
                  
                  </td>
                  <span id="status"></span>
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