<!DOCTYPE html>
<html>
<head>
	<title>EXEL</title>
</head>
<body>
<?php
//Base de datos
$mysqli = new mysqli('localhost','root','','NOMBRE_BD'); //host,usuario,contraseña,nombre_DB

//fecha de la exportación
$fecha = date("d-m-Y");
$consulta= "SELECT * FROM TABLA";//consulta todo de la tabla "noticia"
$resultado= $mysqli->query($consulta);

//Inicio de la instancia para la exportación en Excel
header('Content-type: application/vnd.ms-excel'); //ms-excel
header("Content-Disposition: attachment; filename=Listado_$fecha.xls"); //espesificacion de extencion en exel .xls
header("Pragma: no-cache");
header("Expires: 0");

echo "<table border=1> "; //creacion de estructura de tabla a mostrar
echo "<tr> ";
echo     "<th>COLUMNA1</th> ";
echo 	"<th>COLUMNA2</th> ";
echo 	"<th>COLUMNA3</th> ";
echo 	"<th>COLUMNA4</th>";
echo 	"<th>COLUMNA5</th>";
echo 	"<th>COLUMNA6</th>";
echo 	"<th>COLUMNA7</th>";
echo 	"<th>COLUMNA8</th>";
echo "</tr> ";

while($row = mysqli_fetch_array($resultado)){	//recuperacion de datos en la base

	$idnoticia = $row['REGISTRO_SQL_COL1']; /* Row=[Nombre columna en SQL]*/ 
	$titulo = $row['REGISTRO_SQL_COL2'];
	$subtitulo = $row['REGISTRO_SQL_COL3'];
	$contenido=$row['REGISTRO_SQL_COL4'];
	$fecha=$row['REGISTRO_SQL_COL5'];
	$ruta=$row['REGISTRO_SQL_COL6'];
	$pupular=$row['REGISTRO_SQL_COL7'];
	$clasificacion=$row['REGISTRO_SQL_COL8'];

	echo "<tr> "; //asignacion de resultados en campos de tabla
	echo 	"<td>".$idnoticia."</td> "; 
	echo 	"<td>".$titulo."</td> "; 
	echo 	"<td>".$subtitulo."</td> ";
	echo 	"<td>".$contenido."</td> ";
	echo 	"<td>".$fecha."</td> ";
	echo 	"<td>".$ruta."</td> ";
	echo 	"<td>".$pupular."</td> "; 
	echo 	"<td>".$clasificacion."</td> ";

	echo "</tr> ";

}
echo "</table> ";
?>



</body>
</html>
