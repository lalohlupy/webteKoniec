
var index = 1;

function myFunction() {

    var questionId = "questionC";
    var divId = "divC"+index;
    var divNode = document.createElement("DIV");
    divNode.setAttribute("id" , divId);
    document.getElementById("testListC").appendChild(divNode);

    if(document.getElementById(divId) != null){

        var node = document.createElement("LI");                //pridaj list
        node.setAttribute("id" , questionId+index);
        index++;
        var text = document.getElementById("testNameC").value;      //pridaj nazov
        var textnode = document.createTextNode(text);
        node.appendChild(textnode);


        var check1 = document.getElementById("multipleAnswersC").checked;
        var check2 = document.getElementById("shortAnswerC").checked;
        if(check1 == true){
            var temp = $("#maC").html();
            //alert(temp);
            text = "- vyber z moznosti";
            textnode = document.createTextNode(text);
            node.appendChild(textnode);
            document.getElementById("maC").style.display = "none";
            document.getElementById("maC").innerHTML = "";
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
        //alert(divId);
        tempId = "#"+divId;
        $(tempId).append(node);
        $(tempId).append(temp);
        //document.getElementById(divId).appendChild(node);
        if(check2 == true) {document.getElementById(divId).appendChild(textarea);}


        var jsonObject = $(tempId).html();
        $.ajax({
            type : 'POST',
            url : 'https://wt33.fei.stuba.sk/webteKoniec/vytvaranie_testov/test.php',
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
    }
}



function myFunction2(){
    var temp = $("#testListC").html();
    var json = JSON.stringify(temp);
    alert(json);

}
/*
$("#btn2").click(function(){
    var jsonObject = $("#testListC").html();

    $.ajax({
        type : "POST",
        url : "pridavanie_otazok.php",
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
});*/



