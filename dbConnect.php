<?php
// development connection
// $db_host = "localhost";
// $db_user = "root";
// $db_password = "";
// $db_name = "clients";

// remote connection
$db_host = "sql6.freemysqlhosting.net";
$db_user = "sql6406299";
$db_password = "JMxWR2CJrj";
$db_name = "sql6406299";

// Create Connection
$conn = new mysqli($db_host, $db_user, $db_password, $db_name);

// Check Connection
if($conn->connect_error) {
    die("connection failed");
} 
else {
      echo"connected";
}
?>