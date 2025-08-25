<?php
require_once "ConexaoBD.php";
require "Util.php";

class serieDAO
{
    public static function cadastrarSerie($dados)
    {
        $conexao = ConexaoBD::conectar();

        $titulo = $dados['titulo'];
        $ano = $dados['ano'];
        $idclassificacao = $dados['idclassificacao'];
        $idcategoria = $dados['idcategoria'];
        $imagem = Util::salvarArquivo();
        $diretor = $dados['diretor'];
        $elenco = $dados['elenco'];
        $temporadas = $dados['temporadas'];
        $episodios = $dados['episodios'];
        $oscar = $dados['oscar'];
        $trailer = $dados['trailer'];


        $sql = "INSERT INTO serie (titulo, ano, idclassificacao, idcategoria, imagem, diretor, elenco, temporadas, episodios, oscar, trailer) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(1, $titulo);
        $stmt->bindParam(2, $ano);
        $stmt->bindParam(3, $idclassificacao);
        $stmt->bindParam(4, $idcategoria);
        $stmt->bindParam(5, $imagem);
        $stmt->bindParam(6, $diretor);
        $stmt->bindParam(7, $elenco);
        $stmt->bindParam(8, $temporadas);
        $stmt->bindParam(9, $episodios);
        $stmt->bindParam(10, $oscar);
        $stmt->bindParam(11, $trailer);


        $stmt->execute();
    }
}