<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sidebar 30rem responsive largeur</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    crossorigin="anonymous"
  />
  <style>
    body {
      margin: 0;
      padding-bottom: 2rem;
      margin-top: 8rem;
      height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .container-flex {
      flex-grow: 1;
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
      min-height: calc(100vh - 10rem); /* top + bottom margin */
      overflow: hidden;
    }

    .container-fluid{
        margin-top: 8rem;
    }

    @media (min-width: 992px) {
      .container-flex {
        flex-direction: row;
        gap: 2rem;
      }
    }

    .sidebar {
      background-color: #d0d0d0;
      border-radius: 0.3125rem; /* 5px */
      padding: 2rem;
      flex-shrink: 0;
      width: 100%;
    }

    @media (min-width: 992px) {
      .sidebar {
        width: 20rem;
      }
    }

    .main-content {
      background-color: #f0f0f0;
      border-radius: 0.3125rem;
      padding: 2rem;
      flex-grow: 1;
      min-width: 0; /* évite overflow */
      display: flex;
      flex-direction: column;
      justify-content: center;
      text-align: center;
      overflow-y: auto;
    }

    .main-content i {
      font-size: 2rem;
      margin-bottom: 1rem;
    }
  </style>
</head>

<body>
  <?php include('../includes/navbar.php'); ?>

  <div class="container-fluid px-4 container-flex">
    <div class="sidebar">
      <h2>Sidebar</h2>
      <p>Je suis à gauche sur grand écran.</p>
    </div>

    <div class="main-content">
      <h1 class="mb-4">Mes pages</h1>
      <div class="text-muted fs-4 mx-auto">
        <i class="fas fa-face-frown"></i>
        <br />
        Désolé, vous n’avez pas encore créé de pages.
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
