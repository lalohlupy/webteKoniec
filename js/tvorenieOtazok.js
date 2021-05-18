
var index = 1;

function myFunction() {
    deleteButtonsDelete();
    var questionId = "questionC";
    var divId = "divC"+index;
    var divNode = document.createElement("DIV");
    divNode.setAttribute("id" , divId);
    document.getElementById("testListC").appendChild(divNode);

    if(document.getElementById(divId) != null){
        var node = document.createElement("LI");                //pridaj list
        node.setAttribute("id" , questionId+index);

        var text = document.getElementById("questNameC").value;      //pridaj nazov
        var textnode = document.createTextNode(text);
        node.appendChild(textnode);


        var check1 = document.getElementById("multipleAnswersC").checked;
        var check2 = document.getElementById("shortAnswerC").checked;
        var check3 = document.getElementById("pairAnswersC").checked;
        var check4 = document.getElementById("imageAnswersC").checked;
        if(check1 == true){
            var temp = $("#maC").html();
            //alert(temp);
            text = "- vyber z moznosti";
            textnode = document.createTextNode(text);
            node.appendChild(textnode);
            document.getElementById("maC").innerHTML = "";
        }
        else if(check2 == true){
            var textarea = document.createElement("textarea");
            text = "- kratka slovna odpoved";
            textnode = document.createTextNode(text);
            node.appendChild(textnode);
        }
        else if(check3 == true){
            text = "- parovanie otazok";
            textnode = document.createTextNode(text);
            node.appendChild(textnode);
        }
        else if (check4 == true){
            text = "- vlozenie obrazka";
            textnode = document.createTextNode(text);
            var input = document.createElement("INPUT");
            input.setAttribute("type", "file");
            input.setAttribute("accept", "image/png, image/gif, image/jpeg");
            var image = document.createElement("img");
            image.setAttribute("id" , "image"+index);
            input.setAttribute("onchange" , "loadFile(event)");
            input.setAttribute("disabled" , "true");
            node.appendChild(textnode);
            node.appendChild(image);
            node.appendChild(input);
        }
        else {
            text = "- vlozenie matematickeho vzorca";
            textnode = document.createTextNode(text);
            node.appendChild(textnode);
        }
        index++;

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
                //alert(data);
            },
            error: function (xhr ,request , error){
                console.log(arguments);
                var err = eval("(" + xhr.responseText + ")");
                alert(err.Message);
            }

        });
    }
}

var loadFile = function(event) {
    var image = document.getElementById("image"+index);
    image.style.width = "300px";
    image.src = URL.createObjectURL(event.target.files[0]);
};


function myFunction2(){
    let name = document.getElementById("testNameC").value;
    let string = index-1;
    $.ajax({
        type : 'POST',
        url : 'https://wt33.fei.stuba.sk/webteKoniec/vytvaranie_testov/test.php',
        dataType : 'text',
        data : {
            text : string,
            name : name
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
    window.location.replace("https://wt33.fei.stuba.sk/webteKoniec/pohlad_ucitel/check_submit_exams.php");

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

function deleteButtonsDelete(){
    if (document.getElementById("multipleAnswersC").checked){
        for(var i = 0; i < pole_deleteidm.length; i++) {
                document.getElementById(pole_deleteidm[i]).remove();
        }
        pole_deleteidm = [];
    }
}



