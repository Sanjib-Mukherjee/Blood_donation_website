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
    $id = $_POST['id'];
    $password = $_POST['password'];

    $sql = "SELECT password FROM admin WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        $hashedPassInDB = $row['password'];


        
        if (password_verify($password, $hashedPassInDB)) {
            // echo "You are logged in"; // Remove this line
        
            // Add redirection to home.php
            header("Location: welcome_v2.html");
            exit(); // Make sure to include an exit after header redirection
        } else  {
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
    <title>Admin SignUp</title>

    <style>
    body{
    background: url('bloodplatelets2.jpg') no-repeat;
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
    width: 400px;
    height: 450px;
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
    color: white;
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
    background-color: #380707;
    font-size: 1em;
    color: white;
    font-weight: 550;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.btn:hover{
    background-color: #a87705;
}

.login_register{
    font-size: .9em;
    text-align: center;
    font-weight: 900;
    color: white;
    margin: 25px 0 10px;
    padding-bottom: 10px;
}

.login_register p a{
    color: white;
    text-decoration: none;
    font-weight: 900;
}

.login_register p a:hover{
    text-decoration: underline;
}

</style>
</head>

<body>
    <div class="wrapper">

        <!-- <span class="icon-close"><ion-icon name="close"></ion-icon></span> -->

        <div class="form-box login">

            <h2>Login</h2>

            <form action="#" method="post">
                
                <div class="inputbox">
                    <span class="icon"><ion-icon name="id-card"></ion-icon></span>
                    <input type="text" required name="id" autocomplete="off" required>
                    <label for="id">Admin ID</label>
                </div>

                <div class="inputbox">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" required name="password" id="password">
                    <label for="password">Password</label>
                </div>
                

                <button type="submit" class="btn" name="submit">Login</button>

                <div class="login_register">
                    <p>Don't have an Account? <a href="adminsignup.php" 
                    class="signup_link">SignUp</a></p>
                </div>

            </form>
        </div>        
    </div>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>