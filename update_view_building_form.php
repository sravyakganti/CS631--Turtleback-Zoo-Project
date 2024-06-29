<!-- update_view_building_form.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update/View Building</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>

<h2>Update/View Building</h2>

<!-- Display form for updating and viewing building information -->
<form method="post" action="asset_functions.php?action=update_building">
    <label for="buildingID">Building ID:</label>
    <input type="text" name="buildingID" required>

    <!-- Add additional fields for updating building information as needed -->
    <label for="name">Name:</label>
    <input type="text" name="name" required>

    <label for="purpose">Purpose:</label>
    <input type="text" name="purpose" required>

    <label for="floors">Floors:</label>
    <input type="number" name="floors" required>

    <label for="squareFootage">Square Footage:</label>
    <input type="number" name="squareFootage" required>

    <button type="submit">Update Building</button>
</form>

<!-- Add a section to display existing building information -->
<h3>Existing Buildings:</h3>
<table border="1">
    <tr>
        <th>BuildingID</th>
        <th>Name</th>
        <th>Purpose</th>
        <th>Floors</th>
        <th>SquareFootage</th>
    </tr>

    <!-- Replace the following PHP logic with a loop through your building data -->
    <?php
// Include your database connection file or establish the connection here
include 'connection.php'; // Make sure this path is correct

// Fetch existing building information from the database
$query = "SELECT * FROM Buildings";
$result = mysqli_query($yourDbConnection, $query);

if (mysqli_num_rows($result) > 0) {
    while ($building = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$building['BuildingID']}</td>";
        echo "<td>{$building['Name']}</td>";
        echo "<td>{$building['Purpose']}</td>";
        echo "<td>{$building['Floors']}</td>";
        echo "<td>{$building['SquareFootage']}</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No buildings found.</td></tr>";
}
?>
</table>

</body>
</html>
