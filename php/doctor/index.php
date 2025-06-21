<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get_Doctors</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap">

    <!-- Favicons -->
    <link href="../../assets/favicon/logo1.png" rel="icon">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" type="text/css" href="../../css/doctor/index.css">

</head>

<body>

    <?php

    // session start
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

    //import database
    include("../database_connection.php");

    // today time
    date_default_timezone_set('Asia/Kolkata');
    $today = date('Y-m-d');

    //doctor and appointment
    $query = "SELECT * FROM appointment WHERE DID=$userid";
    $appointment = $db->query($query);
    $appointmenttb = $appointment->fetch_assoc();
    $query = "SELECT * FROM doctor WHERE DID='$userid'";
    $patient = $db->query($query);
    $patienttb = $patient->fetch_assoc();
    ?>

    <div class="container">
        <div class="menu">
            <table class="menu-container" border="0">
                <tr>
                    <td style="padding:10px" colspan="2">
                        <table border="0" class="profile-container">
                            <tr>
                                <td width="30%" style="padding-left:20px">
                                    <!-- <img src="../../assets/images/pimage/patient1.jpeg" alt="" width="100" style="border-radius:50%"> -->
                                  <a href="photo.php">  <img src='../../assets/images/dimage/<?php echo $patienttb['DPHOTO']; ?>' width='100' style="border-radius:50%"></a>
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title"><?php echo $patienttb['DNAME']; ?></p>
                                    <p class="profile-subtitle" style="font-size: 12px;"><?php echo $patienttb['DEMAIL'] ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="../logout.php"><input type="button" value="Log out" class="logout-btn btn-primary-soft btn"></a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="menu-row">
                    <td class="menu-btn menu-icon-home menu-active menu-icon-home-active">
                        <a href="index.php" class="non-style-link-menu non-style-link-menu-active">
                            <div>
                                <p class="menu-text">Home</p>
                        </a>
        </div></a>
        </td>
        </tr>
        <tr class="menu-row">
            <td class="menu-btn menu-icon-patient">
                <a href="allpatients.php" class="non-style-link-menu">
                    <div>
                        <p class="menu-text">All patients</p>
                </a>
    </div>
    </td>
    </tr>

    <tr class="menu-row">
        <td class="menu-btn menu-icon-appoinment">
            <a href="showappointments.php" class="non-style-link-menu">
                <div>
                    <p class="menu-text">Show Appointments</p>
            </a></div>
        </td>
    </tr>
    <tr class="menu-row">
        <td class="menu-btn menu-icon-settings">
            <a href="settings.php" class="non-style-link-menu">
                <div>
                    <p class="menu-text">Settings</p>
            </a></div>
        </td>
    </tr>

    </table>
    </div>
    <div class="dash-body" style="margin-top: 15px">
        <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;">

            <tr>

                <td colspan="1" class="nav-bar">
                    <p style="font-size: 23px;padding-left:12px;font-weight: 600;margin-left:20px;">Home</p>

                </td>
                <td width="25%">

                </td>
                <td width="15%">
                    <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                        Today's Date
                    </p>
                    <p class="heading-sub12" style="padding: 0;margin: 0;">
                        <?php
                        echo $today;
                        ?>
                    </p>
                </td>
                <td width="10%">
                    <button class="btn-label" style="display: flex;justify-content: center;align-items: center;"><img src="../../assets/img/calendar.svg" width="100%"></button>
                </td>


            </tr>
            <tr>
                <td colspan="4">

                    <center>
                        <table class="filter-container doctor-header" style="border: none;width:95%" border="0">
                            <tr>
                                <td>
                                    <h3>Welcome!</h3>
                                    <h1><?php echo $patienttb['DNAME']; ?></h1>
                                    <p>Haven't any idea about patients ? no problem let's jumping to
                                        <a href="allpatients.php" class="non-style-link"><b>"All Doctors"</b></a> section or
                                        <a href="showappointments.php" class="non-style-link"><b>"Sessions"</b> </a><br>
                                        Track your past and future appointments history.<br>Also find out the expected arrival time of your doctor or medical consultant.<br><br>
                                    </p>

                                    <h3>Get_Doctors</h3>
                                    <p>GetDoctor website offers a user-friendly platform connecting patients with qualified doctors, facilitating seamless appointment scheduling and medical consultations online. Accessible and efficient, it's your one-stop solution for healthcare needs.</p>


                                </td>
                            </tr>
                        </table>
                    </center>

                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <table border="0" width="100%"">
                            <tr>
                                <td width=" 50%">






                        <center>
                            <table class="filter-container" style="border: none;" border="0">
                                <tr>
                                    <td colspan="4">
                                        <p style="font-size: 20px;font-weight:600;padding-left: 12px;">Status</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 25%;">
                                        <div class="dashboard-items" style="padding:20px;margin:auto;width:95%;display: flex">
                                            <div>
                                                <div class="h1-dashboard">
                                                    <?php
                                                    $query = "SELECT * FROM doctor";
                                                    $doctor = $db->query($query);
                                                    echo $doctor->num_rows;
                                                    ?>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                    All Doctors &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                            </div>
                                            <div class="btn-icon-back dashboard-icons" style="background-image: url('../../assets/img/icons/doctors-hover.svg');"></div>
                                        </div>
                                    </td>
                                    <td style="width: 25%;">
                                        <div class="dashboard-items" style="padding:20px;margin:auto;width:95%;display: flex;">
                                            <div>
                                                <div class="h1-dashboard">
                                                    <?php
                                                    $query = "SELECT * FROM patient";
                                                    $patient = $db->query($query);
                                                    echo $patient->num_rows;
                                                    ?>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                    All Patients &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                            </div>
                                            <div class="btn-icon-back dashboard-icons" style="background-image: url('../../assets/img/icons/patients-hover.svg');"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 25%;">
                                        <div class="dashboard-items" style="padding:20px;margin:auto;width:95%;display: flex; ">
                                            <div>
                                                <div class="h1-dashboard">
                                                    <?php
                                                    echo $appointment->num_rows;
                                                    ?>
                                                </div><br>
                                                <div class="h3-dashboard">
                                                    All Booking &nbsp;&nbsp;
                                                </div>
                                            </div>
                                            <div class="btn-icon-back dashboard-icons" style="margin-left: 0px;background-image: url('../../assets/img/icons/book-hover.svg');"></div>
                                        </div>

                                    </td>

                                    <td style="width: 25%;">
                                        <div class="dashboard-items" style="padding:20px;margin:auto;width:95%;display: flex;padding-top:21px;padding-bottom:21px;">
                                            <div>
                                                <div class="h1-dashboard">
                                                    <?php
                                                    $query = "SELECT * FROM appointment WHERE DID='$userid' and APPOINTMENT_DATE='$today'";
                                                    $patient = $db->query($query);
                                                    echo $patient->num_rows;
                                                    ?>
                                                </div><br>
                                                <div class="h3-dashboard" style="font-size: 15px">
                                                    Today Sessions
                                                </div>
                                            </div>
                                            <div class="btn-icon-back dashboard-icons" style="background-image: url('../../assets/img/icons/session-iceblue.svg');"></div>
                                        </div>
                                    </td>

                                </tr>
                            </table>
                        </center>

                </td>
                <td>



                    <p style="font-size: 20px;font-weight:600;padding-left: 40px;" class="anime">Your Upcoming Booking</p>
                    <center>
                        <div class="abc scroll" style="height: 250px;padding: 0;margin: 0;">
                            <table width="85%" class="sub-table scrolldown" border="0">
                                <thead>

                                    <tr>
                                        <th class="table-headin">


                                            Appoint. Number

                                        </th>
                                        <th class="table-headin">


                                            Approve or Decline

                                        </th>

                                        <th class="table-headin">
                                            Patient
                                        </th>
                                        <th class="table-headin">

                                            Sheduled Date & Time

                                        </th>

                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $sqlmain = "SELECT * FROM appointment WHERE DID=$userid and APPOINTMENT_DATE>=$today";
                                    //echo $sqlmain;
                                    $result = $db->query($sqlmain);

                                    if ($result->num_rows == 0) {
                                        echo '<tr>
                                                    <td colspan="4">
                                                    <br><br><br><br>
                                                    <center>
                                                    <img src="../../assets/img/notfound.svg" width="25%">
                                                    
                                                    <br>
                                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Nothing to show here!</p>
                                                    <a class="non-style-link" href="schedule.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Channel a Doctor &nbsp;</font></button>
                                                    </a>
                                                    </center>
                                                    <br><br><br><br>
                                                    </td>
                                                    </tr>';
                                    } else {
                                        for ($x = 0; $x < $result->num_rows; $x++) {
                                            $row = $result->fetch_assoc();
                                            $title = $row["STATUS"];
                                            if($title==1)
                                            {
                                                $title="Approve";
                                            }
                                            else{
                                                $title="Decline";
                                            }
                                            $apponum = $row["ID"];
                                            $did=$row["PID"];
                                            $query = "SELECT * FROM patient WHERE PID=$did";
                                            // echo $query;
                                            $doctor = $db->query($query); 
                                            $doctor = $doctor->fetch_assoc();
                                            $docname = $doctor["PNAME"];
                                            $scheduledate = $row["APPOINTMENT_DATE"];
                                            $scheduletime = $row["APPOINTMENT_TIME"];

                                            echo '<tr>
                                                        <td style="padding:30px;font-size:25px;font-weight:700;"> &nbsp;' .
                                                $apponum
                                                . '</td>
                                                        <td style="padding:20px;"> &nbsp;' .
                                                substr($title, 0, 30)
                                                . '</td>
                                                        <td>
                                                        ' . substr($docname, 0, 20) . '
                                                        </td>
                                                        <td style="text-align:center;">
                                                            ' . substr($scheduledate, 0, 10) . ' ' . substr($scheduletime, 0, 5) . '
                                                        </td>

                
                                                       
                                                    </tr>';
                                        }
                                    }

                                    ?>

                                </tbody>

                            </table>
                        </div>
                    </center>

                </td>
            </tr>
        </table>
        </td>
        <tr>
            </table>
    </div>
    </div>

</body>

</html>