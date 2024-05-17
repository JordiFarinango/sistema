<?php
require_once('../../modelo/ws_sistema.php'); 
$objp = new candidatas();
$row = $objp->ConsultarDato($_GET['valor']);
//modificar persona
?>

<!doctype html>
<html lang="en">
<html>
    <head>
        <title>Modificar persona</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../../libs/bootstrap-5.3.1/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous"></script>
        <script src="../../libs/bootstrap-5.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="../../libs/jquery.min.js"></script>
        <script src="../../libs/ajax.js"></script>
    </head>


    <body>
        <form action="../../controlador/candidata/act_candidata.php" method="post">
            <input type="text" hidden id="txt_idpersonas" name="txt_idpersonas" value="<?php echo $row['idpersonas'];?>"></input> <!-- hidden es para ocultar esas cosas -->
        <div>
            <h2 class="text-primary">Actualizar Persona</h2>
        </div>
        <div class="container">
        <div class="form-group row">
                <label class="col-2">Nombres</label>
                <input type="text" class="form-control col-4" name="txt_nombre" id="txt_nombre" value="<?php echo $row['nom_candidata'];?>">
            </div>
            <div class="form-group row">
                <label class="col-2">Apellidos</label>
                <input type="text" class="form-control col-4" name="txt_apellido" id="txt_apellido" value="<?php echo $row['ape_candidata'];?>">
            </div>
            <div class="form-group row">
                <label class="col-2">Cedula</label>
                <input type="text" class="form-control col-4" name="txt_cedula" id="txt_cedula" value="<?php echo $row['ced_candidata'];?>">
            </div>
            <div class="form-group row">
                <label class="col-2">Correo</label>
                <input type="text" class="form-control col-4" name="txt_correo" id="txt_correo" value="<?php echo $row['correo_candidata'];?>">
            </div>
            <div class="form-group row">
                <label class="col-2">Telefono</label>
                <input type="text" class="form-control col-4" name="txt_telefono" id="txt_telefono" value="<?php echo $row['cel_candidata'];?>">
            </div>
            <div class="form-group row">
                <label class="col-2">Direccion</label>
                <input type="text" class="form-control col-4" name="txt_direccion" id="txt_direccion" value="<?php echo $row['dir_candidata'];?>">
            </div>
            <div class="form-group row">
                <label class="col-5">¿A qué institución representa?</label>
                <input type="text" class="form-control col-4" name="txt_representa" id="txt_representa" value="<?php echo $row['repre_candidata'];?>">
            </div>
            <div class="form-group row">
                <label class="col-2">Imagen</label>
                <input type="file" class="form-control col-4" name="imagen_candidata" id="imagen_candidata" value="<?php echo $row['img_candidata'];?>">
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