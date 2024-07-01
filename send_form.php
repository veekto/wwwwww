<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    $to = 'victor.odah@isslng.com';
    $subject = 'Grant Application Form Submission';
    $message = '';

    foreach ($data as $key => $value) {
        if (is_array($value)) {
            $value = implode(', ', $value);
        }
        $message .= ucfirst(str_replace('_', ' ', $key)) . ": $value\n";
    }

    $headers = 'From: webmaster@example.com' . "\r\n" .
               'Reply-To: webmaster@example.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        echo 'Email sent successfully';
    } else {
        echo 'Email sending failed';
    }
}
?>
