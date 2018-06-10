<!-- This page is to take in user input in the location field from a submitted form -->
<!-- It outputs the location to an SQL Query page (called wildlifeResults.php) in the format of latitude and -->
<!-- longitude, which are the names of the output fields -->

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <title>Validate Location Input</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
<body>

    <div class="container">
        <?php
            // We need to save the passed form variable to an HTML element so that JavaScript can have access to it later
            $loc = $_POST['location'];
            echo "<div id=" . '"' . "locationDiv" . '" ' . "style=" . '"' . "display: none;" . '"' . ">" . $loc . "</div>";
            $savedSearch = $_POST['savedSearch'];
            echo "<div id=" . '"' . "savedSearchDiv" . '" ' . "style=" . '"' . "display: none;" . '"' . ">" . $savedSearch . "</div>";
        ?> 
        
        <script>
            /* This code to check the location with the Google Maps API 
            was writted by one of the group members (FK) for the Web 
            Development class. The original code can be found at 
            http://web.engr.oregonstate.edu/~konturf/how-to-guide/advanced-topic.html */
            
            // Access the location from the hidden HTML element
            var userAddr = document.getElementById("locationDiv").innerHTML;
            
            // Access the savedSearch checkbox from the hidden HTML element
            var savedSearch = document.getElementById("savedSearchDiv").innerHTML;
            
            var cons = document.getElementsByClassName("container");
            var container = cons[0];
            var userMessage = document.createElement("p");
            
            var searchAgain = document.createElement("form");
            searchAgain.setAttribute("action", "findWildlife.php");
            var submitButton = document.createElement("input");
            submitButton.setAttribute("type", "submit");
            submitButton.setAttribute("value", "Search Again");
            searchAgain.appendChild(submitButton);

            var req = new XMLHttpRequest();
            var googleUrl = "https://maps.googleapis.com/maps/api/geocode/json?address=";
            googleUrl = googleUrl + userAddr;
            req.open("GET", googleUrl, true);
            req.addEventListener("load", function() {
                var googResp = JSON.parse(req.responseText);
                var results = googResp.results; 
                
                // If zero results, send user back to search form
                if(results.length === 0) {
                    userMessage.textContent = "This location could not be found. Try searching again.";
                    container.appendChild(userMessage);
                    container.appendChild(searchAgain);
                }
                
                // If one result, then send the result to SQL Query form
                else if(results.length === 1) {
                    var locationForm = document.createElement("form");
                    locationForm.setAttribute("method", "get");
                    var latitude = results[0].geometry.location.lat;
                    var longitude = results[0].geometry.location.lng;
                    var formatted_address = results[0].formatted_address;
                    
                    var latInput = document.createElement("input");
                    latInput.setAttribute("type", "number");
                    latInput.setAttribute("name", "latitude");
                    latInput.setAttribute("value", latitude);
                    
                    var lngInput = document.createElement("input");
                    lngInput.setAttribute("type", "number");
                    lngInput.setAttribute("name", "longitude");
                    lngInput.setAttribute("value", longitude);
                    
                    var savedSearchInput = document.createElement("input");
                    savedSearchInput.setAttribute("type", "text");
                    savedSearchInput.setAttribute("name", "savedSearch");
                    savedSearchInput.setAttribute("value", savedSearch);

                    var formAddInput = document.createElement("input");
                    formAddInput.setAttribute("type", "text");
                    formAddInput.setAttribute("name", "formatted_address");
                    formAddInput.setAttribute("value", formatted_address);
                    
                    // Use the next line for testing
                    //locationForm.setAttribute("action", "http://www.cs.tut.fi/cgi-bin/run/~jkorpela/echo.cgi");
                    
                    locationForm.setAttribute("action", "wildlifeResults.php");
                    container.appendChild(locationForm);
                    locationForm.appendChild(latInput);
                    locationForm.appendChild(lngInput);
                    locationForm.appendChild(savedSearchInput);
                    locationForm.appendChild(formAddInput)
                    locationForm.submit(); 
                }
                
                // If there is more than one result, all of the results will be displayed to the user, and
                // he/she can choose one or search again
                else if(results.length > 1) {
                    // Use the next line for testing
                    //locationForm.setAttribute("action", "http://www.cs.tut.fi/cgi-bin/run/~jkorpela/echo.cgi");                   
                    
                    container.appendChild(userMessage);
                    userMessage.textContent = "Multiple locations were found. Please choose one or do a new search.";
                    var par = document.createElement("p");
                    
                    for(var i = 0; i < results.length; i++) {
                        var listItem = document.createElement("p");
                        var locationName = results[i].formatted_address;
                        var longitude = results[i].geometry.location.lat;
                        var latitude = results[i].geometry.location.lng;
                        var locUrl = "wildlifeResults.php?latitude=" + latitude + "&longitude=" + longitude;
                        var locUrl = locUrl + "&formatted_address=" + locationName + "&savedSearch=" + savedSearch;
                        var locationButton = document.createElement("a");
                        locationButton.setAttribute("href", locUrl);
                        locationButton.setAttribute("class", "btn btn-info");
                        locationButton.setAttribute("role", "button");
                        locationButton.textContent = locationName;
                        locationButton.setAttribute("name", "location");
                        listItem.appendChild(locationButton);
                        container.appendChild(listItem);
                    }
                    container.appendChild(par);
                    par.appendChild(searchAgain);
                }
            });
            req.send(null);
        </script>
        
        </div>
    </body>
</html>