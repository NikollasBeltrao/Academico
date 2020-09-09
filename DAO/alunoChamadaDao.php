<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/ChamadaVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/AlunoVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/connection/Connection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/AlunoChamadaVO.php';


function createAlunoChamada($alunoChamada) {
    try {
        $Conexao = Connection::getConnection();
        $query = $Conexao->query("INSERT INTO alunoChamada ( status, fk_chamada, fk_aluno) VALUES ('{$alunoChamada->getStatus()}', '{$alunoChamada->getFk_chamada()}', '{$alunoChamada->getFk_aluno()}')");
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
}

function listAlunoChamada($from, $where) {
    try {
        //$data = date('d/m/Y - H:i:s');
        $Conexao = Connection::getConnection();
        $query = '';
        if ($from == "") {
            $query = $Conexao->query("SELECT * FROM alunochamada AS ac JOIN aluno AS a ON ac.fk_aluno = a.idAluno "
                    . "JOIN chamada AS c ON ac.fk_chamada = c.idChamada ".$where);
        } else {
            $query = $Conexao->query($from . " " . $where);
        }
        $alunoChamadas = new ArrayObject();
        if ($query->rowCount() > 0) {
            while ($row = $query->fetch()) {
                $chamada = new ChamadaVO();
                $chamada->setId($row['idChamada']);
                $chamada->setData($row['dataChamada']);
                $chamada->setObs($row['observacaoChamada']);
                $chamada->setFk_aula($row['fk_aula']);
                $chamada->setFk_professor($row['fk_professor']);
                
                $aluno = new AlunoVO();
                $aluno->setId($row['idAluno']);
                $aluno->setMatricula($row['matriculaAluno']);
                $aluno->setEmail($row['emailAluno']);
                $aluno->setNome($row['nomeAluno']);
                $aluno->setSenha($row['senhaAluno']);
                $aluno->setFk_curso($row['fk_curso']);
                $aluno->setFk_turma($row['fk_turma']); 
                
                $alunoChamada = new AlunoChamadaVO();
                $alunoChamada->setFk_aluno($aluno);
                $alunoChamada->setFk_chamada($chamada);
                $alunoChamada->setStatus($row['status']);
                
                $alunoChamadas->append($alunoChamada);
            }
            return ['true', $alunoChamadas];
        }
        else {
            return ['false', []];
        }
        
    } catch (Exception $e) {
        return ['false', []];
        echo $e->getMessage();
        exit;
    }
}
