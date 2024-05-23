<?php
require_once("../../modelo/ws_sistema.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $coreografia = $_POST['coreografia'];
    $traje_tipico = $_POST['traje_tipico'];
    $traje_gala = $_POST['traje_gala'];
    $respuesta_pregunta = $_POST['respuesta_pregunta'];
    $id_jurado = 1; 
    $id_candidata = 1; 
    $conexion = new DBConexion();
    $conex = $conexion->Conectar();

    for ($i = 0; $i < count($coreografia); $i++) {
        $stmt = $conex->prepare("INSERT INTO calificacion (id_usuario_re, id_candidata_re, id_parametro_re, calificacion) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiii", $id_jurado, $id_candidata, $id_parametro, $nota);

        $id_parametro = 1; 
        $nota = $coreografia[$i];
        $stmt->execute();

        $id_parametro = 2; 
        $nota = $traje_tipico[$i];
        $stmt->execute();

        $id_parametro = 3;
        $nota = $traje_gala[$i];
        $stmt->execute();

        $id_parametro = 4;
        $nota = $respuesta_pregunta[$i];
        $stmt->execute();
    }

    echo "Notas guardadas exitosamente";
} 
else 
{
    echo "Método no permitido";
}

?>
