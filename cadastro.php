<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Cineverse - Cadastro</title>
  <link rel="stylesheet" href="Assets/css/style.css">
</head>

<body>
  <header>
    <nav class="header-content">
      <a href="cineverse.php" class="logo">🎬 Cineverse</a>
    </nav>
  </header>

  <main>
    <div class="login-container">
      <h2>Criar Conta</h2>
      <form action="Assets/bd/cadastroUsuario.php">
        <input type="text" id="nome" name="nome" placeholder="Nome completo" autocomplete="off" required>
        <input type="email" id="email" name="email" placeholder="E-mail" autocomplete="off" required>
        <input type="password" id="senha" name="senha" placeholder="Senha" autocomplete="off" required>
        <input type="submit" value="Cadastrar">
      </form>

      <button onclick="window.location.href='index.php'" style="margin-top: 10px; background-color: #333;">
        Já tenho uma conta
      </button>

      <p id="mensagemCadastro"></p>
    </div>
  </main>

  <footer>
    <p>&copy; 2025 Cineverse. Todos os direitos reservados.</p>
  </footer>

</body>

</html>