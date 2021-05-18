<?php
require_once "Controller.php";
session_start();
$controller = new Controller();

if(isset($_POST['text'])){
    echo $controller->createOtherTable($_SESSION['test_id'] ,$_POST['text']);
    var_dump($_SESSION);
    var_dump($_POST);
    echo $controller->insertQuestion($_SESSION['test_id'] ,$_POST['json'] );
}



?>