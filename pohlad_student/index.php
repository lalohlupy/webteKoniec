<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script rel="script" src="../js/jquery-3.6.0.min.js"></script>
    <title>Document</title>
</head>
<body>
<div id="working"></div>
</body>
</html>

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
        $.get('http://147.175.98.50/webteKoniec/pohlad_student/rest.php', (data) => {
            const response = JSON.parse(data);
            $('#working').text(i + ' ' + response.map(student => student.name).join(', '));
        });

    }

    setInterval(intervalCallback, 1000);
</script>
