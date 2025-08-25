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

    
}