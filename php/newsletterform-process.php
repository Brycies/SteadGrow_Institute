<?php
$errorMSG = "";

if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $errorMSG .= "Valid email is required. ";
} else {
    $email = $_POST["email"];
}

if (empty($_POST["terms"])) {
    $errorMSG .= "Terms must be accepted. ";
} else {
    $terms = $_POST["terms"];
}

if (empty($errorMSG)) {
    $EmailTo = "brysonodhiambo29@gmail.com";
    $Subject = "New newsletter subscription from Steadgrow Training Institute";

    // prepare email body text
    $Body = "Email: " . $email . "\n";
    $Body .= "Terms: " . $terms . "\n";

    // send email
    $headers = "From: " . $email . "\r\n" .
               "Reply-To: " . $email . "\r\n" .
               "X-Mailer: PHP/" . phpversion();
    $success = mail($EmailTo, $Subject, $Body, $headers);

    if ($success){
        echo "success";
    } else {
        echo "Something went wrong :(";
    }
} else {
    echo $errorMSG;
}
?>
