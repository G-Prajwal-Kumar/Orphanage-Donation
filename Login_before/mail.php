<?php

header('location: mail_responce.php');

$to_email = "charitymanagement2022@gmail.com";
$subject = "Contact_Us";
$name_first = $_POST['first_name'];
$name_last = $_POST['last_name'];
$user_mail = $_POST['mail'];
$message = $_POST['message'];
$body = "First Name: $name_first\nLast Name: $name_last\nMail-ID: $user_mail\nMessage: $message";
$headers = "From: sender email";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}

?>