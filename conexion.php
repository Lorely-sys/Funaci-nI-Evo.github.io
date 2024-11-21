<?php
$nombre=$_POST['name'];
$correo=$_POST['email'];
$texto=$_POST['text'];


$user="root";
$pass="";
$host="localhost";
$bd="dual";

$connection=mysqli_connect($host,$user,$pass,$bd);
if($connection)
{
	echo "se conecto";
}else{
	echo "error de conexion ";
}

echo "<br>"; 

$sql="insert into informacionn(informacion_nombre,informacion_correo,informacion_texto) values('".$nombre."','".$correo."','".$texto."')";
$resultado=mysqli_query($connection, $sql);
if ($resultado==false) {
	echo "error de insercion";
}else{
	echo "insercion correcta";
}

echo "<br>";
mysqli_close($connection);

?>