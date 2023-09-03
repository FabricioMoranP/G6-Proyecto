
<?php include("template/cabecera-admin.php")?>

<?php
include("config/bd.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['usuario']) && isset($_POST['contraseña'])) {
        $usuario = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];

        $_SESSION['usuario'] = $usuario;

        $conexion = mysqli_connect("localhost", "root", "", "sitioweb");
        $consulta = "SELECT * FROM administradores WHERE usuario='$usuario' AND contraseña='$contraseña'";
        $resultado = mysqli_query($conexion, $consulta);

        $filas = mysqli_num_rows($resultado);

        if ($filas) {
            header("location: crudclientes.php");
            exit;
        } else {
            $mensaje = "Error: El usuario o contraseña son incorrectos";
        }
    }
}
?>

<div class="div-register">
    <h1 class="form-h1">Administrar</h1>
    <?php if (!empty($mensaje)) { ?>
        <strong>
            <?php echo $mensaje; ?>
        </strong><br>
    <?php } ?>
    <form class="div-form" method="POST">
        <input class="form-input" type="text" placeholder="Ingresar Usuario" name="usuario">
        <input class="form-input" type="password" placeholder="Ingresar Contraseña" name="contraseña"><br>
        <input class="form-btn" type="submit" value="Ingresar a Administración">
    </form>
    <div class="div-contaner">
        <a class="div-a" href="">Recuperar Contraseña</a>
    </div>
</div>