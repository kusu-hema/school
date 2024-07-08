<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use TCPDF;

require 'vendor/autoload.php'; // Adjust the path to autoload.php based on your project
// Custom TCPDF class to remove the header
class MYPDF extends TCPDF
{
    // Page header
    public function Header()
    {
        // No header content
    }
}
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assign POST data to variables
    $FullName = $_POST['FullName'] ?? '';
    $Admission = $_POST['Admission'] ?? '';
    $DateOfBirth = $_POST['DateOfBirth'] ?? '';
    $age = $_POST['age'] ?? '';
    $FatherName = $_POST['FatherName'] ?? '';
    $Married = $_POST['Married'] ?? '';
    $EducationalQualification = $_POST['EducationalQualification'] ?? '';
    $Occupation = $_POST['Occupation'] ?? '';
    $churchname = $_POST['churchname'] ?? '';
    $police = $_POST['police'] ?? '';
    $aim = $_POST['aim'] ?? '';
    $Address = $_POST['Address'] ?? '';


    // Create a new PDF document
    $pdf = new MYPDF();
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('PREACHERS TEACHING SCHOOL');
    $pdf->SetTitle('Admission Form');
    $pdf->SetSubject('Admission Details');
    $pdf->SetKeywords('TCPDF, PDF, admission, form, details');

    // Set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

    // Set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(0);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // Set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

    // Set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // Add a page
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('helvetica', '', 12);
    $pdf->SetY(10); // Adjust this value to move the title higher or lower

    // Add the main heading
    $pdf->SetFont('helvetica', 'B', 20);
    $pdf->Cell(0, 10, 'PREACHERS TEACHING SCHOOL', 0, 1, 'C');


    // Add a title
    $pdf->SetFont('helvetica', 'B', 16);

    // Decrease space above the title
    $pdf->Ln(2); // Adjust the space above the title here

    // Add the title
    $pdf->Cell(0, 10, ' Admission For Into CALVIN WOMEN Telugu Medium BIBLE Training', 0, 1, 'C');

    // Increase space below the title
    $pdf->Ln(15); // Adjust the space below the title here


    // Add Admission No and Year with space for filling details
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(0, 0, 'Admission No: ' . str_repeat('_', 20), 0, 0, 'L');
    $pdf->Cell(0, 0, 'Year: ' . str_repeat('_', 10), 0, 1, 'R');


    // Add content with custom styling
    $pdf->SetFont('helvetica', '', 12);
    $html = "
    <style>
        h1 {
            color: #333333;
            font-family: helvetica;
            font-size: 24px;
            text-align: center;
        }
        .details{
            color: #000000;
            font-family: helvetica;
            font-size: 15px;
            
        }

        .label {
            font-weight: bold;
            color:red;           
        }
        
        .bottom-border {
            border-bottom: 1px solid #000000;
            display: inline-block;
            width: 100%;
        }
    </style>
    
    <div class='row'>
          <p class='details'>
            <span class='label'
              >Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span
            >
            <span class='bottom-border'>$FullName</span>
          </p>

          <p class='details'>
            <span class='label'
              >Admission
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   :
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span
            >

            <span class='bottom-border'>$Admission</span>
          </p>

          <p class='details'>
            <span class='label'
              >Date Of Birth &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
              : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span
            >
            <span class='bottom-border'>$DateOfBirth</span>
          </p>

          <p class='details'>
            <span class='label'
              >Age
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span
            >
            <span class='bottom-border'>$age</span>
          </p>

          <p class='details'>
            <span class='label'
              >Father Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   :
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span
            >
            <span class='bottom-border'>$FatherName</span>
          </p>

          <p class='details'>
            <span class='label'
              >Married &nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  :
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span
            >
            <span class='bottom-border'>$Married</span>
          </p>
 

          <p class='details'>
            <span class='label'
              >Educational Qualification &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
               :
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </span>
            <span class='bottom-border'>$EducationalQualification</span>
          </p>

          <p class='details'>
            <span class='label'
              >Occupation
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span
            >
            <span class='bottom-border'>$Occupation</span>
          </p>

          <p class='details'>
            <span class='label'
              >Which Church Do You Belong
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
             
              : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span
            >
            <span class='bottom-border'>$churchname</span>
          </p>

          <p class='details'>
            <span class='label'
              >Involved In Police Matters
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               :
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span
            >
            <span class='bottom-border'>$police</span>
          </p>

          <p class='details'>
            <span class='label'
              >Aim To Join &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 

              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span
            >
            <span class='bottom-border'>$aim</span>
          </p>

          

          <p class='details'>
            <span class='label'
              >Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span
            >
            <span class='bottom-border'>$Address</span>
          </p>

          <br>
          <br>
          <br>

          <p> <strong> NOTE: </strong> Seeking Admission Into 2 Years</p>
          <p> <strong> NOTE: </strong> No Admission Without Original Certificates At The Time Of Admission</p>

    </div>
    ";

    $pdf->writeHTML($html, true, false, true, false, '');
    // Add Date and Place on the left side

    // Add Date and Place on the left side
    $pdf->SetXY(PDF_MARGIN_LEFT, $pdf->GetY() + 10); // Adjust X and Y coordinates as needed
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(0, 0, 'Date: ' . str_repeat('_', 20), 0, 0, 'L'); // Use 0 instead of 1 for inline
    $pdf->SetX($pdf->GetPageWidth() - PDF_MARGIN_RIGHT - 60);
    $pdf->Cell(0, 0, 'Signature: ' . str_repeat('_', 20), 0, 1, 'L'); // Use 0 instead of 1 for inline

    // Add signature on the right side
    $pdf->SetXY(PDF_MARGIN_LEFT, $pdf->GetY() + 10); // Move down from the last position
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(0, 0, 'Place: ' . str_repeat('_', 20), 0, 1, 'L'); // Use 0 instead of 1 for inline



    // Generate PDF as a string
    $pdfString = $pdf->Output('CALVIN_WOMEN_Telugu_Medium_BIBLE_Training.pdf', 'S');

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings for Gmail SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'rameshpilli1428@gmail.com'; // Your Gmail email address
        $mail->Password = 'exnevxtbcltgmece'; // Your Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('rameshpilli1428@gmail.com', 'PREACHERS TRAINING SCHOOL'); // Your Gmail email and name
        $mail->addAddress('rameshpilli1428@gmail.com', 'PT School'); // Recipient's email and name

        // Attach the PDF
        $mail->addStringAttachment($pdfString, 'CALVIN_WOMEN_Telugu_Medium_BIBLE_Training.pdf');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Application  For Admission Into CALVIN WOMEN Telugu Medium BIBLE Training';
        $mail->Body = "
            <h1>Student Details</h1>
            <p><strong>Full Name: </strong>  $FullName</p>
            <p><strong> Admission:</strong> $Admission</p>
            <p><strong>Date Of Birth:</strong> $DateOfBirth</p>
            <p><strong>Age:</strong> $age</p>
            <p><strong>FatherName:</strong>$FatherName</p>
            <p><strong>Married:</strong> $Married</p>
            <p><strong>Educational Qualification:</strong> $EducationalQualification</p>
            <p><strong>Occupation:</strong> $Occupation</p>
            <p><strong>Which Church Do You Belong:</strong> $churchname</p>
            <p><strong>Involved In Police Matters:</strong> $police</p>
            <p><strong>Aim To Join :</strong> $aim</p>          
            <p><strong>Address:</strong> $Address</p>
        ";

        $mail->send();
        echo '<script> window.alert("Message has been sent.\n\nPlease click OK."); window.location.href="index.php";</script>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    // If accessed directly without POST data
    echo 'Access Denied';
}
