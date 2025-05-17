<?php
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
?>