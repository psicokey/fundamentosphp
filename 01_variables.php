<?php
$course = "Curso Profesional de PHP";
$price = 1000;
$date = "15 de agosto de 2025";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($course) ?></title>
</head>
<body>
    <h1>Bienvenido al <?= htmlspecialchars($course) ?></h1>
    <p>El precio del curso es: $<?= htmlspecialchars($price); ?></p>
    <p>Fecha de inicio: <?= htmlspecialchars($date); ?></p>
    <p>Este curso te enseñará todo lo que necesitas saber sobre PHP, desde los fundamentos hasta técnicas avanzadas.</p>
    

    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptates, ducimus delectus tenetur ipsa rerum doloremque in aliquam, veniam.</p>
</body>
</html>