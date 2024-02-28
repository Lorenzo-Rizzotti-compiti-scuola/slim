<?php

namespace models;

class Classe
{
    /**
     * @var Alunno[] $students
     */
    private array $alunni = [];

    public function addAlunno(Alunno $alunno): void
    {
        $this->alunni[] = $alunno;
    }

    public function getAlunni(): array
    {
        return $this->alunni;
    }

    public function getAlunnoByNome(string $nome): ?Alunno
    {
        foreach ($this->alunni as $alunno) {
            if ($alunno->getNome() === $nome) {
                return $alunno;
            }
        }
        return null;
    }

}
