<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/DAO/salaDao.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/SalaVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/connection/Connection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/ChamadaVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/ProfessorVo.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/DisciplinaVo.php';
date_default_timezone_set('America/Sao_Paulo');



function createChamada($chamada) {
    try {
        $data = date('d/m/Y');
        $Conexao = Connection::getConnection();
        $query = $Conexao->query("INSERT INTO chamada (dataChamada, fk_aula, fk_professor, observacaoChamada) VALUES"
                . " ( '{$data}', '{$chamada->getFk_aula()}', '{$chamada->getFk_professor()}', '{$chamada->getObs()}')");
        return $Conexao->lastInsertId();
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
}

function listChamada($from, $where) {
    try {
        //$data = date('d/m/Y - H:i:s');
        $Conexao = Connection::getConnection();
        $query = '';
        if ($from == "") {
            $query = $Conexao->query("SELECT * FROM chamada AS c JOIN professor AS p ON c.fk_professor = p.idProfessor JOIN aula AS a ON c.fk_aula = a.idAula ".$where);
        } else {
            $query = $Conexao->query($from . " " . $where);
        }
        $chamadas = new ArrayObject();
        if ($query->rowCount() > 0) {
            while ($row = $query->fetch()) {
                $professor = new ProfessorVO();
                $professor->setId($row['idProfessor']);
                $professor->setMatricula($row['matriculaProfessor']);
                $professor->setEmail($row['emailProfessor']);
                $professor->setNome($row['nomeProfessor']);
                $professor->setSenha($row['senhaProfessor']);

                $aula = new AulaVO();
                $aula->setDia($row['diaAula']);
                $aula->setFk_disciplina($row['fk_disciplina']);
                $aula->setFk_sala($row['fk_sala']);
                $aula->setHorario($row['horarioAula']);
                $aula->setId($row['idAula']);
                $aula->setTurno($row['turnoAula']);

                $chamada = new ChamadaVO();
                $chamada->setId($row['idChamada']);
                $chamada->setData($row['dataChamada']);
                $chamada->setObs($row['observacaoChamada']);
                $chamada->setFk_aula($aula);
                $chamada->setFk_professor($professor);
                $chamadas->append($chamada);
            }
            return $chamadas;
        }
        return 'false';        
    } catch (Exception $e) {

        echo $e->getMessage();
        exit;
    }
}
