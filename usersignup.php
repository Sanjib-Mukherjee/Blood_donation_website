<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
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
    if (strlen($pass) === 8) {
        // Password meets the required length criteria
        // Proceed with the rest of your code
        if($pass==$c_pass){
            // Make sure to hash the password before inserting it into the database
            $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
        
            // Do not store the confirm_password in the database
            // Only store the hashed password
        
            $sql = "INSERT INTO user (name,email,password) VALUES ('$name','$email','$hashedPass')";
        
            
            if (mysqli_query($conn, $sql)) {
                echo "Registration successful!";
                header("Location: home.php"); // Redirect after successful registration
                exit(); // Ensure that the script stops executing after redirection
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            } 
        
            else  {
                echo '<script>';
                echo 'alert("enter correct password");'; // Display an alert popup
                echo '</script>';
            }
        
        mysqli_close($conn);
    }
        else 
        {
            echo '<script>';
            echo 'alert("Password must be 8 characters long.");'; // Display an alert popup
            echo '</script>';
        }
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
                    <input type="email" required name="email" autocomplete="off" required>
                    <label for="email">Email</label>
                </div>

                <div class="inputbox">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" id="password" required name="password" autocomplete="off" required>
                    <label for="password" title="8 char">Password (Must be 8 characters)</label>
                </div>

                <div class="inputbox">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" id="conpass" required name="confirm_password" autocomplete="off" required>
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
</body>
</html>