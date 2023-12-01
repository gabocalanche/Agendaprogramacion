<?php
require_once('controladores/ControladorAgenda.php');

$conn = new mysqli('localhost', 'root', '', 'agendabd');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$accion = isset($_GET['accion']) ? $_GET['accion'] : 'inicio';

$controlador = new ControladorAgenda($conn);

switch ($accion) {
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
