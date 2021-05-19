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
        <script src='https://unpkg.com/mathlive/dist/mathlive.js'></script>
        <script src="../js/html2canvasLibrary.js"></script>
        <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
        <script id="MathJax-script" async
                src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js">
        </script>
        <script rel="script" src="timer.js"></script>
        <title>Formula Sheets</title>

    </head>
    <body>
        <nav class="navbar  fixed-top navbar-expand-sm navbar-dark bg-dark">
            <div class="container">
                <a href="#" class="navbar-brand mb-0 h1">Navbar</a>
                <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" class="navbar-toggler" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a href="https://wt50.fei.stuba.sk/webteKoniec/pohlad_student/index.php" class="nav-link">Show Exam</a>
                        </li>
                        <li class="nav-item active">
                            <a href="#" class="nav-link active">Formula Sheets</a>
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
                                session_start();
                                if (isset($_SESSION['meno_student'])) {
                                    echo $_SESSION['meno_student'];
                                }
                                ?></span>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container" style="margin-top: 15vh;flex-direction: column; display: flex; align-items:center;">
            <h1>Make your custom formulas:</h1>

            <div class="mathfield" id="mf">
                <math-field id="mathf" virtual-keyboard-mode="manual">f(x)</math-field>
            </div>

            <textarea name="vzorecm" id="vzorecm" cols="30" rows="10" style="width: 65%;margin: 2vw"></textarea>

            <button id="myBtn" onclick="screen()">Save</button>
        </div>

        <script>
            function screen(){
                document.getElementById("vzorecm").innerHTML = mathf.getValue();
                var container = document.getElementById("vzorecm"); //specific element on page

                html2canvas(container).then(function(canvas) {
                    // document.body.appendChild(canvas);
                    var a = document.createElement('a');

                    a.download = "html_image.png";
                    a.href = canvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octet-stream");
                    a.click();
                });
            }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>
</html>

