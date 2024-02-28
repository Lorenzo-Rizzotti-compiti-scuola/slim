<?php

namespace controllers;

use models\Alunno;
use models\Classe;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class AlunniController
{
    protected Classe $classe;

    public function __construct()
    {
        $this->classe = new Classe();
        $alunno1 = new Alunno("mario", "rossi", "20");
        $alunno2 = new Alunno("luca", "bianchi", "21");
        $alunno3 = new Alunno("paolo", "verdi", "22");
        $this->classe->addAlunno($alunno1);
        $this->classe->addAlunno($alunno2);
        $this->classe->addAlunno($alunno3);
    }

    public function index(Request $request, Response $response, $args): Response {
        foreach ($this->classe->getAlunni() as $alunno) {
            $response->getBody()->write($alunno->getNome());
        }

        return $response;
    }

    public function byName(Request $request, Response $response, $args): Response {
        $nome = $args['nome'];
        $alunno = $this->classe->getAlunnoByNome($nome);
        if ($alunno === null) {
            $response->getBody()->write("Alunno non presente");
        } else {
            $response->getBody()->write($alunno->getNome() . " " . $alunno->getCognome() . " " . $alunno->getEta());
        }
        return $response;
    }

    public function asJson(Request $request, Response $response, $args): Response {
        $alunni = [];
        foreach ($this->classe->getAlunni() as $alunno) {
            $alunni[] = [
                "nome" => $alunno->getNome(),
                "cognome" => $alunno->getCognome(),
                "eta" => $alunno->getEta()
            ];
        }
        $response = $response->withHeader('Content-type', 'application/json');
        $response->getBody()->write(json_encode($alunni));
        return $response;
    }

}
