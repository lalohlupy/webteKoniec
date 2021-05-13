<!doctype html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <title>Prihlasenie</title>
</head>
<body style="background-color: #aaaabb;">
<div class="container">
    <div class="center">
        <form method="post">
            <label for="kluc">Zadajte klúč:</label><br>
            <input type="text" id="kluc" name="kluc" required><br>

            <label for="meno_student">Meno:</label><br>
            <input type="text" id="meno_student" name="meno_student" required><br>

            <label for="priezvisko_student">Priezvisko:</label><br>
            <input type="text" id="priezvisko_student" name="priezvisko_student" required><br>

            <label for="id_student">Vaše id:</label><br>
            <input type="text" id="id_student" name="id_student" required><br><br>

            <input type="submit" class="btn btn-primary" value="Potvrdit">
        </form>
    </div>
</div>
</body>
</html>

<?php
    if(!empty($_POST['kluc']) && !empty($_POST['meno_student']) && !empty($_POST['priezvisko_student'])
        && !empty($_POST['id_student']))
    {
//        header("Location: qrLogin.php");


    }
?>

