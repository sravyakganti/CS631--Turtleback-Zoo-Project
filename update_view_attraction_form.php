<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update/View Attraction</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>

<h2>Update/View Attraction</h2>

<form method="post" action="asset_functions.php?action=update_view_attraction_submit">
    <input type="hidden" name="attractionID" value="<?php echo $attractionData['AttractionID']; ?>">

    <label for="name">Attraction Name:</label>
    <input type="text" name="name" value="<?php echo $attractionData['Name']; ?>" required>

    <label for="showsPerDay">Shows Per Day:</label>
    <input type="number" name="showsPerDay" value="<?php echo $attractionData['ShowsPerDay']; ?>" required>

    <label for="ticketPrice">Ticket Price:</label>
    <input type="text" name="ticketPrice" value="<?php echo $attractionData['TicketPrice']; ?>" required>

    <button type="submit">Update Attraction</button>
</form>

</body>
</html>
