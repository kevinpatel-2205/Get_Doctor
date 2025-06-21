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
    <link rel="stylesheet" type="text/css" href="../../css/patient/index.css">

    <title>Get_Doctors</title>
    <style>
        .thtd {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: left;
        }


        input[type="text"],
        select,
        input[type="date"],
        input[type="time"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
    </style>


</head>

<body>
    <?php

    //learn from w3schools.com

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


    //import database
    include("../database_connection.php");

    $query = "SELECT * FROM patient WHERE PID='$userid'";
    $patient = $db->query($query);
    $patienttb = $patient->fetch_assoc();
    $userid = $patienttb["PID"];
    $username = $patienttb["PNAME"];


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
                                  <a href="photo.php">  <img src='../../assets/images/pimage/<?php echo $patienttb['PPHOTO']; ?>' width='100' style="border-radius:50%"></a>
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title"><?php echo $patienttb['PNAME']; ?></p>
                                    <p class="profile-subtitle" style="font-size: 12px;"><?php echo $patienttb['PEMAIL'] ?></p>
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
                <tr class="menu-row" >
                    <td class="menu-btn menu-icon-home " >
                        <a href="index.php" class="non-style-link-menu "><div><p class="menu-text">Home</p></a></div></a>
                    </td>
                </tr>
                <tr class="menu-row">
            <td class="menu-btn menu-icon-doctor">
                <a href="alldoctors.php" class="non-style-link-menu">
                    <div>
                        <p class="menu-text">All Doctors</p>
                </a>
    </div>
    </td>
    </tr>

    <tr class="menu-row" >
                    <td class="menu-btn menu-icon-session menu-active menu-icon-session-active">
                        <a href="booking.php" class="non-style-link-menu non-style-link-menu-active"><div><p class="menu-text">Booking Appointment</p></div></a>
                    </td>
                </tr>
    <tr class="menu-row">
        <td class="menu-btn menu-icon-appoinment">
            <a href="myappointments.php" class="non-style-link-menu">
                <div>
                    <p class="menu-text">My Appointments</p>
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
            <tr>
                <td colspan="4">
                    <center>
                        <div class="abc">
                            <table width="100%" class="sub-table " border="0" style="padding: 50px;border:none">

                                <tbody>


                                    <form method="POSt">
                                        <tr><br/><br/></tr>
                                        <tr></tr>

                                        <tr>
                                            <td width="35%"></td>
                                            <td colspan="4" style="padding-top:10px;width: 100%;">
                                                <h2>Appointment Booking </h2>
                                            </td>
                                        </tr>
                                       
                                        <tr>
    <th>Select Specialization</th>
    <td>
        <!-- <form method="POST">  -->
            <select name="specialization" onchange="this.form.submit()" required>

                <?php 
                $query = "SELECT * FROM specialization ORDER BY SID";
                $specialization = $db->query($query);

                while($row = $specialization->fetch_assoc()) {
                    if(isset($_POST['specialization']) && $_POST['specialization'] == $row['SID']) {
                        echo "<option value='" . $row['SID'] . "' selected>" . $row['SPECIALIZATION'] . "</option>";
                    } else {
                        echo "<option value='" . $row['SID'] . "'>" . $row['SPECIALIZATION'] . "</option>";
                    }
                }
                ?>
            </select>
        <!-- </form> -->
    </td>
</tr>

<tr>
    <th>Select Doctor</th>
    <td>
        <select name="doctor" required>
            <?php
            if(isset($_POST['specialization'])) {
                $specializationId = $_POST['specialization'];
                $q = "SELECT * FROM doctor WHERE SID='$specializationId' ORDER BY DNAME";
            } else {
                $q = "SELECT * FROM doctor ORDER BY DID";
            }
            $doctor = $db->query($q);
            while($r = $doctor->fetch_assoc()) {
                echo "<option value='" . $r['DID'] . "'>" . $r['DNAME'] . "</option>";
            }
            ?>
        </select> 
    </td>
</tr>

<tr>
    <th>Doctor Fees</th>
    <td>
        
         <input type='text' value='500' readonly>
    
    </td>
</tr>
                                        <tr>
                                            <th>Appointment Date</th>
                                            <td><input type="date" name="appointment_date" min=" <?php echo $today; ?>" required></td>
                                        </tr>
                                        <tr>
                                            <th>Appointment Time</th>
                                            <td><input type="time" name="appointment_time" min="12:00" max="17:00" step="1800" required></td>
                                        </tr>
                                        
                                        <tr>
                                            <td colspan="2"><input type="Submit" class="login-btn btn-primary btn btn-book" style="margin-left:300px; margin-top:50px; padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;width:50%;text-align: center;" value="Book now" name="booknow" >
                                            </td>
                                        </tr>
                                    </form>


                                    <?php
// Check if the form is submitted
if(isset($_POST['booknow'])) {
    // Retrieve form data
    
    $specializationId = $_POST['specialization'];
    $doctorId = $_POST['doctor'];
    $appointmentDate = $_POST['appointment_date'];
    $appointmentTime = $_POST['appointment_time'];
    
    // Insert data into the appointment table
    $insertQuery = "INSERT INTO appointment (DID, PID, APPOINTMENT_DATE, APPOINTMENT_TIME, SID, FEES, STATUS) VALUES ( $doctorId,$userid, '$appointmentDate', '$appointmentTime',$specializationId,500, 1)";
    
    if($db->query($insertQuery)) {
        // Appointment successfully booked
        echo '<script>alert("Appointment booked successfully!");</script>';
    } else {
        // Failed to book appointment
        echo '<script>alert("Failed to book appointment. Please try again later.");</script>';
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
    </div>
    </div>



    </div>
</body>

</html>