<?php

include 'connection.php'; // Make sure to include your database connection file

function addEmployee($name, $address, $startDate, $employeeType, $hourlyRate) {
    global $yourDbConnection;

    // Escape input data to prevent SQL injection
    $name = mysqli_real_escape_string($yourDbConnection, $name);
    $address = mysqli_real_escape_string($yourDbConnection, $address);
    $startDate = mysqli_real_escape_string($yourDbConnection, $startDate);
    $employeeType = mysqli_real_escape_string($yourDbConnection, $employeeType);
    $hourlyRate = (float)$hourlyRate;

    // Insert data into the Employees table
    $query = "INSERT INTO Employees (Name, Address, StartDate, EmployeeType, HourlyRate)
              VALUES ('$name', '$address', '$startDate', '$employeeType', $hourlyRate)";

    $result = mysqli_query($yourDbConnection, $query);

    // Check if the query was successful
    if ($result) {
        echo "Employee added successfully!";
    } else {
        echo "Error: " . mysqli_error($yourDbConnection);
    }
}

// Check if the form is submitted for adding an employee
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'addEmployee') {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $startDate = $_POST['startDate'];
    $employeeType = $_POST['employeeType'];
    $hourlyRate = $_POST['hourlyRate'];

    addEmployee($name, $address, $startDate, $employeeType, $hourlyRate);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link rel="stylesheet" href="css/form.css"> <!-- Add your CSS file link -->
</head>

<body>

    <h2>Add Employee</h2>

    <form method="post" action="">
        <input type="hidden" name="action" value="addEmployee">

        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="address">Address:</label>
        <input type="text" name="address" required>

        <label for="startDate">Start Date:</label>
        <input type="date" name="startDate" required>

        <label for="employeeType">Employee Type:</label>
        <input type="text" name="employeeType" required>

        <label for="hourlyRate">Hourly Rate:</label>
        <input type="text" name="hourlyRate" required>

        <button type="submit">Add Employee</button>
    </form>

</body>

</html>
