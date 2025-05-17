<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Footer collé en bas juste après contenu</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    main {
      /* ne pousse plus tout l'espace */
      padding: 2rem 1rem;
      max-width: 1280px;
      margin: 0 auto;
    }

    footer.footer {
      background-color: #fff;
      box-shadow: 0 -2px 10px rgba(0,0,0,0.05);
      padding: 1.5rem 0;
      width: 100%;
      margin-top: auto; /* pousse le footer vers le bas si possible */
    }
  </style>
</head>
<body>

  <main class="container">
   
  </main>

  <footer class="footer">
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
      <div class="fw-bold fs-4">TheEnd<span style="color:#EE5622">.</span></div>
      <div class="text-muted text-center my-2 my-md-0">Fait par le groupe <strong>Alouda</strong></div>
      <div class="text-muted">&copy; 2025</div>
    </div>
  </footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
