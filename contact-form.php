<?php
if (! empty($_POST['email'])) {

	// Enable / Disable SMTP
	$enable_smtp = 'yes'; // yes OR no

	// Email Receiver Address
	$receiver_email = 'sales@niftysolutions.co.in';

	// Email Receiver Name for SMTP Email
	$receiver_name 	= 'Sales Team - Nifty Solutions';

	// Email Subject
	$subject = 'Contact form details';

	// Google reCaptcha secret Key
	$grecaptcha_secret_key = 'YOUR_SECRET_KEY';

	$from 	= $_POST['email'];
	$name 	= isset($_POST['name']) ? $_POST['name'] : '';

	// if( ! empty( $grecaptcha_secret_key ) && ! empty( $_POST['g-recaptcha-response'] ) ) {

	// 	$token = $_POST['g-recaptcha-response'];

	// 	// call curl to POST request
	// 	$ch = curl_init();
	// 	curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
	// 	curl_setopt($ch, CURLOPT_POST, 1);
	// 	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query( array( 'secret' => $grecaptcha_secret_key, 'response' => $token ) ) );
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	// 	$response = curl_exec($ch);
	// 	curl_close($ch);
	// 	$arrResponse = json_decode($response, true);

	// 	// verify the response
	// 	if( isset( $_POST['action'] ) && ! ( isset( $arrResponse['success'] ) && $arrResponse['success'] == '1' && $arrResponse['action'] == $_POST['action'] && $arrResponse['score'] = 0.5 ) ) {

	// 		echo '{ "alert": "alert-danger", "message": "Your message could not been sent due to invalid reCaptcha!" }';
	// 		die;

	// 	} else if( ! isset( $_POST['action'] ) && ! ( isset( $arrResponse['success'] ) && $arrResponse['success'] == '1' ) ) {

	// 		echo '{ "alert": "alert-danger", "message": "Your message could not been sent due to invalid reCaptcha!" }';
	// 		die;
	// 	}
	// }

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$prefix		= !empty($_POST['prefix']) ? $_POST['prefix'] : '';
		$submits	= $_POST;
		$botpassed	= false;

		$fields = array();
		foreach ($submits as $name => $value) {
			if (empty($value)) {
				continue;
			}

			$name = str_replace($prefix, '', $name);
			$name = function_exists('mb_convert_case') ? mb_convert_case($name, MB_CASE_TITLE, "UTF-8") : ucwords($name);

			if (is_array($value)) {
				$value = implode(', ', $value);
			}

			$fields[$name] = nl2br(filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS));
		}

		$response = array();
		foreach ($fields as $fieldname => $fieldvalue) {

			$fieldname = '<tr>
                                                            <td align="right" valign="top" style="border-top:1px solid #dfdfdf; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; padding:7px 5px 7px 0;">' . $fieldname . ': </td>';
			$fieldvalue = '<td align="left" valign="top" style="border-top:1px solid #dfdfdf; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#000; padding:7px 0 7px 5px;">' . $fieldvalue . '</td>
                                                    </tr>';
			$response[] = $fieldname . $fieldvalue;
		}

		$message = '<html>
			<head>
				<title>HTML email</title>
			</head>
			<body>
				<table width="50%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
				<td colspan="2" align="center" valign="top"><img style="margin-top: 15px;" src="http://www.yourdomain.com/images/logo-email.webp" ></td>
				</tr>
				<tr>
				<td width="50%" align="right">&nbsp;</td>
				<td align="left">&nbsp;</td>
				</tr>
				' . implode('', $response) . '
				</table>
			</body>
			</html>';
		// SMTP
		// Email Receiver Addresses
		$toemailaddresses = array();
		$toemailaddresses[] = array(
			'email' => $receiver_email, // Your Email Address
			'name' 	=> $receiver_name // Your Name
		);

		require 'phpmailer/Exception.php';
		require 'phpmailer/PHPMailer.php';
		require 'phpmailer/SMTP.php';
		require __DIR__ . '/config.php'; // for $smtp_credentials

		$mail = new PHPMailer\PHPMailer\PHPMailer();

		$mail->isSMTP();
		$mail->Host     = $smtp_credentials['Host']; // Your SMTP Host
		$mail->SMTPAuth = true;
		$mail->Username = $smtp_credentials['Username']; // Your Username
		$mail->Password = $smtp_credentials['Password']; // Your Password
		$mail->SMTPSecure = $smtp_credentials['SMTPSecure']; // Your Secure Connection
		$mail->Port = $smtp_credentials['Port']; // Your Port
		$mail->setFrom($smtp_credentials['Username'], 'Inquiry Form - Nifty Solutions');

		foreach ($toemailaddresses as $toemailaddress) {
			$mail->AddAddress($toemailaddress['email'], $toemailaddress['name']);
		}

		$mail->Subject = $subject;
		$mail->isHTML(true);

		$mail->Body = $message;

		if ($mail->send()) {

			//Success Message
			echo '{ "alert": "alert alert-success alert-dismissable", "message": "Your message has been sent successfully!" }';
		} else {
			//Fail Message
			echo '{ "alert": "alert alert-danger alert-dismissable", "message": "Your message could not been sent!" }';
		}
	}
} else {
	//Empty Email Message
	echo '{ "alert": "alert alert-danger alert-dismissable", "message": "Please add an email address!" }';
}
