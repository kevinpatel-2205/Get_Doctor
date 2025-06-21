<?php
session_start();

if (isset($_SESSION["userid"])) {
    if (($_SESSION["userid"]) == "" or $_SESSION['usertype'] != 'DOCTOR') {
        header("location: ../login.php");
    } else {
        $userid = $_SESSION["userid"];
    }
} else {
    header("location: ../login.php");
}

include("../database_connection.php");

if ($_POST) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $experience = $_POST['experience'];
    $password = $_POST['password'];

    $query="UPDATE doctor set DNAME='$name' ,DEMAIL='$email' ,DNUMBER='$number' ,DADDRESS='$address' ,DEXPERIENCE_YEARS=$experience ,DPASSWORD='$password' WHERE DID='$userid'";
    $db->query($query);
    header("location: index.php");
}
