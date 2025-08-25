<?php
require_once "ConexaoBD.php";

class UsuarioDAO
{
    public static function cadastrar($dados)
    {
        $conexao = ConexaoBD::conectar();

        $nome = $dados['nome'];
        $senha = $dados['senha'];
        $email = $dados['email'];

        $sql = "INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $senha);

        $stmt->execute();
    }
}