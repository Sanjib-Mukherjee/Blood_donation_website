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
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT password FROM user WHERE email=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $hashedPassInDB = $row['password'];


        if (password_verify($password, $hashedPassInDB)) {
            // echo "You are logged in"; // Remove this line
        
            // Add redirection to home.php
            header("Location: home.php");
            exit(); // Make sure to include an exit after header redirection
        } else {
            echo '<script>';
            echo 'alert("username and password do not match");'; // Display an alert popup
            echo '</script>';
        }
    

    } else {
        echo '<script>';
        echo 'alert("user not found");'; // Display an alert popup
        echo '</script>';
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
                    <input type="text" id="email" required name="email">
                    <label for="email">email</label>
                </div>

                <div class="inputbox">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" id="password" required name="password">
                    <label for="password">Password</label>
                </div>

                <button type="submit" class="btn" name="submit">Login</button>

                <div class="login_register">
                    <p>Don't have an Account? <a href="usersignup.php" 
                    class="signup_link">SignUp</a></p>
                </div>

            </form>
        </div>        
    </div>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>