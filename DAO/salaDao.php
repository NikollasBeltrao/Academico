<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/connection/Connection.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ProjetoHelder/VO/SalaVO.php';

function createSala($sala) {
    try {
        $Conexao = Connection::getConnection();
        $query = $Conexao->query("INSERT INTO sala (identificador, descricao, localizacao) VALUES ('{$sala->getIdentificador()}',"
        . " '{$sala->getDescricao()}', '{$sala->getLocalizacao()}')");
    } catch (Exception $e) {
        echo $e->getMessage();
        exit;
    }
}

function listSalas() {
    try {
        //$data = date('d/m/Y - H:i:s');
        $Conexao = Connection::getConnection();
        $query = $Conexao->query("SELECT * FROM sala");
        $salas = new ArrayObject();
        if ($query->rowCount() > 0) {
            while ($row = $query->fetch()) {
                $sala = new SalaVO();
                $sala->getDescricao($row['descricao']);
                $sala->getId($row['idSala']);
                $sala->getIdentificador($row['identificador']);
                $sala->getLocalizacao($row['localizacao']);
                $salas->append($sala);
            }
        }
        return $salas;
    } catch (Exception $e) {

        echo $e->getMessage();
        exit;
    }
}
