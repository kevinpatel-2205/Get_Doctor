<?php
session_start();

if (isset($_SESSION["userid"])) {
    if (($_SESSION["userid"]) == "" or $_SESSION['usertype'] != 'PATIENT') {
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
    $password = $_POST['password'];

    $query="UPDATE patient set PNAME='$name' ,PEMAIL='$email' ,PNUMBER='$number' ,PADDRESS='$address' ,PPASSWORD='$password' WHERE PID='$userid'";
    $db->query($query);
    header("location: index.php");
}
