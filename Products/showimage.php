<?php


$model = $_GET['model'];

$conn = mysqli_connect('localhost', 'Shahmir', '!234Qwer' , 'acs');
//checking connection
if(!$conn){
    echo 'Could not connect to server: '. mysqli_connect_error();
}
if ($conn->connect_error) die($conn->connect_error);

if(isset($model)){
    $query = "SELECT * FROM `products` WHERE `Model` = '$model';";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    $img_content = $row['Img_content'];
    $img_type = $row['Img_type'];
     header("Content-Type:".$img_type);
     echo $img_content;
}
else{

    echo "Did not recive image model #";
}

?>