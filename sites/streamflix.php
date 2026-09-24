<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>StreamFlix</title>
  <link
    href="https://fonts.googleapis.com/css2?family=Bebas+Neue&amp;family=DM+Sans:wght@300;400;500;600&amp;display=swap"
    rel="stylesheet">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
    integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- ════════════════════════════════════════════════════ MODALS -->

  <!-- LOGIN -->
  <div class="overlay" id="loginOverlay">
    <div class="modal">
      <button class="modal-close" onclick="closeModal('loginOverlay')">
        ✕
      </button>
      <h2>Inloggen</h2>
      <p class="sub">Welkom terug bij StreamFlix</p>
      <form action="" method="post">
        <label>E-mailadres</label>
        <input type="email" name="email" id="loginEmail" required placeholder="jouw@email.nl">
        <label>Wachtwoord</label>
        <input type="password" name="password" id="loginPass" required placeholder="••••••••">
        <input type="submit" name="login" class="btn-primary">
        <div class="switch-link">
          Nog geen account?
          <a onclick="switchModal('loginOverlay', 'registerOverlay')">Aanmelden</a>
        </div>
      </form>
    </div>
  </div>

  <!-- REGISTER -->
  <div class="overlay" id="registerOverlay">
    <div class="modal">
      <button class="modal-close" onclick="closeModal('registerOverlay')">
        ✕
      </button>
      <h2>Account aanmaken</h2>
      <p class="sub">Gratis starten — altijd opzegbaar</p>
      <form action="" method="get">
        <label>Naam</label>
        <input type="text" name="regName" id="regName" required placeholder="Jouw naam">
        <label>E-mailadres</label>
        <input type="email" name="regEmail" id="regEmail" required placeholder="jouw@email.nl">
        <label>Wachtwoord</label>
        <input type="password" name="regPass" id="regPass" required placeholder="Minimaal 8 tekens">
        <button type="submit" class="btn-primary red" name="register">
          Account aanmaken
        </button>
      </form>
      <div class="switch-link">
        Al een account?
        <a onclick="switchModal('registerOverlay', 'loginOverlay')">Inloggen</a>
      </div>
    </div>
  </div>

  <!-- ════════════════════════════════════════════════════ NAVBAR -->
  <nav id="navbar" class="scrolled">
    <a class="nav-logo" href="#">STREAMFLIX</a>
    <ul class="nav-links">
      <li>
        <a href="#" class="active">Home</a>
      </li>
      <li><a href="#">Series</a></li>
      <li><a href="#">Films</a></li>
      <li><a href="#">Nieuw &amp; Populair</a></li>
      <li>
        <a href="#" id="favNavLink" style="display: none">Mijn Lijst ❤️</a>
      </li>
    </ul>
    <div class="nav-right">
      <div id="guestButtons">
        <button class="btn-nav" onclick="openModal('loginOverlay')">
          Inloggen
        </button>
        <button
          class="btn-nav primary"
          onclick="openModal('registerOverlay')">
          Aanmelden
        </button>
      </div>
      <div id="userArea" style="display: none">
        <div class="nav-user" onclick="toggleDropdown()">
          <div class="avatar" id="userAvatar">?</div>

          <div class="profile-dropdown" id="profileDropdown">
            <a>❤️ Mijn Lijst</a>
            <hr>
            <button>⬅ Uitloggen</button>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <!-- ════════════════════════════════════════════════════ MAIN CONTENT -->
  <main id="mainContent">
    <!-- HERO -->
    <section class="hero">
      <div
        class="hero-bg"
        style="
            background: url('49627.webp')
              center / cover no-repeat;
          "></div>
      <div class="hero-content">
        <h1>The Super Mario Galaxy Movie</h1>
        <div class="hero-meta">
          <span class="match">97% Match</span>
          <span>2026</span>
          <span class="rating-badge">6+</span>
          <span>1u 38m</span>
          <span>4K Ultra HD</span>
        </div>
        <p class="hero-desc">
          Mario en Luigi, de loodgietertweeling, gaan in het
          Paddenstoelenrijk, waar ze nu wonen, met volle moed alledaagse
          problemen te lijf.
        </p>

        <div class="hero-actions">
          <button class="btn-hero play">
            <i class="fa-solid fa-play"></i>
            Afspelen
          </button>
        </div>
      </div>
    </section>

    <!-- GENRE TAGS -->
    <div class="genre-tags">
      <button class="tag active">Alles</button>
      <button class="tag">Actie</button>
      <button class="tag">Drama</button>
      <button class="tag">Komedie</button>
      <button class="tag">Sci-Fi</button>
      <button class="tag">Horror</button>
      <button class="tag">Thriller</button>
      <button class="tag">Documentaire</button>
      <button class="tag">Animatie</button>
    </div>

    <div class="content" id="homeRows">
      <!-- CONTINUE WATCHING -->
      <div class="row continue">
        <div class="row-header">
          <span class="row-title">Verder kijken</span>
        </div>
        <div class="cards-wrapper">
          <div class="cards" id="continueCards">
            <div class="card">
              <img
                src="https://media.themoviedb.org/t/p/w533_and_h300_face/7cqKGQMnNabzOpi7qaIgZvQ7NGV.jpg" alt="The Boys">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=30"><a href="movie.php?id=1">The Boys</a></a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">97%</span>
                </div>
              </div>
              <progress value="32" max="100"> 32% </progress>
            </div>
            <div class="card">
              <img
                src="https://placehold.co/185x105" alt="Ready or Not: Here I Come">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=33">Ready or Not: Here I Come</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">94%</span>
                </div>
              </div>
              <progress value="32" max="100"> 32% </progress>
            </div>
            <div class="card">
              <img
                src="https://media.themoviedb.org/t/p/w533_and_h300_face/8Tfys3mDZVp4tNoH2ktm06a0Tau.jpg" alt="Project Hail Mary">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=23">Project Hail Mary</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">90%</span>
                </div>
              </div>
              <progress value="32" max="100"> 32% </progress>
            </div>
            <div class="card">
              <img
                src="https://placehold.co/185x105" alt="20 Days in Mariupol">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=35">20 Days in Mariupol</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">98%</span>
                </div>
              </div>
              <progress value="32" max="100"> 32% </progress>
            </div>
            <div class="card">
              <img src="https://placehold.co/185x105" alt="Poor Things">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=3">Poor Things</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">88%</span>
                </div>
              </div>
              <progress value="32" max="100"> 32% </progress>
            </div>
          </div>
        </div>
      </div>

      <!-- Favorites -->
      <div class="row">
        <div class="row-header">
          <span class="row-title">Jouw Favorieten</span>
        </div>
        <div class="cards-wrapper">
          <div class="cards" id="newCards">
            <div class="card">
              <img src="https://placehold.co/185x105" alt="Monkey Man">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=8">Monkey Man</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart active" title="Aan lijst toevoegen">
                    <i class="fa-solid fa-heart"></i>
                  </button>
                  <span class="card-rating">80%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img
                src="https://image.tmdb.org/t/p/w500/xRd1eJIDe7JHO5u4gtEYwGn5wtf.jpg" alt="Godzilla x Kong">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=9">Godzilla x Kong</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart active" title="Aan lijst toevoegen">
                    <i class="fa-solid fa-heart"></i>
                  </button>
                  <span class="card-rating">86%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img
                src="https://image.tmdb.org/t/p/w500/sh7Rg8Er3tFcN9BpKIPOMvALgZd.jpg" alt="Civil War">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=10">Civil War</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart active" title="Aan lijst toevoegen">
                    <i class="fa-solid fa-heart"></i>
                  </button>
                  <span class="card-rating">88%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img
                src="https://placehold.co/185x105" alt="Ghostbusters: Frozen Empire">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Ghostbusters: Frozen Empire</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart active" title="Aan lijst toevoegen">
                    <i class="fa-solid fa-heart"></i>
                  </button>
                  <span class="card-rating">79%</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- TRENDING -->
      <div class="row">
        <div class="row-header">
          <span class="row-title">🔥 Trending nu</span>
        </div>
        <div class="cards-wrapper">
          <div class="cards" id="trendingCards">
            <div class="card">
              <img
                src="https://media.themoviedb.org/t/p/w533_and_h300_face/7cqKGQMnNabzOpi7qaIgZvQ7NGV.jpg" alt="The Boys">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">The Boys</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">97%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="https://placehold.co/185x105" alt="Oppenheimer">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=2">Oppenheimer</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">95%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="https://placehold.co/185x105" alt="Poor Things">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=3">Poor Things</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">88%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img
                src="https://placehold.co/185x105" alt="The Zone of Interest">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=4">The Zone of Interest</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">92%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img
                src="https://placehold.co/185x105" alt="Killers of the Flower Moon">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Killers of the Flower Moon</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">93%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="https://placehold.co/185x105" alt="Saltburn">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=5">Saltburn</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">85%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img
                src="https://image.tmdb.org/t/p/w500/qhb1qOilapbapxWQn9jtRCMwXJF.jpg" alt="Wonka">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=6">Wonka</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">82%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="https://placehold.co/185x105" alt="Maestro">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Maestro</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">87%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="https://placehold.co/185x105" alt="Past Lives">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=7">Past Lives</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">94%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img
                src="https://placehold.co/185x105" alt="American Fiction">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">American Fiction</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">91%</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



      <!-- ACTION -->
      <div class="row">
        <div class="row-header">
          <span class="row-title">Actie &amp; Avontuur</span>
        </div>
        <div class="cards-wrapper">
          <div class="cards" id="actionCards">
            <div class="card">
              <img
                src="https://media.themoviedb.org/t/p/w533_and_h300_face/8Tfys3mDZVp4tNoH2ktm06a0Tau.jpg" alt="Project Hail Mary">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Project Hail Mary</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">90%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="https://placehold.co/185x105" alt="Fast X">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Fast X</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">75%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img
                src="https://image.tmdb.org/t/p/w500/7gKI9hpEMcZUQpNgKrkDzJpbnNS.jpg" alt="Extraction 2">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Extraction 2</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">82%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img
                src="https://placehold.co/185x105" alt="Mission: Impossible Dead Reckoning">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Mission: Impossible Dead Reckoning</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">92%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="https://placehold.co/185x105" alt="Aquaman 2">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Aquaman 2</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">71%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="https://placehold.co/185x105" alt="Indiana Jones 5">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Indiana Jones 5</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">78%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="https://placehold.co/185x105" alt="Gran Turismo">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Gran Turismo</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">81%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img
                src="https://image.tmdb.org/t/p/w500/bcM2Tl5HlsvPBnL8DKP9Ie6vU4r.jpg" alt="Atlas">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Atlas</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">74%</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- DRAMA -->
      <div class="row">
        <div class="row-header">
          <span class="row-title">Drama &amp; Emotie</span>
        </div>
        <div class="cards-wrapper">
          <div class="cards" id="dramaCards">
            <div class="card">
              <img src="https://placehold.co/185x105" alt="Cabrini">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Cabrini</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">86%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="https://placehold.co/185x105" alt="The Holdovers">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">The Holdovers</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">96%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img
                src="https://placehold.co/185x105" alt="All of Us Strangers">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">All of Us Strangers</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">94%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="https://placehold.co/185x105" alt="Ferrari">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Ferrari</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">84%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="https://placehold.co/185x105" alt="Nyad">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Nyad</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">85%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="https://placehold.co/185x105" alt="Rustin">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Rustin</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">82%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="https://placehold.co/185x105" alt="Fingernails">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Fingernails</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">80%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="https://placehold.co/185x105" alt="Priscilla">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Priscilla</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">83%</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- COMEDY -->
      <div class="row">
        <div class="row-header">
          <span class="row-title">Komedie</span>
        </div>
        <div class="cards-wrapper">
          <div class="cards" id="comedyCards">
            <div class="card">
              <img
                src="https://placehold.co/185x105" alt="Ready or Not: Here I Come">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Ready or Not: Here I Come</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">94%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="https://placehold.co/185x105" alt="The Holdovers">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">The Holdovers</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">93%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img
                src="https://placehold.co/185x105" alt="You Are So Not Invited">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">You Are So Not Invited</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">77%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="https://placehold.co/185x105" alt="Self Reliance">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Self Reliance</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">79%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="https://placehold.co/185x105" alt="Ricky Stanicky">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Ricky Stanicky</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">75%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="https://placehold.co/185x105" alt="Irish Wish">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Irish Wish</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">68%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="https://placehold.co/185x105" alt="Upgraded">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Upgraded</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">72%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="https://placehold.co/185x105" alt="Unfrosted">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Unfrosted</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">70%</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- NL ORIGINALS -->
      <div class="row">
        <div class="row-header">
          <span class="row-title">🇳🇱 Nederlandse Originals</span>
        </div>
        <div class="cards-wrapper">
          <div class="cards" id="nlCards">
            <div class="card">
              <img src="https://placehold.co/185x105" alt="De Oost">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">De Oost</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">88%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="https://placehold.co/185x105" alt="Misfit: De Film">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Misfit: De Film</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">79%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="https://placehold.co/185x105" alt="Layla M.">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Layla M.</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">83%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img
                src="https://placehold.co/185x105" alt="Gooische Vrouwen 2">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Gooische Vrouwen 2</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">74%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="https://placehold.co/185x105" alt="Wolf">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Wolf</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">80%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="https://placehold.co/185x105" alt="Brimstone">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Brimstone</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">78%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img
                src="https://placehold.co/185x105" alt="Verliefd op Ibiza">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Verliefd op Ibiza</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">71%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="https://placehold.co/185x105" alt="Sneekweek">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Sneekweek</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">76%</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- DOCUMENTARY -->
      <div class="row">
        <div class="row-header">
          <span class="row-title">Documentaires</span>
        </div>
        <div class="cards-wrapper">
          <div class="cards" id="docsCards">
            <div class="card">
              <img
                src="https://placehold.co/185x105" alt="20 Days in Mariupol">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">20 Days in Mariupol</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">98%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img
                src="https://placehold.co/185x105" alt="Still: A Michael J. Fox Movie">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Still: A Michael J. Fox Movie</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">97%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img
                src="https://placehold.co/185x105" alt="My Imaginary Country">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">My Imaginary Country</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">90%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="https://placehold.co/185x105" alt="Stutz">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Stutz</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">89%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="https://placehold.co/185x105" alt="Icarus">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Icarus</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">93%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img
                src="https://placehold.co/185x105" alt="Making a Murderer">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Making a Murderer</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">95%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img
                src="https://placehold.co/185x105" alt="The Social Dilemma">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">The Social Dilemma</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">92%</span>
                </div>
              </div>
            </div>
            <div class="card">
              <img src="https://placehold.co/185x105" alt="Our Planet">
              <div class="card-overlay">
                <div class="card-title"><a href="movie.php?id=1">Our Planet</a></div>
                <div class="card-actions">
                  <button class="card-btn card-play-btn" title="Afspelen">
                    <i class="fa-solid fa-play"></i>
                  </button>
                  <button
                    class="card-btn heart" title="Aan lijst toevoegen">
                    <i class="fa-regular fa-heart"></i>
                  </button>
                  <span class="card-rating">96%</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /homeRows -->
  </main>

  <!-- ════════════════════════════════════════════════════ FOOTER -->
  <footer>
    <div class="footer-grid">
      <div>
        <h4>StreamFlix</h4>
        <a href="#">Over ons</a>
        <a href="#">Carrière</a>
        <a href="#">Pers</a>
      </div>
      <div>
        <h4>Hulp</h4>
        <a href="#">Helpcentrum</a>
        <a href="#">Contact</a>
        <a href="#">Apparaten</a>
      </div>
      <div>
        <h4>Account</h4>
        <a href="#">Abonnement</a>
        <a href="#">Privacy</a>
        <a href="#">Instellingen</a>
      </div>
      <div>
        <h4>Juridisch</h4>
        <a href="#">Gebruiksvoorwaarden</a>
        <a href="#">Cookiebeleid</a>
        <a href="#">AVG / GDPR</a>
      </div>
    </div>
    <div class="footer-bottom">
      <span class="footer-logo">STREAMFLIX</span>
      <span class="footer-copy">© 2026 StreamFlix B.V. — Utrecht, Nederland</span>
    </div>
  </footer>

  <script src="assets/js/script.js"></script>
</body>

</html>
