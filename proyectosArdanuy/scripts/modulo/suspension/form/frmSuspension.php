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

			$("#txtFecIniSusp").datepicker({
//				showWeek: true,
				dateFormat: 'yy-mm-dd',
				changeMonth: true, 
				changeYear: true
				
			});
			
			$("#txtFecFinSusp").datepicker({
//				showWeek: true,
				dateFormat: 'yy-mm-dd',
				changeMonth: true, 
				changeYear: true

			});

			$("#enviar").click(function (){
				$(".error").remove();
				if($("#selCodProyecto").val()==""){
					$("#selCodProyecto").focus().after("<span class='error'>Debe Seleccionar el Número del Proyecto</span>");
					return false;
				}else if( $("#txtNumSusp").val() == "" ){
					$("#txtNumSusp").focus().after("<span class='error'>Ingrese el Número de la Suspension</span>");
					return false;
				}else if( $("#txtNomSusp").val() == "" ){
					$("#txtNomSusp").focus().after("<span class='error'>Ingrese el Nombre de la Suspension</span>");
					return false;									
				}else if( $("#txtFecIniSusp").val() == "" ){
					$("#txtFecIniSusp").focus().after("<span class='error'>Ingrese la fecha de inicio de la suspension</span>");
					return false;
				}else{
//				alert(" OK "+$("#txtPorProy").val()+" "+$("#txtValProy").val());
					$('#txtBandera').attr({'value':'1'});
					$('#frmCrearSuspension').attr('action','./index.php?seccion=SUSPENSION');
					$('#frmCrearSuspension').submit();
				}
			});	

						$("#limpiar").click(function(){
						$("#selCodProyecto").attr({'value':''});
						$("#txtNumSusp").attr({'value':''});
						$("#txtNomSusp").attr({'value':''});
						$("#txtFecIniSusp").attr({'value':''});
						$("#txtDescSusp").attr({'value':''});
						//				$(location).attr('href','./index.php?seccion=INICIO');
            });

		});
    
    </script>

</head>

<body>

 	<div>  
        <form id="frmCrearSuspension" name="frmCrearSuspension" method="post">
        	<input type="hidden" id="txtBandera" name="txtBandera" value="" class=""/>
        	<table cellpading="5" cellspacing="0" align="center" width="43%">
                <tr>
                  <td colspan="3" class="subtexto">
                    <img src="./img/inicio/top.png" alt="" width="546" id="top">
                    <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
                      <tr>
                        <td width="76%" align="center"><h2 class="titulo"><font color="#CC0000">Crear Suspensión</font></h2></td>
                        <td width="24%"><img src="./img/inicio/login.jpg" width="94" height="89" /></td>
                      </tr>
                    </table>
                    
                  </td>
                </tr>


                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left" class="colortexto">Número Proyecto<font color="red">*</font></td>
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
                  <td align="left" class="colortexto"><span>Número<font color="red">*</font></span></td>
                  <td align="left">
                  	<input type="text" id="txtNumSusp" name="txtNumSusp" class="" style="width: 250px;" value="<?php echo $txtNumSusp; ?>"/>
                  </td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left" class="colortexto"><span>Nombre<font color="red">*</font></span></td>
                  <td align="left"><input type="text" id="txtNomSusp" name="txtNomSusp" class="" style="width: 250px;" value="<?php echo $txtNomSusp; ?>"/></td>
                </tr>
                <tr>
                    <td width="6%" align="left">&nbsp;</td>
                    <td width="23%" align="left" class="colortexto"><label>Fecha Inicio<font color="red">*</font></label></td>
                    <td width="71%" align="left">
                        <input type="text" id="txtFecIniSusp" name="txtFecIniSusp" class="" style="width: 250px;" value="<?php echo $txtFecIniSusp; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>                 
                        <span id="status"></span>
                    </td>                                  
                <tr>
                      <td align="left">&nbsp;</td>
                  <td height="31" align="left" class="colortexto"><span>Fecha Final</span></td>
                      <td align="left"><input type="text" id="txtFecFinSusp" name="txtFecFinSusp" class="" style="width: 250px;" value="<?php echo $txtFecFinSusp; ?>"/></td>
              </tr>
                <tr>
                      <td align="left">&nbsp;</td>
                      <td height="31" align="left" class="colortexto"><span>Descripción</span></td>
                  <td align="left"><input type="text" id="txtDescSusp" name="txtDescSusp" class="" style="width: 250px;" value="<?php echo $txtDescSusp; ?>"/></td>
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
                  <td colspan="3" class="colortexto">Los campos con <font color="red">*<font color="#005199">son obligatorios.</font></td>
                </tr>
                <tr>
                  <td colspan="3" class="subtexto"><img id="bottom" src="./img/inicio/bottom.png" alt="" width="546"></td>
                </tr>
            
            </table>
        
        </form>
	</div>
</body>
</html>