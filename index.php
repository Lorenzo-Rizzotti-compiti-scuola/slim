<?php

use controllers\AlunniController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

spl_autoload_register('psr4_autoloader');

function psr4_autoloader($class) {
    $class_path = str_replace('\\', '/', $class);

    $file =  __DIR__ . '/' . $class_path . '.php';

    if (file_exists($file)) {
        require $file;
    }
}

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

// Alunni
$app->get('/alunni', AlunniController::class . ':index');
$app->get('/alunni/{nome}', AlunniController::class . ':byName');
$app->get('/alunni_json', AlunniController::class . ':asJson');


$app->run();
