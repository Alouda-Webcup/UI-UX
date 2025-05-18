<?php
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('../config/bdconnect.php');

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if ($password !== $password_confirm) {
        $error = "Les mots de passe ne correspondent pas.";
    } else {
        // Vérifier que l'email n'existe pas déjà
        $stmt = $conn->prepare("SELECT * FROM users WHERE user_email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->fetch()) {
            $error = "Cet email est déjà utilisé.";
        } else {
            // Insérer le nouvel utilisateur
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (:name, :email, :password)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashed_password);

            if ($stmt->execute()) {
                $success = "Inscription réussie ! Veuillez patienter...";
            } else {
                $error = "Erreur lors de l'inscription.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Inscription - TheEnd.page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        #successModal {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #d4edda;
            color: #155724;
            padding: 20px 30px;
            border: 2px solid #c3e6cb;
            border-radius: 8px;
            box-shadow: 0 0 10px #28a745;
            font-weight: bold;
            display: none;
            z-index: 1050;
        }
    </style>
</head>
<body class="bg-light">
<div class="container mt-5" style="max-width: 450px;">
    <h2 class="text-center mb-4">Créer un compte</h2>

    <?php if ($error): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Nom complet</label>
            <input type="text" class="form-control" id="name" name="name" required placeholder="Votre nom complet" />
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Adresse email</label>
            <input type="email" class="form-control" id="email" name="email" required placeholder="ex: karen@email.com" />
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required placeholder="••••••••" />
        </div>
        <div class="mb-3">
            <label for="password_confirm" class="form-label">Confirmer le mot de passe</label>
            <input type="password" class="form-control" id="password_confirm" name="password_confirm" required placeholder="••••••••" />
        </div>
        <button type="submit" class="btn btn-dark w-100">S'inscrire</button>
    </form>

    <p class="text-center mt-3">
        Déjà un compte ? <a href="login.php">Connectez-vous</a>
    </p>
</div>

<div id="successModal"><?= htmlspecialchars($success) ?></div>

<?php if ($success): ?>
<script>
    const modal = document.getElementById('successModal');
    modal.style.display = 'block';

    setTimeout(() => {
        window.location.href = "../index.php";
    }, 2000);
</script>
<?php endif; ?>
</body>
</html>
