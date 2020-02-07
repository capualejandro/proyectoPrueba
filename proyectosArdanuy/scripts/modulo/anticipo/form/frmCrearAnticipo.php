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

			$("#txtAntValor").numeric();
			$("#txtAntFecGenCobro").datepicker({
//				showWeek: true,
				dateFormat: 'yy-mm-dd',
				changeMonth: true, 
				changeYear: true
			});
			
			$("#txtAntFecPago").datepicker({
//				showWeek: true,
				dateFormat: 'yy-mm-dd',
				changeMonth: true, 
				changeYear: true
			});
			
			$("#selCodProyecto").change(function(){
				var parametros = {
					"opc" : "conpro",
					"codProyecto" : $("#selCodProyecto").val()
				};
				
			});

			$("#enviar").click(function (){
				$(".error").remove();
                if($("#selCodProyecto").val()==""){
                    $("#selCodProyecto").focus().after("<span class='error'>Debe Seleccionar el Número del Proyecto</span>");
                    return false;
				}else if( $("#txtAntNumCtaCobro").val() == "" ){
                    $("#txtAntNumCtaCobro").focus().after("<span class='error'>Ingrese el número de la cuenta de cobro</span>");
                    return false;
                }else if( $("#txtAntFecGenCobro").val() == "" ){
                    $("#txtAntFecGenCobro").focus().after("<span class='error'>Ingrese la fecha de emision de la cuenta de cobro</span>");
                    return false;
				}else if( $("#txtAntValor").val() == "" ){
                    $("#txtAntValor").focus().after("<span class='error'>Ingrese el valor del anticipo</span>");
                    return false;					
				}else if( $("#txtAntIva").val() == "" ){
                    $("#txtAntIva").focus().after("<span class='error'>Ingrese el Iva</span>");
                    return false;					

                }else{
//					alert(" OK "+$("#txtPorProy").val()+" "+$("#txtValProy").val());
					$('#txtBandera').attr({'value':'1'});
					$('#frmCrearAnticipo').attr('action','./index.php?seccion=CREAANTICI');
					$('#frmCrearAnticipo').submit();
                }
			});	

            $("#limpiar").click(function(){
                $("#txtAntNumCtaCobro").attr({'value':''});
                $("#txtAntFecGenCobro").attr({'value':''});
				$("#txtAntDescrip").attr({'value':''});
				
//				$(location).attr('href','./index.php?seccion=INICIO');
            });
			
				$("#selCodProyecto").change(function(){
				$("#selCodProyecto option:selected").each(function () {
					codProyecto=$(this).val();
//					alert(numFactura+' '+codProyecto); return false();
					var parametros = {
						"codProyecto":codProyecto,
						opc:"valant"
					};
					$.ajax({
						async: true,
						type: "POST",
						url: "../scripts/modulo/ajax/verificar.php",
						data: parametros,
						dataType: "json",
						success:function (data) {
							$.each(data,function(index,value) {
								$("#txtAntValor").attr({'value':data[index].valo});
							});
							$("#loading").hide();
						},
						error: function(data){
//							alert('Error Sofia');
							$("#txtAntValor").attr({'value':''});
						}
					});

				});

			});

		});
    
    </script>

</head>

<body>

 	<div>  
        <form id="frmCrearAnticipo" name="frmCrearAnticipo" method="post">
        	<input type="hidden" id="txtBandera" name="txtBandera" value="" class=""/>
        	<table cellpading="5" cellspacing="0" align="center" width="43%">
                <tr>
                  <td colspan="3" class="subtexto">
                    <img src="./img/inicio/top.png" alt="" width="546" id="top">
                    <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
                      <tr>
                        <td width="76%" align="center"><h2 class="titulo"><font color="#CC0000">Crear Anticipo</font></h2></td>
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
                    <td width="33%" align="left"><label class="subtexto"><font color="#005199">Numero Cuenta de Cobro <font color="red">*</font></label></td>
                    <td width="61%" align="left"><input type="text" id="txtAntNumCtaCobro" name="txtAntNumCtaCobro" style="width: 250px;" value="<?php echo $txtAntNumCtaCobro; ?>"/> </td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"><span class="subtexto"><font color="#005199">Fecha Generación Cuenta <font color="red">*</font></span></td>
                  <td align="left"><input type="text" id="txtAntFecGenCobro" name="txtAntFecGenCobro" style="width: 250px;" value="<?php echo $txtAntFecGenCobro; ?>" readonly/></td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"><span class="subtexto"><font color="#005199">Valor Anticipo</span><span class="subtexto"> <font color="red">*</font></span></td>
                  <td align="left"><input type="text" id="txtAntValor" name="txtAntValor" class="" style="width: 250px;" value="<?php echo $txtAntValor; ?>"/></td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"><span class="subtexto"><font color="#005199">Iva</span><span class="subtexto"> <font color="red">*</font></span></td>
                  <td align="left"><input type="text" id="txtAntIva" name="txtAntIva" class="" style="width: 250px;" value="<?php echo $txtAntIva; ?>"/></td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"><label class="subtexto"><font color="#005199">Observación</font></label></td>
                  <td align="left"><input type="text" id="txtAntDescrip" name="txtAntDescrip" class="" style="width: 250px;" value="<?php echo $txtAntDescrip; ?>"/>
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