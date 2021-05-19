<?php
//require "../vytvaranie_testov/Controller.php";
//
//session_start();
//$controller = new Controller();
//
//
//$questions = $controller->selectTableQuestion($_SESSION['kluc']);


?>

<script rel="script" src="../js/jquery-3.6.0.min.js"></script>
<script rel="script" src="timer.js"></script>


<!doctype html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Testy</title>
</head>
<body>
    <script>
        $(window).on('load', function() {
            start();
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
                        <a href="https://wt50.fei.stuba.sk/webteKoniec/pohlad_student/formula_sheets.php" class="nav-link">Formula Sheets</a>
                    </li>
                    <li class="nav-item active">
                        <a href="https://wt50.fei.stuba.sk/webteKoniec/pohlad_student/drawing_tool.php" class="nav-link">Drawing Tool</a>
                    </li>
                    <li class="nav-item active">
                        <a href="https://wt50.fei.stuba.sk/webteKoniec/pohlad_student/scan_work.php" class="nav-link">Scan work</a>
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
            </div>
        </div>
    </nav>
    <div id="prehladTestov" class="border border-primary border-2 rounded-3 w-75" style="margin-top: 10vh; margin-left: 13%; padding: 30px">
        <div class="container">
            <form class="align-items-center" >
                <div style="margin-left: 30%">
                    <div id="testQuestions">
                        <p>test:</p>
                        <?php
                        foreach ($questions as $question){
                            echo $question->getTestCode();
                        }
                        ?>
                    </div>
                    <div class="mb-3 w-50" id="testQuestionNum1"><!-- id na zaklade ktorych potom vlozim testove otazky -->
                        <label for="testQuestionNum1" class="form-label">1. Question</label>
                        <input type="text" class="form-control input-lg" id="testQuestionNum1" aria-describedby="testQuestion1">
                        <div id="testQuestion1" class="form-text">Choose the correct answer.</div>
                    </div>
                    <div class="mb-3 w-50" id="testQuestionNum2"><!-- id na zaklade ktorych potom vlozim testove otazky -->
                        <label for="testQuestionNum2" class="form-label">2. Question</label>
                        <input type="text" class="form-control input-lg" id="testQuestionNum2" aria-describedby="testQuestion2">
                        <div id="testQuestion2" class="form-text">Choose the correct answer.</div>
                    </div>
                    <div class="mb-3 w-50" id="testQuestionNum3"><!-- id na zaklade ktorych potom vlozim testove otazky -->
                        <label for="testQuestionNum3" class="form-label">3. Question</label>
                        <input type="text" class="form-control input-lg" id="testQuestionNum3" aria-describedby="testQuestion3">
                        <div id="testQuestion3" class="form-text">Choose the correct answer.</div>
                    </div>
                    <div class="mb-3 w-50" id="testQuestionNum4"><!-- id na zaklade ktorych potom vlozim testove otazky -->
                        <label for="testQuestionNum4" class="form-label">4. Question</label>
                        <input type="text" class="form-control input-lg" id="testQuestionNum4" aria-describedby="testQuestion4">
                        <div id="testQuestion4" class="form-text">Choose the correct answer.</div>
                    </div>
                    <div class="mb-3 w-50" id="testQuestionNum5"><!-- id na zaklade ktorych potom vlozim testove otazky -->
                        <label for="testQuestionNum5" class="form-label">5. Question</label>
                        <input type="text" class="form-control input-lg" id="testQuestionNum5" aria-describedby="testQuestion5">
                        <div id="testQuestion5" class="form-text">Choose the correct answer.</div>
                    </div>
                </div>
                <div class="text-center" style="padding: 25px">
                    <button type="submit" class="btn btn-primary ">Submit Your Exam</button>
                </div>
            </form>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>

<script>
//    var tempId = "#testQuestions";
//
//    $(tempId).html(
//
//        //var_dump($questions);
////        foreach ($questions as $question){
////            echo "1";
////            //
////        }
//
//    );
</script>
