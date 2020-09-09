<?php

class AlunoVO {
    private $matricula;
    private $nome;
    private $cpf;
    private $rg;
    private $idade;
    private $dataNas;
    private $email;
    private $telefone;
    private $fk_turma;
    private $fk_curso;
    private $senha;
    private $id;
    function __construct() {
        
    }
    function getSenha() {
        return $this->senha;
    }

    function getId() {
        return $this->id;
    }

    function setSenha($senha): void {
        $this->senha = $senha;
    }

    function setId($id): void {
        $this->id = $id;
    }

        function getMatricula() {
        return $this->matricula;
    }

    function getNome() {
        return $this->nome;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getRg() {
        return $this->rg;
    }

    function getIdade() {
        return $this->idade;
    }

    function getDataNas() {
        return $this->dataNas;
    }

    function getEmail() {
        return $this->email;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getFk_turma() {
        return $this->fk_turma;
    }

    function getFk_curso() {
        return $this->fk_curso;
    }

    function setMatricula($matricula): void {
        $this->matricula = $matricula;
    }

    function setNome($nome): void {
        $this->nome = $nome;
    }

    function setCpf($cpf): void {
        $this->cpf = $cpf;
    }

    function setRg($rg): void {
        $this->rg = $rg;
    }

    function setIdade($idade): void {
        $this->idade = $idade;
    }

    function setDataNas($dataNas): void {
        $this->dataNas = $dataNas;
    }

    function setEmail($email): void {
        $this->email = $email;
    }

    function setTelefone($telefone): void {
        $this->telefone = $telefone;
    }

    function setFk_turma($fk_turma): void {
        $this->fk_turma = $fk_turma;
    }

    function setFk_curso($fk_curso): void {
        $this->fk_curso = $fk_curso;
    }


}
