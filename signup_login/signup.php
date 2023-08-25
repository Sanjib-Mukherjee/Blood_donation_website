
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