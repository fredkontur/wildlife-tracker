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

<!-- This page is to take the validated coordinates and perform a sql call to the user_wildlife table -->
<!-- It outputs the wildlife name, animal group, description, quantity, and date spotted and presents it -->
<!-- to the user -->
<!-- INPUT in the format of latitude and longitude, which are the names of the output fields -->
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title>Wildlife Results</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <style>
            td, th {
                border: 1px solid;
                padding: .5em;
                text-align: center;
            }

            th {
                background-color: lightcyan;
            }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
<body>

    <div class="container">
        <br>
        <a href="WildlifeTracker.php" class="btn btn-info" role="button">Return to Welcome Page</a><br><br>
		<table>
			<tr>
				<th colspan="5">Wildlife Results</th>
			</tr>
			<tr>
				<th>Name</th>
				<th>Animal Group</th>
				<th width="60%">Description</th>
				<th>Quantity</th>
				<th>Date Spotted</th>
			</tr>
				<?php
					$lat = $_GET['latitude'];
					$long = $_GET['longitude'];
                    $formAdd = $_GET['formatted_address'];
                    $savedSearch = $_GET['savedSearch'];
            
                    if($savedSearch === "yes") {
                        // If the search should be saved, then the SQL Query below will save it
                        $username = $_SESSION["username"];
                        if(!($stmt = $mysqli->prepare("SELECT id
                                                        FROM locations
                                                        WHERE latitude < " . $lat . " + 0.001 AND latitude > " . $lat . "- 0.001
                                                        AND longitude < " . $long . " + 0.001 AND longitude > " . $long . " - 0.001
                                                                AND formattedAddress = ?")))
                        {
                            echo "Prepare failed: " . $stmt->errno . " " . $stmt->error;
                        }
                        if(!($stmt->bind_param("s", $formAdd))){
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
                        $stmt->fetch();
                        $stmt->close();

                        // If the location isn't in the locations database, then insert it
                        if($n === 0) {
                            if(!($stmt = $mysqli->prepare("INSERT INTO locations(latitude, longitude, formattedAddress)
                                                                VALUES (?,?,?)")))
                           {
                              echo "Prepare failed: " . $stmt->errno . " " . $stmt->error;
                           }
                            if(!($stmt->bind_param("dds", $lat, $long, $formAdd))){
                            echo "Bind failed: " . $stmt->errno . " " . $stmt->error;
                            }
                            if(!$stmt->execute()) {
                            echo "Execute failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
                           }
                            $stmt->close();
                            if(!($stmt = $mysqli->prepare("SELECT id
                                                            FROM locations
                                                            WHERE latitude < " . $lat . " + 0.001 AND latitude > " . $lat . "- 0.001
                                                            AND longitude < " . $long . " + 0.001 AND longitude > " . $long . " - 0.001
                                                                    AND formattedAddress = ?")))
                            {
                                echo "Prepare failed: " . $stmt->errno . " " . $stmt->error;
                            }
                            if(!($stmt->bind_param("s", $formAdd))){
                                echo "Bind failed: " . $stmt->errno . " " . $stmt->error;
                            }
                            if(!$stmt->execute()) {
                                echo "Execute failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
                            }
                            if(!$stmt->bind_result($locID)){
                                echo "Bind failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
                            }
                            $stmt->fetch();
                            $stmt->close();
                        }

                        // Check to see if the user has already chosen this location
                        if(!($stmt = $mysqli->prepare("SELECT id
                                                        FROM user_locs
                                                        WHERE locID = ? AND username = ?")))
                        {
                            echo "Prepare failed: " . $stmt->errno . " " . $stmt->error;
                        }
                        if(!($stmt->bind_param("is", $locID, $username))){
                            echo "Bind failed: " . $stmt->errno . " " . $stmt->error;
                        }
                        if(!$stmt->execute()) {
                            echo "Execute failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
                        }
                        if(!$stmt->bind_result($userLocID)){
                            echo "Bind failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
                        }
                        $stmt->store_result(); 
                        $n = $stmt->num_rows;
                        $stmt->close();

                        // If the location wasn't already in the user_locs database for that username, then save it
                        if($n === 0) {
                            if(!($stmt = $mysqli->prepare("INSERT INTO user_locs(username, locID)
                                                                VALUES (?,?)")))
                           {
                              echo "Prepare failed: " . $stmt->errno . " " . $stmt->error;
                           }
                            if(!($stmt->bind_param("si", $username, $locID))){
                            echo "Bind failed: " . $stmt->errno . " " . $stmt->error;
                            }
                            if(!$stmt->execute()) {
                            echo "Execute failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
                           }
                            $stmt->close();
                            // echo "Made it to #4<br>";
                        }
                    }
					// Variable for creating new data cells.
					$newCell = "\n</td>\n<td>\n";
					
					// Select from the publisher table the id and the name corresponding to that id.
					if(!($stmt = $mysqli->prepare("SELECT name, animal_group, description, quantity, date_spotted
													FROM user_wildlife
													WHERE latitude < " . $lat . " + 0.2 AND latitude > " . $lat . "- 0.2
													AND longitude < " . $long . " + 0.2 AND longitude > " . $long . " - 0.2")))
					{
						echo "Prepare failed: " . $stmt->errno . " " . $stmt->error;
					}
					// Execute the above query
					if(!$stmt->execute()) {
						echo "Execute failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					// Stick the results of the query into variables
					if(!$stmt->bind_result($name, $animal_group, $description, $quantity, $date_spotted)){
						echo "Bind failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					// Populate the select drop-down list with the publisher's names
					while($stmt->fetch()) {
						echo "<tr>\n<td>\n" . $name . $newCell . $animal_group . $newCell . $description . $newCell . $quantity . $newCell . $date_spotted . "\n</td>\n</tr>";
					}
					$stmt->close();
					?>
        </table>
    </div>	

	</body>
</html>