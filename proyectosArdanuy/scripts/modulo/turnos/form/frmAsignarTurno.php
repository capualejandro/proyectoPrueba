<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title></title>

	<script type="text/javascript">
		
		$(document).ready(function() {
			$("#enviar").click(function (){
				$("#txtBandera").attr({'value':'1'});
				$('#frmAsignarTurno').attr('action','./index.php?seccion=TURASIGNAR');
				$('#frmAsignarTurno').submit();
			});
		 });
		
    </script>

</head>

 <body>
  <div>
   <form id="frmAsignarTurno" name="frmAsignarTurno" method="post">
     <input type="hidden" id="txtBandera" name="txtBandera" value="" class=""/>
     <select id="selMes" name="selMes">
      <?php
        menu_mes_texto();
      ?>
     </select>
     <select id="selAnio" name="selAnio">
      <?php
        menu_anio();
      ?>
     </select>
     <input type="button" name="enviar" id="enviar" value="Aceptar">
   </form>
    
  </div>
 </body>
</html>