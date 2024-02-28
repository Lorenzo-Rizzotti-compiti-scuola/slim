<?php

namespace models;
class Alunno
{
    private string $nome;
    private string $cognome;
    private string $eta;

    /**
     * @param string $nome
     * @param string $cognome
     * @param string $eta
     */
    public function __construct(string $nome, string $cognome, string $eta)
    {
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->eta = $eta;
    }


    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getCognome(): string
    {
        return $this->cognome;
    }

    public function setCognome(string $cognome): void
    {
        $this->cognome = $cognome;
    }

    public function getEta(): string
    {
        return $this->eta;
    }

    public function setEta(string $eta): void
    {
        $this->eta = $eta;
    }


}
