<?php

namespace App;

use ArdaGnsrn\Ollama\Ollama;
use Exception;

class OllamaAiService implements AiServiceInterface
{
    protected $client;
    protected string $model;

    public function __construct(string $host, string $model)
    {
        $this->client = Ollama::client($host);
        $this->model = $model;
    }

    public function getResponse(string $question): string
    {
        $systemPrompt = <<<EOT
Actúa como un asistente técnico enfocado exclusivamente en PHP. Tu objetivo es proporcionar respuestas claras, concisas y directamente útiles para desarrolladores, evitando información irrelevante. ✅ Si la consulta está relacionada con PHP, responde con precisión técnica en menos de 120 palabras, incluyendo ejemplos si son útiles. 🚫 Si la consulta no está relacionada con PHP, responde: "Lo siento, este asistente está diseñado exclusivamente para consultas sobre PHP." ⚙️ Siempre prioriza buenas prácticas, compatibilidad con PHP 8.2+, y contextualiza según CLI, web, u otras tecnologías si se especifican.
EOT;

        try {
            $result = $this->client->chat()->create([
                'model' => $this->model,
                'messages' => [
                    ['role' => 'system', 'content' => $systemPrompt],
                    ['role' => 'user', 'content' => $question],
                ],
            ]);

            return $result->message->content;
        } catch (Exception $e) {
            // En una aplicación real, aquí registrarías el error en un log.
            error_log("Ollama API Error: " . $e->getMessage());
            return "Error: No se pudo conectar con el servicio de IA. Por favor, inténtalo de nuevo más tarde.";
        }
    }
}