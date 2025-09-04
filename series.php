<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Séries | Cineverse</title>
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

  <?php
  require_once "Assets/bd/CategoriaDAO.php";
  $categorias = CategoriaDAO::listar();
  ?>

  <section class="todos">
    <h2>Todas as Séries</h2>
    <div class="carrossel-container">
      <button class="seta setaEsquerda" onclick="scrollCarrossel(this, -1)">&#10094;</button>
      <div class="carrossel"></div>
      <button class="seta setaDireita" onclick="scrollCarrossel(this, 1)">&#10095;</button>
    </div>
  </section>

  <?php foreach ($categorias as $categoria): ?>
    <section data-categoria="<?= $categoria['idcategoria'] ?>">
      <h2><?= $categoria['nomecategoria'] ?></h2>
      <div class="carrossel-container">
        <button class="seta setaEsquerda" onclick="scrollCarrossel(this, -1)">&#10094;</button>
        <div class="carrossel"></div>
        <button class="seta setaDireita" onclick="scrollCarrossel(this, 1)">&#10095;</button>
      </div>
    </section>
  <?php endforeach; ?>



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


    const series = [
      <?php
      require_once 'Assets/bd/SerieDAO.php';

      $series = SerieDAO::listarSeries();

      foreach ($series as $serie) {
        ?>
                      {
          titulo: "<?= $serie['titulo'] ?>",
          ano: <?= $serie['ano'] ?>,
          classificacao: "<?= $serie['classificacao'] ?>",
          categoria: "<?= $serie['idcategoria'] ?>",
          categorianome: "<?= $serie['categoria'] ?>",
          episodios: "<?= $serie['episodios'] ?>",
          temporadas: "<?= $serie['temporadas'] ?>",
          imagem: "Assets/bd/uploads/" + "<?= $serie['imagem'] ?>",
          diretor: "<?= $serie['diretor'] ?>",
          elenco: "<?= $serie['elenco'] ?>",
          oscar: <?= $serie['oscar'] ?>,
          trailer: "<?= $serie['trailer'] ?>"
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
        "Categoria: " + filme.categorianome;
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

    function gerarSeries(sectionSelector, series, categoria = null) {
      const container = document.querySelector(sectionSelector + " .carrossel");
      container.innerHTML = "";

      series.forEach((filme) => {
        if (categoria === null || filme.categoria == categoria) {
          const div = document.createElement("div");
          div.className = "filme";
          div.innerHTML = `
          <img src="${filme.imagem}" alt="${filme.titulo}"
               onclick='abrirModal(${JSON.stringify(filme)})' />
          <div class="filme-info">
            <strong>${filme.titulo}</strong><br/>
            ${filme.ano} • ${filme.classificacao}
          </div>`;
          container.appendChild(div);
        }
      });
    }

    document.addEventListener("DOMContentLoaded", () => {
      
      gerarSeries("section.todos", series);

      
      document.querySelectorAll("section[data-categoria]").forEach(section => {
        const idCategoria = section.getAttribute("data-categoria");
        gerarSeries(`section[data-categoria="${idCategoria}"]`, series, idCategoria);
      });
    });

  </script>
</body>

</html>