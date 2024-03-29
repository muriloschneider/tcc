<?php

    include_once "../conf/Conexao.php";
    include_once "../conf/conf.inc.php";
    include_once "../classes/metodos.class.php";

    class Astrofotografia extends Metodos{
        //cria as variáveis como privadas.
        private $nome;
        private $equipamento;
        private $detalhes;
        private $ficheiro;
        private $usuario;
        
        //constrói as variáveis.
        public function __construct($id, $nome, $equipamento, $detalhes, $ficheiro, $usuario){
            parent::__construct($id);
            $this->setnome($nome);
            $this->setEquip($equipamento);
            $this->setdetalhes($detalhes);
            $this->setFicheiro($ficheiro);
            $this->setUsuario($usuario);
        }

        //busca e seta os valores das variáveis.

        public function getnome(){ return $this->nome; }
        public function setnome($nome){ $this->nome = $nome; }      

        public function getequip() { return $this->equipamento; }
        public function setequip($equipamento) { $this->equipamento = $equipamento; }

        public function getdetalhes() { return $this->detalhes; }
        public function setdetalhes($detalhes) { $this->detalhes = $detalhes; }

        public function getficheiro() { return $this->ficheiro; }
        public function setficheiro($ficheiro) { $this->ficheiro = $ficheiro; }

        public function getusuario() { return $this->usuario; }
        public function setusuario($usuario) { $this->usuario = $usuario; }
 

        public function inserir(){
            $sql = 'INSERT INTO odisseia.astrofotografia (nome_astro, equipamento, detalhes, ficheiro, idusuario) 
            VALUES(:nome_astro, :equipamento, :detalhes, :ficheiro, :idusuario)';
            $parametros = array(":nome_astro"=>$this->getnome(), 
                                ":equipamento"=>$this->getequip(),
                                ":detalhes"=>$this->getdetalhes(),
                                ":ficheiro"=>$this->getficheiro(), 
                                ":idusuario"=>$this->getusuario(),
                            
                            );
            return parent::executaComando($sql,$parametros);
        }

        public function excluir(){
            $sql = 'DELETE FROM odisseia.astrofotografia WHERE idastro = :idastro';
            $parametros = array(":idastro"=>$this->getId());
            return parent::executaComando($sql,$parametros);
        }

        public function editar(){
            $sql = 'UPDATE odisseia.astrofotografia SET nome_astro = :nome_astro, equipamento = :equipamento, detalhes = :detalhes, ficheiro = :ficheiro, idusuario = :idusuario
            WHERE idastro = :idastro';
            $parametros = array(":nome_astro"=>$this->getnome(),
                                ":equipamento"=>$this->getequip(),
                                ":detalhes"=>$this->getdetalhes(),
                                ":ficheiro"=>$this->getficheiro(),
                                ":idusuario"=>$this->getusuario(),
                                ":idastro"=>$this->getId());
            return parent::executaComando($sql,$parametros);
        }

        public static function listar($buscar = 0, $procurar = ""){
            //cria conexão e seleciona as informações do usário.
            $pdo = Conexao::getInstance();
            $consulta = "SELECT * FROM astrofotografia";
            if($buscar > 0)
                switch($buscar){
                    case(1): $consulta .= " WHERE idastro = :procurar"; break;
                    case(2): $consulta .= " WHERE nome_astro LIKE :procurar"; "%".$procurar .="%"; break;
                    case(3): $consulta .= " WHERE idusuario = :procurar"; "%".$procurar .="%"; break; 

                }

            if ($buscar > 0)
                $parametros = array(':procurar'=>$procurar);
            else 
                $parametros = array();
            return parent::buscar($consulta, $parametros);
        }
        
        public static function listar2($buscar = 0, $procurar = "", $id = 0){
            //cria conexão e seleciona as informações do usário.
            $pdo = Conexao::getInstance();
            $consulta = "SELECT * FROM astrofotografia WHERE idusuario <> $id";
            if($buscar > 0)
                switch($buscar){
                    case(1): $consulta .= " AND idastro = :procurar"; break;
                    case(2): $consulta .= " AND nome_astro LIKE :procurar"; "%".$procurar .="%"; break;
                    case(3): $consulta .= " AND idusuario = :procurar"; "%".$procurar .="%"; break; 

                }

            if ($buscar > 0)
                $parametros = array(':procurar'=>$procurar);
            else
                $parametros = array();
            return parent::buscar($consulta, $parametros);
        }
        
        public static function dados($id){
            $sql = "SELECT * FROM astrofotografia WHERE idastro = :idastro";
            $parametros = array(":idastro"=>$id);
            return parent::buscar($sql, $parametros);
        }

    
    }



                
?>