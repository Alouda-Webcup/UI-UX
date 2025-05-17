<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>TheEnd - Dernier mot</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #fff;
      color: #000;
    }

    .hero {
      text-align: center;
      padding: 4rem 1rem;
    }

    .gradient-section {
      background: linear-gradient(120deg, #ffe0cc, #cfd9ff, #e0ccff);
      padding: 4rem 1rem;
      border-radius: 2rem;
      margin: 2rem auto;
    }

    .card-note {
      background: white;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      padding: 1rem;
      border-radius: 1rem;
    }

    .features {
      text-align: center;
      padding: 3rem 1rem;
    }

    .features .icon {
      font-size: 2rem;
      margin-bottom: 1rem;
    }

    .section-highlight {
      padding: 4rem 1rem;
    }

    .section-highlight .text-orange {
      color: #FF6600;
      font-weight: bold;
      text-transform: uppercase;
      font-size: 0.9rem;
    }

    .btn-custom {
      background-color: #000;
      color: #fff;
      border-radius: 25px;
      padding: 0.6rem 1.5rem;
      margin-top: 1rem;
    }

    img {
      width: 100%;
      border-radius: 1rem;
    }

    @media (min-width: 768px) {
      .section-highlight .row {
        align-items: center;
      }
    }
  </style>
</head>
<body>

  <!-- Header -->
  <?php include('includes/navbar.php') ?>

  <!-- Hero -->
  <section class="hero">
    <h1 class="display-5 fw-bold">Parce que chaque fin<br>mérite un dernier mot.</h1>
    <p class="lead mt-3">Ici, on ne tourne pas la page...<br>On la brûle, on la scotche, ou on la partage.</p>
    <a href="#" class="btn btn-dark btn-lg mt-3 rounded-pill">Créer une page</a>
    <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
      <small>✨ Une carte rapide pour chacun</small>
      <small>⚡ En ligne en quelques clics</small>
      <small>📦 Les pages à partager dans la galerie</small>
    </div>
  </section>

  <!-- Gradient Notes Section -->
  <section class="gradient-section container">
    <div class="row gy-4">
      <div class="col-md-4">
        <div class="card-note">
          <img src="img1.jpg" alt="Note 1">
          <p class="mt-2">🎉 Merci pour tous ces moments !</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-note">
          <img src="img2.jpg" alt="Note 2">
          <p class="mt-2">📝 Juste un dernier mot chaleureux...</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-note">
          <img src="img3.jpg" alt="Note 3">
          <p class="mt-2">💌 Merci pour tout, on ne t'oubliera pas !</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Features -->
  <section class="features container">
    <h6 class="text-danger mb-2">Comment fonctionne TheEnd ?</h6>
    <h2 class="fw-bold mb-5">Tu quittes quelque chose ou quelqu’un ?<br>Fais-le avec style.</h2>
    <div class="row text-center">
      <div class="col-md-3">
        <div class="icon">🎨</div>
        <p>Choisis ton style</p>
      </div>
      <div class="col-md-3">
        <div class="icon">✍️</div>
        <p>Écris ton dernier mot</p>
      </div>
      <div class="col-md-3">
        <div class="icon">🧩</div>
        <p>Personnalise ta page</p>
      </div>
      <div class="col-md-3">
        <div class="icon">📤</div>
        <p>Partage-la bien</p>
      </div>
    </div>
  </section>

  <!-- Section 1 -->
  <section class="section-highlight container">
    <div class="row">
      <div class="col-md-6">
        <img src="man.jpg" alt="Homme">
      </div>
      <div class="col-md-6">
        <p class="text-orange">C’est la fin ? Fête ça dignement.</p>
        <h3 class="fw-bold">Ne pars pas sans dire un dernier mot.</h3>
        <p class="mt-3">TheEnd t’aide avec une plateforme pour créer ta page de départ pleine de style (ou de larmes).</p>
        <a href="#" class="btn-custom">Créer une page</a>
      </div>
    </div>
  </section>

  <!-- Section 2 -->
  <section class="section-highlight container">
    <div class="row flex-md-row-reverse">
      <div class="col-md-6">
        <img src="woman.jpg" alt="Femme">
      </div>
      <div class="col-md-6">
        <p class="text-orange">C’est la fin ? Fête ça dignement.</p>
        <h3 class="fw-bold">Pourquoi faire ça ?</h3>
        <p class="mt-3">Parce que parfois, une fin ça peut aussi faire du bien. Parce que cette vérité-là on la “partage confidentiellement”.</p>
        <a href="#" class="btn-custom">Créer une page</a>
      </div>
    </div>
  </section>

</body>
</html>
