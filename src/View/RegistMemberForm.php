<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Team Member Registration</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
      text-align: center;
    }

    form {
      margin-top: 50px;
    }

    input[type="text"] {
      width: 80%;
      padding: 10px;
      margin: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
      display: block;
      margin: 10px auto;
    }

    input[type="submit"]:hover {
      background-color: #0056b3;
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

    p.error {
      color: red;
      margin-top: 10px;
    }
  </style>
</head>

<body>
  <form action="/team/member/register" method="post">
    <input type="text" name="pid" id="" placeholder="Your ID" required>
    <input type="text" name="pname" id="" placeholder="Person Name" required>
    <input type="text" name="prole" id="" placeholder="Your Role" required>
    <input type="text" name="section_period" id="" placeholder="Your section period (3 or 4)" required>

    <input type="submit" value="Register">
  </form>
  <a href="/">Home Page</a>
  <!-- Print error if it exists -->
  <?php
  if (isset($_GET['error'])) {
    echo "<p class='error'>" . $_GET['error'] . "</p>";
  }
  ?>
</body>

</html>