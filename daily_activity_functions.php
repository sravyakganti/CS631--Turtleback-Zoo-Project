<?php include 'connection.php'; ?>

<?php
$action = $_GET['action'] ?? '';

switch ($action) {
    case 'attendance_and_revenue':
        echo "<h3>Attendance and Revenue Report</h3>";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
           
            $attractionID = $_POST['attractionID'];
            $date = $_POST['date'];
            $ticketsSold = $_POST['ticketsSold'];
            $revenueEarned = $_POST['revenueEarned'];

            $insertQuery = "INSERT INTO Shows (AttractionID, Date, TicketsSold, RevenueEarned)
                            VALUES ($attractionID, '$date', $ticketsSold, $revenueEarned)";

            $result = mysqli_query($yourDbConnection, $insertQuery);

            if ($result) {
                echo "<p>Attendance and revenue recorded successfully!</p>";
            } else {
                echo "<p>Error recording data: " . mysqli_error($yourDbConnection) . "</p>";
            }
        } else {
            
            ?>
            <form method="post" action="daily_activity_functions.php?action=attendance_and_revenue">
                <label for="attractionID">Attraction ID:</label>
                <input type="text" name="attractionID" required>

                <label for="date">Date:</label>
                <input type="date" name="date" required>

                <label for="ticketsSold">Tickets Sold:</label>
                <input type="text" name="ticketsSold" required>

                <label for="revenueEarned">Revenue Earned:</label>
                <input type="text" name="revenueEarned" required>

                <button type="submit">Record Attendance and Revenue</button>
            </form>
            <?php
        }
        break;

        case 'daily_concession_revenue':
            echo "<h3>Daily Concession Revenue Report</h3>";
    
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                $date = $_POST['date'];
                $revenueEarned = $_POST['revenueEarned'];
    
                $insertQuery = "INSERT INTO DailyConcessionRevenue (Date, RevenueEarned)
                                VALUES ('$date', $revenueEarned)";
    
                $result = mysqli_query($yourDbConnection, $insertQuery);
    
                if ($result) {
                    echo "<p>Daily concession revenue recorded successfully!</p>";
                } else {
                    echo "<p>Error recording data: " . mysqli_error($yourDbConnection) . "</p>";
                }
            } else {
                
                ?>
                <form method="post" action="daily_activity_functions.php?action=daily_concession_revenue">
                    <label for="date">Date:</label>
                    <input type="date" name="date" required>
    
                    <label for="revenueEarned">Revenue Earned:</label>
                    <input type="text" name="revenueEarned" required>
    
                    <button type="submit">Record Daily Concession Revenue</button>
                </form>
                <?php
            }
            break;

    default:
        echo "<p>Invalid action.</p>";
}

?>

<?php include 'footer.php'; ?>
