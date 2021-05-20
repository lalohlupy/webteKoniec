<?php
session_start();
if(!isset($_SESSION['id_student'])) {
    header("Location: ../uvodna_stranka/index.php");
}
?>

<!doctype html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--    <script-->
<!--            src="https://code.jquery.com/jquery-3.6.0.slim.js"-->
<!--            integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY="-->
<!--            crossorigin="anonymous"></script>-->

    <script rel="script" src="../js/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/drawing_style.css" type="text/css">
    <title>Drawing Tool</title>
</head>
<body>
<script>
    $(window).on('load', function() {
        start();
    });
</script>
<nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark" >
    <span id="time_database" hidden><?= $_SESSION['time']?></span>

    <div class="container">
        <a href="#" class="navbar-brand mb-0 h1">Navbar</a>
        <button type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" class="navbar-toggler" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a href="index.php" class="nav-link">Show Exam</a>
                </li>
                <li class="nav-item active">
                    <a href="formula_sheets.php" class="nav-link">Formula Sheets</a>
                </li>
                <li class="nav-item active">
                    <a href="#" class="nav-link active">Drawing Tool</a>
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
                    session_start();
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
<div id="drawingTool">
    <div class="field">
        <canvas id="canvas"></canvas>
        <div class="tools">
            <button onclick="undo_last()" type="button" class="button">Undo</button>
            <button onclick="clear_canvas()" type="button" class="button">Clear</button>
            <button onclick="download()" type="button" class="button">Download</button>

            <div onclick="change_color(this)" class="color-field" style="background: black"></div>
            <div onclick="change_color(this)" class="color-field" style="background: red"></div>
            <div onclick="change_color(this)" class="color-field" style="background: blue"></div>
            <div onclick="change_color(this)" class="color-field" style="background: green"></div>
            <div onclick="change_color(this)" class="color-field" style="background: yellow"></div>

            <input oninput="draw_color = this.value" type="color" class="color-picker">
            <input oninput="draw_width = this.value" type="range" min="1" max="100" class="pen-range">
        </div>
    </div>
</div>
<script rel="script" async src="timer.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="../js/drawing_script.js"></script>
</body>
</html>