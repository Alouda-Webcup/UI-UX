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
        $_SESSION['user_id'] = $user['id_users'];
        $_SESSION['user_name'] = $user['user_name'];
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
<div class="container mt-5">
    <h2 class="text-center mb-4">Connexion à TheEnd.page</h2>

    <?php if ($error): ?>
        <div class="alert alert-danger text-center"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" class="mx-auto" style="max-width: 400px;">
        <div class="mb-3">
            <label for="email" class="form-label">Adresse email</label>
            <input type="email" class="form-control" id="email" name="email" required placeholder="ex: karen@email.com" />
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required placeholder="••••••••" />
        </div>
        <button type="submit" class="btn btn-dark w-100">Se connecter</button>
        <div class="mt-3 text-center">
            <a href="signup.php">Pas encore inscrit ? Créez un compte</a>
        </div>
    </form>
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
