<?php
session_start();
var_dump($_POST);

$_SESSION['time'] = $_POST['time'] - 1;

var_dump($_SESSION);

?>