<?php
require_once "ConexaoBD.php";

if (!isset($_GET['nome']) || !isset($_GET['senha'])) {
    header("location: ../../index.php?erro=Preencha todos os campos");
    exit();
}

$nome = trim($_GET['nome']);
$senha = trim($_GET['senha']);

try {
    $conexao = ConexaoBD::conectar();

    $sql = "SELECT * FROM usuario WHERE nome = ? AND senha = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(1, $nome);
    $stmt->bindParam(2, $senha);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Login correto
        header("location: ../../cineverse.php");
        exit();
    } else {
        // Nome ou senha inválidos
        header("location: ../../index.php?erro=Usuario ou senha inválidos");
        exit();
    }
} catch (PDOException $e) {
    echo "Erro no login: " . $e->getMessage();
}
