<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'project2';

$conn = mysqli_connect($host, $user, $password, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT password FROM user WHERE name=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $hashedPassInDB = $row['password'];


        if (password_verify($password, $hashedPassInDB)) {
            echo "You are logged in";
        } else {
            echo "Username and password do not match";
        }
    } else {
        echo "User not found";
    }

    mysqli_stmt_close($stmt);
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

                <button type="submit" class="btn" name="submit">Login</button>

                <div class="login_register">
                    <p>Don't have an Account? <a href="signup_user.php" 
                    class="signup_link">SignUp</a></p>
                </div>

            </form>
        </div>        
    </div>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>