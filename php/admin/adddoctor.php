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

    <style>
        .input-text {
            border-radius: 4px;
            border: 0.5px solid rgb(226, 226, 226);
            padding: 10px;
            width: 92%;
            transition: 0.2s;
            outline: none;
        }

        .input-text {
            border: 1px solid #e9ecef;
            font-size: 14px;
            line-height: 26px;
            background-color: #fff;
            display: block;
            width: 500px;
            padding: .375rem .75rem;
            font-weight: 300;
            line-height: 1.5;
            color: #212529;
            background-color: #fff;
            background-clip: padding-box;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: .25rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }
    </style>
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

    if ($_POST) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobileno = $_POST['number'];
        $dob = $_POST['dob'];
        $spec = $_POST['sid'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $consul = $_POST['consultion'];
        $experi = $_POST['experience'];
        $queli = $_POST['qualification'];


        $checker = $db->query("select * from doctor where DEMAIL='$email' and DPASSWORD='$password'");
        if ($checker->num_rows == 1) {
            $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this Email address.</label>';
        } else {
            //TODO
            $db->query("insert into doctor(DNAME, DPASSWORD, DEMAIL, DGENDER, DNUMBER, DADDRESS, SID, DDATE_OF_BIRTH, DCONSULTATION_FEE, DEXPERIENCE_YEARS, DQUALIFICATION) values('$name','$password','$email','$gender','$mobileno','$address', $spec,'$dob',$consul,$experi,'$quli');");

            header('Location: adddoctor.php');
            $error = '<label for="promter" class="form-label" style="color:rgb(255, 62, 62);text-align:center;"></label>';
        }
    } else {
        //header('location: signup.php');
        $error = '<label for="promter" class="form-label"></label>';
    }

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
                        <a href="index.php" class="non-style-link-menu ">
                            <div>
                                <p class="menu-text">Dashboard</p>
                        </a>
        </div></a>
        </td>
        </tr>
        <tr class="menu-row">
            <td class="menu-btn menu-icon-doctor menu-active menu-icon-doctor-active">
                <a href="adddoctor.php" class="non-style-link-menu non-style-link-menu-active">
                    <div>
                        <p class="menu-text"> Add Doctor</p>
                    </div>
                </a>
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
                </a>
    </div>
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

        </table>

        </td>
        </tr>
        </table>
        <center>
            <div class="container" style="margin-left: 100px; margin-top:50px;">
                <table border="0">
                    <tr>
                        <td colspan="2">
                            <p class="header-text">
                            <h1>Add Doctor</h1>
                            </p>
                        </td>
                    </tr><br><br>
                    <tr>
                        <form action="" method="POST">
                            <td class="label-td">
                                <label for="name" class="form-label">Name: </label>
                            </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="text" name="name" class="input-text" placeholder="Name" required><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="newemail" class="form-label">Email: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="email" name="email" class="input-text" placeholder="Email Address" required><br>
                        </td>

                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="number" class="form-label">Mobile Number: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="tel" name="number" class="input-text" placeholder="Phone Number" pattern="[0-9]{10}" required><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="dob" class="form-label">Date of Birth: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="date" name="dob" class="input-text" required><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td">
                            <label for="gender" class="form-label">Specialization: </label>
                        </td>
                    </tr>

                    <tr>
                        <td class="label-td" colspan="2">
                            <select name="sid" id="" class="box" required>
                                <option value="" disabled selected>Select Specialization</option>
                                <?php
                                $speque = "SELECT * FROM specialization";
                                $spe = $db->query($speque);
                                // $spetb = $spe->fetch_assoc();
                                while ($spetb = $spe->fetch_assoc()) {
                                    echo '<option value=" ' . $spetb['SID'] . ' "> ' . $spetb['SPECIALIZATION'] . ' </option>';
                                }
                                ?>
                            </select><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="gen" class="form-label">Gender: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <select name="gender" id="" class="box" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="Male">Male</option><br />
                                <option value="Female">Female</option><br />
                                <option value="Other">Other</option><br />
                            </select><br><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="con" class="form-label">consultation Fees: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="number" name="consultion" class="input-text" placeholder="consultation Fees" required><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="exp" class="form-label">Experience Years: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="number" name="experience" class="input-text" placeholder="Experience Years" required><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="que" class="form-label">Qualification: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="text" name="qualification" class="input-text" placeholder="Qualification" required><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="addr" class="form-label">Address: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="text" name="address" class="input-text" placeholder="Address" required><br>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <label for="password" class="form-label">Password: </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="label-td" colspan="2">
                            <input type="password" name="password" class="input-text" placeholder="Enter Password" required><br>
                        </td>
                    </tr>
                    <tr>

                        <td colspan="2">
                            <?php echo $error ?>
                            <!-- <?php echo 'kevin patel'; ?> -->

                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="reset" value="Reset" class="login-btn btn-primary-soft btn">
                        </td>
                        <td>
                            <input type="submit" value="ADD" class="login-btn btn-primary btn">
                        </td>

                    </tr>

                    </form>
                    </tr>
                </table>

            </div>
        </center>
    </div>
    </div>


</body>

</html>