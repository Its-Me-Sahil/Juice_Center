<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display customber details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #FFE4B5; /* Light orange background */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #FFA500; /* Orange header background */
            padding: 10px;
            text-align: center;
            box-sizing: border-box;
        }

        nav {
            display: flex;
            justify-content: space-around;
        }

        nav a {
            text-decoration: none;
            color: white;
            font-weight: bold;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #FFA500;
            padding: 10px;
            text-align: left;
        }

        /* td{
            border : none;
        } */
        th {
            border: 1px solid #000000;
            background-color: #FFA500;
            color: white;
        }

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #FFA500; /* Orange footer background */
            padding: 10px;
            text-align: center;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <header>
            <nav>
                <a href="../../h_data.html" target = "">Home</a>
                <a href="" target = "">Contact Us</a>
                <a href="" target = "">Sign up</a>
            </nav>
    </header>
    <?php
        $server = "localhost";
        $user = "root";
        $password = "";
        $database = "juice_c";
        $conn = mysqli_connect($server, $user, $password, $database);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $selectQuery = "SELECT * FROM admin";
        $result = mysqli_query($conn, $selectQuery);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        echo "<table border='1'>
                <tr>
                <th>Admin ID</th>
                <th>Admin Name</th>
                <th>Email address</th>
                <th>Password</th>
                </tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['ad_id'] . "</td>";
                    echo "<td>" . $row['ad_name'] . "</td>";
                    echo "<td>" . $row['ad_email'] . "</td>";
                    echo "<td>" . $row['ad_pass'] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";

        mysqli_close($conn);
    ?>
    <footer>
        &copy Copyright Reserve₫ To Juice Center.
    </footer>
</body>
</html>
