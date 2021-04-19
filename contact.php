<?php

$db_host = "sql6.freemysqlhosting.net";
$db_user = "sql6406299";
$db_password = "JMxWR2CJrj";
$db_name = "sql6406299";

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check Connection
if($conn->connect_error) {
    die("connection failed");
} 
else {
      echo"connected";
}

$myEmail = 'techsy8427@gmail.com';
$myPassword = 'TechSy#8427';
$email = 'sreya8427@gmail.com';

if(sentMail($myEmail,$myPassword,$email)){
    echo "mail sent";
}else{
    echo "massage could not be sent!!";
}



function sentMail($myEmail,$myPassword,$email){

    $mail = new PHPMailer;

$mail->isSMTP();          

$mail->Host = 'smtp.gmail.com'; 
$mail->SMTPAuth = true;         
$mail->Username = $myEmail; 
$mail->Password = $myPassword;     
$mail->SMTPSecure = 'tls';               
$mail->Port = 587;                       

$mail->setFrom($myEmail, 'TechSy');
$mail->addAddress($email);     

$mail->isHTML(true);           

$mail->Subject = 'Hi!! Please varify me!!';
$mail->Body    = 'Thank you!';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}


}


$conn->close();

?>