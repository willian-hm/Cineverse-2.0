<?php
require_once "ConexaoBD.php";
require "Util.php";

class FilmeDAO
{
    public static function cadastrarFilme($dados)
    {
        $conexao = ConexaoBD::conectar();

        $titulo = $dados['titulo'];
        $ano = $dados['ano'];
        $idcategoria = $dados['idcategoria'];
        $idclassificacao = $dados['idclassificacao'];
        $imagem = Util::salvarArquivo();
        $diretor = $dados['diretor'];
        $elenco = $dados['elenco'];
        $oscar = $dados['oscar'];
        $trailer = $dados['trailer'];


        $sql = "INSERT INTO filme (titulo, ano, idcategoria, idclassificacao, imagem, diretor, elenco, oscar, trailer) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(1, $titulo);
        $stmt->bindParam(2, $ano);
        $stmt->bindParam(3, $idcategoria);
        $stmt->bindParam(4, $idclassificacao);
        $stmt->bindParam(5, $imagem);
        $stmt->bindParam(6, $diretor);
        $stmt->bindParam(7, $elenco);
        $stmt->bindParam(8, $oscar);
        $stmt->bindParam(9, $trailer);

        $stmt->execute();
    }

    public static function listarFilmes()
    {
        $conexao = ConexaoBD::conectar();
         $sql = "SELECT f.*, 
                   c.nomeclassificacao AS classificacao, 
                   cat.nomecategoria AS categoria
            FROM filme f
            INNER JOIN classificacao c ON f.idclassificacao = c.idclassificacao
            INNER JOIN categoria cat ON f.idcategoria = cat.idcategoria";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        $filme = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $filme;
    }

    public static function listarFilmesComOscar()
    {
        $conexao = ConexaoBD::conectar();
         $sql = "SELECT f.*, 
                   c.nomeclassificacao AS classificacao, 
                   cat.nomecategoria AS categoria
            FROM filme f
            INNER JOIN classificacao c ON f.idclassificacao = c.idclassificacao
            INNER JOIN categoria cat ON f.idcategoria = cat.idcategoria
            WHERE f.oscar > 0";
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        $filmeComOscar = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $filmeComOscar;
    }
}