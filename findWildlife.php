<?php
    session_start();
?>

<!-- This page gets a location from the user in order to search a database for the wildlife in that area -->
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Search for Wildlife by Area</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
<body>

    <div class="container">
    <!-- Form for getting user's location -->
    <button onclick="getLocation()">Use Your Current Location</button>
    <br><br>
    
    <!-- Use the line below for testing -->
    <!--<form action="http://www.cs.tut.fi/cgi-bin/run/~jkorpela/echo.cgi" method="post">-->
        
    <form action="validateUserLocation.php" method="post">
        <label>Location: 
            <input type="text" name="location" id="usrLoc" size="75" required></input>
        </label>
        <br>
        <?php
            if($_SESSION["status"] === "loggedIn") {
                echo "<input type=" . '"' . "checkbox" . '"' . " name=" . '"' . "savedSearch" . '"';
                echo " value=" . '"' . "yes" . '"' . "> Save this search to your newsfeed";
                echo "</input>";
            }
        ?>
        <br>
        <br>
        <input type="submit" value="submit"></input>
    </form>


    <script>
        // We used the geolocation code from https://www.w3schools.com/html/html5_geolocation.asp in this section
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            }
        }

        function showPosition(position) {
            document.getElementById("usrLoc").value = position.coords.latitude + ", " + position.coords.longitude;
        }
    </script>
    
    </div>
</body>

</html>