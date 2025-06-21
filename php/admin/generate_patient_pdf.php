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
            $this->Cell(0, 10, 'All Patient Report', 0, 1, 'C');
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
    $query = "SELECT * FROM patient order by PID";
    $result = $db->query($query);
    if ($result->num_rows > 0) {
        // Table header
        $pdf->Cell(10, 10, 'PID', 1, 0, 'C');
        $pdf->Cell(40, 10, 'PATIENT NAME', 1, 0, 'C');
        $pdf->Cell(60, 10, 'PATIENT EMAIL', 1, 0, 'C');
        $pdf->Cell(40, 10, 'PATIENT NUMBER', 1, 0, 'C');
        $pdf->Cell(40, 10, 'ADDRESS', 1, 1, 'C');

        // Table data
        $row_count = 1;
        while ($row = $result->fetch_assoc()) {

            $pdf->Cell(10, 10, $row['PID'], 1, 0, 'C');
            $pdf->Cell(40, 10, $row['PNAME'], 1, 0, 'C');
            $pdf->Cell(60, 10, $row['PEMAIL'], 1, 0, 'C');
            $pdf->Cell(40, 10, $row['PNUMBER'], 1, 0, 'C');
            $pdf->Cell(40, 10, $row['PADDRESS'], 1, 1, 'C');
        }
    } else {
        $pdf->Cell(0, 10, 'No appointments found.', 0, 1);
    }

    // Output the PDF as a file (download)
    $pdf->Output('All_Patient_Report.pdf', 'D');
}
