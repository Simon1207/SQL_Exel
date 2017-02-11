<!DOCTYPE html>
<html>
<head>
	<title>EXEL</title>
</head>
<body>
<?php
//Base de datos
$mysqli = new mysqli('localhost','root','','todovlogs'); //host,usuario,contraseña,nombre_DB

//fecha de la exportación
$fecha = date("d-m-Y");
$consulta= "SELECT * FROM noticia";//consulta todo de la tabla "noticia"
$resultado= $mysqli->query($consulta);

//Inicio de la instancia para la exportación en Excel
header('Content-type: application/vnd.ms-excel'); //ms-excel
header("Content-Disposition: attachment; filename=Listado_$fecha.xls"); //espesificacion de extencion en exel .xls
header("Pragma: no-cache");
header("Expires: 0");

echo "<table border=1> "; //creacion de estructura de tabla a mostrar
echo "<tr> ";
echo     "<th>id_Noticia</th> ";
echo 	"<th>Titulo</th> ";
echo 	"<th>Subtitulo</th> ";
echo 	"<th>Contenido</th>";
echo 	"<th>Fecha</th>";
echo 	"<th>Ruta</th>";
echo 	"<th>Popular</th>";
echo 	"<th>Clasificacion</th>";
echo "</tr> ";

while($row = mysqli_fetch_array($resultado)){	//recuperacion de datos en la base

	$idnoticia = $row['idnoticia']; /* Row=[Nombre columna en SQL]*/ 
	$titulo = $row['titulo'];
	$subtitulo = $row['subtitulo'];
	$contenido=$row['contenido'];
	$fecha=$row['fh'];
	$ruta=$row['ruta'];
	$pupular=$row['popular'];
	$clasificacion=$row['clasificacion'];

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