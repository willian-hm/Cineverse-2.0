<?php
require_once "ConexaoBD.php";

class ClassificacaoDAO
{    
    public static function listar()
    {
        $conexao = ConexaoBD::conectar();
        $sql = "SELECT * FROM classificacao";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        $classificacao = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $classificacao;
    }

}