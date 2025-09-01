<?php
class Course {
     public function __construct(
        public string $title,
        public string $subtitle,
        public int $price,
        public string $date,
        public string $description,
        public array $tags,
    ) {}
}

// 2. Creación de objetos Course para cada nivel
$courses = [
    'Básico' => new Course(
        title: "Curso Básico de PHP",
        subtitle: "Fundamentos de PHP",
        price: 1000,
        date: "15 de agosto de 2025",
        description: "Este curso te enseñará todo lo que necesitas saber sobre PHP, desde los fundamentos hasta técnicas avanzadas.",
        tags: ["PHP", "Programación", "Backend"]
    ),
    'Intermedio' => new Course(
        title: "Curso Intermedio de PHP",
        subtitle: "PHP y Bases de Datos",
        price: 1500,
        date: "1 de septiembre de 2025",
        description: "En este curso profundizaremos en conceptos intermedios de PHP y su interacción con bases de datos.",
        tags: ["PHP", "MySQL", "POO"]
    ),
    'Avanzado' => new Course(
        title: "Curso Avanzado de PHP",
        subtitle: "Frameworks como Laravel",
        price: 2000,
        date: "1 de octubre de 2025",
        description: "Este curso está diseñado para quienes ya tienen conocimientos sólidos de PHP y desean llevar sus habilidades al siguiente nivel con frameworks.",
        tags: ["PHP", "Laravel", "Frameworks", "API REST"]
    )
];

$archived = false;
$status = $archived ? "archivado" : "activo";

// Array con las descripciones de los niveles (para la recomendación)
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

// 3. Lógica para manejar la selección del usuario
// Capturar el nivel seleccionado por el usuario.
$selectedLevelName = $_GET['level'] ?? 'Básico';

// Asegurarnos de que el nivel seleccionado es válido para evitar errores.
if (!isset($courses[$selectedLevelName])) {
    $selectedLevelName = 'Básico'; // Si no es válido, volvemos al por defecto.
}

// Buscar los datos del nivel (para la recomendación).
$selectedLevelData = null;
foreach ($courseLevels as $level) {
    if ($level['name'] === $selectedLevelName) {
        $selectedLevelData = $level;
        break;
    }
}

// Obtener el objeto del curso correspondiente al nivel seleccionado.
$selectedCourse = $courses[$selectedLevelName];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($selectedCourse->title) ?></title>
</head>
<body>
    <h1>Bienvenido al <?= htmlspecialchars($selectedCourse->title) ?></h1>
    <h2><?= htmlspecialchars($selectedCourse->subtitle) ?></h2>

    <!-- Formulario para seleccionar el nivel -->
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

    <!-- Mostrar la información dinámica del curso seleccionado -->
    <h2>Nivel: <?= htmlspecialchars($selectedLevelName) ?></h2>
    <p><em><?= htmlspecialchars($selectedLevelData['description']) ?></em></p>

    <p><strong>Descripción del curso:</strong> <?= htmlspecialchars($selectedCourse->description) ?></p>
    <p><strong>Precio del curso:</strong> $<?= htmlspecialchars($selectedCourse->price) ?></p>
    <p><strong>Fecha de inicio:</strong> <?= htmlspecialchars($selectedCourse->date) ?></p>

    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptates, ducimus delectus tenetur ipsa rerum doloremque in aliquam, veniam.</p>
    <p>Estado del curso: <?= htmlspecialchars($status); ?></p>

    <p>
        <strong>Etiquetas:</strong>
        <ul>
            <?php foreach ($selectedCourse->tags as $tag): ?>
            <li><?= htmlspecialchars($tag) ?></li>
            <?php endforeach; ?>
        </ul>
    </p>
</body>
</html>