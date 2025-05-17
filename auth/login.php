<?php
require 'bdconnect.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL);
    $password = $_POST["password"];
    $captcha = (int) $_POST["captcha"];

    if (!$email) {
        die("Invalid email.");
    }

    if ($captcha !== $_SESSION['captcha_answer']) {
        die("Incorrect CAPTCHA answer.");
    }

    $stmt = $conn->prepare("SELECT id_users, user_name, user_password FROM users WHERE user_email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $username, $hashedPassword);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {
            $_SESSION["user_id"] = $id;
            $_SESSION["username"] = $username;
            echo "Welcome, " . htmlspecialchars($username) . "!";
            unset($_SESSION['captcha_answer']);
            header("Location: index.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Email not found.";
    }

    $stmt->close();
    $conn->close();
}
?>

<form method="POST">
  <input type="email" name="email" placeholder="Email" required><br>
  <input type="password" name="password" placeholder="Password" required><br>
  <label>CAPTCHA: <?= $_SESSION['captcha_question']; ?> = ?</label><br>
  <input type="number" name="captcha" required><br>
  <button type="submit">Log In</button>
  <p><a href="?regen_captcha=true">↻ Regenerate CAPTCHA</a></p>

</form>
