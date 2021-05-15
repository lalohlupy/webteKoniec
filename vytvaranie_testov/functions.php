<?php
require_once "Controller.php";




function generateRandomString($length) {

    $controller = new Controller();

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }


    $temp = $controller->selectQuestion($randomString);
    //echo $temp;
    //$temp = selectQuestion($randomString);
    //if( $temp!=0 && $temp != "Error");

    return $randomString;
}
?>
