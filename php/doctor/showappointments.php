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
    $userid = $doctortb["DID"];
    $username = $doctortb["DNAME"];

    $q = "SELECT * FROM appointment WHERE DID='$userid'";
    $appointment = $db->query($q);

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
        <td class="menu-btn menu-icon-appoinment  menu-active menu-icon-appoinment-active">
            <a href="showappointments.php" class="non-style-link-menu non-style-link-menu-active">
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
                <td colspan="4" style="padding-top:10px;">
                    <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">All Appointments (<?php echo $appointment->num_rows; ?>)</p>
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

                                            NO

                                        </th>
                                        <th class="table-headin">
                                            Patient Name
                                        </th>
                                        <th class="table-headin">

                                            Patient Email

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

                                    $result = $db->query($q);

                                    if ($result->num_rows == 0) {
                                        echo '<tr>
                                    <td colspan="4">
                                    <br><br><br><br>
                                    <center>
                                    <img src="../../assets/img/notfound.svg" width="25%">
                                    
                                    <br>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
                                    <a class="non-style-link" href="showappointments.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Appointments &nbsp;</font></button>
                                    </a>
                                    </center>
                                    <br><br><br><br>
                                    </td>
                                    </tr>';
                                    } else {
                                        for ($x = 0; $x < $result->num_rows; $x++) {
                                            $row = $result->fetch_assoc();
                                            $no=$x+1;
                                            $pid=$row['PID'];
                                            $appointmentdate=$row['APPOINTMENT_DATE'];
                                            $appointmenttime=$row['APPOINTMENT_TIME'];
                                            $patientdata=$db->query("select * from patient Where PID='$pid'");
                                            $patienttb=$patientdata->fetch_assoc();
                                            $patientname=$patienttb['PNAME'];
                                            $patientemail=$patienttb['PEMAIL'];
                                            $patientnumber=$patienttb['PNUMBER'];
                                            echo '<tr>
                                        <td> &nbsp;' .
                                                $no
                                                . '</td>
                                        <td>
                                        ' . $patientname . '
                                        </td>
                                        <td>
                                            ' . $patientemail . '
                                        </td>

                                        <td>
                                        <div style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;">
                                        ' . $patientnumber . '
                                        </div>
                                        </td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            ' . $appointmentdate . '<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $appointmenttime . '
                                        </td>
                                    </tr>';
                                        }
                                    }

                                    ?>
                                     
                                </tbody>
                                
                            </table>
                            <tr><form method="POST" action="generatepdf.php">
                                            <td colspan="2"><input type="Submit" class="login-btn btn-primary btn btn-book" style="margin-left:300px; margin-top:50px;  padding-left: 25px;padding-right: 100px;padding-top: 10px;padding-bottom: 10px;width:50%;text-align: center;" value="Generate Report" name="generatereport" >
                                            </td>
                                            </form>
                                        </tr>
                        </div>
                    </center>
                </td>
            </tr>
<!-- <?php 
if(isset($_POST['generatereport'])){
    require('../../assets/fpdf/fpdf.php');
// Extend the FPDF class to create custom header and footer
class PDF extends FPDF {
    // Page header
    function Header() {
        // Set font
        $this->SetFont('Arial', 'B', 12);
        // Title
        $this->Cell(0, 10, 'Appointment Report', 0, 1, 'C');
        // Line break
        $this->Ln(10);
    }

    // Page footer
    function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . ' / {nb}', 0, 0, 'C');
    }
}

// Create a new PDF instance
$pdf = new PDF();

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial', '', 10);

// Fetch appointment data and add to the PDF
$queeeary = "SELECT * FROM appointment WHERE PID='16'";
$res = $db->query($q);
if ($res->num_rows > 0) {
    $row_count = 1;
    while ($ro = $res->fetch_assoc()) {
        // Add data to PDF
        $pdf->Cell(0, 10, 'Appointment ' . $row_count++, 0, 1);
        $pdf->Cell(0, 10, 'Doctor Name: ' . $ro['DID'], 0, 1);
        $pdf->Cell(0, 10, 'Specialization: ' . $ro['SID'], 0, 1);
        $pdf->Cell(0, 10, 'Fees: ' . $ro['FEES'], 0, 1);
        $pdf->Cell(0, 10, 'Appointment Date & Time: ' . $ro['APPOINTMENT_DATE'] . ' ' . $ro['APPOINTMENT_TIME'], 0, 1);
        $pdf->Ln(5); // Add some space between appointments
    }
} else {
    $pdf->Cell(0, 10, 'No appointments found.', 0, 1);
}

// Output the PDF as a file (download)
$pdf->Output('Patient_Appointment_Report.pdf', 'D');

}
?> -->


        </table>
    </div>

</body>

</html>