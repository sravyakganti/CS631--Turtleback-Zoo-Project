<?php

include '../connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Attractions Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>

    <?php
  
    $sql = "SELECT A.AttractionID, A.Name, SUM(S.RevenueEarned) AS TotalRevenue
            FROM Attractions A
            JOIN Shows S ON A.AttractionID = S.AttractionID
            GROUP BY A.AttractionID, A.Name
            ORDER BY TotalRevenue DESC
            LIMIT 3";

    $result = mysqli_query($yourDbConnection, $sql);

    
    if ($result->num_rows > 0) {
        echo "<h2>Top 3 Attractions by Total Revenue</h2>";
        echo "<table>";
        echo "<tr><th>AttractionID</th><th>Name</th><th>Total Revenue</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["AttractionID"] . "</td>";
            echo "<td>" . $row["Name"] . "</td>";
            echo "<td>" . $row["TotalRevenue"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>No results found.</p>";
    }

    $yourDbConnection->close();
    ?>

</body>

</html>
