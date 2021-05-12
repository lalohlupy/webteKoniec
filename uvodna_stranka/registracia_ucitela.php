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
    <title>Registracia</title>
</head>
<body style="background-color: #aaaabb;">
    <div class="container">
        <div class="center">
            <form method="post">
                <label for="meno_ucitel">Meno:</label><br>
                <input type="text" id="meno_ucitel" name="meno_ucitel" required><br>

                <label for="priezvisko_ucitel">Priezvisko:</label><br>
                <input type="text" id="priezvisko_ucitel" name="priezvisko_ucitel" required><br>

                <label for="id">Id:</label><br>
                <input type="text" id="id" name="id" required><br>

                <label for="password">Heslo:</label><br>
                <input type="password" id="password" name="password" required><br><br>

                <input type="submit" class="btn btn-primary" value="Potvrdit"><br><br>
            </form>

            <?php
                require_once 'config.php';

                if(!empty($_POST['id'])){
                    if(is_numeric($_POST['id'])) {
                        $login = $_POST['id'];
                        $sql = $conn->prepare("SELECT COUNT(*) FROM teachers WHERE id_ucitel='$login'");
                        $sql->execute();
                        $result = $sql->fetchColumn();
                        if ($result > 0) {
                            echo "Toto id sa uz nachádza v databáze!";
                        } else if (!empty($_POST['meno_ucitel']) && !empty($_POST['priezvisko_ucitel']) && !empty($_POST['id'])
                            && !empty($_POST['password'])) {
                            $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
                            $sql = "INSERT INTO teachers (meno_ucitel, priezvisko_ucitel, id_ucitel, heslo_ucitel)
                    VALUES ('{$_POST['meno_ucitel']}', '{$_POST['priezvisko_ucitel']}', '{$_POST['id']}', 
                            '{$hash}')";
                            $conn->exec($sql);
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



