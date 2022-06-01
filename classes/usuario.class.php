<?php
//usuario
include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";

class usuario{
    private $id_usuario;
    private $nome_usuario;
    private $idade_usuario;
    private $cpf_usuario;
    


    public function __construct($id,$nome,$idade,$cpf){
        $this->id_usuario = $id;
        $this->nome_usuario = $nome;
        $this->idade_usuario = $idade;
        $this->cpf_usuario = $cpf;
       
    }

    public function getid(){  return $this->id_usuario; }
    public function getnome(){  return $this->nome_usuario; }
    public function getidade(){  return $this->idade_usuario; }
    public function getcpf(){  return $this->cpf_usuario; }
   

    public function setid($id) { $this->id_usuario = $id; }
    public function setnome($nome) { $this->nome_usuario = $nome; }
    public function setidade($idade) { $this->idade_usuario = $idade; }
    public function setcpf($cpf) { $this->cpf_usuario = $cpf; }
    
    

    public function buscar($id){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM usuario WHERE id_usuario = id_usuario");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['id_usuario'] = $linha['id_usuario'];
            $dados['nome_usuario'] = $linha['nome_usuario'];
            $dados['idade_usuario'] = $linha['idade_usuario'];
            $dados['cpf_usuario'] = $linha['cpf_usuario'];
        }
        //var_dump($dados);
        return $dados;
    }

     function excluir(){
        $pdo = Conexao::getInstance();
        $stmt = $pdo ->prepare('DELETE FROM usuario WHERE id_usuario = :id_usuario');
        $stmt->bindParam(':id_usuario', $this->id_usuario);
        
        return $stmt->execute();
    }
    public function editar(){
            
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare("UPDATE `usuario` SET `nome_usuario` = :nome_usuario, `idade_usuario` = :idade_usuario, `cpf_usuario` = :cpf_usuario WHERE (`id_usuario` = :id_usuario);");
    
        $stmt->bindValue(':id_usuario', $this->getId(), PDO::PARAM_INT);
        $stmt->bindValue(':nome_usuario', $this->getnome(), PDO::PARAM_STR);
        $stmt->bindValue(':idade_usuario', $this->getidade(), PDO::PARAM_STR);
        $stmt->bindValue(':cpf_usuario', $this->getcpf(), PDO::PARAM_STR);

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
        // $stmt = $pdo->prepare('INSERT INTO usuario (id_usuario) VALUES(:id_usuario)');
        $stmt = $pdo->prepare('INSERT INTO usuario (nome_usuario, idade_usuario, cpf_usuario) VALUES(:nome_usuario, :idade_usuario, :cpf_usuario)');
        $stmt->bindParam(':nome_usuario', $nome, PDO::PARAM_STR);
        $stmt->bindParam(':idade_usuario', $idade, PDO::PARAM_STR);
        $stmt->bindParam(':cpf_usuario', $cpf, PDO::PARAM_STR);
        //$stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $nome = $this->getnome();
        $idade = $this->getidade(); 
        $cpf = $this->getcpf();
        // $id = $this->getcpf();
        return $stmt->execute();
        
    }




}

?>
