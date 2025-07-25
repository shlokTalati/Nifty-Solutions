<?php
// 1) Load PHPMailer (v5) autoloader
require __DIR__ . '/smtp/PHPMailerAutoload.php';
require __DIR__ . '/config.php'; // for $config['smtp']

// 2) Grab form data
//    (we trust you filled in every field—no extra validation here)
$name         = $_POST['name'];
$mobile       = $_POST['mobile'];
$email        = $_POST['email'];
$message      = $_POST['message'];

// 3) Configure & send
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host       = $smtp_credentials['Host'];         // your SMTP server
$mail->SMTPAuth   = true;
$mail->Username   = $smtp_credentials['Username'];   // ← replace with your address
$mail->Password   = $smtp_credentials['Password'];      // ← replace with your app‑specific password
$mail->SMTPSecure = $smtp_credentials['SMTPSecure'];
$mail->Port       = $smtp_credentials['Port'];

$mail->setFrom($smtp_credentials['Username'], 'Website Inquiry');  // same as Username is fine
$mail->addAddress('shloktalati@niftysolutions.co.in');              // ← where you want inquiries sent

$mail->isHTML(true);
$mail->Subject = 'New Inquiry from Website';
$mail->Body    = "
  <p><strong>Name:</strong> {$name}</p>
  <p><strong>Mobile:</strong> {$mobile}</p>
  <p><strong>Email:</strong> {$email}</p>
  <p><strong>Message:</strong><br>{$message}</p>
";

if (! $mail->send()) {
    // SMTP failure
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    // Success!
    // Redirect to the contact page with a success message
    header('Location: /contact-us?status=success');
    exit;
}
