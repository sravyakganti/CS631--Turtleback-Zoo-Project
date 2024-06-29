<?php

include 'connection.php'; // Include your database connection file

// Function to update an employee
function updateEmployee($employeeID, $name, $address, $startDate, $employeeType, $hourlyRate) {
    global $yourDbConnection;

    // Escape input data to prevent SQL injection
    $name = mysqli_real_escape_string($yourDbConnection, $name);
    $address = mysqli_real_escape_string($yourDbConnection, $address);
    $startDate = mysqli_real_escape_string($yourDbConnection, $startDate);
    $employeeType = mysqli_real_escape_string($yourDbConnection, $employeeType);
    $hourlyRate = (float)$hourlyRate;

    // Update data in the Employees table
    $query = "UPDATE Employees SET Name='$name', Address='$address', StartDate='$startDate', EmployeeType='$employeeType', HourlyRate=$hourlyRate WHERE EmployeeID=$employeeID";

    $result = mysqli_query($yourDbConnection, $query);

    // Check if the query was successful
    if ($result) {
        echo "Employee updated successfully!";
    } else {
        echo "Error: " . mysqli_error($yourDbConnection);
    }
}

// Function to delete an employee
function deleteEmployee($employeeID) {
    global $yourDbConnection;

    // Delete data from the Employees table
    $query = "DELETE FROM Employees WHERE EmployeeID=$employeeID";

    $result = mysqli_query($yourDbConnection, $query);

    // Check if the query was successful
    if ($result) {
        echo "Employee deleted successfully!";
    } else {
        echo "Error: " . mysqli_error($yourDbConnection);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Table</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Add your CSS file link -->
</head>

<body>

    <h2>Employee Table</h2>

    <?php
    // Fetch employee data from the Employees table
    $sql = "SELECT * FROM Employees";
    $result = mysqli_query($yourDbConnection, $sql);

    if ($result->num_rows > 0) {
        echo "<form method='post' action=''>";
        echo "<table border='1'>";
        echo "<tr><th>EmployeeID</th><th>Name</th><th>Address</th><th>Start Date</th><th>Employee Type</th><th>Hourly Rate</th><th>Action</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["EmployeeID"] . "</td>";
            echo "<td><input type='text' name='name[" . $row["EmployeeID"] . "]' value='" . $row["Name"] . "'></td>";
            echo "<td><input type='text' name='address[" . $row["EmployeeID"] . "]' value='" . $row["Address"] . "'></td>";
            echo "<td><input type='text' name='startDate[" . $row["EmployeeID"] . "]' value='" . $row["StartDate"] . "'></td>";
            echo "<td><input type='text' name='employeeType[" . $row["EmployeeID"] . "]' value='" . $row["EmployeeType"] . "'></td>";
            echo "<td><input type='text' name='hourlyRate[" . $row["EmployeeID"] . "]' value='" . $row["HourlyRate"] . "'></td>";
            echo "<td>";
            echo "<button type='submit' name='updateEmployee' value='" . $row["EmployeeID"] . "'>Update</button>";
            echo "<button type='submit' name='deleteEmployee' value='" . $row["EmployeeID"] . "'>Delete</button>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</form>";
    } else {
        echo "0 results";
    }

    // Handle form submission for updating and deleting employees
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['updateEmployee'])) {
            $employeeID = $_POST['updateEmployee'];
            $name = $_POST['name'][$employeeID];
            $address = $_POST['address'][$employeeID];
            $startDate = $_POST['startDate'][$employeeID];
            $employeeType = $_POST['employeeType'][$employeeID];
            $hourlyRate = $_POST['hourlyRate'][$employeeID];

            updateEmployee($employeeID, $name, $address, $startDate, $employeeType, $hourlyRate);
        } elseif (isset($_POST['deleteEmployee'])) {
            $employeeID = $_POST['deleteEmployee'];

            deleteEmployee($employeeID);
        }
    }

    $yourDbConnection->close();
    ?>

</body>

</html>
