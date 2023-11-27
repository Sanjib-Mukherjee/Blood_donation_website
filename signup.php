<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    // $email = test_input($_POST["email"]);
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
    
    //check if the email is in correct format
    // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     $emailErr = "Invalid email format";
    // }
    // if (empty($_POST["email"])) {
    //     $emailErr = "Email is required";
    // } else {
    //     $email = test_input($_POST["email"]);
    //     // check if e-mail address is well-formed
    //     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     $emailErr = "Invalid email format";
    //     }
    // }

    if($pass==$c_pass){
    // Make sure to hash the password before inserting it into the database
    $hashedPass = password_hash($pass, PASSWORD_DEFAULT);

    // Do not store the confirm_password in the database
    // Only store the hashed password

    $sql = "INSERT INTO user (name,email,password) VALUES ('$name','$email','$hashedPass')";

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
                    <input type="text" required name="email" id = "email" autocomplete="off" required>
                    <label for="username">Email</label>
                </div>

                <div class="inputbox">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" required name="password" id="password" autocomplete="off" required>
                    <label for="password">Password</label>
                </div>

                <div class="inputbox">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" required name="confirm_password" id="conpass" autocomplete="off" required>
                    <label for="cpass">Confirm Password</label>
                </div>

                <div class="terms_cond">
                    <label for="tnc"><input type="checkbox">I agree to the Terms & Conditions</label>
                    
                </div>

                <button type="submit" class="btn" name="submit" onclick="redirect()">SignUp</button>

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
    function redirect(){
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var conpass = document.getElementById("conpass").value;

        if(password === conpass)
        {
            window.location.assign("blooddonation.php");
            alert("Welcome, life-saver!");
        }
        else
        {
            alert("Verify details and retry!");
            return;
        }
    }
</script> -->

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Get the form element
    var form = document.getElementById("myForm");

    // Attach event listener for form submission
    form.addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent the default form submission behavior

        // Retrieve password and confirm password values
        var password = document.getElementById("password").value;
        var conpass = document.getElementById("conpass").value;
        console.log("Password:", password);
        console.log("Confirm Password:", conpass);

        // Perform validation and redirection
        if (password === conpass) {
            alert("Welcome, life-saver!");
            window.location.href = "blooddonation.php";
        } else {
            alert("Verify details and retry!");
        }
    });
});
</script>

</body>
</html>