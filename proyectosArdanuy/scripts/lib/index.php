<?php // content="text/plain; charset=utf-8"
/**
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

	var_dump($arrMeses);
	exit();
/**/
$codProyecto=$_GET['codProyecto'];
$nom=$_GET['nom'];
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
   <center><h2><font color="#cc0000"><?php echo "$nom $codProyecto"; ?></font></h2></center>
   <br/>
   <img src="grafica.php" />
</body>
</html>