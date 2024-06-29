<!-- manage_species.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Species</title>
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

        a {
            text-decoration: none;
            color: #3498db;
        }

        a:hover {
            color: #2980b9;
        }
    </style>
</head>

<body>

    <h2>Manage Species</h2>

    <?php
    include 'connection.php';

    $sql = "SELECT * FROM Species";
    $result = mysqli_query($yourDbConnection, $sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>SpeciesID</th><th>Population</th><th>MonthlyFoodCost</th><th>VeterinarianID</th><th>AnimalCareSpecialistID</th><th>TrainerID</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["SpeciesID"] . "</td>";
            echo "<td>" . $row["Population"] . "</td>";
            echo "<td>" . $row["MonthlyFoodCost"] . "</td>";
            echo "<td>" . $row["VeterinarianID"] . "</td>";
            echo "<td>" . $row["AnimalCareSpecialistID"] . "</td>";
            echo "<td>" . $row["TrainerID"] . "</td>";
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
