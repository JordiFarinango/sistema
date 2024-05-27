<?php
require_once("../../modelo/ws_sistema.php");
session_start();

if (!isset($_SESSION['id_usuario'])) {
    die("Error: Sesión no iniciada para el jurado.");
}

$id_usuario = $_SESSION['id_usuario'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['id_parametro']) || !isset($_POST['id_candidata']) || !isset($_POST['nota'])) {
        die("Error: Datos incompletos.");
    }

    $id_parametro = $_POST['id_parametro'];
    $id_candidata = $_POST['id_candidata'];
    $nota = $_POST['nota'];

    $conexion = new DBConexion();
    $conex = $conexion->Conectar();

    $stmt = $conex->prepare("INSERT INTO calificacion (id_usuario_re, id_candidata_re, id_parametro_re, calificacion) VALUES (?, ?, ?, ?)
                             ON DUPLICATE KEY UPDATE calificacion = ?");
    $stmt->bind_param("iiiii", $id_usuario, $id_candidata, $id_parametro, $nota, $nota);

    if ($stmt->execute()) {
        echo "Nota guardada exitosamente";
    } else {
        echo "Error al guardar la nota";
    }

    $stmt->close();
    $conex->close();
} else {
    echo "Método no permitido";
}
?>
