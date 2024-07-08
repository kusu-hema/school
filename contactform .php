<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Adjust the path to autoload.php based on your project

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assign POST data to variables
    $Name = $_POST['contactname'] ?? '';
    $email = $_POST['contactemail'] ?? '';
    $subject = $_POST['contactSubject'] ?? '';
    $number = $_POST['contactnumber'] ?? '';
    $message = $_POST['contactmessage'] ?? '';

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings for Gmail SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'preacherstrainingschool@gmail.com'; // Your Gmail email address
        $mail->Password = 'odfpfchyvbvwtnue'; // Your Gmail password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('preacherstrainingschool@gmail.com', 'PREACHERS TRAINING SCHOOL'); // Your Gmail email and name
        $mail->addAddress('preacherstrainingschool@gmail.com', 'PT School'); // Recipient's email and name

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Message from Contact Form';
        $mail->Body = "
            <h1>Contact Details</h1>
            <p><strong>Name:</strong> $Name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Subject:</strong> $subject</p>
            <p><strong>Phone:</strong> $number</p>
            <p><strong>Message:</strong> $message</p>
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
