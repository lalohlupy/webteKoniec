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
    <title>Registracia</title>
</head>
<body>
    <div class="container">
        <div class="wrapper fadeInDown">
            <div id="formContent">
            <form method="post">
                <label for="meno_ucitel"><b>Meno:</b></label><br>
                <input type="text" id="meno_ucitel" class="fadeIn first" name="meno_ucitel" placeholder="meno" required><br>

                <label for="priezvisko_ucitel"><b>Priezvisko:</b></label><br>
                <input type="text" id="priezvisko_ucitel" class="fadeIn second" name="priezvisko_ucitel" placeholder="priezvisko" required><br>

                <label for="id"><b>AIS Id:</b></label><br>
                <input type="text" id="id" class="fadeIn third" name="id" placeholder="AIS_id" required><br>

                <label for="password">Heslo:</label><br>
                <input type="password" id="password" class="fadeIn fourth" name="password" placeholder="password" required><br><br>

                <input type="submit" class="btn btn-primary fadeIn fifth" value="Potvrdit"><br><br>
            </form>
            </div>
            <?php
                require_once '../vytvaranie_testov/Controller.php';
                $controller = new Controller();

                if(!empty($_POST['id'])){
                    if(is_numeric($_POST['id'])) {
                        $login = $_POST['id'];
                        $result = $controller->selectTeacher($login);
                        if ($result > 0) {
                            echo "Toto id sa uz nachádza v databáze!";
                        } else if (!empty($_POST['meno_ucitel']) && !empty($_POST['priezvisko_ucitel']) && !empty($_POST['id'])
                            && !empty($_POST['password'])) {
                            $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                            $controller->insertTeacher($hash);

                            header("Location: ucitel.php");
                        }
                    }
                    else{
                        echo "Id musí byť iba číslo!";
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>



