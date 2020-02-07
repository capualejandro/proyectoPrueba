<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title></title>
</head>

<body>

	<h2 class="titulo" align="center">Listado <?php echo $tipDoc." Proyecto ".$codProyecto; ?></h2>

  <table cellspacing="0" cellpadding="5" border="1" class="subtexto" align="center" width="30%">
  	<tr bgcolor="#E6E6FA"><td><strong>Documento</strong></td></tr>
<?php
		for($i=0; $i<count($arreglo); $i++){
			$pos=strripos($arreglo[$i][3],'.');
			$lon=strlen($arreglo[$i][3]);
			$ext=substr($arreglo[$i][3],$pos+1,$lon);
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
			echo '<tr><td>'.$img.' <a href="documentos/'.$arreglo[$i][3].'" target="_blank">'.$arreglo[$i][4].'</a></td></tr>';
		}
?>
  	<tr><td><input type="button" name="btnVolver" id="btnVolver" class="boton" value="Volver" onClick="history.back()"></td></tr>
  </table>
  

</body>
</html>