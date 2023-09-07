<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Donor Registration</title>
    <style>
        /* CSS styles go here */

        /* Resetting styles for all elements */
        body, html {
            height: 100%;
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Background image styles */
        .bgimg {
            background-image: url("db2.jpg");
            height: 100%;
            width: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

        /* Form container styles */
        .container {
            position: absolute;
            right: 0;
            background-color: white;
            max-width: 500px;
            height: 790px;
            margin: 0 auto;
            border: 1px solid #0d0101;
            padding: 20px;
        }

        /* Full-width input fields */
        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="int"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 8px;
        }

        select {
            height: 40px;
        }

        /* Submit button styles */
        input[type="submit"] {
            background-color: #fe3e3e;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #eb0d0d;
        }

        /* Other styles */
        h2 {
            margin-top: -10px;
        }

        /* Gender radio buttons table styles */
        .gender {
            width: 100%;
        }

        .gender td {
            width: 50%;
        }
    </style>
</head>
<body>
    <div class="bgimg">
        <form action="saveddetails.php" class="container" method="post">
            <h2>Blood Donor Registration Form</h2>
            <!-- Form fields go here -->
        </form>
        <?php
            $result = -1;
            if(isset($_GET['result'])) {
                $result = $_GET['result'];
            }
            if($result == 1) {
                echo "<h2>Data Recorded Successfully!!!</h2>";
            } else if($result == 0) {
                echo "<h2>Problem in Data Saved !!!</h2>";
            }
        ?>
    </div>
</body>
</html>
