<?php
include 'connection.php';

// Check if the form is submitted for updates
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'updateAnimal') {
    $animalID = $_POST['animalID'];
    $species = $_POST['species'];
    $locationBuilding = $_POST['locationBuilding'];
    $locationCage = $_POST['locationCage'];
    $birthYear = $_POST['birthYear'];
    $currentStatus = $_POST['currentStatus'];

    // Update data in the Animals table
    $sql = "UPDATE animals SET Species='$species', LocationBuilding='$locationBuilding', LocationCage='$locationCage', BirthYear=$birthYear, CurrentStatus='$currentStatus' WHERE AnimalID=$animalID";

    if ($yourDbConnection->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $yourDbConnection->error;
    }

    exit(); // Exit after handling the update
}

// Fetch data from Animals table
$sql = "SELECT * FROM animals";
$result = $yourDbConnection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Table</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Add your CSS file link -->
</head>

<body>

    <h2>Animal Table</h2>

    <?php
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>AnimalID</th><th>Species</th><th>LocationBuilding</th><th>LocationCage</th><th>BirthYear</th><th>CurrentStatus</th><th>Action</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr data-animal-id='" . $row["AnimalID"] . "'>";
            echo "<td>" . $row["AnimalID"] . "</td>";
            echo "<td contenteditable='true'>" . $row["Species"] . "</td>";
            echo "<td contenteditable='true'>" . $row["LocationBuilding"] . "</td>";
            echo "<td contenteditable='true'>" . $row["LocationCage"] . "</td>";
            echo "<td contenteditable='true'>" . $row["BirthYear"] . "</td>";
            echo "<td contenteditable='true'>" . $row["CurrentStatus"] . "</td>";
            echo "<td><button onclick='updateAnimal(" . $row["AnimalID"] . ")'>Update</button></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "0 results";
    }

    $yourDbConnection->close();
    ?>

    <script>
        function updateAnimal(animalID) {
            var row = document.querySelector("tr[data-animal-id='" + animalID + "']");
            var cells = row.getElementsByTagName("td");

            // Get updated values
            var species = cells[1].innerText;
            var locationBuilding = cells[2].innerText;
            var locationCage = cells[3].innerText;
            var birthYear = cells[4].innerText;
            var currentStatus = cells[5].innerText;

            // Send the updated values to the server using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert(xhr.responseText); // Display the server response
                }
            };
            xhr.send("action=updateAnimal&animalID=" + animalID + "&species=" + species + "&locationBuilding=" + locationBuilding + "&locationCage=" + locationCage + "&birthYear=" + birthYear + "&currentStatus=" + currentStatus);
        }
    </script>

</body>

</html>
