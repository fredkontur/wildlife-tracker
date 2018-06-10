<!-- This page is to take the user's chosen animal and perform a sql call to the expert_wildlife table -->
<!-- It outputs the animal's name, scientific name, appearance, range, habits, diet, migration routes, mating season, population, -->
<!-- endangered status, preservation efforts, and articles about the animal to the user-->
<!-- INPUT in the format of animal from the front-end form completed by the user -->

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

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <title>Animal Results</title>
    </head>
   
    <body>
        <?php
            $animal = $_POST['animal'];
            // First assume the user got the name of the animal correct
            // Select from the expert_wildlife table the animal chosen by the user
					if(!($stmt = $mysqli->prepare('SELECT common_name, scientific_name, appearance, animal_range, habits, diet, 
                                                            migration_routes, mating_season, population, endangered_status, 
                                                            preservation_efforts, articles 
													FROM expert_wildlife
													WHERE common_name = ?')))
					{
						echo "Prepare failed: " . $stmt->errno . " " . $stmt->error;
					}
                    if(!($stmt->bind_param("s", $animal))) {
                        echo "Bind failed: " . $stmt->errno . " " . $stmt->error;
                    }
					// Execute the above query
					if(!$stmt->execute()) {
						echo "Execute failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					// Stick the results of the query into variables
					if(!$stmt->bind_result($common_name, $scientific_name, $appearance, $animal_range, $habits, $diet, 
                                            $migration_routes, $mating_season, $population, $endangered_status, 
                                            $preservation_efforts, $articles)){
						echo "Bind failed: " . $mysqli->connect_errno . " " . $mysqli->connect_error;
					}
					// Populate the fields with the relevant information
                    $n = 0;
					if($stmt->fetch()) {
                        $n = 1;
						echo "<h2>Animal Name: " . $common_name . "</h2>";
                        echo "<h2>Scientific Name: " . $scientific_name . "</h2>";
                        echo "<h2>Population: " . $population . "</h2>";
                        echo "<h2>Endangered Status: " . $endangered_status . "</h2>";
                        echo "<p><h2>Appearance</h2>" . $appearance . "</p>";
                        echo "<p><h2>Range</h2>" . $animal_range . "</p>";
                        echo "<p><h2>Habits</h2>" . $habits . "</p>";
                        echo "<p><h2>Diet</h2>" . $diet . "</p>";
                        echo "<p><h2>Migration Routes</h2>" . $migration_routes . "</p>";
                        echo "<p><h2>Mating Season</h2>" . $mating_season . "</p>";
                        echo "<p><h2>Preservation Efforts</h2>" . $preservation_efforts . "</p>";
                        echo "<p><h2>Articles</h2>" . $articles . "</p>";
					}
					$stmt->close();
        ?>
			

	</body>
</html>