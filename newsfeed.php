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

<!-- For styling, we will use Bootstrap implementation --> 
<!-- https://www.w3schools.com/bootstrap/bootstrap_get_started.asp -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Newsfeed</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
    
<body>
    <div class="container">
        <br>
        <!-- Give the user the option to return to the welcome page -->
        <a href="WildlifeTracker.php" class="btn btn-info" role="button">Return to Welcome Page</a><br>
        
        <h1>Newsfeed</h1>
        <?php
                // This quicksort function is for an array of wildlife and human activity sightings.
                // The array is sorted from most recent sightings to the oldest sightings.
                // Wikipedia - https://en.wikipedia.org/wiki/Quicksort - was used for guidance in 
                // implementing quicksort.
                function quicksort(&$arr, $lo, $hi) {
                    if($lo < $hi) {
                        $p = partition($arr, $lo, $hi);
                        quicksort($arr, $lo, $p - 1);
                        quicksort($arr, $p + 1, $hi);
                    }
                }

                function partition(&$arr, $lo, $hi) {
                    $pivot = strtotime($arr[$hi]->date_spotted);
                    $n = $lo - 1;
                    for($m = $lo; $m < $hi; $m++) {
                        if(strtotime($arr[$m]->date_spotted) >= $pivot) {
                            $n++;
                            $tmp = $arr[$n];
                            $arr[$n] = $arr[$m];
                            $arr[$m] = $tmp;
                        }
                    }
                    $tmp = $arr[$n + 1];
                    $arr[$n + 1] = $arr[$hi];
                    $arr[$hi] = $tmp;
                    return $n + 1;
            }

            // The increment value is the initial number of wildlife and
            // human activity sightings displayed. It is also equal to 
            // the additional sightings added when the user clicks "See More"
            $incValue = 5; 
            // $numDisp is set to the value passed in $_POST["cntr"] or 
            // initialized to $incValue
            if(!isset($_POST["cntr"])) {
                $numDisp = $incValue;
            }
            else {
                $numDisp = $_POST["cntr"];
            }
            $n = 0; // Counter variable
            // Create a newsfeedItem class to hold all of the information about
            // a wildlife or human activity sighting
            class newsfeedItem {
                var $type;
                var $name;
                var $animal_group;
                var $description;
                var $quantity;
                var $date_spotted;
            }
            $newsfeedArr = array(); // array of newsfeed items
            // Determine the latitude and longitude of the passed-in location
            if(!($stmt = $mysqli->prepare('SELECT latitude, longitude
                                                FROM locations
                                                WHERE id = ?')))
            {
                echo "Prepare failed: " . $stmt->errno . " " . $stmt->error;
            }
            if(!($stmt->bind_param("i", $_POST["savedLocation"]))){
                echo "Bind failed: " . $stmt->errno . " " . $stmt->error;
            }
            // Execute the above query
            if(!$stmt->execute()) {
                echo "Execute failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
            }
            if(!$stmt->bind_result($lat, $long)) {
                echo "Bind failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
            }
            $stmt->fetch();
            $stmt->close();
            // Find all of the wildlife sightings within +/- 0.2 degree of the passed-in location
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
            if(!$stmt->bind_result($name, $animal_group, $description, $quantity, $dt)) {
                echo "Bind failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
            }
            // Store the wildlife sighting details in an object and put the object in an array
            while($stmt->fetch()) {
                $n++;
                $item = new newsfeedItem;
                $item->type = "wildlife";
                $item->name = $name;
                $item->animal_group = $animal_group;
                $item->description = $description;
                $item->quantity = $quantity;
                $item->date_spotted = $dt;
                $newsfeedArr[] = $item;
            }
            $stmt->close();
        
            // Find all of the human activity sightings within +/- 0.2 degree of the passed-in location
            if(!($stmt = $mysqli->prepare("SELECT name, description, activity_date
                                                FROM user_human_activity
                                                INNER JOIN locations ON locations.id = locID
												WHERE latitude < " . $lat . " + 0.2 AND latitude > " . $lat . "- 0.2
												AND longitude < " . $long . " + 0.2 AND longitude > " . $long . " - 0.2")))
            {
                echo "Prepare failed: " . $stmt->errno . " " . $stmt->error;
            }
            // Execute the above query
            if(!$stmt->execute()) {
                echo "Execute failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
            }
            if(!$stmt->bind_result($name, $description, $dt)) {
                echo "Bind failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
            }
            // Store the human activity sighting details in an obect and put the object in an array
            while($stmt->fetch()) {
                $n++;
                $item = new newsfeedItem;
                $item->type = "activity";
                $item->name = $name;
                $item->description = $description;
                $item->date_spotted = $dt;
                $newsfeedArr[] = $item;
            }
            $stmt->close();
        
            // Sort the array of wildlife and human activity sightings in reverse
            // chronological order using quicksort
            quicksort($newsfeedArr, 0, $n - 1);
        
            // Display the first $numDisp items in the array of sightings if the number
            // of items is greater than $numDisp
            if($n === 0) {
                echo "<h4>No results found for this location</h4>";
            }
            else if($n > $numDisp) {
                for($i = 0; $i < $numDisp; $i++) {
                    // The display fields are different depending on whether it's a 
                    // wildlife sighting or a human activity sighting
                    if($newsfeedArr[$i]->type === "wildlife") {
                        echo "<p><h3>Wildlife Sighting</h3>";
                        echo "Name: " . $newsfeedArr[$i]->name . "<br><br>";
                        echo "Animal Group: " . $newsfeedArr[$i]->animal_group . "<br><br>";
                        echo "Description: " . $newsfeedArr[$i]->description . "<br><br>";
                        echo "Quantity: " . $newsfeedArr[$i]->quantity . "<br><br>";
                        echo "Date Spotted: " . $newsfeedArr[$i]->date_spotted . "<br><br>"; 
                    }
                    else {
                        echo "<p><h3>Human Activity Sighting</h3>";
                        echo "Name: " . $newsfeedArr[$i]->name . "<br><br>";
                        echo "Description: " . $newsfeedArr[$i]->description . "<br><br>";
                        echo "Date Spotted: " . $newsfeedArr[$i]->date_spotted . "<br><br>"; 
                    }
                }
                // Create a form for the user to see more items. The form will also need to pass the
                // location information to the next view
                $updatedVal = $numDisp + $incValue;
                echo "<form action=" . '"' . "newsfeed.php" . '"' . " method=" . '"' . "post" . '"' . ">";
                echo "<input type=" . '"' . "hidden" . '"' . " name=" . '"' . "savedLocation" . '"';
                echo " value=" . '"' . $_POST["savedLocation"] . '"' . ">";
                echo "<input type=" . '"' . "hidden" . '"' . " name=" . '"' . "cntr" . '"';
                echo " value=" . '"' . $updatedVal . '"' . ">";
                echo "<input type=" . '"' . "submit" . '"' . " value=" . '"' . "See More Results" . '"' . ">";
            }
            // If the number of items is less than $numDisp, then display all of the items
            else {
                for($i = 0; $i < $n; $i++) {
                    // The display fields are different depending on whether it's a
                    // wildlife sighting or a human activity sighting
                    if($newsfeedArr[$i]->type === "wildlife") {
                        echo "<p><h3>Wildlife Sighting</h3>";
                        echo "Name: " . $newsfeedArr[$i]->name . "<br><br>";
                        echo "Animal Group: " . $newsfeedArr[$i]->animal_group . "<br><br>";
                        echo "Description: " . $newsfeedArr[$i]->description . "<br><br>";
                        echo "Quantity: " . $newsfeedArr[$i]->quantity . "<br><br>";
                        echo "Date Spotted: " . $newsfeedArr[$i]->date_spotted . "<br><br>"; 
                    }
                    else {
                        echo "<p><h3>Human Activity Sighting</h3>";
                        echo "Name: " . $newsfeedArr[$i]->name . "<br><br>";
                        echo "Description: " . $newsfeedArr[$i]->description . "<br><br>";
                        echo "Date Spotted: " . $newsfeedArr[$i]->date_spotted . "<br><br>"; 
                    }
                }   
            }
        ?>
        <br><br>
    </div>
    </body>
</html>