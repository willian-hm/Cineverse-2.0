<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Cineverse - Login</title>
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
      <h2>Entrar</h2>
      <form action="Assets/bd/loginUsuario.php">
        <input type="text" id="nome" name="nome" placeholder="Nome">
        <input type="password" id="senha" name="senha" placeholder="Senha">
        <input type="submit" value="Login">
      </form>
      <p><a href="cadastro.php">Não tenho uma conta</a></p>
      <p id="mensagem" style="color: #ffcccc;">
        <?php if (isset($_GET['erro'])) {
          echo htmlspecialchars($_GET['erro']);
        } ?>
      </p>

    </div>
  </main>

  <footer>
    <p>&copy; 2025 Cineverse. Todos os direitos reservados.</p>
  </footer>

</body>

</html>