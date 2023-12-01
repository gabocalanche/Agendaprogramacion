<?php
class GestorAgenda {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;

    }

    public function obtenerEntradas() {
        $sql = "SELECT * FROM entradas_agenda";
        $result = $this->conn->query($sql);
        $entradas = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $entradas[] = $row;
            }
        }
        return $entradas;
    }

    public function agregarEntrada($fecha, $horaDesde, $horaHasta, $descripcion, $tipo, $linkMeet, $numeroOficina, $participantes, $estatus) {
        $sql = "INSERT INTO entradas_agenda (fecha, hora_desde, hora_hasta, descripcion, tipo, link_meet, numero_oficina, participantes, estatus) VALUES ('$fecha', '$horaDesde', '$horaHasta', '$descripcion', '$tipo', '$linkMeet', '$numeroOficina', '$participantes', '$estatus')";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerEntradaPorId($id) {
        $sql = "SELECT * FROM entradas_agenda WHERE id='$id'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public function editarEntrada($id, $fecha, $horaDesde, $horaHasta, $descripcion, $tipo, $linkMeet, $numeroOficina, $participantes, $estatus) {
        $sql = "UPDATE entradas_agenda SET fecha='$fecha', hora_desde='$horaDesde', hora_hasta='$horaHasta', descripcion='$descripcion', tipo='$tipo', link_meet='$linkMeet', numero_oficina='$numeroOficina', participantes='$participantes', estatus='$estatus' WHERE id='$id'";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    public function eliminarEntrada($id) {
        $sql = "DELETE FROM entradas_agenda WHERE id='$id'";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    
}
?>
