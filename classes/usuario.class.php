<?php

    include_once "../conf/Conexao.php";
    include_once "../conf/conf.inc.php";
    include_once "../classes/metodos.class.php";

    class Usuario extends Metodos{
        //cria as variáveis como privadas.
        private $nome;
        private $login;
        private $email;
        private $senha;
        private $sobre;
        private $regiao;
        private $website;


        //constrói as variáveis.
        public function __construct($id, $nome, $login, $email, $senha, $sobre, $regiao, $website){
            parent::__construct($id);
            $this->setnome($nome);
            $this->setlogin($login);
            $this->setemail($email);
            $this->setsenha($senha);
            $this->setEmail($email);
            $this->setSenha($senha);
            $this->setsobre($sobre);
            $this->setregiao($regiao);
            $this->setwebsite($website);
        }

        //busca e seta os valores das variáveis.

        public function getnome(){ return $this->nome; }
        public function setnome($nome){ $this->nome = $nome; }      

        public function getlogin() { return $this->login; }
        public function setlogin($login) { $this->login = $login; }

        public function getemail() { return $this->email; }
        public function setemail($email) { $this->email = $email; }

        public function getsenha() { return $this->senha; }
        public function setsenha($senha) { $this->senha = $senha; }

        public function getsobre() { return $this->sobre; }
        public function setsobre($sobre) { $this->sobre = $sobre; }
        
        public function getregiao() { return $this->regiao; }
        public function setregiao($regiao) { $this->regiao = $regiao; }

        public function getwebsite() { return $this->website; }
        public function setwebsite($website) { $this->website = $website; }

        public function __toString() {
            return  "ID de Usuário: ".$this->getId()."<br>".
                    "Nome: ".$this->getnome()."<br>".
                    "Login: ".$this->getlogin()."<br>".
                    "E-mail: ".$this->getemail()."<br>".
                    "Senha: ".$this->getsenha()."<br>".
                    "Sobre: ".$this->getsobre()."<br>".
                    "Região: ".$this->getregiao()."<br>".
                    "Website: ".$this->getwebsite()."<br>";
        }

        public function inserir(){
            $sql = 'INSERT INTO odisseia.usuario (nome, login, email, senha, sobre, regiao, website) 
            VALUES(:nome, :login, :email, :senha, :sobre, :regiao, :website)';
            $parametros = array(":nome"=>$this->getnome(), 
                                ":login"=>$this->getlogin(),
                                ":email"=>$this->getemail(),
                                ":senha"=>$this->getsenha(), 
                                ":sobre"=>$this->getsobre(),
                                ":regiao"=>$this->getregiao(),
                                ":website"=>$this->getwebsite()
                            
                            
                            );
            return parent::executaComando($sql,$parametros);
        }

        public function excluir(){
            $sql = 'DELETE FROM odisseia.usuario WHERE id = :id';
            $parametros = array(":id"=>$this->getId());
            return parent::executaComando($sql,$parametros);
        }

        public function editar(){
            $sql = 'UPDATE odisseia.usuario SET nome = :nome, login = :login, email = :email, senha = :senha, sobre = :sobre, regiao = :regiao, website = :website
            WHERE id = :id';
            $parametros = array(":nome"=>$this->getnome(),
                                ":login"=>$this->getlogin(),
                                ":email"=>$this->getemail(),
                                ":senha"=>$this->getsenha(),
                                ":sobre"=>$this->getsobre(),
                                ":regiao"=>$this->getregiao(),
                                ":website"=>$this->getwebsite(),
                                ":id"=>$this->getId());
            return parent::executaComando($sql,$parametros);
        }

        // public static function listar($buscar = 0, $procurar = ""){
        //     //cria conexão e seleciona as informações do usário.
        //     $pdo = Conexao::getInstance();
        //     $consulta = "SELECT * FROM usuario";
        //     if($buscar > 0)
        //         switch($buscar){
        //             //se login da consulta for por id, mostra as informações de acepdo com aquele id.
        //             case(1): $consulta .= " WHERE id = :procurar"; break;
        //             //se login da consulta for por nome, mostra as informações de acepdo com aquele nome.
        //             case(2): $consulta .= " WHERE nome LIKE :procurar"; "%".$procurar .="%"; break;
        //             case(3): $consulta .= " WHERE login LIKE :procurar"; "%".$procurar .="%"; break;
        //             //se login da consulta for por senha, mostra as informações de acepdo com aquele senha.
        //             case(4): $consulta .= " WHERE senha LIKE :procurar "; $procurar = "%".$procurar."%"; break;
        //             //se login da consulta for por email, mostra as informações de acepdo com aquele email.
        //             case(5): $consulta .= " WHERE sobre = :procurar "; break;
        //         }

        //     if ($buscar > 0)
        //         $parametros = array(':procurar'=>$procurar);
        //     else 
        //         $parametros = array();
        //     return parent::buscar($consulta, $parametros);
        // }
        
        public static function efetuarLogin($login, $senha){
            $sql = "SELECT id, nome, login, email, senha FROM usuario WHERE login = :login AND senha = :senha";
            $parametros = array(
                ':login' => $login,
                ':senha' => $senha,
            );
            session_set_cookie_params(0);
            session_start();
            if (self::buscar($sql, $parametros)) {
                $_SESSION['id'] = self::buscar($sql, $parametros)[0]['id'];
                $_SESSION['nome'] = self::buscar($sql, $parametros)[0]['nome'];
                $_SESSION['login'] = self::buscar($sql, $parametros)[0]['login'];
                $_SESSION['email'] = self::buscar($sql, $parametros)[0]['email'];
                $_SESSION['senha'] = self::buscar($sql, $parametros)[0]['senha'];
                return true;
            } else {
                $_SESSION['id'] = "";
                $_SESSION['nome'] = "";
                $_SESSION['login'] = "";
                $_SESSION['email'] = "";
                $_SESSION['senha'] = "";
                return false;
            }
        }

        public static function listar($tipo = 0, $procurar = ""){
        
            if($tipo==""){
                $sql = ("SELECT * FROM usuario");
            }
            
             else if($tipo =="1"){
                $sql = ("SELECT * FROM usuario 
                                         WHERE nome = '$procurar%'
                                         ORDER BY nome");
            }
            
             else if($tipo =="2"){
                $sql = ("SELECT * FROM usuario 
                                         WHERE sobre LIKE '$procurar%' 
                                         ORDER BY sobre");
            }
            
            else if($tipo =="3"){
                $sql = ("SELECT * FROM usuario 
                                         WHERE regiao LIKE '$procurar%' 
                                         ORDER BY regiao");
            }
            else if($tipo =="4"){
                $sql = ("SELECT * FROM usuario 
                                         WHERE website LIKE '$procurar%' 
                                         ORDER BY website");
            }
            
    if ($tipo > 0)
    $par = array(':procurar'=>$procurar);
    else
    $par = array();
    return parent::buscar($sql, $par);
    
    //var_dump($tipo);
    return $tipo;
    
    }     
   
    }



                
?>