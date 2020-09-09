<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/DAO/salaDao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/SalaVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/connection/Connection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/AulaVO.php';


function createAula($aula) {
    try {
        $Conexao = Connection::getConnection();
        $query = $Conexao->query("INSERT INTO aula (horarioAula, turnoAula, diaAula, fk_turma, fk_disciplina, fk_sala) VALUES"
                . " ('{$aula->getHorario()}', '{$aula->getTurno()}', '{$aula->getDia()}',"
                . " '{$aula->getFk_turma()}', '{$aula->getfk_disciplina()}', '{$aula->getFk_sala()}')");
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
}

function listAulas($from, $where) {
    try {
        //$data = date('d/m/Y - H:i:s');
        $Conexao = Connection::getConnection();
        $query = '';
        if ($from == "") {
            $query = $Conexao->query("SELECT * FROM aula AS a JOIN disciplina AS d ON a.fk_disciplina = d.idDisciplina JOIN sala AS s ON a.fk_sala = s.idSala ".$where);
        } else {
            $query = $Conexao->query($from . " " . $where);
        }
        $aulas = new ArrayObject();
        if ($query->rowCount() > 0) {
            while ($row = $query->fetch()) {
                $disciplina = new DisciplinaVO();
                $disciplina->setId($row['idDisciplina']);
                $disciplina->setNome($row['nomeDisciplina']);
                $disciplina->setFk_turma($row['fk_turma']);
                $disciplina->setFk_curso($row['fk_curso']);
                $disciplina->setCargaHoraria($row['cargaHoraria']);
                $disciplina->setFk_professor($row['fk_professor']);

                $sala = new SalaVO();
                $sala->setDescricao($row['descricao']);
                $sala->setId($row['idSala']);
                $sala->setIdentificador($row['identificador']);
                $sala->setLocalizacao($row['localizacao']);
                


                $aula = new AulaVO();
                $aula->setDia($row['diaAula']);
                $aula->setFk_disciplina($disciplina);
                $aula->setFk_sala($sala);
                $aula->setHorario($row['horarioAula']);
                $aula->setId($row['idAula']);
                $aula->setTurno($row['turnoAula']);
                $aulas->append($aula);
            }
        }
        return $aulas;
    } catch (Exception $e) {

        echo $e->getMessage();
        exit;
    }
}
