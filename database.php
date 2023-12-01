<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "agendabd";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La conexión a la base de datos ha fallado: " . $conn->connect_error);
}

require_once(__DIR__ . '/modelos/GestorAgenda.php');
require_once(__DIR__ . '/controladores/ControladorAgenda.php');

$controlador = new ControladorAgenda($conn);

if (isset($_GET['accion'])) {
    $accion = $_GET['accion'];
    switch ($accion) {
        case 'listar':
            $controlador->listar();
            break;
        case 'agregar':
            $controlador->agregar();
            break;
        case 'editar':
            $controlador->editar();
            break;
        case 'detalles':
            $controlador->detalles();
            break;
        default:
            $controlador->listar();
            break;
    }
} else {
    $controlador->listar();
}
?>
