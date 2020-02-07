<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>

<script type="text/javascript">

	$(document).ready(function(){

		$(".check_todos").click(function(event){
			if($(this).is(":checked")) {
				$(".ck:checkbox:not(:checked)").attr("checked", "checked");
			}else{
				$(".ck:checkbox:checked").removeAttr("checked");
			}
		});

		$("#selUsuario").change(function() {
			$(".ck:checkbox:checked").removeAttr("checked");
//			alert("Padre="+$("#hidPadre").val()+" Hijo="+$("#hidHijo").val()+" UsuMod="+$("#hidUsuMod").val()+" SelUsuario="+$("#selUsuario").val());
			for(i=0;i<$("#hidPadre").val();i++){
				for(j=0;j<$("#hidUsuMod").val();j++){
					if( $("#chkPad"+i).val() == $("#hidUsuMod"+j).val() && $("#selUsuario").val() == $("#hidUsuario"+j).val() ){
						$("#chkPad"+i).attr('checked', true);
					}
				}
			}
			for(i=0;i<$("#hidHijo").val();i++){
				for(j=0;j<$("#hidUsuMod").val();j++){
					if( $("#chkHij"+i).val() == $("#hidUsuMod"+j).val() && $("#selUsuario").val() == $("#hidUsuario"+j).val() ){
						$("#chkHij"+i).attr('checked', true);
					}
				}
			}

		});

		$("#enviar").click(function (){
//			alert($(".ck").is(":checked"));
			$(".error").remove();
			if( $("#selUsuario").val() == "" ){
				$("#selUsuario").focus().after("<span class='error'>Debe Seleccionar un usuario</span>");
				return false;
			}else if( $(".ck").is(":checked") == false ){
				$("#selUsuario").focus().after("<span class='error'>Debe chequear al menos una opcion</span>");
				return false;
			}else{
//				alert(" OK ");
				$("#txtBandera").attr({'value':'1'});
				$('#frmAsignarPermiso').attr('action','./index.php?seccion=PERASIGNAR');
				$('#frmAsignarPermiso').submit();
			}
		});

		$("#limpiar").click(function(){
			$(location).attr('href','./index.php?seccion=INICIO');
		});

	});

</script>

</head>

<body>
<form id="frmAsignarPermiso" name="frmAsignarPermiso" method="post" action="">
  <input type="hidden" id="txtBandera" name="txtBandera" value="" class=""/>
  <input type="hidden" id="hidPadre" name="hidPadre" value="<?php echo count($arModPad); ?>" class=""/>
  <input type="hidden" id="hidHijo" name="hidHijo" value="<?php echo count($arModHij); ?>" class=""/>
  <input type="hidden" id="hidUsuMod" name="hidUsuMod" value="<?php echo count($arUsuMod); ?>" class=""/>
<?php
	for($k=0;$k<count($arUsuMod);$k++){
?>
		<input type="hidden" id="<?php echo "hidUsuMod".$k; ?>" name="" value="<?php echo $arUsuMod[$k][0]; ?>">
        <input type="hidden" id="<?php echo "hidUsuario".$k; ?>" name="" value="<?php echo $arUsuMod[$k][1]; ?>">
<?php
	}
?>
  <table width="600" cellpadding="0" border="0" align="center">
    <tr>
      <td colspan="4" class="normal">
        <img src="./img/inicio/top.png" alt="" width="594" id="top">
        <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
          <tr>
            <td width="76%" align="center"><h2 class="titulo"><?php echo $_SESSION["mod_descripcion"]; ?></h2></td>
            <td width="24%"><img src="./img/inicio/permiso.gif" width="94" height="89" /></td>
          </tr>
        </table>

      </td>
    </tr>

    <tr>
      <td height="39" colspan="4">
      	Seleccione el Usuario<font color="red">*</font>&nbsp;&nbsp;
      <select name="selUsuario" id="selUsuario" class="" style="width: 300px;">
<?php foreach($arUsuario as $indice => $valor){ ?>
        <option value="<?php echo $indice; ?>"> <?php echo $valor; ?> </option>
<?php } ?>
      </select>
      </td>
    </tr>
<!--<div id="menues" style="display:none>-->
    <tr>
      <td colspan="4">
      	<input type="checkbox" id="checkTotdo" name="checkTotdo" value="" class="check_todos"> Seleccionar / Deseleccionar Todos
      </td>
    </tr>

    <tr>
<?php
	for($i=0;$i<count($arModPad);$i++){
?>
      <td valign="top">
      	<table width="200" border="0">
          <tr>
            <td>
             <input type="checkbox" id="<?php echo "chkPad".$i; ?>" name="chkMenu[]" value="<?php echo $arModPad[$i][0]; ?>" class="ck normal">
             <strong><?php echo $arModPad[$i][1]; ?></strong>
            </td>
          </tr>
<?php
            for($j=0;$j<count($arModHij);$j++){
				if($arModPad[$i][0]==$arModHij[$j][2]){
?>
			<tr>
             <td>&nbsp;&nbsp;
			  <input type="checkbox" id="<?php echo "chkHij".$j; ?>" name="chkMenu[]" value="<?php echo $arModHij[$j][0]; ?>" class="ck">
			  <?php echo $arModHij[$j][1]; ?>
             </td>
            </tr>
<?php
				}
			}
?>
        </table>
      </td>
<?php 
		if($cont==2) {
			$cont = 0;
?>
    </tr>
    <tr>
<?php
		}
		$cont++;
	}
?>
    <tr>
<!--</div>-->
     <td height="37" align="left" colspan="4">&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="button" name="enviar" id="enviar" class="boton" value="Grabar"/>
      <input type="button" name="limpiar" id="limpiar" class="boton" value="Cancelar"/>
     </td>
    </tr>

    <tr>
      <td colspan="4" class="subtexto"><img id="bottom" src="./img/inicio/bottom.png" alt="" width="597"></td>
    </tr>

  </table>
</form>
</body>
</html>
