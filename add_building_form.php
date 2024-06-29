<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Building</title>
    <link rel="stylesheet" href="css/form.css">
</head>
<body>

<h2>Add Building</h2>

<form method="post" action="asset_functions.php?action=insert_building">
    <label for="name">Name:</label>
    <input type="text" name="name" required>

    <label for="purpose">Purpose:</label>
    <input type="text" name="purpose" required>

    <label for="floors">Floors:</label>
    <input type="number" name="floors" required>

    <label for="squareFootage">Square Footage:</label>
    <input type="number" name="squareFootage" required>

    <button type="submit">Add Building</button>
</form>

</body>
</html>
