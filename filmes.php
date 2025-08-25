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
    <option value="AcaoAventura">Ação & Aventura</option>
    <option value="FiccaoCientifica">Ficção Científica</option>
    <option value="Drama">Drama</option>
  </select>

  <section class="AcaoAventura">
    <h2>🗺 Ação & Aventura</h2>
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

  <section class="FiccaoCientifica">
    <h2>🥼 Ficção Científica</h2>
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

  <section class="Drama">
    <h2>😭 Drama</h2>
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
      <p id="modal-diretor"></p>
      <p id="modal-atores"></p>
      <p id="modal-sinopse"></p>
      <a id="modal-premio" href="#"></a>
      <div class="botoes">
        <a id="link-trailer" href="#" target="_blank">📺 Ver trailer</a>
      </div>
    </div>
  </div>

  <footer id="footer">&copy; 2025 Cineverse. Todos os direitos reservados.</footer>

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

    const filmesAcao = [
      {
        titulo: "Indiana Jones e os Caçadores da Arca Perdida",
        ano: 1981,
        classificacao: "12 anos",
        sinopse: "O arqueólogo Indiana Jones precisa impedir que nazistas consigam a Arca da Aliança.",
        imagem: "https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTfzBLlHpWlDVIJeuRiarxcjawNdZilGtoUkQ2i_A08-vOjPk29kUq2KmgBoW-HbSc5w_JSQAvBpcI44wS2B8yp872dnjvD0hi_o6lcsQ",
        imagemModal: "https://i.ytimg.com/vi/8A-yxXlmGcM/maxresdefault.jpg",
        diretor: "Steven Spielberg",
        atores: "Harrison Ford, Karen Allen, Paul Freeman",
        episodios: "Filme único",
        premios: "https://www.imdb.com/title/tt0082971/awards",
        trailer: "https://www.youtube.com/watch?v=XkkzKHCx154"
      },
    ];

    const filmesFiccao = [
      {
        titulo: "Interestelar",
        ano: 2014,
        classificacao: "12 anos",
        sinopse: "Um grupo de astronautas viaja por um buraco de minhoca em busca de um novo lar para a humanidade.",
        imagem: "https://estantedasala.com/wp-content/uploads/2014/11/interstellar.jpg",
        imagemModal: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTm69TbeLGdS43Ir19Eniv4UrSIfhvv-HxGIw&s",
        diretor: "Christopher Nolan",
        atores: "Matthew McConaughey, Anne Hathaway, Jessica Chastain",
        episodios: "Filme único",
        premios: "https://www.imdb.com/title/tt0816692/awards",
        trailer: "https://www.youtube.com/watch?v=zSWdZVtXT7E"
      },
    ];

    const filmesDrama = [
      {
        titulo: "A Espera de um Milagre",
        ano: 1999,
        classificacao: "16 anos",
        sinopse: "Um guarda de prisão desenvolve uma conexão especial com um prisioneiro com poderes misteriosos.",
        imagem: "https://br.web.img2.acsta.net/medias/nmedia/18/91/66/66/20156966.jpg",
        imagemModal: "https://aventurasnahistoria.com.br/media/uploads/2024/04/a-espera-de-um-milagre.jpg",
        diretor: "Frank Darabont",
        atores: "Tom Hanks, Michael Clarke Duncan",
        episodios: "Filme único",
        premios: "https://www.imdb.com/title/tt0120689/awards",
        trailer: "https://www.youtube.com/watch?v=Ki4haFrqSrw"
      },
    ];


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

    function abrirModal(filme) {
      document.getElementById("modal-img").src = filme.imagemModal;
      document.getElementById("modal-titulo").textContent = filme.titulo;
      document.getElementById(
        "modal-info"
      ).textContent = `${filme.ano} • ${filme.classificacao}`;
      document.getElementById("modal-diretor").textContent =
        "Diretor: " + filme.diretor;
      document.getElementById("modal-atores").textContent =
        "Atores Principais: " + filme.atores;
      document.getElementById("modal-sinopse").textContent =
        "Sinopse: " + filme.sinopse;
      if (filme.premios !== "") {
        document.getElementById("modal-premio").textContent =
          "Premios e indicações";
        document.getElementById("modal-premio").href = filme.premios;
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

    document.addEventListener("DOMContentLoaded", () => {
      gerarFilmes("section:nth-of-type(1)", filmesAcao);
      gerarFilmes("section:nth-of-type(2)", filmesFiccao);
      gerarFilmes("section:nth-of-type(3)", filmesDrama);
    });
  </script>
</body>

</html>