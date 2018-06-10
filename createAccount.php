<?php
    session_start();
    // Turn on error reporting. Code for error reporting throughout is borrowed from "HTMLexample.php" from Professor Wolford (OSU).
    ini_set('display_errors', 'On');
    // Include the file for the database connection variables
    include 'dbConnection.php';
    // Connects to the database
    $mysqli = new mysqli($url, $user, $pswrd, $dbName, $port);
    if($mysqli->connect_errno){
        echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create Account</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container">
        <?php            
            echo "<form action=" . '"' . "verifyAccount.php" . '"' . " method=" . '"' . "post" . '"' . ">";
            echo "<fieldset>";
            echo "<legend>Create an Account</legend>";
            echo "<label>Choose a Username: ";
            echo "<input type=" . '"' . "text" . '"' . " name=" . '"' . "username" . '"' . " required>";
            echo "</input>";
            echo "</label><br><br>";
            echo "<label>Choose a Password: ";
            echo "<input type=" . '"' . "password" . '"' . " name=" . '"' . "pswd" . '"' . " required>";
            echo "</input>";
            echo "</label><br>";
            echo "<input type=" . '"' . "submit" . '"' . " value=" . '"' . "Submit" . '"' . ">";
            echo "</fieldset>";
            echo "</form>";
        ?>
    </div>
</body>
</html>