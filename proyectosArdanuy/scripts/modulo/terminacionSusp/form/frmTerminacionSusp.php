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

<title>Suspension</title>

	<script type="text/javascript">
		$(document).ready(function() {

			$("#txtFecFinSusp").datepicker({
//				showWeek: true,
				dateFormat: 'yy-mm-dd',
				changeMonth: true, 
				changeYear: true
			});

/*			$("#selCodProyecto").change(function () {
				$("#selCodProyecto option:selected").each(function () {
					codProyecto = $(this).val();
					var parametros = {
						"codProyecto":codProyecto,
						opc:"consus" 
					};
					$.ajax({
						async: true,
						type: "POST",
						url: "../scripts/modulo/ajax/verificar.php",
						data: parametros,
						dataType: "json",
						success:function (data) {
							$.each(data,function(index,value) {
								$("#txtNumFinSusp").attr({'value':data[index].num});
								$("#txtFecIniSusp").attr({'value':data[index].fech});
							});
							$("#loading").hide();
						},
						error: function(data){
//							alert('Error Sofia');
							$("#txtNumFinSusp").attr({'value':''});
							$("#txtFecIniSusp").attr({'value':''});
						}
					});

				});

			})
*/
			$("#enviar").click(function (){
				$(".error").remove();
					if($("#selCodProyecto").val()==""){
					$("#selCodProyecto").focus().after("<span class='error'>Debe Seleccionar el Número del Proyecto</span>");
				return false;
				}else if( $("#txtNumDocumFinSusp").val() == "" ){
					$("#txtNumDocumFinSusp").focus().after("<span class='error'>Ingrese el Número del Documento Finalización de la Suspension</span>");
					return false;                
				}else if( $("#txtNumFinSusp").val() == "" ){
					$("#txtNumFinSusp").focus().after("<span class='error'>Ingrese el Número Finalización de la Suspension</span>");
					return false;                
				}else if( $("#txtNomFinSusp").val() == "" ){
					$("#txtNomFinSusp").focus().after("<span class='error'>Ingrese la fecha Finalización de la Suspension</span>");
					return false;                					
				}else if( $("#txtFecFinSusp").val() == "" ){
					$("#txtFecFinSusp").focus().after("<span class='error'>Ingrese la fecha Finalización de la Suspension</span>");
					return false;
				}else if(validate_fechaMayorQue($("#txtFecIniSusp").val(),$("#txtFecFinSusp").val())==0){
					$("#txtFecFinSusp").focus().after("<span class='error'>La fecha de fin de la suspensión debe ser mayor a la fecha de inicio de suspensión</span>");
					return false;
				}else{
//				alert(" OK "+$("#txtPorProy").val()+" "+$("#txtValProy").val());
					$('#txtBandera').attr({'value':'1'});
					$('#frmCrearTerminacionSusp').attr('action','./index.php?seccion=CREATERMSU');
					$('#frmCrearTerminacionSusp').submit();
				}
			});	

            $("#limpiar").click(function(){
                $("#selCodProyecto").attr({'value':''});
				$("#txtNumDocumFinSusp").attr({'value':''});
				$("#txtNumFinSusp").attr({'value':''});
				$("#txtNomFinSusp").attr({'value':''});
				$("#txtFecFinSusp").attr({'value':''});				
			    $("#txtDescFinSusp").attr({'value':''});
//				$(location).attr('href','./index.php?seccion=INICIO');
            });

		});

		function validate_fechaMayorQue(fechaInicial,fechaFinal){
			if((Date.parse(fechaInicial)) >= (Date.parse(fechaFinal))){
				return 0;
			}
			return 1;
		}
    
    </script>

</head>

<body>

 	<div>  
        <form id="frmCrearTerminacionSusp" name="frmCrearTerminacionSusp" method="post">
        	<input type="hidden" id="txtBandera" name="txtBandera" value="" class=""/>
          <input type="hidden" id="txtFecIniSusp" name="txtFecIniSusp" value="" class=""/>
        	<table cellpading="5" cellspacing="0" align="center" width="43%">
                <tr>
                  <td colspan="3" class="subtexto">
                    <img src="./img/inicio/top.png" alt="" width="546" id="top">
                    <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
                      <tr>
                        <td width="76%" align="center"><h2 class="titulo"><font color="#CC0000">Crear Terminación Suspensión</font></h2></td>
                        <td width="24%"><img src="./img/inicio/login.jpg" width="94" height="89" /></td>
                      </tr>
                    </table>
                    
                  </td>
                </tr>


                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left" class="colortexto"><label>Número Proyecto<font color="red">*</font></label></td>
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
                  <td align="left">&nbsp;</td>
                  <td align="left" class="colortexto"><label>Número Documento Suspensión<font color="red">*</font></label></td>
                  <td align="left">
                  	<input type="text" id="txtNumDocumFinSusp" name="txtNumDocumFinSusp" style="width: 250px;" value="<?php echo $txtNumDocumFinSusp; ?>"/>
                    <span id="status"></span></td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left" class="colortexto"><label>Número<font color="red">*</font></label></td>
                  <td align="left"><input type="text" id="txtNumFinSusp" name="txtNumFinSusp" style="width: 250px;" value="<?php echo $txtNumFinSusp; ?>"/>
                    <span id="status"></span></td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left" class="colortexto"><label>Nombre<font color="red">*</font></label></td>
                  <td align="left"><input type="text" id="txtNomFinSusp" name="txtNomFinSusp" class="" style="width: 250px;" value="<?php echo $txtNomFinSusp; ?>"/>
                    <span id="status"></span></td>
                </tr>
                <tr>
                    <td width="6%" align="left">&nbsp;</td>
                    <td width="24%" align="left" class="colortexto"><label>Fecha Final<font color="red">*</font></label></td>
                    <td width="70%" align="left">
                        <input type="text" id="txtFecFinSusp" name="txtFecFinSusp" class="" style="width: 250px;" value="<?php echo $txtFecFinSusp; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                        <span id="status"></span>
                    </td>                                  
                <tr>
                      <td align="left">&nbsp;</td>
                      <td align="left" class="colortexto"><label>Descripción</label></td>
                      <td align="left"><input type="text" id="txtDescFinSusp" name="txtDescFinSusp" class="" style="width: 250px;" value="<?php echo $txtDescFinSusp; ?>"/>
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
                  <td colspan="3" class="colortexto"><font color="#005199">Los campos con <font color="red">*</font><font color="#005199"> son obligatorios.</font></td>
                </tr>
                <tr>
                  <td colspan="3" class="subtexto"><img id="bottom" src="./img/inicio/bottom.png" alt="" width="546"></td>
                </tr>
            
            </table>
        
        </form>
	</div>
</body>
</html>