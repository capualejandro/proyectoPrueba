
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    
        <!--<link type='text/css' rel='stylesheet' href='./css/jquery-ui-1.8.23.custom.css'/>-->
        <link rel="stylesheet" href="./css/estilos.css" type="text/css" />
        <link type='text/css' rel='stylesheet' href='./css1/jquery-ui.min.css'/>
        <link type='text/css' rel='stylesheet' href='./css/jquery.uniquefield.css'/>
        <link type='text/css' rel='stylesheet' href='./css/jquerymenu.css'/>

        <script type="text/javascript" src="./jquery1.8/jquery-1.8.0.min.js"></script>
        <script type="text/javascript" src="./jquery1.8/jquerymenu.js"></script>
        <script type="text/javascript" src="./jquery1.8/jquery-1.8.0.js"></script>
				<!--<script type="text/javascript" src="./jquery1.8/jquery-2.0.2.js"></script>-->				
        <script type="text/javascript" src="./jquery1.8/upload.js"></script>
        <script type="text/javascript" src="./jquery1.8/bootstrap.min.js"></script>

        <script type="text/javascript" src="./jquery1.8/jquery.ui.datepicker-es.js"></script>
        <script type="text/javascript" src="./jquery1.8/jquery-ui-1.8.23.custom.min.js"></script>
				<script type="text/javascript" src='./jquery1.8/jquery.numeric.js'></script>

        <script type="text/javascript" src="./jquery1.8/jquery.uniquefield.js"></script>

        <title><?php echo $_SESSION["mod_descripcion"]; ?></title>
    </head>
    
<body>
 <table border="0" cellspacing="0" cellpadding="0" width="100%" bgcolor="#FFFFFF">
   <tr>
     <td>
              <table width="100%" border="0">
                  <tr>
                    <td width="24%" valign="middle">
                      
                      <img width="178" height="55" src="./img/ardanuy/logoardanuygrande.gif">
                      
                    </td>
                    <td width="24%" valign="bottom">&nbsp;</td>
                   <td align="right" width="53%">
                    <strong>
                      <table border="0" cellspacing="0" cellpadding="0" width="100%">
<!--
                        <tr>
                          <td><?php echo "Usuario: ".$_SESSION["usu_login"]; ?></td>
                        </tr>
-->
                        <tr>
                          <td align="right" class="textopequeno"><?php echo $_SESSION["usu_nombr"]; ?></td>
                        </tr>
                      </table>
                    </strong>
                   </td>
                  </tr>
                  <tr>
                    <td colspan="3">&nbsp;</td>
                  </tr>
              </table>
     </td>
   </tr>
 </table>
    <div class='navbar section' id='navbar'></div>
    <div class='jqueryslidemenu' id='myslidemenu'>
		<ul>

<?php
/**/
	for($i=0; $i<count($arDatos); $i++){
		echo "<li><a href='javascript:void(0)'>".$arDatos[$i][0]["mod_descripcion"]."</a>";
		echo "<ul>";
		for($j=0; $j<count($arDatos[$i]); $j++){
			if($arDatos[$i][0]["mod_codigo"] != $arDatos[$i][$j]["mod_codigo"]){
				echo "<li><a href='./index.php?seccion=".$arDatos[$i][$j]["mod_codigo"]."'>".$arDatos[$i][$j]["mod_descripcion"]."</a></li>";
			}
		}
		echo "</ul>";
		echo "</li>";
	}
/**/
?>

		</ul>
        <br style='clear: left'/>
	</div>
</body>
</html>