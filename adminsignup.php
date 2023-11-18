<?php
if(isset($_POST['submit'])){
    $name = $_POST['username'];
    $id=$_POST['id'];
    $pass = $_POST['password'];
    $c_pass = $_POST['confirm_password'];

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'project2';

    $conn = mysqli_connect($host, $user, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if($pass==$c_pass){
    // Make sure to hash the password before inserting it into the database
    $hashedPass = password_hash($pass, PASSWORD_DEFAULT );

    // Do not store the confirm_password in the database
    // Only store the hashed password
 
    $sql = "INSERT INTO admin (name,id,password) VALUES ('$name','$id','$hashedPass')";

    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
else 
echo "enter correct password";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin SignUp</title>

    <style>
    body{
    background: url('blood2.jpg') no-repeat;
    display: flex;
    justify-content: center;
    min-height: 100vh;
    background-size: cover;
    background-position: center;
    padding-top: 40px;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif
}

.wrapper{
    position: relative;
    width: 500px;
    height: 550px;
    background: transparent;
    border: 2px solid  rgba(255, 255, 255, .5);
    border-radius: 20px;
    backdrop-filter: blur(20px);
    box-shadow: 0 0 30px rgba(0, 0, 0, .5);
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    
}


.wrapper .form-box{
    padding: 40px;
    width: 100%;
}

.wrapper .form-box.login{
    transition: transform .18s ease;
    transform: translateX(0);
}




.form-box h2{
    font-size: 2em;
    text-align: center;
    color: white;
}

.inputbox{
    position: relative;
    width: 100%;
    height: 50px;
    border-bottom: 2px solid #162831;
    margin: 30px 0;
}

.inputbox label{
    position: absolute;
    top: 50%;
    left: 5px;
    font-size: 1em;
    font-weight: 550;
    pointer-events: none;
    color: #1f2b31;
    transform: translateY(-50%);
    transition: .5s;
}

.inputbox input:focus~label,
.inputbox input:valid~label{
    top: -5px;
}

.inputbox input{
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    font-weight: 600;
    color: lightgray;
    padding: 0 35px 0 5px;
}

.inputbox .icon{
    position: absolute;
    right: 8px;
    font-size: 1.2em;
    color: #111517;
    line-height: 60px;
}

.btn{
    width: 100%;
    height: 45px;
    border: none;
    border-radius: 6px;
    outline: none;
    background-color: #8f0e2d;
    font-size: 1em;
    color: lightgray;
    font-weight: 550;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.btn:hover{
    background-color: #d4244d;
}


</style>
</head>

<body>
    <div class="wrapper">

        <!-- <span class="icon-close"><ion-icon name="close"></ion-icon></span> -->

        <div class="form-box login">

            <h2>SignUp</h2>

            <form action="#" method="post">

                <div class="inputbox">
                    <!-- <span class="icon"><ion-icon name="mail"></ion-icon></span> -->
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" required name="username">
                    <label for="name">Name</label>
                </div>
                
                <div class="inputbox">
                    <span class="icon"><ion-icon name="id-card"></ion-icon></span>
                    <input type="text" required name="id" autocomplete="off" required>
                    <label for="id">Admin ID</label>
                </div>

                <div class="inputbox">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" required name="password">
                    <label for="password">Password</label>
                </div>
                
                <div class="inputbox">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" required name="confirm_password" autocomplete="off" required>
                    <label for="cpass">Confirm Password</label>
                </div>

                <!-- <div class="remember-forgot">
                    <label for="remember_me"><input type="checkbox">Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div> -->

                <button type="submit" class="btn" name="submit">SignUp</button>

                <!-- <div class="login_register">
                    <p>Don't have an Account? <a href="signup.php" 
                    class="signup_link">SignUp</a></p>
                </div> -->

            </form>
        </div>        
    </div>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>