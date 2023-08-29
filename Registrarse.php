<?php include("template/cabecera-login.php")?>

        <div class="div-register">
            <h1 class="form-h1">Registrarse</h1>
            <form class="div-form" action="post">
                <input class="form-input" type="text" placeholder="Ingresar Nombres" name="txtnombres">
                <input class="form-input" type="text" placeholder="Ingresar Apellidos" name="txtapellidos">
                <input class="form-input" type="email" placeholder="Ingresar Correo" name="txtcorreo">
                <input class="form-input" type="password" placeholder="Ingresar Contraseña" name="txtpass"><br>
                <input class="form-btn" type="submit" value="Registrarse">
            </form>
            <div class="div-contaner">
            ¿Ya tienes cuenta? <a class="div-a"href="iniciarsesion.php">Inicia sesión</a>
            </div>
        </div> 
    </div>

<?php include("template/pie.php")?>