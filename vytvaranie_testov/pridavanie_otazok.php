<?php
 require_once "config.php";
session_start();
$keyC = $_SESSION['key'];
$keyC = "skuska";

$sql = $conn->prepare("CREATE TABLE '$keyC'(
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    test_code VARCHAR(64) NOT NULL,
    test_name VARCHAR(30) NOT NULL,
)");
$sql->execute();



//return var_dump($json);
?>