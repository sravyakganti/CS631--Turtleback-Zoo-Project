<?php
include 'connection.php';

$sql = "SELECT 
            S.SpeciesID, 
            S.Population, 
            S.MonthlyFoodCost,
            V.Name AS Veterinarian,
            ACS.Name AS AnimalCareSpecialist,
            T.Name AS Trainer
        FROM Species S
        LEFT JOIN Employees V ON S.VeterinarianID = V.EmployeeID
        LEFT JOIN Employees ACS ON S.AnimalCareSpecialistID = ACS.EmployeeID
        LEFT JOIN Employees T ON S.TrainerID = T.EmployeeID";

$result = mysqli_query($yourDbConnection, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animal Species Report</title>
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

    <h2>Animal Species Report</h2>

    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>SpeciesID</th><th>Population</th><th>Monthly Food Cost</th><th>Veterinarian</th><th>Animal Care Specialist</th><th>Trainer</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["SpeciesID"] . "</td>";
            echo "<td>" . $row["Population"] . "</td>";
            echo "<td>" . $row["MonthlyFoodCost"] . "</td>";
            echo "<td>" . $row["Veterinarian"] . "</td>";
            echo "<td>" . $row["AnimalCareSpecialist"] . "</td>";
            echo "<td>" . $row["Trainer"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "0 results";
    }

    $yourDbConnection->close();
    ?>

</body>

</html>
