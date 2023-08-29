<?php include("template/cabecera-crud.php")?>

<?php 
$txtid=(isset($_POST['txtid']))?$_POST['txtid']:"";
$txtnombres=(isset($_POST['txtnombres']))?$_POST['txtnombres']:"";
$txtapellidos=(isset($_POST['txtapellidos']))?$_POST['txtapellidos']:"";
$txtcorreo=(isset($_POST['txtcorreo']))?$_POST['txtcorreo']:"";
$txtpass=(isset($_POST['txtpass']))?$_POST['txtpass']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include("config/bd.php");

switch($accion){
    case "Agregar":
        $sentenciaSQL=$conexion->prepare("INSERT INTO clientes (id, nombres, apellidos, correo, contraseña) VALUES (:id, :nombres, :apellidos, :correo, :contraseña);");
        $sentenciaSQL->bindParam(':id',$txtid);
        $sentenciaSQL->bindParam(':nombres',$txtnombres);
        $sentenciaSQL->bindParam(':apellidos',$txtapellidos);
        $sentenciaSQL->bindParam(':correo',$txtcorreo);
        $sentenciaSQL->bindParam(':contraseña',$txtpass);
        $sentenciaSQL->execute();

        echo "Presionando el boton Agregar";
        break;

    case "Modificar":
        echo "Presionando el boton Modificar";
        break;

    case "Cancelar":
        echo "Presionando el boton Cancelar";
        break;
};
?>
        <div>
            Datos del cliente<br>
            <form method="POST" enctype="multipart/form-data">
                <label for="txtid">ID:</label>
                <input type="text" name="txtid" id="txtid" placeholder="Ingresar ID">
                <label for="txtnombres">Nombres:</label>
                <input type="text" name="txtnombres" id="txtnombres" placeholder="Ingresar Nombres">
                <label for="txtapellidos">Apellidos:</label>
                <input type="text" name="txtapellidos" id="txtapellidos" placeholder="Ingresar apellidos">
                <label for="txtcorreo">Correo:</label>
                <input type="text" name="txtcorreo" id="txtcorreo" placeholder="Ingresar correo">
                <label for="txtpass">Contraseña:</label>
                <input type="password" name="txtpass" id="txtpass" placeholder="Ingresar contraseña">
                <div>
                    <button type="submit" name="accion" value="Agregar" class="btn-form">Agregar</button>
                    <button type="submit" name="accion" value="Modificar" class="btn-form">Modificar</button>
                    <button type="submit" name="accion" value="Cancelar" class="btn-form">Cancelar</button>
                </div>
            </form>
        </div>

        <div>
            Tabla de Clientes
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Contraseña</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>fabricio</td>
                        <td>moran</td>
                        <td>fabriciofto@gmail.com</td>
                        <td>fabricio0123</td>
                        <td>Seleccionar | Borrar</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div> 
    
</body>
</html>