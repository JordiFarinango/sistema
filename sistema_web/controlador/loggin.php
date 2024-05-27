<?php
require_once("../modelo/ws_sistema.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];

    $conexionDB = new DBConexion();
    $conexion = $conexionDB->Conectar();
    $consulta = "SELECT * FROM usuarios WHERE usu_usuario = '$usuario' AND clave_usuario = '$clave'";
    $resultado = mysqli_query($conexion, $consulta);

    if ($fila = mysqli_fetch_assoc($resultado)) {
        $_SESSION["id_usuario"] = $fila["id_usuario"];
        $_SESSION["rol"] = $fila["rol_id_re"];
        switch ($_SESSION["rol"]) {
            case 1: 
                header("Location: ../vista/administrador/administrador.html");
                break;
            case 2: 
                header("Location: ../vista/jurado/jurado.html");
                break;
            case 3: 
                header("Location: ../vista/notario/notario.html");
                break;
            default: 
                header("Location: error.html");
                break;
        }
        exit();
    } 
    else 
    {
        echo "Error: Credenciales incorrectas.";
    }
}
?>
