<?php

include 'connection.php'; // Include your database connection file

// Function to add data to the Species table
function addSpecies($population, $monthlyFoodCost, $veterinarianID, $animalCareSpecialistID, $trainerID) {
    global $yourDbConnection;

    // Escape input data to prevent SQL injection
    $population = mysqli_real_escape_string($yourDbConnection, $population);
    $monthlyFoodCost = mysqli_real_escape_string($yourDbConnection, $monthlyFoodCost);
    $veterinarianID = mysqli_real_escape_string($yourDbConnection, $veterinarianID);
    $animalCareSpecialistID = mysqli_real_escape_string($yourDbConnection, $animalCareSpecialistID);
    $trainerID = mysqli_real_escape_string($yourDbConnection, $trainerID);

    // Build and execute the SQL query
    $query = "INSERT INTO Species (Population, MonthlyFoodCost, VeterinarianID, AnimalCareSpecialistID, TrainerID)
              VALUES ('$population', '$monthlyFoodCost', '$veterinarianID', '$animalCareSpecialistID', '$trainerID')";

    $result = mysqli_query($yourDbConnection, $query);

    // Check if the query was successful
    if ($result) {
        echo "Species added successfully!";
    } else {
        echo "Error: " . mysqli_error($yourDbConnection);
    }
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data for adding species
    $population = $_POST["population"];
    $monthlyFoodCost = $_POST["monthlyFoodCost"];
    $veterinarianID = $_POST["veterinarianID"];
    $animalCareSpecialistID = $_POST["animalCareSpecialistID"];
    $trainerID = $_POST["trainerID"];

    // Call the addSpecies function
    addSpecies($population, $monthlyFoodCost, $veterinarianID, $animalCareSpecialistID, $trainerID);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Species</title>
    <link rel="stylesheet" href="css/form.css"> <!-- Add your CSS file link -->
</head>

<body>

    <h2>Add Species</h2>

    <form method="post" action="">
        <label for="population">Population:</label>
        <input type="text" name="population" required>

        <label for="monthlyFoodCost">Monthly Food Cost:</label>
        <input type="text" name="monthlyFoodCost" required>

        <label for="veterinarianID">Veterinarian ID:</label>
        <input type="text" name="veterinarianID" required>

        <label for="animalCareSpecialistID">Animal Care Specialist ID:</label>
        <input type="text" name="animalCareSpecialistID" required>

        <label for="trainerID">Trainer ID:</label>
        <input type="text" name="trainerID" required>

        <button type="submit">Add Species</button>
    </form>

</body>

</html>
