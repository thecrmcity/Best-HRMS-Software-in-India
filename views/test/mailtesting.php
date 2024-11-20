<?php
// Set up email parameters
$to = 'dilip.kumar@inoday.com';
$subject = 'Test Email';
$message = "Testing";
$headers = 'From: dilip.kumar@inoday.com' . "\r\n" .
    'Reply-To: dilip.kumar@inoday.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

// Send the email
$mailSent = mail($to, $subject, $message, $headers);

// Check if the email was sent successfully
if($mailSent)
{
    echo 'Email sent successfully.';
}
else
{
    echo 'Email sending failed.';
}
?>
