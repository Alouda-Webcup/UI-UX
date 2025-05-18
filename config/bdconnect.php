<?php
$host = "localhost"; 
$dbname = "alouda_db";

$username = "alouda_db";
//$username = "root";
//$password = "root";
$password = "dacram-nIpqes-xinji9";




// Connexion avec PDO
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

?>


