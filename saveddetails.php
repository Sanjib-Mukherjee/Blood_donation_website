<?php
    include('lib/connect.php');
    $obj=new connect();
?>
<?php
    $name=$_POST['name'];
    $email=$_POST['email'];
    $dob=$_POST['dob'];
    $weight=$_POST['weight'];
    $height=$_POST['height'];
    $btype=$_POST['btype'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    $pcode=$_POST['pcode'];
    $cno=$_POST['cno'];
    $n=$obj->saveddetails_donor_data($name,$email,$dob,$weight,$height,$btype,$gender,$address,$pcode,$cno);
    header('location:Donor.php?result='.$n);
?>  