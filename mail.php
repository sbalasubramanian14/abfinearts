<?php
$to      = 'sbalasubramanian96@gmail.com';
$subject = 'subject';
$message = 'message';
$headers = 'From: sbalasubramanian96@gmail.com' . "\r\n" .
    'Reply-To: sbalasubramanian96@gmail.com' . "\r\n";

mail($to, $subject, $message, $headers);
?> 