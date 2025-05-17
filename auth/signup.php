<?php

// Generate CAPTCHA if needed
if (!isset($_SESSION['captcha_num1']) || !isset($_SESSION['captcha_num2']) || isset($_GET['regen_captcha'])) {
    $_SESSION['captcha_num1'] = rand(1, 10);
    $_SESSION['captcha_num2'] = rand(1, 10);
    $_SESSION['captcha_answer'] = $_SESSION['captcha_num1'] + $_SESSION['captcha_num2'];
    $_SESSION['captcha_question'] = "{$_SESSION['captcha_num1']} + {$_SESSION['captcha_num2']}";
}

$error = '';
$success = '';

// Process signup form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require '../config/bdconnect.php';

    $username = htmlspecialchars(trim($_POST["username"]));
    $email = filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL);
    $password = $_POST["password"];
    $captcha = isset($_POST["captcha"]) ? (int) $_POST["captcha"] : null;

    // Basic validations
    if (!$email) {
        $error = "Format d'e-mail invalide.";
    } elseif (strlen($password) < 8) {
        $error = "Le mot de passe doit comporter au moins 8 caractères.";
    } elseif (!isset($_SESSION['captcha_answer'])) {
        $error = "CAPTCHA non défini. Veuillez actualiser la page.";
    } elseif ($captcha !== $_SESSION['captcha_answer']) {
        $error = "Réponse CAPTCHA incorrecte.";
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Check if email already exists
        $checkStmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE user_email = ?");
        $checkStmt->execute([$email]);
        if ($checkStmt->fetchColumn() > 0) {
            $error = "E-mail déjà enregistré. Veuillez utiliser un autre e-mail ou vous connecter.";
        } else {
            // Insert into database
            $stmt = $pdo->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (?, ?, ?)");
            $success = $stmt->execute([$username, $email, $hashedPassword]);

            if ($success) {
                // Fetch the new user's ID
                $userId = $pdo->lastInsertId();

                // Set session variables to log the user in
                $_SESSION['user_id'] = $userId;
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;

                unset($_SESSION['captcha_answer']); // reset CAPTCHA

                // Redirect to a protected page (e.g., dashboard.php)
                header("Location: ../config/index.php");
                exit;
            } else {
                $error = "Erreur lors de la création du compte. Veuillez réessayer.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheEnd Inscription</title>
    <link rel="stylesheet" href="../assets/css/auth-styles.css">
</head>
<body>
    <div class="auth-card">
        <div class="auth-left">
            <div style="margin-bottom: 2rem;">
                <h1>Créer un compte</h1>
                <p>Rejoignez notre communauté de Leavers aujourd'hui</p>
            </div>
            
            <?php if ($error): ?>
                <div class="error-message" style="margin-bottom: 1rem;">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <div style="background-color: #ecfdf5; color: #065f46; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem;">
                    <?php echo $success; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        placeholder="Entrez votre nom d'utilisateur" 
                        value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>"
                        required
                    >
                </div>
                
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="Entrez votre e-mail" 
                        value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                        required
                    >
                </div>
                
                <div class="form-group">
                    <label for="password">Mot de passe (min. 8 caractères)</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Créez un mot de passe"
                        required
                        minlength="8"
                    >
                </div>
                
                <div class="form-group">
                    <label for="captcha">CAPTCHA: <?php echo $_SESSION['captcha_question']; ?> = ?</label>
                    <div class="captcha-container">
                        <input 
                            type="number" 
                            id="captcha" 
                            name="captcha" 
                            class="captcha-input"
                            required
                        >
                        <a href="?regen_captcha=1" class="regenerate-captcha" title="Générer un nouveau CAPTCHA">
                            ↻
                        </a>
                    </div>
                </div>
                
                <button type="submit">S'inscrire</button>
                
                <p style="margin-top: 1rem; text-align: center;">
                    Vous avez déjà un compte ? 
                    <a href="login.php">Se connecter</a>
                </p>
            </form>
        </div>
        
        <div class="auth-right">
            <h2 style="font-size: 1.5rem; font-weight: 600; margin-bottom: 1.5rem;">
                Rejoignez notre communauté aujourd'hui
            </h2>
            <ul class="features-list">
                <li>Connectez-vous avec d'autres Leavers !</li>
                <li>Votez pour les meilleures pages TheEnd !</li>
                <li>Devenez la star des votes avec votre page !</li>
            </ul>
        </div>
    </div>
</body>
</html>
