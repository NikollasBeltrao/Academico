<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/connection/Connection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/ProfessorVO.php';
date_default_timezone_set('America/Sao_Paulo');
function createProfessor($professor) {
    try {
        $Conexao = Connection::getConnection();
        $queuyid = $Conexao->query("SELECT AUTO_INCREMENT FROM information_schema.tables WHERE table_name = 'professor' AND table_schema = 'sistemaacademico2'");
        $matricula = date('Y');
        $dataI = (int) date('m');
        if($dataI <= 6){
            $matricula = $matricula.'1';
        }
        else {
            $matricula = $matricula.'2';
        }
        $lastId = str_pad($queuyid->fetch()[0] , 4 , '0' , STR_PAD_LEFT);          
        $matricula = $matricula."PF".$lastId; 
       
        $query = $Conexao->query("INSERT INTO professor (matriculaProfessor, nomeProfessor, senhaProfessor, emailProfessor) VALUES "
                . "('{$matricula}', '{$professor->getNome()}', '123', '{$professor->getEmail()}')");
    } catch (Exception $e) {

        echo $e->getMessage();
        exit;
    }
}

function listProfessores() {
    try {
        $Conexao = Connection::getConnection();
        $query = $Conexao->query("SELECT * FROM professor");
        $professores = new ArrayObject();
        if ($query->rowCount() > 0) {
            while ($row = $query->fetch()) {
                $professor = new ProfessorVO();
                $professor->setId($row['idProfessor']);
                $professor->setMatricula($row['matriculaProfessor']);
                $professor->setEmail($row['emailProfessor']);
                $professor->setNome($row['nomeProfessor']);
                $professor->setSenha($row['senhaProfessor']);
                $professores->append($professor);
            }
        }
        return $professores;
    } catch (Exception $e) {

        echo $e->getMessage();
        exit;
    }
}

function authProfessor($matricula) {
    try {
        $Conexao = Connection::getConnection();
        $query = $Conexao->query("SELECT * FROM professor WHERE matriculaProfessor = '{$matricula}'");
        $professores = new ArrayObject();
        if ($query->rowCount() > 0) {
            while ($row = $query->fetch()) {
                $professor = new ProfessorVO();
                $professor->setId($row['idProfessor']);
                $professor->setMatricula($row['matriculaProfessor']);
                $professor->setNome($row['nomeProfessor']);
                $professor->setEmail($row['emailProfessor']);
                $professor->setSenha($row['senhaProfessor']);
                $professores->append($professor);
            }
            // echo $query->columnCount();
            return [true, $professores];
        } else {
            return [false, []];
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function getProfessor($id) {
    try {
        $Conexao = Connection::getConnection();
        $query = $Conexao->query("SELECT * FROM professor WHERE idProfessor = '{$id}'");
        $professores = new ArrayObject();
        if ($query->rowCount() > 0) {
            while ($row = $query->fetch()) {

                $professor = new ProfessorVO();
                $professor->setId($row['idProfessor']);
                $professor->setMatricula($row['matriculaProfessor']);
                $professor->setNome($row['nomeProfessor']);
                $professor->setEmail($row['emailProfessor']);
                $professor->setSenha($row['senhaProfessor']);
                $professores->append($professor);

            }
            // echo $query->columnCount();
            return ['true', $professores[0]];
        } else {
            return ['false', []];
        }
    } catch (Exception $e) {
        echo $e->getMessage();
        return ['false', []];
    }
}

function updateProfessor($professor) {
    try {
        $Conexao = Connection::getConnection();
        $query = $Conexao->query("Update professor SET matriculaProfessor = '{$professor->getMatricula()}', nomeProfessor = '{$professor->getNome()}'"
                . ", emailProfessor = '{$professor->getEmail()}' WHERE idProfessor = '{$professor->getId()}'");
    } catch (Exception $e) {
        echo $e->getMessage();
        return $e->getMessage();
    }
}
