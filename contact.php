<?php
$db_host = "sql6.freemysqlhosting.net";
$db_user = "sql6406299";
$db_password = "JMxWR2CJrj";
$db_name = "sql6406299";

$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

if($conn->connect_error) {
    die("connection failed");
} 
else {
      echo"connected";
}

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
