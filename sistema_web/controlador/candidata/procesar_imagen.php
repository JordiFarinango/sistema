<?php
// Verificar si se ha enviado una imagen
if(isset($_FILES['imagen_candidata'])) {
    // Directorio donde se almacenarán las imágenes de las candidatas
    $directorio_destino = '../../assets/fotos_candidatas';

    // Ruta completa del archivo de imagen en el servidor
    $archivo_destino = $directorio_destino . basename($_FILES['imagen_candidata']['name']);

    // Mover la imagen desde la ubicación temporal al directorio de destino
    if(move_uploaded_file($_FILES['imagen_candidata']['tmp_name'], $archivo_destino)) {
        echo "La imagen se ha subido correctamente.";
        // Aquí puedes guardar la información de la candidata en la base de datos, incluyendo la ruta de la imagen ($archivo_destino)
    } else {
        echo "Hubo un error al subir la imagen.";
    }
} else {
    echo "No se ha seleccionado ninguna imagen.";
}
?>
