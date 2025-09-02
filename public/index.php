<?php

$app = require __DIR__ . '/../bootstrap.php';

$question = $_POST['question'] ?? '';
$answer = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $question) {
    $answer = $app->getResponse($question);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot PHP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-2xl p-8 space-y-6 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold text-center text-gray-800">Chatbot con Ollama</h1>
        
        <form method="post" id="chat-form">
            <div>
                <label for="question" class="block text-sm font-medium text-gray-700">Haz una pregunta sobre PHP:</label>
                <input type="text" name="question" id="question" value="<?= htmlspecialchars($question) ?>" required
                       class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                       placeholder="Ej: ¿Qué son los traits?">
            </div>
            
            <div class="mt-4">
                <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer">
                    Enviar
                </button>
            </div>
        </form>

        <div id="spinner" class="hidden flex justify-center items-center mt-6">
            <svg class="animate-spin -ml-1 mr-3 h-8 w-8 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8_0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span class="text-gray-600">Pensando...</span>
        </div>

        <?php if ($answer): ?>
        <div id="response-container" class="mt-6 p-4 bg-gray-50 rounded-md border border-gray-200">
            <p class="text-gray-800"><span class="font-semibold">Respuesta:</span> <?= htmlspecialchars($answer) ?></p>
        </div>
        <?php endif; ?>

    </div>

    <script>
        document.getElementById('chat-form').addEventListener('submit', function() {
            if (document.getElementById('question').value.trim() !== '') {
                document.getElementById('spinner').classList.remove('hidden');
                const responseContainer = document.getElementById('response-container');
                if (responseContainer) {
                    responseContainer.style.display = 'none';
                }
            }
        });
    </script>

</body>
</html>