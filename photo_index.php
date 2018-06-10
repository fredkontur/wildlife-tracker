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
	<title>Upload a Wildlife Photo</title>
 </head>
 
 <body>
	<h1>Add photos</h1>
	<form action="addPhoto.php" method="POST" enctype="multipart/form-data">
		<fieldset style="display: inline-block">
			<legend>Select a photo to upload</legend>
			<input type="text" name="imageName" placeholder="Image Name" required>
			<input type="file" name="newImage" accept="image/*" required>
			</br>
			</br>
			<input type="submit" value="Upload Photo" name="addPhoto"/>
		</fieldset>
	</form>
	</br>
	</br>
	
	<h1>View stored photos</h1>
	<form action="getPhoto.php" method="POST">
		<fieldset style="display: inline-block">
			<legend>Select the name to search for</legend>
			<label> Name: </label>
			<!-- user selects from list of current table contents -->
			<select name="searchName">
			 <?php
			//get current contents of table
			
			//prepare SELECT statement
			if(!($stmt = $mysqli->prepare("	SELECT DISTINCT(corrected_name)
											FROM SE_photo
											ORDER BY corrected_name ASC		"))){
				echo "Prepare failed: "  . $mysqli->errno . " " . $mysqli->error;
			}

			//execute statement and send query to database
			if(!$stmt->execute()){
				echo "Execute failed: "  . $mysqli->errno . " " . $mysqli->error;
			}
			
			//save returned attributes to new variables
			if(!$stmt->bind_result($cname)){
				echo "Bind failed: "  . $mysqli->errno . " " . $mysqli->error;
			}
			
			//continue saving returned attributes until reaches end of results
			while($stmt->fetch()){
				//print results with HTML tags to insert option into drop-down menu
				echo '<option value="'.$cname.'"> ' . $cname . '</option>\n';
			}
			$stmt->close();
			?>
			<input type="submit" value="Search Images" name="getPhoto"/>
		</fieldset>
	</form>
	

 </body>
 
 </html>