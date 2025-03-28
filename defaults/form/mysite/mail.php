<?php 
$nameErr = $emailErr = $phoneErr = $formcontentErr= $recipientErr = $subjectErr = $mailheaderErr ='';
$name = $email = $formcontent = $recipient = $subject = $mailheader = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['name'])){ // add lines 6 thru 8 if the field is required //
        $nameErr = 'Name is required';
    } else {
        $name = $_POST['name'];
        //check if name only contains letter and whitespace //
        if (!preg_match('/^[a-zA-Z]*$',$name)){
            $nameErr = 'Only letters and white space allowed';
        }
    }
echo "first done";
if (empty($_POST['email'])){ // add lines 6 thru 8 if the field is required //
        $nameErr = 'Email is required';
    } else {
$email = $_POST['email'];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $emailErr = 'Invaild Email format';
}
    }
echo "second done";
    if (empty($_POST['phone'])){ // do this if the field is not required //
        $phone = '';
    } else {
$phone = $_POST['phone'];
if (!preg_match('/^[0-9_-]*$',$phone)){
    $phoneErr = 'Please only numbers, -, and/or spaces';
    }
    }
    if (empty($_POST['message'])){
        $message = '';
    }
else {$message = $_POST['message'];}
echo "third done";
$formcontent='From: $name \n Message: $message';

$recipient = 'info@jtempest.ca';

$subject = 'Contact Form';

$mailheader = 'From: $email \r\n';
}

// function test_input($data) {
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
// return $data;
// }

mail($recipient, $subject, $formcontent, $mailheader) or die('Error!');
echo 'Thank You!';
?>
