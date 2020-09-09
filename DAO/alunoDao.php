<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/connection/Connection.php';
require_once $_SERVER['DOCUMENT_ROOT']. '/ProjetoHelder/VO/AlunoVO.php';
require_once $_SERVER['DOCUMENT_ROOT']. '/ProjetoHelder/VO/CursoVO.php';
require_once $_SERVER['DOCUMENT_ROOT']. '/ProjetoHelder/VO/TurmaVO.php';
require_once $_SERVER['DOCUMENT_ROOT']. '/ProjetoHelder/DAO/cursoDao.php';
date_default_timezone_set('America/Sao_Paulo');

function authAluno ($matricula){
    try{
       $Conexao = Connection::getConnection(); 
       $query = $Conexao->query("SELECT * FROM aluno AS a JOIN curso AS c ON a.fk_curso = c.idCurso JOIN turma AS t ON a.fk_turma = t.idTurma WHERE matriculaAluno = '{$matricula}'");
       $alunos = new ArrayObject();
       if($query->rowCount() > 0){
           while ($row = $query->fetch()){
                $turma = new TurmaVO();
                $turma->setId($row['idTurma']);
                $turma->setNome($row['nomeTurma']);
                $turma->setAbreviacao($row['abreviacaoTurma']);
                $turma->setFk_curso($row['fk_curso']);
                
                $curso = new CursoVO();
                $curso->setId($row['idCurso']);
                $curso->setAbreviacao($row['abreviacaoCurso']);
                $curso->setNome($row['nomeCurso']);
                
                $aluno = new AlunoVO();
                $aluno->setId($row['idAluno']);
                $aluno->setMatricula($row['matriculaAluno']);
                $aluno->setNome($row['nomeAluno']);
                $aluno->setSenha($row['senhaAluno']);
                $aluno->setFk_curso($row['fk_curso']);
                $aluno->setFk_turma($row['fk_turma']);
                
                $alunos->append($aluno);                
            }
           // echo $query->columnCount();
           return [true, $alunos];
       }
       else {
           return [false, []];
           
       }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
function createAluno($aluno) {      
    try {
        //$data = date('d/m/Y - H:i:s');        
        $Conexao = Connection::getConnection();
        $queuyid = $Conexao->query("SELECT AUTO_INCREMENT FROM information_schema.tables WHERE table_name = 'aluno' AND table_schema = 'sistemaacademico2'");
        $matricula = date('Y');
        $dataI = (int) date('m');
        if($dataI <= 6){
            $matricula = $matricula.'1';
        }
        else {
            $matricula = $matricula.'2';
        }
        $lastId = str_pad($queuyid->fetch()[0] , 4 , '0' , STR_PAD_LEFT);          
        $cursoSigla = getCurso($aluno->getFk_curso())[1]->getAbreviacao();
        $matricula = $matricula.$cursoSigla.$lastId;        
        $query = $Conexao->query("INSERT INTO aluno(matriculaAluno, nomeAluno, emailAluno, senhaAluno, fk_turma, fk_curso) VALUES "
            . "('{$matricula}', '{$aluno->getNome()}', '{$aluno->getEmail()}', '123', '{$aluno->getFk_turma()}', '{$aluno->getFk_curso()}')");                   
        return $Conexao->lastInsertId();
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
}
function listAlunos(){
    try {
        //$data = date('d/m/Y - H:i:s');
        $Conexao = Connection::getConnection();
        $query = $Conexao->query("SELECT * FROM aluno AS a JOIN curso AS c ON a.fk_curso = c.idCurso JOIN turma AS t ON a.fk_turma = t.idTurma ORDER BY nomeAluno");      
        $alunos = new ArrayObject();
        if($query->columnCount() > 0) {
            while ($row = $query->fetch()){
                $turma = new TurmaVO();
                $turma->setId($row['idTurma']);
                $turma->setNome($row['nomeTurma']);
                $turma->setAbreviacao($row['abreviacaoTurma']);
                $turma->setFk_curso($row['fk_curso']);
                
                $curso = new CursoVO();
                $curso->setId($row['idCurso']);
                $curso->setAbreviacao($row['abreviacaoCurso']);
                $curso->setNome($row['nomeCurso']);
                
                $aluno = new AlunoVO();
                $aluno->setId($row['idAluno']);
                $aluno->setMatricula($row['matriculaAluno']);
                $aluno->setEmail($row['emailAluno']);
                $aluno->setNome($row['nomeAluno']);
                $aluno->setSenha($row['senhaAluno']);
                $aluno->setFk_curso($curso);
                $aluno->setFk_turma($turma); 
                $alunos->append($aluno);                
            }        
        }      
        return $alunos;
    } catch (Exception $e) {

        echo $e->getMessage();
        exit;
    }
}

function getAluno ($id){
    try{
       $Conexao = Connection::getConnection(); 
       $query = $Conexao->query("SELECT * FROM aluno AS a JOIN curso AS c ON a.fk_curso = c.idCurso JOIN turma AS t ON a.fk_turma = t.idTurma WHERE idAluno = '{$id}'");
       $alunos = new ArrayObject();
       if($query->rowCount() > 0){
           while ($row = $query->fetch()){ 
               
                $turma = new TurmaVO();
                $turma->setId($row['idTurma']);
                $turma->setNome($row['nomeTurma']);
                $turma->setAbreviacao($row['abreviacaoTurma']);
                $turma->setFk_curso($row['fk_curso']);
                
                $curso = new CursoVO();
                $curso->setId($row['idCurso']);
                $curso->setAbreviacao($row['abreviacaoCurso']);
                $curso->setNome($row['nomeCurso']);
                
                $aluno = new AlunoVO();
                $aluno->setId($row['idAluno']);
                $aluno->setMatricula($row['matriculaAluno']);
                $aluno->setEmail($row['emailAluno']);
                $aluno->setNome($row['nomeAluno']);
                $aluno->setSenha($row['senhaAluno']);
                $aluno->setFk_curso($curso);
                $aluno->setFk_turma($turma);   
                
                $alunos->append($aluno);                
            }
           // echo $query->columnCount();
           return ['true', $alunos[0]];
       }
       else {
           return ['false', []];
           
       }
    } catch (Exception $e) {
        echo $e->getMessage();
        return ['false', []];
    }
}
function updateAluno ($aluno){
    try{
       $Conexao = Connection::getConnection(); 
       $query = $Conexao->query("Update aluno SET matriculaAluno = '{$aluno->getMatricula()}', nomeAluno = '{$aluno->getNome()}'"
       . ", emailAluno = '{$aluno->getEmail()}' WHERE idAluno = '{$aluno->getId()}'");
    } catch (Exception $e) {
        echo $e->getMessage();
        return $e->getMessage();
    }
}
function deleteAluno ($id){
    try{
       $Conexao = Connection::getConnection(); 
       $queuy1 = $Conexao->query("DELETE FROM alunodisciplina WHERE fk_aluno = '{$id}'");
       $query = $Conexao->query("DELETE FROM aluno WHERE idAluno = '{$id}'");
    } catch (Exception $e) {
        echo $e->getMessage();
        return $e->getMessage();
    }
}