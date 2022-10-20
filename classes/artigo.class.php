<?php

    include_once "../conf/Conexao.php";
    include_once "../conf/conf.inc.php";
    include_once "../classes/metodos.class.php";

    class artigos extends Metodos{
        //cria as variáveis como privadas.
        private $id;
        private $nome_art;
        private $texto;
        private $infos;
        private $ficheiroI;
        private $ficheiroII;
        private $astrofoto;
        private $idusuario;

        //constrói as variáveis.
        public function __construct($id, $nome_art, $texto, $infos, $ficheiroI, $ficheiroII, $astrofoto, $idusuario){
            parent::__construct($id);
            $this->setnome_art($nome_art);
            $this->settexto($texto);
            $this->setinfos($infos);
            $this->setficheiroI($ficheiroI);
            $this->setficheiroII($ficheiroII);
            $this->setastrofoto($astrofoto);
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
        
        public function getastrofoto() { return $this->astrofoto; }
        public function setastrofoto($astrofoto) { $this->astrofoto = $astrofoto; }

        public function getidusuario() { return $this->idusuario; }
        public function setidusuario($idusuario) { $this->idusuario = $idusuario; }

        public function __toString() {
            return  "ID de artigo: ".$this->getId()."<br>".
                    "Nome: ".$this->getnome_art()."<br>".
                    "texto: ".$this->gettexto()."<br>".
                    "infos: ".$this->getinfos()."<br>".
                    "ficheiro I: ".$this->getficheiroI()."<br>".
                    "ficheiro II: ".$this->getficheiroII()."<br>".
                    "astrofoto: ".$this->getastrofoto()."<br>".
                    "id usuário: ".$this->getidusuario()."<br>";
        }

        public function inserir(){
            $sql = 'INSERT INTO odisseia.artigos (nome_art, texto, infos, ficheiroI, ficheiroII, astrofoto, idusuario) 
            VALUES(:nome_art, :texto, :infos, :ficheiroI, :ficheiroII, :astrofoto, :idusuario)';
            $parametros = array(":nome_art"=>$this->getnome_art(), 
                                ":texto"=>$this->gettexto(),
                                ":infos"=>$this->getinfos(),
                                ":ficheiroI"=>$this->getficheiroI(), 
                                ":ficheiroII"=>$this->getficheiroII(),
                                ":astrofoto"=>$this->getastrofoto(),
                                ":idusuario"=>$this->getidusuario()
                            
                            
                            );
            return parent::executaComando($sql,$parametros);
        }

        public function excluir(){
            $sql = 'DELETE FROM odisseia.artigos WHERE id = :id';
            $parametros = array(":id"=>$this->getId());
            return parent::executaComando($sql,$parametros);
        }

        public function editar(){
            $sql = 'UPDATE odisseia.artigos SET nome_art = :nome_art, texto = :texto, infos = :infos, ficheiroI = :ficheiroI, ficheiroII = :ficheiroII, astrofoto = :astrofoto, idusuario = :idusuario
            WHERE id = :id';
            $parametros = array(":nome"=>$this->getnome(),
                                ":texto"=>$this->gettexto(),
                                ":infos"=>$this->getinfos(),
                                ":ficheiroI"=>$this->getficheiroI(),
                                ":ficheiroII"=>$this->getficheiroII(),
                                ":astrofoto"=>$this->getastrofoto(),
                                ":idusuario"=>$this->getidusuario(),
                                ":id"=>$this->getId());
            return parent::executaComando($sql,$parametros);
        }

        public static function listar($buscar = 0, $procurar = ""){
            //cria conexão e seleciona as informações do usário.
            $pdo = Conexao::getInstance();
            $consulta = "SELECT * FROM usuario";
            if($buscar > 0)
                switch($buscar){
                    case(1): $consulta .= " WHERE id = :procurar"; break;
                    case(2): $consulta .= " WHERE nome LIKE :procurar"; "%".$procurar .="%"; break;
                    case(3): $consulta .= " WHERE login LIKE :procurar"; "%".$procurar .="%"; break;
                    case(4): $consulta .= " WHERE senha LIKE :procurar "; $procurar = "%".$procurar."%"; break;
                    case(5): $consulta .= " WHERE sobre = :procurar "; break;
                }

            if ($buscar > 0)
                $parametros = array(':procurar'=>$procurar);
            else 
                $parametros = array();
            return parent::buscar($consulta, $parametros);
        }
        
        public static function dados($id){
            $sql = "SELECT * FROM usuario WHERE id = :id";
            $parametros = array(":id"=>$id);
            return parent::buscar($sql, $parametros);
        }
    
    }



                
?>