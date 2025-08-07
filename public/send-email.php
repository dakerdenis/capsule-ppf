<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $country = $_POST["country"];
    $message = $_POST["message"];

    // SMTP Settings
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com';  // Use your Hostinger SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'form@capsuleppf.com'; // Your Hostinger email
        $mail->Password = 'Troya@9977!@#geklas'; // Your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
        $mail->Port = 465;

        // Email Setup
        $mail->setFrom($email, $name);
        $mail->addAddress("contact@capsuleppf.com"); // Receiver Email
        $mail->Subject = "New Contact Form Submission";
        $mail->isHTML(true);
        $mail->Body = "
            <h2>New Contact Request</h2>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone Number:</strong> $number</p>
            <p><strong>Country:</strong> $country</p>
            <p><strong>Message:</strong></p>
            <p>$message</p>
        ";

        $mail->send();
        echo json_encode(["success" => true, "message" => "Message sent successfully!"]);
    } catch (Exception $e) {
        echo json_encode(["success" => false, "error" => $mail->ErrorInfo]);
    }
}
?>
