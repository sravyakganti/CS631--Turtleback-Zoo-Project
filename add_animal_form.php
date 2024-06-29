<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Animal</title>
    <link rel="stylesheet"   href="css/form.css">
</head>
<body>

<h2>Add Animal</h2>

<form method="post" action="asset_functions.php?action=insert_animal">
    <label for="species">Species:</label>
    <input type="text" name="species" required>

    <label for="locationBuilding">Location Building:</label>
    <input type="text" name="locationBuilding" required>

    <label for="locationCage">Location Cage:</label>
    <input type="text" name="locationCage" required>

    <label for="birthYear">Birth Year:</label>
    <input type="text" name="birthYear">

    <label for="currentStatus">Current Status:</label>
    <input type="text" name="currentStatus" required>

    <button type="submit">Add Animal</button>
</form>

</body>
</html>
