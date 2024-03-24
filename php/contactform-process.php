<?php
$errorMSG = "";

if (empty($_POST["name"])) {
    $errorMSG .= "Name is required. ";
} else {
    $name = $_POST["name"];
}

if (empty($_POST["email"])) {
    $errorMSG .= "Email is required. ";
} else {
    $email = $_POST["email"];
}

if (empty($_POST["message"])) {
    $errorMSG .= "Message is required. ";
} else {
    $message = $_POST["message"];
}

if (!isset($_POST["terms"])) {
    $errorMSG .= "Terms checkbox must be checked. ";
} else {
    $terms = $_POST["terms"];
}

$EmailTo = "brysonodhiambo29@gmail.com";
$Subject = "New message from SteadGrow Training Institute";

// prepare email body text
$Body = "Name: $name\n";
$Body .= "Email: $email\n";
$Body .= "Message: $message\n";
$Body .= "Terms: $terms\n";

// additional headers
$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";

// send email
$success = mail($EmailTo, $Subject, $Body, $headers);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}
?>
