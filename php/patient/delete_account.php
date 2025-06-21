<?php
session_start(); // Start the session

if (isset($_SESSION["userid"])) {
    if ($_SESSION["userid"] == "" or $_SESSION['usertype'] != 'PATIENT') {
        header("location: ../login.php");
        exit(); // Add an exit after redirection
    } else {
        $userid = $_SESSION["userid"];
    }
} else {
    header("location: ../login.php");
    exit(); // Add an exit after redirection
}

include("../database_connection.php");

$query = "DELETE FROM patient WHERE PID='$userid'";
if ($db->query($query) === TRUE) {
    echo "Record deleted successfully";
    header('Location: ../logout.php');
} else {
    echo "Error deleting record: " . $db->error;
}

// Close the database connection if needed
$db->close();
?>
