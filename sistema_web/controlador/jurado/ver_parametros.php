<?php
require_once("../../modelo/ws_sistema.php");

$parametros = new parametros();
$result = $parametros->buscar_parametros($_POST['parametros']);

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

        // Verificar si existe el mapeo para la categoría
        if (isset($categoria_map[$categoria_id])) {
            $categoria_nombre = $categoria_map[$categoria_id];
            $categorias[$categoria_nombre][] = $nom_parametro;
        }
    }

    $html = '';
    $maxRows = max(array_map('count', $categorias));

    for ($i = 0; $i < $maxRows; $i++) {
        $html .= "<tr>
                <td>".($i+1)."</td>
                <td>".($categorias['Coreografía'][$i] ?? '')."<br><input type='number' name='coreografia[]' min='0' max='25' required></td>
                <td>".($categorias['Traje Típico'][$i] ?? '')."<br><input type='number' name='traje_tipico[]' min='0' max='25' required></td>
                <td>".($categorias['Traje de Gala'][$i] ?? '')."<br><input type='number' name='traje_gala[]' min='0' max='25' required></td>
                <td>".($categorias['Respuesta a la pregunta'][$i] ?? '')."<br><input type='number' name='respuesta_pregunta[]' min='1' max='40' required></td>
              </tr>";
    }

    echo $html;
} else {
    echo "<tr><td colspan='5' class='bg-danger text-light text-center'>No existen registros</td></tr>";
}
?>
