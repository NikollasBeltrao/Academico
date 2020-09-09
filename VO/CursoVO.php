<?php

class CursoVO {
    private $id;
    private $nome;
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

    function setId($id): void {
        $this->id = $id;
    }

    function setNome($nome): void {
        $this->nome = $nome;
    }


}
