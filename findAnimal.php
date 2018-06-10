<!-- This page gets a chosen animal from the user in order to search a database for information about an animal -->

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Search for Information about an Animal</title>
        
    </head>

    <?php
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
    <body>

        <!-- Form for getting animal from user -->

        <!-- Use the line below for testing -->
        <!--<form action="http://www.cs.tut.fi/cgi-bin/run/~jkorpela/echo.cgi" method="post">-->

        <form action="animalResults.php" method="post">
            <!-- We will build a dropdown menu giving a selection of animals from the database using PHP -->
            <label>Which Animal Do You Want to Know About?:
                <select name="animal">
                    <?php
                        if(!($stmt = $mysqli->prepare('SELECT common_name
                                                        FROM expert_wildlife
                                                        ORDER BY common_name')))
                        {
                            echo "Prepare failed: " . $stmt->errno . " " . $stmt->error;
                        }
                        // Execute the above query
                        if(!$stmt->execute()) {
                            echo "Execute failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
                        }
                        if(!$stmt->bind_result($common_name)) {
                            echo "Bind failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
                        }
                        while($stmt->fetch()) {
                            echo '<option value="' . $common_name . '">' . $common_name . '</option>\n';

                        }
                        $stmt->close();
                    ?>
                </select>
            </label> 

            <input type="submit" value="submit"></input>
        </form>
    
    </body>
</html>