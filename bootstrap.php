<?php
require __DIR__ . '/vendor/autoload.php';

use App\OllamaAiService;
use App\FakeAiService;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$aiService = match ($_ENV['APP_ENV'] ?? 'production') {
    'testing' => new FakeAiService(),
    default => new OllamaAiService(
        $_ENV['OLLAMA_HOST'],
        $_ENV['OLLAMA_MODEL']
    ),
};

return new App\Chat($aiService);
