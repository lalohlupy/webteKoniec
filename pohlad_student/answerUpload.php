<?php
$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
include '../vytvaranie_testov/Database.php';

var_dump($_FILES);
//
var_dump($_POST);
var_dump($target_file);

//check if already submitted
$sql = "SELECT * FROM finished_tests WHERE ais_id = ? AND test_key = ?";
$stmt = (new Database())->getConnection()->prepare($sql);
$stmt->execute([(int) $_POST['userId'], $_POST['testKey']]);
$already_finished = $stmt->fetchAll(PDO::FETCH_ASSOC);

//if not then submit
if (empty($already_finished)) {
    $conn = (new Database())->getConnection();
    $sql = "INSERT INTO finished_tests (test_key, ais_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_POST['testKey'], (int) $_POST['userId']]);
}

//
//
////$nameArray = explode(".", $_FILES["fileToUpload"]["name"]);
//$ext = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
////$timeStamp = time();
//
//$fileName =  basename($_FILES["fileToUpload"]["name"], ".$ext");        // tento file je work in progress
//
//var_dump($_POST);
//
//if($_POST['filename'] == null) {
//    $fileName = $fileName . "_" .  "." . $ext;
//
//}
//else{
//    $fileName = $_POST["filename"]."_".".".$ext;
//    //echo " ".$fileName." ";
//}
//
//if (file_exists($target_file)) { // Check if file already exists
//    //$fileName = "file"."_".$timeStamp.".".$ext;
//    echo " ".$fileName." ";
//}
//
//if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$fileName)) {
//    echo "The file ". htmlspecialchars($fileName). " has been uploaded.";
//} else {
//    echo "Sorry, there was an error uploading your file.";
//}

?>

