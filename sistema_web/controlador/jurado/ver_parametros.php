<?php
require_once("../../modelo/ws_sistema.php");
session_start();

if (!isset($_SESSION['id_usuario'])) {
    die("Error: Sesión no iniciada para el jurado.");
}

$id_usuario = $_SESSION['id_usuario'];  // ID del jurado

if (!isset($_POST['valor'])) {
    die("Error: ID de candidata no proporcionado.");
}

$id_candidata = $_POST['valor'];  // ID de la candidata

$parametros = new parametros();
$result = $parametros->buscar_parametros("");

$categoria_map = [
    1 => 'Coreografía',
    2 => 'Traje Típico',
    3 => 'Traje de Gala',
    4 => 'Respuesta a la pregunta'
];

$categorias = [
    'Coreografía' => [],
    'Traje Típico' => [],
    'Traje de Gala' => [],
    'Respuesta a la pregunta' => []
];

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $categoria_id = $row['id_categoria_re'];
        $nom_parametro = $row['nom_parametro'];
        $id_parametro = $row['id_parametros'];

        // Verificar si existe el mapeo para la categoría
        if (isset($categoria_map[$categoria_id])) {
            $categoria_nombre = $categoria_map[$categoria_id];
            $categorias[$categoria_nombre][] = [
                'nombre' => $nom_parametro,
                'id' => $id_parametro
            ];
        }
    }

    // Obtener notas existentes para el jurado y la candidata
    $calificaciones = [];
    $calificacion_obj = new calificacion();
    $result_calificaciones = $calificacion_obj->obtener_calificaciones($id_usuario, $id_candidata);
    if ($result_calificaciones && mysqli_num_rows($result_calificaciones) > 0) {
        while ($row_calificacion = mysqli_fetch_array($result_calificaciones)) {
            $calificaciones[$row_calificacion['id_parametro_re']] = $row_calificacion['calificacion'];
        }
    }

    $html = '';
    $maxRows = max(array_map('count', $categorias));

    for ($i = 0; $i < $maxRows; $i++) {
        $html .= "<tr>
                <td>".($i+1)."</td>";

        foreach ($categoria_map as $categoria_nombre) {
            $parametro = $categorias[$categoria_nombre][$i] ?? null;
            if ($parametro) {
                $id_parametro = $parametro['id'];
                $nota = $calificaciones[$id_parametro] ?? '';
                $disabled = $nota ? 'disabled' : '';

                // Definir los límites según el parámetro
                $min = 1;
                $max = 25;
                if ($categoria_nombre == 'Respuesta a la pregunta') {
                    if (strpos($parametro['nombre'], '40') !== false) {
                        $max = 40;
                    } elseif (strpos($parametro['nombre'], '30') !== false) {
                        $max = 30;
                    }
                }

                $html .= "<td>{$parametro['nombre']}<br><input type='number' name='nota_{$id_parametro}' id='nota_{$id_parametro}' value='{$nota}' min='{$min}' max='{$max}' required {$disabled}><button type='button' id='btn_guardar_{$id_parametro}' onclick='guardar_nota({$id_parametro}, {$id_candidata})' {$disabled}>Guardar</button></td>";
            } else {
                $html .= "<td></td>";
            }
        }

        $html .= "</tr>";
    }

    echo $html;
} else {
    echo "<tr><td colspan='5' class='bg-danger text-light text-center'>No existen registros</td></tr>";
}
?>
