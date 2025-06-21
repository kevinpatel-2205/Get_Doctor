<?php
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

include('../database_connection.php');
if (isset($_POST['generatereport'])) {
    require('../../assets/fpdf/fpdf.php');
    // Extend the FPDF class to create custom header and footer
    class PDF extends FPDF
    {
        // Page header
        function Header()
        {
            // Set font
            $this->SetFont('Arial', 'B', 12);
            // Title
            $this->Cell(0, 10, 'All Appointment Report', 0, 1, 'C');
            // Line break
            $this->Ln(10);
        }

        // Page footer
        function Footer()
        {
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

    // Fetch appointment data and add to the PDF as a table
    $query = "SELECT * FROM appointment order by ID";
    $result = $db->query($query);
    if ($result->num_rows > 0) {
        // Table header
        $pdf->Cell(32, 10, 'APPOINTMENT ID', 1, 0, 'C');
        $pdf->Cell(34, 10, 'PATIENT NAME', 1, 0, 'C');
        $pdf->Cell(34, 10, 'DOCTOR NAME', 1, 0, 'C');
        $pdf->Cell(40, 10, 'APPOINTMENT DATE', 1, 0, 'C');
        $pdf->Cell(40, 10, 'APPOINTMENT TIME', 1, 1, 'C');

        // Table data
        $row_count = 1;
        while ($row = $result->fetch_assoc()) {
            $pid = $row['PID'];
            $pquery = "SELECT * FROM patient WHERE PID=$pid";
            $patienttb = $db->query($pquery);
            $patientttb = $patienttb->fetch_assoc();
            $did = $row['DID'];
            $dquery = "SELECT * FROM doctor WHERE DID=$did";
            $doctortb = $db->query($dquery);
            $doctorttb = $doctortb->fetch_assoc();
            $pdf->Cell(32, 10, $row['ID'], 1, 0, 'C');
            $pdf->Cell(34, 10, $patientttb['PNAME'], 1, 0, 'C');
            $pdf->Cell(34, 10, $doctorttb['DNAME'], 1, 0, 'C');
            $pdf->Cell(40, 10, $row['APPOINTMENT_DATE'], 1, 0, 'C');
            $pdf->Cell(40, 10, $row['APPOINTMENT_TIME'], 1, 1, 'C');
        }
    } else {
        $pdf->Cell(0, 10, 'No appointments found.', 0, 1);
    }

    // Output the PDF as a file (download)
    $pdf->Output('All_Appointment_Report.pdf', 'D');
}
