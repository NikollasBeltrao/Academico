<?php


class DisciplinaAlunoVO {
    private $nota1;
    private $nota2;
    private $nota3;
    private $nota4;
    private $faltas;
    private $media;
    private $data;
    private $status;
    private $fk_aluno;
    private $fk_disciplina;
    
    public function __construct() {
        
    }
    function getFaltas() {
        return $this->faltas;
    }

    function setFaltas($faltas): void {
        $this->faltas = $faltas;
    }

        function getNota1() {
        return $this->nota1;
    }

    function getNota2() {
        return $this->nota2;
    }

    function getNota3() {
        return $this->nota3;
    }

    function getNota4() {
        return $this->nota4;
    }

    function getMedia() {
        return $this->media;
    }

    function getData() {
        return $this->data;
    }

    function getStatus() {
        return $this->status;
    }

    function getFk_aluno() {
        return $this->fk_aluno;
    }

    function getFk_disciplina() {
        return $this->fk_disciplina;
    }

    function setNota1($nota1): void {
        $this->nota1 = $nota1;
    }

    function setNota2($nota2): void {
        $this->nota2 = $nota2;
    }

    function setNota3($nota3): void {
        $this->nota3 = $nota3;
    }

    function setNota4($nota4): void {
        $this->nota4 = $nota4;
    }

    function setMedia($media): void {
        $this->media = $media;
    }

    function setData($data): void {
        $this->data = $data;
    }

    function setStatus($status): void {
        $this->status = $status;
    }

    function setFk_aluno($fk_aluno): void {
        $this->fk_aluno = $fk_aluno;
    }

    function setFk_disciplina($fk_disciplina): void {
        $this->fk_disciplina = $fk_disciplina;
    }


}
