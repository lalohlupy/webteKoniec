<?php


?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script rel="script" src="../js/jquery-3.6.0.min.js"></script>
    <script rel="script" src="../js/checkboxy.js"></script>
    <title>Vytvaranie testov</title>
</head>
<body class="container">

<ol id="testList"></ol>

<label for="testName">Test name:</label>
<textarea id="testName" name="testName" rows="1" cols="25"></textarea>
<ul onchange="show_hide()">
    <li>
        <input type="radio" id="multipleAnswers" onclick="newButton()" name="testType" value="multipleAnswers">
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
<button onclick="myFunction2()">get all questions</button>
<button id="btn2">Show HTML</button>

<div id="myDiv"></div>





<script>
    $("document").ready(function (){
        $("body").append("list");
    })
    var index = 0;

function myFunction() {
    var idName = "question"
    var node = document.createElement("LI");                //pridaj list
    node.setAttribute("id" , idName+index);
    index++;
    var text = document.getElementById("testName").value;      //pridaj nazov
    var textnode = document.createTextNode(text);
    node.appendChild(textnode);


    var check1 = document.getElementById("multipleAnswers").checked;
    var check2 = document.getElementById("shortAnswer").checked;
    if(check1 == true){
        text = "- choose one from multiple answers";
        textnode = document.createTextNode(text);
        node.appendChild(textnode);
    }
    else if(check2 == true){
        var textarea = document.createElement("textarea");
        text = "- write short text answer";
        textnode = document.createTextNode(text);
        node.appendChild(textnode);
    }
    else {
        text = "- pair answers together";
        textnode = document.createTextNode(text);
        node.appendChild(textnode);
    }
    //alert(text);
    document.getElementById("testList").appendChild(node);
    document.getElementById("testList").appendChild(textarea);


};

function myFunction2(){
    $("#myDiv :input").hide(); // :input matches all input elements, including selects
};

$("#btn2").click(function(){
    alert("HTML: " + $("#testList").html());
});




</script>

</body>
</html>