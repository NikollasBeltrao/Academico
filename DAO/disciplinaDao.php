<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/connection/Connection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/DisciplinaVo.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/TurmaVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/CursoVo.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/ProfessorVo.php';

date_default_timezone_set('America/Sao_Paulo');

function createDisciplina($disciplina) {
    try {
        //$data = date('d/m/Y - H:i:s');
        $Conexao = Connection::getConnection();
        $query = $Conexao->query("INSERT INTO disciplina (nomeDisciplina, fk_curso, fk_turma, fk_professor, cargaHoraria) VALUES "
                . "('{$disciplina->getNome()}', '{$disciplina->getFk_curso()}', '{$disciplina->getFk_turma()}', '{$disciplina->getFk_professor()}'"
                . ", '{$disciplina->getCargaHoraria()}')");
    } catch (Exception $e) {

        echo $e->getMessage();
        exit;
    }
}

function listDiscplinas($from, $where) {
    try {
        //$data = date('d/m/Y - H:i:s');
        $Conexao = Connection::getConnection();
        $query = '';
        if ($from == "") {
            $query = $Conexao->query("SELECT * FROM disciplina AS d JOIN curso AS c ON d.fk_curso = c.idCurso JOIN turma AS t ON d.fk_turma = t.idTurma JOIN professor AS p ON d.fk_professor = p.idProfessor " . $where);
        } else {
            $query = $Conexao->query($from . " " . $where);
        }

        $disciplinas = new ArrayObject();
        if ($query->rowCount() > 0) {
            while ($row = $query->fetch()) {
                $curso = new CursoVO();
                $curso->setId($row['idCurso']);
                $curso->setNome($row['nomeCurso']);
                $curso->setAbreviacao($row['abreviacaoCurso']);

                $turma = new TurmaVO();
                $turma->setId($row['idTurma']);
                $turma->setNome($row['nomeTurma']);
                $turma->setAbreviacao($row['abreviacaoTurma']);
                $turma->setFk_curso($curso);

                $professor = new ProfessorVO();
                $professor->setId($row['idProfessor']);
                $professor->setMatricula($row['matriculaProfessor']);
                $professor->setEmail($row['emailProfessor']);
                $professor->setNome($row['nomeProfessor']);
                $professor->setSenha($row['senhaProfessor']);

                $disciplina = new DisciplinaVO();
                $disciplina->setId($row['idDisciplina']);
                $disciplina->setNome($row['nomeDisciplina']);
                $disciplina->setFk_turma($turma);
                $disciplina->setFk_curso($curso);
                $disciplina->setCargaHoraria($row['cargaHoraria']);
                $disciplina->setFk_professor($professor);

                $disciplinas->append($disciplina);
            }
        }
        return $disciplinas;
    } catch (Exception $e) {

        echo $e->getMessage();
        exit;
    }
}

function getDisciplina($id) {
    try {
        $Conexao = Connection::getConnection();
        $query = $Conexao->query("SELECT * FROM disciplina AS d JOIN curso AS c ON d.fk_curso = c.idCurso JOIN turma AS t ON d.fk_turma = t.idTurma"
                . " JOIN professor AS p ON d.fk_professor = p.idProfessor  WHERE idDisciplina = '{$id}'");
        $disciplinas = new ArrayObject();
        if ($query->rowCount() > 0) {
            while ($row = $query->fetch()) {
                $curso = new CursoVO();
                $curso->setId($row['idCurso']);
                $curso->setNome($row['nomeCurso']);
                $curso->setAbreviacao($row['abreviacaoCurso']);

                $turma = new TurmaVO();
                $turma->setId($row['idTurma']);
                $turma->setNome($row['nomeTurma']);
                $turma->setAbreviacao($row['abreviacaoTurma']);
                $turma->setFk_curso($curso);

                $professor = new ProfessorVO();
                $professor->setId($row['idProfessor']);
                $professor->setMatricula($row['matriculaProfessor']);
                $professor->setEmail($row['emailProfessor']);
                $professor->setNome($row['nomeProfessor']);
                $professor->setSenha($row['senhaProfessor']);

                $disciplina = new DisciplinaVO();
                $disciplina->setId($row['idDisciplina']);
                $disciplina->setNome($row['nomeDisciplina']);
                $disciplina->setFk_turma($turma);
                $disciplina->setFk_curso($curso);
                $disciplina->setCargaHoraria($row['cargaHoraria']);
                $disciplina->setFk_professor($professor);

                $disciplinas->append($disciplina);
            }
            return ['true', $disciplinas[0]];
        } else {
            return ['false', []];
        }
    } catch (Exception $e) {
        echo $e->getMessage();
        return ['false', []];
    }
}
function updateDisciplina ($disciplina){
    try{
       $Conexao = Connection::getConnection(); 
       $query = $Conexao->query("Update disciplina SET cargaHoraria = '{$disciplina->getCargaHoraria()}', nomeDisciplina = '{$disciplina->getNome()}',"
       . " fk_professor = '{$disciplina->getFk_professor()}'"
       . " WHERE idDisciplina = '{$disciplina->getId()}'");
    } catch (Exception $e) {
        echo $e->getMessage();
        return $e->getMessage();
    }
}