<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title></title>

 <script type="text/javascript" src="../scripts/modulo/consultas/lib/documentosSG.js"></script>

</head>

<body>

	<h2 class="titulo" align="center">Listado Documentos SG</h2>

 <form id="frmDocumenSG" name="frmDocumenSG" method="post">
  <input type="hidden" id="txtBandera" name="txtBandera" value="" class=""/>
  <table cellspacing="0" cellpadding="5" border="1" align="center" class="subtexto" width="416">
   <tr>
    <td width="142" class="ardanuy">Seleccione el Tipo de Documento</td>
     <td width="250" align="left">
      <select name="selTipDocSG" id="selTipDocSG" class="" style="width: 150px;">
				<option value=''>Seleccione</option>
       <?php 
					foreach($arTipDocm as $indice => $valor){
						if($selTipDocSG==$indice){ 
							echo "<option value='$indice' selected> ".minusculasInicial($indice)."</option>";
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
      <td height="36" colspan="2"><input type="button" name="btnConsultar" id="btnConsultar" class="boton" value="Consultar"/></td>
    </tr>
  </table>
	</form>
<br>

<!--  <div id="div1" style="display:none;">-->
  <table cellspacing="0" cellpadding="5" border="1" class="subtexto" align="center" width="30%">
   <tr bgcolor="#E6E6FA"><td><strong>Documentos</strong></td></tr>
			<?php
     for($i=0; $i<count($arDocSG); $i++){
      $pos=strripos($arDocSG[$i][5],'.');
      $lon=strlen($arDocSG[$i][5]);
      $ext=substr($arDocSG[$i][5],$pos+1,$lon);
      switch($ext){
       case 'doc': case 'docx':
        $img='<img src="./icono/word.png" width="20" height="20" />';
       break;
       case 'zip': case 'rar': 
        $img='<img src="./icono/zip.jpg" width="20" height="20" />';
       break;
       case 'pdf': 
        $img='<img src="./icono/pdf.jpg" width="20" height="20" />';
       break;
      }
   #			echo "$pos - $lon - $ext";
      echo '<tr><td>'.$img.' <a href="documentosSG/'.$arDocSG[$i][5].'" target="_blank">'.$arDocSG[$i][3].'</a> Versión '.$arDocSG[$i][1].'</td></tr>';
     }
   ?>
  </table>
<!--  </div>-->


</body>
</html>