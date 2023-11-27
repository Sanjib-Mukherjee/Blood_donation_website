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

        <div class="form-box login">

            <h2>Login</h2>

            <form action="#" method="post">

                <div class="inputbox">
                    <!-- <span class="icon"><ion-icon name="mail"></ion-icon></span> -->
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" name="username" id="email" required>
                    <label for="email">Email</label>
                </div>

                <div class="inputbox">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" name="password" id="password" required>
                    <label for="password">Password</label>
                </div>

                <button type="submit" class="btn" name="submit">Login</button>

                <div class="login_register">
                    <p>Don't have an Account? <a href="signup.php" 
                    class="signup_link">SignUp</a></p>
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
         if(email == "admin@gmail.com" && password == "54321")
         {
            window.location.assign("blooddonation.php");
            alert("Login Successful");
         }
         else
         {
             alert("Invalid Information");
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
       

        // Retrieve password and confirm password values
        var password = document.getElementById("password").value;
        var email = document.getElementById("email").value;

        // Perform validation and redirection
        if (!password || !email) {
                    alert("Please fill in both password and email");
                    event.preventDefault(); // Prevent form submission if validation fails
                } else {
                    // Validation passed, redirect to home.php
                    alert("Welcome, life-saver!");
                    window.location.href = "blooddonation.php";
                }
    });
});
</script>


</body>
</html>