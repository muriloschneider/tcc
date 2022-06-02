<?php
//usuario
include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";

class usuario{
    private $id_usuario;
    private $nome_usuario;
    private $login_usuario;
    private $email_usuario;
    private $data_nascimento;


    public function __construct($id_usuario,$nome_usuario,$login_usuario,$email_usuario,$data_nascimento){
        $this->id_usuario = $id_usuario;
        $this->nome_usuario = $nome_usuario;
        $this->login_usuario = $login_usuario;
        $this->email_usuario = $email_usuario;
        $this->data_nascimento = $data_nascimento;
       
    }

    public function getid_usuario(){  return $this->id_usuario; }
    public function getnome_usuario(){  return $this->nome_usuario; }
    public function getlogin_usuario(){  return $this->login_usuario; }
    public function getemail_usuario(){  return $this->email_usuario; }
    public function getdata_nascimento(){  return $this->data_nascimento; }

    public function setid_usuario($id_usuario) { $this->id_usuario = $id_usuario; }
    public function setnome_usuario($nome_usuario) { $this->nome_usuario = $nome_usuario; }
    public function setlogin_usuario($login_usuario) { $this->login_usuario = $login_usuario; }
    public function setemail_usuario($email_usuario) { $this->email_usuario = $email_usuario; }
    public function setdata_nascimento($data_nascimento) { $this->data_nascimento = $data_nascimento; }

    

    public function buscar($id_usuario){
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM usuario WHERE id_usuario = id_usuario");
        $dados = array();
        while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
            $dados['id_usuario'] = $linha['id_usuario'];
            $dados['nome_usuario'] = $linha['nome_usuario'];
            $dados['login_usuario'] = $linha['login_usuario'];
            $dados['email_usuario'] = $linha['email_usuario'];
            $dados['data_nascimento'] = $linha['data_nascimento'];

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
        $stmt = $pdo->prepare("UPDATE `usuario` SET `nome_usuario` = :nome_usuario, `login_usuario` = :login_usuario, `email_usuario` = :email_usuario, `data_nascimento` = :data_nascimento WHERE (`id_usuario` = :id_usuario);");
    
        $stmt->bindValue(':id_usuario', $this->getid_usuario(), PDO::PARAM_INT);
        $stmt->bindValue(':nome_usuario', $this->getnome_usuario(), PDO::PARAM_STR);
        $stmt->bindValue(':login_usuario', $this->getlogin_usuario(), PDO::PARAM_STR);
        $stmt->bindValue(':email_usuario', $this->getemail_usuario(), PDO::PARAM_STR);
        $stmt->bindValue(':data_nascimento', $this->getdata_nascimento(), PDO::PARAM_STR);


        return $stmt->execute();

       
        
    }

    public function __toString(){

        return  "<br> id: ".$this->getid_usuario().
                "<br> nome: ".$this->getnome_usuario().
                "<br> login: ".$this->getlogin_usuario().
                "<br> email: ".$this->getemail_usuario().
                "<br> data nascimento: ".$this->getdata_nascimento();
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
