<?php
include 'connection.php';

// Check if the form is submitted for updates
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    if ($_POST['action'] == 'updateAttraction') {
        $attractionID = $_POST['attractionID'];
        $name = $_POST['name'];
        $buildingID = $_POST['buildingID'];
        $showsPerDay = $_POST['showsPerDay'];
        $ticketPrice = $_POST['ticketPrice'];

        // Update data in the Attractions table
        $sql = "UPDATE attractions SET Name='$name', BuildingID=$buildingID, ShowsPerDay=$showsPerDay, TicketPrice=$ticketPrice WHERE AttractionID=$attractionID";

        if ($yourDbConnection->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $yourDbConnection->error;
        }

        exit(); // Exit after handling the update
    }
}

// Fetch data from Attractions table
$sql = "SELECT * FROM attractions";
$result = $yourDbConnection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attraction Management</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Add your CSS file link -->
</head>

<body>

    <h2>Attraction Management</h2>

    <?php
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>AttractionID</th><th>Name</th><th>BuildingID</th><th>ShowsPerDay</th><th>TicketPrice</th><th>Action</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr data-attraction-id='" . $row["AttractionID"] . "'>";
            echo "<td>" . $row["AttractionID"] . "</td>";
            echo "<td contenteditable='true'>" . $row["Name"] . "</td>";
            echo "<td contenteditable='true'>" . $row["BuildingID"] . "</td>";
            echo "<td contenteditable='true'>" . $row["ShowsPerDay"] . "</td>";
            echo "<td contenteditable='true'>" . $row["TicketPrice"] . "</td>";
            echo "<td><button onclick='updateAttraction(" . $row["AttractionID"] . ")'>Update</button></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "0 results";
    }

    $yourDbConnection->close();
    ?>

    <script>
        function updateAttraction(attractionID) {
            var row = document.querySelector("tr[data-attraction-id='" + attractionID + "']");
            var cells = row.getElementsByTagName("td");

            // Get updated values
            var name = cells[1].innerText;
            var buildingID = cells[2].innerText;
            var showsPerDay = cells[3].innerText;
            var ticketPrice = cells[4].innerText;

            // Send the updated values to the server using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    alert(xhr.responseText); // Display the server response
                }
            };
            xhr.send("action=updateAttraction&attractionID=" + attractionID + "&name=" + name + "&buildingID=" + buildingID + "&showsPerDay=" + showsPerDay + "&ticketPrice=" + ticketPrice);
        }
    </script>

</body>

</html>
