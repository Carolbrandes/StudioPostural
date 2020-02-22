<?php

namespace classes;

class Servicos
{

        public function cadastrar($pdo, $titulo, $descricao, $idCategoria, $foto)
        {
                if ($this->validaTexto($titulo) && $this->validaTexto($descricao) && $this->validaTexto($idCategoria)) {
                        $sql = $pdo->prepare("INSERT INTO `servico` VALUES (null, ?, ?, ?, ?)");
                        $nomefoto = $this->geraNomeFoto($foto);
                        if ($sql->execute(array($titulo, $descricao, $nomefoto, $idCategoria))) {
                                move_uploaded_file($foto["tmp_name"], "../../imagens-cadastro/" . $nomefoto);
                                return "Serviço Cadastrado!";
                        } else {
                                return "Serviço NÃO cadastrado!";
                        }
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
}
