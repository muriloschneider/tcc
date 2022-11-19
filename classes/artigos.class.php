<?php

    include_once "../conf/Conexao.php";
    include_once "../conf/conf.inc.php";
    include_once "../classes/metodos.class.php";

    class Artigos extends Metodos{
        //cria as variáveis como privadas.
        private $nome_art;
        private $texto;
        private $infos;
        private $ficheiroI;
        private $ficheiroII;
        private $idusuario;

        //constrói as variáveis.
        public function __construct($id, $nome_art, $texto, $infos, $ficheiroI, $ficheiroII, $idusuario){
            parent::__construct($id);
            $this->setnome_art($nome_art);
            $this->settexto($texto);
            $this->setinfos($infos);
            $this->setficheiroI($ficheiroI);
            $this->setficheiroII($ficheiroII);
            $this->setidusuario($idusuario);
        }

        //busca e seta os valores das variáveis.

        public function getnome_art(){ return $this->nome_art; }
        public function setnome_art($nome_art){ $this->nome_art = $nome_art; }      

        public function gettexto() { return $this->texto; }
        public function settexto($texto) { $this->texto = $texto; }

        public function getinfos() { return $this->infos; }
        public function setinfos($infos) { $this->infos = $infos; }

        public function getficheiroI() { return $this->ficheiroI; }
        public function setficheiroI($ficheiroI) { $this->ficheiroI = $ficheiroI; }

        public function getficheiroII() { return $this->ficheiroII; }
        public function setficheiroII($ficheiroII) { $this->ficheiroII = $ficheiroII; }
        
        public function getidusuario() { return $this->idusuario; }
        public function setidusuario($idusuario) { $this->idusuario = $idusuario; }

        public function __toString() {
            return  "ID de artigo: ".$this->getId()."<br>".
                    "Nome: ".$this->getnome_art()."<br>".
                    "texto: ".$this->gettexto()."<br>".
                    "infos: ".$this->getinfos()."<br>".
                    "ficheiro I: ".$this->getficheiroI()."<br>".
                    "ficheiro II: ".$this->getficheiroII()."<br>".
                    "idusuario: ".$this->getidusuario()."<br>";
        }

        public function inserir(){
            $sql = 'INSERT INTO odisseia.artigos (nome_art, texto, infos, ficheiroI, ficheiroII, idusuario) 
            VALUES(:nome_art, :texto, :infos, :ficheiroI, :ficheiroII, :idusuario)';
            $parametros = array(":nome_art"=>$this->getnome_art(), 
                                ":texto"=>$this->gettexto(),
                                ":infos"=>$this->getinfos(),
                                ":ficheiroI"=>$this->getficheiroI(), 
                                ":ficheiroII"=>$this->getficheiroII(),
                                ":idusuario"=>$this->getidusuario()
                            
                            
                            );
            return parent::executaComando($sql,$parametros);
        }

        public function excluir(){
            $sql = 'DELETE FROM odisseia.artigos WHERE idartigos = :idartigos';
            $parametros = array(":idartigos"=>$this->getId());
            return parent::executaComando($sql,$parametros);
        }

        public function editar(){
            $sql = 'UPDATE odisseia.artigos SET nome_art = :nome_art, texto = :texto, infos = :infos, ficheiroI = :ficheiroI, ficheiroII = :ficheiroII, idusuario = :idusuario
            WHERE idartigos = :idartigos';
            $parametros = array(":nome_art"=>$this->getnome_art(),
                                ":texto"=>$this->gettexto(),
                                ":infos"=>$this->getinfos(),
                                ":ficheiroI"=>$this->getficheiroI(),
                                ":ficheiroII"=>$this->getficheiroII(),
                                ":idusuario"=>$this->getidusuario(),
                                ":idartigos"=>$this->getId());
            return parent::executaComando($sql,$parametros);
        }

        public static function listar($buscar = 0, $procurar = ""){
            //cria conexão e seleciona as informações do usário.
            $pdo = Conexao::getInstance();
            $consulta = "SELECT * FROM artigos";
            if($buscar > 0)
                switch($buscar){
                    case(1): $consulta .= " WHERE idartigos = :procurar"; break;
                    case(2): $consulta .= " WHERE nome_art LIKE :procurar"; "%".$procurar .="%"; break;

                }

            if ($buscar > 0)
                $parametros = array(':procurar'=>$procurar);
            else 
                $parametros = array();
            return parent::buscar($consulta, $parametros);
        }
        
        public static function dados($id){
            $sql = "SELECT * FROM artigos WHERE idartigos = :idartigos";
            $parametros = array(":idartigos"=>$id);
            return parent::buscar($sql, $parametros);
        }
    
    }



                
?>