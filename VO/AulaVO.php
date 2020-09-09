<?php

class AulaVO {
    private $id;
    private $horario;
    private $turno;
    private $dia;
    private $fk_disciplina;
    private $fk_sala;
    public function __construct() {
        
    }
    function getId() {
        return $this->id;
    }

    function getHorario() {
        return $this->horario;
    }

    function getTurno() {
        return $this->turno;
    }

    function getDia() {
        return $this->dia;
    }

    function getFk_disciplina() {
        return $this->fk_disciplina;
    }

    function getFk_sala() {
        return $this->fk_sala;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setHorario($horario): void {
        $this->horario = $horario;
    }

    function setTurno($turno): void {
        $this->turno = $turno;
    }

    function setDia($dia): void {
        $this->dia = $dia;
    }

    function setFk_disciplina($fk_disciplina): void {
        $this->fk_disciplina = $fk_disciplina;
    }

    function setFk_sala($fk_sala): void {
        $this->fk_sala = $fk_sala;
    }


}
