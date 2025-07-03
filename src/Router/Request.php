<?php

namespace LyraMaker\Entrevista\Router;

class Request
{
    protected ?array $data = [];
    protected ?array $query = [];
    protected ?array $params = [];
    protected ?array $header = [];
    protected string $fullUrl;
    protected string $method;
    protected string $uri;
    protected string $protocol;


    public function __construct()
    {
        $this->setMethod($_SERVER['REQUEST_METHOD']);
        $this->setUri(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        $this->setQuery($_GET);
        $this->setParams($_POST);
        $this->setHeader(getallheaders());
        $this->setProtocol(isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.1');
        $this->setFullUrl((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' ? 'https' : 'http') . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}");
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    public function getQuery(?string $key = null)
    {

        if ($key === null) {
            return $this->query;
        }
        return $this->query[$key] ?? null;
    }

    public function setQuery($query)
    {
        $this->query = $query;
        return $this;
    }

    public function getParams(?string $key = null)
    {
        if ($key === null) {
            return $this->params;
        }
        return $this->params[$key] ?? null;
    }

    public function setParams($parms)
    {
        $this->params = $parms;
        return $this;
    }

    public function getHeader()
    {
        return $this->header;
    }

    public function setHeader($header)
    {
        $this->header = $header;
        return $this;
    }

    public function getFullUrl()
    {
        return $this->fullUrl;
    }

    public function setFullUrl($fullUrl)
    {
        $this->fullUrl = $fullUrl;
        return $this;
    }

    public function getProtocol()
    {
        return $this->protocol;
    }

    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;
        return $this;
    }

    public function getUri()
    {
        return $this->uri;
    }

    public function setUri($uri)
    {
        $this->uri = $uri;
        return $this;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }
}
