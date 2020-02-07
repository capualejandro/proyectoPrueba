
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>Facturacion</title>

	<script type="text/javascript">
		$(document).ready(function() {
			
               $("#txtPorcIva").numeric();

			   $("#txtFecIva").datepicker({
				dateFormat: 'yy-mm-dd',
				changeMonth: true, 
				changeYear: true
			});

			$("#enviar").click(function (){
				$(".error").remove();
				if($("#txtFecIva").val()==""){
                    $("#txtFecIva").focus().after("<span class='error'>Ingrese la fecha Actualización Iva</span>");
                    return false;
				}else if($("#txtPorcIva").val()==""){
                    $("#txtPorcIva").focus().after("<span class='error'>Ingrese el porcentaje del iva</span>");
                    return false;
					
					$('#txtBandera').attr({'value':'1'});
					$('#frmCrearIva').attr('action','./index.php?seccion=CREAIVA');
					$('#frmCrearIva').submit();
                }
			});	
	
	
			$("#limpiar").click(function(){
				$("#txtFecIva").attr({'value':''});
				$("#txtPorcIva").attr({'value':''});
//				$(location).attr('href','./index.php?seccion=INICIO');
      });
	    });

    </script>

</head>

<body>

 	<div>
        <form id="frmCrearIva" name="frmCrearIva" method="post">
        	<input type="hidden" id="txtBandera" name="txtBandera" value="" class=""/>
        	<table cellpading="5" cellspacing="0" align="center" width="43%">
                <tr>
                  <td colspan="3" class="subtexto">
                    <img src="./img/inicio/top.png" alt="" width="546" id="top">
                    <table width="100%" border="0" align="center" cellspacing="0" cellpading="5">
                      <tr>
                        <td width="76%" align="center"><h2 class="titulo"><font color="#CC0000">Crear Iva</font></h2></td>
                        <td width="24%"><img src="./img/inicio/login.jpg" width="94" height="89" /></td>
                      </tr>
                    </table>
                    
                  </td>
                </tr>

                <tr>
                    <td width="6%" align="left">&nbsp;</td>
                    <td width="23%" align="left"><label class="subtexto"><font color="#005199">Fecha Iva<font color="red">*</font></label></td>
                    <td width="71%" align="left">
                        <input type="text" id="txtFecIva" name="txtFecIva" style="width: 250px;" value="<?php echo $txtFecIva; ?>" readonly/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                    <td align="left">&nbsp;</td>
                    <td width="23%" align="left"><label class="subtexto"><font color="#005199">Porcentaje<font color="red">*</font></label></td>
                    <td width="71%" align="left">
                        <input type="text" id="txtPorcIva" name="txtPorcIva" class="" style="width: 250px;" value="<?php echo $txtPorcIva; ?>"/>
                        <span id="status"></span>
                    </td>
                </tr>
                <tr>
                  <td align="left">&nbsp;</td>
                  <td height="31" align="left">&nbsp;</td>
                  <td align="left">
                    <input type="button" name="enviar" id="enviar" class="boton" value="Grabar"/>
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