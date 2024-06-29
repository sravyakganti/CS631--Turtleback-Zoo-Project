<?php
include '../connection.php';

// Construct the SQL query to get the top 5 revenue days
$sql = "SELECT 
            Date,
            RevenueEarned
        FROM Shows
        ORDER BY RevenueEarned DESC
        LIMIT 5";

// Execute the query
$result = mysqli_query($yourDbConnection, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top 5 Revenue Days Report</title>
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

    <h2>Top 5 Revenue Days Report</h2>

    <?php
    if ($result && $result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Date</th><th>Revenue Earned</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["Date"] . "</td>";
            echo "<td>" . $row["RevenueEarned"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } elseif ($result) {
        echo "No results in the Shows table.";
    }

    $yourDbConnection->close();
    ?>

</body>

</html>
