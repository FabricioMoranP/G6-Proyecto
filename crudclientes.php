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
        $sentenciaSQL=$conexion->prepare("INSERT INTO `clientes` (id, nombres, apellidos, correo, contraseña) VALUES (:id, :nombres, :apellidos, :correo, :contraseña);");
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

    case "Seleccionar":
        
        // echo "Presionando el boton Seleccionar";
        break;

    case "Borrar":
        $sentenciaSQL=$conexion->prepare("DELETE FROM clientes WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtid);
        $sentenciaSQL->execute();
        // echo "Presionando el boton Borrar";
        break;
}

$sentenciaSQL=$conexion->prepare("SELECT * FROM clientes");
$sentenciaSQL->execute();
$listaClientes=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
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
                    <?php foreach($listaClientes as $cliente){ ?>
                    <tr>
                        <td><?php echo $cliente['id']?></td>
                        <td><?php echo $cliente['nombres']?></td>
                        <td><?php echo $cliente['apellidos']?></td>
                        <td><?php echo $cliente['correo']?></td>
                        <td><?php echo $cliente['contraseña']?></td>
                        <td>

                        Seleccionar | Borrar
                        <form method="post">

                            <input type="hidden" name="txtid" id="txtid" value="<?php echo $cliente['id']?>"/>
                            <input type="submit" name="accion" value="Seleccionar"/>
                            <input type="submit" name="accion" value="Borrar"/>
                            
                        </form>
                    
                        </td>
                    </tr>
                    <?php } ?> 
                </tbody>
            </table>
        </div>
    </div> 
    
</body>
</html>