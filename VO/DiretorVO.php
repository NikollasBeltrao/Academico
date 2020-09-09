<?php

class DiretorVO {
    private $id;
    private $matricula;
    private $senha;
    private $nome;
    function __construct() {
    }
    function getId() {
        return $this->id;
    }

    function getMatricula() {
        return $this->matricula;
    }

    function getSenha() {
        return $this->senha;
    }

    function getNome() {
        return $this->nome;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setMatricula($matricula): void {
        $this->matricula = $matricula;
    }

    function setSenha($senha): void {
        $this->senha = $senha;
    }

    function setNome($nome): void {
        $this->nome = $nome;
    }


}
