<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $name = htmlspecialchars($_POST['name']);
    $mobile = htmlspecialchars($_POST['mobile']);
    $message = htmlspecialchars($_POST['message']);

    // Validation
    if (!empty($name) && !empty($mobile) && !empty($message)) {
        if (preg_match('/^\d{10}$/', $mobile)) {
            // Set up email
            $to = "designer@sanctify.in";  // Replace with your email address
            $subject = "New Message from Contact Form";
            $body = "Name: $name\nMobile: $mobile\nMessage: $message";
            $headers = "From: no-reply@sanctify.in";

            // Send email
            if (mail($to, $subject, $body, $headers)) {
                // Redirect on success
                header("Location: https://www.goa.sanctify.in/contact");
                exit(); // Stop further script execution
            } else {
                echo "Sorry, there was an error sending your message. Please try again.";
            }
        } else {
            echo "Please enter a valid 10-digit mobile number.";
        }
    } else {
        echo "Please fill in all the fields.";
    }
}
?>
