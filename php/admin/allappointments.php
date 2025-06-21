<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap">

    <!-- Favicons -->
    <link href="../../assets/favicon/logo1.png" rel="icon">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" type="text/css" href="../../css/admin/index.css">

    <title>Get_Doctors</title>
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

    $query = "SELECT * FROM admin WHERE AID='$userid'";
    $admin = $db->query($query);
    $admintb = $admin->fetch_assoc();



    //echo $userid;
    //echo $username;



    date_default_timezone_set('Asia/Kolkata');

    $today = date('Y-m-d');
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
                    <td class="menu-btn menu-icon-dashbord ">
                        <a href="index.php" class="non-style-link-menu">
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
        <td class="menu-btn menu-icon-appoinment menu-active menu-icon-appoinment-active">
            <a href="allappointments.php" class="non-style-link-menu non-style-link-menu-active">
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

                <td width="25%">

                </td>
                <td>
                    <p style="font-size: 23px;padding-left:12px;font-weight: 600;"></p>

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
            <?php
            $appointmentquery = "SELECT * FROM appointment order by ID";
            $appointmenttb = $db->query($appointmentquery);
            $appointmentno = $appointmenttb->num_rows;
            ?>
            <tr>
                <td colspan="4" style="padding-top:10px;">
                    <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)"> All Appointments (<?php echo $appointmentno; ?>)</p>
                </td>

            </tr>
            <tr>
                <td colspan="4">
                    <center>
                        <div class="abc scroll">
                            <table width="93%" class="sub-table scrolldown" border="0" style="margin-top: 25px;">
                                <thead>
                                    <tr>
                                        <th class="table-headin">


                                            Appointments ID

                                        </th>
                                        <th class="table-headin">


                                            Patient Name

                                        </th>
                                        <th class="table-headin">
                                            Doctor Name
                                        </th>
                                        <th class="table-headin">

                                            Appointment Date

                                        </th>
                                        <th class="table-headin">

                                            Appointment Time
                                        </th>
                                    </tr>

                                </thead>
                                <tbody>

                                    <?php



                                    if ($appointmenttb->num_rows == 0) {
                                        echo '<tr>
                                    <td colspan="5">
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
                                        // for ($x = 0; $x < $appoint->num_rows; $x++) {
                                        //     $appointmentttb = $patienttb->fetch_assoc();
                                        while ($appointmentttb = $appointmenttb->fetch_assoc()) {
                                            $id = $appointmentttb["ID"];
                                            $pid = $appointmentttb["PID"];
                                            $pquery = "SELECT * FROM patient WHERE PID=$pid";
                                            $patienttb = $db->query($pquery);
                                            $patientttb = $patienttb->fetch_assoc();
                                            $pname = $patientttb["PNAME"];
                                            $did = $appointmentttb["DID"];
                                            $dquery = "SELECT * FROM doctor WHERE DID=$did";
                                            $doctortb = $db->query($dquery);
                                            $doctorttb = $doctortb->fetch_assoc();
                                            $dname = $doctorttb["DNAME"];
                                            $date = $appointmentttb["APPOINTMENT_DATE"];
                                            $time = $appointmentttb['APPOINTMENT_TIME'];

                                            echo '<tr>
                                            <td> &nbsp;' .
                                                $id
                                                . '</td>
                                        <td> &nbsp;' .
                                                $pname
                                                . '</td>
                                        <td>
                                        ' . $dname . '
                                        </td>
                                        <td>
                                            ' . $date . '
                                        </td>

                                        <td>
                                        <div style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;">
                                        ' . $time . '
                                        </div>
                                        </td>
                                    </tr>';
                                        }
                                    }

                                    ?>

                                </tbody>

                            </table>
            <tr>
                <form method="POST" action="generate_appointment_pdf.php">
                    <td colspan="2"><input type="Submit" class="login-btn btn-primary btn btn-book" style="margin-left:300px; margin-top:50px;  padding-left: 25px;padding-right: 100px;padding-top: 10px;padding-bottom: 10px;width:50%;text-align: center;" value="Generate Report" name="generatereport">
                    </td>
                </form>
            </tr>
    </div>
    </center>
    </td>
    </tr>



    </table>
    </div>

</body>

</html>