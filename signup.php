<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username Cannot be Blank";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn,$sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $parameter_uname);
            
            //set the value of parameter username
            $parameter_uname = trim($_POST['username']);

            //executing this statement
            if(mysqli_stmt_execute($stmt))
            {
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This Username is Already Taken";
                }
                else
                {
                    $username = trim($_POST['username']);
                }
            }
            else
            {
                echo "Something went Wrong";
            }
        }
    }
    mysqli_stmt_close($stmt);
    
//check if password is empty
if(empty(trim($_POST['password'])))
{
    $password_err = "Password Cannot be Blank";
}
elseif (strlen(trim($_POST['password'])) < 5 ) 
{
    $password_err = "Password Can't be less than 5 characters";
}
else
{
    $password = trim($_POST['password']);
}

//check for confirm password
if(trim($_POST['password']) != trim($_POST['confirm_password']))
{
    $password_err = "Password Should Match";
}

//If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO users  (username, password) VALUES (?,?)";
    $stmt = mysqli_prepare($conn, $sql);
    if($stmt) 
    {
        mysqli_stmt_bind_param($stmt, "ss", $param_uname, $param_pass);

        //set the parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        //trying to execute the query
        if(mysqli_stmt_execute($stmt))
        {
            header("location: login.php");
        }
        else
        {
            echo "Something went Wrong...Cannot Redirect !!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="signup.css">
    
</head>
<body>
<div class="wrapper">

<span class="icon-close"><ion-icon name="close"></ion-icon></span>


        <div class="form-box signup">

            <h2>SignUp</h2>

            <form action="#" method="post">

                <div class="inputbox">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" required name="username">
                    <label for="username">Username</label>
                </div>

                <div class="inputbox">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" required name="password">
                    <label for="password">Password</label>
                </div>

                <div class="inputbox">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" required name="confirm_password">
                    <label for="cpass">Confirm Password</label>
                </div>

                <div class="terms_cond">
                    <label for="tnc"><input type="checkbox">I agree to the Terms & Conditions</label>
                    
                </div>

                <button type="submit" class="btn">SignUp</button>

                <div class="login_register">
                    <p>Already have an Account? <a href="login.php" 
                    class="login_link">Login</a></p>
                </div>

            </form>
        </div> 
</div>




<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>