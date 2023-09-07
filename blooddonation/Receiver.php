<!DOCTYPE html>
<html>
<head>
<style>
body, html {
  height: 100%;
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
  padding: 0;
}

* {
  box-sizing: border-box;
}

/* Background image styles */
.bgimg {
  background-image: url("d3.jpg");
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
  background-color: rgb(232, 225, 225);
  max-width: 430px;
  height: 680px;
  margin: 70px auto 0 auto;
  border: 1px solid #0d0101;
  padding: 20px;
}

/* Full-width input fields */
input[type="text"],
input[type="email"],
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
  <form action="save.php" class="container" method="post">
    <h2>Blood Receiver Registration Form</h2>
    <label for="name"><b>Name:</b></label>
    <input type="text" placeholder="Enter Name" id="name" name="uname" required>

    <label for="email"><b>Email:</b></label>
    <input type="email" placeholder="Enter Email Id" id="email" name="email" required>
    <br>
    <label for="birthday"><b>Date Of Birth:</b></label>
    <input type="date" id="birthday" name="dob">
    <br><br>
    <label for="bloodType"><b>Blood Type:</b></label>
    <select id="bloodType" name="btype" required>
      <option value="">Select Blood Type</option>
      <?php
        $arr = array('A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-');
        for ($i = 0; $i < sizeof($arr); $i++) {
      ?>
        <option value="<?php echo $arr[$i]; ?>"><?php echo $arr[$i]; ?></option>
      <?php
        }
      ?>
    </select>
    <br>
    <label for="gender"><b>Select Your Gender:</b></label>
    <table class="gender">
      <tr>
        <td><input type="radio" id="male" name="gender" value="Male"></td>
        <td><label for="male">Male</label></td>
      </tr>
      <tr>
        <td><input type="radio" id="female" name="gender" value="Female"></td>
        <td><label for="female">Female</label></td>
      </tr>
      <tr>
        <td><input type="radio" id="other" name="gender" value="Other"></td>
        <td><label for="other">Other</label></td>
      </tr>
    </table>
    <br>
    <label for="Address"><b>Address:</b></label>
    <input type="text" placeholder="Enter Address" id="Address" name="address" required>
    <br>
    <label for="Pincode"><b>Pincode:</b></label>
    <input type="text" placeholder="Enter Pincode" id="Pincode" name="pcode" required>
    <br>
    <label for="contactNumber"><b>Contact Number:</b></label>
    <input type="text" placeholder="Enter Contact Number" id="contactNumber" name="cno" required>
    <br>
    <input type="submit" value="Submit">
  </form>
  <?php
    $result = -1;
    if (isset($_GET['result'])) {
      $result = $_GET['result'];
    }
    if ($result == 1) {
      echo "<h2>Data Recorded Successfully!!!</h2>";
    } else if ($result == 0) {
      echo "<h2>Problem in Data Saved !!!</h2>";
    }
  ?>
</div>
</body>
</html>
