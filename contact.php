<?php
include_once('dbConnect.php');

$data = stripslashes(file_get_contents("php://input"));
$custData = json_decode($data, true);

$id = $custData['id'];
$name = $custData['name'];
$email = $custData['email'];
$mobile = $custData['mobile'];
$query = $custData['query'];
$varified = false;
$token = bin2hex(random_bytes(50));

if(isset($name) && isset($email) && isset($mobile)){
     $sql = "INSERT INTO `web-mail-clients`(`id`,`name`,`email`,`mobile`,`query`,`verified`,`token`) VALUES('$id','$name','$email','$mobile','$query','$varified','$token')";

       if($conn->query($sql)){
           echo "done";
       }else{
           echo "not done";
       }
}

$conn->close();

?>
