<?php
require 'PHPMailer/PHPMailerAutoload.php';

function clean_text($string)
{
	$string = trim($string);
	$string = stripcslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}

$name = clean_text($_POST["name"]);
$email = clean_text($_POST["email"]);
$subject = clean_text($_POST["subject"]);
$mobile = clean_text($_POST["mobile"]);
$message = clean_text($_POST["message"]);

if(isset($_POST["submit"]))
{

	$mail = new PHPMailer;

	$mail->isSMTP();                                   // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                            // Enable SMTP authentication
	$mail->Username = 'sbala.spiderman@gmail.com';          // SMTP username
	$mail->Password = 'balasubramanian'; // SMTP password
	$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;                                 // TCP port to connect to

	$mail->setFrom($email, 'ArunBal-FineArts Website');
	$mail->addReplyTo($email, 'ArunBal-FineArts Website');
	$mail->addAddress('sbalasubramanian96@gmail.com');   // Add a recipient
	//$mail->addCC('cc@example.com');
	//$mail->addBCC('bcc@example.com');

	$mail->isHTML(true);  // Set email format to HTML

	$bodyContent = '<br>Name       : <strong>'.$name.'</strong><br>Contact No : <strong>'.$mobile.'</strong><br><br>'.$message;

	$mail->Subject = $subject;
	$mail->Body    = $bodyContent;

	if(!$mail->send()) 
	{
			//echo 'Internal error : Please try again in few minutes';
		echo "<script>
		alert('Internal error : Please try again in few minutes.');
		window.location.href='index.php';
		</script>";
		//echo 'Mailer Error: ' . $mail->ErrorInfo;
	} 
	else 
	{
		//echo 'Thanks for contacting us. Your message has been sent. Our Executives will contact you shortly';
		echo "<script>
		alert('Thanks for contacting us. Your message has been sent. Our Executives will contact you shortly.');
		window.location.href='index.php';
		</script>";
	}
}
else
	echo 'Not a valid call';
?>
