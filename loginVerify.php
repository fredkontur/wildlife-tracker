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
  <title>Verify Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <?php
            $username = $_POST['username'];
            $pswd = $_POST['pswd'];

            // Compare username and password to database
            if(!($stmt = $mysqli->prepare("SELECT username
                                                    FROM users
                                                    WHERE username = ? AND password = ?")))
                    {
                        echo "Prepare failed: " . $stmt->errno . " " . $stmt->error;
                    }
                    if(!($stmt->bind_param("ss", $username, $pswd))) {
                        echo "Bind failed: " . $stmt->errno . " " . $stmt->error;
                    }
                    // Execute the above query
                    if(!$stmt->execute()) {
                        echo "Execute failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
                    }
                    // Stick the results of the query into variables
                    if(!$stmt->bind_result($returnedName)){
                        echo "Bind failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
                    }
                    // Check to see if any results were returned
                    $n = 0;
                    while($stmt->fetch()) {
                        $n++;
                    }
                    $stmt->close();

                    // If the username is in the database, then $n will be one. When this is the case,
                    // prompt the user to enter another username
                    if($n === 0) {
                        echo "<br><br>The login information was incorrect. Please try again.<br>";
                        // Use the line below for testing
                        //echo "<form action=" . '"' . "http://www.cs.tut.fi/cgi-bin/run/~jkorpela/echo.cgi" . '"' . ">";

                        echo "<form action=" . '"' . "loginVerify.php" . '"' . " method=" . '"' . "post" . '"' . ">";
                        echo "<fieldset>";
                        echo "<legend>Login</legend>";
                        echo "<label>Username: ";
                        echo "<input type=" . '"' . "text" . '"' . " name=" . '"' . "username" . '"' . ">";
                        echo "</input>";
                        echo "</label><br><br>";
                        echo "<label>Password: ";
                        echo "<input type=" . '"' . "password" . '"' . " name=" . '"' . "pswd" . '"' . ">";
                        echo "</input>";
                        echo "</label><br>";
                        echo "<input type=" . '"' . "submit" . '"' . " value=" . '"' . "Submit" . '"' . ">";
                        echo "</fieldset>";
                        echo "</form>";
                    }

                    // If the account was found, then notify the user that login was successful.
                    else {                       
                        $_SESSION["username"] =  $username;
                        $_SESSION["status"] = "loggedIn";
                        echo "<br><br>You are logged in.<br><br>";
                        echo "<a href=". '"' . "WildlifeTracker.php" . '"' . " class=" . '"' . "btn btn-info" . '"'; 
                        echo "role=" . '"' . "button" . '"' . ">Return to Welcome Page</a>";
                    }
        ?>
        
    </div>
</body>
</html>