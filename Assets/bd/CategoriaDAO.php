<?php
require_once "ConexaoBD.php";

class CategoriaDAO
{    
  

    public static function listar()
    {
        $conexao = ConexaoBD::conectar();
        $sql = "SELECT * FROM categoria";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        $categoria = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $categoria;
    }

}