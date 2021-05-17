<?php
?>

<!doctype html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Definícia časového limitu</title>
</head>
<body>
<nav class="navbar  fixed-top navbar-expand-sm navbar-dark" style="background-color: darkred">
    <div class="container">
        <a href="#" class="navbar-brand mb-0 h1">Navbar</a><!--NAVBAR-->
        <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" class="navbar-toggler" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a href="index.php" class="nav-link">Define and Edit Exams</a>
                </li>
                <li class="nav-item active">
                    <a href="#" class="nav-link  active">Define Time Limit for Exams</a>
                </li>
                <li class="nav-item active">
                    <a href="five_types_of.php" class="nav-link">Define 5 Types of Questions</a>
                </li>
                <li class="nav-item active">
                    <a href="check_student_activity.php" class="nav-link">Check Student Activity</a>
                </li>
                <li class="nav-item active">
                    <a href="check_submit_exams.php" class="nav-link">Chech Submited Exams</a>
                </li>
                <li class="nav-item active">
                    <a href="export_exams.php" class="nav-link">Export Exams</a>
                </li>
            </ul>
            <div>
                <span style="color: darkorange">LOGGED IN AS: <?php
                    session_start();
                    //                        if (isset($_SESSION['meno_student'])) {
                    //                            echo $_SESSION['meno_student'];
                    //                        }
                    ?></span>
            </div>
        </div>
    </div>
</nav>
<div class="container" style="margin-top: 15vh;">
    <h1>Vypisane testy s moznostou upravy casu...</h1>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
