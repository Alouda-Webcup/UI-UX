<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Projets</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <style>
    .service-card {
      background-color: #fff;
      border-radius: 16px;
      transition: all 0.3s ease;
      min-height: 220px;
      max-width: 320px;
      padding-bottom: 3rem;
    }

    .service-card:hover {
      transform: translateY(-4px);
    }

    .text-orange {
      color: #EE5622;
    }

    .text-orange:hover {
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

    .btn-icon {
      background: transparent;
      border: none;
      color: #EE5622;
      font-size: 2.2rem;
      cursor: pointer;
      transition: transform 0.2s ease;
    }

    .btn-icon:hover {
      transform: scale(1.1);
    }

    .btn-orange {
      background-color: #EE5622;
      color: #fff;
      border: none;
    }

    .btn-orange:hover {
      background-color: #c6471c;
      color: white;
    }

    .form-card {
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

    .service-date {
      position: absolute;
      bottom: 1rem;
      left: 1rem;
      right: 1rem;
    }

    @media (max-width: 575px) {
      .col-md-6.col-lg-4 {
        display: flex;
        justify-content: center;
      }

      .service-card {
        max-width: 90vw;
      }
    }
  </style>
</head>

<body>



  <!-- Titre -->
  <h2 class="text-orange text-center mt-5 fw-bold">Mes pages</h2>

  <div class="container py-5">
    <!-- Formulaire -->
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6">
        <div class="card shadow form-card">
          <div class="text-center py-3">
            <button id="toggleForm" class="btn-icon" aria-label="Ajouter un service">
              <i class="bi bi-plus-circle-fill"></i>
            </button>
          </div>
          <div class="card-body" id="formContainer">
            <h5 class="text-center fw-bold mb-4 text-orange">Créer une nouvelle page</h5>
            <form>
              <div class="mb-5">
                <p>Lorem ipsum dolor amet !</p>
              </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-orange py-2">Créer une nouvelle page</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
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
      const toggleBtn = document.getElementById('toggleForm');
      const formContainer = document.getElementById('formContainer');

      toggleBtn?.addEventListener('click', () => {
        formContainer.classList.toggle('show');
      });
    });
  </script>

</body>

</html>
