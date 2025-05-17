<?php
require '../config/bdconnect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = htmlspecialchars(trim($_POST["username"]));
    $email = filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL);
    $password = $_POST["password"];
    $captcha = isset($_POST["captcha"]) ? (int) $_POST["captcha"] : null;

    // Basic validations
    if (!$email) {
        die("Invalid email format.");
    }

    if (strlen($password) < 8) {
        die("Password must be at least 8 characters.");
    }

    if (!isset($_SESSION['captcha_answer'])) {
        die("CAPTCHA not set. Please refresh the page.");
    }

    if ($captcha !== $_SESSION['captcha_answer']) {
        die("Incorrect CAPTCHA answer.");
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    $stmt = $pdo->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (?, ?, ?)");
    $success = $stmt->execute([$username, $email, $hashedPassword]);

    if ($success) {
        echo "✅ Account created! You can now <a href='login.php'>log in</a>.";
        unset($_SESSION['captcha_answer']); // reset CAPTCHA
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!-- Signup Form -->
<form method="POST">
  <input type="text" name="username" placeholder="Username" required><br>
  <input type="email" name="email" placeholder="Email" required><br>
  <input type="password" name="password" placeholder="Password (min 8 chars)" required><br>

  <!-- CAPTCHA -->
  <label>CAPTCHA: <?= $_SESSION['captcha_question'] ?? '???' ?> = ?</label><br>
  <input type="number" name="captcha" required><br>
  <p><a href="?regen_captcha=1">↻ Regenerate CAPTCHA</a></p>

  <button type="submit">Sign Up</button>
</form>
