<?php
$course = "Curso Profesional de PHP";
$price = 1000;
$date = "15 de agosto de 2025";
$archived = false;
$status = $archived ? "archivado" : "activo";

$courseLevels = [
    [
        'name' => 'Básico',
        'description' => 'Recomendado para quienes recién comienzan en programación.'
    ],
    [
        'name' => 'Intermedio',
        'description' => 'Recomendado para estudiantes que tienen conocimientos básicos de programación.'
    ],
    [
        'name' => 'Avanzado',
        'description' => 'Este curso es ideal para estudiantes con conocimientos sólidos de programación.'
    ]
];

// 1. Capturar el nivel seleccionado por el usuario.
// Usamos el operador de fusión de null (??) para establecer 'Básico' como valor por defecto.
$selectedLevelName = $_GET['level'] ?? 'Básico';

// 2. Buscar los datos completos del nivel seleccionado.
$selectedLevelData = null;
foreach ($courseLevels as $level) {
    if ($level['name'] === $selectedLevelName) {
        $selectedLevelData = $level;
        break; // Salimos del bucle una vez que lo encontramos
    }
}
$tags = ["PHP", "Laravel", "JavaScript", "HTML", "CSS", "Node.js" ];

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

    <!-- 3. Formulario para seleccionar el nivel -->
    <form action="" method="GET">
        <label for="level-select">Selecciona un nivel:</label>
        <select name="level" id="level-select">
            <?php foreach ($courseLevels as $level): ?>
                <option 
                    value="<?= htmlspecialchars($level['name']) ?>"
                    <?= ($level['name'] === $selectedLevelName) ? 'selected' : '' ?>
                >
                    <?= htmlspecialchars($level['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Ver descripción</button>
    </form>

    <!-- 4. Mostrar la descripción del nivel seleccionado -->
    <h2>Nivel: <?= htmlspecialchars($selectedLevelData['name']) ?></h2>
    <p><?= htmlspecialchars($selectedLevelData['description']) ?></p>

    <p>El precio del curso es: $<?= htmlspecialchars($price); ?></p>
    <p>Fecha de inicio: <?= htmlspecialchars($date); ?></p>
    <p>Este curso te enseñará todo lo que necesitas saber sobre PHP, desde los fundamentos hasta técnicas avanzadas.</p>
    

    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptates, ducimus delectus tenetur ipsa rerum doloremque in aliquam, veniam.</p>
    <p>Estado del curso: <?= htmlspecialchars($status); ?></p>

    <p>
        <strong>Etiquetas:</strong>
        <ul>
            <?php foreach ($tags as $tag): ?>
            <li><?= htmlspecialchars($tag) ?></li>
            <?php endforeach; ?>
            </ul>
    </p>
</body>
</html>