<?php
require "../vytvaranie_testov/Controller.php";

session_start();
$controller = new Controller();

if(!isset($_SESSION['id_student'])) {
    header("Location: ../uvodna_stranka/index.php");
}

$questions = $controller->selectTableQuestion($_SESSION['kluc']);
$table = $controller->selectTable($_SESSION['kluc']);

$_SESSION['time'] = $table['time'];

?>



<!doctype html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script rel="script" src="../js/otazkyStudent.js"></script>
    <script rel="script" src="../js/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script rel="script" src="timer.js"></script>
    <title>Testy</title>
</head>
<body>
<script>
    $(window).on('load', function() {
        start();
        enableInput();
    });
</script>
<nav class="navbar  fixed-top navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
        <a href="#" class="navbar-brand mb-0 h1">Navbar</a>
        <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" class="navbar-toggler" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a href="#" class="nav-link active">Show Exam</a>
                </li>
                <li class="nav-item active">
                    <a href="formula_sheets.php" class="nav-link">Formula Sheets</a>
                </li>
                <li class="nav-item active">
                    <a href="drawing_tool.php" class="nav-link">Drawing Tool</a>
                </li>
                <li class="nav-item active">
                    <a href="scan_work.php" class="nav-link">Scan work</a>
                </li>
                <li class="nav-item active">
                    <span class="nav-link">Time Left: <span id="time"></span></span>
                </li>
                <li class="nav-item dropdown">
                    <span class="nav-link dropdown-toggle" id="navbarDropDown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Team</span>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropDown">
                        <li><span class="dropdown-item">Boris Gašparovič</span></li>
                        <li><span class="dropdown-item">Peter Čerňan</span></li>
                        <li><span class="dropdown-item">Martin Varga</span></li>
                        <li><span class="dropdown-item">Tomáš Kaňka</span></li>
                    </ul>
                </li>
            </ul>
            <div>
                    <span style="color: darkorange">LOGGED IN AS: <?php
                        if (isset($_SESSION['meno_student'])) {
                            echo $_SESSION['meno_student'];
                            echo " ".$_SESSION['priezvisko_student'];
                        }
                        ?></span>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="../uvodna_stranka/index.php" class="nav-link" style="color: dodgerblue" onclick="sessionStorage.clear()"><b>Log Out</b></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div id="prehladTestov" class="border border-primary border-2 rounded-3 w-75" style="margin-top: 10vh; margin-left: 13%; padding: 30px">

    <span id="time_database" hidden><?= $_SESSION['time']?></span>
    <div class="container ">
        <form class="align-items-center" method="post" action="answerUpload.php">
            <input type="hidden" value="<?= $_SESSION['id_student']?>" name="userId">
            <input type="hidden" value="<?= $_SESSION['kluc']?>" name="testKey">
            <div style="margin-left: 30%">
                <div id="testQuestions" >
                    <p>test:</p>
                    <?php
                    foreach ($questions as $question){
                        echo $question->getTestCode();
                    }
                    ?>
                </div>
            </div>
            <div class="text-center" style="padding: 25px">
                <button type="submit" class="btn btn-primary ">Submit Your Exam</button>
            </div>
        </form>
    </div>
</div>
<script rel="script" src="timer.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>