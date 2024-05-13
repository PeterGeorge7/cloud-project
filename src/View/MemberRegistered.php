<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            text-align: center;
        }

        h2 {
            margin-top: 50px;
            color: #007bff;
        }

        p {
            color: #333;
            margin-top: 20px;
        }

        #countdown {
            font-size: 24px;
            font-weight: bold;
            color: #dc3545;
        }
    </style>
</head>

<body>
    <h2>Registered Successfully</h2>

    <p>You will be redirected to the list of all members in <span id="countdown">5</span> seconds.</p>
    <script>
        var seconds = 5;
        var countdownElement = document.getElementById("countdown");

        function countdown() {
            countdownElement.textContent = seconds;
            seconds--;

            if (seconds < 0) {
                window.location.href = "/team/members";
            } else {
                setTimeout(countdown, 1000);
            }
        }

        countdown();
    </script>
</body>

</html>