<?php
require 'bdconnect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL);
    $password = $_POST["password"];
    $captcha = isset($_POST["captcha"]) ? (int) $_POST["captcha"] : null;

    if (!$email) {
        die("Invalid email.");
    }

    if (!isset($_SESSION['captcha_answer']) || $captcha !== $_SESSION['captcha_answer']) {
        die("Incorrect CAPTCHA answer.");
    }

    // Correct: SELECT user info for login
    $stmt = $pdo->prepare("SELECT id_users, user_name, user_password FROM users WHERE user_email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($password, $user['user_password'])) {
            // $_SESSION["user_id"] = $user['id_users'];
            $_SESSION["username"] = $user['user_name'];
            echo "Login successful! Welcome, " . htmlspecialchars($user['user_name']) . ".";
            unset($_SESSION['captcha_answer']);
            header("Location: index.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Email not found.";
    }
}
?>

<!-- Login Form -->
<form method="POST">
  <input type="email" name="email" placeholder="Email" required><br>
  <input type="password" name="password" placeholder="Password" required><br>
  <label>CAPTCHA: <?= $_SESSION['captcha_question'] ?? '???' ?> = ?</label><br>
  <input type="number" name="captcha" required><br>
  <button type="submit">Log In</button>
  <p><a href="?regen_captcha=1">↻ Regenerate CAPTCHA</a></p>
</form>
