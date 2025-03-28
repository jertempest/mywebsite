<?php
$nameErr = $emailErr = $phoneErr = $formcontentErr = $recipientErr = $subjectErr = $mailheaderErr = "no problem";
$name = $email = $formcontent = $recipient = $subject = $mailheader = "";

if (empty($_POST['name'])) {
    $nameErr = 'Name is required';
} else {
    $name = $_POST['name'];
    echo $name;
    //check if name only contains letter and whitespace //
    $nameErr = 'Only letters and white spaces allowed';
    $matches;
    if (preg_match('/^[a-z ,.\'-]+$/i', $name, $matches)) {
        $nameErr = 'this is fine';
        echo $matches[0];
    }
}
// tells you "no problem" if fine, and error if not//
echo $nameErr;
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$formcontent = "From: $name \n Message: $message";
$recipient = "info@jtempest.ca";
$subject = "Contact Form";
$mailheader = "From: $email \r\n";
// mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
// echo "Thank You!";
