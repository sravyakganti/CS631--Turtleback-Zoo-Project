<?php
include '../connection.php'; // Include your database connection file

// Function to compute average revenue for attractions, concessions, and total attendance
function computeAverageRevenue($itemType, $itemID, $itemTable, $activityTable, $beginDate, $endDate) {
    global $yourDbConnection;

    // Escape input data to prevent SQL injection
    $itemType = mysqli_real_escape_string($yourDbConnection, $itemType);
    $itemID = mysqli_real_escape_string($yourDbConnection, $itemID);
    $itemTable = mysqli_real_escape_string($yourDbConnection, $itemTable);
    $activityTable = mysqli_real_escape_string($yourDbConnection, $activityTable);
    $beginDate = mysqli_real_escape_string($yourDbConnection, $beginDate);
    $endDate = mysqli_real_escape_string($yourDbConnection, $endDate);

    // Build the SQL query
    $sql = "SELECT 
                '$itemType' AS ItemType,
                $itemTable.$itemID AS ItemID,
                AVG($activityTable.RevenueEarned) AS AverageRevenue
            FROM
                $itemTable
            JOIN
                $activityTable ON $itemTable.$itemID = $activityTable.$itemID
            WHERE
                $activityTable.Date BETWEEN '$beginDate' AND '$endDate'
            GROUP BY
                $itemTable.$itemID";

    // Execute the query
    $result = mysqli_query($yourDbConnection, $sql);

    // Display the results in a table with some styling
    echo "<style>
            table {
                border-collapse: collapse;
                width: 50%;
                margin-top: 20px;
            }
            th, td {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
            }
            th {
                background-color: #f2f2f2;
            }
          </style>";

    echo "<table>";
    echo "<tr><th>Item Type</th><th>Item ID</th><th>Average Revenue</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["ItemType"] . "</td>";
        echo "<td>" . $row["ItemID"] . "</td>";
        echo "<td>" . $row["AverageRevenue"] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compute Average Revenue</title>
</head>

<body>

    <h2>Compute Average Revenue</h2>

    <form method="post" action="">
        <label for="beginDate">Begin Date:</label>
        <input type="date" name="beginDate" required>

        <label for="endDate">End Date:</label>
        <input type="date" name="endDate" required>

        <button type="submit">Compute Average Revenue</button>
    </form>

    <?php
    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $beginDate = $_POST['beginDate'];
        $endDate = $_POST['endDate'];

        // Call the function to compute average revenue for attractions
        computeAverageRevenue('Attraction', 'AttractionID', 'Attractions', 'Shows', $beginDate, $endDate);

        // Call the function to compute average revenue for concessions
        computeAverageRevenue('Concession', 'ConcessionID', 'Concessions', 'DailyZooActivity', $beginDate, $endDate);

        // Call the function to compute average revenue for total attendance
        computeAverageRevenue('TotalAttendance', 'AttendanceID', 'Attendance', 'DailyZooActivity', $beginDate, $endDate);
    }
    ?>

</body>

</html>
