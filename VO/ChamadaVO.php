<?php

class ChamadaVO {

    private $id;
    private $data;
    private $fk_professor;
    private $fk_aula;
    private $obs;

    public function __construct() {
        
    }
    function getObs() {
        return $this->obs;
    }

    function setObs($obs): void {
        $this->obs = $obs;
    }

        function getId() {
        return $this->id;
    }

    function getData() {
        return $this->data;
    }

    function getFk_professor() {
        return $this->fk_professor;
    }

    function getFk_aula() {
        return $this->fk_aula;
    }

    function setFk_aula($fk_aula): void {
        $this->fk_aula = $fk_aula;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setData($data): void {
        $this->data = $data;
    }

    function setFk_professor($fk_professor): void {
        $this->fk_professor = $fk_professor;
    }

}
