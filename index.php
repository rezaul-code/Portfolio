<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = strip_tags(trim($_POST["fullname"]));
    $fullname = str_replace(array("\r","\n"),array(" "," "),$fullname);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $mobile = trim($_POST["mobile"]);
    $message = trim($_POST["message"]);

    // Set your email address where you want to receive the message
    $recipient = "youremail@example.com";

    // Set the email subject
    $subject = "New Contact Form Submission: $fullname";

    // Build the email content
    $email_content = "Name: $fullname\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Mobile Number: $mobile\n\n";
    $email_content .= "Message:\n$message\n";

    // Build the email headers
    $email_headers = "From: $fullname <$email>";

    // Send the email
    if (mail($recipient, $subject, $email_content, $email_headers)) {
        // Redirect to thank you page
        header("Location: thank_you.html");
    } else {
        // Redirect to error page
        header("Location: error.html");
    }
} else {
    // Redirect to error page
    header("Location: error.html");
}
?>