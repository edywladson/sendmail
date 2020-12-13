<?php
require __DIR__ . "/../vendor/autoload.php";

use EdyWladson\SendMail\SendMail;

//Config
$sendmail = new SendMail(
    "Host",
    "Port",
    "User",
    "Pass",
    "Lang", //default "en"
    "Secure", //default "tls"
    "Charset", //default "utf-8"
    "Html", //default "true"
    "Auth", //defautl "true"
);

//Mail Data
$sendmail->mail(
    "Subject",
    "Body",
    "Recipient Mail",
    "Recipient Name"
);

//Test and Result
if (!$sendmail->send("From Mail", "From Name")) {
    echo $sendmail->message();
} else {
    echo "Email successfully sent!";
}
