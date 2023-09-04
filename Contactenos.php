<?php include("template/cabecera.php");

$accion=(isset($_POST['accion']))?$_POST['accion']:"";

switch($accion){
    case "Enviar":
        
    header("Location: Contactenos.php");
    break;
}
if($accion){
    $mensaje="Enviado con exito";
}
?>
<!-- <!doctype html>
<html lang="es">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
        <meta name="description" content="Contacto">
        <meta name="author" content="Parzibyte">
        <title>Formulario de contacto</title>
         Cargar el CSS de Boostrap
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="estilos/cont.css" rel="stylesheet">
    </head>

    <body> -->
        
        <!-- Termina la definición del menú -->
        <section>
                <!-- Aquí pon las col-x necesarias, comienza tu contenido, etcétera -->
                <div class="contaner-cont">
                        <form class="form-cont" method="POST">
                            <!-- <h1 class="h1-cont">Gracias por contactarme</h1> -->
                            <div class="form-group">
                                <label class="label-form" for="nombre">Nombre:</label><br>
                                <input name="nombre" required type="text" id="nombre"
                                    class="form-control" >
                            </div>
                            <div class="form-group">
                                <label class="label-form" for="correo">Correo electrónico:</label><br>
                                <input name="email" required type="email" id="correo"
                                    class="form-control" >
                            </div>
                            <div class="form-group">
                                <label class="label-form" for="correo">Asunto:</label><br>
                                <input name="asunto" required type="text" id="asunto"
                                    class="form-control" >
                            </div>
                            <div class="form-group">
                                <label class="label-form">Dejanos tu mensaje:</label><br>
                                <textarea required  class="form-control" class="form-txtarea" name="mensaje" id="mensaje"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn-cont" type="submit" name="accion" value="Enviar">Enviar</button>
                            </div>
                        </form>
                        <img class="img-contactanos" src="imagenes/contactanos.png" alt="contactanos">
                    <?php if (!empty($mensaje)) { ?>
                        <strong>
                            <?php echo $mensaje; ?>
                        </strong><br>
                    <?php } ?>
                </div>
        </section>
<?php include("template/pie.php")?>