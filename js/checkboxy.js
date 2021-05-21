var countM = 0;
var checkbox_idm;
var label_idm;
var delete_idm;
var pole_deleteidm = [];

function show_hide(){
    if (document.getElementById("multipleAnswersC").checked) {
        document.getElementById("maC").style.display = "block";
        document.getElementById("madivC").style.display = "block";
    } else {
        document.getElementById("maC").style.display = "none";
        document.getElementById("maC").innerHTML = "";
        document.getElementById("madivC").style.display = "none";
        document.getElementById("madivC").innerHTML = "";
        pole_deleteidm = [];
    }
}

function newCheckbox() {
    var maC = document.getElementById("maC");
    var checkbox = document.createElement('input');
    var label = document.createElement('label');
    var text =  document.getElementById("odpovedm").value;
    var btn_deletem = document.createElement("BUTTON");

    checkbox.type = "checkbox";
    checkbox_idm = "namem" + countM;
    checkbox.id = checkbox_idm;
    checkbox.setAttribute("class" , "checkboxclass");

    label.htmlFor = checkbox_idm;
    label_idm = "labelm" + countM;
    label.id = label_idm;
    label.appendChild(document.createTextNode(text));

    btn_deletem.textContent = "Delete";
    delete_idm = "delete_checkbox" + countM;
    btn_deletem.id = delete_idm;
    pole_deleteidm.push(delete_idm);
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
    var string = checkbox.slice(-1);
    var index;

    if(countM > 9 && checkbox.slice(14,-1) !== 'x'){
        string = checkbox.slice(-2);
    }
    else if(countM > 99 && checkbox.slice(14,-2) !== 'x'){
        string = checkbox.slice(-3);
    }
    else if(countM > 999 && checkbox.slice(14,-3) !== 'x'){
        string = checkbox.slice(-4);
    }

    index = pole_deleteidm.indexOf("delete_checkbox" + string);
    pole_deleteidm.splice(index,1);

    document.getElementById(checkbox).remove();
    document.getElementById("namem"+string).remove();
    document.getElementById("labelm"+string).remove();
}



