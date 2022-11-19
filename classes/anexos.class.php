<?php

    include_once "../conf/Conexao.php";
    include_once "../conf/conf.inc.php";
    include_once "../classes/metodos.class.php";

    class Anexos extends Database{
        //cria as variáveis como privadas.
        private $idastro;
        private $idartigos;
  
        public function __construct($idastro, $idartigos){
            $this->setidastro($idastro);
            $this->setidartigos($idartigos);
        
        }

        //busca e seta os valores das variáveis.

        public function getidastro(){ return $this->idastro; }
        public function setidastro($idastro){ $this->idastro = $idastro; }      

        public function getidartigos() { return $this->idartigos; }
        public function setidartigos($idartigos) { $this->idartigos = $idartigos; }

    

        public function inserir(){
            $sql = 'INSERT INTO odisseia.anexos (idastro, idartigos) 
            VALUES(:idastro, :idartigos)';
             $parametros = array(":idastro"=>$this->getidastro(),
                                ":idartigos"=>$this->getidartigos());
            return parent::executaComando($sql,$parametros);
        }

        public static function excluir($idartigos){
            $sql = 'DELETE FROM odisseia.anexos WHERE idartigos = :idartigos';
            $parametros = array(":idartigos"=>$idartigos);
            return parent::executaComando($sql,$parametros);
        }

        public function inserir2(){
            $sql = 'INSERT INTO odisseia.anexos (idastro, idartigos) 
            VALUES(:idastro, :idartigos)';
            $parametros = array(":idastro"=>$this->getidastro(),
                                ":idartigos"=>$this->getidartigos());
            return parent::executaComando($sql,$parametros);
        }

        public static function listar($buscar = 0, $procurar = ""){
            //cria conexão e seleciona as informações do usário.
            $pdo = Conexao::getInstance();
            $consulta = "SELECT * FROM anexos, artigos, astrofotografia WHERE anexos.idastro = astrofotografia.idastro AND
            anexos.idartigos = artigos.idartigos
            ";
            if($buscar > 0)
                switch($buscar){
                    case(1): $consulta .= " AND anexos.idastro = :procurar"; break;
                    case(2): $consulta .= " AND anexos.idartigos = :procurar"; "%".$procurar .="%"; break;


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