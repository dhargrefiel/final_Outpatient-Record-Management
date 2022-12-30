<?php

require('fpdf185/fpdf.php');
require_once "mainBackend.php";
$outpatient = new Hardware();
$patientRecords = $outpatient->getPatientRecord();
$patientFindings = $outpatient->getPatientFindings();
$findingsRecords = $outpatient->findingsRecord();

class PDF extends FPDF {

	// Page header
	function Header() {
		
		// GFG logo image
        $this->Image('logo.png', 30, 8, 20);
          
        // GFG logo image
        $this->Image('logo.png', 160, 8, 20);
          
        // Set font-family and font-size
        $this->SetFont('Times','B',20);
          
        // Move to the right
        $this->Cell(80);
          
        // Set the title of pages.
        $this->Cell(30, 7, 'Arendelle Memorial Hospital', 0, 0, 'C');
       
        // Set it new line
        $this->Ln();
        
        // Set font format and font-size
        $this->SetFont('Times', 'B', 12);
        
        // Framed rectangular area
        $this->Cell(180, 10, 'Out Patient Findings', 0, 0, 'C');

        // Set it new line
        $this->Ln();
        
        $this->Line(20, 35, 212-20, 35);

        // Break line with given space
        $this->Ln(9);
	}

	// Page footer
	function Footer() {
		
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
		
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		
		// Page number
		$this->Cell(0,10,'Page ' .
			$this->PageNo() . '/{nb}',0,0,'C');
	}
}


// Instantiation of FPDF class
$pdf = new PDF();

// Define alias for number of pages
$pdf->AliasNbPages();
$pdf->AddPage();

// Prints a cell with given text 
$pdf->Cell(10);
$pdf->SetFont('Times','',9);
$pdf->Cell(60,20,'Case Number:');
$pdf->Cell(70);
$pdf->Cell(60,20,'Date Consulted:');
$pdf->Ln(5);

$pdf->Cell(10);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(60,20, $patientRecords['pr_id']);
$pdf->Cell(70);
$pdf->Cell(60,20,$findingsRecords['f_date']);
$pdf->Ln(10);

// Prints a cell with given text 
$pdf->Cell(10);
$pdf->SetFont('Times','',9);
$pdf->Cell(60,20,'Patient Name:');
$pdf->Ln(5);
$pdf->Cell(10);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(60,20,$patientRecords['pr_fname']." ".$patientRecords['pr_mname']." ".$patientRecords['pr_lname']);
$pdf->Ln(10);

// Prints a cell with given text 
$pdf->Cell(10);
$pdf->SetFont('Times','',9);
$pdf->Cell(60,20,'History of Present Illnesses:');
$pdf->Ln(5);
$pdf->Cell(10);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(60,20, $findingsRecords['f_historypresentillness']);
$pdf->Ln(10);

// Prints a cell with given text 
$pdf->Cell(10);
$pdf->SetFont('Times','',9);
$pdf->Cell(50,20,'Blood Pressure:');
$pdf->Cell(15);
$pdf->Cell(50,20,'Respiratory Rate:');
$pdf->Cell(15);
$pdf->Cell(50,20,'Capillary Level:');

$pdf->Ln(5);

// Prints a cell with given text 
$pdf->Cell(10);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,20, $findingsRecords['f_bp']);
$pdf->Cell(15);
$pdf->Cell(50,20, $findingsRecords['f_rr']);
$pdf->Cell(15);
$pdf->Cell(50,20, $findingsRecords['f_cr']);
$pdf->Ln(10);

// Prints a cell with given text 
$pdf->Cell(10);
$pdf->SetFont('Times','',9);
$pdf->Cell(50,20,'Temperature:');
$pdf->Cell(15);
$pdf->Cell(50,20,'Pulse Rate');
$pdf->Cell(15);
$pdf->Cell(50,20,'Weight');
$pdf->Ln(5);

// Prints a cell with given text 
$pdf->Cell(10);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(50,20,$findingsRecords['f_temp']);
$pdf->Cell(15);
$pdf->Cell(50,20,$findingsRecords['f_pr']);
$pdf->Cell(15);
$pdf->Cell(50,20,$findingsRecords['f_wt']);
$pdf->Ln(10);

// Prints a cell with given text 
$pdf->Cell(10);
$pdf->SetFont('Times','',9);
$pdf->Cell(60,20,'Diagnosis');
$pdf->Ln(5);
$pdf->Cell(10);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(60,20, $findingsRecords['f_diagnosis']);
$pdf->Ln(10);

// Prints a cell with given text 
$pdf->Cell(10);
$pdf->SetFont('Times','',9);
$pdf->Cell(60,20,'Physical Examination');
$pdf->Ln(5);
$pdf->Cell(10);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(60,20, $findingsRecords['f_physicalexam']);
$pdf->Ln(10);


// Prints a cell with given text 
$pdf->Cell(10);
$pdf->SetFont('Times','',9);
$pdf->Cell(60,20,'Medication/Treatment');
$pdf->Ln(5);
$pdf->Cell(10);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(60,20, $findingsRecords['f_medication']);
$pdf->Ln(10);

// Prints a cell with given text 
$pdf->Cell(10);
$pdf->SetFont('Times','',9);
$pdf->Cell(60,20,'Chief Complaint');
$pdf->Ln(5);
$pdf->Cell(10);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(60,20, $findingsRecords['f_chiefcomplaint']);
$pdf->Ln(10);

// Prints a cell with given text 
$pdf->Cell(10);
$pdf->SetFont('Times','',9);
$pdf->Cell(60,20,'Attending Physician');
$pdf->Ln(5);
$pdf->Cell(10);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(60,20, "Dr. ".$findingsRecords['f_nameofphysician']);
$pdf->Ln(10);

$pdf->Output();

?>
