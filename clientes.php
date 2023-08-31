
<?php include("template/cabecera-admin.php")?>

<?php
session_start();

if($_POST){
    if(($_POST['txtusuario']=="fabricio")&&($_POST['txtpass']=="fabricio123")){
        $_SESSION['usuario']=="ok";
        $_SESSION['nombreUsuario']=="FabricioMP";
        header('Location: crudclientes.php');
    }else{
        $mensaje="Error: El usuario o contraseña son incorrectos";
    }
}
?>

<div class="div-register">
        <h1 class="form-h1">Administrar</h1>

        <?php if(isset($mensaje)) {?>
        <strong><?echo $mensaje; ?></strong>
        <?php }?>

        <form class="div-form" method="POST">
            <input class="form-input" type="text" placeholder="Ingresar Usuario" name="txtusuario">
            <input class="form-input" type="password" placeholder="Ingresar Contraseña" name="txtpass"><br>
            <input class="form-btn" type="submit" value="Ingresar a Administración">
        </form>
        <div class="div-contaner">
        <a class="div-a" href="">Recuperar Contraseña</a>
        </div>
    </div> 

<?php include("template/pie.php")?>