<!doctype html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/student_login_css.css">
    <title>Prihlasenie</title>
</head>
<body>
<div class="container">
    <div class="wrapper fadeInDown">
        <div id="formContent">
        <form method="post">
            <label for="kluc"><b>Zadajte klúč:</b></label><br>
            <input type="text" id="kluc" class="fadeIn first" name="kluc" placeholder="kluc" required><br>

            <label for="meno_student"><b>Meno:</b></label><br>
            <input type="text" id="meno_student" class="fadeIn second" name="meno_student" placeholder="meno" required><br>

            <label for="priezvisko_student"><b>Priezvisko:</b></label><br>
            <input type="text" id="priezvisko_student" class="fadeIn third" name="priezvisko_student" placeholder="priezvisko" required><br>

            <label for="id_student"><b>Vaše AIS ID (číslo):</b></label><br>
            <input type="text" id="id_student" class="fadeIn fourth" name="id_student" placeholder="AIS ID" required><br><br>

            <input type="submit" class="btn btn-primary fadeIn fifth" value="Potvrdit">
        </form>
    </div>
</div>
</body>
</html>

<?php
require_once "../vytvaranie_testov/Controller.php";
session_start();
$controller = new Controller();
    if(!empty($_POST['kluc']) && !empty($_POST['meno_student']) && !empty($_POST['priezvisko_student'])
        && !empty($_POST['id_student']))
    {
        $result =  $controller->selectTable($_POST['kluc']);
        if ($result != "Error" && $result != false) {

            $_SESSION['meno_student'] = $_POST['meno_student'];
            $_SESSION['priezvisko_student'] = $_POST['priezvisko_student'];
            $_SESSION['kluc'] = $_POST['kluc'];
            $_SESSION['id_student'] = $_POST['id_student'];
            header("Location: ../pohlad_student/index.php");
        }
        else { ?>
            <script>
                alert("Kod testu je nespravny!");
            </script>
        <?php }

    }
?>

