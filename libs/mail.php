<?php 
	
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

	class Mail
	{
		static function send ($to, $message)
		{
			$mail = new PHPMailer(true);

			$mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication
		    $mail->Username = 'a.svistopljasov88@gmail.com';                 // SMTP username
		    $mail->Password = '8686877';                           // SMTP password
		    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = 587;                                    // TCP port to connect to

		    //Recipients
		    $mail->setFrom('a.svistopljasov88@gmail.com', 'Victor');
		    $mail->addAddress($to);     // Add a recipient
		    #$mail->addReplyTo('info@example.com', 'Information');
		    // $mail->addCC('cc@example.com');
		    // $mail->addBCC('bcc@example.com');

		    //Attachments
		    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		    //Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'Here is the subject';
		    $mail->Body    = $message;
		    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		    $mail->send();

		    
	}
	
}


 ?>