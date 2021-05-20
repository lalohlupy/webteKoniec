<?php
$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

//$nameArray = explode(".", $_FILES["fileToUpload"]["name"]);
$ext = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$timeStamp = time();

$fileName =  basename($_FILES["fileToUpload"]["name"], ".$ext");        // tento file je work in progress

if($_POST['filename'] == null){
    $fileName = $fileName."_".$timeStamp.".".$ext;
    //echo " ".$fileName." ";
}
else{
    $fileName = $_POST["filename"]."_".$timeStamp.".".$ext;
    //echo " ".$fileName." ";
}
/*
if (file_exists($target_file)) { // Check if file already exists
    //$fileName = "file"."_".$timeStamp.".".$ext;
    echo " ".$fileName." ";
}*/


if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_dir.$fileName)) {
    echo "The file ". htmlspecialchars( $fileName). " has been uploaded.";
} else {
    echo "Sorry, there was an error uploading your file.";
}

?>

