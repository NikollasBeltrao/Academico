<?php

class DisciplinaVO   {
    private $id;
    private $nome;
    private $cargaHoraria;
    private $horario;
    private $turno;
    private $sala;
    private $dia;
    private $fk_turma;
    private $fk_professor;
    private $fk_curso;
    function __construct() {
        
    }
    
    
    function getDia() {
        return $this->dia;
    }
    
    function setDia($dia): void {
        $this->dia = $dia;
    }

        function getCargaHoraria() {
        return $this->cargaHoraria;
    }

    function getHorario() {
        return $this->horario;
    }

    function getTurno() {
        return $this->turno;
    }

    function getSala() {
        return $this->sala;
    }

    function setCargaHoraria($cargaHoraria): void {
        $this->cargaHoraria = $cargaHoraria;
    }

    function setHorario($horario): void {
        $this->horario = $horario;
    }

    function setTurno($turno): void {
        $this->turno = $turno;
    }

    function setSala($sala): void {
        $this->sala = $sala;
    }

        
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getFk_turma() {
        return $this->fk_turma;
    }

    function getFk_professor() {
        return $this->fk_professor;
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

    function setFk_turma($fk_turma): void {
        $this->fk_turma = $fk_turma;
    }

    function setFk_professor($fk_professor): void {
        $this->fk_professor = $fk_professor;
    }

    function setFk_curso($fk_curso): void {
        $this->fk_curso = $fk_curso;
    }


}
