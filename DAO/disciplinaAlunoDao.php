<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/connection/Connection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/DisciplinaAlunoVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/AlunoVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/DisciplinaVO.php';

function createDisciplinaAluno($idD, $idA) {
    try {
        //$data = date('d/m/Y - H:i:s');
        $Conexao = Connection::getConnection();
        $query = $Conexao->query("INSERT INTO alunoDisciplina (fk_aluno, fk_disciplina) VALUES ('{$idA}', '{$idD}')");
    } catch (Exception $e) {

        echo $e->getMessage();
        exit;
    }
}

function listDiscplinasAluno($from, $where) {
    try {
        //$data = date('d/m/Y - H:i:s');
        $Conexao = Connection::getConnection();
        $query = '';
        if ($from == "") {
            $query = $Conexao->query("SELECT * FROM alunoDisciplina AS ad JOIN aluno AS a ON ad.fk_aluno = a.idAluno "
                    . "JOIN disciplina AS d ON ad.fk_disciplina = d.idDisciplina " . $where);
        } else {
            $query = $Conexao->query($from . " " . $where);
        }

        $lista = new ArrayObject();
        if ($query->columnCount() > 0) {
            while ($row = $query->fetch()) {
                $disciplina = new DisciplinaVO();
                $disciplina->setNome($row['nomeDisciplina']);
                $disciplina->setId($row['idDisciplina']);
                $disciplina->setFk_curso($row['fk_curso']);
                $disciplina->setFk_professor($row['fk_professor']);
                $disciplina->setCargaHoraria($row['cargaHoraria']);

                $aluno = new AlunoVO();
                $aluno->setId($row['idAluno']);
                $aluno->setMatricula($row['matriculaAluno']);
                $aluno->setNome($row['nomeAluno']);
                $aluno->setSenha($row['senhaAluno']);
                $aluno->setFk_curso($row['fk_curso']);
                $aluno->setFk_turma($row['fk_turma']);

                $disciplinaAluno = new DisciplinaAlunoVO();
                $disciplinaAluno->setData($row['data']);
                $disciplinaAluno->setStatus($row['status']);
                $disciplinaAluno->setFk_aluno($aluno);
                $disciplinaAluno->setFk_disciplina($disciplina);
                $disciplinaAluno->setMedia($row['media']);
                $disciplinaAluno->setFaltas($row['faltas']);
                $disciplinaAluno->setNota1($row['nota1']);
                $disciplinaAluno->setNota2($row['nota2']);
                $disciplinaAluno->setNota3($row['nota3']);
                $disciplinaAluno->setNota4($row['nota4']);
                $lista->append($disciplinaAluno);
            }
        }
        return $lista;
    } catch (Exception $e) {

        echo $e->getMessage();
        exit;
    }
}

function alterarFaltas($faltas) {
    try {
        $Conexao = Connection::getConnection();
        $query = $Conexao->query("Update alunoDisciplina SET faltas = '{$faltas}'");
    } catch (Exception $exc) {
        echo $exc->getMessage();
    }
}
