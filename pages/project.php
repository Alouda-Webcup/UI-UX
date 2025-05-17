<?php
include('../config/bdconnect.php');
include('../includes/navbar.php');

// Récupérer les pages depuis la base de données avec projet et utilisateur
$sql = "SELECT page.*, projects.pj_name, users.user_name 
        FROM page 
        INNER JOIN projects ON page.id_projects = projects.id_projects 
        INNER JOIN users ON page.id_users = users.id_users 
        ORDER BY pg_creationdate DESC";

$stmt = $conn->prepare($sql);
$stmt->execute();
$pages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Projets</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="/ui-ux/assets/">

  <style>
    #serviceCard {
      background-color: #fff;
      border-radius: 16px;
      transition: all 0.3s ease;
      min-height: 220px;
      max-width: 320px;
      padding-bottom: 3rem;
    }

    #serviceCard:hover {
      transform: translateY(-4px);
    }

    #textOrange {
      color: #EE5622;
    }

    #textOrange:hover {
      color: #c6471c;
    }

    #formContainer {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.6s ease, padding 0.3s ease;
      padding: 0 1rem;
    }

    #formContainer.show {
      max-height: 500px;
      padding: 1.5rem 1rem;
    }

    #btnIcon {
      background: transparent;
      border: none;
      color: #EE5622;
      font-size: 2.2rem;
      cursor: pointer;
      transition: transform 0.2s ease;
    }

    #btnIcon:hover {
      transform: scale(1.1);
    }

    #btnOrange {
      background-color: #EE5622;
      color: #fff;
      border: none;
    }

    #btnOrange:hover {
      background-color: #c6471c;
      color: white;
    }

    #formCard {
      border: none;
      border-radius: 20px;
      background: white;
      animation: slideFadeIn 0.6s ease-out both;
    }

    @keyframes slideFadeIn {
      0% {
        opacity: 0;
        transform: translateY(20px);
      }

      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    #gap3rem {
      gap: 3rem !important;
    }

    #block {
      background-color: #EE5622;
      color: white;
      padding: 2rem;
      border-radius: 12px;
      text-align: center;
      font-size: 1.2rem;
      flex: 1 1 0;
      min-width: 0;
      /* Pour éviter débordement */
      word-wrap: break-word;
    }
  </style>
</head>

<body>

  <h2 id="textOrange" class="text-center mt-5 fw-bold">Mes pages</h2>

  <!-- Formulaire -->
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6">
        <div id="formCard" class="card shadow">
          <div class="text-center py-3">
            <button id="btnIcon" aria-label="Ajouter un service">
              <i class="bi bi-plus-circle-fill"></i>
            </button>
          </div>
          <div class="card-body" id="formContainer">
            <h5 id="textOrange" class="text-center fw-bold mb-4">Créer une nouvelle page</h5>
            <form method="post" action="ajouter_page.php" enctype="multipart/form-data">
              <!-- Champs à compléter pour créer une page -->
              <div class="mb-5">
                <p>Lorem ipsum dolor amet !</p>
              </div>
              <div class="d-grid">
                <button id="btnOrange" type="submit" class="py-2">Créer une nouvelle page</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Blocs dynamiques -->
  <div id="gap3rem" class="d-flex flex-column flex-lg-row flex-wrap p-4">
    <?php foreach ($pages as $page): ?>
      <div id="block">
        <h4 class="fw-bold mb-2"><?= htmlspecialchars($page['pg_object']) ?></h4>
        <p><em>Ton : <?= htmlspecialchars($page['pg_tone']) ?></em></p>
        <p><?= nl2br(htmlspecialchars($page['pg_message'])) ?></p>

        <?php if (!empty($page['pg_file'])): ?>
          <p><strong>Fichier :</strong><br>
            <a href="/uploads/files/<?= htmlspecialchars($page['pg_file']) ?>" target="_blank"><?= htmlspecialchars($page['pg_file']) ?></a>
          </p>
        <?php endif; ?>

        <?php if (!empty($page['pg_gif'])): ?>
          <p><strong>GIF :</strong><br>
            <img src="/uploads/gifs/<?= htmlspecialchars($page['pg_gif']) ?>" alt="GIF" style="max-width:100%; border-radius:8px;">
          </p>
        <?php endif; ?>

        <?php if (!empty($page['pg_sounds'])): ?>
          <p><strong>Son :</strong><br>
            <audio controls>
              <source src="/uploads/sounds/<?= htmlspecialchars($page['pg_sounds']) ?>" type="audio/mpeg">
              Votre navigateur ne supporte pas la lecture audio.
            </audio>
          </p>
        <?php endif; ?>

        <p class="mt-3"><small>Projet : <strong><?= htmlspecialchars($page['pj_name']) ?></strong></small></p>
        <p><small>Par : <?= htmlspecialchars($page['user_name']) ?> le <?= date("d/m/Y", strtotime($page['pg_creationdate'])) ?></small></p>
      </div>
    <?php endforeach; ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 400,
      easing: 'ease-in-out',
      once: true
    });

    document.addEventListener("DOMContentLoaded", () => {
      const toggleBtn = document.getElementById('btnIcon');
      const formContainer = document.getElementById('formContainer');
      toggleBtn?.addEventListener('click', () => {
        formContainer.classList.toggle('show');
      });
    });
  </script>

</body>

</html>
