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
  /* The image used */
  background-image: url("db2.jpg");
  height: 100%;
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
  height: 790px;
  margin: 0 auto;
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
  <form action="/action_page.php" class="container">
    <h2>Blood Donor Registration Form</h2>
    <form action="#" method="post">
      <label for="name"><b>Name:</b></label>
      <input type="text" placeholder="Enter Name" id="name" name="name" required>

      <label for="email"><b>Email:</b></label>
      <input type="email" placeholder="Enter Email Id" id="email" name="email" required>
      <br>
      <label for="birthday"><b>Date Of Birth:</b></label>
      <input type="date" id="birthday" name="birthday">
      <br><br>
      <!-- Removed Weight and Height fields -->
      <label for="bloodType"><b>Blood Type:</b></label>
      <select id="bloodType" name="bloodType" required>
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
      <input type="text" placeholder="Enter Address" id="Address" name="Address" required>
      <br>
      <label for="Pincode"><b>Pincode:</b></label>
      <input type="text" placeholder="Enter Pincode" id="Pincode" name="Pincode" required>
      <br>
      <label for="contactNumber"><b>Contact Number:</b></label>
      <input type="text" placeholder="Enter Contact Number" id="contactNumber" name="contactNumber" required>
      <br>
      <input type="submit" value="Submit">
    </form>
  </form>
</div>
</body>
</html>
