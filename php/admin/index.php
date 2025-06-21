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
    <link rel="stylesheet" type="text/css" href="../../css/admin/index.css">

</head>

<body>
    <?php

    //learn from w3schools.com

    session_start();

    if (isset($_SESSION["userid"])) {
        if (($_SESSION["userid"]) == "" or $_SESSION['usertype'] != 'ADMIN') {
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

    $query = "SELECT * FROM admin WHERE AID='$userid'";
    $admin = $db->query($query);
    $admintb = $admin->fetch_assoc();

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
                                    <a href="photo.php"> <img src='../../assets/images/aimage/<?php echo $admintb['APHOTO']; ?>' width='100' style="border-radius:50%"></a>
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title"><?php echo $admintb['ANAME']; ?></p>
                                    <p class="profile-subtitle" style="font-size: 12px;"><?php echo $admintb['AEMAIL'] ?></p>
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
                    <td class="menu-btn menu-icon-dashbord menu-active menu-icon-dashbord-active">
                        <a href="index.php" class="non-style-link-menu non-style-link-menu-active">
                            <div>
                                <p class="menu-text">Dashboard</p>
                        </a>
        </div></a>
        </td>
        </tr>
        <tr class="menu-row">
            <td class="menu-btn menu-icon-doctor">
                <a href="adddoctor.php" class="non-style-link-menu ">
                    <div>
                        <p class="menu-text"> Add Doctor</p>
                </a>
    </div>
    </td>
    </tr>
    <tr class="menu-row">
        <td class="menu-btn menu-icon-patient">
            <a href="allpatients.php" class="non-style-link-menu">
                <div>
                    <p class="menu-text">All Patients</p>
                </div>
            </a>
        </td>
    </tr>
    <tr class="menu-row">
        <td class="menu-btn menu-icon-doctor">
            <a href="alldoctors.php" class="non-style-link-menu">
                <div>
                    <p class="menu-text">All Doctors</p>
            </a></div>
        </td>
    </tr>
    <tr class="menu-row">
        <td class="menu-btn menu-icon-appoinment">
            <a href="allappointments.php" class="non-style-link-menu">
                <div>
                    <p class="menu-text">All Appointments</p>
            </a></div>
        </td>
    </tr>
    </table>
    </div>
    <div class="dash-body" style="margin-top: 15px">
        <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;">

            <tr>

                <td colspan="2" class="nav-bar">



                </td>
                <td width="15%">
                    <p style="font-size: 14px;color: rgb(119, 119, 119);padding: 0;margin: 0;text-align: right;">
                        Today's Date
                    </p>
                    <p class="heading-sub12" style="padding: 0;margin: 0;">
                        <?php
                        date_default_timezone_set('Asia/Kolkata');

                        $today = date('Y-m-d');
                        echo $today;


                        $patientrow = $db->query("select  * from  patient;");
                        $doctorrow = $db->query("select  * from  doctor;");
                        $appointmentrow = $db->query("select  * from  appointment where APPOINTMENT_DATE>='$today';");
                        $approw = $db->query("select  * from  appointment where APPOINTMENT_DATE='$today';");


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
                                    <h1><?php echo $admintb['ANAME']; ?></h1>
                                    <p>Haven't any idea about patients ? no problem let's jumping to
                                        <a href="alldoctors.php" class="non-style-link"><b>"All Doctors"</b></a> section or
                                        <a href="allappointments.php" class="non-style-link"><b>"Sessions"</b> </a><br>
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
                                                <?php echo $doctorrow->num_rows  ?>
                                            </div><br>
                                            <div class="h3-dashboard">
                                                Doctors &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <div class="btn-icon-back dashboard-icons" style="background-image: url('../../assets/img/icons/doctors-hover.svg');"></div>
                                    </div>
                                </td>
                                <td style="width: 25%;">
                                    <div class="dashboard-items" style="padding:20px;margin:auto;width:95%;display: flex;">
                                        <div>
                                            <div class="h1-dashboard">
                                                <?php echo $patientrow->num_rows  ?>
                                            </div><br>
                                            <div class="h3-dashboard">
                                                Patients &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <div class="btn-icon-back dashboard-icons" style="background-image: url('../../assets/img/icons/patients-hover.svg');"></div>
                                    </div>
                                </td>
                                <td style="width: 25%;">
                                    <div class="dashboard-items" style="padding:20px;margin:auto;width:95%;display: flex; ">
                                        <div>
                                            <div class="h1-dashboard">
                                                <?php echo $appointmentrow->num_rows  ?>
                                            </div><br>
                                            <div class="h3-dashboard">
                                                NewBooking &nbsp;&nbsp;
                                            </div>
                                        </div>
                                        <div class="btn-icon-back dashboard-icons" style="margin-left: 0px;background-image: url('../../assets/img/icons/book-hover.svg');"></div>
                                    </div>
                                </td>
                                <td style="width: 25%;">
                                    <div class="dashboard-items" style="padding:20px;margin:auto;width:95%;display: flex;padding-top:26px;padding-bottom:26px;">
                                        <div>
                                            <div class="h1-dashboard">
                                                <?php echo $approw->num_rows  ?>
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
            </tr>


            <tr>
                <td colspan="4">
                    <table width="100%" border="0" class="dashbord-tables">
                        <tr>
                            <td>
                                <p style="padding:10px;padding-left:48px;padding-bottom:0;font-size:23px;font-weight:700;color:var(--primarycolor);">
                                    Upcoming Appointments From Patient Side.
                                </p>
                                <p style="padding-bottom:19px;padding-left:50px;font-size:15px;font-weight:500;color:#212529e3;line-height: 20px;">
                                    Here's Quick access to Upcoming Appointments Form Patient Side<br>
                                    More details available in @AlL Appointment Section.
                                </p>

                            </td>
                            <td>
                                <p style="text-align:right;padding:10px;padding-right:48px;padding-bottom:0;font-size:23px;font-weight:700;color:var(--primarycolor);">
                                    Upcoming Appointments From Doctor Side.
                                </p>
                                <p style="padding-bottom:19px;text-align:right;padding-right:50px;font-size:15px;font-weight:500;color:#212529e3;line-height: 20px;">
                                    Here's Quick access to Upcoming Appointments Form Doctor Side<br>
                                    More details available in @AlL Appointment Section.
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td width="50%">
                                <center>
                                    <div class="abc scroll" style="height: 200px;">
                                        <table width="85%" class="sub-table scrolldown" border="0">
                                            <thead>
                                                <tr>
                                                    <th class="table-headin" style="font-size: 12px;">

                                                        Appointment number

                                                    </th>
                                                    <th class="table-headin">
                                                        Patient name
                                                    </th>
                                                    <th class="table-headin">


                                                        Patient Number

                                                    </th>
                                                    <th class="table-headin">


                                                        Appointment Date & Time

                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $sqlmain = "SELECT * from appointment WHERE APPOINTMENT_DATE>='$today' ";

                                                $result = $db->query($sqlmain);

                                                if ($result->num_rows == 0) {
                                                    echo '<tr>
                                                    <td colspan="3">
                                                    <br><br><br><br>
                                                    <center>
                                                    <img src="../../assets/img/notfound.svg" width="25%">
                                                    
                                                    <br>
                                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
                                                    <a class="non-style-link" href="allappointments.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Appointments &nbsp;</font></button>
                                                    </a>
                                                    </center>
                                                    <br><br><br><br>
                                                    </td>
                                                    </tr>';
                                                } else {
                                                    for ($x = 0; $x < $result->num_rows; $x++) {
                                                        $row = $result->fetch_assoc();
                                                        $appoid = $row["ID"];
                                                        $did = $row["DID"];
                                                        $appointmentdate = $row["APPOINTMENT_DATE"];
                                                        $appointmenttime = $row["APPOINTMENT_TIME"];
                                                        $pid = $row["PID"];
                                                        $apponum = $row["ID"];

                                                        $pquery = "SELECT * from patient WHERE PID='$pid'";
                                                        $presult = $db->query($pquery);
                                                        $prow = $presult->fetch_assoc();
                                                        $pname = $prow["PNAME"];
                                                        $pnumber = $prow['PNUMBER'];
                                                        echo '<tr>


                                                        <td style="text-align:center;font-size:23px;font-weight:500; color: var(--btnnicetext);padding:20px;">
                                                            ' . $appoid . '
                                                            
                                                        </td>

                                                        <td style="font-weight:600;"> &nbsp;' .

                                                            $pname
                                                            . '</td >
                                                        <td style="font-weight:600;"> &nbsp;' .

                                                            $pnumber
                                                            . '</td >
                                                           
                                                        
                                                        <td>
                                                        ' . $appointmentdate . ' <br/> ' . $appointmenttime . '
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
                            <td width="50%">
                                <center>
                                    <div class="abc scroll" style="height: 200px;">
                                        <table width="85%" class="sub-table scrolldown" border="0">
                                            <thead>
                                                <tr>
                                                    <th class="table-headin" style="font-size: 12px;">

                                                        Appointment number

                                                    </th>
                                                    <th class="table-headin">
                                                        Doctor name
                                                    </th>
                                                    <th class="table-headin">


                                                        Doctor Number

                                                    </th>
                                                    <th class="table-headin">


                                                        Appointment Date & Time

                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $sqlmain = "SELECT * from appointment WHERE APPOINTMENT_DATE>='$today' ";

                                                $result = $db->query($sqlmain);

                                                if ($result->num_rows == 0) {
                                                    echo '<tr>
                                                    <td colspan="3">
                                                    <br><br><br><br>
                                                    <center>
                                                    <img src="../../assets/img/notfound.svg" width="25%">
                                                    
                                                    <br>
                                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
                                                    <a class="non-style-link" href="allappointments.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Appointments &nbsp;</font></button>
                                                    </a>
                                                    </center>
                                                    <br><br><br><br>
                                                    </td>
                                                    </tr>';
                                                } else {
                                                    for ($x = 0; $x < $result->num_rows; $x++) {
                                                        $row = $result->fetch_assoc();
                                                        $appoid = $row["ID"];
                                                        $did = $row["DID"];
                                                        $appointmentdate = $row["APPOINTMENT_DATE"];
                                                        $appointmenttime = $row["APPOINTMENT_TIME"];
                                                        $pid = $row["PID"];
                                                        $pquery = "SELECT * from doctor WHERE DID='$did'";
                                                        $presult = $db->query($pquery);
                                                        $prow = $presult->fetch_assoc();
                                                        $pname = $prow["DNAME"];
                                                        $pnumber = $prow['DNUMBER'];
                                                        echo '<tr>


                                                        <td style="text-align:center;font-size:23px;font-weight:500; color: var(--btnnicetext);padding:20px;">
                                                            ' . $appoid . '
                                                            
                                                        </td>

                                                        <td style="font-weight:600;"> &nbsp;' .

                                                            $pname
                                                            . '</td >
                                                        <td style="font-weight:600;"> &nbsp;' .

                                                            $pnumber
                                                            . '</td >
                                                           
                                                        
                                                        <td>
                                                        ' . $appointmentdate . ' <br/> ' . $appointmenttime . '
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
                        <tr>
                            <td>
                                <center>
                                    <a href="allappointments.php" class="non-style-link"><button class="btn-primary btn" style="width:85%">Show all Appointments</button></a>
                                </center>
                            </td>
                            <td>
                                <center>
                                    <a href="allappointments.php" class="non-style-link"><button class="btn-primary btn" style="width:85%">Show all Appointments</button></a>
                                </center>
                            </td>
                        </tr>
                    </table>
                </td>

            </tr>
        </table>
        </center>
        </td>
        </tr>
        </table>
    </div>
    </div>


</body>

</html>