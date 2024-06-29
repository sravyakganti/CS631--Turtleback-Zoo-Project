<?php

include 'connection.php'; // Include your database connection file

// Function to generate a report of revenue by source for all records
function generateRevenueReport() {
    global $yourDbConnection;

    // Fetch data from the Shows table for all records
    $sql = "SELECT A.AttractionID, A.Name AS AttractionName, S.Date, S.TicketsSold, S.RevenueEarned
            FROM Shows S
            INNER JOIN Attractions A ON S.AttractionID = A.AttractionID";
    $result = mysqli_query($yourDbConnection, $sql);

    if ($result->num_rows > 0) {
        echo "<h2>Revenue Report for All Shows</h2>";
        echo "<table style='width:100%; border-collapse: collapse; margin-top: 20px;'>";
        echo "<tr style='background-color: #f2f2f2;'>";
        echo "<th style='padding: 10px; border: 1px solid #dddddd; text-align: left;'>AttractionID</th>";
        echo "<th style='padding: 10px; border: 1px solid #dddddd; text-align: left;'>Attraction Name</th>";
        echo "<th style='padding: 10px; border: 1px solid #dddddd; text-align: left;'>Date</th>";
        echo "<th style='padding: 10px; border: 1px solid #dddddd; text-align: left;'>Tickets Sold</th>";
        echo "<th style='padding: 10px; border: 1px solid #dddddd; text-align: left;'>Revenue Earned</th>";
        echo "</tr>";

        $totalRevenue = 0;

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td style='padding: 10px; border: 1px solid #dddddd;'>" . $row["AttractionID"] . "</td>";
            echo "<td style='padding: 10px; border: 1px solid #dddddd;'>" . $row["AttractionName"] . "</td>";
            echo "<td style='padding: 10px; border: 1px solid #dddddd;'>" . $row["Date"] . "</td>";
            echo "<td style='padding: 10px; border: 1px solid #dddddd;'>" . $row["TicketsSold"] . "</td>";
            echo "<td style='padding: 10px; border: 1px solid #dddddd;'>$" . $row["RevenueEarned"] . "</td>";
            echo "</tr>";

            // Accumulate total revenue
            $totalRevenue += $row["RevenueEarned"];
        }

        // Display total revenue
        echo "<tr style='background-color: #f2f2f2;'>";
        echo "<td colspan='4' style='padding: 10px; border: 1px solid #dddddd; text-align: right;'><strong>Total Revenue:</strong></td>";
        echo "<td style='padding: 10px; border: 1px solid #dddddd;'><strong>$" . $totalRevenue . "</strong></td>";
        echo "</tr>";

        echo "</table>";
    } else {
        echo "<p>No data available</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revenue Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>

<body>

    <h1 style="text-align: center;">Zoo financial Reporting</h1>

    <?php
    // Generate revenue report for all records
    generateRevenueReport();
    ?>

</body>

</html>
