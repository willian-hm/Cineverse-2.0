<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cineverse - Cadastrar Séries</title>
    <link rel="stylesheet" href="Assets/css/style.css" />
</head>

<body>
    <header>
        <nav class="header-content">
            <a href="cineverse.php" class="logo">🎬 Cineverse</a>
            <div class="links">
                <a href="filmes.php">Filmes</a>
                <a href="series.php">Séries</a>
            </div>
            <div class="usuario">
                <div class="icone-usuario" onclick="toggleMenu()">
                    <span>👤</span>
                </div>
                <div class="menu-suspenso" id="menuSuspenso">
                    <a href="perfil.php">Perfil</a>
                    <a href="cadastrarFilmes.php">Cadastrar Filmes</a>
                    <a href="cadastrarSeries.php">Cadastrar Séries</a>
                    <a href="config.php">Configurações</a>
                    <a href="index.php">Encerrar sessão</a>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="login-container">
            <h2>Cadastrar Séries</h2>
            <form action="Assets/bd/cadastrarSerie.php" method="POST" enctype="multipart/form-data">

                <label for="titulo">Título</label>
                <input type="text" name="titulo" id="titulo" placeholder="Título" required>

                <label for="ano">Ano de Lançamento</label>
                <input type="number" name="ano" id="ano" placeholder="Ano" required>

                <label for="idclassificacao">Classificação Indicativa</label>
                <select name="idclassificacao" id="idclassificacao">
                    <?php
                    require_once "Assets/bd/ClassificacaoDAO.php";
                    $classificacaos = ClassificacaoDAO::listar();
                    foreach ($classificacaos as $classificacao) {
                        ?>
                        <option value="<?= $classificacao['idclassificacao'] ?>"><?= $classificacao['nomeclassificacao'] ?></option>
                        <?php
                    }
                    ?>
                </select>

                <label for="idcategoria">Categoria</label>
                <select name="idcategoria" id="idcategoria">
                    <?php
                    require_once "Assets/bd/CategoriaDAO.php";
                    $categorias = CategoriaDAO::listar();
                    foreach ($categorias as $categoria) {
                        ?>
                        <option value="<?= $categoria['idcategoria'] ?>"><?= $categoria['nomecategoria'] ?></option>
                        <?php
                    }
                    ?>
                </select>

                <label for="imagem">Cartaz do Série</label>
                <input type="file" name="imagem" id="imagem" placeholder="Banner" required>

                <label for="diretor">Diretor</label>
                <input type="text" name="diretor" id="diretor" placeholder="Diretor" required>

                <label for="elenco">Elenco</label>
                <input type="text" name="elenco" id="elenco" placeholder="elenco" required>

                <label for="temporadas">Temporadas</label>
                <input type="number" name="temporadas" id="temporadas" placeholder="Quantidade de Temporadas">

                <label for="episodios">Episódios</label>
                <input type="number" name="episodios" id="episodios" placeholder="Quantidade de Episódios">

                <label for="oscar">Quantidade de Oscar</label>
                <input type="text" name="oscar" id="oscar" placeholder="Prêmios/Oscar" required>

                <label for="trailer">Link do trailer da série</label>
                <input type="text" name="trailer" id="trailer" placeholder="Trailer" required>

                <input type="submit" value="Cadastrar Série">
            </form>
            
        </div>
    </main>

    <footer>&copy; 2025 Cineverse. Todos os direitos reservados.</footer>

    <script>
        function toggleMenu() {
            const menu = document.getElementById("menuSuspenso");
            menu.style.display = menu.style.display === "block" ? "none" : "block";
        }

        window.addEventListener("click", function (event) {
            const menu = document.getElementById("menuSuspenso");
            const icon = document.querySelector(".icone-usuario");

            if (!icon.contains(event.target) && !menu.contains(event.target)) {
                menu.style.display = "none";
            }
        });
    </script>

</body>

</html>