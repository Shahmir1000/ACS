<?php
if(session_id() == ''){
    session_start();
}
$host = 'localhost';
$user = $_SESSION['user'];
$password = $_SESSION['password'];
$database = 'acs';
//Connecting to database
$conn = mysqli_connect($host, $user, $password , $database);
//checking connection
if(!$conn){
    echo 'Could not connect to server: '. mysqli_connect_error();
}
if ($conn->connect_error) die($conn->connect_error); 


?>