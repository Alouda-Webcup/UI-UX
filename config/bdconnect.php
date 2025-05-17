<?php
session_start();

// Enforce HTTPS (décommenter si besoin)
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

// Connexion PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb3", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie à la base de données.<br />";
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

// Génération du captcha si pas encore défini
if (!isset($_SESSION['captcha_answer'])) {
    $a = rand(1, 10);
    $b = rand(1, 10);
    $_SESSION['captcha_question'] = "$a + $b";
    $_SESSION['captcha_answer'] = $a + $b;
}

// Regénération du captcha à la demande
if (isset($_GET['regen_captcha'])) {
    unset($_SESSION['captcha_answer']);
    header("Location: " . strtok($_SERVER["REQUEST_URI"], '?'));
    exit();
}

// Pour afficher la question captcha (exemple)
// echo "Captcha : " . $_SESSION['captcha_question'];
?>
