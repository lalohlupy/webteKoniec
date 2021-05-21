<?php
session_start();
if(!isset($_SESSION['meno_ucitelp'])){
    header("Location: ../uvodna_stranka/index.php");
}
else {
    require_once "functions.php";
    require_once "Controller.php";

    $controller = new Controller();

    $myRandomString = generateRandomString(8);
    $ucitel_id = $_SESSION['meno_ucitelp'];

    $temp = $controller->insertTest($ucitel_id , $myRandomString , "" , "1");

    while($temp != 1){
        $myRandomString = generateRandomString(8);
        $temp = $controller->insertTest($ucitel_id , $myRandomString , "" , "1");
    }

    $_SESSION['test_id'] = $myRandomString;
    $controller->createTable($myRandomString);
}

//test_name VARCHAR(30) NOT NULL,
//$_SESSION['key'] = $myRandomString;
//if(isset($_POST)){
//    var_dump($_POST);
//    $_POST = array();
//}
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script rel="script" src="../js/jquery-3.6.0.min.js"></script>
    <script src="../js/checkboxy.js"></script>
    <script src="../js/tvorenieOtazok.js"></script>
    <title>Vytvaranie testov</title>
</head>
<body>

<div class="row">
    <div class="col">
        <!-- <h2>Kod testu : //$myRandomString</h2> -->

        <label for="testNameC">Nazov testu:</label>
        <br><textarea id="testNameC" name="testName" rows="1" cols="40" ></textarea>

        <br><label for="testTimeC">Cas na vypracovanie:</label>
        <br><input type="number" id="testTimeC" name="testTime" min="1" max="600" placeholder="od 1 do 600 minut" >

        <br><label for="questNameC"><br>Nazov otazky:</label>
        <br><textarea id="questNameC" name="questName" rows="1" cols="40" ></textarea>

        <ul onchange="show_hide()">
            <li>
                <input type="radio" id="multipleAnswersC" onclick="newButton()" name="testType" value="multipleAnswers">
                <label for="multipleAnswersC">vyber z moznosti</label><br>
            </li>
            <li>
                <input type="radio" id="shortAnswerC" name="testType" value="shortAnswer">
                <label for="shortAnswerC">kratka slovna odpoved</label><br>
            </li>
            <li>
                <input type="radio" id="pairAnswersC" name="testType" value="pairAnswers">
                <label for="pairAnswersC">parovanie otazok</label>
            </li>
            <li>
                <input type="radio" id="imageAnswersC" name="testType" value="imageAnswers">
                <label for="imageAnswersC">vlozenie obrazka</label>
            </li>
            <li>
                <input type="radio" id="mathAnswersC" name="testType" value="mathAnswers">
                <label for="mathAnswersC">vlozenie matematickeho vzorca</label>
            </li>
        </ul>

        <button onclick="myFunction()">Pridat otazku</button>
        <button onclick="myFunction2()">Vytvorit test</button>
        <!-- <button id="btn2">Show HTML</button>  -->
        <div id="maC"></div>
        <div id="madivC"></div>

    </div>
    <div class="col">
        <div id="questionDivC">
            <ol id="testListC"></ol>
        </div>
    </div>
</div>
</body>
</html>

