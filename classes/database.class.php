<?php 
include_once "../conf/default.inc.php";


class Database{
    public static function iniciaConexao(){
        require_once "../conf/Conexao.php";
        return Conexao::getInstance();
    }

    public static function vinculaParametros($stmt, $parametros=array()){
        foreach ($parametros as $chave=>$valor){
          $stmt->bindValue($chave, $valor);
        }
        return $stmt;
    }

    public static function executaComando($sql, $parametros=array()){
        $conexao = self::iniciaConexao();
        $stmt = $conexao->prepare($sql);
        $stmt = self::vinculaParametros($stmt, $parametros);
        // try{
         $stmt->execute();
         return $conexao->lastInsertId();
        // }catch (Exception $e){
        //   throw new Exception("Erro");
        // }
    }

    public static function buscar($sql, $parametros=array()){
      $conexao = self::iniciaConexao();
      $stmt = $conexao->prepare($sql);
      $stmt = self::vinculaParametros($stmt, $parametros);
      $stmt->execute();
      return $stmt->fetchALL();
    }
  }
?>