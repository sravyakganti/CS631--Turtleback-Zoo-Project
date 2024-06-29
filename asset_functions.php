<?php include 'header.php'; ?>

<?php

include 'connection.php'; 

function addAnimal($species, $locationBuilding, $locationCage, $birthYear, $currentStatus) {
    global $yourDbConnection; 
    
    $species = mysqli_real_escape_string($yourDbConnection, $species);
    $locationBuilding = mysqli_real_escape_string($yourDbConnection, $locationBuilding);
    $locationCage = mysqli_real_escape_string($yourDbConnection, $locationCage);
    $birthYear = (int)$birthYear; 
    $currentStatus = mysqli_real_escape_string($yourDbConnection, $currentStatus);

    
    $query = "INSERT INTO Animals (Species, LocationBuilding, LocationCage, BirthYear, CurrentStatus)
              VALUES ('$species', '$locationBuilding', '$locationCage', $birthYear, '$currentStatus')";

    $result = mysqli_query($yourDbConnection, $query);

    if ($result) {
        echo "Animal added successfully!";
    } else {
        echo "Error: " . mysqli_error($yourDbConnection);
    }
}
function addBuilding($name, $purpose, $floors, $squareFootage) {
    global $yourDbConnection; 
    $name = mysqli_real_escape_string($yourDbConnection, $name);
    $purpose = mysqli_real_escape_string($yourDbConnection, $purpose);
    $floors = (int)$floors; // Ensure it's an integer
    $squareFootage = (int)$squareFootage; // Ensure it's an integer

    
    $query = "INSERT INTO Buildings (Name, Purpose, Floors, SquareFootage)
              VALUES ('$name', '$purpose', $floors, $squareFootage)";

    $result = mysqli_query($yourDbConnection, $query);

    
    if ($result) {
        echo "Building added successfully!";
    } else {
        echo "Error: " . mysqli_error($yourDbConnection);
    }
}
   
function insertAttraction($name, $buildingID, $showsPerDay, $ticketPrice) {
    global $yourDbConnection; // Use the global connection variable

    // Escape input data to prevent SQL injection
    $name = mysqli_real_escape_string($yourDbConnection, $name);
    $buildingID = (int)$buildingID;
    $showsPerDay = (int)$showsPerDay;
    $ticketPrice = (float)$ticketPrice;

    // Build and execute the SQL query
    $query = "INSERT INTO Attractions (Name, BuildingID, ShowsPerDay, TicketPrice)
              VALUES ('$name', $buildingID, $showsPerDay, $ticketPrice)";

    $result = mysqli_query($yourDbConnection, $query);

    // Check if the query was successful
    if ($result) {
        echo "Attraction inserted successfully!";
    } else {
        echo "Error: " . mysqli_error($yourDbConnection);
    }
}function updateViewAttraction($attractionID) {
    global $yourDbConnection; // Use the global connection variable

    function updateViewAttraction($attractionID) {
        global $yourDbConnection; // Use the global connection variable
    
        // Fetch attraction data from the database based on $attractionID
        $query = "SELECT * FROM Attractions WHERE AttractionID = $attractionID";
        $result = mysqli_query($yourDbConnection, $query);
    
        if ($result) {
            $attractionData = mysqli_fetch_assoc($result);
    
            // Display the update/view form with the fetched data
            include 'update_view_attraction_form.php';
        } else {
            echo "Error: " . mysqli_error($yourDbConnection);
        }
    }
    // Example query
    $query = "SELECT * FROM Attractions WHERE AttractionID = $attractionID";
    $result = mysqli_query($yourDbConnection, $query);

    if ($result) {
        $attractionData = mysqli_fetch_assoc($result);

        // Display the update/view form with the fetched data
        include 'update_view_attraction_form.php';
    } else {
        echo "Error: " . mysqli_error($yourDbConnection);
    }
}



$action = $_GET['action'] ?? '';

switch ($action) {
    case 'insert_animal':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $species = $_POST["species"];
            $locationBuilding = $_POST["locationBuilding"];
            $locationCage = $_POST["locationCage"];
            $birthYear = $_POST["birthYear"];
            $currentStatus = $_POST["currentStatus"];

            addAnimal($species, $locationBuilding, $locationCage, $birthYear, $currentStatus);
        } else {
          
            include 'add_animal_form.php';
        }
        break;


     case 'insert_building':
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Retrieve form data for adding buildings
                $name = $_POST["name"];
                $purpose = $_POST["purpose"];
                $floors = $_POST["floors"];
                $squareFootage = $_POST["squareFootage"];
    
                // Call the addBuilding function
                addBuilding($name, $purpose, $floors, $squareFootage);
            } else {
                // Display the form for adding buildings
                include 'add_building_form.php';
            }
            break;
            case 'insert_attraction':
                // Display the form for inserting attractions
                include 'insert_attraction_form.php';
                break;
        
            case 'insert_attraction_submit':
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Retrieve form data
                    $name = $_POST["name"];
                    $buildingID = $_POST["buildingID"];
                    $showsPerDay = $_POST["showsPerDay"];
                    $ticketPrice = $_POST["ticketPrice"];
        
                    // Call the insertAttraction function
                    insertAttraction($name, $buildingID, $showsPerDay, $ticketPrice);
                } else {
                    echo "<p>Invalid request.</p>";
                }
                break; 

                case 'update_view_attraction_submit':
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        
                        $attractionID = $_POST["attractionID"]; 
                        
                        updateViewAttraction($attractionID);
                    } else {
                        echo "<p>Invalid request.</p>";
                    }
                    break;

                    
                
    default:
        echo "<p>Invalid action.</p>";
}

mysqli_close($yourDbConnection);

include 'footer.php';
?>
