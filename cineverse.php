<!--

- tirar slider por outro (https://www.youtube.com/watch?v=BpzyuuPIEaQ&t=246s)

- listar filmes

- listar séries

- Oscar

-->

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

  <div class="slider">
    <div class="slides">
      <input type="radio" name="radio-btn" id="radio1">
      <input type="radio" name="radio-btn" id="radio1">
      <input type="radio" name="radio-btn" id="radio1">
      <input type="radio" name="radio-btn" id="radio1">

      <div class="slide-first">
        <img src="" alt="img 1">
      </div>
      <div class="slide">
        <img src="" alt="img 2">
      </div>
      <div class="slide">
        <img src="" alt="img 3">
      </div>
      <div class="slide">
        <img src="" alt="img 4">
      </div>
    </div>

  </div>

  <section id="slider" class="slider">
    <div class="slider-content">
      <h1 id="slider-title">Duna: Parte 2</h1>
    </div>
  </section>

  <section>
    <h2>🚀 Lançamentos</h2>
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

  <section>
    <h2>🏆 Filmes que ganharam Oscar</h2>
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
      <p id="modal-diretor"></p>
      <p id="modal-atores"></p>
      <p id="modal-sinopse"></p>
      <a id="modal-premio" href="#"></a>
      <div class="botoes">
        <a id="link-trailer" href="#" target="_blank">📺 Ver trailer</a>
      </div>
    </div>
  </div>

  <footer>&copy; 2025 Cineverse. Todos os direitos reservados.</footer>

  <script>
    const destaques = [
        {
        titulo: "Duna: Parte 2",
        imagem:
          "https://ingresso-a.akamaihd.net/prd/img/movie/duna-parte-2/04a173f7-6d58-49d3-91de-20f6a07e9513.webp",
        link: "https://www.youtube.com/watch?v=Way9Dexny3w",
      },
      {
        titulo: "Oppenheimer",
        imagem:
          "https://www.thebanner.org/sites/default/files/styles/article_detail_header/public/2023-08/MM-1207%20Oppenheimer.jpg?itok=0U-jOPJC",
        link: "https://www.youtube.com/watch?v=F3OxA9Cz17A&t=21s",
      },
      {
        titulo: "Tudo em Todo Lugar ao Mesmo Tempo",
        imagem:
          "https://resenhandosonhos.com/wp-content/uploads/2023/01/tudo-em-todo-o-lugar-ao-mesmo-tempo-capa-920x530.png",
        link: "https://www.youtube.com/watch?v=kULcXm9V7aY",
      },
    ];
    const filmesLancamento = [
      {
        titulo: "Sentimental Value",
        tipo: "Filme",
        ano: 2025,
        classificacao: "16 anos",
        sinopse: "Duas irmãs se reconectam com seu pai cineasta após a morte da mãe, explorando traumas familiares e reconciliação.",
        imagem: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMF3DoXj2jL06TzaLS2HhrtfQQS-W-0blMIA&s",
        imagemModal: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgaj88ruXMsz3cqBtbVx1aMrsbYqiqJCd_xg&s",
        diretor: "Joachim Trier",
        atores: "Renate Reinsve, Stellan Skarsgård, Elle Fanning",
        episodios: "Filme único",
        premios: "https://decider.com/2025/05/22/joachim-trier-sentimental-value-movie-review-cannes-film-festival-2025/",
        trailer: "https://www.youtube.com/watch?v=example"
      },
    ]
    const filmesOscar = [
      {
        titulo: "Titanic",
        ano: 1997,
        classificacao: "12 anos",
        sinopse: "O romance de Jack e Rose a bordo do famoso navio Titanic.",
        imagem: "https://upload.wikimedia.org/wikipedia/pt/2/22/Titanic_poster.jpg",
        imagemModal: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQx8RrMCgLd_qQx8hJLc2XWpugzvYqrBTeBdg&s",
        diretor: "James Cameron",
        atores: "Leonardo DiCaprio, Kate Winslet",
        episodios: "Filme único",
        premios: "11 Oscars, incluindo Melhor Filme",
        trailer: "https://www.youtube.com/watch?v=CHekzSiZjrY"
      }
    ];


    const slider = document.getElementById("slider");
    const sliderTitle = document.getElementById("slider-title");
    let slideAtual = 0;

    slider.style.backgroundImage = `url('${destaques[0].imagem}')`;
    sliderTitle.textContent = destaques[0].titulo;

    function trocarSlide() {
      slideAtual = (slideAtual + 1) % destaques.length;
      const destaque = destaques[slideAtual];
      slider.style.backgroundImage = `url('${destaque.imagem}')`;
      sliderTitle.textContent = destaque.titulo;
    }

    setInterval(trocarSlide, 5000);

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
      filme.premios = "";
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
      gerarFilmes("section:nth-of-type(2)", filmesLancamento);
      gerarFilmes("section:nth-of-type(3)", filmesOscar);
    });
  </script>
</body>

</html>