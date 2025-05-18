<?php
session_start();

// Redirection si utilisateur non connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: ../auth/login.php');
    exit();
}

// Connexion à la BDD
require_once '../config/bdconnect.php';

// Requête pour récupérer toutes les pages avec leurs infos
$sql = "
    SELECT 
        id_page,
        pg_tone,
        pg_message,
        pg_object,
        pg_file,
        pg_gif,
        pg_sounds,
        pg_creationdate,
        id_projects,
        id_users
    FROM page
    ORDER BY pg_creationdate DESC
";

$stmt = $conn->prepare($sql);
$stmt->execute();
$pages = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

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
  <link rel="stylesheet" href="../assets/css/project.css">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }

    .container {
      width: 100%;
      max-width: 1200px;
      margin: 1rem auto;
      padding: 0 1rem;
      text-align: left;
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
      text-transform: capitalize;
    }

    .page-link{
      color: #e74c3c  !important;
      text-decoration: underline !important;
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

    h2.text-orange {
      color: #EE5622;
      margin-top: 0;
      margin-bottom: 1.5rem;
      text-align: center;
    }

    @media (max-width: 767px) {
      .page-card + .page-card {
        margin-top: 1.5rem;
      }
    }
    .all{
      margin-top: 7rem;
    }
  </style>
</head>

<body>

<?php include('../includes/navbar.php'); ?>

<div class="container all">
  <h2 class="text-orange fw-bold">Mes pages</h2>

  <div class="pages-container">

    <?php foreach ($pages as $page): ?>

      <div class="page-card">
        <h4 class="page-title"><?= htmlspecialchars($page['pg_object']) ?></h4>

        <div class="mood-container">
          <?php
            $tone = strtolower($page['pg_tone']);
            $iconClass = '';
            $colorClass = '';
            $toneLabel = ucfirst($tone);

            switch ($tone) {
              case 'happy':
                $iconClass = 'fa-face-smile';
                $colorClass = 'mood-happy';
                break;
              case 'sad':
                $iconClass = 'fa-face-frown';
                $colorClass = 'mood-sad';
                break;
              case 'angry':
                $iconClass = 'fa-face-angry';
                $colorClass = 'mood-angry';
                break;
              case 'formel':
              case 'amical':
              case 'professionnel':
                $iconClass = 'fa-face-meh';
                $colorClass = 'text-secondary';
                break;
              default:
                $iconClass = 'fa-face-smile';
                $colorClass = 'mood-happy';
            }
          ?>
          <i class="fa-solid <?= $iconClass ?> <?= $colorClass ?>" title="<?= $toneLabel ?>"></i>
          <span><?= htmlspecialchars($toneLabel) ?></span>
        </div>

        <p class="page-preview"><?= nl2br(htmlspecialchars($page['pg_message'])) ?></p>

        <?php if (!empty($page['pg_file']) && strtolower($page['pg_file']) !== 'null'): ?>
          <a href="<?= htmlspecialchars($page['pg_file']) ?>" class="page-link" target="_blank">
            Voir la page complète
          </a><br>
        <?php endif; ?>

        <?php if (!empty($page['pg_gif']) && strtolower($page['pg_gif']) !== 'null'): ?>
          <img src="<?= htmlspecialchars($page['pg_gif']) ?>" alt="GIF" style="max-width:100%; margin-top:1rem; border-radius: 8px;">
        <?php endif; ?>

        <?php if (!empty($page['pg_sounds']) && strtolower($page['pg_sounds']) !== 'null'): ?>
          <audio controls style="margin-top:1rem; width: 100%;">
            <source src="<?= htmlspecialchars($page['pg_sounds']) ?>" type="audio/mpeg" />
            Votre navigateur ne supporte pas la lecture audio.
          </audio>
        <?php endif; ?>

      </div>

    <?php endforeach; ?>

  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
