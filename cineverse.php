<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cineverse</title>
  <link rel="stylesheet" href="Assets/css/style.css" />
  <link rel="stylesheet" href="slider.css" />
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

  <div id="slider" class="slider">

    <div class="slides">
      <input type="radio" name="radio-btn" id="radio1">
      <input type="radio" name="radio-btn" id="radio2">
      <input type="radio" name="radio-btn" id="radio3">
      <input type="radio" name="radio-btn" id="radio4">

      <div class="slide first">
        <img src="https://ingresso-a.akamaihd.net/prd/img/movie/pecadores/0879a4f3-0175-4834-b04f-67074a78749a.webp"
          alt="img 1">
      </div>
      <div class="slide">
        <img
          src="https://ingresso-a.akamaihd.net/prd/img/movie/como-treinar-o-seu-dragao-2025/4b067f1c-f99f-4c46-bd2d-23539b28b76a.webp"
          alt="img 2">
      </div>
      <div class="slide">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTOOIuF8lZdmhJPvLdvqDMeU1Uv5NvSJzHWdg&s"
          alt="img 3">
      </div>
      <div class="slide">
        <img
          src="https://ingresso-a.akamaihd.net/prd/img/movie/quarteto-fantastico-primeiros-passos/bb8b9147-a76c-4435-92db-4ce024603f6f.webp"
          alt="img 4">
      </div>
    </div>
    <div class="navigation-auto">
      <div class="auto-btn1"></div>
      <div class="auto-btn2"></div>
      <div class="auto-btn3"></div>
      <div class="auto-btn4"></div>
    </div>
    <div class="manual-navigation">
      <label for="radio1" class="manual-btn"></label>
      <label for="radio2" class="manual-btn"></label>
      <label for="radio3" class="manual-btn"></label>
      <label for="radio4" class="manual-btn"></label>
    </div>
  </div>

  <section>
    <h2>Filmes com Oscar</h2>
    <div class="carrossel-container">
      <button class="seta setaEsquerda" onclick="scrollCarrossel(this, -1)">
        &#10094;
      </button>
      <div class="carrossel"></div>
      <button class="seta setaDireita" onclick="scrollCarrossel(this, 1)">
        &#10095;
      </button>
    </div>
  </section>

  <div id="modal" class="modal">
    <div class="modal-content">
      <span class="close" onclick="fecharModal()">&times;</span>
      <img id="modal-img" src="" alt="Capa do Filme" />
      <h2 id="modal-titulo"></h2>
      <p id="modal-info"></p>
      <p id="modal-categoria"></p>
      <p id="modal-temporadas"></p>
      <p id="modal-diretor"></p>
      <p id="modal-atores"></p>
      <p id="modal-premio"></p>
      <div class="botoes">
        <a id="link-trailer" href="#" target="_blank">📺 Ver trailer</a>
      </div>
    </div>
  </div>

  <footer>&copy; 2025 Cineverse. Todos os direitos reservados.</footer>

  <script src="slider.js"></script>

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

  <script>

    const filmesOscar = [
      <?php
      require_once 'Assets/bd/FilmeDAO.php';

      $filmesComOscars = FilmeDAO::listarFilmesComOscar();

      foreach ($filmesComOscars as $filmeComOscar) {
        ?>
            {
          titulo: "<?= $filmeComOscar['titulo'] ?>",
          ano: <?= $filmeComOscar['ano'] ?>,
          classificacao: "<?= $filmeComOscar['classificacao'] ?>",
          categoria: "<?= $filmeComOscar['categoria'] ?>",
          imagem: "Assets/bd/uploads/"+"<?= $filmeComOscar['imagem'] ?>",
          diretor: "<?= $filmeComOscar['diretor'] ?>",
          elenco: "<?= $filmeComOscar['elenco'] ?>",
          oscar: <?= $filmeComOscar['oscar'] ?>,
          trailer: "<?= $filmeComOscar['trailer'] ?>"
        },
        <?php
      }
      ?>
    ];

    function abrirModal(filme) {
      document.getElementById("modal-img").src = filme.imagem;
      document.getElementById("modal-titulo").textContent = filme.titulo;
      document.getElementById(
        "modal-info"
      ).textContent = `${filme.ano} • ${filme.classificacao}`;
      document.getElementById("modal-categoria").textContent =
        "Categoria: " + filme.categoria;
      if (filme.temporadas !== undefined && filme.episodios !== undefined) {
        document.getElementById("modal-temporadas").textContent =
          `Temporadas: ${filme.temporadas} • Episódios: ${filme.episodios}`;
      } else {
        document.getElementById("modal-temporadas").textContent = "";
      }
      document.getElementById("modal-diretor").textContent =
        "Diretor: " + filme.diretor;
      document.getElementById("modal-atores").textContent =
        "Elenco: " + filme.elenco;
      if (filme.oscar !== 0) {
        if (filme.oscar == 1) {
          document.getElementById("modal-premio").textContent =
            "Premios e indicações: " + filme.oscar + " Oscar";
        }
        if (filme.oscar > 1) {
          document.getElementById("modal-premio").textContent =
            "Premios e indicações: " + filme.oscar + " Óscares";
        }
      }
      document.getElementById("link-trailer").href = filme.trailer;
      document.getElementById("modal").style.display = "flex";
    }

    function fecharModal() {
      document.getElementById("modal").style.display = "none";
    }

    function scrollCarrossel(botao, direcao) {
      const container = botao.parentElement.querySelector(".carrossel");
      const larguraItem = container.querySelector(".filme").offsetWidth + 1000;
      container.scrollBy({
        left: larguraItem * direcao,
        behavior: "smooth",
      });
    }

    function gerarFilmes(sectionSelector, filmes) {
      const container = document.querySelector(
        sectionSelector + " .carrossel"
      );
      filmes.forEach((filme) => {
        const div = document.createElement("div");
        div.className = "filme";
        div.innerHTML = `
      <img src="${filme.imagem}" alt="${filme.titulo
          }" onclick='abrirModal(${JSON.stringify(filme)})' />
      <div class="filme-info">
        <strong>${filme.titulo}</strong><br/>
        ${filme.ano} • ${filme.classificacao}
      </div>`;
        container.appendChild(div);
      });
    }

    document.addEventListener("DOMContentLoaded", () => {
      gerarFilmes("section:nth-of-type(1)", filmesOscar);
    });
  </script>
</body>

</html>