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
    <title>Scan work</title>
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
                    <a href="index.php" class="nav-link">Show Exam</a>
                </li>
                <li class="nav-item active">
                    <a href="formula_sheets.php" class="nav-link">Formula Sheets</a>
                </li>
                <li class="nav-item active">
                    <a href="drawing_tool.php" class="nav-link">Drawing Tool</a>
                </li>
                <li class="nav-item active">
                    <a href="#" class="nav-link active">Scan work</a>
                </li>
                <li class="nav-item active">
                    <span class="nav-link">Time Left: <?php //TODO: Doriesit zobrazenie casu?></span>
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
                        <a href="../uvodna_stranka/index.php" class="nav-link" style="color: dodgerblue"><b>Log Out<?php session_unset()?></b></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div class="container" style="margin-top: 15vh;">
    <div id="span1" style="padding: 20px">
        <span id="1" >
            <h1>1. Scan th QR code</h1>
            Use your phone and read the QR code to be able to scan work to your exam.
        </span>
        <img src="https://www.pngkey.com/png/full/21-215701_qr-code-scan-hand-visitor-management-qr-code.png" class="img-thumbnail" width="15%" height="15%" alt="qrCodeMobile">
    </div>
    <div id="span2" style="padding: 20px">
        <span id="2" >
            <h1>2. Scan your work</h1>
            Note that only your work may be photographed. Be careful not to include anything else(e.g. NSFW stuff).
        </span>
        <img src="https://www.pinclipart.com/picdir/big/331-3316500_colorful-folded-paper-paper-icon-png-blue-clipart.png" class="img-thumbnail" width="12%" height="12%" alt="txtFile">
        <img src="https://previews.123rf.com/images/bearsky23/bearsky231710/bearsky23171000028/87877564-nsfw-icon-not-safe-for-work-anagram-icon.jpg" class="img-thumbnail" width="15%" height="15%" alt="noNSFW">
    </div>
    <div id="span3" style="padding: 20px">
        <span id="3" >
            <h1>3. The picture is sent here</h1>
            The picture of your work is sent here automatically. This requires that you stay in this view,<br>
            and that both devices have an active internet connection.
        </span>
        <img style="margin-left: 25%; margin-top: -5%" src="https://www.pngix.com/pngfile/big/34-345163_png-file-svg-stop-sign-icon-png-transparent.png" class="img-thumbnail" width="15%" height="15%" alt="stayHere">
        <img style="margin-top: -5%" src="https://www.pngkit.com/png/full/202-2026598_internet-connection-icon-png-internet-access-icon.png" class="img-thumbnail" width="15%" height="15%" alt="internetConn">
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
