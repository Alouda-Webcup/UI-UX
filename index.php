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
  <section class="hero" data-aos="zoom-in">
    <h1 class="display-5 fw-bold" id="title1">Parce que chaque fin<br>mérite un dernier mot.</h1>
    <p class="lead mt-3 delay-2">Ici, on ne tourne pas la page...<br>On la <b>brûle</b>, on la <b>customise</b>, et on la <b>partage</b>.</p>
    <a href="auth/login.php" class="btn btn-dark btn-lg mt-3 rounded-pill">Créer une page</a>
    <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
      <small>✨ Une carte rapide pour chacun</small>
      <small>⚡ En ligne en quelques clics</small>
      <small>📦 Les pages à partager dans la galerie</small>
    </div>
  </section>
 <br>

  <!--Carousel-->
  <section>
    <div class="row">
    <h1 class="display-5 fw-bold" id="title3"> Les meilleures pages selon nos utilisateurs !</h1>
    <div class="carousel-container position-relative justify-content-center align-content-center">
      <div class="carousel-wrapper" id="custom-carousel">
  
        <!-- Frontend -->
        <div class="carousel-slide active">
          <div class="skill-box text-center">
            <h5 class="mb-4">Test</h5>
            <div class="row">
              <div class="col-6 mb-4">
                <div><strong>3</strong></div>
              </div>
            </div>
          </div>
        </div>

       
        <div class="carousel-slide">
          <div class="skill-box text-center">
            <h5 class="mb-4">Test</h5>
            <div class="row">
              <div class="col-6 mb-4">
                <div><strong>2</strong></div>
                
              </div>
            </div>
          </div>
        </div>

        
    <div class="carousel-slide">
  <div class="skill-box text-center">
    <h5 class="mb-4">Test</h5>
    <div class="row">
      <div class="col-6 mb-4">
        <div><strong>1</strong></div> 
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</section>
 
 
  <!-- Mini Tutoriel -->
  <section class="features container">
  <div class="row" data-aos="fade-up" data-aos-delay="300">  
    <h6 class="text-danger mb-2">Comment fonctionne TheEnd ?</h6>
    <h2 class="fw-bold mb-5" id="title2">Tu quittes quelque chose ou quelqu’un ?<br>Fais-le avec style.</h2>
  </div>
 
    <div class="row text-center">
      <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
        <img src="assets/img/palette.png" class="img-fluid w-25">
        <p><b>Choisis ton style</b></p>
        <p>Rageur, doux-amer ou carrément cringe — tout est permis.</p>
      </div>
      <div class="col-md-3" data-aos="fade-up" data-aos-delay="600">
        <img src="assets/img/pen.png" class="img-fluid w-25">
        <p><b>Écris ton dernier mot</b></p>
        <p>Un message, une lettre, un cri du cœur ou un gif de chat qui pleure. Libre à toi.</p>
      </div>
      <div class="col-md-3" data-aos="fade-up" data-aos-delay="800">
        <img src="assets/img/paper.png" class="img-fluid w-25">
        <p><b>Personnalise ta page</b></p>
        <p>Couleurs, sons, emojis, gifs, effets… fais-toi plaisir.</p>
      </div>
      <div class="col-md-3" data-aos="fade-up" data-aos-delay="1000">
        <img src="assets/img/airplane.png" class="img-fluid w-25">
        <p><b>Partage le lien</b></p>
        <p>À ton boss, ton ex, ton groupe WhatsApp ou au monde entier. Ou garde-le pour toi.</p>
      </div>
    </div>
  </section>
 
  <!-- Section Presentation -->
  <section class="section-highlight container fade-in delay-1">
    <div class="row">
        <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
        <img src="assets/img/palmsupguy.png">
      </div>

        <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
            <br>
        <p class="text-orange">C’est la fin ? Fête ça dignement.</p>
        <h3 class="fw-bold" id="title2">Ne pars pas sans dire un dernier mot.</h3>
        <p class="mt-3">TheEnd.page t’aide pour créer ta page de départ pleine de style (ou de larmes).</p>
        <br>
        <a href="auth/login.php" class="btn-custom">Créer une page</a>
      </div>
    </div>
  </section>
 
  <!-- Section Pourquoi -->
  <section class="section-highlight container fade-in delay-1">
    <div class="row flex-md-row-reverse">
      <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
        <img src="assets/img/palmsupgirl.png">
      </div>
      <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
        <br>
        <p class="text-orange">C’est la fin ? Fête ça dignement.</p>
        <h3 class="fw-bold" id="title2">Pourquoi utiliser TheEnd.page ?</h3>
        <p class="mt-3">Parce que parfois, une fin ça peut aussi faire du bien. <br> Ou parce qu'il faut laisser une trace de tout ce qu'on a perdu.</p>
        <br>
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

<script>
  const slides = document.querySelectorAll('.carousel-slide');
  let current = 1;

  function updateCarousel() {
    slides.forEach((slide, index) => {
      slide.classList.remove('left', 'center', 'right');
      if (index === current) {
        slide.classList.add('center');
      } else if (index === (current - 1 + slides.length) % slides.length) {
        slide.classList.add('left');
      } else if (index === (current + 1) % slides.length) {
        slide.classList.add('right');
      }
    });
  }

  slides.forEach((slide, index) => {
    slide.addEventListener('click', () => {
      if (index !== current) {
        current = index;
        updateCarousel();
      }
    });
  });

  window.addEventListener('DOMContentLoaded', updateCarousel);
</script>

</body>
</html>
