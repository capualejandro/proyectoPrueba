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

			$("#txtGProFec").datepicker({
				showWeek: true,
				dateFormat: 'dd-mm-aa',
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
				}else if($("#txtGProFec").val() == "" ){
                    $("#txtGProFec").focus().after("<span class='error'>Ingrese la fecha de los gastos del proyecto</span>");
                    return false;
                }else if($("#txtGproValor").val() == "" ){
                    $("#txtGproValor").focus().after("<span class='error'>Ingrese el valor de los gastos</span>");
                    return false;
                }else if($("#txtGProDescrip").val() == "" ){
                    $("#txtGProDescrip").focus().after("<span class='error'>Ingrese la observación</span>");
                    return false;
                }else{
//					alert(" OK "+$("#txtPorProy").val()+" "+$("#txtValProy").val());
					$('#txtBandera').attr({'value':'1'});
					$('#frmCrearAnticipo').attr('action','./index.php?seccion=CREAGASTO');
					$('#frmCrearAnticipo').submit();
                }
			});	

            $("#limpiar").click(function(){
                $("#txtGProFec").attr({'value':''});
                $("#txtGProValor").attr({'value':''});
                $("#txtGProDescrip").attr({'value':''});
				
//				$(location).attr('href','./index.php?seccion=INICIO');
            });

		});
    
    </script>

</head>

<body>

 	<div>  
        <form id="frmCrearGastos" name="frmCrearGastos" method="post">
        	<input type="hidden" id="txtBandera" name="txtBandera" value="" class=""/>
        	<table cellpading="5" cellspacing="0" align="center" width="43%">
                <tr>
                  <td colspan="3" class="subtexto">
                    <img src="./img/inicio/top.png" alt="" width="546" id="top">
                    <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
                      <tr>
                        <td width="76%" align="center"><h2 class="titulo">Crear Gastos Proyecto</h2></td>
                        <td width="24%"><img src="./img/inicio/login.jpg" width="94" height="89" /></td>
                      </tr>
                    </table>
                    
                  </td>
                </tr>

                <tr>
                  <td width="6%" align="left">&nbsp;</td>
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
                  <td align="left"><span class="subtexto">Fecha Gastos<font color="red">*</font></span></td>
                  <td align="left">
                      <input type="text" id="txtGproFec" name="txtGproFec" style="width: 250px;" value="<?php echo $txtGproFec; ?>" readonly/>
                      <span id="status"></span>
                  </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="33%" align="left"><label class="subtexto">Valor Total Gastos<font color="red">*</font></label></td>
                    <td width="61%" align="left">
                        <input type="text" id="txtGProValor" name="txtGProValor" class="" style="width: 250px;" value="<?php echo $txtGProValor; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"><label class="subtexto">Observación<font color="red">*</font></label></td>
                  <td align="left"><input type="text" id="txtGProDescrip" name="txtGProDescrip" class="" style="width: 250px;" value="<?php echo $txtGProDescrip; ?>"/>
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