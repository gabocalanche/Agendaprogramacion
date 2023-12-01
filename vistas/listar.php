<?php

$entrada = [
    'fecha' => '2023-12-01',
    'hora_desde' => '09:00',
    'hora_hasta' => '11:00',
    'descripcion' => 'Reunión de planificación',
    'tipo' => 'remoto',
    'link_meet' => 'https://meet.google.com/xyz',
    'numero_oficina' => '',
    'participantes' => 'Juan, María, Carlos',
    'estatus' => 'Planificada'
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Entrada de la Agenda</title>
</head>
<body>
    <h1>Editar Entrada de la Agenda</h1>
    <form action="index.php?accion=editar" method="post">
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" value="<?php echo $entrada['fecha']; ?>" required><br><br>

        <label for="hora_desde">Hora Desde:</label>
        <input type="time" id="hora_desde" name="hora_desde" value="<?php echo $entrada['hora_desde']; ?>" required><br><br>

        <label for="hora_hasta">Hora Hasta:</label>
        <input type="time" id="hora_hasta" name="hora_hasta" value="<?php echo $entrada['hora_hasta']; ?>" required><br><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50" required><?php echo $entrada['descripcion']; ?></textarea><br><br>

        <label for="tipo">Tipo:</label>
        <select id="tipo" name="tipo" required>
            <option value="presencial" <?php if ($entrada['tipo'] === 'presencial') echo 'selected'; ?>>Presencial</option>
            <option value="remoto" <?php if ($entrada['tipo'] === 'remoto') echo 'selected'; ?>>Remoto</option>
        </select><br><br>

        <div id="div_link_meet" <?php if ($entrada['tipo'] !== 'remoto') echo 'style="display: none;"'; ?>>
            <label for="link_meet">Link del Meet:</label>
            <input type="text" id="link_meet" name="link_meet" value="<?php echo $entrada['link_meet']; ?>">
        </div>

        <div id="div_numero_oficina" <?php if ($entrada['tipo'] !== 'presencial') echo 'style="display: none;"'; ?>>
            <label for="numero_oficina">Número de Oficina:</label>
            <input type="text" id="numero_oficina" name="numero_oficina" value="<?php echo $entrada['numero_oficina']; ?>">
        </div>

        <label for="participantes">Nombre de los Participantes:</label><br>
        <input type="text" id="participantes" name="participantes" value="<?php echo $entrada['participantes']; ?>"><br><br>

        <label for="estatus">Estatus:</label>
        <select id="estatus" name="estatus" required>
            <option value="planificada" <?php if ($entrada['estatus'] === 'planificada') echo 'selected'; ?>>Planificada</option>
            <option value="ejecutada" <?php if ($entrada['estatus'] === 'ejecutada') echo 'selected'; ?>>Ejecutada</option>
            <option value="suspendida" <?php if ($entrada['estatus'] === 'suspendida') echo 'selected'; ?>>Suspendida</option>
        </select><br><br>

        <input type="submit" value="Guardar Cambios">
    </form>

    <script>

        document.getElementById('tipo').addEventListener('change', function() {
            var tipo = this.value;
            var divLinkMeet = document.getElementById('div_link_meet');
            var divNumeroOficina = document.getElementById('div_numero_oficina');

            if (tipo === 'remoto') {
                divLinkMeet.style.display = 'block';
                divNumeroOficina.style.display = 'none';
            } else {
                divLinkMeet.style.display = 'none';
                divNumeroOficina.style.display = 'block';
            }
        });

        window.onload = function() {
            document.getElementById('tipo').dispatchEvent(new Event('change'));
        };
    </script>
</body>
</html>