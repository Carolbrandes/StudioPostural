<?php

namespace classes;

class Db{
        private static $pdo;
        const HOST = 'localhost';
        const DB = 'studiopostural';
        const USER = 'root';
        const PASS = '';

        public static function conectar(){
                if(self::$pdo == null){
                        try{
                                self::$pdo = new \PDO('mysql:host='.self::HOST.';dbname='.self::DB, self::USER, self::PASS, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                        }catch(\Exception $erro){
                                echo 'Erro de conexão com banco de dados!';
                        }
                }
                
                return self::$pdo;
                
        }

}
