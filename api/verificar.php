<?php
// Incluir el archivo de configuración de la base de datos
require_once('config/database.php');

// Obtener la fecha y hora enviadas desde el frontend
$fechaHora = $_GET['fecha_hora'];

// Verificar si ya existe una reserva en la misma fecha y hora
$sql = "SELECT * FROM reservas WHERE fecha_hora = '$fechaHora'";
$result = $conn->query($sql);

$response = array();

if ($result->num_rows > 0) {
    // Ya existe una reserva en la misma fecha y hora
    $response['existe'] = true;
} else {
    // No existe una reserva en la misma fecha y hora
    $response['existe'] = false;
}

// Devolver la respuesta en formato JSON
header('Content-Type: application/json');
echo json_encode($response);

// Cerrar la conexión
$conn->close();
?>
