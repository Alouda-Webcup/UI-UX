<?php
session_start();
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('../config/bdconnect.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE user_email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['user_password'])) {
        // Définir les variables de session nécessaires
        $_SESSION['user_id'] = $user['id_users'];
        $_SESSION['username'] = $user['user_name'];   // clé username pour le navbar
        $_SESSION['logged_in'] = true;                 // clé logged_in pour vérifier la connexion

        $success = "Connexion réussie ! Redirection en cours...";
    } else {
        $error = "Email ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Connexion - TheEnd.page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(135deg,rgb(255, 255, 255),rgb(255, 255, 255));
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .login-box {
            display: flex;
            width: 850px;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .login-form {
            padding: 40px;
            flex: 1;
            background: #fff;
        }
        .login-form h2 {
            font-weight: bold;
            margin-bottom: 20px;
        }
        .login-form .btn {
            background: #EE5622;
            color: white;
            border: none;
        }
        .login-form .btn:hover {
            background:rgb(202, 74, 32);
        }
       
        .login-info {
            flex: 1;
            background: linear-gradient(135deg, #EE5622,rgb(245, 149, 101));
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .login-info h3 {
            font-weight: bold;
        }
        .alert {
            margin-bottom: 15px;
        }
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
<body>

<div class="login-box">

    <!-- Partie gauche : formulaire -->
    <div class="login-form">
        <h2>Connexion</h2>
        <p>Bon retour ! Veuillez entrer vos identifiants</p>

        <?php if ($error): ?>
            <div class="alert alert-danger text-center"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="Entrez votre e-mail" />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required placeholder="Entrez votre mot de passe" />
            </div>
        
            <button type="submit" class="btn w-100">Se connecter</button>
            <div class="mt-3 text-center">
                Vous n'avez pas de compte ? <a href="signup.php" class="text-decoration-none" style="color: #EE5622;">S'inscrire</a>
            </div>
        </form>
    </div>

    <!-- Partie droite : message d’accueil -->
    <div class="login-info">
        <h3>Bon retour parmi nous !</h3>
        <p class="mt-3">Vos pages ont du potentiel. Connectez-vous pour les perfectionner et récolter les votes qu’elle mérite.</p>
        <p class="mt-4"><strong>Que la quête des votes continue !</strong></p>
    </div>
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
