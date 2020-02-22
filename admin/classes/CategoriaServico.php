<?php
namespace classes;

use PDO;

class CategoriaServico{

        public static function todasCategorias($pdo){
                $sql = $pdo->prepare("SELECT * FROM `categoria_servico`");
               
                if( $sql->execute()){
                        return $sql->fetchAll(PDO::FETCH_ASSOC);
                }

        }
}