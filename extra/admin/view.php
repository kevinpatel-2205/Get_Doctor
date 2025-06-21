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
$query = "SELECT * FROM admin order by AID asc";
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
                <th>Last Password Change</th>
                <th>Number</th>
                <th>Address</th>
            </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['AID'] . "</td>";
        echo "<td><img src='aimage/" . $row['APHOTO'] . "' height='100' width='100'></td>";
        echo "<td>" . $row['ANAME'] . "</td>";
        echo "<td>" . $row['APASSWORD'] . "</td>";
        echo "<td>" . $row['AEMAIL'] . "</td>";
        echo "<td>" . $row['ALAST_PASSWORD_CHANGE'] . "</td>";
        echo "<td>" . $row['ANUMBER'] . "</td>";
        echo "<td>" . $row['AADDRESS'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}

// Close database connection
$db->close();
?>