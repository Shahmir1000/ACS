<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <footer class="page-footer grey darken-4">
            <div class="container">
                <div class="row">
                    <div class="col s12 l4 ">
                        <h5>Ambiant Control System</h5>
                        <p>If you are warm in the summer and need cooling or if you are cold in the winter
                            and need heating, call us! We pride our selves on providing quality service
                            at a fair price.</p>
                    </div>
                    
                    <div class="col s12 l4 push-l1">
                    <h5>Contact US</h5>
                        <li><a href="tel:647-291-8920">Call: 647-648-2294</a></li>
                        <li><a href="mailto: Shahid87ca@yahoo.com">Email: Shahid87ca@yahoo.ca</a></li>
                        <li><a href="https://www.facebook.com/ACSHELPS/?ref=page_internal">Facebook</a></li>
                    </div>
                    <div class="col s12 l4 push-l1">
                        <h5>Employee Login</h5>

                        <?php
                            

                            if(isset($_SESSION['user'])){
                                echo '
                                    <form method="POST"  action="../Page layout\logout.php" name="emp-logout" id="emp-logout">
                                        <button class="btn waves-effect waves-light hoverable blue darken-4" type="submit" form="emp-logout" name="logout" id="logout" value="logout">
                                                <span class="white-text">Logout</span>
                                        </button>
                                    </form>
                                ';
                            }
                            else{
                                echo '
                                <form method="POST" action="../Page layout\login.php" id="emp-login" name="emp-login">
                                    <div class="input-field">
                                    
                                        <label for="user">Username</label>                            
                                        <input type="text" name="user" id="user" class="white-text">
    
                                    </div>
    
                                    <div class="input-field">
                                        <label for="pwd" >Password</label>
                                        <input type="password" name="pwd" id="pwd" class="white-text">
                                    </div>
                                    <div class="input-field">
    
                                        <button class="btn waves-effect waves-light hoverable blue darken-4" type="submit" form="emp-login" name="login" id="login" value="login">
                                            <span class="white-text">Login</span>
                                        </button>
                                    </div>
                                </form>
                                ';
                            }

                        ?>
                        
                    </div>
                </div>
            </div>
    </footer>
</body>
</html>
