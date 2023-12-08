function countDownTimer(date) {
	
    var timeid = $('#time');

    var futureTime = new Date(date).getTime();

    setInterval(function() {
        // Time left between future and current time in Seconds
        var timeLeft = Math.floor((futureTime - new Date().getTime()) / 1000);
        // console.log(timeLeft);

        // Days left = time left / Seconds per Day 
        var days = Math.floor(timeLeft / 86400);
        // console.log(days);

        // 86400 seconds per Day
        timeLeft -= days * 86400;
        // console.log(timeLeft);

        // Hours left = time left / Seconds per Hour
        var hours = Math.floor(timeLeft / 3600) % 24;
        // console.log(hours);

        // 3600 seconds per Hour
        timeLeft -= hours * 3600;
        // console.log(timeLeft);

        // Minutes left = time left / Minutes per Hour
        var min = Math.floor(timeLeft / 60) % 60;
        // console.log(min);

        // 60 seconds per minute
        timeLeft -= min * 60;
        // console.log(timeLeft);

        // Seconds Left
        var sec = timeLeft % 60;

        // Combined DAYS+HOURS+MIN+SEC
        var timeString = "<span class='days'>" + days + "D" + "</span>" +
            "<span class='hours'>" + hours + "H" + "</span>" +
            "<span class='minutes'>" + min + "M" + "</span>" +
            "<span class='seconds'>" + sec + "S" + "</span>";

        timeid.html(timeString);

    }, 1000);
}

// Enter date in this format: January 1, 2017 12:00:00
countDownTimer('October 22, 2019 09:00:00');