<?php 

$host="localhost";
$bd="sitioweb";
$usuario="root";
$contraseña="";

try {
    $conexion=new PDO("mysql:host=$host;dbname=$bd",$usuario,$contraseña);

} catch (Exception $ex) {
    echo $ex->getMessage();
}

?>