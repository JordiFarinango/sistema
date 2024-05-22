<?php
require_once("../../modelo/ws_sistema.php");

$candidatas = new candidatas();
$result = $candidatas->buscar_candidatas($_POST['valor']);

if(mysqli_num_rows($result) > 0) {
    $f = 1;
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>
            <td>{$f}</td>
            <td><img  src='../../assets/fotos_candidatas/{$row['img_candidata']}' alt='Imagen de la candidata' width='200'></td>
            <td>{$row['nom_candidata']}</td>
            <td>{$row['ape_candidata']}</td>
            <td>
                <a href='votar_candidataaa.php?valor=".$row['id_candidata']."'><img src='../../assets/imagenes/votar.png' alt='Votar'></a>
            </td>
        </tr>";
        $f++;
    }     
} 
else 
{
    echo "<tr><td colspan='5' class='bg-danger text-light text-center'>No existen registros</td></tr>";
}
?>
