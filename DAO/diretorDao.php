<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/connection/Connection.php';
require_once $_SERVER['DOCUMENT_ROOT']. '/ProjetoHelder/VO/DiretorVO.php';
function authDiretor ($matricula){
    try{
       $Conexao = Connection::getConnection(); 
       $query = $Conexao->query("SELECT * FROM diretor WHERE matriculaDiretor = '{$matricula}'");
       $diretores = new ArrayObject();
       if($query->rowCount() > 0){
           while ($row = $query->fetch()){                                
                $diretor = new DiretorVO();
                $diretor->setId($row['idDiretor']);
                $diretor->setMatricula($row['matriculaDiretor']);
                $diretor->setNome($row['nomeDiretor']);
                $diretor->setSenha($row['senhaDiretor']);    
                
                $diretores->append($diretor);                
            }
           // echo $query->columnCount();
           return [true, $diretores];
       }
       else {
           return [false, []];
           
       }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
function getDiretor ($id){
    try{
       $Conexao = Connection::getConnection(); 
       $query = $Conexao->query("SELECT * FROM diretor WHERE idDiretor = '{$id}'");
       $diretores = new ArrayObject();
       if($query->rowCount() > 0){
           while ($row = $query->fetch()){                                
                $diretor = new DiretorVO();
                $diretor->setId($row['idDiretor']);
                $diretor->setMatricula($row['matriculaDiretor']);
                $diretor->setNome($row['nomeDiretor']);
                $diretor->setSenha($row['senhaDiretor']);    
                
                $diretores->append($diretor);                
            }
           // echo $query->columnCount();
           return [true, $diretores[0]];
       }
       else {
           return [false, []];
           
       }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}