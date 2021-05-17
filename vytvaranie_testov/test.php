<?php
require_once "Controller.php";
session_start();
$controller = new Controller();

var_dump($_SESSION);
var_dump($_POST);
echo $controller->insertQuestion($_SESSION['test_id'] ,$_POST['json'] );



?>