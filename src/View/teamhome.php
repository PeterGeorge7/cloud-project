<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-top: 50px;
        }

        a {
            text-decoration: none;
            color: #007bff;
            padding: 10px 20px;
            border: 2px solid #007bff;
            border-radius: 5px;
            margin: 10px;
            display: inline-block;
            transition: background-color 0.3s, color 0.3s;
        }

        a:hover {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>

<body>
    <h2>Welcome Admin</h2>
    <a href="/team/member/register">Register a new Member</a><br><br>
    <a href="/team/members">Show All Members</a>
</body>

</html>