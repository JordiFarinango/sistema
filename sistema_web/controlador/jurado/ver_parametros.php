<?php
require_once("../../modelo/ws_sistema.php");

$parametros = new parametros();
$result = $parametros->buscar_parametros($_POST['parametros']);

if(mysqli_num_rows($result) > 0) {
    $f = 1;
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>
            <td>{$f}</td>
            <td>{$row['nom_parametro']}</td>
            <td>{$row['nom_parametro']}</td>
            <td>{$row['nom_parametro']}</td>
            <td>{$row['nom_parametro']}</td>
        </tr>";
        $f++;
    }
} else {
    echo "<tr><td colspan='5' class='bg-danger text-light text-center'>No existen registros</td></tr>";
}
?>
