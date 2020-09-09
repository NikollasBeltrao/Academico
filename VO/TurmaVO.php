<?php

class TurmaVO {
    private $id;
    private $nome;
    private $fk_curso;
    private $abreviacao;
    function __construct() {
        
    }
    function getAbreviacao() {
        return $this->abreviacao;
    }

    function setAbreviacao($abreviacao): void {
        $this->abreviacao = $abreviacao;
    }
        
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getFk_curso() {
        return $this->fk_curso;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setNome($nome): void {
        $this->nome = $nome;
    }

    function setFk_curso($fk_curso): void {
        $this->fk_curso = $fk_curso;
    }


}
