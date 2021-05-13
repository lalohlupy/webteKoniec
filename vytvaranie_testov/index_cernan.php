<?php


?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <title>Vytvaranie testov</title>
    <meta name="description" content="Skuskove_zadanie">
    <meta name="cernan" content="SitePoint">

    <link rel="stylesheet" href="../css/style.css">
    <script rel="script" src="../js/jquery-3.6.0.min.js"></script>
</head>
<body>

<ol id="testList"></ol>


<label for="testName">Test name:</label>
<textarea id="testName" name="testName" rows="1" cols="25"></textarea>
<ul>
    <li>
        <input type="radio" id="multipleAnswers" name="testType" value="multipleAnswers">
        <label for="multipleAnswers">multipleAnswers</label><br>
    </li>
    <li>
        <input type="radio" id="shortAnswer" name="testType" value="shortAnswer">
        <label for="shortAnswer">shortAnswer</label><br>
    </li>
    <li>
        <input type="radio" id="pairAnswers" name="testType" value="pairAnswers">
        <label for="pairAnswers">pairAnswers</label>
    </li>
</ul>
<button onclick="myFunction()">Add question</button>






<script>
    $("document").ready(function (){
        $("body").append("list");
    })


function myFunction() {
    var node = document.createElement("LI");                //pridaj list

    var text = document.getElementById("testName").value;      //pridaj nazov
    var textnode = document.createTextNode(text);
    node.appendChild(textnode);


    var check1 = document.getElementById("multipleAnswers").checked;
    var check2 = document.getElementById("shortAnswer").checked;
    if(check1 == true){
        text = "- multipleAnswers";
        textnode = document.createTextNode(text);
        node.appendChild(textnode);
    }
    else if(check2 == true){
        text = "- shortAnswer";
        textnode = document.createTextNode(text);
        node.appendChild(textnode);
    }
    else {
        text = "- pairAnswers";
        textnode = document.createTextNode(text);
        node.appendChild(textnode);
    }
    //alert(text);
    document.getElementById("testList").appendChild(node);


}
</script>

</body>
</html>