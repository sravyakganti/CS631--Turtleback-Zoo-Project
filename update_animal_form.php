<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Animal</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>

<h2>Update Animal</h2>

<form method="post" action="asset_functions.php?action=update_animal">
    <!-- Assuming you have a hidden input field for the animal ID -->
    <input type="hidden" name="animalID" value="<?php echo isset($_POST['animalID']) ? $_POST['animalID'] : ''; ?>">

    <label for="newSpecies">New Species:</label>
    <input type="text" name="newSpecies" required>

    <label for="newLocationBuilding">New Location Building:</label>
    <input type="text" name="newLocationBuilding" required>

    <label for="newLocationCage">New Location Cage:</label>
    <input type="text" name="newLocationCage" required>

    <label for="newBirthYear">New Birth Year:</label>
    <input type="text" name="newBirthYear">

    <label for="newCurrentStatus">New Current Status:</label>
    <input type="text" name="newCurrentStatus" required>

    <button type="submit">Update Animal</button>
</form>

</body>
</html>
