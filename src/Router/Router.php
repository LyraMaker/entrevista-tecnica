<?php

namespace LyraMaker\Entrevista\Router;

use LyraMaker\Entrevista\Router\Request;
use LyraMaker\Entrevista\Router\Response;

class Router
{
    static array $routes;

    public function addRoute($method, $path, $handler)
    {
        self::$routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler
        ];
    }

    public function dispatch($requestMethod, $requestUri)
    {
        $uri = parse_url($requestUri, PHP_URL_PATH);

        foreach (self::$routes as $route) {
            $pattern = preg_replace('#\{[a-zA-Z_][a-zA-Z0-9_]*\}#', '([^/]+)', $route['path']);
            $pattern = "#^$pattern$#";

            if ($route['method'] === $requestMethod && preg_match($pattern, $uri, $matches)) {
                array_shift($matches);
                return call_user_func_array($route['handler'], $matches);
            }
        }

        http_response_code(404);
        echo json_encode(['erro' => 'Rota não encontrada']);
    }

    public function get($path, $handler)
    {
        $this->addRoute('GET', $path, $handler);
    }

    public function post($path, $handler)
    {
        $this->addRoute('POST', $path, $handler);
    }

    public function put($path, $handler)
    {
        $this->addRoute('PUT', $path, $handler);
    }

    public function delete($path, $handler)
    {
        $this->addRoute('DELETE', $path, $handler);
    }
}
