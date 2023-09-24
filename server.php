<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST["First_name"];
    $lastName = $_POST["Last_name"];
    $email = $_POST["Email"];
    $subject = $_POST["Subject"];
    $message = $_POST["Message"];
    
    // Validate email format and required fields (add more validation as needed)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($firstName) || empty($subject) || empty($message)) {
        echo "Invalid form data. Please check your inputs.";
    } else {
        $to = "animsaha16@gmail.com"; // Your email address
        $subject = "Contact Form Submission: $subject";
        $headers = "From: $email";
        
        // Send email using SMTP (example using PHPMailer)
        require 'PHPMailer/PHPMailerAutoload.php'; // Include PHPMailer library
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'animsaha16@gmail.com';
        $mail->Password = 'eubd rgok othy zsly';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        
        $mail->setFrom($email);
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body = $message;
        
        if ($mail->send()) {
            echo "Message sent successfully!";
        } else {
            echo "Message could not be sent. Please try again later.";
        }
    }
}
?>
