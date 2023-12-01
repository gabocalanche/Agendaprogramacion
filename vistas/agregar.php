<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Entrada a la Agenda</title>
</head>
<body>
    <h1>Agregar Entrada a la Agenda</h1>
    <form action="index.php?accion=agregar" method="post">
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required><br><br>

        <label for="hora_desde">Hora Desde:</label>
        <input type="time" id="hora_desde" name="hora_desde" required><br><br>

        <label for="hora_hasta">Hora Hasta:</label>
        <input type="time" id="hora_hasta" name="hora_hasta" required><br><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50" required></textarea><br><br>

        <label for="tipo">Tipo:</label>
        <select id="tipo" name="tipo" required>
            <option value="presencial">Presencial</option>
            <option value="remoto">Remoto</option>
        </select><br><br>

        <div id="div_link_meet" style="display: none;">
            <label for="link_meet">Link del Meet:</label>
            <input type="text" id="link_meet" name="link_meet">
        </div>

        <div id="div_numero_oficina" style="display: none;">
            <label for="numero_oficina">Número de Oficina:</label>
            <input type="text" id="numero_oficina" name="numero_oficina">
        </div>

        <label for="participantes">Nombre de los Participantes:</label><br>
        <input type="text" id="participantes" name="participantes"><br><br>

        <label for="estatus">Estatus:</label>
        <select id="estatus" name="estatus" required>
            <option value="planificada">Planificada</option>
            <option value="ejecutada">Ejecutada</option>
            <option value="suspendida">Suspendida</option>
        </select><br><br>

        <input type="submit" value="Agregar">
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
    </script>
</body>
</html>
