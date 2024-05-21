<?php
require_once '../../modelo/ws_sistema.php';

$sql = "SELECT id_candidata, nom_candidata, ape_candidata FROM candidata";
$result = $conn->query($sql);

$candidatas = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $candidatas[] = $row;
    }
}

echo json_encode($candidatas);

$conn->close();
?>
