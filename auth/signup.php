<?php
require 'bdconnect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = htmlspecialchars(trim($_POST["username"]));
    $email = filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL);
    $password = $_POST["password"];
    $captcha = (int) $_POST["captcha"];

    if (!$email) {
        die("Invalid email format.");
    }

    if (strlen($password) < 8) {
        die("Password must be at least 8 characters.");
    }

    if ($captcha !== $_SESSION['captcha_answer']) {
        die("Incorrect CAPTCHA answer.");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (user_name, user_email, user_password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashedPassword);

    if ($stmt->execute()) {
        echo "Account created! You can now log in.";
        unset($_SESSION['captcha_answer']); // Reset for next form
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<form method="POST">
  <input type="text" name="username" placeholder="Username" required><br>
  <input type="email" name="email" placeholder="Email" required><br>
  <input type="password" name="password" placeholder="Password" required><br>
  <label>CAPTCHA: <?= $_SESSION['captcha_question']; ?> = ?</label><br>
  <input type="number" name="captcha" required><br>
  <button type="submit">Sign Up</button>
  <p><a href="?regen_captcha=true">↻ Regenerate CAPTCHA</a></p>

</form>
