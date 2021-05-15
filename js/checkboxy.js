var countM = 0;
var checkbox_idm;
var label_idm;
var delete_idm;

function show_hide(){
    if (document.getElementById("multipleAnswersC").checked) {
        document.getElementById("maC").style.display = "block";
        document.getElementById("madivC").style.display = "block";
    } else {
        document.getElementById("maC").style.display = "none";
        document.getElementById("madivC").innerHTML = "";
        countM = 0;
    }
}

function newCheckbox() {
    //var maC = document.getElementById("maC");
    var maC = document.getElementById("maC");
    var checkbox = document.createElement('input');
    var label = document.createElement('label');
    var text =  document.getElementById("odpovedm").value;
    var btn_deletem = document.createElement("BUTTON");

    checkbox.type = "checkbox";
    checkbox_idm = "namem" + countM;
    checkbox.id = checkbox_idm;


    label.htmlFor = checkbox_idm;
    label_idm = "labelm" + countM;
    label.id = label_idm;
    label.appendChild(document.createTextNode(text));

    btn_deletem.textContent = "Delete";
    delete_idm = "delete_checkbox" + countM;
    btn_deletem.id = delete_idm;
    //btn_deletem.onclick = deleteCheckbox(checkbox_idm, this.label_idm, this.delete_idm);
    btn_deletem.setAttribute("onclick" , "deleteCheckbox(this.id)");

    maC.appendChild(checkbox);
    maC.appendChild(label);
    maC.appendChild(btn_deletem);
    countM++;
}
function newButton(){
    if(!document.getElementById("pridaj_checkbox")) {
        var btn = document.createElement("BUTTON");
        var text_pole = document.createElement('input');

        btn.textContent = "Pridat checkbox";
        btn.id = "pridaj_checkbox";
        btn.onclick = newCheckbox;

        text_pole.type = "text";
        text_pole.id = "odpovedm";

        madivC.appendChild(btn);
        madivC.appendChild(text_pole);
    }
}
function deleteCheckbox(checkbox){
    checkbox = checkbox.toString();
    string = checkbox.slice(-1);
    alert(string);
    //document.getElementById(checkbox).removeChild();
    document.getElementById(checkbox).remove();
    document.getElementById("namem"+string).remove();
    document.getElementById("labelm"+string).remove();
    //document.getElementById("delete_idm"+string).remove();
}

