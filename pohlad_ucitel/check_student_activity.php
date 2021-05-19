<?php
session_start();
if(!isset($_SESSION['meno_ucitelp'])){
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script rel="script" src="../js/jquery-3.6.0.min.js"></script>
    <title>Aktivita Študentov</title>
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
                    <a href="#" class="nav-link active">Check Student Activity</a>
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
                            echo $_SESSION['meno_ucitelp'];
                    ?></span>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="../uvodna_stranka/index.php" class="nav-link" style="color: dodgerblue" onclick=""><b>Log Out</b></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div class="container" style="margin-top: 15vh;">
    <h1>Aktivita studentov(kto skoncil test/ kto nie)...</h1>
    <div id="working"></div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script>
    const onVisibilityChange = () => {
        if (document.visibilityState !== 'visible') {
            console.log('I am not visible!');
        }
    };

    document.addEventListener('visibilitychange', onVisibilityChange);

    let i = 0;
    const intervalCallback = () => {
        i++;
        $.get('rest.php', (data) => {
            const response = JSON.parse(data);
            $('#working').text(i + ' ' + response.map(student => student.name).join(', '));
        });

    }

    setInterval(intervalCallback, 1000);
</script>
</body>
</html>

