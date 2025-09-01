<?php
require 'Course.php';

$course = new Course(
    title: 'Curso de PHP',
    subtitle: 'Aprende PHP desde cero',
    description: 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatibus.',
    tags: ['php', 'programación', 'backend']
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $course->title ?></title>
</head>
<body>
    <?= $course ?>
</body>
</html>