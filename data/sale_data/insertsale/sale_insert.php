<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
    <style>
     body {
            margin: 0;
            padding: 0;
            background-color: #FFE4B5; /* Light orange background */
            font-family: Arial, sans-serif;
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
            margin: 0;
        }

        nav a {
            text-decoration: none;
            color: white;
            font-weight: bold;
        }

        #formContainer {
            margin: 5vh;
            border: 2px solid black;
            border-radius: 10px;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            box-sizing: border-box;
        }

        form {
            margin: 20px;
            display: flex;
            flex-direction: column;
        }

        input {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"], input[type="reset"] {
            background-color: #FFA500;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #FF8C00;
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
    <div id="formContainer">
    <h2>Sale Entry:</h2>
    <form action="" method="post">
        <label for="sale_id">sale id:</label>
        <input type="text" name="sale_id" required>
        <br><br>

        <label for="avail">Available:</label>
        <input type="text" name="sold" required>
        <br><br>

        <label for="j_id">Juice id:</label>
        <input type="text" name="j_id" required>
        <br><br>

        <input type="submit" value="Register">
        <input type="reset" value = "Reset">
    </form>
    </div>
    
    <?php
        $server = "localhost";
        $user = "root";
        $password = "";
        $database = "juice_c"; // Replace with your actual database name
        $conn = mysqli_connect($server, $user, $password, $database);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $sale_id = $_POST["sale_id"];
            $sold = $_POST["sold"];
            $juice_id = $_POST["j_id"];

            $insertQuery = "INSERT INTO `sale` (s_id, sold, j_id) VALUES ('$sale_id','$sold', '$juice_id')";

            if (mysqli_query($conn, $insertQuery)) {
                echo '<script>alert("Insertion successful!");</script>';
            } else {
                echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
            }
        }

        mysqli_close($conn);
        ?>

</body>
</html>
