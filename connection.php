<?php
$host = "localhost";
$dbname = "santeo"; // <-- mets ici le vrai nom de ta base importée
$username = "root";
$password = ""; // mot de passe vide sous XAMPP

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
