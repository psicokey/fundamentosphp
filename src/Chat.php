<?php

namespace App;

class Chat
{
    private $aiService;

    public function __construct(AiServiceInterface $aiService)
    {
        $this->aiService = $aiService;
    }

    public function start()
    {
        echo 'Ask anything to AI' . PHP_EOL;

        while (true) {
            $input = readline('> ');
            $lowerInput = strtolower($input);

            if ($lowerInput === 'exit') {
                break;
            }

            if (in_array($lowerInput, ['hola', 'hi'])) {
                echo 'Hola, ¿en qué puedo ayudarte?' . PHP_EOL;
                continue;
            }
            $response = $this->aiService->getResponse($input);
            echo $response . PHP_EOL;
        }
    }
    public function getResponse(string $input): string
    {
        return $this->aiService->getResponse($input);
    }
}