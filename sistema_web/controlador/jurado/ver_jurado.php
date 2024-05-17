<?php
require_once("../../modelo/ws_sistema.php");

$jurados = new usuario();
$result = $jurados->buscar_jurados($_POST['valor']);

echo "<thead class='bg-primary text-light'>
        <tr>
            <th>N.</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Cedula</th>
            <th>Correo</th>
            <th>Direccion</th>
            <th>Celular</th>
            <th>Ocupacion:</th>
            <th>Acciones</th>
        </tr>
    </thead>";

if(mysqli_num_rows($result) > 0) {
    $f = 1;
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>
            <td>{$f}</td>
            <td>{$row['nom_usuario']}</td>
            <td>{$row['ape_usuario']}</td>
            <td>{$row['ced_usuario']}</td>
            <td>{$row['correo_usuario']}</td>
            <td>{$row['dire_usuario']}</td>
            <td>{$row['cel_usuario']}</td>
            <td>{$row['ocupa_usuario']}</td>
            
            <td>
                <a href='mod_jurado.html'><img src='../../assets/imagenes/edit.png'></a>
                <a href='eli_jurado.html'><img src='../../assets/imagenes/delete.png'></a>
            </td>
        </tr>";
        $f++;
    }     
} else {
    echo "<tr><td colspan='9' class='bg-danger text-light text-center'>No existen registros</td></tr>";
}

?>
