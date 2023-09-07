<?php 
class mandrill_mail  
{

// Mandrill Mail //
public function mandrill($to_email,$to_name,$subject,$html,$type)
{
    
    $mail=new PHPMailer();
    $mail->setFrom($type,SITENAME );
    //Set an alternative reply-to address
    $mail->addReplyTo($type, SITENAME);
    //Set who the message is to be sent to
    $mail->addAddress($to_email, $to_name);
    //Set the subject line
    $mail->Subject = $subject;
    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    
    $mail->msgHTML($html);
  if ($mail->send()) {
      return true;
    }
	
}
	

}
?>