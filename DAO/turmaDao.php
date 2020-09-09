<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/connection/Connection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/CursoVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/TurmaVO.php';

function createTurma($turma) {
    try {
        $Conexao = Connection::getConnection();
        $query = $Conexao->query("INSERT INTO turma (nomeTurma, abreviacaoTurma, fk_curso) VALUES ('{$turma->getNome()}', '{$turma->getAbreviacao()}', '{$turma->getFk_curso()}')");
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
}

function listTurmas() {
    try {
        //$data = date('d/m/Y - H:i:s');
        $Conexao = Connection::getConnection();
        $query = $Conexao->query("SELECT * FROM turma AS t JOIN curso AS c ON t.fk_curso = c.idCurso");
        $turmas = new ArrayObject();
        if ($query->rowCount() > 0) {
            while ($row = $query->fetch()) {
                $curso = new CursoVO();
                $curso->setNome($row['nomeCurso']);
                $curso->setId($row['idCurso']);
                $curso->setAbreviacao($row['abreviacaoCurso']);
                
                $turma = new TurmaVO();
                $turma->setId($row['idTurma']);
                $turma->setNome($row['nomeTurma']);
                $turma->setAbreviacao($row['abreviacaoTurma']);
                $turma->setFk_curso($curso);
                $turmas->append($turma);
            }
        }
        return $turmas;
    } catch (Exception $e) {

        echo $e->getMessage();
        exit;
    }
}

function getTurma ($id){
    try{
       $Conexao = Connection::getConnection(); 
       $query = $Conexao->query("SELECT * FROM turma AS a JOIN curso AS c ON a.fk_curso = c.idCurso WHERE idTurma = '{$id}'");
       $turmas = new ArrayObject();
       if($query->rowCount() > 0){
           while ($row = $query->fetch()){                                
                
                $curso = new CursoVO();
                $curso->setId($row['idCurso']);
                $curso->setNome($row['nomeCurso']);
                $curso->setAbreviacao($row['abreviacaoCurso']);
                
                $turma = new TurmaVO();
                $turma->setId($row['idTurma']);
                $turma->setNome($row['nomeTurma']);
                $turma->setAbreviacao($row['abreviacaoTurma']);
                $turma->setFk_curso($curso);                
                $turmas->append($turma);                
            }
           // echo $query->columnCount();
           return ['true', $turmas[0]];
       }
       else {
           return ['false', []];
           
       }
    } catch (Exception $e) {
        echo $e->getMessage();
        return ['false', []];
    }
}
function updateTurma ($turma){
    try{
       $Conexao = Connection::getConnection(); 
       $query = $Conexao->query("Update turma SET nomeTurma = '{$turma->getNome()}'"
       . ", abreviacaoTurma = '{$turma->getAbreviacao()}' WHERE idTurma = '{$turma->getId()}'");
    } catch (Exception $e) {
        echo $e->getMessage();
        return $e->getMessage();
    }
}