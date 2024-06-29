<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Attraction</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>

<h2>Add Attraction</h2>

<form method="post" action="asset_functions.php?action=insert_attraction_submit">
    <label for="name">Attraction Name:</label>
    <input type="text" name="name" required>

    <label for="buildingID">Building ID:</label>
    <input type="number" name="buildingID" required>

    <label for="showsPerDay">Shows Per Day:</label>
    <input type="number" name="showsPerDay" required>

    <label for="ticketPrice">Ticket Price:</label>
    <input type="text" name="ticketPrice" required>

    <button type="submit">Add Attraction</button>
</form>

</body>
</html>
