<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Team Members</title>
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
            margin-top: 20px;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        form {
            margin: 0;
            padding: 0;
        }

        button {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #c82333;
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
    <h2>Team Members</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Section Period</th>
            <th>Delete</th>
        </tr>
        <?php
        // Generate and include CSRF token if not already set
        if (!isset($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Generate a random token
        }

        if (count($result) > 0) {
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row["pid"] . "</td>";
                echo "<td>" . $row["pname"] . "</td>";
                echo "<td>" . $row["section_period"] . "</td>";

                echo "<td><form method='post' action='/team/member/delete'>";
                echo "<input type='hidden' name='pid' value='" . $row["pid"] . "'>";
                echo "<input type='hidden' name='csrf_token' value='" . $_SESSION['csrf_token'] . "'>"; // Ensure consistent name
                // echo "<button type='submit'>Delete</button>";
                echo "<button type='submit' onclick='return confirm(\"Are you sure you want to delete this team member?\")'>Delete</button>";
                echo "</form></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No team members found.</td></tr>";
        }
        ?>

    </table>
    <!-- Return to homepage -->
    <a href="/">Back to Home</a>
</body>

</html>