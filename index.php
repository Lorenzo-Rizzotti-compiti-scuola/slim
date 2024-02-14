<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

require_once "Classe.php";

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});


$classe = new Classe();
$alunno1 = new Alunno("mario", "rossi", "20");
$alunno2 = new Alunno("luca", "bianchi", "21");
$alunno3 = new Alunno("paolo", "verdi", "22");
$classe->addAlunno($alunno1);
$classe->addAlunno($alunno2);
$classe->addAlunno($alunno3);

$app->get('/alunni', function (Request $request, Response $response, $args) use ($classe) {
    foreach ($classe->getAlunni() as $alunno) {
        $response->getBody()->write($alunno->getNome());
    }

    return $response;
});

$app->get('/alunni/{nome}', function (Request $request, Response $response, $args) use ($classe) {
    $nome = $args['nome'];
    $alunno = $classe->getAlunnoByNome($nome);
    if ($alunno === null) {
        $response->getBody()->write("Alunno non presente");
    } else {
        $response->getBody()->write($alunno->getNome() . " " . $alunno->getCognome() . " " . $alunno->getEta());
    }
    return $response;
});



$app->run();
