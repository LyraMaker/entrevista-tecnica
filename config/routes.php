<?php

use LyraMaker\Entrevista\Router\Request;
use LyraMaker\Entrevista\Router\Response;
use LyraMaker\Entrevista\Router\Router;

$request = new Request();
$response = new Response();
$route = new Router();

$route->get('/',function(){
    echo "Foi!";
});

$route->get('/{nome}',function($nome){
    echo "Foi!";
    if(!is_null($nome)){
        echo "Sabia que {$nome} é um gatinho?";
    }
});

$route->dispatch($request->getMethod(),$_SERVER['REQUEST_URI']);