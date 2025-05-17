<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Page avec footer sticky</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    html, body {
      height: 100%;
      margin: 0;
    }
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    main {
      flex: 1; /* Prend tout l'espace disponible entre navbar et footer */
    }
  </style>
</head>
<body>
  <?php include 'navbar.php'; ?>

  <main>
    <!-- Ton contenu ici -->
    <h1>Bienvenue !</h1>
    <p>Ton contenu de page...</p>
  </main>

  <?php include 'footer.php'; ?>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
