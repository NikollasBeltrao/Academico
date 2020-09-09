<?php

class ProfessorVO {
    private $id;
    private $matricula;
    private $nome;
    private $email;
    private $senha;
    function __construct() {
       
    }
    function getMatricula() {
        return $this->matricula;
    }

    function setMatricula($matricula): void {
        $this->matricula = $matricula;
    }

        function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setNome($nome): void {
        $this->nome = $nome;
    }

    function setEmail($email): void {
        $this->email = $email;
    }

    function setSenha($senha): void {
        $this->senha = $senha;
    }


}
