<?php



session_start();

if (isset($_POST['login'])){
    $username = $_POST['user'];
    $password = $_POST['pwd'];

    if(empty($username) || empty($password)){
        exit();
    }
    else{
        if($username == 'Shahmir' && $password == '!234Qwer'){
            $_SESSION['user'] = $username;
            $_SESSION['password'] = $password;
            header('Location: ../Home\home.php');
        
        }
        if($username == 'user' && $password == '1234qwer'){
        
        }
    } 
}

?>