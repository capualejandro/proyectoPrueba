<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title></title>

	<script type="text/javascript">

		function ver(i){
			alert(i);
		}
		
		function mostrar(i){
			$("#capa").show("slow");
//			alert(i);
//			$("#hidCodigo").attr({'value':$("#codigo"+i).val()});
			if ($("#capa").is(":hidden") == false){
				$("#error").remove();
				var parametros = {
					"opc" : "edipro",
					"pro_codigo" : i
				};
				$.ajax({
					async: true,
					type: "POST",
					url: "../scripts/modulo/ajax/verificar.php",
					data: parametros,
					dataType: "json",
//					dataType: "html",
//					success:  function (response) {
//                        $("#resultado").html(response);
//                	},
					success:function (data) {
						$.each(data,function(index,value) {
							$("#txtCodProy").attr({'value':data[index].cod});
							$("#txtNomProy").attr({'value':data[index].nom});
							$("#txtFecIniProy").attr({'value':data[index].ini});
							$("#txtFecFinProy").attr({'value':data[index].fin});
							$("#txtDesProy").attr({'value':data[index].des});
							$("#txtCliProy").attr({'value':data[index].cli});
							$("#txtDirProy").attr({'value':data[index].dir});
							$("#txtValProy").attr({'value':data[index].val});
							$("#txtPorProy").attr({'value':data[index].por});
						});
						$("#loading").hide();
					},
					error: function(data){
						alert('Error Sofia');
					}
				});

			}
		}

		function inactivar(i){
			var parametros = {
				"opc" : "upd",
				"fun_codigo" : $("#codigo"+i).val(),
				"fun_estado" : $("#estado"+i).val()
			};
			$.ajax({
				type: "POST",
				url: "../scripts/modulo/ajax/verificar.php",
				data: parametros,
				beforeSend: function(){
					$("#loading").show();
				},
				success:function (response) {
					$("#loading").hide("slow");
					$("#capa").hide("slow");
					location.href="./index.php?seccion=USULISTAR";
				}
			});

			$("#capa").hide("slow");
		}

		function limpia(){
			$("#capa").hide("slow");
		}

        $(document).ready(function() {

			$("#txtValProy").numeric();
			$("#txtPorProy").numeric(".");
			$("#txtFecIniProy").datepicker({
				showWeek: true,
				dateFormat: 'yy-mm-dd',
				changeMonth: true, 
				changeYear: true
			});
			
			$("#txtFecFinProy").datepicker({
				showWeek: true,
				dateFormat: 'yy-mm-dd',
				changeMonth: true, 
				changeYear: true
			});

			$("#enviar").click(function (){
				$(".error").remove();
				$("#hidOpc").attr({"value":"uptproy"});
                if( $("#txtCodProy").val() == "" ){
                    $("#txtCodProy").focus().after("<span class='error'>Debe Ingresar el Codigo del Proyecto</span>");
                    return false;
                }else if( $("#txtNomProy").val() == "" ){
                    $("#txtNomProy").focus().after("<span class='error'>Ingrese el nombre del proyecto</span>");
                    return false;
                }else if( $("#txtFecIniProy").val() == "" ){
                    $("#txtFecIniProy").focus().after("<span class='error'>Ingrese la fecha de inicio del proyecto</span>");
                    return false;
                }else if( $("#txtFecFinProy").val() == "" ){
                    $("#txtFecFinProy").focus().after("<span class='error'>Ingrese la fecha de finalización del proyecto</span>");
                    return false;
                }else if( $("#txtDesProy").val() == "" ){
                    $("#txtDesProy").focus().after("<span class='error'>Ingrese la descripción del proyecto</span>");
                    return false;
                }else if( $("#txtCliProy").val() == "" ){
                    $("#txtCliProy").focus().after("<span class='error'>Ingrese el nombre del cliente</span>");
                    return false;
                }else if( $("#txtDirProy").val() == "" ){
                    $("#txtDirProy").focus().after("<span class='error'>Ingrese el nombre del director del proyecto</span>");
                    return false;
                }else if( $("#txtValProy").val() == "" ){
                    $("#txtValProy").focus().after("<span class='error'>Ingrese el valor del proyecto</span>");
                    return false;
                }else if( $("#txtPorProy").val() == "" ){
                    $("#txtPorProy").focus().after("<span class='error'>Ingrese el porcentaje de participación del proyecto</span>");
                    return false;
				}else if($("#txtPorProy").val()>100){
                    $("#txtPorProy").focus().after("<span class='error'>El porcentaje no debe superar el 100%</span>");
                    return false;	
				}else{
					$("#frmListadoProyectos").submit(function(){
						$.ajax({
							type:"POST",
							url:"../scripts/modulo/ajax/crud.php",
							dataType:"html",
							data:$(this).serialize(),
//							beforeSend:function(){
//								$("#loading").show();
//							},
							success:function(response){
//								$("#loading").hide("slow");
								$("#capa").hide("slow");
								location.href="./index.php?seccion=PROLISTAR";
							},
							error: function(response){
								alert('Error');
							}
						});
						return false;
					});

				}
			});

        });
    
    </script>

</head>

<body>


<div id="capa" style="display:none">
     <center><div id="loading" style="display:none;"><img src="./img/gif/loading.gif"></div></center>
    <form id="frmListadoProyectos" name="frmListadoProyectos" method="POST">
     <input type="hidden" id="hidOpc" name="hidOpc" value="">
     <input type="hidden" id="hidCodigo" name="hidCodigo" value="">
     <input type="hidden" id="hidLogin" name="hidLogin" value="">
     <table cellpading="5" cellspacing="0" border="0" align="center" width="38%">
        <tr>
          <td colspan="3" class="subtexto">
            <img src="./img/inicio/top.png" alt="" width="546" id="top">
            <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
              <tr>
                <td width="76%" align="center"><h2 class="titulo">Editar Proyecto</h2></td>
                <td width="24%"><img src="./img/inicio/login.jpg" width="94" height="89" /></td>
              </tr>
            </table>
            
          </td>
        </tr>

      <tr>
       <td width="6%" align="left">&nbsp;</td>
       <td width="24%" align="left"><label class="subtexto">Código <font color="red">*</font></label></td>
       <td width="75%"><input type="text" id="txtCodProy" name="txtCodProy" class="" style="width: 250px;" value="" readonly/> <span id="status"></span></td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td align="left"><label class="subtexto">Nombre <font color="red">*</font></label></td>
        <td><input type="text" id="txtNomProy" name="txtNomProy" class="" style="width: 250px;" value=""/> <span id="status"></span></td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td align="left"><label class="subtexto">Fecha Inicio <font color="red">*</font></label></td>
        <td><input type="text" id="txtFecIniProy" name="txtFecIniProy" style="width: 250px;" value="" readonly/> <span id="status"></span></td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td align="left"><label class="subtexto">Fecha Finalización <font color="red">*</font></label></td>
        <td><input type="text" id="txtFecFinProy" name="txtFecFinProy" style="width: 250px;" value="" readonly/> <span id="status"></span></td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td align="left"><label class="subtexto">Descripcion <font color="red">*</font></label></td>
        <td><input type="text" id="txtDesProy" name="txtDesProy" class="" style="width: 250px;" value=""/> <span id="status"></span></td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td height="28" align="left"><label class="subtexto">Cliente <font color="red">*</font></label></td>
        <td><input type="text" id="txtCliProy" name="txtCliProy" class="" style="width: 250px;" value=""/> <span id="status"></span></td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td height="28" align="left"><label class="subtexto">Director <font color="red">*</font></label></td>
        <td><input type="text" id="txtDirProy" name="txtDirProy" class="" style="width: 250px;" value=""/> <span id="status"></span></td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td height="28" align="left"><label class="subtexto">Valor Contrato <font color="red">*</font></label></td>
        <td><input type="text" id="txtValProy" name="txtValProy" class="" style="width: 250px;" value=""/> <span id="status"></span></td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td height="28" align="left"><label class="subtexto">Porcentaje Asignado <font color="red">*</font></label></td>
        <td><input type="text" id="txtPorProy" name="txtPorProy" class="" style="width: 250px;" value=""/> <span id="status"></span></td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td height="33" align="left">&nbsp;</td>
        <td align="left">
            <input type="submit" name="enviar" id="enviar" class="boton" value="Modificar"/>
            <input type="button" name="limpiar" id="limpiar" class="boton" value="Cancelar" onClick="javascript:void(0); limpia();"/>
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

<div>
    <input type="hidden" id="hidTotal" name="hidTotal" value="<?php echo count($arUsu); ?>" class=""/>
    <h2 class="titulo" align="center">Listado De Proyectos</h2>
    <table cellspacing="0" cellpadding="5" width="62%" class="subtexto" align="center">
     <thead class="cabecerasTablas" bgcolor="#93D7E0">
      <tr>
       <th width="9%" height="70" align="left">Código</th>
       <th width="21%" align="left">Nombré</th>
       <th width="15%" align="left">Fecha Inicio</th>
       <th width="20%" align="left">Fecha Finalización</th>
       <th width="15%" align="left">Valor</th>
       <th width="12%" align="left">% de Participación</th>
       <th width="8%" align="left">Editar</th>
      </tr>
     </thead>
     <tbody>
<?php
	for($i=0; $i<count($arPro); $i++){
#		echo minusculasInicial($arUsu[$i][3]." ".$arUsu[$i][4])."<br>";
#		if($arUsu[$i][7]=="A") $estado="Activo";
#		else $estado="Inactivo";
		if (($i % 2) == 1) $bgcolor = "#D2D5DD";
		else $bgcolor = "#F2F2F2";
?>
	  <input type="hidden" id="<?php echo "codigo".$i; ?>" name="<?php echo "codigo".$i; ?>" value="<?php echo $arUsu[$i][0]; ?>">
	  <input type="hidden" id="<?php echo "estado".$i; ?>" name="<?php echo "estado".$i; ?>" value="<?php echo $arUsu[$i][7]; ?>">
	  <tr bgcolor="<?php echo $bgcolor; ?>">
       <td><?php echo trim($arPro[$i][0]); ?></td>
       <td><?php echo trim($arPro[$i][1]); ?></td>
       <td><?php echo fecha_texto2($arPro[$i][2]); ?></td>
       <td><?php echo fecha_texto2($arPro[$i][3]); ?></td>
       <td><?php echo "$ ".trim(numero(($arPro[$i][7]),0)); ?></td>
       <td><?php echo trim($arPro[$i][8])." %"; ?></td>
       <td>
         <?php 
#			echo $_SESSION["usu_login"]." ".trim($arPro[$i][9])." ".$_SESSION["usu_tipo"];
			if($_SESSION["usu_tipo"]==1){
		 ?>
           <a id="editar" href="javascript:void(0); mostrar('<?php echo mayusculas($arPro[$i][0]); ?>');">
           <img src="./img/crud/note_edit.png" border="0" /></a>
         <?php 
			}elseif(mayusculas($_SESSION["usu_login"])==trim($arPro[$i][9])){

		 ?>
           <a id="editar" href="javascript:void(0); mostrar('<?php echo mayusculas($arPro[$i][0]); ?>');">
           <img src="./img/crud/note_edit.png" border="0" /></a>
         <?php 
			}
		 ?>
       </td>
      </tr>
<?php
	}
?>
     </tbody>

    </table>
</div>

<!--Resultado: <span id="resultado"></span>-->
</body>
</html>