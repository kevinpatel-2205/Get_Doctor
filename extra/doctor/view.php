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
$query = "SELECT * FROM  doctor ORDER by DID asc";
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
                <th>Specialization ID</th>
                <th>Date of Birth</th>
                <th>Consultation Fee</th>
                <th>Experience (in years)</th>
                <th>Qualification</th>
                <th>Active</th>
                <th>Last Login</th>
            </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['DID'] . "</td>";
        echo "<td><img src='../../assets/images/dimage/" . $row['DPHOTO'] . "' height='100' width='100'></td>";
        echo "<td>" . $row['DNAME'] . "</td>";
        echo "<td>" . $row['DPASSWORD'] . "</td>";
        echo "<td>" . $row['DEMAIL'] . "</td>";
        echo "<td>" . $row['DGENDER'] . "</td>";
        echo "<td>" . $row['DNUMBER'] . "</td>";
        echo "<td>" . $row['DADDRESS'] . "</td>";
        echo "<td>" . $row['SID'] . "</td>";
        echo "<td>" . $row['DDATE_OF_BIRTH'] . "</td>";
        echo "<td>" . $row['DCONSULTATION_FEE'] . "</td>";
        echo "<td>" . $row['DEXPERIENCE_YEARS'] . "</td>";
        echo "<td>" . $row['DQUALIFICATION'] . "</td>";
        echo "<td>" . $row['DACTIVE'] . "</td>";
        echo "<td>" . $row['DLAST_LOGIN'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found";
}

// Close database connection
$db->close();
?>
