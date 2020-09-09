<?php

class AlunoChamadaVO {
    private $status;
    private $fk_aluno;
    private $fk_chamada;
     
    public function __construct() {
        
    }
    function getStatus() {
        return $this->status;
    }

    function getFk_aluno() {
        return $this->fk_aluno;
    }

    function getFk_chamada() {
        return $this->fk_chamada;
    }

    function setStatus($status): void {
        $this->status = $status;
    }

    function setFk_aluno($fk_aluno): void {
        $this->fk_aluno = $fk_aluno;
    }

    function setFk_chamada($fk_chamada): void {
        $this->fk_chamada = $fk_chamada;
    }

}
