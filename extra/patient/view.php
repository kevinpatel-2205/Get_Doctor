<?php
// Database configuration
$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "db_get_doctor";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Fetch all data from admin table
$query = "SELECT * FROM patient ORDER by PID asc";
$result = $db->query($query);

// Check if there are any records
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Password</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Number</th>
                <th>Address</th>
                <th>blood_group</th>
                <th>Date of Birth</th>
              
            </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['PID'] . "</td>";
        echo "<td><img src='../../assets/images/pimage/" . $row['PPHOTO'] . "' height='100' width='100'></td>";
        echo "<td>" . $row['PNAME'] . "</td>";
        echo "<td>" . $row['PPASSWORD'] . "</td>";
        echo "<td>" . $row['PEMAIL'] . "</td>";
        echo "<td>" . $row['PGENDER'] . "</td>";
        echo "<td>" . $row['PNUMBER'] . "</td>";
        echo "<td>" . $row['PADDRESS'] . "</td>";
        echo "<td>" . $row['PBLOOD_GROUP'] . "</td>";
        echo "<td>" . $row['PDATE_OF_BIRTH'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}

// Close database connection
$db->close();
?>
