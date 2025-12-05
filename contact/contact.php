<?php
// Change this to your Gmail (or any email you want to receive messages on)
$address = "devbabulkhan@gmail.com";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form fields
    $name    = trim($_POST['name']);
    $email   = trim($_POST['email']);
    $message = trim($_POST['message']);

    if ($name == "" || $email == "" || $message == "") {
        echo "Please fill all fields.";
        exit;
    }

    // Subject of the email
    $subject = "New Contact Form Submission from " . $name;

    // Email body
    $body  = "You have been contacted by:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Message:\n$message\n";

    // Proper headers
    $headers   = "From: $name <$email>\r\n";
    $headers  .= "Reply-To: $email\r\n";
    $headers  .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send the mail
    if (mail($address, $subject, $body, $headers)) {
        echo "Success";
    } else {
        echo "Error sending mail.";
    }
}
?>
