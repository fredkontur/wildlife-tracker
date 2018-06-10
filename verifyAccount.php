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
  <title>Verify Account</title>
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
					
            // First see if the username already exists
            if(!($stmt = $mysqli->prepare("SELECT username
													FROM users
													WHERE username = ?")))
					{
						echo "Prepare failed: " . $stmt->errno . " " . $stmt->error;
					}
                    if(!($stmt->bind_param("s", $username))) {
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
                    if($n > 0) {
                        echo "<br><br>This username is taken. Please choose another username.<br>";
                        // Use the line below for testing
                        //echo "<form action=" . '"' . "http://www.cs.tut.fi/cgi-bin/run/~jkorpela/echo.cgi" . '"' . ">";

                        echo "<form action=" . '"' . "verifyAccount.php" . '"' . " method=" . '"' . "post" . '"' . ">";
                        echo "<fieldset>";
                        echo "<legend>Create an Account</legend>";
                        echo "<label>Choose a Username: ";
                        echo "<input type=" . '"' . "text" . '"' . " name=" . '"' . "username" . '"' . ">";
                        echo "</input>";
                        echo "</label><br><br>";
                        echo "<label>Choose a Password: ";
                        echo "<input type=" . '"' . "password" . '"' . " name=" . '"' . "pswd" . '"' . ">";
                        echo "</input>";
                        echo "</label><br>";
                        echo "<input type=" . '"' . "submit" . '"' . " value=" . '"' . "Submit" . '"' . ">";
                        echo "</fieldset>";
                        echo "</form>";
                    }
        
                    // If the chosen username was not in the database, then put it in the database and let the user
                    // know that their account was created.
                    else {
                        if(!($stmt = $mysqli->prepare("INSERT INTO users (username, password) VALUES (?, ?)")))
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
                        $stmt->close();
                        
                        $_SESSION["username"] =  $username;
                        $_SESSION["status"] = "loggedIn";
                        echo "<br><br>Your account has been created.<br><br>";
                        echo "<a href=". '"' . "WildlifeTracker.php" . '"' . " class=" . '"' . "btn btn-info" . '"'; 
                        echo "role=" . '"' . "button" . '"' . ">Return to Welcome Page</a>";
                    }
                    
        ?>
    </div>
</body>
</html>