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

$myEmail = 'techsy8427@gmail.com';
$myPassword = 'TechSy#8427';

$message = "<a href= 'https://techsy-contact.herokuapp.com/varify.php?token=$token'>Click on me to varify your mail!</a>";

// checking email already exists
if(empty($name) || empty($email) && empty($mobile)){
    echo 0;
}else if(isset($name) && isset($email) && isset($mobile)){
    $sql = "SELECT * FROM `web-mail-clients` WHERE `email` = '$email' OR `mobile` = '$mobile'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        echo 1;
    }
    else if(isset($email)){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        if(sentMail($myEmail,$myPassword,$email,$token,$message)){
            $sql = "INSERT INTO `web-mail-clients`(`id`,`name`,`email`,`mobile`,`query`,`verified`,`token`) VALUES('$id','$name','$email','$mobile','$query','$varified','$token')";
            if($conn->query($sql)){
                   $msg = array(
                 "Thank you {$name}!!<br>a verification mail has sent to your email.please varify for better communication in the near future!!");
        
        $sql = "SELECT * FROM `web-mail-clients` WHERE `email` = '$email'";
         $result = $conn->query($sql);
            if($result->num_rows > 0){
            $row = $result->fetch_assoc();
        $id = array(
            $row['id']);
        $verify = array(
            $row['verified']);
        $merge = array_merge($msg,$id);
        echo json_encode($merge);
            }else{
            echo "Sorry!! please try fresh!!";
                }   
            }
        }
        
        }else{
            echo 2;
        }
    }
    
}


$conn->close();

?>
