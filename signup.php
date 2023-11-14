<?php
if(isset($_POST['submit'])){
    $name = $_POST['username'];
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
    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

    // Do not store the confirm_password in the database
    // Only store the hashed password
 
    $sql = "INSERT INTO sign_up (name, password) VALUES ('$name', '$hashedPass')";

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
    <title>SignUp</title>
    <link rel="stylesheet" href="signup.css">
    
</head>
<body>
<div class="wrapper">

<!-- <span class="icon-close"><ion-icon name="close"></ion-icon></span> -->


        <div class="form-box signup">

            <h2>SignUp</h2>

            <form action="#" method="post">
                
                <div class="inputbox">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" required name="name" autocomplete="off" required>
                    <label for="username">Name</label>
                </div>    

                <div class="inputbox">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="text" required name="email" autocomplete="off" required>
                    <label for="username">Email</label>
                </div>

                <!-- <div class="inputbox">
                    <span class="icon"><ion-icon name="call"></ion-icon></span>
                    <input type="text" required name="phn_no" autocomplete="off" required>
                    <label for="username">Phone no</label>
                </div>

                <div class="inputbox">
                    <span class="icon"><ion-icon name="calendar"></ion-icon></span>
                    <input type="text" required name="dob" autocomplete="off" required>
                    <label for="username">DOB</label>
                </div> -->

                <!-- <div class="inputbox">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" required name="username" autocomplete="off" required>
                    <label for="username">Username</label>
                </div> -->

                <div class="inputbox">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" required name="password" autocomplete="off" required>
                    <label for="password">Password</label>
                </div>

                <div class="inputbox">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" required name="confirm_password" autocomplete="off" required>
                    <label for="cpass">Confirm Password</label>
                </div>

                <div class="terms_cond">
                    <label for="tnc"><input type="checkbox">I agree to the Terms & Conditions</label>
                    
                </div>

                <button type="submit" class="btn" name="submit">SignUp</button>

                <div class="login_register">
                    <p>Already have an Account? <a href="login.php" 
                    class="login_link">Login</a></p>
                </div>

            </form>
        </div> 
</div>




<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<!-- <script>
var closebtns = document.getElementsByClassName("icon-close");
var i;

for (i = 0; i < closebtns.length; i++) {
  closebtns[i].addEventListener("click", function() {
    this.parentElement.style.display = 'none';
});
}
</script> -->
</body>
</html>