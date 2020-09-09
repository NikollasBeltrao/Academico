<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/connection/Connection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/CursoVO.php';

function createCurso($curso) {
    try {
        $Conexao = Connection::getConnection();
        $query = $Conexao->query("INSERT INTO curso (nomeCurso, abreviacaoCurso) VALUES ('{$curso->getNome()}', '{$curso->getAbreviacao()}')");
    } catch (Exception $e) {

        echo $e->getMessage();
        exit;
    }
}

function listCursos() {
    try {
        $Conexao = Connection::getConnection();
        $query = $Conexao->query("SELECT * FROM curso");
        $cursos = new ArrayObject();
        if ($query->rowCount() > 0) {
            while ($row = $query->fetch()) {
                $curso = new CursoVO();
                $curso->setId($row['idCurso']);
                $curso->setNome($row['nomeCurso']);
                $curso->setAbreviacao($row['abreviacaoCurso']);
                $cursos->append($curso);
            }
            return $cursos;
        }
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
}

function getCurso($id) {
    try {
        $Conexao = Connection::getConnection();
        $query = $Conexao->query("SELECT * FROM curso WHERE idCurso = '{$id}'");
        $cursos = new ArrayObject();
        if ($query->rowCount() > 0) {
            while ($row = $query->fetch()) {
                $curso = new CursoVO();
                $curso->setId($row['idCurso']);
                $curso->setNome($row['nomeCurso']);
                $curso->setAbreviacao($row['abreviacaoCurso']);
                $cursos->append($curso);
            }
            return ['true', $cursos[0]];
        } else {
            return ['false', []];
        }
    } catch (Exception $e) {
        return ['false', []];
        echo $e->getMessage();
        exit;
    }
}

function updateCurso ($curso){
    try{
       $Conexao = Connection::getConnection(); 
       $query = $Conexao->query("Update curso SET abreviacaoCurso = '{$curso->getAbreviacao()}', nomeCurso = '{$curso->getNome()}'"
       . " WHERE idCurso = '{$curso->getId()}'");
    } catch (Exception $e) {
        echo $e->getMessage();
        return $e->getMessage();
    }
}