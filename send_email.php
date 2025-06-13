<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Ensure this points to PHPMailer's autoload file
include("submit_appointment.php"); // Ensure you have a database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $action = $_POST['action'];

    // Validate inputs
    if (!$id || !$email || !$action) {
        echo "Invalid input.";
        exit;
    }

    // Update the appointment status in the database
    $status = ($action === 'approve') ? 'Approved' : 'Declined';
    $sql = "UPDATE hmsappoint SET status = '$status' WHERE id = $id";
    if (!mysqli_query($conn, $sql)) {
        echo "Error updating record: " . mysqli_error($conn);
        exit;
    }

    // Email subject and message
    $subject = ($action === 'approve') ? "Appointment Approved" : "Appointment Declined";
    $message = ($action === 'approve') 
        ? "Dear Patient,\n\nYour appointment has been approved.\n\nThank you." 
        : "Dear Patient,\n\nWe regret to inform you that your appointment has been declined.\n\nThank you.";

    // Send email using PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'aniljoya268@gmail.com'; // Your email address
        $mail->Password = 'xwua qlwt wmzp ufpq'; // Your email password or app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('aniljoya268@gmail.com', 'Hospital Management System');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = nl2br($message);

        $mail->send();
        echo "Email sent successfully.";
    } catch (Exception $e) {
        echo "Failed to send email. Error: {$mail->ErrorInfo}";
    }

    echo "Action completed successfully.";
    exit;
}
?>
