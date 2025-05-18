<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$current_page = basename($_SERVER['PHP_SELF']);
$logged_in = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
$username = $logged_in ? $_SESSION['username'] : '';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <title>Navbar Intelligente - TheEnd</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background-color: #f8f9fa;
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

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

    .container-fluid {
      display: flex;
      align-items: center;
      gap: 1.5rem;
      padding: 0;
    }

    .navbar-brand {
      font-weight: 700;
      font-size: 1.5rem;
      color: #000;
      white-space: nowrap;
      user-select: none;
    }
    .navbar-brand span {
      color: #EE5622;
    }

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

    .navbar-nav .active {
      color: #EE5622 !important;
      font-weight: 600;
    }

    .btn-cta {
      background-color: #000;
      color: #fff;
      border: none;
      border-radius: 30px;
      padding: 0.5rem 1.4rem;
      font-weight: 500;
      cursor: pointer;
      white-space: nowrap;
      margin-left: 1.5rem;
      transition: background-color 0.3s ease;
      text-decoration: none;
      display: inline-block;
    }

    .btn-cta:hover,
    .btn-cta:focus {
      background-color: #333;
      color: #fff;
      text-decoration: none;
      outline: none;
    }

    .navbar-toggler {
      border: none;
      padding: 0.25rem 0.75rem;
      cursor: pointer;
    }

    .user-icon {
      display: inline-flex;
      vertical-align: middle;
      margin-right: 0.5rem;
      fill: #EE5622;
    }

    @media (max-width: 991.98px) {
      .navbar-capsule {
        width: auto;
        margin: 2rem 1rem;
        padding: 1rem 1.5rem;
        min-width: auto;
        box-sizing: border-box;
      }

      .container-fluid {
        flex-wrap: nowrap;
        flex-direction: row;
        align-items: center;
        gap: 1.5rem;
        padding: 0;
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
        margin-left: 0;
      }
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-capsule" aria-label="Main navigation">
  <div class="container-fluid">
    <a class="navbar-brand" href="/index.php" aria-label="Retour à l'accueil">TheEnd<span>.</span></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Basculer la navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0" role="menu" aria-label="Menu principal">
        <li class="nav-item" role="none">
          <a class="nav-link <?= $current_page == 'index.php' ? 'active' : '' ?>" href="/index.php" role="menuitem" >Accueil</a>
        </li>
        <li class="nav-item" role="none">
          <a class="nav-link <?= $current_page == 'create.php' ? 'active' : '' ?>" href="/pages/create.php" role="menuitem">Créer une page</a>
        </li>
        <li class="nav-item" role="none">
          <a class="nav-link <?= $current_page == 'project.php' ? 'active' : '' ?>" href="/pages/project.php" role="menuitem" >Mes pages</a>
        </li>
      </ul>

      <?php if ($logged_in): ?>
        <span class="navbar-text me-3" aria-label="Utilisateur connecté">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="user-icon" viewBox="0 0 16 16" aria-hidden="true" focusable="false">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
          </svg>
          <?= htmlspecialchars($username) ?>
        </span>
        <a href="/auth/logout.php" class="btn btn-cta" role="button" aria-label="Déconnexion">Déconnexion</a>
      <?php else: ?>
        <a href="/auth/login.php" class="btn btn-cta" role="button" aria-label="Connexion">Connexion</a>
      <?php endif; ?>
    </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
