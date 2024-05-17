<?php
require_once("../../modelo/ws_sistema.php");
$candidatas = new candidatas ();
$result = $persona -> consultar($_POST['valor']);
echo "<table id='tabla_candi' name='tabla_candi' class='table table-bordered'>
        <head class='bg-primary text-light'>
            <th>N.</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Cedula</th>
            <th>Correo</th>
            <th>Celular</th>
            <th>Direccion</th>
            <th>Representa a:</th>
        </head>";
if(mysqli_num_rows($result)>0)
{
    $f=1;
   while ($row=mysqli_fetch_array($result))
   {
    echo "<tr>
        <td>".$f."</td>
        <td>".$row['nom_candidata']."</td>
        <td>".$row['ape_candidata']."</td>
        <td>".$row['ced_candidata']."</td>
        <td>".$row['correo_candidata']."</td>
        <td>".$row['cel_candidata']."</td>
        <td>".$row['dir_candidata']."</td>
        <td>".$row['repre_candidata']."</td>
        <td><a href='mod_candidata.html'><img src='../../assets/imagenes/delete.png'></a></td>
        <td><a href='eli_candidata.html'><img src='../../assets/imagenes/edit.png'></a></td>
    </tr>";
    $f++;
   }     
}
else
{
    echo "<tr><td colspan='6' class='bg-danger text-light text-center'> No existen registros</td></tr>";
}

echo "</table>";

?>

