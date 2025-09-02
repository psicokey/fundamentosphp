#!/usr/bin/env php
<?php
// Usamos el bootstrap para obtener el servicio de IA ya configurado.
// Esto mantiene nuestro script principal limpio y la configuración centralizada.
require __DIR__ . '/../bootstrap.php';

echo 'Ask anything to AI (type "exit" to quit)' . PHP_EOL;

while (true) {
    $input = readline ('> ');

    if (in_array(strtolower($input), ['hola', 'hi', 'hello'])) {
        echo 'Hola, ¿en qué puedo ayudarte?' . PHP_EOL;
        continue;
    }
    if ($input === 'exit') {
        break;
    }
    echo "AI is thinking..." . PHP_EOL;
    $response = $aiService->getResponse($input);
    echo 'AI: ' . $response . PHP_EOL;
}