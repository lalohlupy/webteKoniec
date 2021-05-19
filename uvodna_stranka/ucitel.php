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
            <label for="id_ucitel"><b>AIS id:</b></label><br>
            <input type="text" id="id_ucitel" class="fadeIn first" name="id_ucitel" placeholder="AIS_ID_ucitel" required><br>

            <label for="heslo_ucitel"><b>Heslo:</b></label><br>
            <input type="password" id="heslo_ucitel" class="fadeIn second" name="heslo_ucitel" placeholder="heslo_ucitel" required><br><br>

            <input type="submit" class="btn btn-primary fadeIn third" value="Prihlásiť sa"><br><br>
            <a class="size_a fadeIn fourth" href="registracia_ucitela.php">Registrovať</a>
            <?php
            require_once '../vytvaranie_testov/Controller.php';
            $controller = new Controller();

            session_start();

            if(!empty($_POST['id_ucitel']) && !empty($_POST['heslo_ucitel'])){
                $login = $_POST['id_ucitel'];
                $result = $controller->selectTeacher($login);

                if($result == 1) {
                    $result = $controller->checkPassword($login);
                    $heslo = $_POST['heslo_ucitel'];
                    if (password_verify($heslo, $result)) {
                        $_SESSION['meno_ucitelp'] = $_POST['id_ucitel'];
                        header("Location: ../pohlad_ucitel/index.php");
                    }
                    else if(!password_verify($heslo, $result)){
                        echo "Zadané heslo je nesprávne!";
                    }
                }
                else if($result != 1){
                    echo "Vaše id sa nenachádza v databáze (registrujte sa)!";
                }
            }
            ?>
        </form>
        </div>
    </div>
</div>
</body>
</html>