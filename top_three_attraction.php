<?php
include '../connection.php';

// SQL query to get the top 3 attractions by total revenue
$sql = "SELECT 
            A.AttractionID,
            A.Name,
            SUM(S.RevenueEarned) AS TotalRevenue
        FROM Attractions A
        JOIN Shows S ON A.AttractionID = S.AttractionID
        GROUP BY A.AttractionID, A.Name
        ORDER BY TotalRevenue DESC
        LIMIT 3";

// Execute the query
$result = mysqli_query($yourDbConnection, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top 3 Attractions by Revenue</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <h2>Top 3 Attractions by Revenue</h2>

    <?php
    if ($result && $result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Attraction ID</th><th>Name</th><th>Total Revenue</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["AttractionID"] . "</td>";
            echo "<td>" . $row["Name"] . "</td>";
            echo "<td>" . $row["TotalRevenue"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } elseif ($result) {
        echo "No results in the Attractions table.";
    }

    $yourDbConnection->close();
    ?>

</body>

</html>
