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

<title>Anticipo</title>

	<script type="text/javascript">
		$(document).ready(function() {

			$("#txtAntValorCons").numeric();
			$("#txtAntFecPago").datepicker({
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
						opc:"conanti" 
					},
					function(data){
						$("#selAntNumCtaCobro").html(data);
					});            
				});
			})
			
			$("#selAntNumCtaCobro").change(function () {
				$("#selAntNumCtaCobro option:selected").each(function () {
					numFactura=$(this).val();
					codProyecto=$("#selCodProyecto").val();
//					alert(numFactura+' '+codProyecto); return false();
					var parametros = {
						"codProyecto":codProyecto,
						"antNumCtaCobro":numFactura,
						opc:"conant"
					};
					$.ajax({
						async: true,
						type: "POST",
						url: "../scripts/modulo/ajax/verificar.php",
						data: parametros,
						dataType: "json",
						success:function (data) {
							$.each(data,function(index,value) {
								$("#hidAntValorCons").attr({'value':data[index].valo});
								$("#txtAntValorCons").attr({'value':data[index].valo});
								$("#hidAntFecGenCobro").attr({'value':data[index].fech});
							});
							$("#loading").hide();
						},
						error: function(data){
//							alert('Error Sofia');
							$("#txtAntValorCons").attr({'value':''});
						}
					});

				});

			})

			$("#enviar").click(function (){
				$(".error").remove();
                if($("#selCodProyecto").val()==""){
                    $("#selCodProyecto").focus().after("<span class='error'>Debe Seleccionar el Número del Proyecto</span>");
                    return false;
				}else if( $("#selAntNumCtaCobro").val() == "" ){
                    $("#selAntNumCtaCobro").focus().after("<span class='error'>Ingrese el número de la cuenta de cobro</span>");
                    return false;
                }else if( $("#txtAntFecPago").val() == "" ){
                    $("#txtAntFecPago").focus().after("<span class='error'>Ingrese la fecha de pago del anticipo</span>");
                    return false;
				}else if(validate_fechaMayorQue($("#hidAntFecGenCobro").val(),$("#txtAntFecPago").val())==0){
					$("#txtAntFecPago").focus().after("<span class='error'>La fecha de pago debe ser mayor a la fecha de emision</span>");
					return false;
				}else if( $("#txtAntValorCons").val() == "" ){
                    $("#txtAntValorCons").focus().after("<span class='error'>Ingrese el valor consignado del anticipo</span>");
                    return false;
				}else if($("#txtAntValorCons").val() > $("#hidAntValorCons").val()){
                    $("#txtAntValorCons").focus().after("<span class='error'>El valor del pago no debe ser mayor al de la cuenta de cobro</span>");
                    return false;
                }else{
//					alert(" OK "+$("#txtPorProy").val()+" "+$("#txtValProy").val());
					$('#txtBandera').attr({'value':'1'});
					$('#frmCrearAnticipo').attr('action','./index.php?seccion=PAGOANTI');
					$('#frmCrearAnticipo').submit();
                }
			});	

            $("#limpiar").click(function(){
                $("#selCodProyecto").attr({'value':''});
				$("#selAntNumCtaCobro").attr({'value':''});
                $("#txtAntFecPago").attr({'value':''});
                $("#txtAntValorCons").attr({'value':''});
				$("#txtAntPagoDescrip").attr({'value':''});
				$("#hidAntFecGenCobro").attr({'value':''});
				
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
        <form id="frmCrearAnticipo" name="frmCrearAnticipo" method="post">
        	<input type="hidden" id="txtBandera" name="txtBandera" value="" class=""/>
            <input type="hidden" id="hidAntFecGenCobro" name="hidAntFecGenCobro" value="" class=""/>
            <input type="hidden" id="hidAntValorCons" name="hidAntValorCons" value="" class=""/>
        	<table cellpading="5" cellspacing="0" align="center" width="43%">
                <tr>
                  <td colspan="3" class="subtexto">
                    <img src="./img/inicio/top.png" alt="" width="546" id="top">
                    <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
                      <tr>
                        <td width="76%" align="center"><h2 class="titulo"><font color="#CC0000">Crear Pago Anticipo</font></h2></td>
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
                    <td width="6%" align="left">&nbsp;</td>
                    <td width="33%" align="left"><label class="subtexto"><font color="#005199">Numero Cuenta de Cobro<font color="red">*</font></label></td>
                    <td width="61%" align="left">
                    	<select name="selAntNumCtaCobro" id="selAntNumCtaCobro" class="" style="width: 250px;" />
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="33%" align="left"><label class="subtexto"><font color="#005199">Fecha Pago<font color="red">*</font></label></td>
                    <td width="61%" align="left">
                        <input type="text" id="txtAntFecPago" name="txtAntFecPago" style="width: 250px;" value="<?php echo $txtAntFecPago; ?>" readonly/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="33%" align="left"><label class="subtexto"><font color="#005199">Valor Consignado<font color="red">*</font></label></td>
                    <td width="61%" align="left">
                        <input type="text" id="txtAntValorCons" name="txtAntValorCons" style="width: 250px;" value="<?php echo $txtAntValorCons; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"><label class="subtexto"><font color="#005199">Observación</label></font></td>
                  <td align="left">
                  	<input type="text" id="txtAntPagoDescrip" name="txtAntPagoDescrip" style="width: 250px;" value="<?php echo $txtAntPagoDescrip; ?>"/>
                    <span id="status"></span></td>
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