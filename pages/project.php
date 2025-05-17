<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Mes pages</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- FontAwesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />

  <style>
    html, body {
      margin: 0;
      padding: 0;
      /* height: 100%; supprimé pour éviter le scroll */
    }

    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }

    .container {
      width: 100%;
      max-width: 1200px;
      margin: 1rem auto; /* réduit la marge verticale */
      padding: 0 1rem;
      text-align: center;
    }

    .pages-container {
      display: flex;
      flex-wrap: wrap;
      gap: 4rem;
      justify-content: center;
      margin-top: 1rem;
    }

    .page-card {
      background-color: #fff;
      border-radius: 16px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.08);
      padding: 2rem;
      flex: 1 1 300px;
      max-width: 350px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .page-title {
      color: #EE5622;
      font-weight: bold;
      margin-bottom: 0.8rem;
      font-size: 1.3rem;
    }

    .mood-container {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      margin-bottom: 1rem;
      color: #666;
      font-weight: 500;
      font-size: 1rem;
    }

    .mood-happy {
      color: #f4c430;
    }

    .mood-sad {
      color: #3498db;
    }

    .mood-angry {
      color: #e74c3c;
    }

    .page-preview {
      font-size: 1rem;
      color: #333;
      flex-grow: 1;
      margin-bottom: 1.5rem;
    }

    .page-link {
      color: #EE5622;
      text-decoration: underline;
      font-weight: 500;
      align-self: flex-start;
      transition: color 0.3s ease;
    }

    .page-link:hover {
      color: #c6471c;
    }

    h2.text-orange {
      color: #EE5622;
      margin-top: 0;       /* suppression de la marge haute */
      margin-bottom: 1.5rem; /* marge raisonnable sous le titre */
    }

    @media (max-width: 767px) {
      .page-card + .page-card {
        margin-top: 1.5rem;
      }
    }
  </style>
</head>

<body>

<?php include('../includes/navbar.php') ?>

<div class="container">
  <h2 class="text-orange fw-bold">Mes pages</h2>

  <div class="pages-container">
    <div class="page-card">
      <h4 class="page-title">Présentation de K by Karen</h4>
      <div class="mood-container">
        <i class="fa-solid fa-face-smile mood-happy" title="Happy"></i>
        <span>Happy</span>
      </div>
      <p class="page-preview">
        Bienvenue sur la page de lancement de notre marque beauté <strong>K by Karen</strong> ! Une expérience sensorielle autour du gloss, du mascara et du blush dans un univers rose, doux et épuré.
      </p>
      <a href="k-by-karen.html" class="page-link">Voir la page complète</a>
    </div>

    <div class="page-card">
      <h4 class="page-title">Projet UI/UX 2025</h4>
      <div class="mood-container">
        <i class="fa-solid fa-face-frown mood-sad" title="Sad"></i>
        <span>Sad</span>
      </div>
      <p class="page-preview">
        Cette page regroupe les travaux de design UX réalisés pour l'année 2025 : wireframes, prototypes Figma, documentation utilisateur...
      </p>
      <a href="uiux-2025.html" class="page-link">Voir la page complète</a>
    </div>

    <div class="page-card">
      <h4 class="page-title">Page Exemple 3</h4>
      <div class="mood-container">
        <i class="fa-solid fa-face-angry mood-angry" title="Angry"></i>
        <span>Angry</span>
      </div>
      <p class="page-preview">
        Aperçu de la troisième page avec un contenu court pour démonstration.
      </p>
      <a href="#" class="page-link">Voir la page complète</a>
    </div>
  </div>
</div>

</body>
</html>
