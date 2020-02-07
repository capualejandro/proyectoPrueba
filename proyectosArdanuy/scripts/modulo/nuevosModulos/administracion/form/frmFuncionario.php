<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Funcionario</title>

	<script type="text/javascript">
        $(document).ready(function() {
            $("#enviar").click(function (){
                $(".error").remove();
                if( $("#txtIdentificacion").val() == "" ){
                    $("#txtIdentificacion").focus().after("<span class='error'>Ingrese la identificaci&oacute;n del funcionario</span>");
                    return false;
                }else if( $("#txtNombre").val() == "" ){
                    $("#txtNombre").focus().after("<span class='error'>Ingrese el nombre del funcionario</span>");
                    return false;
                }else if( $("#txtApellido").val() == "" ){
                    $("#txtApellido").focus().after("<span class='error'>Ingrese el apellido del funcionario</span>");
                    return false;
                }else if( $("#txtTelefono").val() != "" && isNaN($("#txtTelefono").val())){
					$("#txtTelefono").focus().after("<span class='error'>Ingrese solo numeros</span>");
					return false;
                }else{
                    //alert(" OK ");
                    $("#txtBandera").attr({'value':'1'});
                    $('#frmIngresoFuncionario').attr('action','./index.php?seccion=FUNCREAR');
                    $('#frmIngresoFuncionario').submit();
                }
            });

            $("#limpiar").click(function(){
                $("#txtIdentificacion").attr({'value':''});
                $("#txtNombre").attr({'value':''});
                $("#txtApellido").attr({'value':''});
                $("#txtTelefono").attr({'value':''});
//				$(location).attr('href','./index.php?seccion=INICIO');
            });

/* Codigo Actual funcional */
			$("#txtIdentificacion").blur(function(){
				if($("#txtIdentificacion").val()!= ""){
					$("#error").remove();
					$("#txtIdentificacion").after("<span id='error' class='error'></span>");
					var parametros = {
						"opc" : "fun",
						"fun_identificacion" : $("#txtIdentificacion").val()
					};
					$.ajax({
						type: "POST",
						url: "../scripts/modulo/ajax/verificar.php",
						data: parametros,
						beforeSend: function(){
							$("#error").html("<img src='./img/gif/ajax-loader.gif' width='15' height='15' /> Verificando");
						},
						success:function (response) {
//							$("#error").html(response);

							if(response == '1'){
								$("#error").html("El numero de identificación ya existe");
								$("#txtIdentificacion").focus();
								$("#txtIdentificacion").select();
								$("#enviar").attr("disabled",true);
								return false;
							}else{
								$("#error").remove();
								$("#enviar").removeAttr("disabled");
							}

						}
					});
				}
			});
/**/


/* Codigo nuevo cargar datos json 
			$("#txtIdentificacion").blur(function(){
				if($("#txtIdentificacion").val()!= ""){
					//alert("Sofia y Alexandra");
					$("#error").remove();
					$("#txtIdentificacion").after("<span id='error' class='error'></span>");
					var parametros = {
						"opc" : "car",
						"fun_identificacion" : $("#txtIdentificacion").val()
					};
					$.ajax({
						async: true,
						type: "POST",
						url: "../scripts/modulo/ajax/verificar.php",
						data: parametros,
						dataType: "json",
						beforeSend: function(){
							$("#error").html("<img src='./img/gif/ajax-loader.gif' width='15' height='15' /> Verificando");
						},
						success:function (data) {
							$.each(data,function(index,value) {
								$("#txtNombre").attr({'value':data[index].nom});
								$("#txtApellido").attr({'value':data[index].ape});
								$("#txtTelefono").attr({'value':data[index].tel});
							});
							$("#error").remove();
						},
						error: function(data){
							alert('Error');
						}
					});
				}
			});
/**/

        });
    
    </script>

</head>

<body>
    
    <form id="frmIngresoFuncionario" name="frmIngresoFuncionario" method="post">
      <input type="hidden" id="txtBandera" name="txtBandera" value="" class=""/>
      <table cellpading="5" cellspacing="0" align="center" width="38%">
        <tr>
          <td colspan="3" class="subtexto">
            <img src="./img/inicio/top.png" alt="" width="546" id="top">
            <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
              <tr>
                <td width="76%" align="center"><h2 class="titulo"><font color="#CC0000">Crear Funcionario</font></h2></td>
                <td width="24%"><img src="./img/inicio/funcionario.gif" width="94" height="89" /></td>
              </tr>
            </table>
            
          </td>
        </tr>

        <tr>
          <td width="7%" align="left">&nbsp;</td>
          <td width="25%" align="left">
          	<label class="subtexto"><font color="#005199">Identificación <font color="red">*</font></label>
          </td>
          <td width="68%" align="left">
          	<input type="text" id="txtIdentificacion" name="txtIdentificacion" class="" style="width: 250px;" value="<?php echo $txtIdentificacion; ?>"/>
          </td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td align="left"><label class="subtexto"><font color="#005199">Nombres<font color="red">*</font></label></td>
          <td align="left">
          	<input type="text" id="txtNombre" name="txtNombre" class="" style="width: 250px;" value="<?php echo $txtNombre; ?>"/>
          </td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td align="left"><label class="subtexto"><font color="#005199">Apellidos<font color="red">*</font></label></td>
          <td align="left">
          	<input type="text" id="txtApellido" name="txtApellido" class="" style="width: 250px;" value="<?php echo $txtApellido; ?>"/>
          </td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td align="left"><label class="subtexto"><font color="#005199">Teléfono</label></font></td>
          <td align="left">
          	<input type="text" id="txtTelefono" name="txtTelefono" class="" style="width: 250px;" value="<?php echo $txtTelefono; ?>"/>
          </td>
        </tr>
        <tr>
          <td align="left">&nbsp;</td>
          <td height="33" align="left">&nbsp;</td>
          <td align="left"><input type="button" name="enviar" id="enviar" class="boton" value="Grabar"/>
          <input type="button" name="limpiar" id="limpiar" class="boton" value="Limpiar"/></td>
        </tr>
        <tr>
          <td colspan="3" class="subtexto"><font color="#005199">Los campos con <font color="red">*</font><font color="#005199"> son obligatorios.</font></td>
        </tr>
        <tr>
          <td colspan="3" class="subtexto"><img id="bottom" src="./img/inicio/bottom.png" alt="" width="546"></td>
        </tr>
      </table>
    </form>
    
</body>
</html>