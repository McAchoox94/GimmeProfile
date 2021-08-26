<?php 

require_once ("config.php");
require_once 'lib/Db.class.php';
$db = new Db();
require_once ("lib/function.php");
extract(getHttpVars());	

if( isset( $_POST['submit'])){

	$body = " \n
	<p><b>Nama:</b> {$name}\n </p>
	<p><b>Phone:</b>  {$phone}\n </p>
	<p><b>Email:</b>  {$email}\n </p>
	<p><b>Message:</b>  {$message}\n </p>
	";
	$err = "";

	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
	// Additional headers
	$headers .= 'To: '.$userName.' <'.$useremail.'>' . "\r\n";
	$headers .= 'From: '.$name.' <'.$email.'>' . "\r\n";
	//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
	//$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";
		
	 
		//define the headers we want passed. Note that they are separated with \r\n
	//	$headers = "From: ".$name." <".$email.">\r\nReply-To: ".$email."";

	if (!$err){
		
		//send the email
		$sent = mail($useremail,"Message Received from $name",$body,$headers); 
		
		if ($sent) {
				// If the message is sent successfully print
				echo "SEND$#$".stripslashes(MSG_SUCCESS_MESSAGE); 
			} else {
				// Display Error Message
				echo "NOTSENT$#$".stripslashes(MSG_SEND_ERROR); 
			}
	} else {
		echo $err; // Display Error Message
	}
}
?>