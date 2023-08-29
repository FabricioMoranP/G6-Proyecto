
<?php include("template/cabecera-admin.php")?>

<div class="div-register">
        <h1 class="form-h1">Administrar</h1>
        <form class="div-form" action="post">
            <input class="form-input" type="text" placeholder="Ingresar Usuario" name="txtcorreo">
            <input class="form-input" type="password" placeholder="Ingresar Contraseña" name="txtpass"><br>
            <input class="form-btn" type="submit" value="Ingresar a Administración">
        </form>
        <div class="div-contaner">
        <a class="div-a" href="">Recuperar Contraseña</a>
        </div>
    </div> 

<?php include("template/pie.php")?>