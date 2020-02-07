<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title></title>

	<script type="text/javascript">

		function mostrar(i){
			$("#capa").show("slow");
			$("#hidCodigo").attr({'value':$("#codigo"+i).val()});
			if ($("#capa").is(":hidden") == false){
				$("#error").remove();
				var parametros = {
					"opc" : "edi",
//					"fun_codigo" : $("#codigo"+i).val()
					"fun_codigo" : i
				};
				$.ajax({
					async: true,
					type: "POST",
					url: "../scripts/modulo/ajax/verificar.php",
					data: parametros,
					dataType: "json",
//					dataType: "html",
//					beforeSend: function(){
//						$("#loading").show();
//					},
					success:function (data) {
						$.each(data,function(index,value) {
							$("#txtNombre").attr({'value':data[index].nom});
							$("#txtApellido").attr({'value':data[index].ape});
							$("#txtTelefono").attr({'value':data[index].tel});
							$("#txtClave").attr({'value':''});
							$("#txtReClave").attr({'value':''});
							$("#selEstado").attr({'value':data[index].est});
							$("#hidLogin").attr({'value':data[index].login});
						});
						$("#loading").hide();
					},
					error: function(data){
						alert('Error');
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

			$("#enviar").click(function (){
                $("#error").remove();
				$(".error").remove();
				$("#hidOpc").attr({"value":"uptusu"});
				if( $("#txtNombre").val() == "" ){
                    $("#txtNombre").focus().after("<span id='error' class='error'>Debe Seleccionar un funcionario</span>");
                    return false;
                }else if( $("#txtApellido").val() == "" ){
                    $("#txtApellido").focus().after("<span id='error' class='error'>Ingrese el login del usuario</span>");
                    return false;
                }else if( $("#txtTelefono").val() != "" && isNaN($("#txtTelefono").val())){
					$("#txtTelefono").focus().after("<span id='error' class='error'>Ingrese solo numeros</span>");
					return false;
                }else if( $("#selEstado").val() == "" ){
                    $("#selEstado").focus().after("<span id='error' class='error'>Ingrese el login del usuario</span>");
                    return false;
                }else if( $("#txtClave").val() != "" && $("#txtReClave").val() == "" &&  $("#txtClave").val() != $("#txtReClave").val() ){
                    $("#txtClave").focus().after("<span id='error' class='error'>La contraseña no coincide con la confirmación</span>");
                    $("#txtReClave").focus().after("<span id='error' class='error'>La contraseña no coincide con la confirmación</span>");
                    return false;
				}else{
					$("#frmListadoUsuario").submit(function(){
						$.ajax({
							type:"POST",
							url:"../scripts/modulo/ajax/crud.php",
							dataType:"html",
							data:$(this).serialize(),
							beforeSend:function(){
								$("#loading").show();
							},
							success:function(response){
								$("#loading").hide("slow");
								$("#capa").hide("slow");
								location.href="./index.php?seccion=USULISTAR";
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
    <form id="frmListadoUsuario" name="frmListadoUsuario" method="POST">
     <input type="hidden" id="hidOpc" name="hidOpc" value="">
     <input type="hidden" id="hidCodigo" name="hidCodigo" value="">
     <input type="hidden" id="hidLogin" name="hidLogin" value="">
     <table cellpading="5" cellspacing="0" border="0" align="center" width="38%">
        <tr>
          <td colspan="3" class="subtexto">
            <img src="./img/inicio/top.png" alt="" width="546" id="top">
            <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
              <tr>
                <td width="76%" align="center"><h2 class="titulo"><font color="#CC0000">Editar Usuario</font></h2></td>
                <td width="24%"><img src="./img/inicio/funcionario.gif" width="94" height="89" /></td>
              </tr>
            </table>
            
          </td>
        </tr>

      <tr>
       <td width="6%" align="left">&nbsp;</td>
       <td width="19%" align="left"><span class="subtexto"><font color="#005199">Nombre<font color="red">*</font></span></td>
       <td width="75%"><input type="text" id="txtNombre" name="txtNombre" class="" style="width: 250px;" value=""/></td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td align="left"><font color="#005199">Apellido<font color="red">*</font></td>
        <td><input type="text" id="txtApellido" name="txtApellido" class="" style="width: 250px;" value=""/></td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td align="left"><font color="#005199">Telefono<font color="red">*</font></td>
        <td><input type="text" id="txtTelefono" name="txtTelefono" class="" style="width: 250px;" value=""/></td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td align="left"><font color="#005199">Contraseña</font></td>
        <td><input type="password" id="txtClave" name="txtClave" class="" style="width: 250px;" value=""/></td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td align="left"><font color="#005199">Re Contraseña</font></td>
        <td><input type="password" id="txtReClave" name="txtReClave" class="" style="width: 250px;" value=""/></td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td height="28" align="left"><label class="subtexto"><font color="#005199">Estado <font color="red">*</font></label></td>
        <td align="left">
          <select name="selEstado" id="selEstado" class="" style="width: 250px;">
<?php foreach($arEstado as $indice => $valor){ ?>
			  <option value="<?php echo $indice; ?>"> <?php echo $valor; ?> </option>
<?php } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td align="left">&nbsp;</td>
        <td height="33" align="left">&nbsp;</td>
        <td align="left"><input type="submit" name="enviar" id="enviar" class="boton" value="Modificar"/>
        <input type="button" name="limpiar" id="limpiar" class="boton" value="Cancelar" onClick="javascript:void(0); limpia();" /></td>
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

<div>
    <input type="hidden" id="hidTotal" name="hidTotal" value="<?php echo count($arUsu); ?>" class=""/>
    <h2 class="titulo" align="center"><font color="#CC0000">Listado De Usuarios</font></h2>
    <table cellspacing="0" cellpadding="5" width="51%" class="subtexto" align="center">
     <thead class="cabecerasTablas" bgcolor="#93D7E0">
      <tr>
       <th width="10%" height="30" align="left">Nombre</th>
       <th width="11%" align="left">N° Cedula</th>
       <th width="33%" align="left">Nombre</th>
       <th width="16%" align="left">Fecha Registro</th>
       <th width="9%" align="left">Estado</th>
       <th width="9%" align="left">Editar</th>
       <th width="12%" align="left">Inactivar</th>
      </tr>
     </thead>
     <tbody>
<?php
	for($i=0; $i<count($arUsu); $i++){
#		echo minusculasInicial($arUsu[$i][3]." ".$arUsu[$i][4])."<br>";
		if($arUsu[$i][7]=="A") $estado="Activo";
		else $estado="Inactivo";
		if (($i % 2) == 1) $bgcolor = "#D2D5DD";
		else $bgcolor = "#F2F2F2";
?>
	  <input type="hidden" id="<?php echo "codigo".$i; ?>" name="<?php echo "codigo".$i; ?>" value="<?php echo $arUsu[$i][0]; ?>">
	  <input type="hidden" id="<?php echo "estado".$i; ?>" name="<?php echo "estado".$i; ?>" value="<?php echo $arUsu[$i][7]; ?>">
	  <tr bgcolor="<?php echo $bgcolor; ?>">
       <td><?php echo minusculas($arUsu[$i][1]); ?></td>
       <td><?php echo $arUsu[$i][2]; ?></td>
       <td><?php echo minusculasInicial($arUsu[$i][3]." ".$arUsu[$i][4]); ?></td>
       <td><?php echo fecha_texto2($arUsu[$i][5]); ?></td>
       <td><?php echo $estado; ?></td>
       <td><a id="editar" href="javascript:void(0); mostrar(<?php echo $arUsu[$i][0]; ?>);"><img src="./img/crud/note_edit.png" border="0" /></a></td>
       <td><a id="borrar" href="javascript:void(0); inactivar(<?php echo $arUsu[$i][0]; ?>);"><img src="./img/crud/delete.png" border="0" /></a></td>
      </tr>
<?php
	}
?>
     </tbody>

    </table>
</div>

</body>
</html>