<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Footer toujours en bas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
    }

    main {
      flex: 1;
    }

    body {
      background-color: #f8f9fa;
      font-family: sans-serif;
    }

    .footer {
      background-color: white;
      box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.05);
      padding: 2.5rem 1.5rem;
    }

    .footer-content {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      gap: 1.5rem;
    }

    .footer-logo {
      font-weight: bold;
      font-size: 1.25rem;
    }

    .footer-logo .dot {
      color: #EE5622;
    }

    .footer-text,
    .footer-copy {
      color: #555;
    }

    @media (min-width: 768px) {
      .footer-content {
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
      }

      .footer-text,
      .footer-copy {
        text-align: center;
      }
    }
  </style>
</head>
<body>

  <!-- Contenu principal -->
  <main>
    <!-- Ton contenu ici -->
  </main>

  <!-- FOOTER toujours en bas -->
  <footer class="footer">
    <div class="container footer-content">
      <div class="footer-logo">TheEnd<span class="dot">.</span></div>
      <div class="footer-text">Fait par le groupe <strong>Alouda</strong></div>
      <div class="footer-copy">&copy; 2025</div>
    </div>
  </footer>

</body>
</html>
