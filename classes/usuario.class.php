<?php
//usuario
include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
    require_once "../classes/databased.class.php";


class usuario extends databased{
    private $id_usuario;
    private $nome_usuario;
    private $login_usuario;
    private $email_usuario;
    private $senha;
    private $sobre; 
    private $regiao;
    private $site;


    public function __construct($id_usuario,$nome_usuario,$login_usuario,$email_usuario,$senha,$sobre,$regiao,$site){
        $this->id_usuario = $id_usuario;
        $this->nome_usuario = $nome_usuario;
        $this->login_usuario = $login_usuario;
        $this->email_usuario = $email_usuario;
        $this->senha = $senha;
        $this->sobre = $sobre;
        $this->regiao = $regiao;
        $this->site = $site;

       
    }

    public function getid_usuario(){  return $this->id_usuario; }
    public function getnome_usuario(){  return $this->nome_usuario; }
    public function getlogin_usuario(){  return $this->login_usuario; }
    public function getemail_usuario(){  return $this->email_usuario; }
    public function getsenha(){  return $this->senha; }
    public function getsobre(){  return $this->sobre; }
    public function getregiao(){  return $this->regiao; }
    public function getsite(){  return $this->site; }


    public function setid_usuario($id_usuario) { $this->id_usuario = $id_usuario; }
    public function setnome_usuario($nome_usuario) { $this->nome_usuario = $nome_usuario; }
    public function setlogin_usuario($login_usuario) { $this->login_usuario = $login_usuario; }
    public function setemail_usuario($email_usuario) { $this->email_usuario = $email_usuario; }
    public function setsenha($senha) { $this->senha = $senha; }
    public function setsobre($sobre) { $this->sobre = $sobre; }
    public function setregiao($regiao) { $this->regiao = $regiao; }
    public function setsite($site) { $this->site = $site; }

    

    // public function Dbuscar($id_usuario){
    //     $pdo = Conexao::getInstance();
    //     $consulta = $pdo->query("SELECT * FROM usuario WHERE id_usuario = id_usuario");
    //     $dados = array();
    //     while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    //         $dados['id_usuario'] = $linha['id_usuario'];
    //         $dados['nome_usuario'] = $linha['nome_usuario'];
    //         $dados['login_usuario'] = $linha['login_usuario'];
    //         $dados['email_usuario'] = $linha['email_usuario'];
    //         $dados['senha'] = $linha['senha'];

    //     }
    //     //var_dump($dados);
    //     return $dados;
    // }

     function excluir(){
        $pdo = Conexao::getInstance();
        $stmt = $pdo ->prepare('DELETE FROM usuario WHERE id_usuario = :id_usuario');
        $stmt->bindParam(':id_usuario', $this->getid_usuario());
        
        return $stmt->execute();
    }
    public function editar(){
            
        $pdo = Conexao::getInstance();
        $stmt = $pdo->prepare("UPDATE `usuario` SET `nome_usuario` = :nome_usuario, `login_usuario` = :login_usuario, `email_usuario` = :email_usuario, `senha` = :senha, `sobre` = :sobre, `regiao` = :regiao, `site` = :site WHERE (`id_usuario` = :id_usuario);");
    
        $stmt->bindValue(':id_usuario', $this->getid_usuario(), PDO::PARAM_INT);
        $stmt->bindValue(':nome_usuario', $this->getnome_usuario(), PDO::PARAM_STR);
        $stmt->bindValue(':login_usuario', $this->getlogin_usuario(), PDO::PARAM_STR);
        $stmt->bindValue(':email_usuario', $this->getemail_usuario(), PDO::PARAM_STR);
        $stmt->bindValue(':senha', $this->getsenha(), PDO::PARAM_STR);
        $stmt->bindValue(':sobre', $this->getsobre(), PDO::PARAM_STR);
        $stmt->bindValue(':regiao', $this->getregiao(), PDO::PARAM_STR);
        $stmt->bindValue(':site', $this->getsite(), PDO::PARAM_STR);


        return $stmt->execute();

       
        
    }

    public function __toString(){

        return  "<br> id: ".$this->getid_usuario().
                "<br> nome: ".$this->getnome_usuario().
                "<br> login: ".$this->getlogin_usuario().
                "<br> email: ".$this->getemail_usuario().
                "<br> senha: ".$this->getsenha();
    }

    public function inserir(){
        
        $pdo = Conexao::getInstance();
        // $stmt = $pdo->prepare('INSERT INTO usuario (id_usuario) VALUES(:id_usuario)');
        $stmt = $pdo->prepare('INSERT INTO usuario (nome_usuario, login_usuario, email_usuario, senha, sobre, regiao, site) VALUES(:nome_usuario, :login_usuario, :email_usuario, :senha, :sobre, :regiao, :site)');
        $stmt->bindParam(':nome_usuario', $this->getnome_usuario(), PDO::PARAM_STR);
        $stmt->bindParam(':login_usuario', $this->getlogin_usuario(), PDO::PARAM_STR);
        $stmt->bindParam(':email_usuario', $this->getemail_usuario(), PDO::PARAM_STR);
        $stmt->bindParam(':senha', $this->getsenha(), PDO::PARAM_STR);
        $stmt->bindParam(':sobre', $this->getsobre(), PDO::PARAM_STR);
        $stmt->bindParam(':regiao', $this->getregiao(), PDO::PARAM_STR);
        $stmt->bindParam(':site', $this->getsite(), PDO::PARAM_STR);

        return $stmt->execute();
        
    }

    public static function listar($tipo = 0, $procurar = ""){
        
        $pdo = Conexao::getInstance();

        if($tipo==""){
            $sql = "SELECT * FROM usuario 
                                     WHERE id_usuario LIKE '$procurar%'
                                     ORDER BY id_usuario";
        }
       
         else if($tipo=="pro2"){
            $sql = "SELECT * FROM usuario 
                                     WHERE nome_usuario LIKE '$procurar%'
                                     ORDER BY nome_usuario";
        }
       
         else if($tipo=="pro3"){
            $sql = "SELECT * FROM usuario 
                                     WHERE login_usuario LIKE '$procurar%' 
                                     ORDER BY login_usuario";
        }
       
        else if($tipo=="pro4"){
            $sql = "SELECT * FROM usuario 
                                     WHERE email_usuario LIKE '$procurar%' 
                                     ORDER BY email_usuario";
        }
        else if($tipo=="pro5"){
            $sql = "SELECT * FROM usuario 
                                     WHERE senha LIKE '$procurar%' 
                                     ORDER BY senha";
       }

       else if($tipo=="pro6"){
        $sql = "SELECT * FROM usuario 
                                 WHERE sobre LIKE '$procurar%' 
                                 ORDER BY sobre";
        } 
   
        else if($tipo=="pro7"){
        $sql = "SELECT * FROM usuario 
                             WHERE regiao LIKE '$procurar%' 
                             ORDER BY regiao";
        } 

        else if($tipo=="pro8"){
        $sql = "SELECT * FROM usuario 
                             WHERE site LIKE '$procurar%' 
                             ORDER BY site";
        }
       
       if ($tipo > 0)
        $par = array(':procurar'=>$procurar);
       else
        $par = array();
       return parent::buscar($sql, $par);
       
       //var_dump($tipo);
    //    return $tipo;

    }
}

?>
