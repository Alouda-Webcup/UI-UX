<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Navbar TheEnd - Responsive & Réutilisable</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    /* --- Styles généraux --- */
    body {
      background-color: #f8f9fa;
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    /* Navbar capsule */
    .navbar-capsule {
      background: #fff;
      border-radius: 60px;
      padding: 1rem 2rem;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
      width: max-content;
      margin: 2rem auto;
      min-width: 320px;
      transition: width 0.3s ease;
    }

    /* Conteneur flex */
    .container-fluid {
      display: flex;
      align-items: center;
      gap: 1.5rem;
      padding: 0;
    }

    /* Marque */
    .navbar-brand {
      font-weight: 700;
      font-size: 1.2rem;
      color: #000;
      white-space: nowrap;
      user-select: none;
    }
    .navbar-brand span {
      color: #EE5622;
    }

    /* Menu déroulant (collapse) */
    .navbar-collapse {
      transition: all 0.3s ease;
    }
    .navbar-collapse.show {
      display: flex !important;
      align-items: center;
      gap: 1.5rem;
      flex-grow: 1;
      justify-content: flex-start;
    }

    /* Liste des liens */
    .navbar-nav {
      display: flex;
      gap: 1.5rem;
      padding-left: 0;
      margin-bottom: 0;
      list-style: none;
    }
    .navbar-nav .nav-link {
      color: #000 !important;
      font-weight: 500;
      font-size: 1.1rem;
      padding: 0;
      margin: 0;
      white-space: nowrap;
      transition: color 0.2s ease;
    }
    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link:focus {
      color: #EE5622 !important;
      text-decoration: none;
    }

    /* Bouton CTA */
    .btn-cta {
      background-color: #000;
      color: #fff;
      border: none;
      border-radius: 30px;
      padding: 0.5rem 1.4rem;
      font-weight: 500;
      cursor: pointer;
      white-space: nowrap;
      margin-left: 1.5rem; /* espace entre liens et bouton */
      transition: background-color 0.3s ease;
    }
    .btn-cta:hover,
    .btn-cta:focus {
      background-color: #333;
      color: #fff;
      text-decoration: none;
      outline: none;
    }

    /* Bouton toggler bootstrap - suppression bordure */
    .navbar-toggler {
      border: none;
      padding: 0.25rem 0.75rem;
      cursor: pointer;
    }

    /* Responsive - tablette et mobile */
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

      /* Collapse menu devient colonne */
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
        margin-left: 0; /* en mobile on enlève la marge */
      }
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light navbar-capsule" aria-label="Main navigation">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" aria-label="TheEnd, retour à l'accueil">TheEnd<span>.</span></a>

      <!-- Bouton burger pour mobiles -->
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Basculer la navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Menu principal -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav" role="menu" aria-label="Menu principal">
          <li class="nav-item" role="none">
            <a class="nav-link fw-normal" href="#" role="menuitem" tabindex="0">À propos</a>
          </li>
          <li class="nav-item" role="none">
            <a class="nav-link fw-normal" href="#" role="menuitem" tabindex="0">Projets</a>
          </li>
          <li class="nav-item" role="none">
            <a class="nav-link fw-normal" href="#" role="menuitem" tabindex="0">Compétences</a>
          </li>
          <li class="nav-item" role="none">
            <a class="nav-link fw-normal" href="#" role="menuitem" tabindex="0">Formations</a>
          </li>
        </ul>
        <a href="#" class="btn btn-cta" role="button" tabindex="0">Créer ma page</a>
      </div>
    </div>
  </nav>

  <!-- Bootstrap JS Bundle (Popper + Bootstrap JS) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
