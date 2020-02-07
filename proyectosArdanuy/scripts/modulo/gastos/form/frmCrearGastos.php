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

			$("#txtFecGasto").datepicker({
				showWeek: true,
				dateFormat: 'yy-mm-dd',
				changeMonth: true, 
				changeYear: true
			});

			$("#txtValTotGasto").numeric();

			$("#enviar").click(function (){
				$(".error").remove();
                if($("#selCodProyecto").val()==""){
                    $("#selCodProyecto").focus().after("<span class='error'>Debe Seleccionar el Número del Proyecto</span>");
                    return false;
				}else if( $("#txtFecGasto").val() == "" ){
                    $("#txtFecGasto").focus().after("<span class='error'>Ingrese la fecha gasto</span>");
                    return false;
                }else if( $("#txtValTotGasto").val() == "" ){
                    $("#txtValTotGasto").focus().after("<span class='error'>Ingrese el valor total gasto</span>");
                    return false;
                }else{
//					alert(" OK "+$("#txtPorProy").val()+" "+$("#txtValProy").val());
					$('#txtBandera').attr({'value':'1'});
					$('#frmCrearFactura').attr('action','./index.php?seccion=CREAGASTO');
					$('#frmCrearFactura').submit();
                }
			});	

            $("#limpiar").click(function(){
                $("#selCodProyecto").attr({'value':''});
				$("#txtFecGasto").attr({'value':''});
                $("#txtValTotGasto").attr({'value':''});
                $("#txtObse").attr({'value':''});
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
                        <td width="76%" align="center"><h2 class="titulo"><font color="#CC0000">Crear Gastos</font></h2></td>
                        <td width="24%"><img src="./img/inicio/login.jpg" width="94" height="89" /></td>
                      </tr>
                    </table>
                    
                  </td>
                </tr>

                <tr>
                  <td width="6%" align="left">&nbsp;</td>
                  <td align="left"><label class="subtexto"><font color="#005199">Número Proyecto <font color="red">*</font></label></td>
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
                    <td width="29%" align="left"><label class="subtexto"><font color="#005199">Fecha Gastos<font color="red">*</font></label></td>
                    <td width="65%" align="left">
                        <input type="text" id="txtFecGasto" name="txtFecGasto" style="width: 250px;" value="<?php echo $txtFecGasto; ?>" readonly/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="29%" align="left"><label class="subtexto"><font color="#005199">Valor Total Gastos<font color="red">*</font></label></td>
                    <td width="65%" align="left">
                        <input type="text" id="txtValTotGasto" name="txtValTotGasto" style="width: 250px;" value="<?php echo $txtValTotGasto; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="29%" align="left"><label class="subtexto"><font color="#005199">Observaciones</label></td>
                    <td width="65%" align="left">
                        <input type="text" id="txtObse" name="txtObse" class="" style="width: 250px;" value="<?php echo $txtObse; ?>"/>
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