<?php
include_once "../conf/default.inc.php";
require_once "../conf/Conexao.php";
require_once "../classes/database.class.php";

    abstract class Metodos extends Database{
        private $id;
        private static $contador = 0;

        public function __construct($id) {
            $this->setId($id);
            self::$contador = self::$contador + 1;
        }

        public function getId(){ return $this->id; }
        public function setId($id){ $this->id = $id; }      

        public function __toString() {
            return  "[ID]: ".$this->getId()."<br>".
                    "Contador: ".self::$contador."<br>";
        }

        public abstract function inserir();
        public abstract function excluir();
        public abstract function editar();
        public abstract static function listar($buscar = 0, $procurar = "");
    }
?>