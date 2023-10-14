<?php include("../template/cabecera-crud.php")?>

<?php 

$txtid=(isset($_POST['txtid']))?$_POST['txtid']:"";
$txtnombres=(isset($_POST['txtnombres']))?$_POST['txtnombres']:"";
$txtapellidos=(isset($_POST['txtapellidos']))?$_POST['txtapellidos']:"";
$txtcorreo=(isset($_POST['txtcorreo']))?$_POST['txtcorreo']:"";
$txtpass=(isset($_POST['txtpass']))?$_POST['txtpass']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

include("../modelo/bd.php");

switch($accion){
    case "Agregar":
        $sentenciaSQL=$conexion->prepare("INSERT INTO `clientes` (id, nombres, apellidos, correo, contraseña) VALUES (:id, :nombres, :apellidos, :correo, :pass);");
        $sentenciaSQL->bindParam(':id',$txtid);
        $sentenciaSQL->bindParam(':nombres',$txtnombres);
        $sentenciaSQL->bindParam(':apellidos',$txtapellidos);
        $sentenciaSQL->bindParam(':correo',$txtcorreo);
        $sentenciaSQL->bindParam(':pass',$txtpass);
        $sentenciaSQL->execute();

        header("Location:crudclientes.php");
        // echo "Presionando el boton Agregar";
        break;

    case "Modificar":
        $sentenciaSQL=$conexion->prepare("UPDATE clientes SET nombres=:nombres, apellidos=:apellidos, correo=:correo, contraseña=:pass WHERE id=:id");
        $sentenciaSQL->bindParam(':nombres',$txtnombres);
        $sentenciaSQL->bindParam(':apellidos',$txtapellidos);
        $sentenciaSQL->bindParam(':correo',$txtcorreo);
        $sentenciaSQL->bindParam(':pass',$txtpass);
        $sentenciaSQL->bindParam(':id',$txtid);
        $sentenciaSQL->execute();
        
        header("Location:crudclientes.php");
        break;

    case "Cancelar":
        header("Location:crudclientes.php");
        // echo "Presionando el boton Cancelar";
        break;

    case "Seleccionar":
        $sentenciaSQL=$conexion->prepare("SELECT * FROM clientes WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtid);
        $sentenciaSQL->execute();
        $cliente=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $txtnombres=$cliente['nombres'];
        $txtapellidos=$cliente['apellidos'];
        $txtcorreo=$cliente['correo'];
        $txtpass=$cliente['contraseña'];
        
        // echo "Presionando el boton Seleccionar";
        break;

    case "Borrar":
        $sentenciaSQL=$conexion->prepare("DELETE FROM clientes WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtid);
        $sentenciaSQL->execute();
        // echo "Presionando el boton Borrar";
        header("Location:crudclientes.php");
        break;
}

$sentenciaSQL=$conexion->prepare("SELECT * FROM clientes");
$sentenciaSQL->execute();
$listaClientes=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>
<section>
        <div class="contaner-2">
            <div class="contaner-form">
                <h1 class="titles">Datos del cliente</h1>
                <form class="form" method="POST" enctype="multipart/form-data">
                    <label class="label-form" for="txtid">ID:</label>
                    <input class="input-form" type="text" required value="<?php echo $txtid?>" name="txtid" id="txtid" placeholder="Ingresar ID"><br>

                    <label class="label-form" for="txtnombres">Nombres:</label>
                    <input class="input-form" type="text" required value="<?php echo $txtnombres?>" name="txtnombres" id="txtnombres" placeholder="Ingresar Nombres"><br>

                    <label class="label-form" for="txtapellidos">Apellidos:</label>
                    <input class="input-form" type="text" required value="<?php echo $txtapellidos?>" name="txtapellidos" id="txtapellidos" placeholder="Ingresar apellidos"><br>

                    <label class="label-form" for="txtcorreo">Correo:</label>
                    <input class="input-form" type="text" required value="<?php echo $txtcorreo?>" name="txtcorreo" id="txtcorreo" placeholder="Ingresar correo"><br>

                    <label class="label-form" for="txtpass">Contraseña:</label>
                    <input class="input-form" type="password" required value="<?php echo $txtpass?>" name="txtpass" id="txtpass" placeholder="Ingresar contraseña"><br>
                    
                    <div>
                        <button class="btn-form" type="submit" name="accion" <?php echo ($accion == "Seleccionar")?"disable":""; ?> value="Agregar" class="btn-form">Agregar</button>

                        <button class="btn-form" type="submit" name="accion" <?php echo ($accion != "Seleccionar")?"disable":""; ?> value="Modificar" class="btn-form">Modificar</button>

                        <button class="btn-form" type="submit" name="accion" <?php echo ($accion != "Seleccionar")?"disable":""; ?> value="Cancelar" class="btn-form">Cancelar</button>
                    </div>
                </form>
            </div>

            <div class="contaner-crud">
                <h1 class="titles">Tabla de Clientes</h1>
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

                            <form method="post">

                                <input type="hidden" name="txtid" id="txtid" value="<?php echo $cliente['id']?>"/>
                                <input class="btn-crud" type="submit" name="accion" id="seleccionar" value="Seleccionar"/>
                                <input class="btn-crud" type="submit" name="accion" id= "borrar" value="Borrar"/>
                                
                            </form>
                        
                            </td>
                        </tr>
                        <?php } ?> 
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
</section>
</body>
</html>