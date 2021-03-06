<?php

namespace classes;

use PDO;

class Artigo
{

        public function cadastrar($pdo, $titulo, $descricao, $idCategoria, $foto)
        {
                if ($this->validaTexto($titulo) && $this->validaTexto($descricao) && $this->validaTexto($idCategoria)) {
                        $sql = $pdo->prepare("INSERT INTO `artigo` VALUES (null, ?, ?, ?, ?)");
                        $nomefoto = $this->geraNomeFoto($foto);
                        $data = date('Y-m-d');


                        if ($sql->execute(array($titulo, $descricao, $nomefoto, $data))) {
                                move_uploaded_file($foto["tmp_name"], "../../imagens-cadastro/" . $nomefoto);

                                $ultimoId = $pdo->lastInsertId();

                                foreach ($idCategoria as $value) {
                                        $sql2 = $pdo->prepare("INSERT INTO `artigo_categoriablog` VALUES (null, ?, ?)");

                                        if ($sql2->execute(array($ultimoId, $value))) {
                                                return "Artigo Cadastrado!";
                                        }
                                }
                        } else {
                                return "Artigo NÃO cadastrado!";
                        }
                }
        }

        public static function todosArtigos($pdo)
        {
                $sql = $pdo->prepare("SELECT * FROM `artigo`");

                if ($sql->execute()) {
                        return $sql->fetchAll(PDO::FETCH_ASSOC);
                }
        }

        public static function servicoPorCategoria($pdo, $idCategoria)
        {
                $sql = $pdo->prepare("SELECT * FROM `servico` INNER JOIN `categoria_servico`ON  `servico`.id_categoria =`categoria_servico`.id_categoria WHERE `servico`.id_categoria  = $idCategoria");

                if ($sql->execute()) {
                        return $sql->fetchAll(PDO::FETCH_ASSOC);
                }
        }

        private function validaTexto($texto)
        {
                return $texto != '' ? true : false;
        }

        private function validaFoto($foto)
        {
                $ext = $this->extensaoFoto($foto);
                //Verificar se a extensão é inválida    
                if ($ext != "jpg" && $ext != "gif" && $ext != "png" && $ext != "jpeg") {
                        return false;
                } else {
                        //arquivo, ok
                        return true;
                }
        }

        private function extensaoFoto($foto)
        {
                //Extrair extensão do nome do arquivo
                $ext = explode(".", $foto["name"]); //[foto][ferias][jpg]
                $ext = array_reverse($ext); //[jpg][ferias][foto]
                $ext = $ext[0]; //jpg
                return $ext;
        }

        private function geraNomeFoto($foto)
        {
                if ($this->validaFoto($foto)) {
                        $ext = $this->extensaoFoto($foto);
                        //Gerando um nome para o arquivo
                        $nomefoto = date("YmdHis") . rand(1000, 9999) . "." . $ext;
                        return $nomefoto;
                }
        }

        public static function formatarData($data){
                return date("d/m/Y", strtotime($data));
        }
}
