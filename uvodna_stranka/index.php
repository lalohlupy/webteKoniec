<?php
session_start();
session_unset();
?>

<script>
    sessionStorage.clear();
</script>

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
    <title>Typ Prihlasenia</title>
</head>
</html>
<body>
    <div class="container">
        <div class="wrapper fadeInDown" >
            <div id="formContent" style="margin-bottom: 45%;">
                <h1>Prihlásiť sa ako: </h1>
                <a class="fadeIn first" id="student" href="student.php" style="color: dodgerblue;text-decoration: none;font-weight: 400; font-size: 150%; display: flex;flex-direction: column;align-items:center; "><b>Študent</b></a>
                <a class="fadeIn second" id="ucitel" href="ucitel.php" style="color: dodgerblue;text-decoration: none;font-weight: 400; font-size: 150%; display: flex; flex-direction: column;align-items:center; "><b>Učiteľ</b></a>
            </div>
        </div>
    </div>
</body>
<!--ajsda-->





