<?php
require_once('../../libs/fpdf/fpdf.php');
require_once("../../modelo/ws_sistema.php");

class PDF extends FPDF {
    function Header() {
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 10, utf8_decode('GANADORAS'), 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Obtener las calificaciones de la base de datos
$calificacion_obj = new calificacion();
$result = $calificacion_obj->obtener_todas_calificaciones();

$candidatas = [];

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $candidata = $row['nom_candidata'] . " " . $row['ape_candidata'];
        $calificacion = $row['calificacion'];
        
        if (!isset($candidatas[$candidata])) {
            $candidatas[$candidata] = 0;
        }
        
        $candidatas[$candidata] += $calificacion;
    }
}

// Ordenar las candidatas por calificación total descendente
arsort($candidatas);

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

// Títulos de los roles ganadores
$roles = [
    "Reina del Cantón Cayambe",
    "Virreina del Cantón Cayambe",
    "Señorita Turismo",
    "Señorita Simpatía",
    "Señorita Popularidad",
    "Señorita Amistad"
];

// Agregar las ganadoras al PDF
$i = 0;
foreach ($candidatas as $candidata => $total) {
    if ($i < 6) {
        $pdf->Cell(0, 10, utf8_decode("{$candidata} - {$roles[$i]}"), 0, 1);
    }
    $i++;
}

$pdf->Output('D', 'Reporte_Ganadoras.pdf');
?>
