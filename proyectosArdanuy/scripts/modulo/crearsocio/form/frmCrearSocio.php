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

<title>Proyecto</title>

	<script type="text/javascript">
		$(document).ready(function() {

            for(i=0; i<$("#txtContador").val();i++){
				txtPorcentaje=$("#txtPorcentaje"+i);
				if(txtPorcentaje.length){
					txtPorcentaje.numeric(".");
				}
			}

			// trigger event when button is clicked
			$("#add").click(function () {
				// add new row to table using addTableRow function
				addTableRow($("#table"));
				// prevent button redirecting to new page
				for(i=0; i<$("#txtContador").val();i++){
					txtPorcentaje=$("#txtPorcentaje"+i);
					if(txtPorcentaje.length){
						txtPorcentaje.numeric(".");
					}
				}
				return false;
		
			});
		
			// function to add a new row to a table by cloning the last row and 
			// incrementing the name and id values by 1 to make them unique
			function addTableRow(table) {
		
				// clone the last row in the table
				var $tr = $(table).find("tbody tr:last").clone();

				// get the name attribute for the input and select fields
				$tr.find("input,select").attr("name", function () {
					// break the field name and it's number into two parts
					var parts = this.id.match(/(\D+)(\d+)$/);
					// create a unique name for the new field by incrementing
					// the number for the previous field by 1
					return parts[1] + ++parts[2];
//					$("#txtBandera").attr({'value':'Alexa'});
//					$("#txtBandera").val()=parts;
		
					// repeat for id attributes
				}).attr("id", function () {
					var parts = this.id.match(/(\D+)(\d+)$/);
					return parts[1] + ++parts[2];
				});
				// append the new row to the table
				$(table).find("tbody tr:last").after($tr);
				$tr.hide().fadeIn('slow');
		
				// row count
				rowCount = 0;
				$("#table tr td:first-child").text(function () {
					return ++rowCount;
				});
				$("#txtBandera").attr({'value':rowCount});
		
				// remove rows
				$(".remove_button").on("click", function () {
					if ( $('#table tbody tr').length == 1) return;
					$(this).parents("tr").fadeOut('slow', function () {
						$(this).remove();
						rowCount = 0;
						$("#table tr td:first-child").text(function () {
							return ++rowCount;
						});
					});
				});
				$("#txtContador").attr({'value':rowCount});
		
			};

			$("#enviar").click(function (){
				$(".error").remove();
                for(i=0; i<$("#txtContador").val();i++){
					selCodProyecto=$("#selCodProyecto"+i);
					if(selCodProyecto.length){
						if(selCodProyecto.val()==""){
							selCodProyecto.focus().after("<span class='error'>Debe Seleccionar el Codigo del Proyecto</span>");
							return false;
						}
					}
					txtIden=$("#txtIden"+i);
					if(txtIden.length){
						if(txtIden.val()==""){
							txtIden.focus().after("<span class='error'>Debe ingresar la identificación del socio</span>");
							return false;
						}
					}
					txtNomSocio=$("#txtNomSocio"+i);
					if(txtNomSocio.length){
						if(txtNomSocio.val()==""){
							txtNomSocio.focus().after("<span class='error'>Debe ingresar el nombre del socio</span>");
							return false;
						}
					}
					txtPorcentaje=$("#txtPorcentaje"+i);
					if(txtPorcentaje.length){
						if(txtPorcentaje.val()==""){
							txtPorcentaje.focus().after("<span class='error'>Debe ingresar el procentaje</span>");
							return false;
						}
					}
				}
				
				$('#txtBandera').attr({'value':'1'});
				$('#frmSocio').attr('action','./index.php?seccion=CREASOCIO');
				$('#frmSocio').submit();
			});	
/*
            $("#limpiar").click(function(){
			    $("#selCodProyecto").attr({'value':''});
                $("#txtNitEmpPro").attr({'value':''});
                $("#txtNomEmpPro").attr({'value':''});
                $("#txtDirEmpPro").attr({'value':''});
                $("#txtPaisEmpPro").attr({'value':''});
                $("#txtCiudEmpPro").attr({'value':''});
                $("#txtTelEmpPro").attr({'value':''});
//                $("#EmpConfPro").attr({'value':''});
				$("#txtNomSocioEmpPro").attr({'value':''});
                $("#txtDescEmpPro").attr({'value':''});
//				$(location).attr('href','./index.php?seccion=INICIO');
            });
*/
		});

		   
    </script>

</head>

<body>

 	<div>  
        <form id="frmSocio" name="frmSocio" method="post">
        	<input type="hidden" id="txtBandera" name="txtBandera" value="" class=""/>
            <input type="hidden" id="txtContador" name="txtContador" value="1" class=""/>
            <table cellpading="5" cellspacing="0" align="center" width="43%">
                <tr>
                  <td colspan="4" class="subtexto">
                    <img src="./img/inicio/top.png" alt="" width="742" id="top">
                    <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
                      <tr>
                        <td width="76%" align="center"><h2 class="titulo"><font color="#CC0000">Crear Socio</font></h2></td>
                        <td width="24%"><img src="./img/inicio/login.jpg" width="94" height="89" /></td>
                      </tr>
                    </table>
                    
                  </td>
                </tr>
			</table>
        	
            <table width="729" border="0" align="center" cellpadding="0" cellspacing="0" id="table">
            	<thead>
                	<tr>
                    	<th width="8" scope="col">&nbsp;</th>
                        <th width="131" scope="col">Codigo Proyecto</th>
                        <th width="180" scope="col">Identificación Socio</th>
                        <th width="298" scope="col">Nombre Socio</th>
                        <th width="132" scope="col">Porcentaje</th>
                    </tr>
                </thead>

				<tbody>
                	<tr>
                    	<td></td>
                        <td align="center">
                            <select name="selCodProyecto0" id="selCodProyecto0" class="" style="width: 120px;">
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
                        <td align="center">
                            <input type="text" id="txtIden0" name="txtIden0" style="width:170px;" value=""/>
                            <span id="status"></span>
                        </td>
                        <td align="center">
                            <input type="text" id="txtNomSocio0" name="txtNomSocio0" style="width:270px;" value=""/>
                            <span id="status"></span>
                        </td>
                        <td align="center">
                            <input type="text" id="txtPorcentaje0" name="txtPorcentaje0" style="width:90px;" value=""/>
                            <span id="status"></span>
                        </td>
                        <td width="127"><button type="button" class="btn remove_button boton">Remover</button></td>
                        
                    </tr>
				</tbody>
            </table>
            
			<table align="center">
                <tr>
                  <td height="31" align="left">&nbsp;</td>
                  <td align="left">
                    <input type="button" name="add" id="add" class="boton" value="Adicionar"/>
                    <!--<button type="button" class="add" onClick="">Adicionar</button>-->
                    <input type="button" name="enviar" id="enviar" class="boton" value="Continuar"/>
                    <!--<input type="button" name="limpiar" id="limpiar" class="boton" value="Limpiar"/>-->
                  </td>
                </tr>
			</table>

            <table align="center">
                <tr>
                  <td colspan="3" class="subtexto"><img id="bottom" src="./img/inicio/bottom.png" alt="" width="750"></td>
                </tr>
            </table>


<!--            
            <table cellpading="5" cellspacing="0" align="center" width="43%">
                <tr>
                  <td colspan="3" class="subtexto">
                    <img src="./img/inicio/top.png" alt="" width="546" id="top">
                    <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
                      <tr>
                        <td width="76%" align="center"><h2 class="titulo">Crear Socio</h2></td>
                        <td width="24%"><img src="./img/inicio/login.jpg" width="94" height="89" /></td>
                      </tr>
                    </table>
                    
                  </td>
                </tr>


                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                  <td align="left">&nbsp;</td>
                </tr>
                <tr>
                  <td width="6%" align="left">&nbsp;</td>
                  <td width="17%" align="left"><label class="subtexto">Codigo <font color="red">*</font></label></td>
                  <td width="77%" align="left">
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
                    <td width="17%" align="left"><label class="subtexto">Nit<font color="red">*</font></label></td>
                    <td width="77%" align="left">
                        <input type="text" id="txtNitEmpPro" name="txtNitEmpPro" class="" style="width: 250px;" value="<?php echo $txtNitEmpPro; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="17%" align="left"><label class="subtexto">Nombre<font color="red">*</font></label></td>
                    <td width="77%" align="left">
                        <input type="text" id="txtNomEmpPro" name="txtNomEmpPro" class="" style="width: 250px;" value="<?php echo $txtNomEmpPro; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="17%" align="left"><label class="subtexto">Dirección<font color="red">*</font></label></td>
                    <td width="77%" align="left">
                        <input type="text" id="txtDirEmpPro" name="txtDirEmpPro" class="" style="width: 250px;" value="<?php echo $txtDirEmpPro; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td width="17%" align="left"><label class="subtexto">Pais<font color="red">*</font></label></td>
                  <td width="77%" align="left">
                    <input type="text" id="txtPaisEmpPro" name="txtPaisEmpPro" class="" style="width: 250px;" value="<?php echo $txtPaisEmpPro; ?>"/>
                    <span id="status"></span>
                  </td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"><label class="subtexto">Ciudad<font color="red">*</font></label></td>
                  <td align="left">
                  	<input type="text" id="txtCiudEmpPro" name="txtCiudEmpPro" style="width: 250px;" value="<?php echo $txtCiudEmpPro; ?>"/>
                    <span id="status"></span>
                  </td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td align="left"><label class="subtexto">Teléfono<font color="red">*</font></label></td>
                  <td align="left">
                  	<input type="text" id="txtTelEmpPro" name="txtTelEmpPro" class="" style="width: 250px;" value="<?php echo $txtTelEmpPro; ?>"/>
                    <span id="status"></span>
                  </td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td height="31" align="left"><span class="subtexto">Observaciones</span></td>
                  <td align="left">
                  	<input type="text" id="txtDescEmpPro" name="txtDescEmpPro" style="width: 250px;" value="<?php echo $txtDescEmpPro; ?>"/>
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
                  <td colspan="3" class="subtexto">Los campos con <font color="red">*</font> son obligatorios.</td>
                </tr>
                <tr>
                  <td colspan="3" class="subtexto"><img id="bottom" src="./img/inicio/bottom.png" alt="" width="546"></td>
                </tr>
            
            </table>
-->        
        </form>
	</div>
</body>
</html>