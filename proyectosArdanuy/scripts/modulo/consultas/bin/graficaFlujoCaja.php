<?php

#	include_once("../scripts/conexion/conexion.php");
#	include_once("../scripts/lib/libFunBasicas.php");
#	include_once("../scripts/lib/fechalib.php");
#	$codProyecto=$_GET['codProyecto'];
/*
#	echo "Sofia ".$codProyecto;
	$meses=array();
	$ingre=array();
	$gasto=array();
	$cadSql="SELECT YEAR(gpro_fecha),MONTH(gpro_fecha),gpro_valor_total,gpro_fecha FROM gastos_proyectos WHERE pro_codigo='$codProyecto'";
#	echo $cadSql;
	$arGastos=$db->GetArray($cadSql);
	exit();
	for($i=0; $i<count($arGastos); $i++){
		$year=trim($arGastos[$i][0]);
		$mont=trim($arGastos[$i][1]);
		$gpro_valor_total=trim($arGastos[$i][2]);
		$gpro_fecha=fecha_texto1($arGastos[$i][3]);#"$mont-$year";
		$valFactu=valorIngFactu($codProyecto,$year,$mont);
		$valAnti=valorIngAnticipo($codProyecto,$year,$mont);
		$valTotIng=$valFactu+$valAnti;
		$netoMes=$valTotIng-$gpro_valor_total;
		$arrMeses[]=$gpro_fecha;
		$arrIngre[]=$valFactu;
		$arrGasto[]=$gpro_valor_total;
	}
	
$datay1 = array(20,7,16,46);
$datay2 = array(6,20,10,22);

// Setup the graph
#$graph = new Graph(350,230);
$graph = new Graph(700,440,'auto');
$graph->SetScale("textlin");

$theme_class= new UniversalTheme;
$graph->SetTheme($theme_class);

$graph->title->Set('Background Image');
$graph->SetBox(false);

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xaxis->SetTickLabels(array('A','B','C','D'));
$graph->ygrid->SetFill(false);
#$graph->SetBackgroundImage("tiger_bkg.png",BGIMG_FILLFRAME);

$p1 = new LinePlot($datay1);
$graph->Add($p1);

$p2 = new LinePlot($datay2);
$graph->Add($p2);

$p1->SetColor("#55bbdd");
$p1->SetLegend('Line 1');
$p1->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
$p1->mark->SetColor('#55bbdd');
$p1->mark->SetFillColor('#55bbdd');
$p1->SetCenter();

$p2->SetColor("#aaaaaa");
$p2->SetLegend('Line 2');
$p2->mark->SetType(MARK_UTRIANGLE,'',1.0);
$p2->mark->SetColor('#aaaaaa');
$p2->mark->SetFillColor('#aaaaaa');
$p2->value->SetMargin(14);
$p2->SetCenter();

$graph->legend->SetFrameWeight(1);
$graph->legend->SetColor('#4E4E4E','#00A78A');
$graph->legend->SetMarkAbsSize(8);


// Output line
$graph->Stroke();
*/

$datay1 = array(20,7,16,46);
$datay2 = array(6,20,10,22);

// Setup the graph
#$graph = new Graph(350,230);
$graph = new Graph(700,440,'auto');
$graph->SetScale("textlin");

$theme_class= new UniversalTheme;
$graph->SetTheme($theme_class);

$graph->title->Set('Background Image');
$graph->SetBox(false);

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

$graph->xaxis->SetTickLabels(array('A','B','C','D'));
$graph->ygrid->SetFill(false);
#$graph->SetBackgroundImage("tiger_bkg.png",BGIMG_FILLFRAME);

$p1 = new LinePlot($datay1);
$graph->Add($p1);

$p2 = new LinePlot($datay2);
$graph->Add($p2);

$p1->SetColor("#55bbdd");
$p1->SetLegend('Line 1');
$p1->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
$p1->mark->SetColor('#55bbdd');
$p1->mark->SetFillColor('#55bbdd');
$p1->SetCenter();

$p2->SetColor("#aaaaaa");
$p2->SetLegend('Line 2');
$p2->mark->SetType(MARK_UTRIANGLE,'',1.0);
$p2->mark->SetColor('#aaaaaa');
$p2->mark->SetFillColor('#aaaaaa');
$p2->value->SetMargin(14);
$p2->SetCenter();

$graph->legend->SetFrameWeight(1);
$graph->legend->SetColor('#4E4E4E','#00A78A');
$graph->legend->SetMarkAbsSize(8);


// Output line
$graph->Stroke();

?>

 