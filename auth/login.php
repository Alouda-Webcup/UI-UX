<?php

// Generate CAPTCHA if needed
if (!isset($_SESSION['captcha_num1']) || !isset($_SESSION['captcha_num2']) || isset($_GET['regen_captcha'])) {
    $_SESSION['captcha_num1'] = rand(1, 10);
    $_SESSION['captcha_num2'] = rand(1, 10);
    $_SESSION['captcha_answer'] = $_SESSION['captcha_num1'] + $_SESSION['captcha_num2'];
    $_SESSION['captcha_question'] = "{$_SESSION['captcha_num1']} + {$_SESSION['captcha_num2']}";
}

$error = '';

// Process login form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require '../config/bdconnect.php';

    $email = filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL);
    $password = $_POST["password"];
    $captcha = isset($_POST["captcha"]) ? (int) $_POST["captcha"] : null;

    if (!$email) {
        $error = "Format d'e-mail invalide.";
    } elseif (!isset($_SESSION['captcha_answer']) || $captcha !== $_SESSION['captcha_answer']) {
        $error = "Réponse CAPTCHA incorrecte.";
    } else {
        // Correct: SELECT user info for login
        $stmt = $pdo->prepare("SELECT id_users, user_name, user_password FROM users WHERE user_email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($password, $user['user_password'])) {
                $_SESSION["user_id"] = $user['id_users'];
                $_SESSION["username"] = $user['user_name'];
                unset($_SESSION['captcha_answer']);
                header("Location: ../index.php");
                exit();
            } else {
                $error = "Mot de passe invalide.";
            }
        } else {
            $error = "E-mail non trouvé.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheEnd Connexion</title>
    <link rel="stylesheet" href="../assets/-styles.css">
</head>
<body>
    <div class="auth-card">
        <div class="auth-left">
            <div style="margin-bottom: 2rem;">
                <h1>Connexion</h1>
                <p>Bon retour ! Veuillez entrer vos identifiants</p>
            </div>
            
            <?php if ($error): ?>
                <div class="error-message" style="margin-bottom: 1rem;">
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>
            
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
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
                    <label for="password">Mot de passe</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Entrez votre mot de passe"
                        required
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
                
                <button type="submit">Se connecter</button>
                
                <p style="margin-top: 1rem; text-align: center;">
                    Vous n'avez pas de compte ? 
                    <a href="signup.php">S'inscrire</a>
                </p>
            </form>
        </div>
        
        <div class="auth-right">
            <h2 style="font-size: 1.5rem; font-weight: 600; margin-bottom: 1.5rem;">
                Bon retour parmi nous !
            </h2>
            <p style="color: white; margin-bottom: 1rem;">
                Vos pages ont du potentiel. Connectez-vous pour la perfectionner et récolter les votes qu’elle mérite.
            </p>
            <p style="color: white;">
                Que la quête des votes continue !
            </p>
        </div>
    </div>
</body>
</html>
