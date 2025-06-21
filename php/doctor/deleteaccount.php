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
    <link rel="stylesheet" type="text/css" href="../../css/doctor/index.css">

    <title>Get_Doctors</title>
</head>

<body>
    <?php

    //learn from w3schools.com

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

    $query = "SELECT * FROM doctor WHERE DID='$userid'";
    $doctor = $db->query($query);
    $doctortb = $doctor->fetch_assoc();
    $username = $doctortb["DNAME"];
    $useremail=$doctortb['DEMAIL'];

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
                                    <a href="photo.php"> <img src='../../assets/images/dimage/<?php echo $doctortb['DPHOTO']; ?>' width='100' style="border-radius:50%"></a>
                                </td>
                                <td style="padding:0px;margin:0px;">
                                    <p class="profile-title"><?php echo $doctortb['DNAME']; ?></p>
                                    <p class="profile-subtitle" style="font-size: 12px;"><?php echo $doctortb['DEMAIL'] ?></p>
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
                    <td class="menu-btn menu-icon-home ">
                        <a href="index.php" class="non-style-link-menu ">
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
                        <p class="menu-text">All Patients</p>
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
    <tr class="menu-row" >
                    <td class="menu-btn menu-icon-settings  menu-active menu-icon-settings-active">
                        <a href="settings.php" class="non-style-link-menu  non-style-link-menu-active"><div><p class="menu-text">Settings</p></a></div>
                    </td>
                </tr>

    </table>
    </div>
        <div class="dash-body" style="margin-top: 15px">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;" >
                        
                        <tr>
                    <td>
                        <p style="font-size: 23px;padding-left:12px;font-weight: 600;"></p>
                                           
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
                                ?>
                                </p>
                            </td>
                            <td width="10%">
                                <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../../assets/img/calendar.svg" width="100%"></button>
                            </td>
        
        
                        </tr>
                      
                <tr>           
            </table>
                    <center>
                        <div style="display: flex;justify-content: center;">
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                        
                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;"><u>Are you Sure, Want to Delete Your Account.</u></p><br><br>
                                </td>
                            </tr>
                            
                           
                            <tr>
                                
                                <td colspan="2">
                                <a href="delete_account.php"><input type="button" value="Yes" class="login-btn btn-primary-soft btn" ></a>
                                    <a href="settings.php"><input type="button" value="No" class="login-btn btn-primary-soft btn"></a>
                                
                                    
                                </td>
                
                            </tr>
                            
                           

                        </table>
                        </div>
                    </center>
                    
        </div>
    </div>
</body>
</html>