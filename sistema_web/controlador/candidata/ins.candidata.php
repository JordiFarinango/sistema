<link href="../../libs/sweetalert2-8.2.5/sweetalert.css" rel="stylesheet">
<script src="../../libs/jquery.min.js"></script>
<script src="../../libs/sweetalert2-8.2.5/sweetalert.min.js"></script>

<?php
require_once('../../modelo/ws_sistema.php');
$objp=new candidatas();
$result=$objp->insertarcandidata(
    $_POST['txt_nombre'],
    $_POST['txt_apellido'],
    $_POST['txt_cedula'],
    $_POST['txt_correo'],
    $_POST['txt_direccion'],
    $_POST['txt_telefono'],
    $_POST['txt_representa']);

    if($result)
    {
        echo '<script>jQuery(function(){swal({
            title:"Guardar Candidata", text:"Nueva Candidata Registrada", type:"success", confirmButtonText:"Aceptar"
        }, function(){location.href="../../vista/administrador/administrador.html";});});</script>';
    }
    else
    {
        echo '<script>jQuery(function(){swal({
            title:"Guardar Candidata", text:"Error al Guardar", type:"success", confirmButtonText:"Aceptar"
        }, function(){location.href="../../vista/administrador/administrador.html";});});</script>';
    }
?>