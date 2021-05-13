<?php
$servername = "localhost";
$username = "xcernan";
$password = 'Jek1qD$#HWzwjB';
$dbname = "zaverecne_zadanie";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

