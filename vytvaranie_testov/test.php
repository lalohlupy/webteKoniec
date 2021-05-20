<?php
require_once "Controller.php";
session_start();
$controller = new Controller();

if(isset($_POST['json'])){
    $controller->insertQuestion($_SESSION['test_id'] ,$_POST['json'] );
    $_POST = array();
}
var_dump($_POST);
if(isset($_POST['length'])){
    $controller->createOtherTable($_SESSION['test_id'] ,$_POST['length']);
    $controller->updateTest($_SESSION['test_id'] , $_POST['name'] , $_POST['time'] );
    $_POST = array();
    //header("Location: ../pohlad_ucitel/check_submit_exams.php");
}


?>