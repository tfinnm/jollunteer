<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'libraries/phpmailer/exceptions.php';
require 'libraries/phpmailer/PHPMailer.php';
require 'libraries/phpmailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
	
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);
	
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.mail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'Jollunteer@email.com';                     // SMTP username
    $mail->Password   = '**MailPasswordGoesHere**';                               // SMTP password
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('Jollunteer@email.com', 'Jollunteer');
    $sql = "SELECT * FROM subscriptions WHERE OrgID = ".$id;
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
    // output data of each row
		while($row = $result->fetch_assoc()) {
			
			$sql2 = "SELECT * FROM user WHERE ID = ".$row["UserID"];
			$result2 = $conn->query($sql2);

			if ($result2->num_rows > 0) {
			// output data of each row
				while($row2 = $result2->fetch_assoc()) {
					$mail->addBCC($row2["email"], $row2["name"]);     // Add a recipient
				}
			} else {
				echo "0 results";
			}
		}
	} else {
		echo "0 results";
	}

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = '[Jollunteer] '.$sbjct;
    $mail->Body    = $msg;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
$conn->close();
die("<script>window.location.replace(\"index\");</script>");
?> 