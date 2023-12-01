<?php
require_once(__DIR__ . '/../modelos/GestorAgenda.php');

class ControladorAgenda {
    private $modelo;

    public function listar() {
        $this->mostrarVistaListar();
    }

    public function __construct($conn) {
        $this->modelo = new GestorAgenda($conn);
    }

    public function mostrarVistaAgregar() {
        require_once(__DIR__ . '/../vistas/agregar.php');
    }

    public function agregarEntrada($entrada) {
        $this->modelo->agregarEntrada($entrada);
        header('Location: index.php');
        exit;
    }

    public function mostrarVistaDetalles($id) {
        $entrada = $this->modelo->obtenerEntradaPorId($id);
        require_once(__DIR__ . '/../vistas/detalles.php');
    }

    public function mostrarVistaEditar($id) {
        $entrada = $this->modelo->obtenerEntradaPorId($id);
        require_once(__DIR__ . '/../vistas/editar.php');
    }

    public function editar($id, $datos) {
        $this->modelo->editarEntrada($id, $datos);
        header('Location: index.php');
        exit;
    }

    public function eliminarEntrada($id) {
        $this->modelo->eliminarEntrada($id);
        header('Location: index.php');
        exit;
    }

    public function mostrarVistaListar() {
        $entradas = $this->modelo->obtenerEntradas();
        require_once(__DIR__ . '/../vistas/listar.php');
    }
}
?>
