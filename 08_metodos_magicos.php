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
    <?= $course ?>
</body>
</html>