<?php
//usuario
include_once "conf/default.inc.php";
    require_once "conf/Conexao.php";

class usuario{
    private $id;
    private $nome;
    private $idade;
    private $cpf;
    


    public function __construct($id,$nome,$idade,$cpf){
        $this->id = $id;
        $this->nome = $nome;
        $this->idade = $idade;
        $this->cpf = $cpf;
       
    }

    public function getid(){  return $this->id; }
    public function getnome(){  return $this->nome; }
    public function getidade(){  return $this->idade; }
    public function getcpf(){  return $this->cpf; }
   

    public function setid($id) { $this->id = $id; }
    public function setnome($nome) { $this->nome = $nome; }
    public function setidade($idade) { $this->idade = $idade; }
    public function setcpf($cpf) { $this->cpf = $cpf; }
    
    

    public function buscar($id){

        require_once("conexao.php");
        $query .= 'SELECT * FROM usuario';
        $conexao = Conexao::getInstance();
        if($id > 0){
            $query = $query . ' WHERE id = :id';
            $stmt->bindParam(':id',$id);
        }

        $stmt = $conexao->prepare($query);
        if ($stmt->execute())
            return $stmt->fetchAll();
        
        return false; 
    }

    function excluir(){
        $pdo = Conexao::getInstance();
        $stmt = $pdo ->prepare('DELETE FROM usuario WHERE id = :id');
        $stmt->bindParam(':id', $this->id);
        
        return $stmt->execute();
    }
    public function editar(){
            
        $pdo = Conexao::getInstance();
    $stmt = $pdo->prepare('UPDATE usuario SET id = :id WHERE id = :id');
    //$stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':id', $this->id, PDO::PARAM_STR);
    



        return $stmt->execute();
        
    }

    public function __toString(){

        return  "<br> nome: ".$this->getnome().
        "<br> idade: ".$this->getidade().
        "<br> id: ".$this->getid().
        "<br> cpf: ".$this->getcpf();
    }

    public function inserir(){
        
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare('INSERT INTO usuario (nome, idade, cpf) VALUES(:nome, :idade, :cpf)');
        $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':idade', $idade, PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);

        $nome = $this->getnome();
        $idade = $this->getidade(); 
        $cpf = $this->getcpf();

        return $stmt->execute();
        
    }


//     public function calcular_area(){

//           $area = $this->nome * $this->nome;

//           return $area;

// //ou   return $this->nome * $this->nome;

// }

// public function calcular_perimetro(){

//           $perimetro = $this->nome * 4;

//           return $perimetro;

// }

// public function calcular_diagonal(){

//     $diagonal = $this->nome * 1.44;
    
//     return $diagonal;

//     }


}

?>
