<?php
namespace classes;

use PDO;

class CategoriaBlog{

        public static function todasCategorias($pdo){
                $sql = $pdo->prepare("SELECT * FROM `categoria_blog`");
               
                if( $sql->execute()){
                        return $sql->fetchAll(PDO::FETCH_ASSOC);
                }

        }
}