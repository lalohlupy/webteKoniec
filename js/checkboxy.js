var index = 0;

function show_hide(){
    if (document.getElementById("multipleAnswers").checked) {
        document.getElementById("myDiv").style.display = "block";
    } else {
        document.getElementById("myDiv").style.display = "none";
        document.getElementById("myDiv").innerHTML = "";
        index = 0;
    }
}

function newCheckbox() {
    var id = "name";
    var myDiv = document.getElementById("myDiv");
    var checkbox = document.createElement('input');
    var label = document.createElement('label');
    var text =  document.getElementById("odpoved").value;

    checkbox.type = "checkbox";
    checkbox.id = id + index;

    label.htmlFor = id + index;
    label.appendChild(document.createTextNode(text));

    myDiv.appendChild(checkbox);
    myDiv.appendChild(label);
    index++;
}
function newButton(){
    if(!document.getElementById("pridaj_checkbox")) {
        var btn = document.createElement("BUTTON");
        var text_pole = document.createElement('input');
        btn.innerHTML = "Pridat checkbox";
        btn.id = "pridaj_checkbox";
        btn.onclick = newCheckbox;

        text_pole.type = "text";
        text_pole.id = "odpoved";

        myDiv.appendChild(btn);
        myDiv.appendChild(text_pole);
    }
}

