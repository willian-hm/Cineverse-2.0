<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Filmes | Cineverse</title>
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

  <select id="genreSelect">
    <option value="Todos">Todos</option>
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

  <section class="Todos">
    <h2>Todos os Filmes</h2>
    <div class="carrossel-container">
      <button class="seta setaEsquerda" onclick="scrollCarrossel(this, -1)">
        &#10094;
      </button>
      <div class="carrossel">

      </div>
      <button class="seta setaDireita" onclick="scrollCarrossel(this, 1)">
        &#10095;
      </button>
    </div>
  </section>

  <section class="1">
    <h2>Terror</h2>
    <div class="carrossel-container">
      <button class="seta setaEsquerda" onclick="scrollCarrossel(this, -1)">
        &#10094;
      </button>
      <div class="carrossel">

      </div>
      <button class="seta setaDireita" onclick="scrollCarrossel(this, 1)">
        &#10095;
      </button>
    </div>
  </section>

  <section class="2">
    <h2>Drama</h2>
    <div class="carrossel-container">
      <button class="seta setaEsquerda" onclick="scrollCarrossel(this, -1)">
        &#10094;
      </button>
      <div class="carrossel">

      </div>
      <button class="seta setaDireita" onclick="scrollCarrossel(this, 1)">
        &#10095;
      </button>
    </div>
  </section>

  <section class="3">
    <h2>Comédia</h2>
    <div class="carrossel-container">
      <button class="seta setaEsquerda" onclick="scrollCarrossel(this, -1)">
        &#10094;
      </button>
      <div class="carrossel">

      </div>
      <button class="seta setaDireita" onclick="scrollCarrossel(this, 1)">
        &#10095;
      </button>
    </div>
  </section>

  <section class="4">
    <h2>Aventura</h2>
    <div class="carrossel-container">
      <button class="seta setaEsquerda" onclick="scrollCarrossel(this, -1)">
        &#10094;
      </button>
      <div class="carrossel">

      </div>
      <button class="seta setaDireita" onclick="scrollCarrossel(this, 1)">
        &#10095;
      </button>
    </div>
  </section>

  <section class="5">
    <h2>Ficção</h2>
    <div class="carrossel-container">
      <button class="seta setaEsquerda" onclick="scrollCarrossel(this, -1)">
        &#10094;
      </button>
      <div class="carrossel">

      </div>
      <button class="seta setaDireita" onclick="scrollCarrossel(this, 1)">
        &#10095;
      </button>
    </div>
  </section>

  <section class="6">
    <h2>Ação</h2>
    <div class="carrossel-container">
      <button class="seta setaEsquerda" onclick="scrollCarrossel(this, -1)">
        &#10094;
      </button>
      <div class="carrossel">

      </div>
      <button class="seta setaDireita" onclick="scrollCarrossel(this, 1)">
        &#10095;
      </button>
    </div>
  </section>

  <section class="7">
    <h2>Romance</h2>
    <div class="carrossel-container">
      <button class="seta setaEsquerda" onclick="scrollCarrossel(this, -1)">
        &#10094;
      </button>
      <div class="carrossel">

      </div>
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

  <footer id="footer">&copy; 2025 Cineverse. Todos os direitos reservados.</footer>

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
    const select = document.getElementById('genreSelect');
    const sections = document.querySelectorAll('section');
    const footer = document.getElementById('footer')

    select.addEventListener('change', () => {
      const selectedGenre = select.value;

      sections.forEach(section => {
        if (selectedGenre === 'Todos') {
          section.classList.remove('hidden');
        } else {
          if (section.classList.contains(selectedGenre)) {
            section.classList.remove('hidden');
          } else {
            section.classList.add('hidden');
          }
        }
      });

      if (selectedGenre !== "Todos") {
        footer.classList.add("footerAlinhado");
      } else {
        footer.classList.remove("footerAlinhado");
      }
    });

    const filmes = [
      <?php
      require_once 'Assets/bd/FilmeDAO.php';

      $filmes = FilmeDAO::listarFilmes();

      foreach ($filmes as $filme) {
        ?>
                  {
          titulo: "<?= $filme['titulo'] ?>",
          ano: <?= $filme['ano'] ?>,
          classificacao: "<?= $filme['idclassificacao'] ?>",
          categoria: "<?= $filme['idcategoria'] ?>",
          imagem: "Assets/bd/uploads/" + "<?= $filme['imagem'] ?>",
          diretor: "<?= $filme['diretor'] ?>",
          elenco: "<?= $filme['elenco'] ?>",
          oscar: <?= $filme['oscar'] ?>,
          trailer: "<?= $filme['trailer'] ?>"
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
      const larguraItem = container.querySelector(".filme").offsetWidth + 16;
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

    function gerarFilmes1(sectionSelector, filmes) {
      const container = document.querySelector(
        sectionSelector + " .carrossel"
      );
      filmes.forEach((filme) => {
        if (filme.categoria == 1) {
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
        }

      });
    }

    function gerarFilmes2(sectionSelector, filmes) {
      const container = document.querySelector(
        sectionSelector + " .carrossel"
      );
      filmes.forEach((filme) => {
        if (filme.categoria == 2) {
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
        }

      });
    }

    function gerarFilmes3(sectionSelector, filmes) {
      const container = document.querySelector(
        sectionSelector + " .carrossel"
      );
      filmes.forEach((filme) => {
        if (filme.categoria == 3) {
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
        }

      });
    }

    function gerarFilmes4(sectionSelector, filmes) {
      const container = document.querySelector(
        sectionSelector + " .carrossel"
      );
      filmes.forEach((filme) => {
        if (filme.categoria == 4) {
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
        }

      });
    }

    function gerarFilmes5(sectionSelector, filmes) {
      const container = document.querySelector(
        sectionSelector + " .carrossel"
      );
      filmes.forEach((filme) => {
        if (filme.categoria == 5) {
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
        }

      });
    }

    function gerarFilmes6(sectionSelector, filmes) {
     const container = document.querySelector(
        sectionSelector + " .carrossel"
      );
      filmes.forEach((filme) => {
        if (filme.categoria == 6) {
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
        }

      });
    }

    function gerarFilmes7(sectionSelector, filmes) {
      const container = document.querySelector(
        sectionSelector + " .carrossel"
      );
      filmes.forEach((filme) => {
        if (filme.categoria == 7) {
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
        }

      });
    }

    document.addEventListener("DOMContentLoaded", () => {
      gerarFilmes("section:nth-of-type(1)", filmes);
      gerarFilmes1("section:nth-of-type(2)", filmes);
      gerarFilmes2("section:nth-of-type(3)", filmes);
      gerarFilmes3("section:nth-of-type(4)", filmes);
      gerarFilmes4("section:nth-of-type(5)", filmes);
      gerarFilmes5("section:nth-of-type(6)", filmes);
      gerarFilmes6("section:nth-of-type(7)", filmes);
      gerarFilmes7("section:nth-of-type(8)", filmes);
    });
  </script>
</body>

</html>