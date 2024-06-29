
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turtleback Zoo Management System</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/assetman.css"> 
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="index.php">Zoo Management</a>  
</nav>

    <div class="container">
<h2>Asset Management</h2>
<ul>
    <li><a href="asset_functions.php?action=insert_animal">Insert Animal</a></li>
    <li><a href="update_animal.php">Update/View Animals</a></li>
    <li><a href="asset_functions.php?action=insert_building">Insert Building</a></li>
    <li><a href="asset_functions.php?action=insert_attraction">Insert Attraction</a></li>
    <li><a href="attraction_update.php">Update/View Attractions</a></li>
    <li><a href="add_employees.php">Add employee</a></li>
    <li><a href="employee_update.php">Manage Employee</a></li>
    <li><a href="species.php">Add animal species</a></li>
    <li><a href="modify.php">update/view species</a></li>
    

</ul>
</div>
<?php include 'footer.php'; ?>
