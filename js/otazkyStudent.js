
function enableInput(){
    var images = document.getElementById("testQuestions").querySelectorAll(".image");
    var length = images.length;
    for(var i = 0 ; i < length ; i++){
        images[i].removeAttribute("disabled");
    }
}

function getInput(){
    let lis = document.getElementById('testQuestions').getElementsByTagName('li');
    // alert(lis.length);
    getImageInput();
    getTextInput();
    getCheckBoxInput();
}

function getImageInput(){
    var images = document.getElementById("testQuestions").querySelectorAll(".image");
    length = images.length;
    // alert(length);
    // for(var i = 0 ; i < length ; i++){
    //     //alert(images[i].value());
    // }
}

function getTextInput(){
    var text = document.getElementById("testQuestions").querySelectorAll(".text");
    length = text.length;
    // alert("texty: "+length);
    for(var i = 0 ; i < length ; i++){
        // alert(text[i].value);
        // alert(text[i].parentNode.id);
    }

}

function getCheckBoxInput(){
    var check = document.getElementById("testQuestions").querySelectorAll(".checkboxclass")
    var length = check.length;
    // alert("checkboxy: "+length);
    for(var i = 0 ; i < length ; i++){
        // alert(check[i].checked);
    }
}

function loadFile(event , id) {
    // alert(id);
    var image = document.getElementById("image1");
    image.style.width = "300px";
    image.src = URL.createObjectURL(event.target.files[0]);
}
