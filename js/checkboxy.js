var countM = 0;

function show_hide(){
    if (document.getElementById("multipleAnswersC").checked) {
        document.getElementById("myDiv").style.display = "block";
        document.getElementById("maC").style.display = "block";
    } else {
        document.getElementById("myDiv").style.display = "none";
        document.getElementById("myDiv").innerHTML = "";
        countM = 0;
    }
}

function newCheckbox() {
    var id = "name";
    var maC = document.getElementById("maC");
    var checkbox = document.createElement('input');
    var label = document.createElement('label');
    var text =  document.getElementById("odpoved").value;
    var bututu = document.createElement("button");

    checkbox.type = "checkbox";
    checkbox.id = id + countM;

    label.htmlFor = id + countM;
    label.appendChild(document.createTextNode(text));

    maC.appendChild(checkbox);
    maC.appendChild(label);
    countM++;
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

