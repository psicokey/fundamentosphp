<?php
require 'Course.php';

$course = new Course(
    title: 'Curso de PHP',
    subtitle: 'Aprende PHP desde cero',
    description: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatibus.',
    tags: ['php', 'programación', 'backend']
);

$course->addTag('php');  // No se agrega porque ya existe
$course->addTag('');     // No se agrega porque está vacío
$course->addTag('html');
$course->addTag('js');
$course->addTag('css');  // No se agrega porque ya hay 5 etiquetas
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $course->getTitle() ?></title>
</head>
<body>
    <h1>Bienvenido al <?= $course->getTitle() ?></h1>

    <h2><?= $course->getSubtitle() ?></h2>

    <p><?= $course->getDescription() ?></p>

    <p>
        <strong>Etiquetas:</strong>
        <ul>
            <?php foreach ($course->getTags() as $tag): ?>
                <li><?= $tag ?></li>
            <?php endforeach; ?>
        </ul>
    </p>
</body>
</html>