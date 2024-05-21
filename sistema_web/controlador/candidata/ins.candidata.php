<link href="../../libs/sweetalert2-8.2.5/sweetalert.css" rel="stylesheet">
<script src="../../libs/jquery.min.js"></script>
<script src="../../libs/sweetalert2-8.2.5/sweetalert.min.js"></script>
<?php
require_once('../../modelo/ws_sistema.php');

// Verificamos que se haya enviado un archivo
if(isset($_FILES['imagen_candidata'])) {
    // Ruta donde se guardarán las imágenes
    $directorio_destino = '../../assets/fotos_candidatas/';
    $nombre_archivo = $_FILES['imagen_candidata']['name'];
    $ruta_archivo = $directorio_destino . $nombre_archivo;

    // Movemos el archivo a su ubicación definitiva
    if(move_uploaded_file($_FILES['imagen_candidata']['tmp_name'], $ruta_archivo)) {
        // Insertamos la candidata en la base de datos con la ruta de la imagen
        $objp = new candidatas();
        $result = $objp->insertarcandidata(
            $_POST['txt_nombre'],
            $_POST['txt_apellido'],
            $_POST['txt_cedula'],
            $_POST['txt_correo'],
            $_POST['txt_direccion'],
            $_POST['txt_telefono'],
            $_POST['txt_representa'],
            $nombre_archivo // Guardamos la ruta de la imagen en la base de datos
        );

        if($result) 
        {
            echo '<script>jQuery(function(){swal({
                title:"Guardar Candidata", text:"Nueva Candidata Registrada", type:"success", confirmButtonText:"Aceptar"
            }, function(){location.href="../../vista/candidata/nuevacandidata.html";});});</script>';
        } 
        else 
        {
            echo '<script>jQuery(function(){swal({
                title:"Guardar Candidata", text:"Error al Guardar", type:"error", confirmButtonText:"Aceptar"
            }, function(){location.href="../../vista/candidata/nuevacandidata.html";});});</script>';
        }

        }
    }

?>