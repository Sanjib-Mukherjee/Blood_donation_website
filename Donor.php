<!DOCTYPE html>
<html>
<head>
<style>
body, html {
  height: 100%;
  font-family: Arial, Helvetica, sans-serif;
}

* {
  box-sizing: border-box;
}

.bgimg {
  /* The image used */
  background-image: url("d1.jpg");
  height:100%;
  width: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

/* Add styles to the form container */
.container {
  position: absolute;
  right: 0;
  background-color: white;
  max-width: 500px;
  height:790px;
  margin: 0 auto;
  border: 1px solid #0d0101;
  padding: 20px;
}

/* Full-width input fields */
  input[type="text"],input[type="email"],
  select {
      width: 100%;
      padding: 10px;
      margin-bottom:8px;
}
select {
    height: 40px;
}
input[type="int"],input[type="int"],
  select {
      width: 100%;
      padding: 5px;
      margin-bottom:20px
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
/* Set a style for the submit button */
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
h2{
  margin-top: -10px;
}

</style>


</head>
<body>
<div class="bgimg">
  <form action="saveddetails.php" class="container" method="post">
    <h2>Blood Donor Registration Form</h2>
        <!-- <form action="#" method="post"> -->
            <label for="name"><b>Name:</b></label>
            <input type="text" placeholder="Enter Name" id="name" name="name" required>

            <label for="email"><b>Email:</b></label>
            <input type="email" placeholder="Enter Email Id" id="email" name="email" required>
            <br>
            <label for="birthday"><b>Date Of Birth:</b></label>
<input type="date" id="birthday" name="dob">
<br><br>
<label for="weight"><b>Weight</b></label>
<input type="int" placeholder="Weight (in kg)" name="weight" id="weight" required>
<label for="Height"><b>Height</b></label>
<input type="int" placeholder="Height" name="height" id="Height" required><br>
            <label for="bloodType"><b>Blood Type:</b></label>
            <select id="bloodType" name="btype" required>
                <option value="">Select Blood Type</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>
            <br>
            <label for="gender"><b>Select Your Gender:</b></label>
  <table class="gender">
    <tr> <td>   <input type="radio" id="male" name="gender" value="Male">  </td>
    <td> <label for="male">Male</label> </td> </tr>
    <tr> <td>   <input type="radio" id="female" name="gender" value="Female">   </td>
    <td> <label for="female">Female</label> </td> </tr>
    <tr> <td>   <input type="radio" id="other" name="gender" value="Other">   </td>
    <td> <label for="other">Other</label> </td> </tr>
  </table> <br>
  <label for="Address"><b>Address:</b></label>
  <input type="text" placeholder="Enter Address" id="Address" name="address" required>
  <br>
  <label for="Pincode"><b>Pincode:</b></label>
  <input type="text" placeholder="Enter Pincode" id="Pincode" name="pcode" required>
  <br>
            <label for="contactNumber"><b>Contact Number:</b></label>
            <input type="text" placeholder="Enter Contact Number" id="cnor" name="contactNumber" required>
            <br>
            <input type="submit" value="Submit">
        </form>
        <?php
    $result=-1;
    if(isset($_GET['result']))
    {
      $result=$_GET['result'];
    }
      if($result==1)
      {
          echo "<h2>Data Recorded Successfully!!!</h1>";
      }
      else if($result==0)
      {
          echo "<h2>Problem in Data Saved !!!</h2>";
      }
  ?>
</div>
</body>
</html>