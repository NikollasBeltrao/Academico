<?php

class SalaVO {
    private $id;
    private $identificador;
    private $descricao;
    private $localizacao;
    public function __construct() {
        
    }
    function getId() {
        return $this->id;
    }

    function getIdentificador() {
        return $this->identificador;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getLocalizacao() {
        return $this->localizacao;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setIdentificador($identificador): void {
        $this->identificador = $identificador;
    }

    function setDescricao($descricao): void {
        $this->descricao = $descricao;
    }

    function setLocalizacao($localizacao): void {
        $this->localizacao = $localizacao;
    }


}
