<?php
session_start();

// Enforce HTTPS
// if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
//     $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//     header('HTTP/1.1 301 Moved Permanently');
//     header('Location: ' . $redirect);
//     exit();
// }

// Paramètres de connexion
$host = 'localhost';
$dbname = 'alouda_db';
$username = 'alouda_db';
$password = 'dacram-nIpqes-xinji9';

// Connexion avec PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie <br />";
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// ✅ Generate a simple math captcha BEFORE checking for regen
if (!isset($_SESSION['captcha_answer'])) {
    $a = rand(1, 10);
    $b = rand(1, 10);
    $_SESSION['captcha_question'] = "$a + $b";
    $_SESSION['captcha_answer'] = $a + $b;
}

// ♻️ Regenerate CAPTCHA if requested
if (isset($_GET['regen_captcha'])) {
    unset($_SESSION['captcha_answer']);
    header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
    exit();
}
?>
