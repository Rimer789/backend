<?php
// ...

// Obtener la fecha enviada desde el frontend
$fecha = $_GET['fecha'];

// Obtener las reservas para la fecha actual
$sql = "SELECT * FROM reservas WHERE DATE(fecha_hora) = '$fecha' ORDER BY fecha_hora ASC";
$result = $conn->query($sql);

$reservas = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Agregar las reservas al array de resultados
        $reservas[] = $row;
    }
}

// Devolver las reservas en formato JSON
header('Content-Type: application/json');
echo json_encode($reservas);

// ...
?>
