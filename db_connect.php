<?php
$server_name = "localhost";
$user_name = "root";
$pass = "";
$db_name = "project";

$conn = mysqli_connect($server_name, $user_name, $pass, $db_name);

if (!$conn) {
    die("error" . mysqli_connect_error());
} 
// else {
//     echo "success";
// }
