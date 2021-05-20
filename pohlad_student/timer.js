var min = 1;

function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        var interval = setInterval(function () {

            minutes = parseInt(timer / 60, 10);
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if(timer > sessionStorage.getItem("mytime") && sessionStorage.getItem("mytime") != null){
                timer = sessionStorage.getItem("mytime");
            }
            sessionStorage.setItem("mytime", timer);
            if (--timer < 0) {
                document.getElementById("time").innerHTML = "Čas uplynul!";
                clearInterval(interval);
            }
        }, 1000);
    }

function start() {
    var minutym = 60 * min,
    display = document.querySelector('#time');
    startTimer(minutym, display);
}
