<?php
// 1. Estructura de datos mejorada: Usamos el nivel como clave principal.
$courses = [
    'Básico' => [
        'name' => 'Curso Básico de PHP',
        'price' => 1000,
        'date' => '15 de agosto de 2025',
        'description' => 'Este curso te enseñará todo lo que necesitas saber sobre PHP, desde los fundamentos hasta técnicas avanzadas.'
    ],
    'Intermedio' => [
        'name' => 'Curso Intermedio de PHP',
        'price' => 1500,
        'date' => '1 de septiembre de 2025',
        'description' => 'En este curso profundizaremos en conceptos intermedios de PHP.'
    ],
    'Avanzado' => [
        'name' => 'Curso Avanzado de PHP',
        'price' => 2000,
        'date' => '1 de octubre de 2025',
        'description' => 'Este curso está diseñado para quienes ya tienen conocimientos sólidos de PHP y desean llevar sus habilidades al siguiente nivel.'
    ]
];
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
$selectedLevelName = $_GET['level'] ?? 'Básico';

// 2. Asegurarnos de que el nivel seleccionado es válido para evitar errores.
if (!isset($courses[$selectedLevelName])) {
    $selectedLevelName = 'Básico'; // Si no es válido, volvemos al por defecto.
}

// 3. Buscar los datos del nivel (para la recomendación).
$selectedLevelData = null;
foreach ($courseLevels as $level) {
    if ($level['name'] === $selectedLevelName) {
        $selectedLevelData = $level;
        break;
    }
}

// 4. Obtener los datos del curso correspondiente al nivel seleccionado. ¡Ahora es mucho más fácil!
$selectedCourseData = $courses[$selectedLevelName];
$tags = ["PHP", "Laravel", "JavaScript", "HTML", "CSS", "Node.js" ];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($selectedCourseData['name']) ?></title>
</head>
<body>
    <h1>Bienvenido al <?= htmlspecialchars($selectedCourseData['name']) ?></h1>

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

    <!-- 4. Mostrar la información dinámica del curso seleccionado -->
    <h2>Nivel: <?= htmlspecialchars($selectedLevelName) ?></h2>
    <p><em><?= htmlspecialchars($selectedLevelData['description']) ?></em></p>

    <p><strong>Descripción del curso:</strong> <?= htmlspecialchars($selectedCourseData['description']); ?></p>
    <p><strong>Precio del curso:</strong> $<?= htmlspecialchars($selectedCourseData['price']); ?></p>
    <p><strong>Fecha de inicio:</strong> <?= htmlspecialchars($selectedCourseData['date']); ?></p>

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