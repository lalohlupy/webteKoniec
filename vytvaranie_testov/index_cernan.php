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
    <title>Vytvaranie testov</title>
</head>
<body class="container">



<div id="myDiv">
    <ol id="testList"></ol>
</div>
<label for="testName">Nazov testu:</label>
<textarea id="testName" name="testName" rows="1" cols="25"></textarea>
<ul onchange="show_hide()">
    <li>
        <input type="radio" id="multipleAnswers" onclick="newButton()" name="testType" value="multipleAnswers">
        <label for="multipleAnswers">vyber z moznosti</label><br>
    </li>
    <li>
        <input type="radio" id="shortAnswer" name="testType" value="shortAnswer">
        <label for="shortAnswer">kratka slovna odpoved</label><br>
    </li>
    <li>
        <input type="radio" id="pairAnswers" name="testType" value="pairAnswers">
        <label for="pairAnswers">parovanie otazok</label>
    </li>
</ul>
<button onclick="myFunction()">Pridat otazku</button>
<button onclick="myFunction2()">get all questions</button>
<button id="btn2">Show HTML</button>





<script>
    /*$("document").ready(function (){
        $("body").append("list");
    })*/
    var index = 0;

function myFunction() {
    var questionId = "question";
    var divId = "div"+index;
    var divNode = document.createElement("DIV");
    divNode.setAttribute("id" , divId);
    document.getElementById("testList").appendChild(divNode);

    if(document.getElementById(divId) != null){

        var node = document.createElement("LI");                //pridaj list
        node.setAttribute("id" , questionId+index);
        index++;
        var text = document.getElementById("testName").value;      //pridaj nazov
        var textnode = document.createTextNode(text);
        node.appendChild(textnode);


        var check1 = document.getElementById("multipleAnswers").checked;
        var check2 = document.getElementById("shortAnswer").checked;
        if(check1 == true){
            text = "- vyber z moznosti";
            textnode = document.createTextNode(text);
            node.appendChild(textnode);
        }
        else if(check2 == true){
            var textarea = document.createElement("textarea");
            text = "- kratka slovna odpoved";
            textnode = document.createTextNode(text);
            node.appendChild(textnode);
        }
        else {
            text = "- parovanie otazok";
            textnode = document.createTextNode(text);
            node.appendChild(textnode);
        }
        alert(divId);
        tempId = "#"+divId;
        $(tempId).append(node);
        document.getElementById(divId).appendChild(node);
        document.getElementById(divId).appendChild(textarea);
    }
    //alert(text);
    document.getElementById("testList").appendChild(node);
    document.getElementById("testList").appendChild(textarea);



}

function myFunction2(){
    var temp = $("#testList").html();
    var json = JSON.stringify(temp);
    alert(json);

}

$("#btn2").click(function(){
    var jsonObject = $("#testList").html();

    $.ajax({
        type : "POST",
        url : "testsIO.php",
        dataType : 'text',
        data : {
            json : jsonObject
        },
        success: function (data){
            alert(data);
        },
        error: function (xhr ,request , error){
            console.log(arguments);
            var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
        }

    });

    //var myJSON = JSON.stringify(temp);
    //localStorage.setItem("testJSON", myJSON);

    //text = localStorage.getItem("testJSON");
    //obj = JSON.parse(temp);
    //alert(temp);
    //$("#testDiv").append(temp);
    //document.getElementById("testDiv").appendChild(temp);
});




</script>

</body>
</html>