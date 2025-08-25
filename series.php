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
    <option value="AcaoAventura">Ação & Aventura</option>
    <option value="FiccaoCientifica">Ficção Científica</option>
    <option value="Comedia">Comédia</option>
    <option value="Drama">Drama</option>
    <option value="Anime">Anime</option>
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

  <section class="Comedia">
    <h2>😂 Comédia</h2>
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

  <section class="Anime">
    <h2>🎩 Anime</h2>
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
      <p id="modal-episodios"></p>
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


    const seriesAcao = [
      {
        titulo: "Stranger Things",
        ano: 2016,
        classificacao: "16 anos",
        sinopse: "Um grupo de crianças enfrenta forças sobrenaturais e experimentos secretos em sua pequena cidade.",
        imagem: "https://br.web.img2.acsta.net/pictures/19/07/10/20/01/2331295.jpg",
        imagemModal: "https://upload.wikimedia.org/wikipedia/commons/3/38/Stranger_Things_logo.png",
        diretor: "Os Irmãos Duffer",
        atores: "Millie Bobby Brown, Finn Wolfhard, David Harbour",
        episodios: "4 temporadas (34 episódios)",
        premios: "https://www.imdb.com/title/tt4574334/awards",
        trailer: "https://www.youtube.com/watch?v=mnd7sFt5c3A"
      },
    ];
    const seriesFiccao = [
      {
        titulo: "Dark",
        ano: 2017,
        classificacao: "16 anos",
        sinopse: "Em uma pequena cidade alemã, o desaparecimento de duas crianças expõe segredos obscuros e viagens no tempo.",
        imagem: "https://br.web.img2.acsta.net/pictures/19/06/11/21/33/0075880.jpg",
        imagemModal: "https://i.ytimg.com/vi/JCCssUOtn2E/maxresdefault.jpg",
        diretor: "Baran bo Odar",
        atores: "Louis Hofmann, Karoline Eichhorn, Lisa Vicari",
        episodios: "3 temporadas (26 episódios)",
        premios: "https://www.imdb.com/title/tt5753856/awards",
        trailer: "https://www.youtube.com/watch?v=rrwycJ08PSA"
      },
    ];

    const seriesComedia = [
      {
        titulo: "Brooklyn Nine-Nine",
        ano: 2013,
        classificacao: "14 anos",
        sinopse: "Um grupo de detetives irreverentes trabalha no fictício 99º distrito policial do Brooklyn.",
        imagem: "https://m.media-amazon.com/images/I/61RwF2h7nZL._AC_UF1000,1000_QL80_DpWeblab_.jpg",
        imagemModal: "https://m.media-amazon.com/images/S/pv-target-images/bd21530bf1cf2bb2cc0b70b03a4f0f544ef612f29d93d014c4a0cb7650b7c33c.jpg",
        diretor: "Dan Goor, Michael Schur",
        atores: "Andy Samberg, Terry Crews, Andre Braugher",
        episodios: "8 temporadas (153 episódios)",
        premios: "https://www.imdb.com/title/tt2467372/awards",
        trailer: "https://www.youtube.com/watch?v=HblwLcAR4r4"
      },
    ];

    const seriesDrama = [
      {
        titulo: "Breaking Bad",
        ano: 2008,
        classificacao: "18 anos",
        sinopse: "Um professor de química do ensino médio vira fabricante de metanfetamina após ser diagnosticado com câncer terminal.",
        imagem: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRn_VUvljXNj8KS4Yn_PO-0W6j0GPR2b525BA&s",
        imagemModal: "https://static.wikia.nocookie.net/assista-series/images/5/56/Breaking-Bad.jpg/revision/latest/scale-to-width-down/1200?cb=20150528205254&path-prefix=pt-br",
        diretor: "Vince Gilligan",
        atores: "Bryan Cranston, Aaron Paul, Anna Gunn",
        episodios: "5 temporadas (62 episódios)",
        premios: "https://www.imdb.com/title/tt0903747/awards",
        trailer: "https://www.youtube.com/watch?v=HhesaQXLuRY"
      },
    ];

    const seriesAnime = [
      {
        titulo: "Attack on Titan",
        ano: 2013,
        classificacao: "16 anos",
        sinopse: "Humanidade vive cercada por muralhas gigantes para se proteger de titãs devoradores de humanos.",
        imagem: "https://m.media-amazon.com/images/M/MV5BZjliODY5MzQtMmViZC00MTZmLWFhMWMtMjMwM2I3OGY1MTRiXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg",
        imagemModal: "https://p2.trrsf.com/image/fget/cf/1200/630/middle/images.terra.com/2022/01/14/attack-on-titan-capa.jpg",
        diretor: "Tetsurō Araki",
        atores: "Yuki Kaji, Yui Ishikawa, Marina Inoue",
        episodios: "4 temporadas (87 episódios)",
        premios: "https://www.imdb.com/title/tt2560140/awards",
        trailer: "https://www.youtube.com/watch?v=MGRm4IzK1SQ"
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
      document.getElementById("modal-episodios").textContent = filme.episodios;
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

    function gerarSeries(sectionSelector, series) {
      const container = document.querySelector(
        sectionSelector + " .carrossel"
      );
      series.forEach((filme) => {
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
      gerarSeries("section:nth-of-type(1)", seriesAcao);
      gerarSeries("section:nth-of-type(2)", seriesFiccao);
      gerarSeries("section:nth-of-type(3)", seriesComedia);
      gerarSeries("section:nth-of-type(4)", seriesDrama);
      gerarSeries("section:nth-of-type(5)", seriesAnime);

    });
  </script>
</body>

</html>