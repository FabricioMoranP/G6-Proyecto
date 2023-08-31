<?php 

session_start();
include('config/bd.php');
$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("location:clientes.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="imagenes/empresalogo.jpg">
    <link rel="stylesheet" type="text/css" href="estilos/estilos-crud.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>
<?php $url="http://".$_SERVER['HTTP_HOST']."/G6-Proyecto"?>
    <div class="contaner">
        <div class="header-navegador">
            
            <header>    
                <nav class="nav">
                    <div class="logo">
                        <a href="<?php echo $url;?>"><img class="img-logo" src="imagenes/empresalogo.jpg" alt="logo de la marca"></a>
                    </div>
                    <div class="nav-versitio">
                        <a class="nav-a" href="cerrar.php">Cerrar</a>
                    </div>
                </nav>
            </header>
        </div>