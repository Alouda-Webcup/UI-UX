<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Navbar TheEnd - Responsive gap 1.5rem corrigé</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f8f9fa;
    }

    .navbar-capsule {
      background: white;
      border-radius: 60px;
      padding: 1rem 2rem;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
      width: max-content;
      margin: 2rem auto;
      min-width: 320px;
    }

    .container-fluid {
      display: flex;
      align-items: center;
      gap: 1.5rem;
      padding: 0;
    }

    .navbar-brand {
      font-weight: 700;
      font-size: 1.2rem;
      color: black;
      white-space: nowrap;
    }

    .navbar-brand span {
      color: #EE5622;
    }

    .navbar-collapse.show {
      display: flex !important;
      align-items: center;
      gap: 1.5rem;
      flex-grow: 1;
      justify-content: flex-start;
    }

    .navbar-nav {
      display: flex;
      gap: 1.5rem;
      padding-left: 0;
      margin-bottom: 0;
      list-style: none;
    }

    .navbar-nav .nav-link {
      color: black !important;
      font-weight: 500;
      font-size: 1.1rem;
      padding: 0;
      margin: 0;
      white-space: nowrap;
    }

    .btn-cta {
      background-color: black;
      color: white;
      border: none;
      border-radius: 30px;
      padding: 0.5rem 1.4rem;
      font-weight: 500;
      cursor: pointer;
      white-space: nowrap;
      margin-left: 1.5rem; /* espace entre liens et bouton */
    }
    .btn-cta:hover {
      background-color: #333;
      color: white;
    }

    /* RESPONSIVE */
    @media (max-width: 991.98px) {
      .navbar-capsule {
        width: 100%;
        padding: 1rem 1.5rem;
        min-width: auto;
      }

      .container-fluid {
        flex-wrap: nowrap;
        flex-direction: row;
        align-items: center;
        gap: 1.5rem;
        padding: 0;
      }

      .navbar-toggler {
        margin-left: 0;
        border: none;
      }

      .navbar-collapse.show {
        flex-direction: column !important;
        align-items: flex-start;
        width: 100% !important;
        margin-top: 1rem;
        gap: 1.5rem;
      }

      .navbar-nav {
        flex-direction: column;
        gap: 1.5rem;
        width: 100%;
        padding-left: 0;
        margin-bottom: 0;
      }

      .navbar-nav .nav-link {
        width: 100%;
        text-align: left;
        padding-left: 0;
      }

      .btn-cta {
        width: 100%;
        max-width: 200px;
        text-align: center;
        padding-left: 0;
        padding-right: 0;
        margin-left: 0; /* on enlève la marge à gauche en mobile */
      }
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light navbar-capsule">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">TheEnd<span>.</span></a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link fw-normal" href="#">À propos</a></li>
          <li class="nav-item"><a class="nav-link fw-normal" href="#">Projets</a></li>
          <li class="nav-item"><a class="nav-link fw-normal" href="#">Compétences</a></li>
          <li class="nav-item"><a class="nav-link fw-normal" href="#">Formations</a></li>
        </ul>
        <a href="#" class="btn btn-cta">Créer ma page</a>
      </div>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
