<?php
//this script will handle login
session_start();

//check if the user is already logged in
if(isset($_SESSION['username']))
{
    header("Location: welcome.php");
    exit;
}
require_once "config.php";

$username = $password = "";
$err = "";

//if reuest method is post
if($_SERVER['REQUEST_METHOD'] == "POST")
{
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please Enter your Username & Password";
    }
    else
    {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }

    if (empty($err)) 
    {
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $param_username);
        $param_username = $username; //setting the valuem of param_username

        //executing this statement
        if(mysqli_stmt_execute($stmt))
        {
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            //this means the password is correct. Allow user to login
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;
                            
                            //redirect user to welcomem page
                            header("Location: welcome.php");
                        }
                    }
                

                }
        }   
    }

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    
</head>
<body>
    <div class="wrapper">

        <span class="icon-close"><ion-icon name="close"></ion-icon></span>

        <div class="form-box login">

            <h2>Login</h2>

            <form action="#" method="post">

                <div class="inputbox">
                    <!-- <span class="icon"><ion-icon name="mail"></ion-icon></span> -->
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" required name="username">
                    <label for="uname">Username</label>
                </div>

                <div class="inputbox">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" required name="password">
                    <label for="password">Password</label>
                </div>

                <div class="remember-forgot">
                    <label for="remember_me"><input type="checkbox">Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>

                <button type="submit" class="btn">Login</button>

                <div class="login_register">
                    <p>Don't have an Account? <a href="signup.php" 
                    class="signup_link">SignUp</a></p>
                </div>

            </form>
        </div>        
    </div>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>