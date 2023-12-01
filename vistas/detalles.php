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
    <title>Detalles de la Entrada</title>
</head>
<body>
    <h1>Detalles de la Entrada</h1>
    <p><strong>Fecha:</strong> <?php echo $entrada['fecha']; ?></p>
    <p><strong>Hora Desde:</strong> <?php echo $entrada['hora_desde']; ?></p>
    <p><strong>Hora Hasta:</strong> <?php echo $entrada['hora_hasta']; ?></p>
    <p><strong>Descripción:</strong> <?php echo $entrada['descripcion']; ?></p>
    <p><strong>Tipo:</strong> <?php echo $entrada['tipo']; ?></p>
    
    <?php if ($entrada['tipo'] === 'remoto'): ?>
        <p><strong>Link del Meet:</strong> <?php echo $entrada['link_meet']; ?></p>
    <?php else: ?>
        <p><strong>Número de Oficina:</strong> <?php echo $entrada['numero_oficina']; ?></p>
    <?php endif; ?>
    
    <p><strong>Participantes:</strong> <?php echo $entrada['participantes']; ?></p>
    <p><strong>Estatus:</strong> <?php echo $entrada['estatus']; ?></p>
</body>
</html>
