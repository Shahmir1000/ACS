<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
     <!--Import Google Icon Font-->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

     <title>Ambiant Control Systems</title>
</head>
<body class="white">

    <nav class="nav-wrapper black" id="bar">
        <div class="container ">
            <a href="#" class="brand-logo" >
                <img src="../Images\Logo.PNG" alt="Ambiant Control Systems" width = 170 background-size: cover >
            </a>
            <a href="#" class="sidenav-trigger" data-target="slide-out">
                <i class="material-icons">menu</i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li><a href="../Home" class="hoverable waves-effect waves-light">Home</a></li>
                <li><a href="../Products" class="hoverable waves-effect waves-light">Products</a></li>
                <li><a href="../Reviews" class="hoverable waves-effect waves-light">Reviews</a></li>
                <li><a href="../Contact Us" class="hoverable waves-effect waves-light">Contact Us</a></li>
                <li><a href="../Career" class="hoverable waves-effect waves-light">Career</a></li>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="slide-out">
        <li><a href="../Home" class="waves-effect">Home</a></li>
        <li><a href="../Products" class="waves-effect">Products</a></li>
        <li><a href="../Reviews" class="waves-effect">Reviews</a></li>
        <li><a href="../Contact Us" class="waves-effect">Contact Us</a></li>
        <li><a href="../Career" class="waves-effect">Career</a></li>
        
    </ul>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    
    <script>
        $(document).ready(function(){
            $('.sidenav').sidenav();
        })
    </script>
    
</body>
</html>