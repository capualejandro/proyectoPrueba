<?php // content="text/plain; charset=utf-8"

require_once("jpgraph/src/jpgraph.php");
require_once("jpgraph/src/jpgraph_line.php");

$datay1 = array(20,7,16,46);
$datay2 = array(6,20,10,22);

define("DB_HOST","127.0.0.1");  
define("DB_USER","root");  
define("DB_PASS","");  
define("DB_DATABASE","fichaproyectos");  

$mysqli=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_DATABASE);

$arrMeses=array();
$arrIngre=array();
$arrGasto=array();

$cadSql="SELECT meses,ingresos,gastos FROM temporal";
$result=$mysqli->query($cadSql);
$numReg=$result->num_rows;

if($numReg>0){
	while($fila=$result->fetch_assoc()){
		$arrMeses[]=trim($fila['meses']);
		$arrIngre[]=trim($fila['ingresos']);
		$arrGasto[]=trim($fila['gastos']);
	}
}

$graph = new Graph(1500,500,'auto');
$graph->SetScale("textlin");

$theme_class= new UniversalTheme;
$graph->SetTheme($theme_class);

$graph->title->SetColor("#cc0000");
$graph->title->Set('COMPORTAMIENTO FACTURACIÓN VS GASTOS \ Valores Presentados en Millones');
$graph->SetBox(false);

$graph->yaxis->HideZeroLabel();
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

#$graph->xaxis->SetTickLabels(array('A','B','C','D'));
$graph->xaxis->SetTickLabels($arrMeses);
$graph->ygrid->SetFill(false);
#$graph->SetBackgroundImage("tiger_bkg.png",BGIMG_FILLFRAME);

#$p1 = new LinePlot($datay1);
$p1 = new LinePlot($arrIngre);
$graph->Add($p1);

#$p2 = new LinePlot($datay2);
$p2 = new LinePlot($arrGasto);
$graph->Add($p2);

$p1->SetColor("#000080");
$p1->SetLegend('Ingresos Por Facturación Neto');
$p1->mark->SetType(MARK_FILLEDCIRCLE,'',1.0);
$p1->mark->SetColor('#000080');
$p1->mark->SetFillColor('#000080');
$p1->SetCenter();

$p2->SetColor("#FF0000");
$p2->SetLegend('Gastos');
$p2->mark->SetType(MARK_UTRIANGLE,'',1.0);
$p2->mark->SetColor('#FF0000');
$p2->mark->SetFillColor('#FF0000');
$p2->value->SetMargin(14);
$p2->SetCenter();

$graph->legend->SetFrameWeight(1);
$graph->legend->SetColor('#4E4E4E','#00A78A');
$graph->legend->SetMarkAbsSize(8);


// Output line
$graph->Stroke();

?>

