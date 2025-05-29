<?php 

$host='localhost';
$usuario='root';
$contrasena='';
$dbase='carlosTr';

$conn=new mysqli($host, $usuario, $contrasena, $dbase);

if($conn->connect_error)

{
    die ('Error de la conexion'.$conn->connect_error);
}

$conn->set_charset('utf8');

?>