<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $your_name = htmlspecialchars(trim($_POST['your_name']));
    $phone_number = htmlspecialchars(trim($_POST['phone_number']));
    $company_name = htmlspecialchars(trim($_POST['company_name']));
    $service = htmlspecialchars(trim($_POST['service']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address.";
        exit;
    }

    // Email details
    $to = "olojedenifemi56@gmail.com";
    $subject = "New Contact Form Submission";
    $body = "Name: $your_name\n";
    $body .= "Phone Number: $phone_number\n";
    $body .= "Company Name: $company_name\n";
    $body .= "Service: $service\n";
    $body .= "Email: $email\n\n";
    $body .= "Message:\n$message\n";

    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message.";
    }
} else {
    echo "Invalid request method.";
}
?>