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
                <label for="id_ucitel">Vaše id:</label><br>
                <input type="text" id="id_ucitel" name="id_ucitel" required><br>

                <label for="heslo_ucitel">Heslo:</label><br>
                <input type="password" id="heslo_ucitel" name="heslo_ucitel" required><br><br>

                <input type="submit" class="btn btn-primary" value="Prihlásiť sa"><br><br>
            </form>
            <a class="size_a" href="registracia_ucitela.php">Registrovať</a>
            <?php
                require_once '../config.php';

                if(!empty($_POST['id_ucitel']) && !empty($_POST['heslo_ucitel'])){
                    $login = $_POST['id_ucitel'];
                    $sql = $conn->prepare("SELECT COUNT(*) FROM teachers WHERE id_ucitel='$login'");
                    $sql->execute();
                    $result = $sql->fetchColumn();

                    if($result == 1) {
                        $veta = $conn->prepare("SELECT heslo_ucitel from teachers WHERE id_ucitel='$login'");
                        $veta->execute();
                        $result = $veta->fetchColumn();
                        $heslo = $_POST['heslo_ucitel'];
                        if (password_verify($heslo, $result)) {
                            header("Location: ../vytvaranie_testov/index_cernan.php");
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
        </div>
    </div>
</body>
</html>
