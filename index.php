<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Accueil</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">


  <link rel="stylesheet" href="assets/css/index.css">
</head>


<body>

  <!-- Header -->
  <?php include('includes/navbar.php') ?>

  <!-- Hero -->
  <section class="hero fade-in delay-1">
    <h1 class="display-5 fw-bold" id="title1">Parce que chaque fin<br>mérite un dernier mot.</h1>
    <p class="lead mt-3 delay-2 fade-in">Ici, on ne tourne pas la page...<br>On la <b>brûle</b>, on la <b>customise</b>, et on la <b>partage</b>.</p>
    <a href="auth/login.php" class="btn btn-dark btn-lg mt-3 rounded-pill fade-in delay-3">Créer une page</a>
    <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
      <small>✨ Une carte rapide pour chacun</small>
      <small>⚡ En ligne en quelques clics</small>
      <small>📦 Les pages à partager dans la galerie</small>
    </div>
  </section>


  <!-- Gradient Notes Section -->
  <section class="gradient-section container">
    <div class="row gy-4"></div>
  </section>


  <!-- Features -->
  <section class="features container">
  <div class="row" data-aos="fade-up" data-aos-delay="900">  
    <h6 class="text-danger mb-2">Comment fonctionne TheEnd ?</h6>
    <h2 class="fw-bold mb-5" id="title2">Tu quittes quelque chose ou quelqu’un ?<br>Fais-le avec style.</h2>
  </div>

    <div class="row text-center" data-aos="fade-up" data-aos-delay="900">
      <div class="col-md-3">
        <img src="assets/img/palette.png" class="img-fluid w-25">
        <p><b>Choisis ton style</b></p>
        <p>Rageur, doux-amer ou carrément cringe — tout est permis.</p>
      </div>
      <div class="col-md-3">
        <img src="assets/img/pen.png" class="img-fluid w-25">
        <p><b>Écris ton dernier mot</b></p>
        <p>Un message, une lettre, un cri du cœur ou un gif de chat qui pleure. Libre à toi.</p>
      </div>
      <div class="col-md-3">
        <img src="assets/img/paper.png" class="img-fluid w-25">
        <p><b>Personnalise ta page</b></p>
        <p>Couleurs, sons, emojis, gifs, effets… fais-toi plaisir.</p>
      </div>
      <div class="col-md-3">
        <img src="assets/img/airplane.png" class="img-fluid w-25">
        <p><b>Partage le lien</b></p>
        <p>À ton boss, ton ex, ton groupe WhatsApp ou au monde entier. Ou garde-le pour toi.</p>
      </div>
    </div>
  </section>

  <!-- Section 1 -->
  <section class="section-highlight container fade-in delay-1">
    <div class="row">
      <div class="col-md-6">
        <img src="assets/img/palmsupguy.png">
      </div>
      <div class="col-md-6" data-aos="fade-up" data-aos-delay="900">
        <p class="text-orange">C’est la fin ? Fête ça dignement.</p>
        <h3 class="fw-bold" id="title2">Ne pars pas sans dire un dernier mot.</h3>
        <p class="mt-3">TheEnd t’aide avec une plateforme pour créer ta page de départ pleine de style (ou de larmes).</p>
        <a href="auth/login.php" class="btn-custom">Créer une page</a>
      </div>
    </div>
  </section>

  <!-- Section 2 -->
  <section class="section-highlight container fade-in delay-1">
    <div class="row flex-md-row-reverse">
      <div class="col-md-6">
        <img src="assets/img/palmsupgirl.png">
      </div>
      <div class="col-md-6" data-aos="fade-up" data-aos-delay="900">
        <p class="text-orange">C’est la fin ? Fête ça dignement.</p>
        <h3 class="fw-bold" id="title2">Pourquoi faire ça ?</h3>
        <p class="mt-3">Parce que parfois, une fin ça peut aussi faire du bien. Parce qu'il faut laisser une trace de tout ce qu'on a perdu.</p>
        <a href="auth/login.php" class="btn-custom">Créer une page</a>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    once: true
  });
</script>


</body>
</html>
