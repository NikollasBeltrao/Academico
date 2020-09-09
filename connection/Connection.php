<?php

class Connection {
    private static $connection;
    
    private function __construct(){}
   
    public static function getConnection() {
         
        try {
            if(!isset($connection)){
                $connection =  new PDO('mysql:dbname=sistemaacademico2;host=localhost', 'root', '');
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return $connection;
         } catch (PDOException $e) {
            $mensagem = "Drivers disponiveis: " . implode(",", PDO::getAvailableDrivers());
            $mensagem .= "\nErro: " . $e->getMessage();
            throw new Exception($mensagem);
         }
     }
}
