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
	<title>Image Results</title>
</head>

<body>
<?php
	//prepare SELECT statement
	if(!($stmt = $mysqli->prepare('	SELECT photo
									FROM SE_photo
									WHERE corrected_name=?	'))){
		echo "Prepare failed: "  . $mysqli->errno . " " . $mysqli->error;
	}

	//bind the user-input to the ?-symbols in the prepared statement and specify their data types
	if(!($stmt->bind_param("s",$_POST['searchName']))){
		echo "Bind failed: "  . $mysqli->errno . " " . $mysqli->error;
	}
	
	//execute statement and send query to database
	if(!$stmt->execute()){
		echo "Execute failed: "  . $mysqli->errno . " " . $mysqli->error;
	}
	
	//save returned attributes to new variables
	if(!$stmt->bind_result($photo)){
		echo "Bind failed: "  . $mysqli->errno . " " . $mysqli->error;
	}
	
	//continue saving returned attributes until reaches end of results
	while($stmt->fetch()){
		echo '<img src="data:image/jpeg;base64,'.base64_encode( $photo ).'"/>';
	}
	$stmt->close();

?>

	</br>
	</br>
	<a href="photo_index.php">Return to file upload page</a>

</body>
</html>