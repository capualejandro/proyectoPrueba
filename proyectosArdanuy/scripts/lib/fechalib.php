<?php 
  global $meses;
  $meses = array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

  function fecha2dma($fecha, $tipo)
  {
	if(strpos($fecha,"-"))
	{
	  $fec = explode("-",$fecha);
	  if($tipo=="d") $n=2; 
	  if($tipo=="m") $n=1; 
	  if($tipo=="a") $n=0;
	  return (int) $fec[$n];
	}
	elseif(strpos($fecha,"/"))
	{
	  $fec = explode("/",$fecha);
	  if($tipo=="d") $n=0;
	  if($tipo=="m") $n=1;
	  if($tipo=="a") $n=2; 
	  return (int) $fec[$n];
	}
	else
	  return false;
  }

  function menu_dia($diainp="")
  {
    if($diainp != "")
	  $dia = (int) $diainp;
    else
	  $dia = date("j");
	
    for($i=1;$i<32;$i++)
    {
      if($i < 10)
	    $ii = "0".$i;
	  else
	    $ii = $i;
	  
		echo "<option value='$ii'>$ii</option>";
    }
  }
  
  function menu_mes_texto($mesinp = "")
  {
    if($mesinp != "")
	  $mes = (int) $mesinp;
    else
	  $mes = date("n");

	for($i=1;$i<13;$i++)
	{
	   if($i < 10)
		 $ii = "0".$i;
	   else
	     $ii = $i;
		 
	   if($i == $mes)
	  	 echo "<option  value='$i' selected>".mes_texto($ii)."</option>";
	   else
		 echo "<option value='$i'>".mes_texto($ii)."</option>";
		 		 
//	  echo "<option value='$ii'>".mes_texto($ii)."</option>";
	}
  }

  function menu_mes($mesinp = "")
  {
    if($mesinp != "")
	  $mes = (int) $mesinp;
    else
	  $mes = date("n");

	for($i=1;$i<13;$i++)
	{
	   if($i < 10)
	     //$ii = "0".$i;
		 $ii = "0".$i;
	   else
	     $ii = $i;
		 
	   if($i == $mes)
	  	 echo "<option  value='$i' selected>$ii</option>";
	   else
		 echo "<option value='$i'>$ii</option>";
	}
  }

  function menu_anio($anioinp = "")
  {
    if($anioinp != "")
	  $anio = (int) $anioinp;
    else
	  $anio = date("Y");
	
    for($i=date("Y")-5;$i<date("Y")+1;$i++)
	  if($i == $anio)
		echo "<option  value='$i' selected>$i</option>";
	  else
		echo "<option value='$i'>$i</option>";
  }

  function menu_anio2($anioinp = "")
  {
    if($anioinp != "")
	  $anio = (int) $anioinp;
    else
	  $anio = date("Y");
	
    for($i=date("Y")-1;$i<date("Y")+1;$i++)
		echo "<option value='$i'>$i</option>";
  }

  function menu_hora($horainp = "")
  {
    if($horainp != "")
	  $hora = (int) $horainp;
    else
	  $hora = date("H");

	for($i=0;$i<24;$i++)
	{
	    if($i < 10)
	      $ii = "0".$i;
	    else
	      $ii = $i;
	
		if($i == $hora)
			echo "<option  value='$ii' selected>$ii</option>";
		else
			echo "<option value='$ii'>$ii</option>";
	}
  }

  function menu_minutos($mininp = "")
  {
    if($mininp != "")
	  $min = (int) $mininp;
    else
	  $min = 0;

	for($i=0;$i<60;$i+=5)
	{
		if($i < 10)
	      $ii = "0".$i;
	    else
	      $ii = $i;
		  
		if($i == $min)
			echo "<option  value='$ii' selected>$ii</option>";
		else
			echo "<option value='$ii'>$ii</option>";
    }
  }

  function menu_mincal($mininp = "")
  {
    if($mininp != "")
	  $min = (int) $horainp;
    else
	  $min = 0;

	for($i=0;$i<60;$i+=15)
	{
		if($i < 10)
	      $ii = "0".$i;
	    else
	      $ii = $i;
		  
		if($i == $min)
			echo "<option  value='$ii' selected>$ii</option>";
		else
			echo "<option value='$ii'>$ii</option>";
    }
  }

  function fecha_texto($fecha){
		$fec = explode("-",$fecha);
		$mes = (int)$fec[1];
		$dia = $fec[2];
		$anio = $fec[0];
    return dame_nombre_mes($mes)." ".$dia." de ".$anio;
  }

  function fecha_texto1($fecha){
		$fec = explode("-",$fecha);
		$mes = (int)$fec[1];
		$dia = $fec[2];
		$anio = $fec[0];
    return dame_nombre_mes($mes)."-".$anio;
  }

  function fecha_texto2($fecha){
	$fec = explode("-",$fecha);
	$mes = (int)$fec[1];
	$dia = $fec[2];
	$anio = $fec[0];
    return $dia."-".dame_nombre_mes($mes)."-".$anio;
  }

  function fecha2db($fecha){
		if(strpos($fecha,"/")){
			$fec = explode("/",$fecha);
			return $fec[2]."-".$fec[1]."-".$fec[0];
		}else
			return false;
  }

  function db2fecha($fecha){
		if(strpos($fecha,"-")){
			$fec = explode("-",$fecha);
			return $fec[2]."/".$fec[1]."/".$fec[0];
		}else
			return false;
  }
  
  function db3fecha($fecha)
  {
	if(strpos($fecha,"-"))
	{
	  $fec = explode("-",$fecha);
	  return $fec[0]." de ".mes_texto($fec[1])." de ".$fec[2];
	}
	else
	  return false;
  }
  
  function dbhora($hora)
  {
	if(strpos($hora,":"))
	{
	  $fec = explode(":",$hora);
	  //echo $fec[0]." Horas, ".mes_texto($fec[1])." Minutos, ".$fec[2]." Segundos";
	  return $fec[0]." Horas, ".$fec[1]." Minutos, ".$fec[2]." Segundos";
	}
	else
	  return false;
  }
  
  function db4fecha($fecha)
  {
	if(strpos($fecha,"-"))
	{
	  $fec = explode("-",$fecha);
	  return $fec[2]." de ".mes_texto($fec[1])." de ".$fec[0];
	}
	else
	  return false;
  }
  
  function fecha_hora_texto($fecha)
  {
    $fec = explode(" ",$fecha);
	if(strpos($fec[0],"-"))
	{
	  $fec2 = explode("-",$fec[0]);
	  return $fec2[2]." de ".mes_texto($fec2[1])." de ".$fec2[0]." ".$fec[1];
	}
	else
	  return false;
  }

  function retornar_fecha_hora($fecha)
  {
	if(strpos($fecha," "))
	{
	  $fech = explode(" ",$fecha);
	  if(strpos($fech[0],"-"))
	  {
		$fec = explode("-",$fech[0]);
		return $fec[2]."/".$fec[1]."/".$fec[0]." ".$fech[1]; 
	  }
	  else
		return $fecha;
	}
	else
	  return $fecha;
  }

  function mes_texto($mes)
  {
  //echo $mes;
    switch($mes)
    {
      case 1 :$cad="Enero";
           break;
      case 2 :$cad="Febrero";
           break;
      case 3 :$cad="Marzo";
           break;
      case 4 :$cad="Abril";
           break;
      case 5 :$cad="Mayo";
           break;
      case 6 :$cad="Junio";
           break;
      case 7 :$cad="Julio";
           break;
      case 8 :$cad="Agosto";
           break;
      case 9 :$cad="Septiembre";
           break;
      case 10 :$cad="Octubre";
           break;
      case 11 :$cad="Noviembre";
           break;
      case 12 :$cad="Diciembre";
           break;
      default:$cad="";
    }
    return $cad;
  }

  function fecha($fetres)
  { 
  	ereg("([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $fetres,$ch);
	$dias=array("Domingo","Lunes","Martes","Mi&eacute;rcoles","Jueves","Viernes","S&aacute;bado"); 
	$meses=array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); 
	return htmlentities($ch[3]." de ".$meses[$ch[2]-1]." del ".$ch[1]);
  }
  
  function dame_nombre_mes($mes)
  {
	 switch ($mes){
	 	case 1:
			$nombre_mes="Ene";
			break;
	 	case 2:
			$nombre_mes="Feb";
			break;
	 	case 3:
			$nombre_mes="Mar";
			break;
	 	case 4:
			$nombre_mes="Abr";
			break;
	 	case 5:
			$nombre_mes="May";
			break;
	 	case 6:
			$nombre_mes="Jun";
			break;
	 	case 7:
			$nombre_mes="Jul";
			break;
	 	case 8:
			$nombre_mes="Ago";
			break;
	 	case 9:
			$nombre_mes="Sep";
			break;
	 	case 10:
			$nombre_mes="Oct";
			break;
	 	case 11:
			$nombre_mes="Nov";
			break;
	 	case 12:
			$nombre_mes="Dic";
			break;
	}
	return $nombre_mes;
  }
  
  function dame_nombre_mes_comp($mes)
  {
	 switch ($mes){
	 	case 1:
			$nombre_mes="Enero";
			break;
	 	case 2:
			$nombre_mes="Febrero";
			break;
	 	case 3:
			$nombre_mes="Marzo";
			break;
	 	case 4:
			$nombre_mes="Abril";
			break;
	 	case 5:
			$nombre_mes="Mayo";
			break;
	 	case 6:
			$nombre_mes="Junio";
			break;
	 	case 7:
			$nombre_mes="Julio";
			break;
	 	case 8:
			$nombre_mes="Agosto";
			break;
	 	case 9:
			$nombre_mes="Septiembre";
			break;
	 	case 10:
			$nombre_mes="Octubre";
			break;
	 	case 11:
			$nombre_mes="Noviembre";
			break;
	 	case 12:
			$nombre_mes="Diciembre";
			break;
	}
	return $nombre_mes;
  }

  function dame_nombre_dia($dia)
  {
	//$numerodiasemana = date('w', mktime(0,0,0,$mes,$dia,$anio));
	switch($dia){
		case 0:
			$nombre_dia="Domingo";
			break;	
		break;
		case 1:
			$nombre_dia="Lunes";
			break;	
		break;
		case 2:
			$nombre_dia="Martes";
			break;	
		break;
		case 3:
			$nombre_dia="Miercoles";
			break;	
		break;
		case 4:
			$nombre_dia="Jueves";
			break;	
		break;
		case 5:
			$nombre_dia="Viernes";
			break;	
		break;
		case 6:
			$nombre_dia="Sabado";
			break;	
		break;
	}
	return $nombre_dia;
  } 
 
  function dfecha($valo)
  {
	list($dia,$mes,$anio) = split("/",$valo);
	return $anio.'-'.$mes.'-'.$dia;
  }
  
  function fec($campo)
  {
	list($anio,$mes,$dia) = split("-",$campo);
	return $dia.'/'.$mes.'/'.$anio;
  }
  
  function fehora($campo)
  {
	list($fecha,$hora) = split(" ",$campo);
	list($h,$m,$s) = split(":",$hora);
	return $h.':'.$m;
  }
  
  function felista($campo)
  {
	list($fecha,$hora) = split(" ",$campo);
	list($anio,$mes,$dia) = split("-",$fecha);
	list($h,$m,$s) = split(":",$hora);
	return $dia.'/'.$mes.'/'.$anio.' '.$h.':'.$m;
  }

  function calculaminutos($uno,$dos)
  {
	list($fecha,$hora) = split(" ",$uno);
	list($a,$me,$d) = split("-",$fecha);
	list($h,$m,$s) = split(":",$hora);
	$t1 = mktime($h,$m,$s,$me,$d,$a);
	
	list($fecha,$hora) = split(" ",$dos);
	list($a,$me,$d) = split("-",$fecha);
	list($h,$m,$s) = split(":",$hora);
	$t2 = mktime($h,$m,$s,$me,$d,$a);
	
	$mi = ($t2 - $t1)/60;
	return $mi;
  }
  
  function pasar_a_minutos($hora)
  {
    $hora=substr($hora,0,2);
    $min=substr($hora,3,2);
    $seg=substr($hora,6,2);
	
	$ini=((($hora*60)*60)+($min*60)+$seg);
	return $ini/60;
  }
  
  function ultimoDia1($ano,$mes)
  { 
    $ultimo_dia=28; 
    while (checkdate($mes,$ultimo_dia + 1,$ano)){ 
       $ultimo_dia++; 
    } 
    return $ultimo_dia; 
  } 
  
  function calcula_numero_dia_semana($dia,$mes,$ano)
  { 
    $numerodiasemana = date('w', mktime(0,0,0,$mes,$dia,$ano));	
	$numerodiasemana+=1;//Correccion Alejandro Araujo
    if ($numerodiasemana == 0) 
       $numerodiasemana = 6; 
    else 
       $numerodiasemana--; 
    return $numerodiasemana; 
  } 
  
  function sumarHoras($horaini,$horafin)
  {
	$horai=substr($horaini,0,2);
	$mini=substr($horaini,3,2);
	$segi=substr($horaini,6,2);

	$horaf=substr($horafin,0,2);
	$minf=substr($horafin,3,2);
	$segf=substr($horafin,6,2);

	$ini=((($horai*60)*60)+($mini*60)+$segi);
	$fin=((($horaf*60)*60)+($minf*60)+$segf);

	$dif=$fin+$ini;

	$difh=floor($dif/3600);
	$difm=floor(($dif-($difh*3600))/60);
	$difs=$dif-($difm*60)-($difh*3600);
	return date("H:i:s",mktime($difh,$difm,$difs));
  }
  
  function restarHoras($horaini,$horafin)
  {
	$horai=substr($horaini,0,2);
	$mini=substr($horaini,3,2);
	$segi=substr($horaini,6,2);

	$horaf=substr($horafin,0,2);
	$minf=substr($horafin,3,2);
	$segf=substr($horafin,6,2);

	$ini=((($horai*60)*60)+($mini*60)+$segi);
	$fin=((($horaf*60)*60)+($minf*60)+$segf);

	$dif=$fin-$ini;

	$difh=floor($dif/3600);
	$difm=floor(($dif-($difh*3600))/60);
	$difs=$dif-($difm*60)-($difh*3600);
	return date("H:i:s",mktime($difh,$difm,$difs));
  }

  function normalizar($i)
  {
    if($i==1) { $i="01"; }
    if($i==2) { $i="02"; }
    if($i==3) { $i="03"; }
    if($i==4) { $i="04"; }
    if($i==5) { $i="05"; }
    if($i==6) { $i="06"; }
    if($i==7) { $i="07"; }
    if($i==8) { $i="08"; }
    if($i==9) { $i="09"; }
    return $i;
  }

  function mayorHoras($horaini,$horafin)
  {
	$horai=substr($horaini,0,2);
	$mini=substr($horaini,3,2);
	$segi=substr($horaini,6,2);

	$horaf=substr($horafin,0,2);
	$minf=substr($horafin,3,2);
	$segf=substr($horafin,6,2);

	$ini=((($horai*60)*60)+($mini*60)+$segi);
	$fin=((($horaf*60)*60)+($minf*60)+$segf);
	
	if($ini>$fin)
	{
	  $dif=1;
	}
	else
	  if($ini==$fin)
	  {
		$dif=2;	
	  }
	  else
	    if($ini<$fin)
		{
		  $dif=3;	
	    }
	return $dif;
  }
  
  //Funcion que retorna la fecha y hora de acuerdo a la zona horaria especificada
  function zonedate($layout, $countryzone, $daylightsaving, $time)
  {
    if($daylightsaving)
	{
      $daylight_saving = date('I');
      if($daylight_saving)
	  { 
	    $zone=3600*($countryzone+1);
	  }
    }
    else
	{
      if($countryzone>>0)
	  { 
	    $zone=3600*$countryzone; 
	  }
      else
	  { 
	    $zone=0;
	  }
    }
    if(!$time)
	{ 
	  $time = time();
	}
    $date = gmdate($layout, $time + $zone);
    return $date;
  }

 function datecmp($f1, $f2)
 {
    $anyo1=(int)substr($f1,0,4);
    $anyo2=(int)substr($f2,0,4);
    if ($anyo1==$anyo2)
    {
       $mes1=(int)substr($f1,5,2);
       $mes2=(int)substr($f2,5,2);
       if ($mes1==$mes2)
       {
          $dia1=(int)substr($f1,8,2);
          $dia2=(int)substr($f2,8,2);
          if($dia1==$dia2)
             return 0;
          else
		    if($dia1>$dia2)
              return 1;
            else
              return -1;
       }
       else
	     if($mes1>$mes2)
           return 1;
         else
           return -1;
    }
    else
	 if($anyo1>$anyo2)
       return 1;
     else
       return -1;
  }

  function nombre_dia($dia,$mes,$anio)
  {//Modificada por Ing. Alejandro Araujo
	$num_dia=calcula_numero_dia_semana($dia,$mes,$anio);
	switch($num_dia){
		case 0:
			$nombre_dia="Dom";
			break;	
		break;
		case 1:
			$nombre_dia="Lun";
			break;	
		break;
		case 2:
			$nombre_dia="Mar";
			break;	
		break;
		case 3:
			$nombre_dia="Mi&eacute;";
			break;	
		break;
		case 4:
			$nombre_dia="Jue";
			break;	
		break;
		case 5:
			$nombre_dia="Vie";
			break;	
		break;
		case 6:
			$nombre_dia="S&aacute;b";
			break;	
		break;
	}
	return $nombre_dia;
  }
  
  function resta_dias($fecha)
  {//Da el numero de dias con respecto a la fecha actual formato yyyy-mm-dd
	$fec = getdate();
	$day = $fec['mday'];
	$mon = $fec['mon'];
	$year= $fec['year'];
	$x = "$year-$mon-$day";
	$x=strtotime($x);
	$y=strtotime($fecha);
	$segundos=intval($x-$y);
	$dias=intval(($segundos/3600)/24);
	return $dias;
  }

  //Diferencia en dias entre dos fechas formato yyyy-mm-dd
	function diferencia_dias($fecha1,$fecha2){
		$x=strtotime($fecha1);
		$y=strtotime($fecha2);
		$segundos=intval($x-$y);
		$dias=intval(($segundos/3600)/24);
		return $dias;
    }

  //Diferencia en meses entre dos fechas formato yyyy-mm-dd
	function diferencia_meses($fecha1,$fecha2){
		$x=strtotime($fecha1);
		$y=strtotime($fecha2);
		$segundos=intval($x-$y);
		$meses=intval(($segundos/3600)/24/30);
		return $meses;
    }

  function formato_fecha($fecha){
	$mes=substr($fecha,5,2);
	$mes=dame_nombre_mes($mes);
	$anho=substr($fecha,0,4);
	$dia=substr($fecha,8,2);
	$fecha="$mes-$dia-$anho";
	return $fecha;
  }

  function formato_fecha_ifx($fecha){
	//$mes=dame_nombre_mes($mes);
	$anho=substr($fecha,0,4);
	$mes=substr($fecha,5,2);
	$dia=substr($fecha,8,2);
	$fecha="$mes$dia$anho";
	return $fecha;
  }

  function formato_fecha_ifx2($fecha){
	//$mes=dame_nombre_mes($mes);
	$anho=substr($fecha,6,4);
	$mes=substr($fecha,0,2);
	$dia=substr($fecha,3,2);
	$fecha="$mes$dia$anho";
	return $fecha;
  }

	//Numero de dias de un mes
	function getMonthDays($Month, $Year){
	   //Si la extensión que mencioné está instalada, usamos esa.
	   if( is_callable("cal_days_in_month")){
		  return cal_days_in_month(CAL_GREGORIAN, $Month, $Year);
	   }else{
		  //Lo hacemos a mi manera.
		  return date("d",mktime(0,0,0,$Month+1,0,$Year));
	   }
	}
	//Obtenemos la cantidad de días que tiene septiembre del 2008 UltimoDia

	function UltimoDia($anho,$mes){ 
		if(((fmod($anho,4)==0) and (fmod($anho,100)!=0)) or (fmod($anho,400)==0)) { 
			$dias_febrero = 29; 
		}else{ 
			$dias_febrero = 28; 
		} 
		switch($mes) { 
			 case "01": return 31; break; 
			 case "02": return $dias_febrero; break; 
			 case "03": return 31; break; 
			 case "04": return 30; break; 
			 case "05": return 31; break; 
			 case "06": return 30; break; 
			 case "07": return 31; break; 
			 case "08": return 31; break; 
			 case "09": return 30; break; 
			 case "10": return 31; break; 
			 case "11": return 30; break; 
			 case "12": return 31; break; 
		} 
	
	}
/**
  function lastDay($anho,$mes){ 
	 if(((fmod($anho,4)==0) and (fmod($anho,100)!=0)) or (fmod($anho,400)==0)) { 
         $dias_febrero = 29; 
     }else{ 
         $dias_febrero = 28; 
     } 
     switch($mes) { 
         case 01: return 31; break; 
         case 02: return $dias_febrero; break; 
         case 03: return 31; break; 
         case 04: return 30; break; 
         case 05: return 31; break; 
         case 06: return 30; break; 
         case 07: return 31; break; 
         case 08: return 31; break; 
         case 09: return 30; break; 
         case 10: return 31; break; 
         case 11: return 30; break; 
         case 12: return 31; break; 
     } 
  } 
/**/
?>