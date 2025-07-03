<?php

namespace LyraMaker\Entrevista\Router;

class Response
{
    protected $statusCode = 200;
    protected $headers = [];

    public function setStatusCode($code)
    {
        $this->statusCode = $code;
        http_response_code($code);
    }

    public function setHeader($key, $value)
    {
        $this->headers[$key] = $value;
        header("$key: $value");
    }

    public function json($data)
    {
        $this->setHeader('Content-Type', 'application/json');
        echo json_encode($data);
    }

    public function send($content)
    {
        echo $content;
    }
}