<?php

$Name = "Da Duder"; //senders name 
$email = "email@adress.com"; //senders e-mail adress 
$recipient = "patrickni@meikaitech.com"; //recipient 
$mail_body = "The text for the mail..."; //mail body 
$subject = "Subject for reviever"; //subject 
$header = "From: ". $Name . " <" . $email . ">\r\n"; //optional headerfields 

var_dump(mail($recipient, $subject, $mail_body, $header)); //mail command :) 

