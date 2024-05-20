<?php
require_once('../../modelo/ws_sistema.php'); 
$objp = new usuario();
$row = $objp->ConsultarDatoNotario($_GET['valor']);
//modificar persona
?>

<!doctype html>
<html lang="en">
<html>
    <head>
        <title>Modificar Notario</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../../libs/bootstrap-5.3.1/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous"></script>
        <script src="../../libs/bootstrap-5.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="../../libs/jquery.min.js"></script>
        <script src="../../libs/ajax.js"></script>
    </head>


    <body>
        <form action="../../controlador/notario/act_notario.php" method="post">
            <input type="text" id="txt_idnotarios" name="txt_idnotarios" value="<?php echo $row['id_usuario'];?>"></input> <!-- hidden es para ocultar esas cosas -->
        <div>
            <h2 class="text-primary">Actualizar Jurado</h2>
        </div>
        <div class="container">
        <div class="form-group row">
                <label class="col-2">Nombres</label>
                <input type="text" class="form-control col-4" name="txt_nombre" id="txt_nombre" value="<?php echo $row['nom_usuario'];?>">
            </div>
            <div class="form-group row">
                <label class="col-2">Apellidos</label>
                <input type="text" class="form-control col-4" name="txt_apellido" id="txt_apellido" value="<?php echo $row['ape_usuario'];?>">
            </div>
            <div class="form-group row">
                <label class="col-2">Cedula</label>
                <input type="text" class="form-control col-4" name="txt_cedula" id="txt_cedula" value="<?php echo $row['ced_usuario'];?>">
            </div>
            <div class="form-group row">
                <label class="col-2">Correo</label>
                <input type="text" class="form-control col-4" name="txt_correo" id="txt_correo" value="<?php echo $row['correo_usuario'];?>">
            </div>
            <div class="form-group row">
                <label class="col-2">Dirección</label>
                <input type="text" class="form-control col-4" name="txt_direccion" id="txt_direccion" value="<?php echo $row['dire_usuario'];?>">
            </div>
            <div class="form-group row">
                <label class="col-2">Celular</label>
                <input type="text" class="form-control col-4" name="txt_telefono" id="txt_telefono" value="<?php echo $row['cel_usuario'];?>">
            </div>
            <div class="form-group row">
                <label class="col-5">Ocupación?</label>
                <input type="text" class="form-control col-4" name="txt_ocupacion" id="txt_ocupacion" value="<?php echo $row['ocupa_usuario'];?>">
            </div>
            <div class="form-group row">
                <label class="col-5">Usuario</label>
                <input type="text" class="form-control col-4" name="txt_usuario" id="txt_usuario" value="<?php echo $row['usu_usuario'];?>">
            </div>
            <div class="form-group row">
                <label class="col-5">Usuario</label>
                <input type="text" class="form-control col-4" name="txt_clave" id="txt_clave" value="<?php echo $row['clave_usuario'];?>">
            </div>

            <div class="form-group row">
                <label class="col-2 text-center">
                <button type="submit" class="btn btn-success">Guardar</button>
                </label>
            </div>

        </div>
    </form>
    </body>

</html>