<?php
//turn on error reporting
ini_set('display_errors', 'On');
ini_set('file_uploads', 'On');
include 'dbConnection.php';
//open connection to database
$mysqli = new mysqli($url, $user, $pswrd, $dbName, $port);
if(!$mysqli || $mysqli->connect_errno){
	echo "Connection error " . $mysqli->connect_errno . " " . $mysqli->connect_error;
	}
?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="UTF-8">
	<title>File upload</title>
</head>

<body>

<?php
//each if-block checks the POST body to find the name of the requested query

//add a new employee if the value is found
if (isset($_POST['addPhoto']) && $_FILES['newImage']['size'] > 0) {
	
	$tmpName = $_FILES['newImage']['tmp_name'];
	$upperName = strtoupper($_POST['imageName']);
	$null = NULL;
	
	//prepare INSERT statement
	if(!($stmt = $mysqli->prepare("	INSERT INTO SE_photo
									(name, corrected_name, photo)
									VALUES
									(?, ?, ?)	"))){
		echo "Prepare failed: "  . $mysqli->errno . " " . $mysqli->error;
	}
	
	//bind the user-input to the ?-symbols in the prepared statement and specify their data types
	if(!($stmt->bind_param("ssb", $_POST['imageName'], $upperName, $null))){
		echo "Bind failed: "  . $mysqli->errno . " " . $mysqli->error;
	}
	
	$stmt->send_long_data(2, file_get_contents($tmpName));
	
	//execute statement and send query to database
	if(!$stmt->execute()){
		//print error if insertion fails
		echo "Execute failed: "  . $mysqli->errno . " " . $mysqli->error;
	} else {
		//print confirmation if insertion succeeds
		echo "Added " . $stmt->affected_rows . " photo.";
	}
}
?>

</br>
</br>
<a href="photo_index.php">Return to file upload page</a>

</body>
</html>