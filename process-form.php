<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form fields and remove whitespace
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);

    // Set the recipient email address
    $to = "info@softlandindia.co.in";

    // Set the email subject
    $email_subject = "New Contact Form Submission: $subject";

    // Build the email message
    $email_message = "Name: $name\n\n";
    $email_message .= "Email: $email\n\n";
    $email_message .= "Message:\n\n$message";

    // Set the email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    mail($to, $email_subject, $email_message, $headers);

    // Redirect to the thank you page
    header("Location: thankyou.html");
    exit;
}
?>
