<?php

namespace root_classes;

class JsonResponse extends Response
{
    private $errors = [];

    public function getResponse()
    {
        header('Content-Type: application/json; charset=utf-8');
        http_response_code($this->code);
        echo json_encode([
            'code' => $this->code,
            'errors' => $this->errors,
            'data' => $this->content
        ]);
    }

    public function addError(string $text, int $code = 400)
    {
        $this->errors[] = $text;
        $this->code = $code;
        return $this;
    }
}