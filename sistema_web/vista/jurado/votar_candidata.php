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


    <body class="container">
        <form action="../../controlador/candidata/act_candidata.php" method="post">
            <input type="text" hidden id="txt_idcandidatas" name="txt_idcandidatas" value="<?php echo $row['id_candidata'];?>"></input> <!-- hidden es para ocultar esas cosas -->
        
        
        <div>
            <h2 class="">Ingrese una nota del 1 al 25</h2>
        </div>

        <div class="d-flex justify-content-end mb-3">
            <a href="jurado.html" class="btn btn-primary">Regresar</a>
        </div>
        
        <div class="container">
        



        </div>
    </form>
    </body>

</html>