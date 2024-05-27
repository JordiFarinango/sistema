<?php
require_once("../../modelo/ws_sistema.php");

$calificacion_obj = new calificacion();
$result = $calificacion_obj->obtener_todas_calificaciones();

$calificaciones = [];

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $jurado = $row['nom_usuario'] . " " . $row['ape_usuario'];
        $candidata = $row['nom_candidata'] . " " . $row['ape_candidata'];
        $categoria = $row['nom_categoria'];
        $parametro = $row['nom_parametro'];
        $calificacion = $row['calificacion'];
        
        if (!isset($calificaciones[$jurado])) {
            $calificaciones[$jurado] = [];
        }
        if (!isset($calificaciones[$jurado][$candidata])) {
            $calificaciones[$jurado][$candidata] = [];
        }
        if (!isset($calificaciones[$jurado][$candidata][$categoria])) {
            $calificaciones[$jurado][$candidata][$categoria] = [];
        }
        
        $calificaciones[$jurado][$candidata][$categoria][$parametro] = $calificacion;
    }
}

$html = "";

foreach ($calificaciones as $jurado => $candidatas) {
    $html .= "<h3 class='text-info text-center'>Jurado: {$jurado}</h3>";
    foreach ($candidatas as $candidata => $categorias) {
        $html .= "<h4 class='text-danger'>Candidata: {$candidata}</h4>";
        foreach ($categorias as $categoria => $parametros) {
            $html .= "<h5>Categoria: {$categoria}</h5>";
            $html .= "<table class='table table-bordered' style='width: 80%; margin: 0 auto; font-size: 0.9em;'>";
            $html .= "<thead class='bg-primary text-light'><tr><th style='padding: 4px;'>Parámetro</th><th style='padding: 4px;'>Calificación</th></tr></thead>";
            $html .= "<tbody>";
            foreach ($parametros as $parametro => $calificacion) {
                $html .= "<tr><td style='padding: 4px;'>{$parametro}</td><td style='padding: 4px;'>{$calificacion}</td></tr>";
            }
            $html .= "</tbody></table>";
        }
    }
}

if (empty($html)) {
    $html = "<p class='bg-danger text-light text-center'>No existen registros</p>";
}

echo $html;
?>
