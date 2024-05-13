<?php
$server = 'localhost';
$user = 'root';
$password = '';
$db = 'sistema_web_3';
$conexion = new mysqli($server, $user, $password, $db);

if ($conexion->connect_errno)
{
    die("Error de conexión.");
}
else
{
    echo "Conexión exitosa.";
}


?>