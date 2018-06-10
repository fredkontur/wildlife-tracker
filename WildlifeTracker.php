<?php
    session_start();
    // Check to see if the user is logged in already. If not, designate the user's status as guest
    if((is_null($_SESSION["status"]))) {
        $_SESSION["status"] = "guest";
    }
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

<!-- For styling, we will use Bootstrap implementation --> 
<!-- https://www.w3schools.com/bootstrap/bootstrap_get_started.asp -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Wildlife Tracker</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container">
        <h1>Welcome to the Wildlife Tracker</h1>
        <h2>Links to the Main Pages</h2>
        <!-- Create button-like links for the main pages on the site -->
        <a href="findAnimal.php" class="btn btn-info" role="button">Find Information about an Animal</a><br><br>
        <a href="findWildlife.php" class="btn btn-info" role="button">Look for the Wildlife Spotted in an Area</a><br><br>
        <a href="photo_index.php" class="btn btn-info" role="button">Upload and View Photos of Wildlife and Human Activity</a><br><br>
        <a href="userGuide.php" class="btn btn-info" role="button">User Guide</a><br><br>
        
        <?php
        // If the user is not logged in then give them the option to log in or create an account
        if($_SESSION["status"] === "guest") {
            echo "<a href=" . '"' . "createAccount.php" . '"' . "class=" . '"' . "btn btn-info" . '"';
            echo "role=" . '"' . "button" . '"' .">Create Account</a><br><br>";
            
            // Use the line below for testing
            //echo "<form action=" . '"' . "http://www.cs.tut.fi/cgi-bin/run/~jkorpela/echo.cgi" . '"' . ">";
            
            echo "<form action=" . '"' . "loginVerify.php" . '"' . " method=" . '"' . "post" . '"' . ">";
            echo "<fieldset>";
            echo "<legend>Login</legend>";
            echo "<label>Username: ";
            echo "<input type=" . '"' . "text" . '"' . " name=" . '"' . "username" . '"' . " required>";
            echo "</input>";
            echo "</label><br><br>";
            echo "<label>Password: ";
            echo "<input type=" . '"' . "password" . '"' . " name=" . '"' . "pswd" . '"' . " required>";
            echo "</input>";
            echo "</label><br>";
            echo "<input type=" . '"' . "submit" . '"' . " value=" . '"' . "Submit" . '"' . ">";
            echo "</fieldset>";
            echo "</form>";
        }
        // If the user is logged in, present them with a list of their saved locations, 
        // if they have any, for the newsfeed. Also, give them the option to log out.
        else {
            // See if the user has any saved locations
            if(!($stmt = $mysqli->prepare("SELECT locID
                                            FROM user_locs
                                            WHERE username = ?")))
            {
                echo "Prepare failed: " . $stmt->errno . " " . $stmt->error;
            }
            if(!($stmt->bind_param("s", $_SESSION["username"]))){
                echo "Bind failed: " . $stmt->errno . " " . $stmt->error;
            }
            if(!$stmt->execute()) {
                echo "Execute failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
            }
            if(!$stmt->bind_result($locID)){
                echo "Bind failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
            }
            $stmt->store_result(); 
            $n = $stmt->num_rows;
            $stmt->close();
            // If the user has saved locations, display a dropdown menu with all of the saved locations
            if($n > 0) {
                echo "<form action=" . '"' . "newsfeed.php" . '"' . " method=" . '"' . "post" . '"' . ">";
                echo "<fieldset>";
                echo "<legend>View Newsfeed for Saved Location</legend>";
                echo "<label>Saved Locations: ";
                echo "<select name=" . '"' . "savedLocation" . '"' . ">";
                    if(!($stmt = $mysqli->prepare('SELECT formattedAddress, locations.id
                                                        FROM user_locs
                                                        INNER JOIN locations
                                                        ON locations.id = user_locs.locID
                                                        WHERE username = ?')))
                        {
                            echo "Prepare failed: " . $stmt->errno . " " . $stmt->error;
                        }
                        if(!($stmt->bind_param("s", $_SESSION["username"]))){
                            echo "Bind failed: " . $stmt->errno . " " . $stmt->error;
                        }
                       // Execute the above query
                        if(!$stmt->execute()) {
                            echo "Execute failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
                        }
                        if(!$stmt->bind_result($address, $id)) {
                            echo "Bind failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
                        }
                        while($stmt->fetch()) {
                           echo '<option value="' . $id . '">' . $address . '</option>\n';

                        }
                        $stmt->close();
                echo "</select>";
                echo "</label><br><br>";
                echo "<input type=" . '"' . "submit" . '"' . " value=" . '"' . "Submit" . '"' . ">";
                echo "</fieldset>";
                echo "</form>";
                echo "<br><br>";
            }
            // Give the user the option to log out
            echo "<a href=" . '"' . "logOut.php" . '"' . "class=" . '"' . "btn btn-info" . '"';
            echo "role=" . '"' . "button" . '"' .">Log Out</a>";
        }
        ?>
    </div>
    
</body>
</html>