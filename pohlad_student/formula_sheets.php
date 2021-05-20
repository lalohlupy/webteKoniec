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
    <script rel="script" src="../js/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Formula Sheets</title>
</head>
<body>
<script>
    $(window).on('load', function() {
        start();
    });
</script>
<nav class="navbar  fixed-top navbar-expand-sm navbar-dark bg-dark">
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
                    <a href="#" class="nav-link active">Formula Sheets</a>
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
<div class="container" style="margin-top: 15vh;flex-direction: column; display: flex; align-items:center;">
    <h1>Make your custom formulas:</h1>
    <div id="mathfield" class="container">
        <math-field id="mf" virtual-keyboard-mode="manual">f(x)</math-field>
        <label>Latex</label>
        <textarea class="output" id="latex" autocapitalize="off" autocomplete="off" autocorrect="off" spellcheck="false"></textarea></textarea>
    </div>
    <div class="button">
        <button id="save-to-png">Save to PNG</button>
    </div>
</div>
<script src='https://unpkg.com/mathlive/dist/mathlive.js'></script>
<script type="module">
    import * as htmlToImage from '../js/htmlToImage.mjs';
    import MathLive from 'mathlive';
    import { makeMathField } from 'https://unpkg.com/mathlive/dist/mathlive.mjs';


    // MathLive.makeMathField(document.getElementById('mathfield'),  {
    //     virtualKeyboardMode: "manual",
    //     virtualKeyboards: 'numeric symbols'
    // });

    const mf = makeMathField('mf', {
        smartMode: true,
        virtualKeyboardMode: 'manual',
        onContentDidChange: (mf) => {
            document.getElementById('latex').value = mf.getValue();
        },
    });

    // document.querySelector('math-field').addEventListener('input', (ev) => {
    //     console.log(ev.target.value):
    // });

    document.getElementById('latex').addEventListener('input', (ev) => {
        mf.setValue(ev.target.value);
    });

    document
        .getElementById('save-to-png')
        .addEventListener('click', (ev) => {
            htmlToImage
                .toPng(
                    document
                        .getElementById('mf')
                        .querySelector('.ML__mathlive')
                )
                .then((data) => {
                    var link = document.createElement('a');
                    link.download = 'formula.png';
                    link.href = data;
                    link.click();
                });
        });
</script>
<script rel="script" src="timer.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>