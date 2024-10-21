<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mars Countdown</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div id="counter">Countdown</div>

    <?php
        $dateTime = strtotime('October 28, 2024 12:00:00');
        $unixDateTime = date("F d, Y H:i:s", $dateTime);
    ?>

    <!-- JavaScript code to run a Countdown to our page -->
    <script>
        // we will use the time that we defined in the php code and assign it in our JS variable
        var countDownTimer = new Date("<?php echo $unixDateTime ; ?>").getTime();

        console.log(countDownTimer);

        // set the JS interval - grab the id so we can stop the interval
        var intervalId =setInterval(function(){
            //  get the current time
            var currentTime = new Date().getTime();

            console.log("current time=" + currentTime);

            // get the difference in time between the launch and the current time
            var timeDiff = countDownTimer - currentTime;

            // 1,000 ms in a second
            const MS_IN_A_SECOND = 1000;
            // MS IN A SECOND * 60 gives us ms in a minute
            const MS_IN_A_MINUTE = MS_IN_A_SECOND * 60;
            // MS IN A MINUTE * 60 gives us ms in a HR
            const MS_IN_AN_HOUR = MS_IN_A_MINUTE * 60;
            // MS IN AN HOUR * 24 gives us ms in a day
            const MS_IN_A_DAY = MS_IN_AN_HOUR * 24;

            // we can tell the user the countdown time remaining in days/hr/min/sec
            var days = Math.floor(timeDiff / MS_IN_A_DAY);
            // to get the hrs remaining we do not care abot the days, we just want the remainder 
            // and then divide so we can get the number of hrs remaining
            var hours = Math.floor((timeDiff % MS_IN_A_DAY) / MS_IN_AN_HOUR);
            // get the minutes remaining, we do not care about hrs we just want the remainder and then divide my ms
            var minutes = Math.floor((timeDiff % MS_IN_AN_HOUR) / MS_IN_A_MINUTE);
            // get the seconds remaining, we do not care about minutes we just want the remainder and then divide my ms
            var seconds = Math.floor((timeDiff % MS_IN_A_MINUTE) / MS_IN_A_SECOND);

            // Lets let the user know how much time is left
            document.getElementById("counter").innerHTML = days + " Days, " + hours + " Hours, " + minutes + " Minutes, " + seconds + " Seconds";


            // let the user on insight about the launch
            if (days < 0){
                clearInterval(intervalId);
                document.getElementById("counter").innerHTML = "Sorry, you missed the launch!";
            }else if(days < 10) {
                document.getElementById("counter").innerHTML += "<br> Do not forget to begin packing!";
            }else{
                document.getElementById("counter").innerHTML += "<br> Keep track of the countdown";
            }

        }, 1000);  // 1000 milliseconds is 2 seconds 
    </script>
</body>
</html>