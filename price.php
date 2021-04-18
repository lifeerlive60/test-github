<?php
include_once('dbConnect.php');

$data = stripslashes(file_get_contents("php://input"));
$custData = json_decode($data, true);

$id = $custData['id'];
$price = $custData['price'];
$verify = "";


if(isset($price) && isset($id)){
     $sql = "SELECT * FROM `web-mail-clients` WHERE `id` = '$id'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $sql = "UPDATE `web-mail-clients` SET `price` = '$price' WHERE `id` = '$id'";
      if($conn->query($sql)){
        echo "you've done it<br>";
        
        $conn->refresh(MYSQLI_REFRESH_TABLES);

        $update = "SELECT `verified` FROM `web-mail-clients` WHERE `id` = '$id'";
        $updateResult = $conn->query($update);

        if($updateResult->num_rows > 0){
    $row = $updateResult->fetch_assoc();
            if($row['verified'] == 1){
                echo 'thank you again for contacting us!!';
            }else{
            echo 'please verify your email id!!';        
        }
        }
        }else{
            echo "choose one pack...";
        }
        }
        }
        
        
        
       

?>

